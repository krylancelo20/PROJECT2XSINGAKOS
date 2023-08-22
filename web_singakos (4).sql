-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 05:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_singakos`
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
-- Table structure for table `giss`
--

CREATE TABLE `giss` (
  `id_map` int(11) NOT NULL,
  `nama_map` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longtitude` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kost_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `sisa_kamar` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `slug`, `alamat`, `image`, `created_at`, `updated_at`) VALUES
(1, 'PT Youme Cibogo Subang', 'pt-youme-cibogo-subang-1308', 'Jl. Sukamulya Cibogo, Padaasih, Kec. Cibogo, Kabupaten Subang, Jawa Baratt', 'tekwan1.jpeg', '2023-03-26 08:12:01', '2023-06-11 20:14:40'),
(2, 'PT Taekwang', 'pt-taekwang-6060', 'Desa Belendung, Kec. Cibogo, Kabupaten Subang, Jawa Barat', 'TEKWANg.jpeg', '2023-03-26 08:12:01', '2023-06-08 07:50:27'),
(3, 'PT Meilon Teknologi Indonesia', 'pt-meilon-teknologi-indonesia-8134', 'Jl. Raya Sembung Pagaden, Gunungsembung, Kec. Pagaden, Kabupaten Subang, Jawa Barat', 'MEILON.jpeg', '2023-03-26 08:12:01', '2023-06-08 07:50:41'),
(4, 'Universitas Mandiri', 'universitas-mandiri-7896', 'Jl. Marsinu No.5, Dangdeur, Tegalkalapa, Kabupaten Subang, Jawa Barat', 'UM.jpeg', '2023-06-08 07:27:34', '2023-06-08 07:50:53'),
(5, 'Universitas Subang', 'universitas-subang-5458', 'Jl. Raden Ajeng Kartini No.KM. 3, desa nyimplung, Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat', 'UNSUB.jpeg', '2023-06-08 07:27:59', '2023-06-08 07:51:08'),
(6, 'PT Suai', 'pt-suai-6516', 'Jl. Raya Subang Ke. Cipeundeuy, Kabupaten Subang, Jawa Barat', 'PT Suai.jpg', '2023-06-08 07:28:26', '2023-06-15 10:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `kosts`
--

CREATE TABLE `kosts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_07_003354_create_kosts_table', 1),
(6, '2022_05_07_014358_create_kategoris_table', 1),
(7, '2022_05_11_133922_create_penyewaans_table', 1),
(8, '2022_05_12_175205_create_pelaporans_table', 1),
(9, '2022_05_21_070529_create_kamars_table', 1),
(10, '2022_06_04_032537_create_pembayarans_table', 1);

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
-- Table structure for table `pelaporans`
--

CREATE TABLE `pelaporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyewaan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kerusakan',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penyewaan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `total_bayar` int(11) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaans`
--

CREATE TABLE `penyewaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kamar_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_kamar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `awal_sewa` date NOT NULL,
  `akhir_sewa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'penyewa',
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_rek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `norek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `status`, `nohp`, `atas_nama`, `jenis_rek`, `norek`, `alamat`, `image`, `email_verified_at`, `password`, `ban`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '62846759232', 'admin', 'bri', '0112371122', 'Cibogo, Subang', NULL, NULL, '$2y$10$fbwjle0PSKEHVazgPUVBteJPKSs1ZEBAPwzG9aiuoiYZ2O/1CuDGa', 0, NULL, '2023-03-26 08:12:01', '2023-06-18 20:36:04'),
(7, 'Dandi Agustian', 'GloryGloryMU', 'dandinugraha@gmail.com', 'pemilik', '62821275526', 'Dandi Agustian', 'BRI', '12345987', 'Subang, Jawa Barat', 'Dandi Agustian.jpg', NULL, '$2y$10$dyTWMHpQWfeAHBTAa7MclOyhuT5g3sxqr//UdorOxCsTWxuIBM6HG', 0, NULL, '2023-06-04 02:43:18', '2023-06-22 09:01:38'),
(9, 'Kevin Abhistaa', 'PermataKos', 'kevinabhista00@gmail.com', 'penyewa', '628211628217076', 'Kevin Abhista', 'BCA', '055667788', 'Subang', 'Kevin Abhista.jpg', NULL, '$2y$10$2JxAxuB2.DYTErr3Ej9yl.GY7/XThCo38D5od1Ym9N0X/7gnoXuvO', 0, NULL, '2023-06-11 21:28:44', '2023-06-23 08:40:37'),
(13, 'Desto Syafrian', 'DesPoke', 'destosyafrian@gmail.com', 'penyewa', '234567628', 'Desto Syafrian', 'BCA', '2345678', 'Subang', 'Desto Syafrian.jpg', NULL, '$2y$10$HuxvgUDho7vqLHu1It784.5XGgrLWEkkvp4rChxHrswBQ10ZLTGwG', 0, NULL, '2023-06-18 20:07:04', '2023-06-22 08:34:56'),
(14, 'GloryMU', 'MUJuara', 'glorymu@gmail.com', 'penyewa', '628122234628976', 'GloryMU', 'BRI', '055123456', 'Subang', 'GloryMU.png', NULL, '$2y$10$rU39i/EG9GiPCyWM8TuNyuYQ.tFWtw6qG5fcAGChWMhuQQtK6ts5a', 1, NULL, '2023-06-22 05:32:12', '2023-06-23 00:17:57'),
(15, 'GloryMCityy', 'MCityJuara', 'glorymcity@gmail.com', 'penyewa', '6281257562862876', 'GloryMCity', 'BRI', '2345688909', 'Subang Kota', 'GloryMCity.png', NULL, '$2y$10$ckG5eemcGBSt1nAu8jn6FO4cWCYw0qxraYByzKTY5As24ZOn/0koe', 1, NULL, '2023-06-22 07:10:04', '2023-06-23 08:26:29'),
(17, 'Barca', 'Visca', 'viscabarca@gmail.com', 'penyewa', '6282116286543456', 'Visca Barca', 'BCA', '34567887654', 'Subang', 'Barca.png', NULL, '$2y$10$xUeaX4qSBMUnp2UsAHEDeuRAt3d6VlqTdx4dJoz8EvgwvTafb11dK', 1, NULL, '2023-06-22 18:00:21', '2023-06-23 08:59:15'),
(18, 'Glorycode Technology', 'technology', 'glorycode@gmail.com', 'penyewa', '34567096287', 'GloryCode Technology', 'BCA', '8765357547', 'Subang', 'Glorycode.png', NULL, '$2y$10$at4PQ4/M5JWhArau1z2fz.XkjxdQ2/4MiikDWYQ3ru6Ybb4AE7O9K', 0, NULL, '2023-06-23 08:44:05', '2023-06-23 08:44:24');

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
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kamars_slug_unique` (`slug`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_slug_unique` (`slug`);

--
-- Indexes for table `kosts`
--
ALTER TABLE `kosts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kosts_slug_unique` (`slug`);

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
-- Indexes for table `pelaporans`
--
ALTER TABLE `pelaporans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelaporans_slug_unique` (`slug`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayarans_slug_unique` (`slug`);

--
-- Indexes for table `penyewaans`
--
ALTER TABLE `penyewaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penyewaans_slug_unique` (`slug`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nohp_unique` (`nohp`),
  ADD UNIQUE KEY `users_norek_unique` (`norek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kosts`
--
ALTER TABLE `kosts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelaporans`
--
ALTER TABLE `pelaporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `penyewaans`
--
ALTER TABLE `penyewaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
