-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 06:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('member','reseller') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `type`) VALUES
(1, 'Mesyl Concoles', 'reseller'),
(2, 'Love Napoles', 'reseller'),
(3, 'Jayne Clementer', 'reseller'),
(4, 'Karla Manzanares', 'reseller'),
(5, 'Cleo Ramayla', 'reseller'),
(6, 'Gelli Anne D. Onggona', 'member'),
(7, 'Rema Lais Caddy', 'member'),
(8, 'Al Saima T. Macarimbang', 'member'),
(9, 'Janet L. Dela Pena', 'member'),
(10, 'Hanina S. Ramos', 'member'),
(11, 'Rovelyn T. Palacio', 'member'),
(12, 'Janette Gardose', 'member'),
(13, 'Artrose Mae M. Antogop', 'member'),
(14, 'Marialyn Elva', 'member'),
(15, 'Rhea C. Rebong', 'member'),
(16, 'Virgil C. Madarang', 'member'),
(17, 'May Kristine G. Querencia', 'member'),
(18, 'Catherine L. Cawaling', 'member'),
(19, 'Marybel E. Ecarma', 'member'),
(20, 'Genevieve Dumlao', 'member'),
(21, 'John Canoy', 'member'),
(22, 'Aline Gay P. Sarong\'', 'member'),
(23, 'Kimberly Autido', 'member'),
(24, 'Ann Nicole Estoquia', 'member'),
(25, 'Suzy Parteble', 'member'),
(26, 'Imee Jim Dabalus', 'member'),
(27, 'Hazel Echalas', 'member'),
(28, 'Ana Marie Limbago', 'member'),
(29, 'Lydie Charl Galvez', 'member'),
(30, 'Rodelyn Adlao', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `branch_id`, `stocks`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 17, '2018-04-09 00:53:52', '2018-04-03 00:53:52'),
(2, 6, 1, 42, '2018-04-10 00:53:53', '2018-04-03 00:53:53'),
(3, 13, 3, 50, '2018-04-09 00:55:23', '2018-04-03 00:55:23'),
(4, 6, 3, 100, '2018-04-13 00:55:23', '2018-04-03 00:55:23'),
(5, 2, 1, 17, '2018-04-09 03:24:46', '2018-04-09 03:24:46'),
(6, 6, 1, 42, '2018-04-09 03:24:46', '2018-04-09 03:24:46'),
(7, 2, 1, 17, '2018-04-09 03:27:20', '2018-04-09 03:27:20'),
(8, 6, 1, 42, '2018-04-09 03:27:20', '2018-04-09 03:27:20'),
(9, 2, 1, 17, '2018-04-07 16:00:00', '2018-04-09 03:28:23'),
(10, 6, 1, 42, '2018-04-07 16:00:00', '2018-04-09 03:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_sales`
--

CREATE TABLE `inventory_sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_sales`
--

INSERT INTO `inventory_sales` (`id`, `store_id`, `sales`, `created_at`, `updated_at`) VALUES
(1, 1, 5850, '2018-04-09 03:49:07', '2018-04-09 03:49:07');

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
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2017_09_12_041446_create_table_products', 2),
(4, '2017_09_12_051346_add_soft_delete_in_table_products', 3),
(6, '2017_09_23_235203_create_table_product_stocks', 4),
(7, '2017_09_24_045325_create_table_branch', 5),
(8, '2017_09_26_030227_add_role_in_users_table', 6),
(9, '2017_09_29_052308_create_table_store', 7),
(10, '2017_09_29_093701_create_table_customer', 8),
(13, '2017_10_21_103446_change_column_name_in_table_products', 9),
(14, '2017_12_26_023323_create_table_sales', 10),
(15, '2018_03_04_011218_add_column_branch_id_in_table_sales', 11),
(16, '2018_03_04_014530_add_column_user_id_in_table_stores', 12),
(17, '2018_03_04_015603_add_column_store_id_in_table_product_stocks', 13),
(18, '2018_03_12_112534_create_requests_table', 14),
(19, '2018_04_02_235100_create_table_inventory', 15),
(20, '2018_04_03_000356_add_column_branch_id_in_table_inventory', 16),
(21, '2018_04_09_030857_create_inventory_sales_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retailers_price` int(11) NOT NULL,
  `members_price` int(11) NOT NULL,
  `resellers_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `retailers_price`, `members_price`, `resellers_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Carrot Soap', 110, 75, 75, NULL, NULL, NULL),
(2, 'C&C', 110, 75, 55, NULL, NULL, NULL),
(3, 'Glutapink Soap', 120, 85, 65, NULL, NULL, NULL),
(4, 'Peeling Soap', 100, 85, 65, NULL, NULL, NULL),
(5, 'Ultra White Soap', 100, 85, 65, NULL, NULL, NULL),
(6, 'Glutamilk Soap', 100, 85, 65, NULL, NULL, NULL),
(7, 'Eraser Soap', 100, 80, 60, NULL, NULL, NULL),
(8, 'Kojic Soap', 120, 85, 65, NULL, NULL, NULL),
(9, 'Night Cream', 90, 65, 55, NULL, NULL, NULL),
(10, 'Day Cream', 150, 120, 90, NULL, NULL, NULL),
(11, 'Collagen Cream', 95, 65, 55, NULL, NULL, NULL),
(12, 'Sunblock Cream', 95, 70, 60, NULL, NULL, NULL),
(13, 'Aloe Vera Cream', 99, 85, 70, '2017-09-14 04:33:20', '2017-09-14 04:33:20', NULL),
(14, 'Charcoal Soap', 98, 80, 75, '2017-09-23 15:43:31', '2017-09-23 15:43:31', NULL),
(15, 'Skinmate Sharkoil', 100, 95, 90, '2017-09-23 15:47:54', '2017-09-23 15:47:54', NULL),
(16, 'Loreal Shampoo', 99, 90, 85, '2017-09-23 15:48:54', '2017-09-23 15:48:54', NULL),
(17, 'Glutamax', 2000, 1800, 1500, '2017-09-23 16:35:09', '2017-09-23 16:35:09', NULL),
(18, 'Glutamax Power', 9000, 8000, 7000, '2017-09-23 16:37:54', '2017-09-23 16:37:54', NULL),
(19, 'Angels Soap', 99, 90, 85, '2017-09-23 20:45:51', '2017-09-23 20:45:51', NULL),
(20, 'Skinol', 90, 78, 50, '2018-02-27 19:20:14', '2018-02-27 19:20:14', NULL),
(21, 'Real Leaf', 25, 22, 20, '2018-03-03 19:42:40', '2018-03-03 19:42:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `stocks` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `store_id`, `product_id`, `stocks`, `created_at`, `updated_at`) VALUES
(10, 1, 2, 17, '2018-03-07 21:37:26', '2018-04-01 22:58:50'),
(11, 1, 6, 42, '2018-03-07 21:37:37', '2018-03-31 22:09:57'),
(12, 3, 13, 50, '2018-03-09 16:30:39', '2018-03-09 23:53:44'),
(13, 3, 6, 100, '2018-03-22 23:13:14', '2018-03-22 23:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productStocks` int(11) NOT NULL,
  `status` enum('granted','ungranted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `store_id`, `product_id`, `productStocks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 89, 'ungranted', '2018-03-12 03:37:07', '2018-03-12 03:37:07'),
(2, 1, 1, 80, 'ungranted', '2018-03-14 20:56:11', '2018-03-14 20:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `branch_id`, `product_id`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 10, 1100, '2018-04-08', '2018-03-31 22:09:57'),
(2, 1, 6, 20, 2000, '2018-04-08', '2018-03-31 22:09:57'),
(3, 1, 2, 5, 550, '2018-04-08', '2018-03-31 22:11:44'),
(4, 1, 2, 20, 2200, '2018-04-08', '2018-04-01 22:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) UNSIGNED NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `province`, `city`, `street`, `landmark`, `sales`, `created_at`, `updated_at`) VALUES
(1, 'Davao Del Sur', 'Digos City', 'Bajada Street', 'Gmall Bajada', 90000, '2017-09-28 22:38:10', '2017-09-28 22:38:10'),
(2, 'Davao Del Sur', 'Davao City', 'Skintouch, Jacinto St. (Ateneo), Corner Padre Gomez', 'In between Eufloria and convenience store', 0, '2017-09-28 23:40:30', '2017-09-28 23:40:30'),
(3, 'Davao Del Norte', 'Tagum CIty', 'Abby Beauty Salon, Corner Zafra Highway, Apokon Road', 'In front of Mayor Uy\'s residence', 0, '2017-09-28 23:52:15', '2017-09-28 23:52:15'),
(4, 'Davao Del Norte', 'Maniki', 'Skintouch, Door 10&11, Socorro Complex', 'Beside Js Gaisano', 0, '2017-09-28 23:53:32', '2017-09-28 23:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `store_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 1, 'Mayordoma Jonalyn', 'jownalien@yahoo.com', '$2y$10$9Y8IL11jG4zCO9Yn3rA1H.nkDMGCMiWqVJI4ypAsTEiXo3V5uBApG', 'pywZvB8HOa2Y0x4IqYaFb8x1mOe4bRiWbZ77plApSuX3fVoiPu7tltLJrZJq', NULL, NULL, 0),
(3, 0, 'Maam Jonalyn Sabas', 'jownalien@gmail.com', '$2y$10$dIYIbrzQgxLS00cnyAwkMOiKC76Slwdd/U9IaF9nOu3PZ2tRqBf9S', 'rbMZeaqua0rG2MIud2a5uvzrrQZtemOH1SGOV5PlYXGyhQuy4VT3xuugCOVt', NULL, NULL, 1),
(4, 3, 'Justin Cedeno', 'cedeojustin@yahoo.com', '$2y$10$XOHr1ZVWer/grl.h95Mij./5IO4jO4txgiRB8ekidUbtzXKnGRUeG', 'xtlwzsuj3DfskFCuoqvhkZG8CNBEVYxIdYaI6ykEtzAumpWdRAoeX0eNNWdC', '2018-03-09 16:29:42', '2018-03-09 16:29:42', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_sales`
--
ALTER TABLE `inventory_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `inventory_sales`
--
ALTER TABLE `inventory_sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
