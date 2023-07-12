-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2023 at 11:08 PM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.3.33-11+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inches` float NOT NULL,
  `screenresolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `memory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `company`, `product`, `typename`, `inches`, `screenresolution`, `cpu`, `ram`, `memory`, `gpu`, `opsis`, `weight`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'MacBook Pro', 'Ultrabook', 13.3, 'IPS Panel Retina Display 2560x1600', 'Intel Core i5 2,3GHz', '8GB', '128GB SSD', 'Intel Iris Plus Graphics 640', 'macOs', '1.37kg', 21960500, '2023-06-30 07:46:30', '2023-06-30 07:46:30'),
(2, 'Apple', 'MacBook Air', 'Ultrabook', 13.3, '1440x900', 'Intel Core i5 1,8GHz', '8GB', '128GB Flash Storage', 'Intel HD Graphics 6000', 'macOs', '1.34kg', 14735600, '2023-06-30 07:47:38', '2023-06-30 07:47:38'),
(3, 'HP', '250 G6', 'Notebook', 15.6, 'IPS Panel Retina Display 2880x1800', 'Intel Core i7 2,7GHz', '8GB', '256GB SSD', 'AMD Radeon Pro 455', 'No OS', '1.86kg', 9425520, '2023-06-30 07:47:38', '2023-06-30 07:47:38'),
(4, 'Apple', 'MacBook Pro', 'Ultrabook', 15.4, 'IPS Panel Retina Display 2880x1800', 'Intel Core i7 2,7GHz', '16GB', '512GB SSD', 'Intel HD Graphics 620', 'macOs', '1.83kg', 41594400, '2023-06-30 07:47:38', '2023-06-30 07:47:38'),
(5, 'Apple', 'MacBook Pro', 'Ultrabook', 13.3, 'IPS Panel Retina Display 2560x1600', 'Intel Core i5 3,1GHz', '8GB', '256GB SSD', 'Intel Iris Plus Graphics 650', 'macOs', '1.37kg', 29565000, '2023-06-30 07:47:38', '2023-06-30 07:47:38'),
(6, 'Acer', 'Aspire 3', 'Notebook', 15.6, '1366x768', 'AMD A9-Series 9420 3GHz', '4GB', '500GB HDD', 'AMD Radeon R5', 'Windows 10', '2.1kg', 6556880, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(7, 'Apple', 'MacBook Pro', 'Ultrabook', 15.4, 'IPS Panel Retina Display 2880x1800', 'Intel Core i7 2,2GHz', '16GB', '256GB Flash Storage', 'Intel Iris Pro Graphics', 'Mac OS X', '2.04kg', 35078800, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(8, 'Apple', 'Macbook Air', 'Ultrabook', 13.3, '1440x900', 'Intel Core i5 1,8GHz', '8GB', '256GB Flash Storage', 'Intel HD Graphics 6000', 'macOS', '1.34kg', 18993600, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(9, 'Asus', 'ZenBook UX430UN', 'Ultrabook', 14, 'Full HD 1920x1080', 'Intel Core i7 8550U 1,8GHz', '16GB', '512GB SSD', 'Nvidia GeForce MX150', 'Windows 10', '1.3kg', 24506300, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(10, 'Acer', 'Swift 3', 'Ultrabook', 14, 'IPS Panel Full HD 1920x1080', 'Intel Core i5 8250U 1,6GHz', '8GB', '256GB SSD', 'Intel UHD Graphics 620', 'Windows 10', '1.6kg', 12622000, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(11, 'HP', '250 G6', 'Notebook', 15.6, '1366x768', 'Intel Core i5 7200U 2,5GHz', '4GB', '500GB HDD', 'Intel HD Graphics 620', 'No OS', '1.86kg', 6456890, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(12, 'HP', '250 G6', 'Notebook', 15.6, 'Full HD 1920x1080', 'Intel Core i3 6006U 2GHz', '4GB', '500GB HDD', 'Intel HD Graphics 520', 'No OS', '1.86kg', 5655140, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(13, 'Apple', 'MacBook Pro', 'Ultrabook', 15.4, 'IPS Panel Retina Display 2880x1800', 'Intel Core i7 2,8GHz', '16GB', '256GB SSD', 'AMD Radeon Pro 555', 'macOS', '1.83kg', 39996500, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(14, 'Dell', 'Inspiron 3567', 'Notebook', 15.6, 'Full HD 1920x1080', 'Intel Core i3 6006U 2GHz', '4GB', '256GB SSD', 'AMD Radeon R5 M430', 'Windows 10', '2.2kg', 8178070, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(15, 'Apple', 'MacBook 12\"', 'Ultrabook', 12, 'IPS Panel Retina Display 2304x1440', 'Intel Core M m3 1,2GHz', '8GB', '256GB SSD', 'Intel HD Graphics 615', 'macOS', '0.92kg', 20693500, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(16, 'Apple', 'MacBook Pro', 'Ultrabook', 13.3, 'IPS Panel Retina Display 2560x1600', 'IIntel Core i5 2,3GHz', '8GB', '256GB SSD', 'Intel Iris Plus Graphics 640', 'macOS', '1.37kg', 24892400, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(17, 'Dell', 'Inspiron 3567', 'Notebook', 15.6, 'Full HD 1920x1080', 'Intel Core i7 7500U 2,7GHz', '8GB', '256GB SSD', 'AMD Radeon R5 M430', 'Windows 10', '2.2kg', 12212200, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(18, 'Dell', 'Inspiron 3567', 'Notebook', 15.6, 'Full HD 1920x1080', 'Intel Core i3 6006U 2GHz', '4GB', '256GB SSD', 'AMD Radeon R5 M430', 'Windows 10', '2.2kg', 8178070, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(19, 'Apple', 'MacBook Pro', 'Ultrabook', 15.4, 'IPS Panel Retina Display 2880x1800', 'Intel Core i7 2,9GHz', '16GB', '512GB SSD', 'AMD Radeon Pro 560', 'macOS', '1.83kg', 46848900, '2023-07-10 17:00:00', '2023-07-10 17:00:00'),
(20, 'Lenovo', 'IdeaPad 320-15IKB', 'Notebook', 15.6, 'Full HD 1920x1080', 'Intel Core i3 7100U 2,4GHz', '8GB', '1TB HDD', 'Nvidia GeForce 940MX', 'No OS', '2.2kg', 8179710, '2023-07-10 17:00:00', '2023-07-10 17:00:00');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_23_144625_create_laptops_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
