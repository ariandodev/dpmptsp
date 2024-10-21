-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpmptsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(103, '0001_01_01_000000_create_users_table', 1),
(104, '0001_01_01_000001_create_cache_table', 1),
(105, '0001_01_01_000002_create_jobs_table', 1),
(106, '2024_09_12_024052_create_skm_unit_layanan_table', 1),
(107, '2024_09_12_024117_create_skm_layanan_table', 1),
(108, '2024_09_12_024133_create_skm_responden_table', 1),
(109, '2024_09_12_024201_create_skm_pertanyaan_table', 1),
(110, '2024_09_12_024254_create_skm_pilihan_jawaban_table', 1),
(111, '2024_09_12_024309_create_skm_jawaban_pertanyaan_table', 1),
(112, '2024_09_12_024327_create_skm_laporan_kumulatif_table', 1),
(113, '2024_09_12_024340_create_skm_laporan_harian_table', 1),
(114, '2024_09_12_024351_create_skm_laporan_mingguan_table', 1),
(115, '2024_09_12_024358_create_skm_laporan_bulanan_table', 1),
(116, '2024_09_12_024405_create_skm_laporan_triwulan_table', 1),
(117, '2024_09_12_024425_create_skm_laporan_semester_table', 1),
(118, '2024_09_12_024433_create_skm_laporan_tahunan_table', 1),
(119, '2024_09_12_033748_create_skm_unsur_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('b1WdZB5Iwshd8PqxtxYSyVbKTAVZzBPZ9gka5DPE', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXFTQTduNmlZaTlXcTNXaU8zUWxhaE9nUGlxTk1xNmF5cWVScnJycyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvZHBtcHRzcC9wdWJsaWMvYWRtaW4vc2ttIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729437319),
('Mhn7p05G2dY8UBoGUy0037ZnUYZeoWfY2uU3oZoW', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUxZZDRjbm1aRExISGxFT3RpV0U4c1B5MHBVVFc5cGNqV3lKTFpnMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvZHBtcHRzcC9wdWJsaWMvYWRtaW4vc2ttIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729485083);

-- --------------------------------------------------------

--
-- Table structure for table `skm_jawaban_pertanyaan`
--

CREATE TABLE `skm_jawaban_pertanyaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skm_pertanyaan_id` bigint(20) NOT NULL,
  `skm_pilihan_jawaban_id` bigint(20) NOT NULL,
  `skm_responden_id` bigint(20) NOT NULL,
  `skm_layanan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_jawaban_pertanyaan`
--

INSERT INTO `skm_jawaban_pertanyaan` (`id`, `skm_pertanyaan_id`, `skm_pilihan_jawaban_id`, `skm_responden_id`, `skm_layanan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(37, 10, 28, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(38, 11, 32, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(39, 12, 36, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(40, 13, 40, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(41, 14, 44, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(42, 15, 48, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(43, 16, 52, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(44, 17, 56, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(45, 19, 64, 5, 1, '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(46, 10, 28, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(47, 11, 32, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(48, 12, 36, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(49, 13, 40, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(50, 14, 44, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(51, 15, 48, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(52, 16, 52, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(53, 17, 56, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(54, 19, 64, 6, 1, '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(55, 10, 28, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(56, 11, 33, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(57, 12, 37, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(58, 13, 41, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(59, 14, 45, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(60, 15, 49, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(61, 16, 53, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(62, 17, 57, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(63, 19, 65, 7, 1, '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(64, 10, 27, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(65, 11, 32, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(66, 12, 35, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(67, 13, 40, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(68, 14, 44, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(69, 15, 48, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(70, 16, 52, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(71, 17, 56, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(72, 19, 64, 8, 1, '2024-10-19 08:44:56', '2024-10-19 08:44:56', NULL),
(73, 10, 28, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(74, 11, 32, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(75, 12, 36, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(76, 13, 40, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(77, 14, 44, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(78, 15, 48, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(79, 16, 51, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(80, 17, 56, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(81, 19, 64, 9, 1, '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(82, 10, 28, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(83, 11, 31, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(84, 12, 34, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(85, 13, 40, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(86, 14, 45, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(87, 15, 48, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(88, 16, 52, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(89, 17, 55, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(90, 19, 64, 10, 1, '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(91, 10, 29, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(92, 11, 33, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(93, 12, 37, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(94, 13, 40, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(95, 14, 45, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(96, 15, 49, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(97, 16, 53, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(98, 17, 57, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(99, 19, 65, 11, 1, '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(100, 10, 29, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(101, 11, 33, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(102, 12, 37, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(103, 13, 41, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(104, 14, 45, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(105, 15, 49, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(106, 16, 53, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(107, 17, 57, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(108, 19, 65, 12, 3, '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(109, 10, 28, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(110, 11, 32, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(111, 12, 36, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(112, 13, 41, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(113, 14, 44, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(114, 15, 48, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(115, 16, 52, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(116, 17, 56, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(117, 19, 64, 13, 6, '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(118, 10, 29, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(119, 11, 33, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(120, 12, 37, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(121, 13, 41, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(122, 14, 45, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(123, 15, 49, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(124, 16, 53, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(125, 17, 57, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(126, 19, 65, 14, 8, '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(127, 10, 28, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(128, 11, 32, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(129, 12, 36, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(130, 13, 39, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(131, 14, 44, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(132, 15, 48, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(133, 16, 52, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(134, 17, 56, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(135, 19, 64, 15, 13, '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(136, 10, 28, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(137, 11, 32, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(138, 12, 34, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(139, 13, 41, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(140, 14, 45, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(141, 15, 48, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(142, 16, 53, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(143, 17, 57, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(144, 19, 64, 16, 4, '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(145, 10, 29, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(146, 11, 33, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(147, 12, 37, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(148, 13, 40, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(149, 14, 45, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(150, 15, 49, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(151, 16, 53, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(152, 17, 57, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(153, 19, 65, 17, 13, '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(154, 10, 29, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(155, 11, 33, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(156, 12, 37, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(157, 13, 41, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(158, 14, 45, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(159, 15, 49, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(160, 16, 53, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(161, 17, 57, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL),
(162, 19, 65, 18, 1, '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_bulanan`
--

CREATE TABLE `skm_laporan_bulanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `persentase_perubahan` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_harian`
--

CREATE TABLE `skm_laporan_harian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `persentase_perubahan` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_kumulatif`
--

CREATE TABLE `skm_laporan_kumulatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_mingguan`
--

CREATE TABLE `skm_laporan_mingguan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `persentase_perubahan` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_semester`
--

CREATE TABLE `skm_laporan_semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `persentase_perubahan` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_tahunan`
--

CREATE TABLE `skm_laporan_tahunan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `persentase_perubahan` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_laporan_triwulan`
--

CREATE TABLE `skm_laporan_triwulan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double NOT NULL,
  `persentase_perubahan` double NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skm_layanan`
--

CREATE TABLE `skm_layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `skm_unit_layanan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_layanan`
--

INSERT INTO `skm_layanan` (`id`, `nama`, `skm_unit_layanan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Izin Memasang Reklame', 13, '2024-10-08 23:10:00', '2024-10-08 23:48:13', NULL),
(2, 'Layanan Pajak Reklame', 15, '2024-10-08 23:10:53', '2024-10-08 23:10:53', NULL),
(3, 'Surat Izin Praktik Perawat (SIPP)', 13, '2024-10-08 23:11:14', '2024-10-08 23:49:35', NULL),
(4, 'Surat Izin Praktik Dokter (SIPD)', 13, '2024-10-08 23:11:27', '2024-10-08 23:49:43', NULL),
(5, 'Layanan Berbantuan OSS', 13, '2024-10-08 23:11:38', '2024-10-08 23:11:38', NULL),
(6, 'Kartu Tanda Penduduk (KTP)', 14, '2024-10-08 23:14:24', '2024-10-09 01:12:22', NULL),
(7, 'Layanan Berbantuan OSS', 13, '2024-10-08 23:14:38', '2024-10-10 00:56:00', '2024-10-10 00:56:00'),
(8, 'Kartu Identitas Anak (KIA)', 14, '2024-10-08 23:14:55', '2024-10-08 23:14:55', NULL),
(9, 'Surat Keterangan Pola Ruang', 16, '2024-10-08 23:15:28', '2024-10-08 23:15:28', NULL),
(10, 'Persetujuan Bangunan Gedung (PBG)', 16, '2024-10-08 23:15:47', '2024-10-08 23:15:47', NULL),
(11, 'Sertifikat Laik Fungsi (SLF)', 16, '2024-10-08 23:16:02', '2024-10-08 23:16:02', NULL),
(13, 'Pertimbangan Teknis Pertanahan (PTP)', 19, '2024-10-08 23:49:21', '2024-10-09 01:11:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skm_pertanyaan`
--

CREATE TABLE `skm_pertanyaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `skm_unsur_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_pertanyaan`
--

INSERT INTO `skm_pertanyaan` (`id`, `pertanyaan`, `skm_unsur_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Bagaimana pendapat Saudara tentang kesesuaian  persyaratan pelayanan  dengan jenis pelayanannya ?', 79, '2024-10-08 19:11:11', '2024-10-08 19:11:11', NULL),
(11, 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini ?', 80, '2024-10-08 19:12:07', '2024-10-08 19:12:07', NULL),
(12, 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan ?', 81, '2024-10-08 19:12:49', '2024-10-08 19:12:49', NULL),
(13, 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan ?', 82, '2024-10-08 19:13:52', '2024-10-08 19:13:52', NULL),
(14, 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan ?', 83, '2024-10-08 19:14:33', '2024-10-08 19:14:33', NULL),
(15, 'Bagaimana pendapat Saudara tentang kompetensi/ kemampuan petugas atau sistem dalam pelayanan ?', 84, '2024-10-08 19:15:34', '2024-10-08 19:15:34', NULL),
(16, 'Bagamana pendapat saudara tentang perilaku petugas dalam pelayanan terkait kesopanan dan keramahan ?', 85, '2024-10-08 19:17:06', '2024-10-08 21:42:02', NULL),
(17, 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana ?', 87, '2024-10-08 19:18:23', '2024-10-08 19:18:23', NULL),
(18, 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan ?', 86, '2024-10-08 19:19:08', '2024-10-09 01:07:31', '2024-10-09 01:07:31'),
(19, 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan ?', 86, '2024-10-09 01:09:40', '2024-10-09 01:09:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skm_pilihan_jawaban`
--

CREATE TABLE `skm_pilihan_jawaban` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `skm_pertanyaan_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_pilihan_jawaban`
--

INSERT INTO `skm_pilihan_jawaban` (`id`, `jawaban`, `bobot`, `skm_pertanyaan_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'Tidak sesuai', 1, 10, '2024-10-08 19:11:11', '2024-10-08 19:11:11', NULL),
(27, 'Kurang sesuai', 2, 10, '2024-10-08 19:11:11', '2024-10-08 19:11:11', NULL),
(28, 'Sesuai', 3, 10, '2024-10-08 19:11:11', '2024-10-08 19:11:11', NULL),
(29, 'Sangat sesuai', 4, 10, '2024-10-08 19:11:11', '2024-10-08 19:11:11', NULL),
(30, 'Tidak mudah', 1, 11, '2024-10-08 19:12:07', '2024-10-08 19:13:07', NULL),
(31, 'Kurang mudah', 2, 11, '2024-10-08 19:12:07', '2024-10-08 19:13:07', NULL),
(32, 'Mudah', 3, 11, '2024-10-08 19:12:07', '2024-10-08 19:12:07', NULL),
(33, 'Sangat mudah', 4, 11, '2024-10-08 19:12:07', '2024-10-08 19:13:07', NULL),
(34, 'Tidak cepat', 1, 12, '2024-10-08 19:12:49', '2024-10-08 19:12:49', NULL),
(35, 'Kurang cepat', 2, 12, '2024-10-08 19:12:49', '2024-10-08 19:12:49', NULL),
(36, 'Cepat', 3, 12, '2024-10-08 19:12:49', '2024-10-08 19:12:49', NULL),
(37, 'Sangat cepat', 4, 12, '2024-10-08 19:12:49', '2024-10-08 19:12:49', NULL),
(38, 'Sangat mahal', 1, 13, '2024-10-08 19:13:52', '2024-10-08 19:13:52', NULL),
(39, 'Cukup mahal', 2, 13, '2024-10-08 19:13:52', '2024-10-08 19:13:52', NULL),
(40, 'Murah', 3, 13, '2024-10-08 19:13:52', '2024-10-08 19:13:52', NULL),
(41, 'Gratis', 4, 13, '2024-10-08 19:13:52', '2024-10-08 19:13:52', NULL),
(42, 'Tidak sesuai', 1, 14, '2024-10-08 19:14:33', '2024-10-08 19:14:33', NULL),
(43, 'Kurang sesuai', 2, 14, '2024-10-08 19:14:33', '2024-10-08 19:14:33', NULL),
(44, 'Sesuai', 3, 14, '2024-10-08 19:14:33', '2024-10-08 19:14:33', NULL),
(45, 'Sangat sesuai', 4, 14, '2024-10-08 19:14:33', '2024-10-08 19:14:33', NULL),
(46, 'Tidak kompeten', 1, 15, '2024-10-08 19:15:34', '2024-10-08 19:15:34', NULL),
(47, 'Kurang kompeten', 2, 15, '2024-10-08 19:15:34', '2024-10-08 19:15:34', NULL),
(48, 'Kompeten', 3, 15, '2024-10-08 19:15:34', '2024-10-08 19:15:34', NULL),
(49, 'Sangat kompeten', 4, 15, '2024-10-08 19:15:34', '2024-10-08 19:15:34', NULL),
(50, 'Tidak sopan dan ramah', 1, 16, '2024-10-08 19:17:06', '2024-10-08 19:17:06', NULL),
(51, 'Kurang sopan dan ramah', 2, 16, '2024-10-08 19:17:06', '2024-10-08 19:17:06', NULL),
(52, 'Sopan dan ramah', 3, 16, '2024-10-08 19:17:06', '2024-10-08 19:17:06', NULL),
(53, 'Sangat sopan dan ramah', 4, 16, '2024-10-08 19:17:06', '2024-10-08 19:17:06', NULL),
(54, 'Buruk', 1, 17, '2024-10-08 19:18:23', '2024-10-08 19:18:23', NULL),
(55, 'Cukup', 2, 17, '2024-10-08 19:18:23', '2024-10-08 19:18:23', NULL),
(56, 'Baik', 3, 17, '2024-10-08 19:18:23', '2024-10-08 19:18:23', NULL),
(57, 'Sangat baik', 4, 17, '2024-10-08 19:18:23', '2024-10-08 19:18:23', NULL),
(58, 'Tidak ada', 1, 18, '2024-10-08 19:19:08', '2024-10-09 01:07:31', '2024-10-09 01:07:31'),
(59, 'Ada tetapi tidak berfungsi', 2, 18, '2024-10-08 19:19:08', '2024-10-09 01:07:31', '2024-10-09 01:07:31'),
(60, 'Berfungsi kurang maksimal', 3, 18, '2024-10-08 19:19:08', '2024-10-09 01:07:31', '2024-10-09 01:07:31'),
(61, 'Dikelola dengan baik', 4, 18, '2024-10-08 19:19:08', '2024-10-09 01:07:31', '2024-10-09 01:07:31'),
(62, 'Tidak ada', 1, 19, '2024-10-09 01:09:40', '2024-10-09 01:09:40', NULL),
(63, 'Ada tetapi tidak berfungsi', 2, 19, '2024-10-09 01:09:40', '2024-10-09 01:09:40', NULL),
(64, 'Berfungsi kurang maksimal', 3, 19, '2024-10-09 01:09:40', '2024-10-09 01:09:40', NULL),
(65, 'Dikelola dengan baik', 4, 19, '2024-10-09 01:09:40', '2024-10-09 01:09:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skm_responden`
--

CREATE TABLE `skm_responden` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_responden`
--

INSERT INTO `skm_responden` (`id`, `jenis_kelamin`, `usia`, `pendidikan`, `pekerjaan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'L', 24, 'S1', 'Swasta', '2024-10-19 08:42:40', '2024-10-19 08:42:40', NULL),
(6, 'P', 24, 'D3', 'Wiraswasta', '2024-10-19 08:43:05', '2024-10-19 08:43:05', NULL),
(7, 'L', 25, 'Tidak Berpendidikan Formal', 'Wiraswasta', '2024-10-19 08:43:47', '2024-10-19 08:43:47', NULL),
(8, 'L', 30, 'Tidak Berpendidikan Formal', 'Wiraswasta', '2024-10-19 08:44:55', '2024-10-19 08:44:55', NULL),
(9, 'L', 43, 'S1', 'Wiraswasta', '2024-10-19 08:51:24', '2024-10-19 08:51:24', NULL),
(10, 'P', 37, 'SMA', 'Wiraswasta', '2024-10-19 11:17:14', '2024-10-19 11:17:14', NULL),
(11, 'L', 45, 'S1', 'Wiraswasta', '2024-10-19 13:30:37', '2024-10-19 13:30:37', NULL),
(12, 'L', 23, 'S1', 'ASN', '2024-10-19 13:35:56', '2024-10-19 13:35:56', NULL),
(13, 'L', 90, 'Tidak Berpendidikan Formal', 'Wiraswasta', '2024-10-19 13:38:21', '2024-10-19 13:38:21', NULL),
(14, 'P', 34, 'SMA', 'Tidak Bekerja', '2024-10-19 13:44:00', '2024-10-19 13:44:00', NULL),
(15, 'L', 48, 'S2', 'Wiraswasta', '2024-10-19 20:00:28', '2024-10-19 20:00:28', NULL),
(16, 'P', 24, 'S1', 'Swasta', '2024-10-19 20:33:18', '2024-10-19 20:33:18', NULL),
(17, 'L', 45, 'S1', 'Swasta', '2024-10-20 03:50:29', '2024-10-20 03:50:29', NULL),
(18, 'L', 23, 'Tidak Berpendidikan Formal', 'Swasta', '2024-10-20 21:29:57', '2024-10-20 21:29:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skm_unit_layanan`
--

CREATE TABLE `skm_unit_layanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_unit_layanan`
--

INSERT INTO `skm_unit_layanan` (`id`, `nama`, `logo_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', NULL, '2024-10-08 21:50:27', '2024-10-19 22:23:21', NULL),
(14, 'Dinas Kependudukan dan Pencatatan Sipil', NULL, '2024-10-08 21:50:33', '2024-10-19 22:23:34', NULL),
(15, 'Badan Pendapatan Daerah', NULL, '2024-10-08 21:50:43', '2024-10-19 22:23:44', NULL),
(16, 'Dinas Pekerjaan Umum dan Penataan Ruang', NULL, '2024-10-08 21:50:55', '2024-10-19 22:24:06', NULL),
(17, 'Dinas Pendidikan', NULL, '2024-10-08 21:51:03', '2024-10-19 22:24:15', NULL),
(18, 'Bank Kalteng', NULL, '2024-10-08 21:52:32', '2024-10-09 00:24:41', NULL),
(19, 'Badan Pertanahan Nasional', NULL, '2024-10-08 21:52:47', '2024-10-09 00:24:31', NULL),
(20, 'Kejaksaan Negeri', NULL, '2024-10-08 21:52:56', '2024-10-08 21:52:56', NULL),
(21, 'Pengadilan Negeri', NULL, '2024-10-08 21:53:03', '2024-10-09 00:25:22', NULL),
(22, 'BPJS Kesehatan', NULL, '2024-10-08 21:53:11', '2024-10-19 22:24:24', '2024-10-19 22:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `skm_unsur`
--

CREATE TABLE `skm_unsur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unsur` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skm_unsur`
--

INSERT INTO `skm_unsur` (`id`, `unsur`, `created_at`, `updated_at`, `deleted_at`) VALUES
(79, 'Persyaratan', '2024-10-08 19:08:38', '2024-10-08 21:06:14', NULL),
(80, 'Sistem, Mekanisme, dan Prosedur', '2024-10-08 19:09:05', '2024-10-08 19:09:05', NULL),
(81, 'Waktu Penyelesaian', '2024-10-08 19:09:18', '2024-10-08 19:09:18', NULL),
(82, 'Biaya/Tarif', '2024-10-08 19:09:26', '2024-10-08 19:09:26', NULL),
(83, 'Produk Spesifikasi Jenis Pelayanan', '2024-10-08 19:09:40', '2024-10-08 19:09:40', NULL),
(84, 'Kompetensi Pelaksana', '2024-10-08 19:09:50', '2024-10-08 19:09:50', NULL),
(85, 'Perilaku Pelaksana', '2024-10-08 19:10:00', '2024-10-08 19:36:14', NULL),
(86, 'Penanganan Pengaduan, Saran dan Masukan', '2024-10-08 19:10:10', '2024-10-08 19:10:10', NULL),
(87, 'Sarana dan prasarana', '2024-10-08 19:10:20', '2024-10-08 19:10:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skm_jawaban_pertanyaan`
--
ALTER TABLE `skm_jawaban_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_bulanan`
--
ALTER TABLE `skm_laporan_bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_harian`
--
ALTER TABLE `skm_laporan_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_kumulatif`
--
ALTER TABLE `skm_laporan_kumulatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_mingguan`
--
ALTER TABLE `skm_laporan_mingguan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_semester`
--
ALTER TABLE `skm_laporan_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_tahunan`
--
ALTER TABLE `skm_laporan_tahunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_laporan_triwulan`
--
ALTER TABLE `skm_laporan_triwulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_layanan`
--
ALTER TABLE `skm_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_pertanyaan`
--
ALTER TABLE `skm_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_pilihan_jawaban`
--
ALTER TABLE `skm_pilihan_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_responden`
--
ALTER TABLE `skm_responden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_unit_layanan`
--
ALTER TABLE `skm_unit_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skm_unsur`
--
ALTER TABLE `skm_unsur`
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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `skm_jawaban_pertanyaan`
--
ALTER TABLE `skm_jawaban_pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `skm_laporan_bulanan`
--
ALTER TABLE `skm_laporan_bulanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_laporan_harian`
--
ALTER TABLE `skm_laporan_harian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_laporan_kumulatif`
--
ALTER TABLE `skm_laporan_kumulatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_laporan_mingguan`
--
ALTER TABLE `skm_laporan_mingguan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_laporan_semester`
--
ALTER TABLE `skm_laporan_semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_laporan_tahunan`
--
ALTER TABLE `skm_laporan_tahunan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_laporan_triwulan`
--
ALTER TABLE `skm_laporan_triwulan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skm_layanan`
--
ALTER TABLE `skm_layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skm_pertanyaan`
--
ALTER TABLE `skm_pertanyaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `skm_pilihan_jawaban`
--
ALTER TABLE `skm_pilihan_jawaban`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `skm_responden`
--
ALTER TABLE `skm_responden`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skm_unit_layanan`
--
ALTER TABLE `skm_unit_layanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `skm_unsur`
--
ALTER TABLE `skm_unsur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
