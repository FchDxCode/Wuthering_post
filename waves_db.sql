-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jun 2024 pada 01.20
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waves_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guides`
--

CREATE TABLE `guides` (
  `id_game` bigint UNSIGNED NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `gambar_game` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `video_game` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi_game` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `guides`
--

INSERT INTO `guides` (`id_game`, `nama_game`, `gambar_game`, `video_game`, `deskripsi_game`, `created_at`, `updated_at`) VALUES
(13, 'Yinlin Guide Best', 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2024/06/wuthering-waves-yinlin-ascension-materials-1.jpg', 'https://youtu.be/GvjzuxSldbQ?si=9m7ndjRFKNtHrNpi', 'Yinlin is a rare character 5★ from \r\nElectroElectro element that uses a Rectifier type weapon. Yinlin is an activated Patroller and a powerful Natural Resonator. After being suspended in the Public Security Bureau, he must now pursue hidden crimes in secret.', '2024-06-11 23:44:21', '2024-06-13 18:04:21'),
(14, 'Encore Guide', 'https://static1.thegamerimages.com/wordpress/wp-content/uploads/2024/06/encore.jpg', 'https://youtu.be/c4wPs708Pdw?si=DKEeiTdupHjXtWx2', 'Encore is a rare character 5★ from \r\nFusionFusion element that uses a Rectifier type weapon. A girl is accompanied by one black and one white Wooly doll. Encore, a consultant from Black Shores, is eager to create a happy story with candy, fairy tales and his imagination.', '2024-06-11 23:47:36', '2024-06-12 00:47:03'),
(15, 'Guide Calcharo best main char 5★', 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2024/05/wuthering-waves-calcharo-build-guide.jpg', 'https://youtu.be/lAWcrX2GhLs?si=Qz3KogdvVk2sxven', 'Calcharo is a rare character 5★ from \r\nElectroElectro element that uses a Broadblade type weapon. Leader of the \"Ghost Hounds\", an international mercenary group. Cruel, vengeful, unforgiving. A potential client should consider the price to be paid before making him an offer.', '2024-06-11 23:51:16', '2024-06-12 00:47:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_08_090349_create_guides_table', 2),
(5, '2024_06_08_090355_create_news_table', 2),
(6, '2024_06_08_090400_create_tips_table', 2),
(7, '2024_06_08_090404_create_profiles_table', 2),
(8, '2024_06_08_090950_add_is_admin_to_users_table', 3),
(9, '2024_06_08_114541_add_two_factor_columns_to_users_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` bigint UNSIGNED NOT NULL,
  `nama_news` varchar(255) NOT NULL,
  `gambar_news` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `video_news` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi_news` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `nama_news`, `gambar_news`, `video_news`, `deskripsi_news`, `created_at`, `updated_at`) VALUES
(6, 'Intensive Training – Limited Time EXP Material Double Drop Event', 'https://staticg.sportskeeda.com/editor/2024/06/3f8fa-17174344650449-1920.jpg', 'https://youtu.be/OiAdpj4hZ5k?si=lwB1B2pWFlRS5NvM', 'During the Intensive Training event period, players can claim double the Simulation Training rewards (talk to Yhan, Simulation Training Instructor in Jinzhou) up to three times a day.', '2024-06-11 23:54:40', '2024-06-12 00:49:32'),
(7, 'Event Notice | Overdash Club — Limited-time Track Challenge Coming Soon!', 'https://wutheringwaves.gg/wp-content/uploads/sites/8/2024/05/featuredImage-7-1024x576.jpg', 'https://youtu.be/ZhqoiE00IDQ?si=_lLeypBQlNQssZN-', 'Tactical Hologram: Overdash event offers 6 unlocked tracks for challenges.\r\nChoose a track and navigate it, avoiding traps within a time limit.\r\nCollect Hologram Tokens while making your way to the finish line.\r\nYour score depends on the number of Tokens collected.\r\nHigher scores yield better rewards.', '2024-06-11 23:56:15', '2024-06-12 00:52:44'),
(8, 'Free 5-Star Selector and 10 Rate Up Pulls as Further Compensation', 'https://wutheringwaves.gg/wp-content/uploads/sites/8/2024/05/Free-10-Lustrous-Tides-as-Compensation-for-Global-Launch-Issues-1024x576.jpg', 'https://youtu.be/3w_yzcwl3k8?si=6d5aj7U9pQO0Ewhk', 'Today we\'re talking about the BEST 5 STARS to pick at Wuthering Waves. Of course we just got the 5 star selector, and today we are discussing the best options to choose between the 5 stars in the game are calcharo, verina, encore, lingyang, and jianxin.', '2024-06-11 23:58:05', '2024-06-12 00:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$EdT15EoRoUUVen0QMMHnGuyPISSJtgqfbSl2/wMkRLvG9Pjywf/em', '2024-06-11 09:24:03'),
('fachru005@gmail.com', '$2y$12$FICbzbKz5MHxMjqUaWPHruaDz6Q7mYrs5AUvCWnTldJBmqNDzvEOK', '2024-06-11 09:26:17'),
('userbiasa@gmail.com', '$2y$12$G4Hm7Pn8jXqf3rUPKcAvheZk98oUd.5MFtIMTL0Rv4O2H9RC5Czgi', '2024-06-11 09:24:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6ubnWXDvP2pNdZ8iCmle2X9JpCivbdL4GHFDAr1a', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUFYUkF2R2taalNJNUU2RUlhRUh4TjdEV3FucFQwVG5PS3cxb2RHeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1718327069);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tips`
--

CREATE TABLE `tips` (
  `id_tips` bigint UNSIGNED NOT NULL,
  `nama_tips` varchar(255) NOT NULL,
  `gambar_tips` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `video_tips` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi_tips` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tips`
--

INSERT INTO `tips` (`id_tips`, `nama_tips`, `gambar_tips`, `video_tips`, `deskripsi_tips`, `created_at`, `updated_at`) VALUES
(4, 'Sonata Effects and Echo Set Guide', 'https://wutheringwaves.gg/wp-content/uploads/sites/8/2023/04/Wuthering-Waves-Tempest-Mephis.png', 'https://youtu.be/Mu8WnKYSrVE?si=zuzMcT1NDuZZYtCV', 'In Wuthering Waves, equipping characters with Echoes you collected by defeating monsters from the same set triggers their Sonata Effect. There are currently bonuses for equipping 2 and 5 unique Echoes (note: A Phantom shiny Echo counts as different ones!) from the same set.', '2024-06-12 00:03:12', '2024-06-12 00:03:12'),
(5, 'Combat Guide', 'https://wutheringwaves.gg/wp-content/uploads/sites/8/2024/05/Wuthering-Waves-Jiyan-Art-1024x576.jpg', 'https://youtu.be/x2Y36ja0vXA?si=2DxmsZdxrnQ32hAd', 'Combat is one of the core gameplay elements of Wuthering Waves, as it’s how you defeat enemies and progress through the game. If you’re still learning the ropes on controlling your Resonators in battle or want a refresher, then look no further.', '2024-06-12 00:04:18', '2024-06-12 00:04:18'),
(6, 'How to Use Sensor in Wuthering Waves', 'https://wutheringwaves.gg/wp-content/uploads/sites/8/2024/05/image-4-1.jpg', 'https://youtu.be/0o6_S5BNHA4?si=Bdpv3OH05IsyMg8D', 'In Chapter 1: Huangling I - Act II, there will be a quest mission where you need to use a Sensor to confirm the patrol route to find the Detection Beacon.', '2024-06-12 00:05:29', '2024-06-12 00:05:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text,
  `two_factor_recovery_codes` text,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(4, 'Admin', 'admin@gmail.com', '$2y$12$KrzjkmkdI1ZNS5v9pMG9uuVywRho4XN.duqYf.qFZZF1DbWjec86e', NULL, NULL, NULL, NULL, '2024-06-08 02:37:12', '2024-06-08 02:37:12', 1),
(8, 'userbiasa', 'userbiasa@gmail.com', '$2y$12$RZHzxKAwS7L0ahTPOCTvpOVkLo7o5zUbcDLe8sPe/q1sFKEE3WIsi', NULL, NULL, NULL, NULL, '2024-06-08 03:21:16', '2024-06-08 03:21:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id_tips`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guides`
--
ALTER TABLE `guides`
  MODIFY `id_game` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tips`
--
ALTER TABLE `tips`
  MODIFY `id_tips` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
