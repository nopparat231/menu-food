-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 05:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_img` varchar(255) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_detail` varchar(255) NOT NULL,
  `menu_status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `restaurant_id`, `menu_name`, `menu_img`, `menu_price`, `menu_detail`, `menu_status`, `created_at`, `updated_at`) VALUES
(1, '5', '2', 'Pizza', 'https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '4', '1', 'กระเพราหมูสับ ไข่ดาว', 'https://cdn.pixabay.com/photo/2016/07/20/00/49/thailand-food-1529442_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '5', '2', 'Pizza', 'https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4', '1', 'กระเพราหมูสับ ไข่ดาว', 'https://cdn.pixabay.com/photo/2016/07/20/00/49/thailand-food-1529442_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5', '2', 'Pizza', 'https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '4', '1', 'กระเพราหมูสับ ไข่ดาว', 'https://cdn.pixabay.com/photo/2016/07/20/00/49/thailand-food-1529442_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '5', '2', 'Pizza', 'https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '4', '1', 'กระเพราหมูสับ ไข่ดาว', 'https://cdn.pixabay.com/photo/2017/12/09/08/18/pizza-3007395_960_720.jpg', 30, 'ทดสอบรายละเอียด', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_29_144947_create_menu', 2),
(5, '2021_04_29_145101_create_restaurant', 2),
(6, '2021_04_29_145627_create_orders', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `orders_detail` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `orders_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `menu_id`, `orders_detail`, `order_quantity`, `orders_status`, `created_at`, `updated_at`) VALUES
(73, 5, 8, 'test detail', 2, 3, '2021-07-03 14:03:47', '2021-07-03 07:52:18'),
(74, 5, 2, 'test detail', 1, 3, '2021-07-03 14:03:47', '2021-07-03 14:03:47'),
(75, 5, 8, 'test detail', 2, 3, '2021-07-03 15:16:22', '2021-07-03 15:16:22'),
(76, 5, 2, 'test detail', 1, 2, '2021-07-03 15:16:22', '2021-07-03 15:16:22'),
(77, 5, 1, 'test detail', 1, 2, '2021-07-03 15:16:22', '2021-07-03 15:16:22'),
(78, 5, 3, 'test detail', 1, 2, '2021-07-03 15:16:22', '2021-07-03 15:16:22'),
(79, 5, 7, 'test detail', 1, 2, '2021-07-03 15:16:22', '2021-07-03 15:16:22'),
(80, 5, 6, 'test detail', 1, 3, '2021-07-03 15:33:42', '2021-07-03 15:33:42'),
(81, 5, 4, 'test detail', 2, 1, '2021-07-03 15:33:42', '2021-07-03 15:33:42'),
(82, 5, 3, 'test detail', 1, 0, '2021-07-03 15:33:42', '2021-07-03 15:33:42'),
(83, 5, 8, 'test detail', 1, 2, '2021-07-03 15:39:37', '2021-07-03 15:39:37'),
(84, 5, 8, 'test detail', 2, 1, '2021-07-04 14:18:25', '2021-07-04 14:18:25'),
(85, 5, 2, 'test detail', 1, 1, '2021-07-04 14:18:25', '2021-07-04 14:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$6scGjrgVVdYuBK5uhA6vcOk6V2qNNkQa5FcesY/1W5OFFP3S4UsNe', '2021-06-22 08:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `restaurant_name`, `created_at`, `updated_at`) VALUES
(1, '4', 'ร้านป้าน้อย ข้าวมันไก่', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '5', 'ร้านสมพร ตามสั่ง', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '6', 'test ชื่อร้าน 1', '2021-07-06 14:15:39', '2021-07-06 14:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$8CUBIfU3OfZXPJn6sa91luN/PGtHc6nracf2EGJsBcJzJ7iHpTuoC', NULL, '2021-04-27 06:59:47', '2021-04-27 06:59:47'),
(4, 'User', 'user@user.com', NULL, 0, '$2y$10$EI6691bzgLrsGg2Dit1TVe53i3/sfblM.CqZk31wr7z1xLeLHxV6a', NULL, '2021-04-27 06:59:47', '2021-04-27 06:59:47'),
(5, 'test1', 'test1@test1.com', NULL, 0, '$2y$10$/WnHRQyXSeMRGLzPUfijteQvsO8Wjqr4Ay.LQjq0QIVKT1P1CrVNO', NULL, '2021-04-27 07:19:26', '2021-04-27 07:19:26'),
(6, 'test11', 'test11@mail.com', NULL, 0, '$2y$10$JB6/zfAYE2g2vjn09L6j7utd2hqmwUeHmrBstr81ahmlSaHBGCeRa', NULL, '2021-07-06 06:07:39', '2021-07-06 06:07:39');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
