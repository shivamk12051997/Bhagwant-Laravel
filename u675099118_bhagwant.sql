-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2024 at 11:52 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u675099118_bhagwant`
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
(4, '1', 'Coffee', '1', NULL, '2024-04-02 10:01:02', '2024-04-02 10:01:19'),
(5, '1', 'NA', '1', NULL, '2024-05-03 14:25:54', '2024-05-03 14:25:54');

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
(1, '1', 'Quia commodo volupta', '2', '15', '95', 'Female', 'Yes', 'Cutting', NULL, '2024-05-03 13:16:36', '2024-05-03 13:16:24', '2024-05-03 13:16:36'),
(2, '1', '530', '3', '49', '70', 'Male', 'Yes', 'Cutting', NULL, '2024-05-03 13:49:36', '2024-05-03 13:24:36', '2024-05-03 13:49:36'),
(3, '1', '31', '3', '10', '70', 'Male', 'No', 'Packing', '1', '2024-05-03 16:15:46', '2024-05-03 13:52:46', '2024-05-03 16:15:46'),
(4, '1', '32', '3', '9', '70', 'Male', 'No', 'Packing', '1', '2024-05-03 16:15:42', '2024-05-03 14:16:27', '2024-05-03 16:15:42'),
(5, '1', '111', '5', '49', '36', 'Female', 'Yes', 'Packing', '1', '2024-05-03 16:15:50', '2024-05-03 14:26:51', '2024-05-03 16:15:50'),
(6, '1', '31', '5', '9', '70', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 16:19:33', '2024-05-03 16:25:31'),
(7, '1', '32', '5', '9', '70', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 16:26:36', '2024-05-03 17:05:54'),
(8, '1', '33', '5', '9', '70', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:10:06', '2024-05-03 17:12:31'),
(9, '1', '34', '5', '9', '70', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:14:18', '2024-05-03 17:16:05'),
(10, '1', '35', '5', '9', '70', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:17:34', '2024-05-03 17:19:29'),
(11, '1', '36', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:31:08', '2024-05-03 17:32:57'),
(12, '1', '37', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:33:47', '2024-05-03 17:36:26'),
(13, '1', '38', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:37:38', '2024-05-03 17:45:59'),
(14, '1', '39', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:47:10', '2024-05-03 17:48:53'),
(15, '1', '40', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:50:21', '2024-05-03 17:51:54'),
(16, '1', '41', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 17:53:00', '2024-05-03 18:03:16'),
(17, '1', '42', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:04:12', '2024-05-03 18:05:26'),
(18, '1', '43', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:06:32', '2024-05-03 18:07:56'),
(19, '1', '44', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:09:15', '2024-05-03 18:10:52'),
(20, '1', '45', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:12:08', '2024-05-03 18:16:02'),
(21, '1', '46', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:17:00', '2024-05-03 18:19:08'),
(22, '1', '47', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:20:35', '2024-05-03 18:21:50'),
(23, '1', '48', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:23:25', '2024-05-03 18:25:11'),
(24, '1', '49', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-03 18:26:06', '2024-05-04 10:05:15'),
(25, '1', '50', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:06:23', '2024-05-04 10:09:02'),
(26, '1', '51', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:09:53', '2024-05-04 10:16:02'),
(27, '1', '52', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:17:37', '2024-05-04 10:28:51'),
(28, '1', '53', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:30:08', '2024-05-04 10:32:17'),
(29, '1', '54', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:33:19', '2024-05-04 10:44:54'),
(30, '1', '55', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:47:51', '2024-05-04 10:49:16'),
(31, '1', '56', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:50:05', '2024-05-04 10:51:24'),
(32, '1', '57', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:52:45', '2024-05-04 10:53:50'),
(33, '1', '58', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:54:47', '2024-05-04 10:56:23'),
(34, '1', '60', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:57:28', '2024-05-04 10:58:47'),
(35, '1', '59', '5', '9', '72', 'Male', 'No', 'Packing', '1', NULL, '2024-05-04 10:59:13', '2024-05-04 11:00:14'),
(36, '1', '3135', '5', '44', '36', 'Male', 'Yes', 'Packing', '1', NULL, '2024-05-04 11:24:11', '2024-05-04 11:32:31'),
(37, '1', '3136', '5', '44', '36', 'Male', 'Yes', 'Packing', '1', NULL, '2024-05-04 11:33:50', '2024-05-04 11:37:52'),
(38, '1', '3137', '5', '44', '36', 'Male', 'Yes', 'Packing', '1', '2024-05-07 17:19:11', '2024-05-04 11:39:32', '2024-05-07 17:19:11'),
(39, '1', '1040', '5', '49', '72', 'Male', 'Yes', 'Printing/Embroidery', '0', NULL, '2024-05-07 17:20:37', '2024-05-07 17:21:16');

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

--
-- Dumping data for table `lot_no_activities`
--

INSERT INTO `lot_no_activities` (`id`, `created_by_id`, `lot_no_id`, `worker_id`, `action`, `pcs`, `price`, `embroidery_action`, `party_name`, `overlock_action`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '12', 'Cutting', '95', '1.5', NULL, NULL, NULL, 'Voluptas incidunt e', NULL, '2024-05-03 13:16:24', '2024-05-03 13:16:24'),
(2, '1', '2', '1', 'Cutting', '70', '1.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 13:24:36', '2024-05-03 13:24:36'),
(3, '1', '3', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 13:52:46', '2024-05-03 13:52:46'),
(4, '1', '3', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 13:53:38', '2024-05-03 13:53:38'),
(5, '1', '3', '33', 'Sewing Machine', '70', '15.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 13:55:11', '2024-05-03 13:55:11'),
(6, '1', '3', '13', 'Overlock', '70', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 13:55:53', '2024-05-03 13:55:53'),
(7, '1', '3', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 13:58:35', '2024-05-03 13:58:35'),
(8, '1', '3', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 13:59:15', '2024-05-03 13:59:15'),
(9, '1', '4', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:16:27', '2024-05-03 14:16:27'),
(10, '1', '4', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 14:17:08', '2024-05-03 14:22:59'),
(11, '1', '4', '33', 'Sewing Machine', '70', '15.3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:17:52', '2024-05-03 14:17:52'),
(12, '1', '4', '13', 'Overlock', '70', '2.5', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:18:27', '2024-05-03 14:18:27'),
(13, '1', '4', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:18:40', '2024-05-03 14:18:40'),
(14, '1', '4', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:18:56', '2024-05-03 14:18:56'),
(15, '1', '5', '12', 'Cutting', '36', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:26:51', '2024-05-03 14:26:51'),
(16, '1', '5', '39', 'Sewing Machine', '36', '10.5', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 14:27:54', '2024-05-03 14:27:54'),
(17, '1', '5', '13', 'Overlock', '36', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:28:45', '2024-05-03 14:28:45'),
(18, '1', '5', '63', 'Kaj Button', '36', '1.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:29:28', '2024-05-03 14:29:28'),
(19, '1', '5', '65', 'Thread Cutting', '36', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:29:49', '2024-05-03 14:29:49'),
(20, '1', '5', '61', 'Press', '36', '1.5', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:30:53', '2024-05-03 14:30:53'),
(21, '1', '5', '60', 'Packing', '36', '1.66', NULL, NULL, NULL, NULL, NULL, '2024-05-03 14:31:56', '2024-05-03 14:31:56'),
(22, '1', '6', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 16:19:33', '2024-05-03 16:19:33'),
(23, '1', '6', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 16:20:00', '2024-05-03 16:20:00'),
(24, '1', '6', '33', 'Sewing Machine', '70', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 16:22:20', '2024-05-03 16:22:20'),
(25, '1', '6', '13', 'Overlock', '70', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 16:24:13', '2024-05-03 16:24:13'),
(26, '1', '6', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 16:24:38', '2024-05-03 16:24:38'),
(27, '1', '6', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 16:25:31', '2024-05-03 16:25:31'),
(28, '1', '7', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 16:26:36', '2024-05-03 16:26:36'),
(29, '1', '7', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:02:54', '2024-05-03 17:02:54'),
(30, '1', '7', '22', 'Sewing Machine', '70', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:04:11', '2024-05-03 17:04:11'),
(31, '1', '7', '13', 'Overlock', '70', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:04:53', '2024-05-03 17:04:53'),
(32, '1', '7', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:05:10', '2024-05-03 17:05:10'),
(33, '1', '7', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:05:54', '2024-05-03 17:05:54'),
(34, '1', '8', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:10:06', '2024-05-03 17:10:06'),
(35, '1', '8', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:10:24', '2024-05-03 17:10:24'),
(36, '1', '8', '21', 'Sewing Machine', '70', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:11:23', '2024-05-03 17:11:23'),
(37, '1', '8', '13', 'Overlock', '70', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:11:49', '2024-05-03 17:11:49'),
(38, '1', '8', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:12:04', '2024-05-03 17:12:04'),
(39, '1', '8', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:12:31', '2024-05-03 17:12:31'),
(40, '1', '9', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:14:18', '2024-05-03 17:14:18'),
(41, '1', '9', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:14:39', '2024-05-03 17:14:39'),
(42, '1', '9', '24', 'Sewing Machine', '70', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:15:05', '2024-05-03 17:15:05'),
(43, '1', '9', '13', 'Overlock', '70', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:15:21', '2024-05-03 17:15:21'),
(44, '1', '9', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:15:34', '2024-05-03 17:15:34'),
(45, '1', '9', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:16:05', '2024-05-03 17:16:05'),
(46, '1', '10', '1', 'Cutting', '70', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:17:34', '2024-05-03 17:17:34'),
(47, '1', '10', '18', 'Printing/Embroidery', '70', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:17:50', '2024-05-03 17:17:50'),
(48, '1', '10', '38', 'Sewing Machine', '70', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:18:19', '2024-05-03 17:18:19'),
(49, '1', '10', '13', 'Overlock', '70', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:18:33', '2024-05-03 17:18:33'),
(50, '1', '10', '65', 'Thread Cutting', '70', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:19:11', '2024-05-03 17:19:11'),
(51, '1', '10', '14', 'Packing', '70', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:19:29', '2024-05-03 17:19:29'),
(52, '1', '11', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:31:08', '2024-05-03 17:31:08'),
(53, '1', '11', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:31:25', '2024-05-03 17:31:25'),
(54, '1', '11', '27', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:32:15', '2024-05-03 17:32:15'),
(55, '1', '11', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:32:31', '2024-05-03 17:32:31'),
(56, '1', '11', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:32:43', '2024-05-03 17:32:43'),
(57, '1', '11', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:32:57', '2024-05-03 17:32:57'),
(58, '1', '12', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:33:47', '2024-05-03 17:33:47'),
(59, '1', '12', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:35:19', '2024-05-03 17:35:19'),
(60, '1', '12', '25', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:35:55', '2024-05-03 17:35:55'),
(61, '1', '12', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:36:07', '2024-05-03 17:36:07'),
(62, '1', '12', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:36:16', '2024-05-03 17:36:16'),
(63, '1', '12', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:36:26', '2024-05-03 17:36:26'),
(64, '1', '13', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:37:38', '2024-05-03 17:37:38'),
(65, '1', '13', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:43:31', '2024-05-03 17:43:31'),
(66, '1', '13', '22', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:43:55', '2024-05-03 17:43:55'),
(67, '1', '13', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:44:06', '2024-05-03 17:44:06'),
(68, '1', '13', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:44:20', '2024-05-03 17:44:20'),
(69, '1', '13', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:45:59', '2024-05-03 17:45:59'),
(70, '1', '14', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:47:10', '2024-05-03 17:47:10'),
(71, '1', '14', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:47:34', '2024-05-03 17:47:34'),
(72, '1', '14', '34', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:48:00', '2024-05-03 17:48:00'),
(73, '1', '14', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:48:29', '2024-05-03 17:48:29'),
(74, '1', '14', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:48:40', '2024-05-03 17:48:40'),
(75, '1', '14', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:48:53', '2024-05-03 17:48:53'),
(76, '1', '15', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:50:21', '2024-05-03 17:50:21'),
(77, '1', '15', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:50:32', '2024-05-03 17:50:32'),
(78, '1', '15', '32', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:51:06', '2024-05-03 17:51:06'),
(79, '1', '15', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:51:19', '2024-05-03 17:51:19'),
(80, '1', '15', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:51:29', '2024-05-03 17:51:29'),
(81, '1', '15', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:51:54', '2024-05-03 17:51:54'),
(82, '1', '16', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 17:53:00', '2024-05-03 17:53:00'),
(83, '1', '16', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 17:53:10', '2024-05-03 17:53:10'),
(84, '1', '16', '23', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:02:29', '2024-05-03 18:02:29'),
(85, '1', '16', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:02:39', '2024-05-03 18:02:39'),
(86, '1', '16', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:02:53', '2024-05-03 18:02:53'),
(87, '1', '16', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:03:16', '2024-05-03 18:03:16'),
(88, '1', '17', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:04:12', '2024-05-03 18:04:12'),
(89, '1', '17', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:04:25', '2024-05-03 18:04:25'),
(90, '1', '17', '25', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:04:46', '2024-05-03 18:04:46'),
(91, '1', '17', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:05:01', '2024-05-03 18:05:01'),
(92, '1', '17', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:05:12', '2024-05-03 18:05:12'),
(93, '1', '17', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:05:26', '2024-05-03 18:05:26'),
(94, '1', '18', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:06:32', '2024-05-03 18:06:32'),
(95, '1', '18', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:06:43', '2024-05-03 18:06:43'),
(96, '1', '18', '37', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:07:19', '2024-05-03 18:07:19'),
(97, '1', '18', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:07:29', '2024-05-03 18:07:29'),
(98, '1', '18', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:07:43', '2024-05-03 18:07:43'),
(99, '1', '18', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:07:56', '2024-05-03 18:07:56'),
(100, '1', '19', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:09:15', '2024-05-03 18:09:15'),
(101, '1', '19', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:09:33', '2024-05-03 18:09:33'),
(102, '1', '19', '24', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:10:03', '2024-05-03 18:10:03'),
(103, '1', '19', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:10:30', '2024-05-03 18:10:30'),
(104, '1', '19', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:10:41', '2024-05-03 18:10:41'),
(105, '1', '19', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:10:52', '2024-05-03 18:10:52'),
(106, '1', '20', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:12:08', '2024-05-03 18:12:08'),
(107, '1', '20', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:12:22', '2024-05-03 18:12:22'),
(108, '1', '20', '35', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:13:33', '2024-05-03 18:13:33'),
(109, '1', '20', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:15:43', '2024-05-03 18:15:43'),
(110, '1', '20', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:15:53', '2024-05-03 18:15:53'),
(111, '1', '20', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:16:02', '2024-05-03 18:16:02'),
(112, '1', '21', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:17:00', '2024-05-03 18:17:00'),
(113, '1', '21', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:17:28', '2024-05-03 18:17:28'),
(114, '1', '21', '30', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:17:54', '2024-05-03 18:17:54'),
(115, '1', '21', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:18:05', '2024-05-03 18:18:05'),
(116, '1', '21', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:18:52', '2024-05-03 18:18:52'),
(117, '1', '21', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:19:08', '2024-05-03 18:19:08'),
(118, '1', '22', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:20:35', '2024-05-03 18:20:35'),
(119, '1', '22', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:20:47', '2024-05-03 18:20:47'),
(120, '1', '22', '21', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:21:15', '2024-05-03 18:21:15'),
(121, '1', '22', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:21:31', '2024-05-03 18:21:31'),
(122, '1', '22', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:21:41', '2024-05-03 18:21:41'),
(123, '1', '22', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:21:50', '2024-05-03 18:21:50'),
(124, '1', '23', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:23:25', '2024-05-03 18:23:25'),
(125, '1', '23', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:23:35', '2024-05-03 18:23:35'),
(126, '1', '23', '22', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:24:36', '2024-05-03 18:24:36'),
(127, '1', '23', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:24:49', '2024-05-03 18:24:49'),
(128, '1', '23', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:25:01', '2024-05-03 18:25:01'),
(129, '1', '23', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:25:11', '2024-05-03 18:25:11'),
(130, '1', '24', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-03 18:26:06', '2024-05-03 18:26:06'),
(131, '1', '24', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-03 18:26:25', '2024-05-03 18:26:25'),
(132, '1', '24', '22', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:04:30', '2024-05-04 10:04:30'),
(133, '1', '24', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:04:52', '2024-05-04 10:04:52'),
(134, '1', '24', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:05:04', '2024-05-04 10:05:04'),
(135, '1', '24', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:05:15', '2024-05-04 10:05:15'),
(136, '1', '25', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:06:23', '2024-05-04 10:06:23'),
(137, '1', '25', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:07:39', '2024-05-04 10:07:39'),
(138, '1', '25', '28', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:08:04', '2024-05-04 10:08:04'),
(139, '1', '25', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:08:23', '2024-05-04 10:08:23'),
(140, '1', '25', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:08:35', '2024-05-04 10:08:35'),
(141, '1', '25', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:09:02', '2024-05-04 10:09:02'),
(142, '1', '26', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:09:53', '2024-05-04 10:09:53'),
(143, '1', '26', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:10:08', '2024-05-04 10:10:08'),
(144, '1', '26', '23', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:10:29', '2024-05-04 10:10:29'),
(145, '1', '26', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:10:39', '2024-05-04 10:10:39'),
(146, '1', '26', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:15:44', '2024-05-04 10:15:44'),
(147, '1', '26', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:16:02', '2024-05-04 10:16:02'),
(148, '1', '27', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:17:37', '2024-05-04 10:17:37'),
(149, '1', '27', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:17:50', '2024-05-04 10:17:50'),
(150, '1', '27', '36', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:28:02', '2024-05-04 10:28:02'),
(151, '1', '27', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:28:12', '2024-05-04 10:28:12'),
(152, '1', '27', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:28:23', '2024-05-04 10:28:23'),
(153, '1', '27', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:28:51', '2024-05-04 10:28:51'),
(154, '1', '28', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:30:08', '2024-05-04 10:30:08'),
(155, '1', '28', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:30:30', '2024-05-04 10:30:30'),
(156, '1', '28', '32', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:31:16', '2024-05-04 10:31:16'),
(157, '1', '28', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:31:55', '2024-05-04 10:31:55'),
(158, '1', '28', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:32:07', '2024-05-04 10:32:07'),
(159, '1', '28', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:32:17', '2024-05-04 10:32:17'),
(160, '1', '29', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:33:19', '2024-05-04 10:33:19'),
(161, '1', '29', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:33:29', '2024-05-04 10:33:29'),
(162, '1', '29', '25', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:33:43', '2024-05-04 10:33:43'),
(163, '1', '29', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:34:07', '2024-05-04 10:34:07'),
(164, '1', '29', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:44:44', '2024-05-04 10:44:44'),
(165, '1', '29', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:44:54', '2024-05-04 10:44:54'),
(166, '1', '30', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:47:51', '2024-05-04 10:47:51'),
(167, '1', '30', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:48:19', '2024-05-04 10:48:19'),
(168, '1', '30', '26', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:48:42', '2024-05-04 10:48:42'),
(169, '1', '30', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:48:53', '2024-05-04 10:48:53'),
(170, '1', '30', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:49:05', '2024-05-04 10:49:05'),
(171, '1', '30', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:49:16', '2024-05-04 10:49:16'),
(172, '1', '31', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:50:05', '2024-05-04 10:50:05'),
(173, '1', '31', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:50:24', '2024-05-04 10:50:24'),
(174, '1', '31', '29', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:50:51', '2024-05-04 10:50:51'),
(175, '1', '31', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:51:02', '2024-05-04 10:51:02'),
(176, '1', '31', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:51:12', '2024-05-04 10:51:12'),
(177, '1', '31', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:51:24', '2024-05-04 10:51:24'),
(178, '1', '32', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:52:45', '2024-05-04 10:52:45'),
(179, '1', '32', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:52:56', '2024-05-04 10:52:56'),
(180, '1', '32', '22', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:53:11', '2024-05-04 10:53:11'),
(181, '1', '32', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:53:24', '2024-05-04 10:53:24'),
(182, '1', '32', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:53:38', '2024-05-04 10:53:38'),
(183, '1', '32', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:53:50', '2024-05-04 10:53:50'),
(184, '1', '33', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:54:47', '2024-05-04 10:54:47'),
(185, '1', '33', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:54:59', '2024-05-04 10:54:59'),
(186, '1', '33', '38', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:55:39', '2024-05-04 10:55:39'),
(187, '1', '33', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:56:02', '2024-05-04 10:56:02'),
(188, '1', '33', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:56:14', '2024-05-04 10:56:14'),
(189, '1', '33', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:56:23', '2024-05-04 10:56:23'),
(190, '1', '34', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:57:28', '2024-05-04 10:57:28'),
(191, '1', '34', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:57:43', '2024-05-04 10:57:43'),
(192, '1', '34', '30', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:58:13', '2024-05-04 10:58:13'),
(193, '1', '34', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:58:24', '2024-05-04 10:58:24'),
(194, '1', '34', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:58:35', '2024-05-04 10:58:35'),
(195, '1', '34', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:58:47', '2024-05-04 10:58:47'),
(196, '1', '35', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:59:13', '2024-05-04 10:59:13'),
(197, '1', '35', '18', 'Printing/Embroidery', '72', '3', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 10:59:22', '2024-05-04 10:59:22'),
(198, '1', '35', '28', 'Sewing Machine', '72', '16.30', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:59:35', '2024-05-04 10:59:35'),
(199, '1', '35', '13', 'Overlock', '72', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:59:48', '2024-05-04 10:59:48'),
(200, '1', '35', '65', 'Thread Cutting', '72', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 10:59:58', '2024-05-04 10:59:58'),
(201, '1', '35', '14', 'Packing', '72', '2.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:00:14', '2024-05-04 11:00:14'),
(202, '1', '36', '12', 'Cutting', '36', '1.75', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:24:11', '2024-05-04 11:24:11'),
(203, '1', '36', '43', 'Sewing Machine', '36', '10', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 11:26:21', '2024-05-04 11:26:21'),
(204, '1', '36', '58', 'Overlock', '36', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:29:19', '2024-05-04 11:29:19'),
(205, '1', '36', '63', 'Kaj Button', '36', '1.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:29:59', '2024-05-04 11:29:59'),
(206, '1', '36', '65', 'Thread Cutting', '36', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:30:14', '2024-05-04 11:30:14'),
(207, '1', '36', '61', 'Press', '36', '1.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:31:57', '2024-05-04 11:31:57'),
(208, '1', '36', '60', 'Packing', '36', '1.66', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:32:31', '2024-05-04 11:32:31'),
(209, '1', '37', '12', 'Cutting', '36', '1.75', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:33:50', '2024-05-04 11:33:50'),
(210, '1', '37', '43', 'Sewing Machine', '36', '10', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 11:34:20', '2024-05-04 11:34:20'),
(211, '1', '37', '49', 'Overlock', '36', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:35:28', '2024-05-04 11:35:28'),
(212, '1', '37', '63', 'Kaj Button', '36', '1.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:35:58', '2024-05-04 11:35:58'),
(213, '1', '37', '65', 'Thread Cutting', '36', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:36:08', '2024-05-04 11:36:08'),
(214, '1', '37', '61', 'Press', '36', '1.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:37:29', '2024-05-04 11:37:29'),
(215, '1', '37', '60', 'Packing', '36', '1.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:37:52', '2024-05-04 11:37:52'),
(216, '1', '38', '12', 'Cutting', '36', '1.75', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:39:32', '2024-05-04 11:39:32'),
(217, '1', '38', '47', 'Sewing Machine', '36', '10', 'In Source', NULL, NULL, NULL, NULL, '2024-05-04 11:40:01', '2024-05-04 11:40:01'),
(218, '1', '38', '49', 'Overlock', '36', '2.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:40:17', '2024-05-04 11:40:17'),
(219, '1', '38', '63', 'Kaj Button', '36', '1.83', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:41:56', '2024-05-04 11:41:56'),
(220, '1', '38', '65', 'Thread Cutting', '36', '0', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:42:07', '2024-05-04 11:42:07'),
(221, '1', '38', '61', 'Press', '36', '1.50', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:42:40', '2024-05-04 11:42:40'),
(222, '1', '38', '60', 'Packing', '36', '1.66', NULL, NULL, NULL, NULL, NULL, '2024-05-04 11:43:09', '2024-05-04 11:43:09'),
(223, '1', '39', '1', 'Cutting', '72', '3', NULL, NULL, NULL, NULL, NULL, '2024-05-07 17:20:37', '2024-05-07 17:20:37'),
(224, '1', '39', '18', 'Printing/Embroidery', '72', '2.50', 'In Source', NULL, NULL, NULL, NULL, '2024-05-07 17:21:16', '2024-05-07 17:21:16');

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
(1, '1', 'S Grindal', '1', NULL, '2024-04-01 06:03:22', '2024-05-03 10:44:40'),
(2, '1', 'M', '1', NULL, '2024-04-01 06:03:24', '2024-04-01 06:03:24'),
(3, '1', 'L', '1', NULL, '2024-04-01 06:03:28', '2024-04-01 06:03:28'),
(4, '1', 'XL', '1', NULL, '2024-04-01 06:03:29', '2024-04-01 06:03:29'),
(5, '1', '2XL', '1', NULL, '2024-04-02 10:00:26', '2024-04-02 10:00:26'),
(6, '1', '3XL', '1', NULL, '2024-04-02 10:00:31', '2024-05-03 11:32:19'),
(7, '1', '4XL', '1', NULL, '2024-04-02 10:00:34', '2024-04-02 10:33:02'),
(8, '1', '20/22/24 Grindal', '1', NULL, '2024-05-03 10:41:40', '2024-05-03 10:41:40'),
(9, '1', '26/34 Grindal With Jali', '1', NULL, '2024-05-03 10:42:53', '2024-05-03 10:42:53'),
(10, '1', '26/34 Grindal With out Jali', '1', NULL, '2024-05-03 10:43:05', '2024-05-03 10:43:05'),
(11, '1', 'Muffler Double Set', '1', NULL, '2024-05-03 10:56:34', '2024-05-03 10:56:34'),
(12, '1', 'Muffler Weelwala', '1', NULL, '2024-05-03 10:56:52', '2024-05-03 10:56:52'),
(13, '1', 'Muffler Boder Plane', '1', NULL, '2024-05-03 10:57:06', '2024-05-03 10:57:06'),
(14, '1', 'Muffler Long Lichi', '1', NULL, '2024-05-03 10:57:28', '2024-05-03 10:57:28'),
(15, '1', '36/44  free size', '1', NULL, '2024-05-03 11:04:41', '2024-05-03 11:04:41'),
(16, '1', '26/34 Gulla', '1', NULL, '2024-05-03 11:05:14', '2024-05-03 11:05:14'),
(17, '1', 'M/3XL Gulla', '1', NULL, '2024-05-03 11:06:12', '2024-05-03 11:06:12'),
(18, '1', '26/32 Allover Print', '1', NULL, '2024-05-03 11:08:21', '2024-05-03 11:08:21'),
(19, '1', '36 Allover Print', '1', NULL, '2024-05-03 11:09:11', '2024-05-03 11:14:54'),
(20, '1', '38/40 Allover Print', '1', NULL, '2024-05-03 11:16:17', '2024-05-03 11:16:17'),
(21, '1', '41/44 Allover Print', '1', NULL, '2024-05-03 11:16:44', '2024-05-03 11:16:44'),
(22, '1', 'Special Gulla', '1', NULL, '2024-05-03 11:18:05', '2024-05-03 11:18:05'),
(23, '1', '40 Sweat Coty', '1', NULL, '2024-05-03 11:19:19', '2024-05-03 11:19:19'),
(24, '1', '42 Sweat Coty', '1', NULL, '2024-05-03 11:19:55', '2024-05-03 11:19:55'),
(25, '1', 'Foma  Coty', '1', NULL, '2024-05-03 11:24:43', '2024-05-03 11:24:43'),
(26, '1', '30/34  Fleesh Girls', '1', NULL, '2024-05-03 11:27:32', '2024-05-03 11:30:15'),
(27, '1', '36  Fleesh Girls', '1', NULL, '2024-05-03 11:31:03', '2024-05-03 11:31:03'),
(28, '1', 'L  Fleesh Girls', '1', NULL, '2024-05-03 11:31:28', '2024-05-03 11:31:28'),
(29, '1', 'XL  Fleesh Girls', '1', NULL, '2024-05-03 11:33:04', '2024-05-03 11:33:04'),
(30, '1', '2XL  Fleesh Girls', '1', NULL, '2024-05-03 11:33:29', '2024-05-03 11:33:29'),
(31, '1', '3XL  Fleesh Girls', '1', NULL, '2024-05-03 11:33:44', '2024-05-03 11:33:44'),
(32, '1', 'L Fleesh Gents Hoddies', '1', NULL, '2024-05-03 11:37:45', '2024-05-03 11:37:45'),
(33, '1', 'XL  Fleesh Gents Hoddies', '1', NULL, '2024-05-03 11:38:09', '2024-05-03 11:38:09'),
(34, '1', '2XL Fleesh Gents Hoddies', '1', NULL, '2024-05-03 11:38:20', '2024-05-03 11:38:20'),
(35, '1', '26/34 Fleesh', '1', NULL, '2024-05-03 11:40:22', '2024-05-03 11:40:22'),
(36, '1', '40 Matar Dana', '1', NULL, '2024-05-03 11:41:30', '2024-05-03 11:41:30'),
(37, '1', '42 Matar Dana', '1', NULL, '2024-05-03 11:41:42', '2024-05-03 11:41:42'),
(38, '1', '44 Matar Dana', '1', NULL, '2024-05-03 11:42:05', '2024-05-03 11:42:05'),
(39, '1', '46 Matar Dana', '1', NULL, '2024-05-03 11:42:21', '2024-05-03 11:42:21'),
(40, '1', '40 Honeycom', '1', NULL, '2024-05-03 11:43:24', '2024-05-03 11:43:24'),
(41, '1', '42 Honeycom', '1', NULL, '2024-05-03 11:43:36', '2024-05-03 11:43:36'),
(42, '1', '44 Honeycom', '1', NULL, '2024-05-03 11:43:50', '2024-05-03 11:43:50'),
(43, '1', '38 Lycra', '1', NULL, '2024-05-03 11:45:04', '2024-05-03 11:45:04'),
(44, '1', '40 Lycra', '1', NULL, '2024-05-03 11:45:16', '2024-05-03 11:45:42'),
(45, '1', '42  Lycra', '1', NULL, '2024-05-03 11:45:31', '2024-05-03 11:45:31'),
(46, '1', '44 Lycra', '1', NULL, '2024-05-03 11:46:05', '2024-05-03 11:46:05'),
(47, '1', '44  Lycra', '1', NULL, '2024-05-03 11:46:21', '2024-05-03 11:46:21'),
(48, '1', '46  Lycra', '1', NULL, '2024-05-03 11:47:57', '2024-05-03 11:47:57'),
(49, '1', '48  Lycra', '1', NULL, '2024-05-03 11:48:16', '2024-05-03 11:48:16');

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
(1, '1', 'JASWINDER - 2', '1-2 Cutting', '[\"Cutting\"]', '1', NULL, '2024-04-02 10:07:57', '2024-05-03 10:53:15'),
(2, '1', 'GAUTAM MAURYA', '2 Embo.', '[\"Printing\\/Embroidery\"]', '1', NULL, '2024-04-02 10:09:01', '2024-05-03 10:52:51'),
(3, '1', 'ANIL', '1231', '[\"Sewing Machine\"]', '1', '2024-05-03 10:50:32', '2024-04-02 10:09:15', '2024-05-03 10:50:32'),
(4, '1', 'RAJU', '3123', '[\"Sewing Machine\"]', '1', '2024-05-03 10:50:40', '2024-04-02 10:09:26', '2024-05-03 10:50:40'),
(5, '1', 'SANOJ', '123123', '[\"Sewing Machine\"]', '1', '2024-05-03 10:51:02', '2024-04-02 10:10:12', '2024-05-03 10:51:02'),
(6, '1', 'ROHIT', '123123', '[\"Sewing Machine\"]', '1', '2024-05-03 10:51:09', '2024-04-02 10:10:20', '2024-05-03 10:51:09'),
(7, '1', 'VINOD', '12312', '[\"Sewing Machine\"]', '1', '2024-05-03 10:51:14', '2024-04-02 10:10:26', '2024-05-03 10:51:14'),
(8, '1', 'RISHI', '5123', '[\"Sewing Machine\"]', '1', '2024-05-03 10:50:01', '2024-04-02 10:10:33', '2024-05-03 10:50:01'),
(9, '1', 'DEEPAK', '123123', '[\"Sewing Machine\"]', '1', '2024-05-03 10:49:55', '2024-04-02 10:10:40', '2024-05-03 10:49:55'),
(10, '1', 'ROHIT 2', '1231121', '[\"Sewing Machine\"]', '1', '2024-05-03 10:49:48', '2024-04-02 10:11:05', '2024-05-03 10:49:48'),
(11, '1', 'RAMVIJAY', '12311', '[\"Sewing Machine\"]', '1', '2024-05-03 10:48:32', '2024-04-02 10:12:20', '2024-05-03 10:48:32'),
(12, '1', 'MOHIT', '3 Cutting', '[\"Cutting\"]', '1', NULL, '2024-04-02 10:13:08', '2024-05-03 10:53:31'),
(13, '1', 'SANJAY Ramu', '1-2-3', '[\"Overlock\"]', '1', NULL, '2024-04-02 10:13:19', '2024-05-03 10:48:23'),
(14, '1', 'UDAY', '2 Packing', '[\"Packing\"]', '1', NULL, '2024-04-02 10:14:12', '2024-05-03 10:53:57'),
(15, '1', 'RAHUL JAIN', '12312', '[\"Kaj Button\"]', '1', '2024-05-03 10:39:59', '2024-04-02 10:14:35', '2024-05-03 10:39:59'),
(16, '1', 'VIJAY', '1', '[\"Press\"]', '1', '2024-05-03 10:39:53', '2024-04-02 10:14:50', '2024-05-03 10:39:53'),
(17, '1', 'UDAY (PACKING)', '1', '[\"Packing\"]', '1', '2024-05-03 10:39:47', '2024-04-02 10:15:26', '2024-05-03 10:39:47'),
(18, '1', 'Radhe Shyam', '1-3  Printing', '[\"Printing\\/Embroidery\"]', '1', NULL, '2024-05-03 10:52:26', '2024-05-03 17:01:26'),
(19, '1', '01Sourabh', '01', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:56:33', '2024-05-03 16:34:27'),
(20, '1', '02 Somnath', '02', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:56:54', '2024-05-03 16:35:47'),
(21, '1', '11 Anil', '11', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:57:52', '2024-05-03 16:37:33'),
(22, '1', '12 Raju', '12', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:58:21', '2024-05-03 16:37:45'),
(23, '1', '13 Sanoj', '13', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:58:41', '2024-05-03 16:38:10'),
(24, '1', '14 Rohit', '14', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:59:01', '2024-05-03 16:38:25'),
(25, '1', '15 Ravi', '15', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:59:33', '2024-05-03 16:38:55'),
(26, '1', '16 Rishi', '16', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:59:43', '2024-05-03 16:41:24'),
(27, '1', '17 Deepak', '17', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 11:59:54', '2024-05-03 16:42:00'),
(28, '1', '18 Rohit-2', '18', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:01:27', '2024-05-03 16:42:33'),
(29, '1', '19 Ramvijay', '19', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:02:36', '2024-05-03 16:43:49'),
(30, '1', '20 Santosh', '20', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:02:49', '2024-05-03 16:44:52'),
(31, '1', '21 Dina', '21', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:03:03', '2024-05-03 16:50:38'),
(32, '1', '22 Jaysingh', '22', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:03:24', '2024-05-03 16:51:04'),
(33, '1', '23 Mangal Hari', '23', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:03:59', '2024-05-03 14:13:00'),
(34, '1', '24 Vicky', '24', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:04:13', '2024-05-03 16:51:44'),
(35, '1', '25 Amit', '25', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:04:25', '2024-05-03 16:57:44'),
(36, '1', '26 Anil Dollar', '26', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:04:42', '2024-05-04 10:20:16'),
(37, '1', '27 Vijay', '27', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:05:03', '2024-05-03 16:55:15'),
(38, '1', '28 Suresh', '28', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:05:38', '2024-05-03 16:55:47'),
(39, '1', '41 Lali', '41', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:19:24', '2024-05-03 16:56:11'),
(40, '1', '42 Rajesh Kumar', '42', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:19:51', '2024-05-03 16:56:30'),
(41, '1', '43 Vikash', '43', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:20:28', '2024-05-03 16:56:44'),
(42, '1', '44 Baleswar', '44', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:20:54', '2024-05-03 16:57:03'),
(43, '1', '45 Sohan Lal', '45', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:21:07', '2024-05-03 16:57:15'),
(44, '1', '46 Pandit Ji', '46', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:21:57', '2024-05-03 16:57:27'),
(45, '1', '47 Ramdas', '47', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:22:13', '2024-05-03 16:55:32'),
(46, '1', '48 Sanjeevan Lal', '48', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:22:49', '2024-05-03 16:59:26'),
(47, '1', '49 Dalveer', '49', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:23:21', '2024-05-03 16:58:43'),
(48, '1', '50 Tajudin', '50', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:23:37', '2024-05-03 16:52:10'),
(49, '1', 'Sanjay Kumar Folding', '3 Fold', '[\"Overlock\"]', '1', NULL, '2024-05-03 12:26:59', '2024-05-03 12:27:26'),
(50, '1', '56 Deepesh', '56', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:28:21', '2024-05-03 16:54:10'),
(51, '1', '57 Gouri Shankar', '57', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:28:53', '2024-05-03 16:53:54'),
(52, '1', '58 Akash', '58', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:29:14', '2024-05-03 16:53:41'),
(53, '1', '59 Jatinder', '59', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:29:46', '2024-05-03 16:53:17'),
(54, '1', '60 Parsotam', '60', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:30:07', '2024-05-03 16:52:57'),
(55, '1', '61 Bhanu', '61', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:30:26', '2024-05-03 16:52:34'),
(56, '1', '62 Noorul', '62', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:30:39', '2024-05-03 17:57:18'),
(57, '1', '63 M.D.', '63', '[\"Sewing Machine\"]', '1', NULL, '2024-05-03 12:30:54', '2024-05-03 14:11:58'),
(58, '1', 'Sanjay Kumar', '3 overlack folding', '[\"Overlock\"]', '1', NULL, '2024-05-03 12:33:01', '2024-05-04 13:41:41'),
(59, '1', 'khusboo', '3 Thread', '[\"Thread Cutting\"]', '1', NULL, '2024-05-03 12:34:14', '2024-05-03 12:34:14'),
(60, '1', 'Vicky-2', '3 Pack', '[\"Packing\"]', '1', NULL, '2024-05-03 12:39:26', '2024-05-03 12:39:26'),
(61, '1', 'Vijay Kumar', '3 Press', '[\"Press\"]', '1', NULL, '2024-05-03 12:40:14', '2024-05-03 12:40:14'),
(62, '1', 'Akash-2', '3 Press', '[\"Press\"]', '1', NULL, '2024-05-03 12:48:52', '2024-05-03 12:48:52'),
(63, '1', 'Rahul', '3 kb', '[\"Kaj Button\"]', '1', NULL, '2024-05-03 12:49:50', '2024-05-03 12:49:50'),
(64, '1', 'Prince', '3 Link', '[\"Linking\"]', '1', NULL, '2024-05-03 12:50:37', '2024-05-03 12:50:37'),
(65, '1', 'Salary', '2 No.', '[\"Thread Cutting\"]', '1', NULL, '2024-05-03 13:58:17', '2024-05-03 13:58:17');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot_nos`
--
ALTER TABLE `lot_nos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `lot_no_activities`
--
ALTER TABLE `lot_no_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
