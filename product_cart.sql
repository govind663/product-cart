-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2026 at 08:33 AM
-- Server version: 8.0.44-0ubuntu0.24.04.2
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('product-cart-cache-cart_count_qt1uxhZUV9jXmQm5mWfZ2KK4JGZHcNKsjZMln4LV', 'i:2;', 1770712415);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `session_id`, `product_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qt1uxhZUV9jXmQm5mWfZ2KK4JGZHcNKsjZMln4LV', 23, 1, '2026-02-10 08:19:56', '2026-02-10 08:29:00', '2026-02-10 08:29:00'),
(2, 'qt1uxhZUV9jXmQm5mWfZ2KK4JGZHcNKsjZMln4LV', 24, 3, '2026-02-10 08:24:53', '2026-02-10 08:29:02', '2026-02-10 08:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '0001_01_01_000000_create_users_table', 1),
(16, '0001_01_01_000001_create_cache_table', 1),
(17, '0001_01_01_000002_create_jobs_table', 1),
(18, '2026_02_09_165012_create_products_table', 1),
(19, '2026_02_09_165050_create_cart_items_table', 1),
(20, '2026_02_09_170127_add_deleted_at_to_products_table', 1),
(21, '2026_02_09_170342_add_deleted_at_to_cart_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iPhone 15 Pro Max', 'The iPhone 15 Pro Max features Apple’s latest A17 Pro chip, a premium titanium body, advanced triple-camera system, and a stunning Super Retina XDR display. Designed for high performance, gaming, photography, and seamless everyday use with long-lasting battery life.', 119999.00, 'product-image/Smartphones/iphone.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(2, 'Samsung Galaxy S24 Ultra', 'Samsung Galaxy S24 Ultra delivers top-tier performance with Snapdragon processor, built-in S Pen, 200MP professional-grade camera, and immersive AMOLED display. It is perfect for productivity, creativity, gaming, and premium smartphone experience with powerful battery and AI features.', 109999.00, 'product-image/Smartphones/samsung.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(3, 'OnePlus 12', 'OnePlus 12 combines flagship-level performance with Snapdragon 8 Gen 3 processor, smooth AMOLED display, fast charging technology, and a versatile camera setup. It offers exceptional speed, premium design, and reliable battery performance, making it ideal for power users and gamers.', 64999.00, 'product-image/Smartphones/oneplus.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(4, 'Google Pixel 8 Pro', 'Google Pixel 8 Pro is designed for photography lovers with AI-powered camera features, clean Android experience, and advanced computational photography. It delivers smooth performance, premium design, and intelligent features that enhance daily productivity and user experience.', 89999.00, 'product-image/Smartphones/pixel.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(5, 'Xiaomi 14 Pro', 'Xiaomi 14 Pro features a Leica-tuned camera system, powerful flagship processor, ultra-fast charging, and premium design. It offers excellent performance, stunning visuals, and professional photography capabilities, making it a perfect choice for tech enthusiasts and creative users.', 79999.00, 'product-image/Smartphones/xiaomi.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(6, 'MacBook Pro M3', 'MacBook Pro M3 delivers exceptional performance with Apple’s latest M3 chip, stunning Retina display, long battery life, and premium build quality. It is ideal for developers, designers, and professionals who need powerful performance, smooth multitasking, and reliable productivity.', 159999.00, 'product-image/Laptops/macbook.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(7, 'Dell XPS 15', 'Dell XPS 15 is a premium ultrabook featuring an immersive OLED display, powerful Intel processor, sleek design, and excellent build quality. It is perfect for professionals, content creators, and students who need high performance, portability, and stunning visuals.', 139999.00, 'product-image/Laptops/dell.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(8, 'ASUS ROG Zephyrus', 'ASUS ROG Zephyrus is a high-performance gaming laptop equipped with powerful GPU, fast processor, and advanced cooling system. It delivers smooth gaming, fast rendering, and immersive visuals, making it ideal for gamers and creative professionals.', 129999.00, 'product-image/Laptops/asus.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(9, 'HP Spectre x360', 'HP Spectre x360 is a premium 2-in-1 convertible laptop featuring sleek design, powerful performance, touchscreen display, and long battery life. It is ideal for professionals and students who need flexibility, portability, and stylish productivity in one device.', 109999.00, 'product-image/Laptops/hp.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(10, 'Lenovo ThinkPad X1', 'Lenovo ThinkPad X1 is a business-class laptop known for durability, security, and performance. With premium build quality, powerful hardware, and enterprise-grade features, it is ideal for corporate users and professionals who demand reliability and productivity.', 119999.00, 'product-image/Laptops/lenovo.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(11, 'AirPods Pro 2', 'AirPods Pro 2 offers active noise cancellation, spatial audio, and premium sound quality in a compact wireless design. With long battery life and seamless Apple ecosystem integration, it delivers an immersive listening experience for music, calls, and entertainment.', 19999.00, 'product-image/Accessories/airpods.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(12, 'Apple Watch Ultra 2', 'Apple Watch Ultra 2 is a rugged smartwatch designed for outdoor adventures and fitness tracking. It features advanced health sensors, GPS, long battery life, and premium build quality, making it ideal for athletes and adventure enthusiasts.', 79999.00, 'product-image/Accessories/watch.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(13, 'Wireless Keyboard', 'This wireless mechanical keyboard delivers fast response, comfortable typing experience, and durable build quality. It is ideal for professionals, gamers, and everyday users who want efficiency, precision, and a premium typing experience.', 9999.00, 'product-image/Accessories/keyboard.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(14, 'Wireless Mouse', 'This ergonomic wireless mouse offers precise tracking, smooth performance, and comfortable grip for long hours of use. It is ideal for productivity, office work, and creative tasks, providing reliable performance and modern design.', 8999.00, 'product-image/Accessories/mouse.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(15, 'Power Bank 20000mAh', 'This high-capacity power bank provides fast charging and reliable backup power for smartphones and devices. With multiple ports and compact design, it is ideal for travel, daily use, and emergency power needs.', 2999.00, 'product-image/Accessories/powerbank.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(16, 'PS5 Slim', 'PS5 Slim delivers next-generation gaming with powerful hardware, ultra-fast loading, and stunning 4K graphics. It offers immersive gameplay, advanced controller features, and a vast library of games, making it perfect for modern gamers.', 49999.00, 'product-image/Gaming/ps5.webp', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(17, 'Nintendo Switch OLED', 'Nintendo Switch OLED features a vibrant OLED display, portable design, and versatile gaming modes. It allows you to play games at home or on the go, making it ideal for casual and hardcore gamers alike.', 32999.00, 'product-image/Gaming/switch.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(18, 'Xbox Series X', 'Xbox Series X is a powerful gaming console delivering true 4K gaming performance, fast load times, and immersive gameplay. It supports a wide range of games and features, making it ideal for serious gamers.', 54999.00, 'product-image/Gaming/xbox.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(19, 'Gaming Headset', 'This wireless gaming headset offers immersive sound, noise isolation, and comfortable design for long gaming sessions. It delivers clear communication and high-quality audio, making it ideal for competitive gaming and entertainment.', 24999.00, 'product-image/Gaming/headset.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(20, 'Gaming Mouse', 'This professional gaming mouse features high precision, customizable DPI, and ergonomic design. It delivers fast response and accuracy, making it ideal for competitive gaming and high-performance tasks.', 6999.00, 'product-image/Gaming/gamingmouse.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(21, 'Sony WH-1000XM5', 'Sony WH-1000XM5 headphones deliver industry-leading noise cancellation, premium sound quality, and long battery life. With comfortable design and smart features, they provide an exceptional listening experience for music, calls, and travel.', 29999.00, 'product-image/Audio/sony.webp', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(22, 'Bose QuietComfort Ultra', 'Bose QuietComfort Ultra headphones offer premium audio quality, advanced noise cancellation, and superior comfort. Designed for immersive listening, they are ideal for music lovers, travelers, and professionals.', 27999.00, 'product-image/Audio/bose.jpg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(23, 'Apple HomePod Mini', 'Apple HomePod Mini is a compact smart speaker with rich sound quality and Siri integration. It offers smart home control, seamless Apple ecosystem connectivity, and premium audio performance in a stylish design.', 9999.00, 'product-image/Audio/homepod.jpeg', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL),
(24, 'Wireless Earbuds', 'These wireless earbuds deliver clear sound, deep bass, and stable connectivity. With compact design and long battery life, they are perfect for music, calls, workouts, and everyday use.', 6999.00, 'product-image/Audio/earbuds.webp', 1, '2026-02-10 08:15:41', '2026-02-10 08:15:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qt1uxhZUV9jXmQm5mWfZ2KK4JGZHcNKsjZMln4LV', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3B5Z0I1NFp4T2k3VmZmSjdmWHAxN3A1eEZsV3REU0I4YWt3WDZuayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cy8yNCI7czo1OiJyb3V0ZSI7czoxMzoicHJvZHVjdHMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770712397);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
