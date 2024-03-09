-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 08:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhagwant`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `created_by_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'Red', '1', NULL, '2024-03-08 05:30:57', '2024-03-08 05:30:57'),
(2, '1', 'Green', '1', NULL, '2024-03-08 05:31:01', '2024-03-08 05:31:01'),
(3, '1', 'Blue', '1', NULL, '2024-03-08 05:31:03', '2024-03-08 05:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `lot_nos`
--

CREATE TABLE `lot_nos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `lot_no` varchar(255) DEFAULT NULL,
  `color_id` varchar(255) DEFAULT NULL,
  `size_id` varchar(255) DEFAULT NULL,
  `pcs` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `press` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_complete` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lot_nos`
--

INSERT INTO `lot_nos` (`id`, `created_by_id`, `lot_no`, `color_id`, `size_id`, `pcs`, `gender`, `press`, `status`, `is_complete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'LN-0001', '1', '4', '4', 'Male', 'No', 'Packing', '1', NULL, '2024-03-08 06:28:23', '2024-03-09 13:28:26'),
(2, '1', 'LN-0002', '1', '5', '6', 'Male', 'Yes', 'Sewing Mech.', '0', NULL, '2024-03-08 06:28:50', '2024-03-09 13:41:25'),
(3, '1', 'LN-0003', '1', '4', '4', 'Female', 'Yes', 'Overlock', '0', NULL, '2024-03-08 06:36:36', '2024-03-09 13:41:04'),
(4, '1', 'LN-0004', '1', '3', '57', 'Female', 'No', 'Packing', '1', NULL, '2024-03-08 07:45:32', '2024-03-09 13:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `lot_no_activities`
--

CREATE TABLE `lot_no_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `lot_no_id` varchar(255) DEFAULT NULL,
  `worker_id` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `embroidery_action` varchar(255) DEFAULT NULL,
  `party_name` varchar(255) DEFAULT NULL,
  `overlock_action` varchar(255) DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lot_no_activities`
--

INSERT INTO `lot_no_activities` (`id`, `created_by_id`, `lot_no_id`, `worker_id`, `action`, `price`, `embroidery_action`, `party_name`, `overlock_action`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '1', 'Cutting', '1000', NULL, NULL, NULL, 'zdgdfg dsgdrg gfhfghg', NULL, '2024-03-08 07:45:32', '2024-03-09 13:12:17'),
(2, '1', '3', '1', 'Cutting', '151', NULL, NULL, NULL, 'sdvdfsvdf', NULL, '2024-03-08 07:51:01', '2024-03-09 13:29:19'),
(3, '1', '2', '1', 'Cutting', '155', NULL, NULL, NULL, 'dvfdgv', NULL, '2024-03-08 08:03:14', '2024-03-09 13:29:25'),
(4, '1', '1', '1', 'Cutting', '400', NULL, NULL, NULL, 'jyjyujyt', NULL, '2024-03-08 08:03:21', '2024-03-09 13:18:30'),
(5, NULL, '4', '2', 'Embroidery', '1500', 'In Source', 'Test Party', NULL, 'dvfdrgvre', NULL, '2024-03-09 07:03:28', '2024-03-09 12:54:40'),
(6, NULL, '4', '3', 'Sewing Mech.', '1000', NULL, NULL, NULL, NULL, NULL, '2024-03-09 12:58:52', '2024-03-09 12:58:52'),
(7, NULL, '4', '4', 'Overlock', '300', NULL, NULL, NULL, 'dbf', NULL, '2024-03-09 12:59:20', '2024-03-09 12:59:20'),
(8, NULL, '4', '6', 'Thread Cutting', '15000', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:09:07', '2024-03-09 13:09:22'),
(9, NULL, '1', '2', 'Embroidery', '15871', 'In Source', 'Test Party', NULL, 'zdcds', NULL, '2024-03-09 13:20:33', '2024-03-09 13:27:13'),
(10, NULL, '1', '3', 'Sewing Mech.', '54987', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:20:42', '2024-03-09 13:20:42'),
(11, NULL, '1', '4', 'Overlock', '4874', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:20:48', '2024-03-09 13:20:48'),
(12, NULL, '1', '5', 'Kaj Button', '56565', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:21:03', '2024-03-09 13:21:03'),
(13, NULL, '1', '6', 'Thread Cutting', '546456', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:21:09', '2024-03-09 13:21:09'),
(14, NULL, '1', '8', 'Packing', '6646456', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:21:15', '2024-03-09 13:21:15'),
(15, NULL, '4', '8', 'Packing', '466', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:30:08', '2024-03-09 13:30:08'),
(16, NULL, '3', '2', 'Embroidery', '582', 'In Source', NULL, NULL, NULL, NULL, '2024-03-09 13:31:38', '2024-03-09 13:31:38'),
(17, NULL, '3', '3', 'Sewing Mech.', '45855', NULL, NULL, NULL, NULL, NULL, '2024-03-09 13:31:44', '2024-03-09 13:31:44'),
(18, NULL, '3', '4', 'Overlock', '345', NULL, NULL, NULL, 'hvhv', NULL, '2024-03-09 13:41:04', '2024-03-09 13:41:04'),
(19, NULL, '2', '3', 'Sewing Mech.', '555', 'In Source', NULL, NULL, NULL, NULL, '2024-03-09 13:41:25', '2024-03-09 13:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_03_08_104614_create_sizes_table', 2),
(6, '2024_03_08_105902_create_colors_table', 3),
(8, '2024_03_08_111418_create_workers_table', 4),
(9, '2024_03_08_114119_create_lot_nos_table', 5),
(11, '2024_03_08_125732_create_lot_no_activities_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `created_by_id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'S', '1', NULL, '2024-03-08 05:27:00', '2024-03-08 05:27:00'),
(2, '1', 'M', '1', NULL, '2024-03-08 05:27:04', '2024-03-08 05:27:04'),
(3, '1', 'L', '1', NULL, '2024-03-08 05:27:06', '2024-03-08 05:27:06'),
(4, '1', 'XL', '1', NULL, '2024-03-08 05:27:08', '2024-03-08 05:27:19'),
(5, '1', 'XXL', '1', NULL, '2024-03-08 05:27:12', '2024-03-08 05:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `show_password` varchar(255) NOT NULL,
  `role_as` varchar(255) NOT NULL,
  `created_by_id` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `show_password`, `role_as`, `created_by_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234567890', '2024-03-08 05:12:07', '$2y$10$3u6UPG3ke1w18akstfy8Se1KGGrwPyhmAx1Cu60CuvDKN24zdd.1u', 'admin@gmail.com', 'Admin', '0', 'LeTvv1zrQk', '2024-03-08 05:12:07', '2024-03-08 05:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `created_by_id`, `name`, `phone`, `role`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'Cutting Master 1', '1234567890', 'Cutting', '1', NULL, '2024-03-08 05:50:20', '2024-03-08 05:51:29'),
(2, '1', 'Embroidery 1', '1234567890', 'Embroidery', '1', NULL, '2024-03-08 05:52:04', '2024-03-08 05:52:04'),
(3, '1', 'Sewing Mech. 1', '1234567890', 'Sewing Mech.', '1', NULL, '2024-03-08 05:52:18', '2024-03-08 05:52:18'),
(4, '1', 'Overlock 1', '1234567890', 'Overlock', '1', NULL, '2024-03-08 05:52:29', '2024-03-08 05:52:29'),
(5, '1', 'Kaj Button 1', '1234567890', 'Kaj Button', '1', NULL, '2024-03-08 05:52:41', '2024-03-08 05:52:41'),
(6, '1', 'Thread Cutting 1', '1234567890', 'Thread Cutting', '1', NULL, '2024-03-08 05:52:54', '2024-03-08 05:52:54'),
(7, '1', 'Press 1', '1234567890', 'Press', '1', NULL, '2024-03-08 05:53:03', '2024-03-08 05:53:59'),
(8, '1', 'Packing 1', '1234567890', 'Packing', '1', NULL, '2024-03-08 05:53:53', '2024-03-08 05:53:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lot_nos`
--
ALTER TABLE `lot_nos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_no_activities`
--
ALTER TABLE `lot_no_activities`
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
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot_nos`
--
ALTER TABLE `lot_nos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lot_no_activities`
--
ALTER TABLE `lot_no_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
