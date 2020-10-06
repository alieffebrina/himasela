-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2020 at 12:18 AM
-- Server version: 10.3.24-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himasela_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_donasi`
--

CREATE TABLE `tb_donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_upline` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `levelupgrade` int(11) NOT NULL,
  `buktibayar` varchar(200) NOT NULL,
  `status` enum('belum bayar','menunggu aprove','aproval','cancel') NOT NULL DEFAULT 'belum bayar',
  `tglbayar` date DEFAULT NULL,
  `tglaprove` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_donasi`
--

INSERT INTO `tb_donasi` (`id_donasi`, `id_upline`, `id_anggota`, `levelupgrade`, `buktibayar`, `status`, `tglbayar`, `tglaprove`) VALUES
(1, 2, 5, 1, '20191026-142912_p011.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(2, 2, 6, 1, '20191026-142912_p012.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(3, 2, 7, 1, '20191026-142912_p013.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(4, 2, 8, 1, '20191026-142912_p014.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(5, 2, 8, 1, '20191026-142912_p015.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(6, 2, 9, 1, '20191026-142912_p016.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(7, 5, 10, 1, '20191026-142912_p022.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(8, 5, 11, 1, '20191026-142912_p023.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(9, 5, 12, 1, '20191026-142912_p024.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(10, 5, 13, 1, '20191026-142912_p025.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(11, 5, 14, 1, '20191026-142912_p026.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(12, 2, 5, 2, '20191026-142912_p027.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(13, 13, 15, 1, '20191026-142912_p033.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(14, 13, 16, 1, '20191026-142912_p034.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(15, 13, 17, 1, '20191026-142912_p035.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(16, 13, 18, 1, '20191026-142912_p036.jpg', 'aproval', '2020-10-05', '2020-10-05'),
(17, 13, 19, 1, '20191026-142912_p037.jpg', 'aproval', '2020-10-05', '2020-10-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_donasi`
--
ALTER TABLE `tb_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
