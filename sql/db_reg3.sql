-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 05:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reg3`
--

-- --------------------------------------------------------

--
-- Table structure for table `t00_sekolah`
--

CREATE TABLE `t00_sekolah` (
  `idsekolah` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t00_sekolah`
--

INSERT INTO `t00_sekolah` (`idsekolah`, `Nama`, `Alamat`) VALUES
(1, 'MINU KARAKTER', 'Jl. Gajah Mada, Bojonegoro'),
(2, 'MINU UNGGULAN', 'Jl. Gajah Mada, Bojonegoro');

-- --------------------------------------------------------

--
-- Table structure for table `t01_csiswa`
--

CREATE TABLE `t01_csiswa` (
  `idcsiswa` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t01_csiswa`
--

INSERT INTO `t01_csiswa` (`idcsiswa`, `Nama`, `Alamat`) VALUES
(1, 'Abdullah', 'Ledok Wetan'),
(2, 'Abdullah', 'Jambean'),
(3, 'Abdullah', 'Ledok Kulon');

-- --------------------------------------------------------

--
-- Table structure for table `t30_csiswa_sekolah`
--

CREATE TABLE `t30_csiswa_sekolah` (
  `idcsiswasekolah` int(11) NOT NULL,
  `idcsiswa` int(11) NOT NULL,
  `idsekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t30_csiswa_sekolah`
--

INSERT INTO `t30_csiswa_sekolah` (`idcsiswasekolah`, `idcsiswa`, `idsekolah`) VALUES
(1, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t90_users`
--

CREATE TABLE `t90_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t90_users`
--

INSERT INTO `t90_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$3ZVLZq3/oiedrGwi/1S9X.ViCmPo4X9dQPfsH2i8Zto5FFCdiU.rG', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1621110088, 1, 'Admin', NULL, NULL, NULL),
(2, '::1', NULL, '$2y$10$L7IcqDV52AUipywPcc1YJetQLUkaK3L9Ql8ad.Wqh3yjCGgZ1BdRm', 'adi@adi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1621106195, 1621107445, 1, 'Adi', NULL, NULL, NULL),
(3, '::1', NULL, '$2y$10$FqgcRTGS2sSX4TiT7xSn6ub2XIMXw4Z/3yVBV9LHTdgoYLEGVRhda', 'ida@ida.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1621110117, 1621177786, 1, 'Ida', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t91_groups`
--

CREATE TABLE `t91_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t91_groups`
--

INSERT INTO `t91_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `t92_users_groups`
--

CREATE TABLE `t92_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t92_users_groups`
--

INSERT INTO `t92_users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 1, 1),
(6, 1, 2),
(10, 2, 2),
(11, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t93_login_attempts`
--

CREATE TABLE `t93_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t00_sekolah`
--
ALTER TABLE `t00_sekolah`
  ADD PRIMARY KEY (`idsekolah`),
  ADD UNIQUE KEY `nama_alamat` (`Nama`,`Alamat`) USING HASH;

--
-- Indexes for table `t01_csiswa`
--
ALTER TABLE `t01_csiswa`
  ADD PRIMARY KEY (`idcsiswa`),
  ADD UNIQUE KEY `nama_alamat` (`Nama`,`Alamat`) USING HASH;

--
-- Indexes for table `t30_csiswa_sekolah`
--
ALTER TABLE `t30_csiswa_sekolah`
  ADD PRIMARY KEY (`idcsiswasekolah`),
  ADD UNIQUE KEY `idcsiswa` (`idcsiswa`);

--
-- Indexes for table `t90_users`
--
ALTER TABLE `t90_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `t91_groups`
--
ALTER TABLE `t91_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t92_users_groups`
--
ALTER TABLE `t92_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `t93_login_attempts`
--
ALTER TABLE `t93_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t00_sekolah`
--
ALTER TABLE `t00_sekolah`
  MODIFY `idsekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t01_csiswa`
--
ALTER TABLE `t01_csiswa`
  MODIFY `idcsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t30_csiswa_sekolah`
--
ALTER TABLE `t30_csiswa_sekolah`
  MODIFY `idcsiswasekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t90_users`
--
ALTER TABLE `t90_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t91_groups`
--
ALTER TABLE `t91_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t92_users_groups`
--
ALTER TABLE `t92_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t93_login_attempts`
--
ALTER TABLE `t93_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t92_users_groups`
--
ALTER TABLE `t92_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `t91_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `t90_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
