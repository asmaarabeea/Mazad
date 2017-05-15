-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 11:09 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mazad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_30_210245_create_users_products_table', 1),
(4, '2017_03_30_235311_create_user_id_to_products_table', 1),
(5, '2017_04_01_193830_add_column_location_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(10) UNSIGNED NOT NULL,
  `productName` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(30) NOT NULL,
  `online` tinyint(1) NOT NULL DEFAULT '1',
  `highest_bid` int(11) NOT NULL,
  `no_of_bid` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `productName`, `product_desc`, `product_img`, `price`, `online`, `highest_bid`, `no_of_bid`, `user_id`) VALUES
(15, 'BMW I8', 'concept car 2015', 'images/uxKD3qaDEhdxhY1A5Z7D2QVjHs3820ouZJ6KtEuD.jpeg', 2500000, 1, 0, 0, 1),
(16, 'House', 'Valuable House for sale', 'images/God8M6MzulK7LSHrOehXx4QzGfAdWUjBGi9DXYzb.jpeg', 35000000, 1, 0, 0, 1),
(17, 'BMW I8', 'Concept car 2015', 'images/vBN0vnGTAcTBZ853hWcmF4bOxAOxxKIrirGUFkj7.jpeg', 35000000, 1, 0, 0, 2),
(18, 'House', 'Richest house for sale', 'images/Lvm7Sw5sursnmNdlRt2q4dCvYCRKYZPzNIdwzI1n.jpeg', 45000000, 1, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `location`) VALUES
(1, 'amany', 'amany@gmail.com', '$2y$10$OffDlgrCs3Z2FDLCBYhU3O97.8OsWQntUK8JQZiBn86Ls6m.zI4Iq', 'q6sVZfJG7LDJKaxbQuuNKpsGVHJVPGjmkzVulfaY7eSlROHUnREiu4dcmXi7', '2017-03-31 16:03:37', '2017-04-02 12:28:12', 'alexandria'),
(2, 'asmaa', 'asmaa@gmail.com', '$2y$10$loKOWeu39VV6.6.I2Ce3h.FBFb/wOFiScOXF5cOKoEermTsua0v9G', '3H4vgBShFA3lz1GOD37jVQvWAQxdfkmY5B9RXHWudbb2qUaja5AK3Babmnkj', '2017-04-01 18:58:18', '2017-04-02 21:08:10', 'alexandria'),
(3, 'ahmed', 'ahmedmagdi@yahoo.com', '$2y$10$aspbMl28IwA8Ct.BclU3Auf1Xx9VTqXAYT4bvuB8Hx2z9tmUggI7G', '5GULsskFmtTxynSWmRdvm1NOhH8Zy6cziyXJb0orJa34rxIux330yDvKHrEE', '2017-04-01 19:11:51', '2017-04-01 19:11:51', 'zakzik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
