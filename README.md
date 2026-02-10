<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</a>
</p>

<h1 align="center">Laravel E-Commerce Cart System</h1>

<p align="center">
A modern shopping cart system built with Laravel using Service Layer Architecture, optimized performance, and session-based cart management.
</p>

---

## 📌 Project Overview

This project is a **Laravel-based E-Commerce Cart System** developed as an assignment.  
It includes product listing, cart management, optimized backend logic, and frontend integration using Blade templates.

The system is designed with clean architecture, performance optimization, and secure session handling.

---

## ⚙️ Features

### 🛒 Cart Features
- Add product to cart
- Update product quantity (+ / -)
- Remove product from cart
- Clear cart
- Cart count in navbar
- Cart total price calculation
- Session-based cart system
- Optimized cart service logic

### ⚡ Performance Optimizations
- Service Layer (`CartService`)
- View Composer optimization
- Caching for cart count
- Reduced database queries
- Secure session-based operations

### 🎨 Frontend Features
- Blade templates integration
- Dynamic cart update (AJAX ready)
- Responsive UI for cart and product pages

---

## ⚙️ Installation Steps

### 1️⃣ Install Dependencies

```bash
composer install

### 2️⃣ Create Environment File

```bash
cp .env.example .env

### 3️⃣ Generate Application Key

```bash
php artisan key:generate

### 4️⃣ Configure Database

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

### 5️⃣ Run Database Migrations

```bash
php artisan migrate

### 6️⃣ Seed Sample Data

```bash
php artisan db:seed

### 7️⃣ Start the Application
```bash
php artisan serve