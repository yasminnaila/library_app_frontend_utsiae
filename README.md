# Library Management System - Frontend (CodeIgniter 4)# CodeIgniter 4 Application Starter



Frontend web application untuk Library Management System yang terintegrasi dengan Laravel API Backend.## What is CodeIgniter?



## 📋 RequirementsCodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.

More information can be found at the [official site](https://codeigniter.com).

- PHP >= 8.1

- PHP Extensions:This repository holds a composer-installable app starter.

  - **intl** (REQUIRED - untuk CodeIgniter 4)It has been built from the

  - curl[development repository](https://github.com/codeigniter4/CodeIgniter4).

  - json

  - mbstringMore information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

- Composer

- Laravel Backend API (running on http://127.0.0.1:8000)You can read the [user guide](https://codeigniter.com/user_guide/)

corresponding to the latest version of the framework.

## 🔧 Setup

## Installation & updates

### 1. Enable PHP `intl` Extension

`composer create-project codeigniter4/appstarter` then `composer update` whenever

CodeIgniter 4 **memerlukan** ekstensi `intl`. Untuk mengaktifkannya:there is a new release of the framework.



**Jika menggunakan XAMPP:**When updating, check the release notes to see if there are any changes you might need to apply

1. Buka file `C:\xampp\php\php.ini`to your `app` folder. The affected files can be copied or merged from

2. Cari baris `;extension=intl``vendor/codeigniter4/framework/app`.

3. Hapus tanda `;` di depannya menjadi `extension=intl`

4. Simpan dan restart Apache (jika running)## Setup

5. Verifikasi dengan command: `php -m | findstr intl`

Copy `env` to `.env` and tailor for your app, specifically the baseURL

**Jika menggunakan PHP standalone:**and any database settings.

1. Buka file `php.ini` (jalankan `php --ini` untuk lokasi file)

2. Uncomment `extension=intl`## Important Change with index.php

3. Simpan file

4. Verifikasi: `php -m | findstr intl``index.php` is no longer in the root of the project! It has been moved inside the *public* folder,

for better security and separation of components.

### 2. Install Dependencies

This means that you should configure your web server to "point" to your project's *public* folder, and

```bashnot to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the

cd C:\Users\L\Documents\Coding\library-app-frontendframework are exposed.

composer install

```**Please** read the user guide for a better explanation of how CI4 works!



### 3. Configure Environment## Repository Management



File `.env` sudah dikonfigurasi dengan:We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.

- `app.baseURL = 'http://localhost:8080/'`We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss

- `api.baseURL = 'http://127.0.0.1:8000/api'`FEATURE REQUESTS.



Pastikan Laravel Backend API sudah running di port 8000.This repository is a "distribution" one, built by our release preparation script.

Problems with it can be raised on our forum, or as issues in the main repository.

## 🚀 Run Application

## Server Requirements

### Start Laravel Backend (Terminal 1)

PHP version 8.1 or higher is required, with the following extensions installed:

```bash

cd C:\Users\L\Documents\Coding\library-app- [intl](http://php.net/manual/en/intl.requirements.php)

php artisan serve- [mbstring](http://php.net/manual/en/mbstring.installation.php)

```

> [!WARNING]

Laravel API akan running di: **http://127.0.0.1:8000**> - The end of life date for PHP 7.4 was November 28, 2022.

> - The end of life date for PHP 8.0 was November 26, 2023.

### Start CodeIgniter Frontend (Terminal 2)> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.

> - The end of life date for PHP 8.1 will be December 31, 2025.

```bash

cd C:\Users\L\Documents\Coding\library-app-frontendAdditionally, make sure that the following extensions are enabled in your PHP:

php spark serve --port=8080

```- json (enabled by default - don't turn it off)

- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL

CodeIgniter akan running di: **http://localhost:8080**- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


## 📚 Features

✅ **List Buku** - Menampilkan semua buku dari database  
✅ **Search & Filter** - Cari berdasarkan judul/pengarang, filter kategori & status  
✅ **Tambah Buku** - Form untuk menambah buku baru  
✅ **Detail Buku** - Lihat informasi lengkap buku  
✅ **Edit Buku** - Update data buku  
✅ **Hapus Buku** - Menghapus buku dari database  

## 🌐 Pages

| URL | Halaman |
|-----|---------|
| `http://localhost:8080/books` | Daftar Buku |
| `http://localhost:8080/books/create` | Form Tambah Buku |
| `http://localhost:8080/books/{id}` | Detail Buku |
| `http://localhost:8080/books/{id}/edit` | Form Edit Buku |

## 🔌 API Integration

Frontend ini menggunakan `BookApiClient` library (di `app/Libraries/BookApiClient.php`) untuk berkomunikasi dengan Laravel API menggunakan cURL.

**Laravel API Endpoints:**
- GET `/api/books` - List buku
- POST `/api/books` - Tambah buku
- GET `/api/books/{id}` - Detail buku
- PUT `/api/books/{id}` - Update buku
- DELETE `/api/books/{id}` - Hapus buku

## 🛠️ Tech Stack

- **Framework**: CodeIgniter 4.6.3
- **Frontend**: Bootstrap 5.3, Bootstrap Icons
- **HTTP Client**: PHP cURL
- **Backend API**: Laravel 12

## 📝 Troubleshooting

### Error: "Class Locale not found"
- **Penyebab**: Extension `intl` belum diaktifkan
- **Solusi**: Enable `extension=intl` di `php.ini` (lihat bagian Setup)

### Error: "cURL Error: Connection refused"
- **Penyebab**: Laravel backend tidak running
- **Solusi**: Pastikan Laravel API running di `http://127.0.0.1:8000`

### Buku tidak muncul di list
- Cek Laravel API langsung: `http://127.0.0.1:8000/api/books`
- Cek console browser untuk error JavaScript
- Pastikan CORS sudah enabled di Laravel

## 👨‍💻 Author

Library Management System  
Frontend: CodeIgniter 4  
Backend: Laravel 12
