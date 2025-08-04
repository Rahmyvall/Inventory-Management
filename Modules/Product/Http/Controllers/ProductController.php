<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Requests\StoreProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Modules\Product\DataTables\ProductDataTable;
use Modules\Upload\Entities\Upload;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('product::products.index');
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        abort_if(Gate::denies('create_products'), 403);

        return view('product::products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->except('document'));

        if ($request->has('document')) {
            foreach ($request->input('document', []) as $file) {
                $filePath = Storage::path('temp/dropzone/' . $file);
                if (file_exists($filePath)) {
                    $product->addMedia($filePath)->toMediaCollection('images');
                }
            }
        }

        toast('Product Created!', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        abort_if(Gate::denies('show_products'), 403);

        return view('product::products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('edit_products'), 403);

        return view('product::products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->except('document'));

        // Remove images not included in the updated request
        if ($request->has('document')) {
            $existingMedia = $product->getMedia('images');
            $newDocuments = $request->input('document', []);

            foreach ($existingMedia as $media) {
                if (!in_array($media->file_name, $newDocuments)) {
                    $media->delete();
                }
            }

            $existingFileNames = $product->getMedia('images')->pluck('file_name')->toArray();

            // Add new images
            foreach ($newDocuments as $file) {
                if (!in_array($file, $existingFileNames)) {
                    $filePath = Storage::path('temp/dropzone/' . $file);
                    if (file_exists($filePath)) {
                        $product->addMedia($filePath)->toMediaCollection('images');
                    }
                }
            }
        }

        toast('Product Updated!', 'info');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        abort_if(Gate::denies('delete_products'), 403);

        $product->delete();

        toast('Product Deleted!', 'warning');

        return redirect()->route('products.index');
    }
}