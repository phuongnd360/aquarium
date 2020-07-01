-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 03:02 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xanhtuoifish`
--
CREATE DATABASE IF NOT EXISTS `xanhtuoifish` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `xanhtuoifish`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `name_vi` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(2) DEFAULT NULL,
  `sort` bigint(20) DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_url` text COLLATE utf8mb4_unicode_ci,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `is_delete` tinyint(2) DEFAULT NULL,
  `last_ip` text COLLATE utf8mb4_unicode_ci,
  `last_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Categories Table';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_vi`, `status`, `sort`, `seo_title`, `seo_url`, `seo_keyword`, `seo_description`, `is_delete`, `last_ip`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'Freshwater fishes list', 'Freshwater fishes list', NULL, 1, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', 1, '2019-12-22 07:48:39', '2020-01-03 08:12:53'),
(2, 'Tridacna Clams and Sea-Horse', 'Tridacna Clams and Sea-Horse', NULL, 2, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', 1, '2019-12-20 17:00:00', '2020-01-03 08:12:53'),
(4, 'Marine fishes List', 'Marine fishes List', NULL, 4, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', 1, '2019-12-20 17:00:00', '2020-02-05 01:34:14'),
(5, 'Soft and Hard Corals List', 'Soft and Hard Corals List', NULL, 5, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', 1, '2019-12-24 08:54:17', '2020-02-05 01:34:14'),
(6, 'Marine invertebrates list', 'Marine invertebrates list', NULL, 6, 'Marine invertebrates list', NULL, 'Marine invertebrates list', 'Marine invertebrates list', NULL, '192.168.100.13', 1, '2020-02-05 23:45:45', '2020-02-05 23:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_info` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag_read` tinyint(2) DEFAULT NULL,
  `is_delete` tinyint(2) DEFAULT NULL,
  `last_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Contact Table';

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci,
  `title_vi` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `image_primary` text COLLATE utf8mb4_unicode_ci,
  `water_mark` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(2) DEFAULT NULL,
  `sort` bigint(20) DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_url` text COLLATE utf8mb4_unicode_ci,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `is_delete` tinyint(2) DEFAULT NULL,
  `last_ip` text COLLATE utf8mb4_unicode_ci,
  `last_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Facilities Table';

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `title_en`, `title_vi`, `description_en`, `description_vi`, `image_primary`, `water_mark`, `status`, `sort`, `seo_title`, `seo_url`, `seo_keyword`, `seo_description`, `is_delete`, `last_ip`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'Manufacturing Inventory', 'Manufacturing Inventory', 'Manufacturing Inventory', 'Manufacturing Inventory', 'facility1.jpg', 'https://xanhtuoitropicalfish.com', NULL, 1, 'Manufacturing Inventory', NULL, 'Manufacturing Inventory', 'Manufacturing Inventory', NULL, '192.168.100.13', 1, '2020-02-06 00:04:40', '2020-02-06 00:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `name_vi` text COLLATE utf8mb4_unicode_ci,
  `name_science` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_vi` text COLLATE utf8mb4_unicode_ci,
  `cat_id` bigint(20) DEFAULT NULL,
  `image_primary` text COLLATE utf8mb4_unicode_ci,
  `image_more` text COLLATE utf8mb4_unicode_ci,
  `water_mark` text COLLATE utf8mb4_unicode_ci,
  `gallery` tinyint(2) DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor` bigint(20) DEFAULT NULL,
  `top_page` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `sort` bigint(20) DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_url` text COLLATE utf8mb4_unicode_ci,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `is_delete` tinyint(2) DEFAULT NULL,
  `last_ip` text COLLATE utf8mb4_unicode_ci,
  `last_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Product Table';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_vi`, `name_science`, `description_en`, `description_vi`, `cat_id`, `image_primary`, `image_more`, `water_mark`, `gallery`, `size`, `code`, `visitor`, `top_page`, `status`, `sort`, `seo_title`, `seo_url`, `seo_keyword`, `seo_description`, `is_delete`, `last_ip`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'clown knife', 'clown knife', 'NOTOPTERUS  CHITALA', 'clown knife', 'clown knife', 1, 'V0000.jpg', '[\"V0001.jpg\",\"V0002.jpg\"]', 'https://xanhtuoitropicalfish.com', 1, '4.7\'\', 6\'\', 8\'\'', 'V0000', NULL, 1, NULL, 1, 'clown knife', NULL, 'clown knife', 'clown knife aquarium', NULL, '192.168.100.13', 1, '2020-02-05 23:31:25', '2020-02-05 23:31:25'),
(2, 'COREA CLAMS', 'COREA CLAMS', 'TRIDACNA CROCEA', 'COREA CLAMS Aquarium', 'COREA CLAMS Aquarium', 2, 'Tridacna Crocea X0001.jpg', '[\"Tridacna Crocea X0001 (1).jpg\",\"Tridacna Maxima X0004 (2).jpg\"]', 'https://xanhtuoitropicalfish.com', 1, 'S,M,L', 'X 0001', NULL, 1, NULL, 2, 'COREA CLAMS', NULL, 'COREA CLAMS', 'COREA CLAMS Aquarium', NULL, '192.168.100.13', 1, '2020-02-05 23:37:31', '2020-02-05 23:37:31'),
(3, 'MAGNIFICENT SEA ANEMONE', 'MAGNIFICENT SEA ANEMONE', 'HETESACTIS  MAGNIFICA', 'MAGNIFICENT SEA ANEMONE', 'MAGNIFICENT SEA ANEMONE', 4, 'B01.jpg', '[\"B01 (1).jpg\",\"B01 (2).jpg\",\"B01 (3).jpg\",\"B01 (4).jpg\"]', 'https://xanhtuoitropicalfish.com', 1, 'M,L', 'B 01', NULL, 1, NULL, 3, 'Magnificent Sea Anemone (Heteractis magnifica)', NULL, 'Magnificent Sea Anemone (Heteractis magnifica)', 'Magnificent Sea Anemone (Heteractis magnifica)', NULL, '192.168.100.13', 1, '2020-02-05 23:40:37', '2020-02-05 23:40:37'),
(4, 'Giant cup mushroom', 'Giant cup mushroom', 'Amplexidiscus fenestrafer', 'Giant cup mushroom', 'Giant cup mushroom', 5, 'SH 01 (2).jpg', '[\"SH 01 (1).jpg\",\"SH 01.jpg\"]', NULL, 1, 'M,L', 'SH 01', NULL, 1, NULL, 4, 'Giant cup mushroom', NULL, 'Giant cup mushroom', 'Giant cup mushroom', NULL, '192.168.100.13', 1, '2020-02-05 23:45:03', '2020-02-05 23:45:03'),
(5, 'Sea Apple', 'Sea Apple', 'Pseudocolochirus axiologus', 'Sea Apple', 'Sea Apple', 6, 'red sea apple.jpg', '[\"sea apple (1).jpg\",\"sea apple.jpg\"]', NULL, 1, 'M', 'B 0108', NULL, 1, NULL, 5, 'Sea Apple', NULL, 'Sea Apple', 'Sea Apple', NULL, '192.168.100.13', 1, '2020-02-05 23:49:37', '2020-02-05 23:49:37'),
(6, 'RED ORANDA', 'RED ORANDA', 'CARASSIU AURATUS', 'RED ORANDA', 'RED ORANDA', 1, 'RED ORANDA.jpg', '[\"RED ORANDA (1).jpg\"]', 'https://xanhtuoitropicalfish.com', 1, '1.3\'\', 2\'\', 2.50\'\', 3\'\', 3.50\'\', 4\'\'', 'V0107', NULL, 1, NULL, 6, 'RED ORANDA', NULL, 'RED ORANDA', 'RED ORANDA', NULL, '192.168.100.13', 1, '2020-02-06 00:27:31', '2020-02-09 00:47:03'),
(7, 'RED RYUKIN', 'RED RYUKIN', 'CARASSIU AURATUS', 'RED RYUKIN', 'RED RYUKIN', 1, '5inches 44pcs per box.jpg', '[\"IMG_5399.jpg\",\"Ryukin_Gold_432x.JPG\"]', 'https://xanhtuoitropicalfish.com', 1, '1.5\'\', 2\'\', 2.5\'\', 3\'\', 3.5\'\', 4\'\'', 'V1223', NULL, 1, NULL, 7, 'RED RYUKIN', NULL, 'RED RYUKIN', 'RED RYUKIN', NULL, '192.168.100.13', 1, '2020-02-09 00:56:57', '2020-02-09 00:56:57'),
(8, 'PEARLSCALED ANGEL', 'PEARLSCALED ANGEL', 'CENTROPYGE VROLIKI', 'PEARLSCALED ANGEL', 'PEARLSCALED ANGEL', 4, 'PEARLSCALED_ANGEL (1).jpg', '[\"PEARLSCALED_ANGEL (2).jpg\"]', NULL, 1, 'S,M,L', 'X0106', NULL, 1, NULL, 8, 'PEARLSCALED ANGEL', NULL, 'PEARLSCALED ANGEL', 'PEARLSCALED ANGEL', NULL, '192.168.100.13', 1, '2020-02-09 01:01:24', '2020-02-09 01:01:24'),
(9, 'Kenya tree coral', 'Kenya tree coral', 'Capnella imbricata', 'Kenya tree coral', 'Kenya tree coral', 5, 'Kenya tree coral (1).jpeg', '[\"Kenya tree coral.jpeg\"]', 'https://xanhtuoitropicalfish.com', 1, 'M,L', 'SH 05', NULL, 1, NULL, 9, 'Kenya tree coral', NULL, 'Kenya tree coral', 'Kenya tree coral', NULL, '192.168.100.13', 1, '2020-02-09 01:04:34', '2020-02-09 01:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `mail_to` text COLLATE utf8mb4_unicode_ci,
  `mail_cc` text COLLATE utf8mb4_unicode_ci,
  `mail_bcc` text COLLATE utf8mb4_unicode_ci,
  `signature` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Settings Table';

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `mail_to`, `mail_cc`, `mail_bcc`, `signature`) VALUES
(1, 'phuongnd360@gmail.com', 'phuongnd360@gmail.com', 'phuongnd360@gmail.com', '<p><br></p><p><br></p><p>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br><span style=\"font-weight: bold;\"><span style=\"color: rgb(8, 82, 148);\">XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM</span></span><br><span style=\"font-weight: bold;\">Head Office</span>: 121/4 Me Coc Str, ward 15, District 8, HCMC, Vietnam<br><span style=\"font-weight: bold;\">Branch</span>: C5/1A, Group 5, Hamlet 3, Qui Duc Commune, Binh Chanh District, HCMC, Vietnam<br><span style=\"font-weight: bold;\">Phone</span>: (+84) 283 620 1608 , FAX: (+84) 283 620 1609<br><span style=\"font-weight: bold;\">Website</span>: https://xanhtuoitropicalfish.com<br><span style=\"font-weight: bold;\">Email</span>: tuoi@xanhtuoitropicalfish.com<br>━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `last_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `is_admin`, `roles`, `status`, `password`, `remember_token`, `is_delete`, `last_ip`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'Xanh Tuoi', 'Fish', 'admin', 'Tuoi@XanhTuoiaquarium.com', '2020-02-04 17:00:00', 1, '1', 1, '$2y$10$pxP7d0HVK3EmY5vzoYSxcu3JXlpLOjTd5WcZCWcexnUBLhGnms1Ti', 'cfaeGLPTfzpwl5xrbeQ55q7RmlJahGO8dkXW9vj5bnBACvWBJXD8BwuOsql0', NULL, '127.0.0.1', 1, '2020-02-04 17:00:00', '2020-02-05 07:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci,
  `title_vi` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `embed_video` text COLLATE utf8mb4_unicode_ci,
  `poster` text COLLATE utf8mb4_unicode_ci,
  `type_video` tinyint(2) DEFAULT NULL,
  `visitor` bigint(20) DEFAULT NULL,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `sort` bigint(20) DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_url` text COLLATE utf8mb4_unicode_ci,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `is_delete` tinyint(2) DEFAULT NULL,
  `last_ip` text COLLATE utf8mb4_unicode_ci,
  `last_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Videos Table';

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title_en`, `title_vi`, `url`, `embed_video`, `poster`, `type_video`, `visitor`, `ip_address`, `status`, `sort`, `seo_title`, `seo_url`, `seo_keyword`, `seo_description`, `is_delete`, `last_ip`, `last_user`, `created_at`, `updated_at`) VALUES
(1, 'Vietnam discus supply- Xanh Tuoi Tropical Fish Vietnam', 'Vietnam discus supply- Xanh Tuoi Tropical Fish Vietnam', 'https://www.youtube.com/embed/bfdYgNF5Ax0', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/bfdYgNF5Ax0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, 1, NULL, NULL, NULL, 1, 'Vietnam discus supply- Xanh Tuoi Tropical Fish Vietnam', 'https://www.youtube.com/watch?v=bfdYgNF5Ax0', 'Vietnam discus supply- Xanh Tuoi Tropical Fish Vietnam', 'Vietnam discus supply- Xanh Tuoi Tropical Fish Vietnam', NULL, '192.168.100.13', 1, '2020-02-05 23:22:50', '2020-02-05 23:22:50'),
(2, 'DISCUS BREEDER', 'DISCUS BREEDER', 'https://www.youtube.com/embed/H86ZLDZ9b-k', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/H86ZLDZ9b-k\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, 1, NULL, NULL, NULL, 2, 'DISCUS BREEDER', 'https://www.youtube.com/watch?v=H86ZLDZ9b-k', 'DISCUS BREEDER', 'DISCUS BREEDER', NULL, '192.168.100.13', 1, '2020-02-05 23:24:24', '2020-02-05 23:24:24'),
(3, 'VIETNAM DISCUS', 'VIETNAM DISCUS', 'https://www.youtube.com/embed/Qt_9sytqRT8', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Qt_9sytqRT8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, 1, NULL, NULL, NULL, 3, 'VIETNAM DISCUS', 'https://www.youtube.com/watch?v=Qt_9sytqRT8', 'VIETNAM DISCUS', 'VIETNAM DISCUS', NULL, '192.168.100.13', 1, '2020-02-05 23:25:15', '2020-02-05 23:25:15'),
(4, 'DISCUS EXPORT', 'DISCUS EXPORT', 'https://www.youtube.com/embed/McEE5pAgTT8', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/McEE5pAgTT8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, 1, NULL, NULL, NULL, 4, 'DISCUS EXPORT', 'https://www.youtube.com/watch?v=McEE5pAgTT8', 'DISCUS EXPORT', 'DISCUS EXPORT', NULL, '192.168.100.13', 1, '2020-02-05 23:26:02', '2020-02-05 23:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) NOT NULL,
  `ip_address` text COLLATE utf8mb4_unicode_ci,
  `visit` bigint(20) DEFAULT NULL,
  `visit_time` timestamp NULL DEFAULT NULL,
  `is_delete` tinyint(2) DEFAULT NULL,
  `last_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='visitor table';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
