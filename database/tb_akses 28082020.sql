-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 09:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_himasela`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tipeuser` varchar(30) NOT NULL,
  `view` enum('1','0') NOT NULL DEFAULT '1',
  `add` enum('1','0') NOT NULL DEFAULT '1',
  `edit` enum('1','0') NOT NULL DEFAULT '1',
  `delete` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `id_menu`, `tipeuser`, `view`, `add`, `edit`, `delete`) VALUES
(1, 1, 'administrator', '1', '1', '1', '1'),
(2, 2, 'administrator', '1', '1', '1', '1'),
(3, 3, 'administrator', '1', '1', '1', '1'),
(4, 4, 'administrator', '1', '1', '1', '1'),
(5, 5, 'administrator', '1', '1', '1', '1'),
(6, 6, 'administrator', '1', '1', '1', '1'),
(7, 3, 'anggota', '1', '1', '1', '1'),
(8, 2, 'anggota', '1', '1', '0', '0'),
(19, 1, 'anggota', '1', '1', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
