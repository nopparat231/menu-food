-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 03:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menu_food`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_img` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_detail` varchar(255) NOT NULL,
  `menu_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `restaurant_id`, `menu_name`, `menu_img`, `menu_price`, `menu_detail`, `menu_status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'คะน้าหมูกรอบ', 'https://img.wongnai.com/p/1968x0/2020/05/23/593764daea7c40d486f9f349040710bf.jpg', 35, 'test', '0', '2021-10-19 06:07:15', '2021-10-19 06:07:15'),
(2, '4', '2', 'ไก่', 'http://i1.wp.com/www.thaismescenter.com/wp-content/uploads/2019/11/1312.jpg', 30, 'test', '0', '2021-10-26 07:20:43', '2021-10-26 07:20:43'),
(3, '6', '4', 'ไก่', 'http://i1.wp.com/www.thaismescenter.com/wp-content/uploads/2019/11/1312.jpg', 40, 'test', '0', '2021-10-27 07:31:04', '2021-10-27 07:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_29_144947_create_menu', 1),
(5, '2021_04_29_145101_create_restaurant', 1),
(6, '2021_04_29_145627_create_orders', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `orders_detail` varchar(255) NOT NULL,
  `orders_time` int(11) NOT NULL,
  `orders_slip` varchar(255) NOT NULL,
  `orders_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `menu_id`, `order_quantity`, `orders_detail`, `orders_time`, `orders_slip`, `orders_status`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 2, 'test detail', 0, '1', '1', NULL, NULL),
(2, '3', '1', 1, 'test detail', 0, '1635063726.png', '5', NULL, NULL),
(3, '3', '1', 1, 'test detail', 0, '1635067385.png', '2', NULL, NULL),
(4, '3', '1', 1, 'test detail', 0, '1635075184.jpg', '5', NULL, NULL),
(5, '4', '2', 1, 'test detail', 0, '1', '4', NULL, NULL),
(6, '5', '2', 2, 'test detail', 0, '1', '4', NULL, NULL),
(7, '5', '2', 1, 'test detail', 0, '1', '4', NULL, NULL),
(8, '4', '2', 1, 'test detail', 0, '1', '4', NULL, NULL),
(9, '5', '2', 1, 'test detail', 0, '1', '4', NULL, NULL),
(10, '5', '2', 1, 'test detail', 0, '1635258865.png', '4', NULL, NULL),
(11, '5', '2', 4, 'test detail', 0, '1635260374.jpg', '4', NULL, NULL),
(12, '5', '2', 1, 'test detail', 0, '1635260924.png', '3', NULL, NULL),
(13, '5', '2', 1, 'test detail', 0, '1', '4', NULL, NULL),
(20, '5', '3', 1, 'test detail', 0, '1635403532.jpg', '4', NULL, NULL),
(21, '5', '3', 1, 'test detail', 13, '1', '4', NULL, NULL),
(22, '5', '3', 1, 'test detail', 13, '1635424400.jpg', '4', NULL, NULL),
(23, '5', '3', 1, 'test detail', 12, '1635424768.png', '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_bank` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `restaurant_name`, `restaurant_bank`, `created_at`, `updated_at`) VALUES
(4, '6', 'สมชายไก่ย่าง', 'scb 123456789', '2021-10-27 07:30:41', '2021-10-27 07:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `provider_id`, `avatar`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rest', 'mail@mail.com', NULL, 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png', NULL, 0, '$2y$10$DuCladEBu8OYvw.EjW7vWO1Xc3ji5drLv4nbPraBe/M4Yf2ft1fzq', NULL, '2021-10-17 00:18:15', '2021-10-17 00:18:15'),
(2, 'test test', 'test@test.test', NULL, 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png', NULL, 0, '$2y$10$rGkAzJxpMAd8MexvxIsGH.rmtoZFBHyuOATeN7Yy/iJYEqUqcwbb.', NULL, '2021-10-19 06:13:00', '2021-10-19 06:13:00'),
(3, 'testuser', 'testuser@gmail.com', NULL, 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png', NULL, 0, '$2y$10$tyVzrZYAtbS61jedaWMs9.1Rs12q.fPqCyP64H1rtJH5pSy7xbj9a', NULL, '2021-10-23 22:12:54', '2021-10-23 22:12:54'),
(5, 'test2', 'test2@gmail.com', NULL, 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png', NULL, 0, '$2y$10$j50ABC9WF3ObmlWLswIgVOkj/U7.VpcNT82aqy0Hqh4aasLSXUb4.', NULL, '2021-10-26 07:19:22', '2021-10-26 07:19:22'),
(6, 'นายธนคม ยิ้มสอาด', 'test3@gmail.com', NULL, 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png', NULL, 0, '$2y$10$waLL9acolXsoV8KVse4aPeXGnGfJD5PUKhhl3wXtjEsoN5h3lrE4O', NULL, '2021-10-27 07:15:01', '2021-10-27 07:15:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
