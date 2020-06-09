-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 07:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plc`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_one` int(10) UNSIGNED NOT NULL,
  `user_two` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1:text,2:pdf,3:zip,4:image',
  `file_path` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `type`, `file_path`, `file_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 'hi', 1, NULL, NULL, '2018-06-04 17:54:37', '2018-06-04 17:54:37', 1),
(2, 1, 'kdf', 1, NULL, NULL, '2018-06-04 17:56:17', '2018-06-04 17:56:17', 1),
(3, 1, 'd', 1, NULL, NULL, '2018-06-04 17:56:54', '2018-06-04 17:56:54', 1),
(4, 1, 's', 1, NULL, NULL, '2018-06-04 17:58:04', '2018-06-04 17:58:04', 1),
(5, 1, 'hi', 1, NULL, NULL, '2018-06-04 22:37:34', '2018-06-04 22:37:34', 1),
(6, 2, 'hello from rsl', 1, NULL, NULL, '2018-06-04 22:37:42', '2018-06-04 22:37:42', 1),
(7, 1, 'hi from vocfu', 1, NULL, NULL, '2018-06-04 22:37:48', '2018-06-04 22:37:48', 1),
(8, 2, 'ho', 1, NULL, NULL, '2018-06-04 22:46:54', '2018-06-04 22:46:54', 1),
(9, 1, 's', 1, NULL, NULL, '2018-06-04 22:47:15', '2018-06-04 22:47:15', 1),
(10, 1, 'hello rdl', 1, NULL, NULL, '2018-06-05 18:27:14', '2018-06-05 18:27:14', 1),
(11, 1, 'rsl', 1, NULL, NULL, '2018-06-05 18:27:16', '2018-06-05 18:27:16', 1),
(12, 1, 'kd', 1, NULL, NULL, '2018-06-05 18:28:16', '2018-06-05 18:28:16', 1),
(13, 2, 's', 1, NULL, NULL, '2018-06-05 18:28:42', '2018-06-05 18:28:42', 1),
(14, 1, 'hi', 1, NULL, NULL, '2018-06-05 18:29:01', '2018-06-05 18:29:01', 1),
(15, 2, 'where r u?', 1, NULL, NULL, '2018-06-05 18:29:09', '2018-06-05 18:29:09', 1),
(16, 1, 'i\'m tehran', 1, NULL, NULL, '2018-06-05 18:29:14', '2018-06-05 18:29:14', 1);

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
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2017_06_13_101135_create_messages_table', 1),
(29, '2017_06_21_032341_create_receivers_table', 1),
(30, '2018_05_30_185335_create_conversation_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `user_id`, `message_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-06-04 17:54:37', '2018-06-04 17:54:37'),
(2, 2, 2, 1, '2018-06-04 17:56:18', '2018-06-04 17:56:18'),
(3, 2, 3, 1, '2018-06-04 17:56:55', '2018-06-04 17:56:55'),
(4, 2, 4, 1, '2018-06-04 17:58:04', '2018-06-04 17:58:04'),
(5, 2, 5, 1, '2018-06-04 22:37:34', '2018-06-04 22:37:34'),
(6, 1, 6, 1, '2018-06-04 22:37:42', '2018-06-04 22:37:42'),
(7, 2, 7, 1, '2018-06-04 22:37:48', '2018-06-04 22:37:48'),
(8, 1, 8, 1, '2018-06-04 22:46:54', '2018-06-04 22:46:54'),
(9, 2, 9, 1, '2018-06-04 22:47:15', '2018-06-04 22:47:15'),
(10, 2, 10, 1, '2018-06-05 18:27:14', '2018-06-05 18:27:14'),
(11, 2, 11, 1, '2018-06-05 18:27:16', '2018-06-05 18:27:16'),
(12, 2, 12, 1, '2018-06-05 18:28:16', '2018-06-05 18:28:16'),
(13, 1, 13, 1, '2018-06-05 18:28:42', '2018-06-05 18:28:42'),
(14, 2, 14, 1, '2018-06-05 18:29:01', '2018-06-05 18:29:01'),
(15, 1, 15, 1, '2018-06-05 18:29:09', '2018-06-05 18:29:09'),
(16, 2, 16, 1, '2018-06-05 18:29:14', '2018-06-05 18:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `password`, `image`, `image_path`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vocfu', 'ea_pain@yahoo.com', 'on', '$2y$10$9jvnnrdmIAgquUin/JuNFOyIQY.lzkCvMFLhElgh3OO0kiaymkSPW', 'C:\\xampp\\tmp\\phpE7C5.tmp', 'http://localhost/chat/public/uploads/user/download.jpg', NULL, '2018-06-04 17:53:05', '2018-06-04 17:53:05'),
(2, 'rsl', 'rsl@yahoo.com', 'off', '$2y$10$GrnUwMxZoRgDVvS9WlU/yujU4CeSJPXsl/AurjVar2pH4D7E5z3wm', 'C:\\xampp\\tmp\\php599B.tmp', 'http://localhost/chat/public/uploads/user/download.jpg', NULL, '2018-06-04 17:53:34', '2018-06-04 17:53:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
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
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
