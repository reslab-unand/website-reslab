-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 01:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten_reslab`
--

CREATE TABLE `asisten_reslab` (
  `id_asisten` int(11) NOT NULL,
  `reg_asisten` varchar(255) NOT NULL,
  `nama_asisten` varchar(255) NOT NULL,
  `ttl_asisten` varchar(255) NOT NULL,
  `jabatan_asisten` varchar(255) NOT NULL,
  `status_asisten` varchar(255) NOT NULL,
  `slug_asisten` varchar(255) NOT NULL,
  `card_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asisten_reslab`
--

INSERT INTO `asisten_reslab` (`id_asisten`, `reg_asisten`, `nama_asisten`, `ttl_asisten`, `jabatan_asisten`, `status_asisten`, `slug_asisten`, `card_id`) VALUES
(1, 'RES.XI.22.2019', 'Rizem Mahendra', 'Kajai, 12 Mei 2000', 'Staff RnD', 'Aktif', 'rizem-mahendra', '00-00-00-00-00'),
(2, 'RES.XI.22.2019', 'M. Syafiq Asyraf', 'Jambi, 1 Januari 2000', 'Koordinator Asisten', 'Aktif', 'syafiq', '11-11-11-11-11'),
(3, 'RES.XI.22.2015', 'Abdul Halim', 'Bukittingi, 1 Januari 2000', 'Koordinator RnD', 'Njsdk ', 'abdul-halim', '22-22-22-22');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `card_mode` varchar(255) NOT NULL,
  `card_recent` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `card_mode`, `card_recent`, `ket`) VALUES
(1, 'read_card', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_asisten`
--

CREATE TABLE `presensi_asisten` (
  `id_presensi` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL,
  `nama_asisten` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi_asisten`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asisten_reslab`
--
ALTER TABLE `asisten_reslab`
  ADD PRIMARY KEY (`id_asisten`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `presensi_asisten`
--
ALTER TABLE `presensi_asisten`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_asisten` (`id_asisten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asisten_reslab`
--
ALTER TABLE `asisten_reslab`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi_asisten`
--
ALTER TABLE `presensi_asisten`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presensi_asisten`
--
ALTER TABLE `presensi_asisten`
  ADD CONSTRAINT `id_asisten` FOREIGN KEY (`id_asisten`) REFERENCES `asisten_reslab` (`id_asisten`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
