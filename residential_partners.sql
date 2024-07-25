-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 11:12 AM
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
-- Database: `residential_partners`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `ad_type` enum('roommate','place') NOT NULL,
  `residence_type` enum('apartment','house','shared','studio') NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `availability_date` date NOT NULL,
  `location_description` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_size` decimal(8,2) DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT NULL,
  `number_of_bathrooms` int(11) DEFAULT NULL,
  `furnished` tinyint(1) DEFAULT NULL,
  `smoking_allowed` tinyint(1) DEFAULT NULL,
  `pets_allowed` tinyint(1) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('open','closed') NOT NULL DEFAULT 'open',
  `partner_age_min` int(11) DEFAULT NULL,
  `partner_age_max` int(11) DEFAULT NULL,
  `partner_gender` enum('male','female','any') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `user_id`, `title`, `ad_type`, `residence_type`, `budget`, `availability_date`, `location_description`, `country_id`, `city_id`, `room_size`, `number_of_rooms`, `number_of_bathrooms`, `furnished`, `smoking_allowed`, `pets_allowed`, `contact_email`, `notes`, `contact_phone`, `created_at`, `updated_at`, `status`, `partner_age_min`, `partner_age_max`, `partner_gender`) VALUES
(77, 12, 'Ad 1', 'place', 'house', 300.00, '2024-07-24', NULL, 1, 1, NULL, NULL, NULL, 1, 0, 1, 'test@gmail.com', '123', '930752001', '2024-07-24 10:48:24', '2024-07-24 10:48:24', 'open', NULL, NULL, NULL),
(78, 12, 'Ad 2', 'place', 'house', 300.00, '2024-07-24', NULL, 1, 4, NULL, NULL, NULL, 1, 0, 1, 'test@gmail.com', '123', '930752001', '2024-07-24 10:48:31', '2024-07-24 10:48:31', 'open', NULL, NULL, NULL),
(79, 12, 'Ad 3', 'place', 'apartment', 300.00, '2024-07-24', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'test@gmail.com', NULL, '930752001', '2024-07-24 10:48:42', '2024-07-24 10:48:42', 'open', NULL, NULL, NULL),
(80, 12, 'Ad 4', 'place', 'apartment', 300.00, '2024-07-24', NULL, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'test@gmail.com', '123', '930752001', '2024-07-24 10:48:49', '2024-07-24 10:48:49', 'open', NULL, NULL, NULL),
(81, 12, 'Ad 5', 'place', 'apartment', 300.00, '2024-07-24', NULL, 1, 4, NULL, NULL, NULL, NULL, 1, 0, 'test@gmail.com', NULL, '930752001', '2024-07-24 10:49:13', '2024-07-24 10:49:13', 'open', NULL, NULL, NULL),
(82, 13, 'Ad 1', 'roommate', 'house', 300.00, '2024-07-24', 'bla', 1, 7, 28.00, 2, 2, 1, 1, 1, 'test@gmail.com', '123', '930752001', '2024-07-24 11:00:18', '2024-07-24 11:00:18', 'open', NULL, NULL, NULL),
(83, 13, 'Ad 2', 'roommate', 'house', 300.00, '2024-07-24', 'bla', 1, 2, 28.00, 2, 2, 1, 1, 1, 'test@gmail.com', '123', '930752001', '2024-07-24 11:00:24', '2024-07-24 11:00:24', 'open', NULL, NULL, NULL),
(84, 13, 'Ad 3', 'roommate', 'house', 300.00, '2024-07-24', 'bla', 1, 2, 28.00, 2, 2, 1, 1, 1, 'test@gmail.com', '123', '930752001', '2024-07-24 11:01:26', '2024-07-24 11:01:26', 'open', NULL, NULL, NULL),
(85, 13, 'Ad 4', 'roommate', 'house', 300.00, '2024-07-24', 'bla', 1, 2, 28.00, 2, 2, 1, 1, 1, 'test@gmail.com', '123', '930752001', '2024-07-24 11:01:36', '2024-07-24 11:01:36', 'open', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `ad_id`, `image_path`, `created_at`, `updated_at`) VALUES
(64, 82, 'ads_images/1721829618_logo.png', '2024-07-24 11:00:18', '2024-07-24 11:00:18'),
(65, 83, 'ads_images/1721829624_male-avatar-portrait-of-a-young-man-with-a-beard-illustration-of-male-character-in-modern-color-style-vector.png', '2024-07-24 11:00:24', '2024-07-24 11:00:24'),
(66, 84, 'ads_images/1721829686_b06bef9a5f8153a24f4abb07cbc2c11e.jpg', '2024-07-24 11:01:26', '2024-07-24 11:01:26'),
(67, 85, 'ads_images/1721829696_—Pngtree—arabic people character avatar ilustration_6551088.png', '2024-07-24 11:01:36', '2024-07-24 11:01:36'),
(68, 85, 'ads_images/1721829696_avatar-generations_prsz.jpg', '2024-07-24 11:01:36', '2024-07-24 11:01:36'),
(69, 85, 'ads_images/1721829696_male-avatar-portrait-of-a-young-man-with-a-beard-illustration-of-male-character-in-modern-color-style-vector.jpg', '2024-07-24 11:01:36', '2024-07-24 11:01:36');

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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'دبي', 1, NULL, NULL),
(2, 'أبوظبي', 1, NULL, NULL),
(3, 'الشارقة', 1, NULL, NULL),
(4, 'عجمان', 1, NULL, NULL),
(5, 'رأس الخيمة', 1, NULL, NULL),
(6, 'الفجيرة', 1, NULL, NULL),
(7, 'أم القيوين', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الإمارات العربية المتحدة', NULL, NULL);

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
(1, '2024_07_14_105304_create_countries_table', 1),
(2, '2024_07_14_104438_create_cities_table', 2),
(3, '2024_07_14_104629_create_account_types_table', 3),
(4, '0001_01_01_000000_create_users_table', 4),
(5, '2024_07_14_105834_create_ads_type_table', 5),
(6, '2024_07_14_105851_create_resedence_type_table', 6),
(7, '2024_07_14_105821_create_ads_table', 7),
(8, '0001_01_01_000001_create_cache_table', 8),
(9, '0001_01_01_000002_create_jobs_table', 8),
(10, '2024_07_18_094003_add_profile_picture_to_users_table', 9),
(11, '2024_07_18_125138_create_ads_table', 10),
(12, '2024_07_18_131311_modify_account_type_in_users_table', 11),
(13, '2024_07_21_074903_create_ad_images_table', 12),
(14, '2024_07_21_102121_update_ads_table_for_new_structure', 13),
(15, '2024_07_21_110518_update_description_column_in_ads_table', 14),
(16, '2024_07_21_115919_rename_location_to_location_description_and_make_nullable', 15),
(17, '2024_07_21_120605_rename_description_to_notes_in_your_table_name', 16),
(18, '2024_07_22_081139_remove_preferences_from_ads_table', 17);

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
-- Table structure for table `residence_type`
--

CREATE TABLE `residence_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residence_type`
--

INSERT INTO `residence_type` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'شقة', 'شقة سكنية في مبنى متعدد الطوابق', NULL, NULL),
(2, 'غرفة', 'غرفة مستقلة', NULL, NULL);

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
('UwnAAite8sIP1MTf6Ygn3It1LyVePlIQaoBDefSI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3d5S1dKbUpoN1pJVjV4Z1h4aDV4TkJ0QVdOeGNuWHI3OWE1dnV0MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZHMvNzciO319', 1721898623);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account_type` enum('seeking_room','seeking_roommate') NOT NULL DEFAULT 'seeking_room',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `account_type`, `email_verified_at`, `password`, `phone_number`, `birthday`, `gender`, `nationality`, `country_id`, `city_id`, `job`, `marital_status`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'Ahmed', 'Saadi', 'ahmadsade011@gmail.com', 'seeking_roommate', NULL, '$2y$12$RRv79j0.t5NHs.4sdQHAEOpsd3ZBP7FfBhuwh/KRO5FuZmjqHMl5i', '930752001', '2000-07-11', 'male', 'Syrian', 1, 4, 'IT', 'married', 'profile_pictures/1721830117.jpg', NULL, '2024-07-18 10:39:23', '2024-07-25 05:48:32'),
(13, 'Ahmed', 'Saadi', 'ahmadsade0111@gmail.com', 'seeking_room', NULL, '$2y$12$RRv79j0.t5NHs.4sdQHAEOpsd3ZBP7FfBhuwh/KRO5FuZmjqHMl5i', '930752001', '2000-02-02', 'female', 'Syrian', 1, 2, 'sadsad', 'married', NULL, NULL, '2024-07-18 10:54:07', '2024-07-24 10:55:41'),
(14, 'Ahmed', 'Saadi', 'test@gmail.com', 'seeking_roommate', NULL, '$2y$12$/bC4yHEaIu/LfEV3r7Y5pOHVU9Ea5y7RvharlZICvbsvvr2OqIQWC', '930752001', '2024-07-25', 'female', 'dasdasdasd', 1, 1, 'dasdasdasd', 'single', NULL, NULL, '2024-07-25 05:04:30', '2024-07-25 06:02:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_user_id_foreign` (`user_id`),
  ADD KEY `ads_country_id_foreign` (`country_id`),
  ADD KEY `ads_city_id_foreign` (`city_id`);

--
-- Indexes for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_images_ad_id_foreign` (`ad_id`);

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `residence_type`
--
ALTER TABLE `residence_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `residence_type`
--
ALTER TABLE `residence_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD CONSTRAINT `ad_images_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
