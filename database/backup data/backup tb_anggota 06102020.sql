-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2020 at 12:17 AM
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
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `username` char(16) NOT NULL,
  `password` char(10) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_provinsi` char(2) NOT NULL,
  `id_kota` char(4) NOT NULL,
  `id_kecamatan` char(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlp` char(12) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `jumlahhu` varchar(10) NOT NULL,
  `namasponsor` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tglupdate` datetime NOT NULL,
  `id_upline` int(11) DEFAULT NULL,
  `buktitransfer` varchar(250) DEFAULT NULL,
  `statusanggota` enum('administrator','admin','anggota','menunggu konfirmasi upline','menunggu konfirmasi admin','tidak aktif') NOT NULL DEFAULT 'menunggu konfirmasi upline',
  `statusbayar` enum('belum bayar','menunggu konfirmasi','sudah bayar') NOT NULL,
  `nourut` varchar(250) NOT NULL,
  `level` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `username`, `password`, `nik`, `nama`, `alamat`, `id_provinsi`, `id_kota`, `id_kecamatan`, `email`, `tlp`, `bank`, `norek`, `pemilik`, `jumlahhu`, `namasponsor`, `id_user`, `tglupdate`, `id_upline`, `buktitransfer`, `statusanggota`, `statusbayar`, `nourut`, `level`) VALUES
(1, 'admin', 'admin', '', 'administrator', '', '', '', '', '', '', '', '', '', '', '', 1, '2020-08-23 10:54:13', 0, '', 'administrator', 'sudah bayar', '1', 0),
(2, 'arif', 'arif123', '3524072405740002', 'Arif Rohman Hakim', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Arif Rohman Hakim', '1', 'Administrator', 2, '2020-10-05 04:16:02', 1, '20191026-142912_p06.jpg', 'anggota', 'sudah bayar', '11', 0),
(3, '3524072405740001', '123456', '3524072405740001', 'Titimmatul Himmah', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '+62 852 0320', 'BNI', '8560660889', 'Titimmatul Himmah', '1', 'Arif Rohman Hakimo', 1, '2020-10-05 11:45:17', 2, NULL, 'tidak aktif', 'belum bayar', '111', 0),
(4, '3524072405740003', '123456', '3524072405740003', 'Titimmatul Himmah', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '08523202300', 'BNI', '8560660889', 'Titimmatul Himmah', '1', 'Arif Rohman Hakim', 1, '2020-10-05 11:45:05', 2, NULL, 'anggota', 'belum bayar', '112', 0),
(5, 'Titim', '123456', '3524102607260002', 'Titimmatul Himmah', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '085232032300', 'BNI', '8560660889', 'Titim', '1', 'Arif Rohman Hakim', 1, '2020-10-06 12:13:54', 2, 'Screenshot_20200727_192020.jpg', 'anggota', 'sudah bayar', '113', 2),
(6, '3524072405740005', '123456', '3524072405740005', 'Mayang Ahda fitriana', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '081332988567', 'BRI', '081332988746', 'Mayang ', '1', 'Arif Rohman Hakim', 1, '2020-10-05 05:13:28', 2, '20191026-142912_p07.jpg', 'anggota', 'sudah bayar', '114', 1),
(7, '3524072405740006', '123456', '3524072405740006', 'Tsania Zahrotus Syakira', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '081332988875', 'BNI', '3524072405740002', 'Tsania', '1', 'Arif Rohman Hakim', 1, '2020-10-05 05:17:31', 2, '20191026-142912_p08.jpg', 'anggota', 'sudah bayar', '115', 1),
(8, '3524072405740006', '123456', '3524072405740006', 'Dimas Rangga Yudistira', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '0852352000', 'Dimas Rangga Yudistira', '1', 'ARIF ROHMAN HAKIM', 1, '2020-10-05 05:24:31', 2, '20191026-142912_p09.jpg', 'anggota', 'sudah bayar', '116', 1),
(9, '3524072405740009', '123456', '3524072405740009', 'Mukatam', 'Beondong7', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Mukatam', '1', 'Arif Rohman Hakim', 1, '2020-10-05 05:28:15', 2, '20191026-142912_p010.jpg', 'anggota', 'sudah bayar', '117', 1),
(10, '3524102607260012', '123456', '3524102607260012', 'Nurilla Maslahah', 'Bakung', '35', '3505', '3505010', 'arif.hakim2405@gmail.com', '081332958745', 'BNI', '081332988746', 'Nurilla maslahah', '1', 'Titim', 1, '2020-10-05 11:08:00', 5, '20191026-142912_p017.jpg', 'tidak aktif', 'sudah bayar', '1131', 1),
(11, '3524102607260012', '123456', '3524102607260012', 'Qurrotulaini', 'Bannyakkan', '35', '3506', '3506210', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Qurrotulaini', '1', 'Titim', 1, '2020-10-05 11:08:10', 5, '20191026-142912_p018.jpg', 'tidak aktif', 'sudah bayar', '1132', 1),
(12, '3524102607260013', '123456', '3524102607260013', 'Rohmani', 'Gurah', '35', '3506', '3506100', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Rohmani', '1', 'Titim', 1, '2020-10-05 06:07:46', 5, '20191026-142912_p019.jpg', 'anggota', 'sudah bayar', '1133', 1),
(13, 'sofi', '123456', '3524102607260002', 'Sofiyatul Lailiyah', 'Badaa', '35', '3506', '3506141', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Sofiyatul Lailiyah', '1', 'Tititm', 1, '2020-10-05 11:08:25', 5, '20191026-142912_p020.jpg', 'tidak aktif', 'sudah bayar', '1134', 1),
(14, '3524102607260014', '123456', '3524102607260014', 'Santoso', 'Bantur', '35', '3507', '3507040', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Santoso', '1', 'Titim', 1, '2020-10-05 11:08:34', 5, '20191026-142912_p021.jpg', 'tidak aktif', 'sudah bayar', '1135', 1),
(15, '3524102607260015', '123456', '3524102607260015', 'Bahrul ulum', 'Kebayoran', '31', '3171', '3171060', 'arif.hakim2405@gmail.com', '081332988746', 'BRI', '081332988746', 'Sofiyatul Lailiyah', '1', 'Sofi', 1, '2020-10-05 11:08:42', 13, '20191026-142912_p028.jpg', 'tidak aktif', 'sudah bayar', '11341', 1),
(16, '3524102607260016', '123456', '3524102607260016', 'Taufiq', 'Salang', '11', '1101', '1101040', 'arif.hakim2405@gmail.com', '352410260726', 'BRI', '081332988746', 'Taufiq', '1', 'sofi', 1, '2020-10-05 11:08:50', 13, '20191026-142912_p029.jpg', 'tidak aktif', 'sudah bayar', '11342', 1),
(17, '3524102607260016', '123456', '3524102607260016', 'Muntawi', 'Bangunrejo', '18', '1805', '1805030', 'arif.hakim2405@gmail.com', '081333524102', 'BRI', '081332988746', 'Muntawi', '1', 'Sofi', 1, '2020-10-05 11:09:00', 13, '20191026-142912_p030.jpg', 'tidak aktif', 'sudah bayar', '11343', 1),
(18, '3524102607260017', '123456', '3524102607260017', 'Agung Prasetyo', 'Gunung Talang', '13', '1303', '1303080', 'arif.hakim2405@gmail.com', '352410260726', 'BRI', '081332988746', 'Agung Prasetyo', '1', 'sofi', 1, '2020-10-05 11:09:08', 13, '20191026-142912_p031.jpg', 'tidak aktif', 'sudah bayar', '11344', 1),
(19, '3524102607260018', '123456', '3524102607260018', 'Jokowi', 'Kumpeh ulu', '15', '1505', '1505020', 'arif.hakim2405@gmail.com', '081333524102', 'BRI', '081332988746', 'Jokowi', '1', 'Sofi', 1, '2020-10-05 11:09:15', 13, '20191026-142912_p032.jpg', 'tidak aktif', 'sudah bayar', '11345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
