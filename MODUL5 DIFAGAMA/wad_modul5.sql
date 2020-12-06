-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 03:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_modul5`
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
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_12_04_011119_create_products_table', 1),
(9, '2020_12_04_014351_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `amount`, `buyer_name`, `buyer_contact`, `created_at`, `updated_at`) VALUES
(1, 4, 369, 'maxim', '0929i203i2', '2020-12-05 08:19:13', '2020-12-05 08:19:13'),
(2, 4, 61500, 'alexia', '@rocket', '2020-12-05 08:20:29', '2020-12-05 08:20:29'),
(3, 4, 30750, 'dummy', 'po box. 303434', '2020-12-05 08:23:06', '2020-12-05 08:23:06'),
(4, 4, 30750, 'dummy', 'po box. 303434', '2020-12-05 08:24:00', '2020-12-05 08:24:00'),
(5, 4, 6150, 'dummy2', 'po box. 275213', '2020-12-05 08:25:39', '2020-12-05 08:25:39'),
(6, 5, 311.04, 'sally', '@mars', '2020-12-05 16:23:59', '2020-12-05 16:23:59'),
(7, 5, 69.12, 'grace', 'here my contact', '2020-12-05 16:28:16', '2020-12-05 16:28:16'),
(8, 5, 34.56, 'nancy', '@upper', '2020-12-05 16:42:48', '2020-12-05 16:42:48'),
(9, 5, 449.28, 'ahmad', '@ksa', '2020-12-05 16:45:59', '2020-12-05 16:45:59'),
(10, 1, 1078, 'bonjour', '(0934) 30399035', '2020-12-05 16:55:22', '2020-12-05 16:55:22'),
(11, 1, 44, 'jisoo', '@skbp', '2020-12-05 18:31:40', '2020-12-05 18:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `stock`, `img_path`, `created_at`, `updated_at`) VALUES
(1, 'Blueberries Smoothie with Apple', 11, 'Hmmm, very yummy smoothie made from fresh blueberries and drink it with a fresh apple', 398, 'https://images.unsplash.com/photo-1532301791573-4e6ce86a085f?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', '2020-12-05 08:11:09', '2020-12-05 18:31:40'),
(2, 'Xonstruction V4', 2525, 'amerta queie vieuT', 143, '12051607185016.jpg', '2020-12-05 08:16:56', '2020-12-05 08:16:56'),
(3, 'Tesla Car', 24546, 'lorem dolor amet', 32, '12051607185060.jpg', '2020-12-05 08:17:40', '2020-12-05 08:17:40'),
(4, 'Airport', 124, 'Praesent et tristique magna', 200, '12051607185119.jpg', '2020-12-05 08:18:39', '2020-12-05 18:17:29'),
(5, 'Creeper', 34.56, 'erererere', 0, '12061607213759.jpg', '2020-12-05 16:15:59', '2020-12-05 18:17:47'),
(6, 'Apple', 3445, 'you know this brand', 45, '12061607215795.jpg', '2020-12-05 16:49:55', '2020-12-05 18:18:03');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
