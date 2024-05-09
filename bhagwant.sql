-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 01:52 PM
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
(1, '1', 'Red', '1', NULL, '2024-04-01 06:03:33', '2024-04-01 06:03:33'),
(2, '1', 'Black', '1', NULL, '2024-04-01 06:03:35', '2024-04-01 06:03:35'),
(3, '1', 'Blue', '1', NULL, '2024-04-01 06:03:40', '2024-04-01 06:03:40'),
(4, '1', 'Coffee', '1', NULL, '2024-04-02 10:01:02', '2024-04-02 10:01:19');

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
  `pcs` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `embroidery_action` varchar(255) DEFAULT NULL,
  `party_name` varchar(255) DEFAULT NULL,
  `overlock_action` varchar(255) DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '1', 'S', '1', NULL, '2024-04-01 06:03:22', '2024-04-01 06:03:22'),
(2, '1', 'M', '1', NULL, '2024-04-01 06:03:24', '2024-04-01 06:03:24'),
(3, '1', 'L', '1', NULL, '2024-04-01 06:03:28', '2024-04-01 06:03:28'),
(4, '1', 'XL', '1', NULL, '2024-04-01 06:03:29', '2024-04-01 06:03:29'),
(5, '1', '2XL', '1', NULL, '2024-04-02 10:00:26', '2024-04-02 10:00:26'),
(6, '1', '3XL', '1', NULL, '2024-04-02 10:00:31', '2024-04-02 10:00:31'),
(7, '1', '4XL', '1', NULL, '2024-04-02 10:00:34', '2024-04-02 10:33:02');

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
(1, 'Admin', 'admin@gmail.com', '1234567890', '2024-03-08 05:12:07', '$2y$10$3u6UPG3ke1w18akstfy8Se1KGGrwPyhmAx1Cu60CuvDKN24zdd.1u', 'admin@gmail.com', 'Admin', '0', 'SOXQ3fyXjzXYNRxOp8lDQVZPWca7JKPph7aYQ3ok5872P5UweJrF1LqGLsFO', '2024-03-08 05:12:07', '2024-03-08 05:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `worker_code` varchar(255) DEFAULT NULL,
  `role` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `created_by_id`, `name`, `worker_code`, `role`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'JASWINDER - 2', '12', '[\"Cutting\"]', '1', NULL, '2024-04-02 10:07:57', '2024-05-01 04:53:14'),
(2, '1', 'GAUTAM MAURYA', '123', '[\"Printing\\/Embroidery\"]', '1', NULL, '2024-04-02 10:09:01', '2024-05-01 04:53:36'),
(3, '1', 'ANIL', '1231', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:09:15', '2024-05-01 04:53:43'),
(4, '1', 'RAJU', '3123', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:09:26', '2024-05-01 04:53:50'),
(5, '1', 'SANOJ', '123123', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:10:12', '2024-05-01 04:53:58'),
(6, '1', 'ROHIT', '123123', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:10:20', '2024-05-01 04:54:05'),
(7, '1', 'VINOD', '12312', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:10:26', '2024-05-01 04:54:12'),
(8, '1', 'RISHI', '5123', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:10:33', '2024-05-01 04:53:29'),
(9, '1', 'DEEPAK', '123123', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:10:40', '2024-05-01 04:53:07'),
(10, '1', 'ROHIT 2', '1231121', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:11:05', '2024-05-01 04:53:02'),
(11, '1', 'RAMVIJAY', '12311', '[\"Sewing Machine\"]', '1', NULL, '2024-04-02 10:12:20', '2024-05-01 04:52:57'),
(12, '1', 'MOHIT', '1231111', '[\"Overlock\"]', '1', NULL, '2024-04-02 10:13:08', '2024-05-01 04:52:51'),
(13, '1', 'SANJAY', '123123123', '[\"Overlock\"]', '1', NULL, '2024-04-02 10:13:19', '2024-05-01 04:52:45'),
(14, '1', 'UDAY', '31', '[\"Thread Cutting\"]', '1', NULL, '2024-04-02 10:14:12', '2024-05-01 04:52:39'),
(15, '1', 'RAHUL JAIN', '12312', '[\"Kaj Button\"]', '1', NULL, '2024-04-02 10:14:35', '2024-05-01 04:52:32'),
(16, '1', 'VIJAY', '1', '[\"Press\"]', '1', NULL, '2024-04-02 10:14:50', '2024-05-01 04:52:26'),
(17, '1', 'UDAY (PACKING)', '1', '[\"Packing\"]', '1', NULL, '2024-04-02 10:15:26', '2024-05-01 04:52:17');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot_nos`
--
ALTER TABLE `lot_nos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot_no_activities`
--
ALTER TABLE `lot_no_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
