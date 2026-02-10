# 🛒 Laravel E-Commerce Cart System

![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

A modern and optimized shopping cart system built with Laravel using **Service Layer Architecture**, **performance optimization**, and **session-based cart management**.

---

## 📌 Project Overview

This project is a **Laravel-based E-Commerce Cart System** developed as an assignment.  
It provides complete cart functionality with clean architecture, optimized backend logic, and dynamic frontend integration using Blade templates.

The project focuses on:
- Scalability
- Performance optimization
- Clean code structure
- Secure session handling

---

## ✨ Key Features

### 🛒 Cart Management
- Add products to cart
- Increase / decrease product quantity
- Remove products from cart
- Clear entire cart
- Dynamic cart count in navbar
- Automatic cart total calculation
- Session-based cart handling

### ⚡ Backend Optimization
- Service Layer (`CartService`)
- Reusable business logic
- Optimized database queries
- Secure session validation
- View Composer optimization for cart count

### 🎨 Frontend Integration
- Blade template-based UI
- Dynamic cart updates (AJAX ready)
- Responsive cart & product pages
- User-friendly interface

---

## 🏗️ Project Architecture

```text
app/
├── Models/
│   ├── Product.php
│   └── CartItem.php
├── Services/
│   └── CartService.php
├── Http/
│   └── Controllers/
│       └── CartController.php
├── Providers/
│   └── AppServiceProvider.php

resources/
└── views/
    ├── layouts/
    ├── products/
    └── cart/

routes/
└── web.php

---

## ⚙️ Installation Guide

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name

2️⃣ Install Dependencies
composer install

3️⃣ Create Environment File
cp .env.example .env

4️⃣ Generate Application Key
php artisan key:generate

5️⃣ Configure Database

Update your .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

6️⃣ Run Database Migrations
php artisan migrate

7️⃣ Seed Sample Data (Optional)
php artisan db:seed

8️⃣ Start the Application
php artisan serve


Open your browser and visit:

http://127.0.0.1:8000