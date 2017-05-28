-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 10:10 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keykost`
--

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id` int(11) NOT NULL,
  `pemilik_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(254) NOT NULL,
  `alamat` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id`, `pemilik_id`, `nama`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Kost 1', 'Jalan 1', '2017-05-28 06:35:22', '2017-05-28 06:35:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `rfid_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(254) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2017-05-28 04:00:07', '2017-05-28 04:00:07', NULL),
(2, 'Pemilik Kost', '2017-05-28 04:00:25', '2017-05-28 05:52:52', NULL),
(3, 'Penyewa Kost', '2017-05-28 04:00:40', '2017-05-28 05:52:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `penyewa_id` int(11) DEFAULT NULL,
  `rfid_id` varchar(200) DEFAULT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_kamar` varchar(200) DEFAULT NULL,
  `jenis_kelamin` varchar(200) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text,
  `image` varchar(250) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `lupa_pass` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `remember_token` text,
  `register_date` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `penyewa_id`, `rfid_id`, `fullname`, `email`, `no_kamar`, `jenis_kelamin`, `telp`, `alamat`, `image`, `password`, `lupa_pass`, `status`, `remember_token`, `register_date`, `exp_date`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, NULL, NULL, 'Dito Raharjo', 'ditoparker@gmail.com', NULL, '', NULL, NULL, NULL, '$2y$10$D6F9BYygxov8KWhTJKyzwOU3LyWoQzWcyB1XTrNyx/Xz8NDndmCbO', NULL, '1', NULL, NULL, NULL, '2017-05-28 06:33:56', '2017-05-28 06:34:13', NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, 'Pemilik 1', 'pemilik1@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$D6F9BYygxov8KWhTJKyzwOU3LyWoQzWcyB1XTrNyx/Xz8NDndmCbO', NULL, '1', NULL, NULL, NULL, '2017-05-28 06:34:46', '2017-05-28 06:35:03', NULL, NULL, NULL, NULL),
(3, 3, 1, 'PENYEWA_1', 'Penyewa 1', 'penyewa1@gmail.com', '001', NULL, '1111', 'Jalan Penyewa 1', NULL, '$2y$10$D6F9BYygxov8KWhTJKyzwOU3LyWoQzWcyB1XTrNyx/Xz8NDndmCbO', NULL, '1', NULL, NULL, NULL, '2017-05-28 06:35:41', '2017-05-28 06:37:10', NULL, NULL, NULL, NULL),
(4, 3, 1, 'PENYEWA_2', 'Penyewa 2', 'penyewa2@gmail.com', '002', NULL, '2222', 'Jalan Penyewa 2', NULL, '$2y$10$D6F9BYygxov8KWhTJKyzwOU3LyWoQzWcyB1XTrNyx/Xz8NDndmCbO', NULL, '1', NULL, NULL, NULL, '2017-05-28 06:37:05', '2017-05-28 06:37:19', NULL, NULL, NULL, NULL),
(5, 3, 1, 'PENYEWA_3', 'Penyewa 3 update', 'penyewa3@gmail.com', '003', NULL, '3333', 'Jalan Penyewa 3', NULL, '$2y$10$KBIWX1ioRsRNnALo3/be/OkROVvQ5RJMqlfaVHdhGM/RPL4zfIuLW', NULL, '1', NULL, NULL, NULL, '2017-05-28 07:17:32', '2017-05-28 07:26:49', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kost_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `kost_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '2017-05-28 07:32:04', '2017-05-28 07:32:04', NULL),
(2, 3, 1, '2017-05-28 07:32:08', '2017-05-28 07:32:08', NULL),
(3, 4, 1, '2017-05-28 07:32:14', '2017-05-28 07:32:14', NULL),
(4, 5, 1, '2017-05-28 07:32:17', '2017-05-28 07:32:17', NULL),
(5, 4, 1, '2017-05-28 07:32:23', '2017-05-28 07:32:23', NULL),
(6, 5, 1, '2017-05-28 07:32:26', '2017-05-28 07:32:26', NULL),
(7, 3, 1, '2017-05-28 07:32:30', '2017-05-28 07:32:30', NULL),
(8, 3, 1, '2017-05-28 07:46:42', '2017-05-28 07:46:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `barcode` (`rfid_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
