> **Important Note:** This Project is ready for Production. But use code from main branch only. If you find any bug or have any suggestion please create an Issue.

<picture>
    <img src="public/images/2.jpg" alt="App Logo">
    <img src="public/images/3.jpg" alt="App Logo">
    <img src="public/images/4.jpg" alt="App Logo">
    <img src="public/images/5.jpg" alt="App Logo">
     <img src="public/images/6.jpg" alt="App Logo">
    <img src="public/images/7.jpg" alt="App Logo">
</picture>

# Deskripsi

web kasir Point of Sale (POS) yang dibuat menggunakan bahasa PHP dan Framework Laravel. Fitur dasarnya sudah sangat lengkap. Ini fitur yang sudah tersedia di Triangle POS

-   Products Management & Barcode Printing
-   Stock Management
-   Make Quotation & Send Via Email
-   Purchase Management
-   Sale Management
-   Purchase & Sale Return Management
-   Expense Management
-   Customer & Supplier Management
-   User Management (Roles & Permissions)
-   Product Multiple Images
-   Multiple Currency Settings
-   Unit Settings
-   System Settings
-   Reports

# Local Installation

-   run `composer install `
-   run `npm install`
-   run `npm run dev`
-   copy .env.example to .env
-   run `php artisan key:generate`
-   set up your database in the .env
-   run `php artisan migrate --seed`
-   run `php artisan storage:link`
-   run `php artisan serve`
-   then visit `http://localhost:8000 or http://127.0.0.1:8000`.

> **Important Note:** "Triangle POS" uses Laravel Snappy Package for PDFs. If you are using Linux then no configuration is needed. But in other Operating Systems please refer to [Laravel Snappy Documentation](https://github.com/barryvdh/laravel-snappy).

# Docker Installation

This will start the application along with the mysql database using docker compose. Note that the `DB_HOST` variable must be the mysql docker container name, in this case `db`.

-   run `docker build -t triangle-pos .`
-   run `docker compose up`
-   then visit `http://localhost:8000 or http://127.0.0.1:8000`.

# Admin Credentials

> Email: super.admin@test.com || Password: 12345678

## Demo

![Triangle POS](public/images/screenshot.jpg)
**Live Demo:** will update soon

## Triangle POS Features

-   **Products Management & Barcode Printing**
-   **Stock Management**
-   **Make Quotation & Send Via Email**
-   **Purchase Management**
-   **Sale Management**
-   **Purchase & Sale Return Management**
-   **Expense Management**
-   **Customer & Supplier Management**
-   **User Management (Roles & Permissions)**
-   **Product Multiple Images**
-   **Multiple Currency Settings**
-   **Unit Settings**
-   **System Settings**
-   **Reports**

# License

**[Creative Commons Attribution 4.0 cc-by-4.0](https://creativecommons.org/licenses/by/4.0/)**
