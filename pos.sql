-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 18, 2023 lúc 05:49 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pos`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advance_salaries`
--

CREATE TABLE `advance_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `advance_salary` varchar(255) DEFAULT NULL,
  `advance_date` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advance_salaries`
--

INSERT INTO `advance_salaries` (`id`, `employee_id`, `month`, `year`, `advance_salary`, `advance_date`, `reason`, `created_at`, `updated_at`) VALUES
(2, 6, '6', '2023', '900000', '2023-06-08', 'Mua bánh tráng trộn.', '2023-06-04 06:56:19', '2023-06-06 12:28:14'),
(3, 7, '6', '2023', '1000000', '2023-06-05', 'mua hủ tiếu.', '2023-06-05 11:39:57', '2023-06-06 12:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', NULL, NULL, 1, NULL, NULL),
(2, 'computer', NULL, NULL, 1, '2023-06-20 05:30:24', '2023-06-20 05:30:24'),
(49, '1', NULL, 'backend/upload/category/ROjaihBhM2Ez1qs39lGRo7eg9NONMeBJspB9dFFd.jpg', 1, '2023-06-26 07:41:23', '2023-06-26 07:41:23'),
(50, 'public', NULL, 'categories/RsPz8dMTzYXhMkikZt2zAsGiMijyW1PrwJKrRq8j.jpg', 1, '2023-06-26 08:50:10', '2023-06-26 08:50:10'),
(51, '3', NULL, 'categories/fz1Oyr8ZeTjweQqCX6VJ8V0bSNHKfmdLHowdbi8R.jpg', 1, '2023-06-26 09:12:19', '2023-06-26 09:12:19'),
(52, '4', NULL, 'categories/0SaKYxLwryykD122MEzMv5tDyEQbk2VbpD3p4wAj.jpg', 1, '2023-06-26 09:13:28', '2023-06-26 09:13:28'),
(53, '87', NULL, 'categories/G73lBJtEPOk6OezY5SWTZAxJhWmYpQoYvsb1zHXc.jpg', 1, '2023-06-26 09:22:27', '2023-06-26 09:22:27'),
(54, 'danh mục 1', 'danh-muc-1', 'backend/upload/category/1771747444988282.jpg', 1, '2023-07-18 01:47:13', '2023-07-18 01:47:13'),
(55, 'danh mục 2', 'danh-muc-2', 'backend/upload/category/1771748941714131.jpg', 1, '2023-07-18 02:11:00', '2023-07-18 02:11:00'),
(56, 'danh mục 3', 'danh-muc-3', 'backend/upload/category/1771762622605893.jpg', 1, '2023-07-18 05:48:28', '2023-07-18 05:48:28'),
(57, 'danh mục 4', 'danh-muc-4', 'backend/upload/category/1771762680809807.jpg', 1, '2023-07-18 05:49:23', '2023-07-18 05:49:23'),
(58, 'danh mục 5', 'danh-muc-5', 'backend/upload/category/1771762723149162.jpg', 1, '2023-07-18 05:50:03', '2023-07-18 05:50:03'),
(59, 'danh mục 6', 'danh-muc-6', 'backend/upload/category/1771762786971833.jpg', 1, '2023-07-18 05:51:04', '2023-07-18 05:51:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `image`, `account_holder`, `account_number`, `bank_name`, `bank_branch`, `city`, `created_at`, `updated_at`) VALUES
(1, 'khách 1', 'khach1@gmail.com', '111111', 'quận 9', NULL, 'backend/upload/customer/1765859948448585.jpg', NULL, NULL, NULL, NULL, 'HCM', '2023-05-14 02:07:59', '2023-05-14 02:07:59'),
(2, 'khách 2', 'dolakhach2cuatuido@gmail.com', '22222222', 'quận 11', NULL, 'backend/upload/customer/1765859977040759.jpg', NULL, NULL, NULL, NULL, 'hcm', '2023-05-14 02:08:26', '2023-05-14 02:08:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `vacation` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `image`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(6, 'Hùng', 'hung@yahoo.com', '0919577899', 'ngay tính', '5 Year', 'backend/upload/employee/1764327685558012.jpg', '1000000', '7', 'Tỉnh Hoà Bình', '2023-04-27 04:25:12', '2023-04-27 04:25:12'),
(7, 'Mai', 'mai@gmail.com', '0919577899', 'Long an', '3 Year', 'backend/upload/employee/1764327863429170.jpg', '2000000', '7', 'Tỉnh Hoà Bình', '2023-04-27 04:24:52', '2023-04-27 04:24:52'),
(8, 'Nhân viên chưa ứng lương', 'noAdavace@gmail.com', '0901234567', 'sao hoả', '1 Year', 'backend/upload/employee/1768202563430198.jpg', '2000000', '45', 'Ngoài hành tinh', '2023-06-09 05:42:51', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_25_113458_create_employees_table', 2),
(6, '2023_04_27_114835_create_customers_table', 3),
(7, '2023_04_27_120615_create_customers_table', 4),
(8, '2023_05_14_123818_create_suppliers_table', 5),
(9, '2023_05_25_071050_create_advancesalaries_table', 6),
(10, '2023_05_25_175923_create_advance_salaries_table', 7),
(11, '2023_06_08_094848_create_pay_salaries_table', 8),
(12, '2023_06_20_100239_create_categories_table', 9),
(13, '2014_10_12_100000_create_password_reset_tokens_table', 10),
(14, '2023_07_12_032201_create_suppliers_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_salaries`
--

CREATE TABLE `pay_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_date` date DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `paid_salary` varchar(255) DEFAULT NULL,
  `advance_salary` varchar(255) DEFAULT NULL,
  `due_salary` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `shopname` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `account_contact` text DEFAULT NULL,
  `sale_contact` varchar(255) DEFAULT NULL,
  `warranty_contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'customer',
  `address` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `email_verified_at`, `password`, `role`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '0919577340', 'backend/upload/admin_image/290620231234_user-3.jpg', NULL, '$2y$10$N9jtnr.Ipv1a8hZyP4357ueMa3ABtZi62yVgJKdo6l2W60IM34nVW', 'admin', 'bí mật lắm', 1, NULL, '2023-04-12 21:35:58', '2023-06-29 05:34:49'),
(3, 'vendor', 'vendor@gmail.com', '0922222222', NULL, NULL, '$2y$10$DyqrMiXL/rzhufuVXddaxeH4.34rUvgekIEvhn39F/uYf8BHtWee2', 'vendor', NULL, 1, NULL, '2023-06-26 20:22:38', '2023-06-26 20:22:38'),
(4, 'quản lý', 'manager@gmail.com', '0911111111', 'backend/upload/manager_image/050720230511_user-10.jpg', NULL, '$2y$10$fDM0bfl6h.U1BW0hHbtVVe4gXnO9IkS/.33GMcAzxORnTf60CEO/e', 'manager', NULL, 1, NULL, '2023-06-26 20:27:25', '2023-07-04 22:57:04'),
(11, 'khách 1', 'khach1@gmail.com', '11111111', 'frontend/upload/customer_image/140720231030_user-10.jpg', NULL, '$2y$10$RBvieJmSEw7q9LNd.PVqi.oiZkBTVSMmtA4S3Tw89FAa3WAF/RTLu', 'customer', 'Nhà bè', 1, NULL, '2023-07-04 21:10:33', '2023-07-14 03:30:33'),
(12, 'khach2', 'khach2@gmail.com', '22222222', NULL, NULL, '$2y$10$wuqACcub2qnNZb2HaCdKmO0vOOMpsCOqf.k1KUcO4o5S3GVpsC3k6', 'customer', NULL, 1, NULL, '2023-07-04 21:15:27', '2023-07-04 21:15:27'),
(13, 'khách 3', NULL, '33333333', NULL, NULL, '$2y$10$VhWihRDaq9.ZzYHXyh34R.ZifCCr2Lpq3uNqSiHq08olPp6K4cDBC', 'customer', NULL, 1, NULL, '2023-07-09 21:59:47', '2023-07-09 21:59:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advance_salaries`
--
ALTER TABLE `advance_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `pay_salaries`
--
ALTER TABLE `pay_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advance_salaries`
--
ALTER TABLE `advance_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `pay_salaries`
--
ALTER TABLE `pay_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
