-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2022 at 03:38 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Site Customer');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'admin', 1, '2022-08-31 16:39:53', 0),
(2, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 16:41:13', 1),
(3, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 16:48:36', 1),
(4, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 16:55:03', 1),
(5, '127.0.0.1', 'customer', 2, '2022-08-31 16:57:05', 0),
(6, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 16:57:39', 1),
(7, '127.0.0.1', 'customer', 2, '2022-08-31 17:40:21', 0),
(8, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 17:44:33', 1),
(9, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 17:55:04', 1),
(10, '127.0.0.1', 'customer', 2, '2022-08-31 17:55:22', 0),
(11, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 17:55:57', 1),
(12, '127.0.0.1', 'customer', 2, '2022-08-31 17:56:51', 0),
(13, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 17:57:08', 1),
(14, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 18:01:23', 1),
(15, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 18:01:29', 1),
(16, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 18:05:12', 1),
(17, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 18:05:17', 1),
(18, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 18:05:50', 1),
(19, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 18:10:18', 1),
(20, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 18:10:23', 1),
(21, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 18:14:54', 1),
(22, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 18:15:22', 1),
(23, '127.0.0.1', 'customer@gmail.com', 2, '2022-08-31 18:19:56', 1),
(24, '127.0.0.1', 'admin@gmail.com', 1, '2022-08-31 18:20:47', 1),
(25, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:08:56', 1),
(26, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:09:11', 1),
(27, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:12:00', 1),
(28, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:13:46', 1),
(29, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:15:13', 1),
(30, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:16:16', 1),
(31, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:18:32', 1),
(32, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:20:59', 1),
(33, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:21:32', 1),
(34, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:21:36', 1),
(35, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:22:10', 1),
(36, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:24:39', 1),
(37, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:24:50', 1),
(38, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 00:35:05', 1),
(39, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 00:35:14', 1),
(40, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 02:45:12', 1),
(41, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 02:45:52', 1),
(42, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 02:49:41', 1),
(43, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 02:50:03', 1),
(44, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 03:00:49', 1),
(45, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 03:06:49', 1),
(46, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 03:12:03', 1),
(47, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 03:15:52', 1),
(48, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 09:26:19', 1),
(49, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-01 09:26:54', 1),
(50, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-01 09:28:41', 1),
(51, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-03 22:21:55', 1),
(52, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-03 22:24:16', 1),
(53, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-04 11:02:10', 1),
(54, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-06 06:39:04', 1),
(55, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-06 07:02:29', 1),
(56, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-06 07:03:13', 1),
(57, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-06 07:15:23', 1),
(58, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-06 07:15:39', 1),
(59, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-06 07:26:52', 1),
(60, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-06 07:27:00', 1),
(61, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-07 21:30:15', 1),
(62, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-07 21:32:55', 1),
(63, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-07 21:33:21', 1),
(64, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-08 00:27:55', 1),
(65, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-08 00:32:23', 1),
(66, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-08 06:56:45', 1),
(67, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-08 10:47:27', 1),
(68, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-08 14:16:03', 1),
(69, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-09 19:24:11', 1),
(70, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-09 19:31:39', 1),
(71, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-09 23:46:10', 1),
(72, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-10 00:25:04', 1),
(73, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 00:26:11', 1),
(74, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-10 00:42:00', 1),
(75, '127.0.0.1', 'customer', NULL, '2022-09-10 01:21:08', 0),
(76, '127.0.0.1', 'admin', NULL, '2022-09-10 01:21:16', 0),
(77, '127.0.0.1', 'admin', NULL, '2022-09-10 01:21:47', 0),
(78, '127.0.0.1', 'customer', NULL, '2022-09-10 01:22:36', 0),
(79, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 01:44:15', 1),
(80, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 10:08:04', 1),
(81, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-10 10:08:21', 1),
(82, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 10:08:28', 1),
(83, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-10 10:08:57', 1),
(84, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 10:09:11', 1),
(85, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 10:20:35', 1),
(86, '127.0.0.1', 'customer@gmail.com', 2, '2022-09-10 10:23:30', 1),
(87, '127.0.0.1', 'admin@gmail.com', 1, '2022-09-10 10:32:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage users profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nm_cat` varchar(255) NOT NULL,
  `pic_cat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nm_cat`, `pic_cat`, `created_at`, `updated_at`) VALUES
(1, 'Zoya', 'zoya.png', NULL, NULL),
(2, 'Umama Scarf', 'umama-scarf.png', NULL, NULL),
(3, 'Paris Premium', 'paris-premium.jpeg', '2022-09-08 14:18:46', '2022-09-08 14:18:46'),
(4, 'Bela Square', 'bella-square.jpg', '2022-09-08 14:19:39', '2022-09-08 14:19:39'),
(5, 'Pashmina Cyra', 'pashmina-cyra.png', '2022-09-09 20:02:41', '2022-09-09 21:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1661977385, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_img`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', 'Admin', 'admin.png', '$2y$10$hG1uNJW8AVWQP6CBA8QZd.w85gXWNb4AQDwUgc.xoWjjIcJ/YcnA2', NULL, NULL, NULL, '5792b3d80050ff94d9dd2eec88ba7330', NULL, NULL, 1, 0, '2022-08-31 16:37:09', '2022-09-10 01:46:34', NULL),
(2, 'customer@gmail.com', 'customer', 'Hilman', 'customer.png', '$2y$10$bsxSNI2e8G5lma2erLo3uudFZ7tPWJjhOUzpY8yoziqMExtsUaZ9a', NULL, NULL, NULL, '1e33ee7ee8c4440bc1b28188e6ade24c', NULL, NULL, 0, 0, '2022-08-31 16:55:56', '2022-09-10 01:43:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
