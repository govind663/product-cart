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
app/
├── Models/
│ ├── Product.php
│ └── CartItem.php
├── Services/
│ └── CartService.php
├── Http/
│ └── Controllers/
│ └── CartController.php
├── Providers/
│ └── AppServiceProvider.php

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

installation_steps:
  - step: "Install Dependencies"
    command: "composer install"

  - step: "Create Environment File"
    command: "cp .env.example .env"

  - step: "Generate Application Key"
    command: "php artisan key:generate"

  - step: "Configure Database"
    env_config:
      DB_CONNECTION: mysql
      DB_HOST: 127.0.0.1
      DB_PORT: 3306
      DB_DATABASE: your_database_name
      DB_USERNAME: your_username
      DB_PASSWORD: your_password

  - step: "Run Database Migrations"
    command: "php artisan migrate"

  - step: "Seed Sample Data (Optional)"
    command: "php artisan db:seed"

  - step: "Start the Application"
    command: "php artisan serve"

  - step: "Application URL"
    url: "http://127.0.0.1:8000"

database_structure:
  products_table:
    table_name: products
    columns:
      - name: id
        type: bigint
        description: "Primary Key"
      - name: name
        type: string
        description: "Product Name"
      - name: price
        type: decimal
        description: "Product Price"
      - name: description
        type: text
        description: "Product Description"
      - name: created_at
        type: timestamp
        description: "Created Time"
      - name: updated_at
        type: timestamp
        description: "Updated Time"

  cart_items_table:
    table_name: cart_items
    columns:
      - name: id
        type: bigint
        description: "Primary Key"
      - name: session_id
        type: string
        description: "Session Identifier"
      - name: product_id
        type: bigint
        description: "Foreign Key (products.id)"
      - name: quantity
        type: integer
        description: "Product Quantity"
      - name: created_at
        type: timestamp
        description: "Created Time"
      - name: updated_at
        type: timestamp
        description: "Updated Time"

application_flow:
  - step: "User visits product listing page"
  - step: "User adds product to cart"
  - step: "CartService handles cart logic (add/update/remove)"
  - step: "Cart data is stored using session ID"
  - step: "Navbar cart count updates dynamically"
  - step: "Cart page displays items and total price"
