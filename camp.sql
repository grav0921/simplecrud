-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 12:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camp`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_barang_id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `jenis_barang_id`, `kode_barang`, `nama_barang`, `harga_barang`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'BK01', 'kompor1', '10000', '46', NULL, '2022-07-27 00:28:04'),
(2, 1, 'BK02', 'kompor2', '15000', '49', NULL, '2022-07-26 20:40:23'),
(3, 2, 'BT01', 'tenda1', '25000', '15', NULL, '2022-07-26 23:59:31'),
(4, 2, 'BT02', 'tenda2', '50000', '15', NULL, '2022-07-26 20:34:04');

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
-- Table structure for table `jenis_barangs`
--

CREATE TABLE `jenis_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_barangs`
--

INSERT INTO `jenis_barangs` (`id`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(1, 'kompor', NULL, NULL),
(2, 'tenda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sewa_kamar_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamars`
--

INSERT INTO `kamars` (`id`, `sewa_kamar_id`, `nomor_kamar`, `harga_kamar`, `status`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 0, 'K001', '55000', 'tersedia', 'kamar ini memiliki luas ... dengan jumlah kamar sebanyak ... ', NULL, '2022-07-27 00:28:28'),
(2, 0, 'K002', '70000', 'tersedia', 'kamar ini memiliki luas ... dengan jumlah kamar sebanyak ... ', NULL, NULL),
(3, 0, 'K003', '35000', 'tersedia', 'kamar ini memiliki luas ... dengan jumlah kamar sebanyak ... ', NULL, NULL);

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
(51, '2014_10_12_000000_create_users_table', 1),
(52, '2014_10_12_100000_create_password_resets_table', 1),
(53, '2019_08_19_000000_create_failed_jobs_table', 1),
(54, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(55, '2022_07_22_084013_create_barangs_table', 1),
(56, '2022_07_23_015155_create_jenis_barangs_table', 1),
(57, '2022_07_23_101448_create_kamars_table', 1),
(58, '2022_07_23_102825_create_sewa_kamars_table', 1),
(59, '2022_07_23_143233_create_sewa_barangs_table', 1),
(60, '2022_07_24_034804_create_transaksis_table', 1),
(61, '2022_07_24_035407_create_saldos_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saldos`
--

CREATE TABLE `saldos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi_saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluar_saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saldos`
--

INSERT INTO `saldos` (`id`, `user_id`, `isi_saldo`, `jumlah_saldo`, `keluar_saldo`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '325000', '10000', '2022-07-26 07:25:03', '2022-07-26 21:48:54'),
(7, 8, '0', '4765000', '105000', '2022-07-26 23:05:58', '2022-07-26 23:58:30'),
(8, 9, '0', '30000', '390000', '2022-07-27 00:03:00', '2022-07-27 00:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `sewa_barangs`
--

CREATE TABLE `sewa_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kembali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sewa_barangs`
--

INSERT INTO `sewa_barangs` (`id`, `user_id`, `barang_id`, `nama_barang`, `tgl_sewa`, `tgl_kembali`, `jumlah_barang`, `harga`, `created_at`, `updated_at`) VALUES
(22, 8, 1, 'kompor1', '2022-07-27', '2022-07-30', '2', '60000', '2022-07-26 23:58:10', '2022-07-27 00:28:04'),
(28, 9, 1, 'kompor1', '2022-07-27', '2022-07-30', '2', '60000', '2022-07-27 00:04:07', '2022-07-27 00:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `sewa_kamars`
--

CREATE TABLE `sewa_kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kamar_id` bigint(20) UNSIGNED NOT NULL,
  `nomor_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sewa_kamars`
--

INSERT INTO `sewa_kamars` (`id`, `user_id`, `kamar_id`, `nomor_kamar`, `check_in`, `check_out`, `harga`, `created_at`, `updated_at`) VALUES
(4, 9, 1, 'K001', '2022-07-27T14:28', '2022-07-30T14:28', '330000', '2022-07-27 00:28:28', '2022-07-27 00:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sewa_kamar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sewa_barang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `sewa_kamar_id`, `sewa_barang_id`, `total_harga`, `waktu_transaksi`, `created_at`, `updated_at`) VALUES
(13, 2, NULL, NULL, '135000', '2022-07-26 20:42:27', '2022-07-26 20:25:52', '2022-07-26 20:42:27'),
(41, 8, NULL, NULL, '105000', '2022-07-26 23:58:30', '2022-07-26 23:05:58', '2022-07-26 23:58:30'),
(42, 9, NULL, NULL, '390000', '2022-07-27 00:28:31', '2022-07-27 00:03:00', '2022-07-27 00:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_user` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `jenis_user`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user2', 'user2@gmail.com', NULL, NULL, NULL, 1, 'user2', '$2y$10$QXyI74/WmxV2ATxH.805DuArhxhfbe8MxYRLkAujuGJix8TpOJqTe', NULL, '2022-07-26 07:25:03', '2022-07-26 07:25:03'),
(8, 'user3', 'user3@frog.com', NULL, NULL, NULL, 1, 'user3', '$2y$10$8PndMx1SVow.7awO0ewrkeRHloOfnXj.TGE1Qk5Vwz5Rp.jBkkC.O', NULL, '2022-07-26 23:05:58', '2022-07-26 23:05:58'),
(9, 'user4', 'user4@gmal.com', NULL, NULL, NULL, 1, 'user4', '$2y$10$.P3mbBDvA9u86VuVTiVBSerG0hzmuMSG119moqc4sCSquUz.GfJGG', NULL, '2022-07-27 00:03:00', '2022-07-27 00:03:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_barangs`
--
ALTER TABLE `jenis_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
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
-- Indexes for table `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa_barangs`
--
ALTER TABLE `sewa_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sewa_kamars`
--
ALTER TABLE `sewa_kamars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barangs`
--
ALTER TABLE `jenis_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saldos`
--
ALTER TABLE `saldos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sewa_barangs`
--
ALTER TABLE `sewa_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sewa_kamars`
--
ALTER TABLE `sewa_kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
