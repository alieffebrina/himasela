-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2020 at 04:02 AM
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
(48, 'arif', 'arif123', '3524072405720002', 'ARIF ROHMAN HAKIM', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '085203202300', 'BNI', '8560660889', 'Titimmatul Himmah', '1', 'Admin', 48, '2020-08-27 11:14:47', 1, 'Screenshot_20200827_204701.jpg', 'anggota', 'sudah bayar', '11', 7),
(49, 'Titim', 'Titim123', '3524072405720001', 'Titimmatul Himmah', 'Brondong', '35', '3524', '3524260', 'arif.hakim2405@gmail.com', '081333988746', 'BNI', '8560660709', 'Titimmatul Himmah', '1', 'Arif Rohman Hakim', 49, '2020-08-27 11:18:57', 48, NULL, 'anggota', 'sudah bayar', '111', 3),
(50, 'moh ikhwan', '123456', '3525021804660002', 'Moh Ikhwan', 'Dsn Gondekan Rt002/Rw001 Ds Jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'JATIM', '1743003353', 'Moh Ikhwan', '1', 'Titimmatul Himmah', 50, '2020-08-28 12:01:52', 49, 'Screenshot_20200827_2047011.jpg', 'anggota', 'sudah bayar', '1111', 3),
(51, 'berkahjaya01', '123456a', '3517032102710002', 'berkahjaya01', 'dsn grenggeng rt 006 rw 004 desa rejoagung', '35', '3517', '3517050', 'panjizeni01@gmail.com', '081333297971', 'Jatim', '0116372584', 'Mohammad zeni', '1', 'Moh Ikhwan', 51, '2020-08-27 11:32:40', 50, 'Screenshot_20200827_2047012.jpg', 'anggota', 'sudah bayar', '11111', 2),
(52, 'berkahjaya02', '123456b', '3517032102710002', 'berkahjaya02', 'dsn grenggeng rt 006 rw 004 desa rejoagung', '35', '3517', '3517130', 'panjizeni01@gmail.com', '081333297971', 'Jatim', '0116372584', 'Mohammad zeni', '1', 'Moh Ikhwan', 52, '2020-08-27 11:42:43', 50, 'Screenshot_20200827_2047013.jpg', 'anggota', 'sudah bayar', '11112', 0),
(53, 'berkahjaya03', '123456c', '3517032102710002', 'berkahjaya03', 'dsn grenggeng rt 006 rw 004 desa rejoagung', '35', '3517', '3517050', 'panjizeni01@gmail.com', '081333297971', 'Jatim', '0116372584', 'Mohammad zeni', '1', 'Moh Ikhwan', 53, '2020-08-27 11:51:38', 50, 'Screenshot_20200827_2047014.jpg', 'anggota', 'sudah bayar', '11113', 0),
(54, 'ikhwan01', '123456a', '3525021804660002', 'ikhwan01', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya01', 54, '2020-08-28 12:04:03', 51, 'Screenshot_20200827_2047015.jpg', 'anggota', 'sudah bayar', '111111', 0),
(55, 'ikhwan02', '123456b', '3525021804660002', 'ikhwan02', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya01', 55, '2020-08-28 12:04:51', 51, 'Screenshot_20200827_2047016.jpg', 'anggota', 'sudah bayar', '111112', 0),
(56, 'ikhwan03', '123456c', '3525021804660002', 'ikhwan03', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya01', 56, '2020-08-28 12:05:48', 51, 'Screenshot_20200827_2047017.jpg', 'anggota', 'sudah bayar', '111113', 0),
(57, 'ikhwan04', '123456d', '3525021804660002', 'ikhwan04', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya02', 57, '2020-08-28 12:07:21', 52, 'Screenshot_20200827_2047018.jpg', 'anggota', 'sudah bayar', '111121', 0),
(58, 'ikhwan05', '123456e', '3525021804660002', 'ikhwan05', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya02', 58, '2020-08-28 12:08:03', 52, 'Screenshot_20200827_2047019.jpg', 'anggota', 'sudah bayar', '111122', 0),
(59, 'ikhwan06', '123456f', '3525021804660002', 'ikhwan06', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya02', 59, '2020-08-28 12:08:54', 52, 'Screenshot_20200827_20470110.jpg', 'anggota', 'sudah bayar', '111123', 0),
(60, 'ikhwan07', '123456g', '3525021804660002', 'ikhwan07', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya03', 60, '2020-08-28 12:09:48', 53, 'Screenshot_20200827_20470111.jpg', 'anggota', 'sudah bayar', '111131', 0),
(61, 'ikhwan08', '123456h', '3525021804660002', 'ikhwan08', 'dsn gondekan rt 002 rt 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya03', 61, '2020-08-28 12:10:45', 53, 'Screenshot_20200827_20470112.jpg', 'anggota', 'sudah bayar', '111132', 0),
(62, 'ikhwan09', '123456i', '3525021804660002', 'ikhwan09', 'dsn gondekan rt 002 rw 001 desa jabon', '35', '3517', '3517130', 'ikhwanmoh139@gmail.com', '081331165164', 'bca', '7901051694', 'Moh Ikhwan', '1', 'berkahjaya03', 62, '2020-08-28 12:14:29', 56, 'Screenshot_20200827_20470113.jpg', 'anggota', 'sudah bayar', '1111131', 0),
(63, '1111111111111111', '123456', '1111111111111111', 'BAKHTIYAR', 'TUBAN', '35', '3523', '3523130', 'bakhtiyarsierad@gmail.com', '081336445429', 'MANDIRI', '141141141141', 'BAJHKTIYAR', '1', '', 1, '2020-08-28 09:04:29', 1, NULL, 'tidak aktif', 'sudah bayar', '12', 0),
(64, 'mayang', 'mayang', '3520724057400003', 'Mayang Ahda Fitriana', 'Brondong', '35', '3524', '3524260', 'mayangahda3@gmail.com', '082335794687', 'BNI', '081332988746', 'Mayang Ahda Fitriana', '1', 'ARIF ROHMAN HAKIM', 64, '2020-08-28 09:29:12', 48, 'Screenshot_20200828_085002.jpg', 'anggota', 'sudah bayar', '112', 0),
(65, '3503032008790004', '123456', '3503032008790004', 'Dasar Rian efendi', 'Ds karanagan kec, karangan rt 32 rw 08 ', '35', '3503', '3503070', 'godhox2015@gmail.com', '082138441679', 'Bca', '1380410181', 'Dasar Rian efendi', '1', 'Ikhwan02', 1, '2020-08-28 04:25:42', 55, 'IMG-20200828-WA0024.jpg', 'anggota', 'sudah bayar', '1111121', 0),
(66, 'milliarder', '123456', '3518091406740002', 'muhammad hamim nabhan', 'dsn termas rt 001 rw 001 desa ngepung', '35', '3518', '3518100', 'ainunajayagroup@gmail.com', '085233959779', 'bca', '8935108728', 'Muhammad Hamim Nabhan', '1', 'ikhwan01', 66, '2020-08-28 04:31:33', 54, 'IMG-20200828-WA00241.jpg', 'anggota', 'sudah bayar', '1111111', 0),
(67, '3518071708760012', '123456', '3518071708760012', 'Agus Sujaki', 'Sekaran Kelutan RT 01/03', '35', '3518', '3518080', 'soegarmr@gmail.com', '085325645158', 'BCA', '8935052676', 'Agus Sujaki', '1', 'Dasar Rian Efendi', 1, '2020-08-28 04:35:47', 65, 'IMG-20200828-WA00242.jpg', 'anggota', 'sudah bayar', '11111211', 0),
(68, '3518062304830002', '123456', '3518062304830002', 'M samsul azhar', 'Ds sugih waras prambon', '35', '3518', '3518070', 'azharsukses1@gmail.com', '085730503939', 'BCA', '0331339562', 'M samsuk azhar', '1', 'Dasar Rian Efendi', 1, '2020-08-28 04:44:30', 65, 'IMG-20200828-WA00244.jpg', 'anggota', 'sudah bayar', '11111212', 0),
(69, 'milliarder01', '123456', '3518091406740002', 'Muhammad Hamim nabhan', 'Termas 001/001 ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainunajayagroup@gmail.com', '085233959779', 'BCA', '8935108728', 'Muhammad Hamim nabhan', '1', 'milliarder', 69, '2020-08-28 04:45:18', 66, 'IMG-20200828-WA00243.jpg', 'anggota', 'sudah bayar', '11111111', 0),
(70, '3518062304830002', '123456', '3518062304830002', 'M samsul azhar', 'Ds sugihwaras prambon', '35', '3518', '3518070', 'azharsukses1@gmail.com', '085730503939', 'BCA', '0331339562', 'M samsul azhar', '1', 'Dasar Rian Efendi', 1, '2020-08-28 04:44:51', 65, 'IMG-20200828-WA00245.jpg', 'anggota', 'sudah bayar', '11111213', 0),
(71, 'Bushido74', '219500Ba', '3517032501740002', 'Ismail wahyuono', 'Jl.jambu 3 002/002 Ngoro Ngoro Jombang', '35', '3517', '3517050', 'wahyuono.pastibisa@gmail.com', '081388146789', 'BRI', '002301096664507', 'Ismail wahyuono', '1', 'milliarder01', 71, '2020-08-28 05:00:56', 69, 'IMG-20200828-WA00246.jpg', 'anggota', 'sudah bayar', '111111111', 0),
(72, '3518061102680001', '123456', '3518061102680001', 'Slamet Suroyo', 'Tanjungtani RT 14/04', '35', '3518', '3518070', 'slametsuroyo369@gmail.com', '081332199499', 'BRI', '375501020666533', 'Ahmad Burhan Muzaqi', '1', 'Agus Sujaki', 1, '2020-08-28 04:56:22', 67, 'IMG-20200828-WA00247.jpg', 'anggota', 'sudah bayar', '111112111', 0),
(73, 'milliarder02', '123456', '3518091406740002', 'Muhammad Hamim nabhan02', 'Termas 001/001 ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainunajayagroup@gmail.com', '085233959779', 'Bca', '8935108728', 'Muhammad Hamim nabhan', '1', 'miliarder', 73, '2020-08-28 05:05:51', 66, 'IMG-20200828-WA00248.jpg', 'anggota', 'sudah bayar', '11111112', 0),
(74, 'REBORN', '123456', '3517082807730901', 'Heriyanto', 'Dsn. Randulawang RT: 02, RW: 06 desa Bandung ', '35', '3517', '3517040', 'heriyanto0431@gmail.com', '085204911165', 'Bri', '364801006595531', 'Heriyanto', '1', 'Ismail Wahyuono', 74, '2020-08-28 05:38:56', 71, 'IMG-20200828-WA002411.jpg', 'anggota', 'sudah bayar', '1111111111', 0),
(75, '3512074309730002', '123456', '3512074309730002', 'Ni Nyoman Gede Surasmini', 'Tengah RT 02/03, Desa tokelan', '35', '3512', '3512120', 'komangsaja2@gmail.com', '085336566579', 'Mandiri', '1430016388546', 'Ni Nyoman Gede Surasmini', '1', 'Slamet Suroyo', 1, '2020-08-28 05:11:42', 72, 'IMG-20200828-WA002412.jpg', 'anggota', 'sudah bayar', '1111121111', 0),
(76, 'Shohan', '123456', '3517081303730005', 'SOHAN YUSANI', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'shohan13neomaster@gmail.com', '082140865586', 'BCA', '1130565499', 'SOHAN YUSANI', '1', 'milliarder02', 76, '2020-08-28 05:14:16', 73, 'IMG-20200828-WA002413.jpg', 'anggota', 'sudah bayar', '111111121', 0),
(77, '3517091007000005', '123456', '3517091007000005', 'Muhammad Syamsudin Al Ghifari', 'Dsn Gondekan RT 02 RW 01 Ds Jabon Kec Jombang', '35', '3517', '3517130', 'syamsudinalghifari07@gmail.com', '085806847354', 'BNI', '0783669173', 'Muhammad Syamsudin Al Ghifari', '1', 'Ikhwan04', 1, '2020-08-28 05:17:45', 57, 'IMG-20200828-WA002414.jpg', 'anggota', 'sudah bayar', '1111211', 0),
(78, 'milliarder03', '123456', '3518091406740002', 'Muhammad Hamim nabhan03', ' Termas  001/001 Ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainunajayagroup@gmail.com', '085233959779', 'BCA', '8935108728', 'Muhammad Hamim nabhan', '1', 'milliarder', 78, '2020-08-28 05:21:21', 66, 'IMG-20200828-WA002415.jpg', 'anggota', 'sudah bayar', '11111113', 0),
(79, 'Shohan01', '123456', '3517081303730005', 'SOHAN YUSANI', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'shohan13neomaster@gmail.com', '082140865586', 'BCA', '1130565499', 'SOHAN YUSANI', '1', 'Shohan', 79, '2020-08-28 05:30:09', 76, 'IMG-20200828-WA002416.jpg', 'anggota', 'sudah bayar', '1111111211', 0),
(80, 'Shohan02', '123456', '3517081303730005', 'SOHAN YUSANI02', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'shohan13neomaster@gmail.com', '082140865586', 'BCA', '1130565499', 'SOHAN YUSANI', '1', 'SOHAN YUSANI', 80, '2020-08-28 05:33:17', 76, 'IMG-20200828-WA002417.jpg', 'anggota', 'sudah bayar', '1111111212', 0),
(81, 'Shohan03', '123456', '3517081303730005', 'SOHAN YUSANI03', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'shohan13neomaster@gmail.com', '082140865586', 'BCA', '1130565499', 'SOHAN YUSANI', '1', 'SOHAN YUSANI', 81, '2020-08-28 05:34:05', 76, 'IMG-20200828-WA002418.jpg', 'anggota', 'sudah bayar', '1111111213', 0),
(82, '3302196505790001', '123456', '3302196505790001', 'siti maesaroh', 'dsn sepudak rt 009 rw 004 desa kasembon', '35', '3507', '3507330', 'maezaroh@gmail.com', '082333185840', 'BRI', '002301052520505', 'Siti Maesaroh', '1', 'ikhwan05', 1, '2020-08-28 05:37:54', 58, 'IMG-20200828-WA002419.jpg', 'anggota', 'sudah bayar', '1111221', 0),
(83, 'Reborn01', '123456', '3517082807730001', 'Heriyanto01', 'randulawang rt02 rw 06 bandung diwek jombang', '35', '3517', '3517040', 'heriyanto0431@gmail.com', '085204911165', 'BRI', '364801006595531', 'HERIYANTO', '1', 'REBORN', 83, '2020-08-28 06:10:12', 74, 'IMG-20200828-WA002420.jpg', 'anggota', 'sudah bayar', '11111111111', 0),
(84, 'Reborn02', '123456', '3517082807730001', 'Heriyanto02', 'Randulawang rt02 rw06 bandung diwek jombang', '35', '3517', '3517040', 'heriyanto0431@gmail.com', '085204911165', 'BRI', '364801006595531', 'HERIYANTO', '1', 'REBORN', 84, '2020-08-28 06:11:11', 74, 'IMG-20200828-WA002421.jpg', 'anggota', 'sudah bayar', '11111111112', 0),
(85, 'Reborn03', '123456', '3517082807730001', 'Heriyanto03', 'Randulawang rt02 rw06 bandung diwek jombang', '35', '3517', '3517040', 'heriyanto0431@gmail.com', '085204911165', 'BRI', '364801006595531', 'HERIYANTO', '1', 'REBORN', 85, '2020-08-28 06:11:53', 74, 'IMG-20200828-WA002422.jpg', 'anggota', 'sudah bayar', '11111111113', 0),
(86, '3605102605660001', '123456', '3605102605660001', 'Hendro Suseno Hadi', 'jln Musi 2 Bendo', '35', '3506', '3506140', 'hendrosusenoh@gmail.com', '08113084334', 'BCA', '0372185625', 'Hendro Suseno Hadi', '1', 'Slamet Suroyo', 1, '2020-08-28 06:11:10', 72, 'IMG-20200828-WA002423.jpg', 'anggota', 'sudah bayar', '1111121112', 0),
(87, '3518060906810003', '123456', '3518060906810003', 'Dyno Bachtiar Bintoro', 'Combre Gondanglegi', '35', '3518', '3518070', 'dyno885@gmail.com', '085735987795', 'BRI', '375501010798536', 'Dyno Bachtiar Bintoro', '1', 'Slamet Suroyo', 1, '2020-08-28 06:15:15', 72, 'IMG-20200828-WA002424.jpg', 'anggota', 'sudah bayar', '1111121113', 0),
(88, '3522100201860001', '123456', '3522100201860001', 'ABDUL ROZAQ', 'Dusun Sugihwaras Rt.003/Rw.003 Desa Bandung Kec Diwek Kab Jombang', '35', '3517', '3517040', 'abdul.jawa011@gmail.com', '081226825157', 'Bca', '5610250205', 'abdul rozaq', '1', 'Ikhwan02', 1, '2020-08-28 06:22:26', 55, 'IMG-20200828-WA002426.jpg', 'anggota', 'sudah bayar', '1111122', 0),
(89, 'ainunajaya', '123456', '3518095111780001', 'Sri tabah', 'Termas Ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainuna.jy@gmail.com', '085779722414', 'Bri', '641601012169538', 'Sri tabah', '1', 'milliarder03', 89, '2020-08-28 06:23:25', 78, 'IMG-20200828-WA002425.jpg', 'anggota', 'sudah bayar', '111111131', 0),
(90, 'ainunajaya01', '123456', '3518095111780001', 'Sri tabah 01', 'Termas Ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainuna.jy@gmail.com', '085779722414', 'Bri', '641601012169538', 'Sri tabah', '1', 'ainunajaya', 90, '2020-08-28 06:40:15', 89, 'IMG-20200828-WA002427.jpg', 'anggota', 'sudah bayar', '1111111311', 0),
(91, 'ainunajaya02', '123456', '3518095111780001', 'Sri tabah 02', 'Termas Ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainuna.jy@gmail.com', '085779722414', 'Bri', '641601012169538', 'Sri tabah', '1', 'ainunajaya', 91, '2020-08-28 06:41:24', 89, 'IMG-20200828-WA002428.jpg', 'anggota', 'sudah bayar', '1111111312', 0),
(92, '3506224505740004', '123456', '3506224505740004', 'IMROATIN', 'dsn Dahu ds Jatirejo', '35', '3506', '3506210', 'imroatin2018@gmail.com', '082334568779', 'BCA', '0331443947', 'IMROATIN', '1', 'M Samsul Azhar', 1, '2020-08-28 06:44:01', 68, 'IMG-20200828-WA0042.jpg', 'anggota', 'sudah bayar', '111112121', 0),
(93, 'ainunajaya03', '123456', '3518095111780001', 'Sri tabah 03', 'Termas Ngepung Patianrowo nganjuk', '35', '3518', '3518100', 'ainuna.jy@gmail.com', '085779722414', 'Bri', '641601012169538', 'Sri tabah', '1', 'ainunajaya', 93, '2020-08-28 07:15:58', 89, 'IMG-20200828-WA00421.jpg', 'anggota', 'sudah bayar', '1111111313', 0),
(94, '3605102605660001', '123456', '3605102605660001', 'Hendro Suseno Hadi', 'Jln Musi 2 Bendo ', '35', '3506', '3506140', 'hendrosusenoh@gmail.com', '08113084334', 'BCA', '0372185625', 'Hendro Suseno Hadi', '1', 'Hendro Suseno Hadi', 1, '2020-08-28 06:45:00', 86, 'IMG-20200828-WA00422.jpg', 'anggota', 'sudah bayar', '11111211121', 0),
(95, '3605102605660001', '123456', '3605102605660001', 'Hendro Suseno Hadi', 'Jln Musi 2 Bendo ', '35', '3506', '3506140', 'hendrosusenoh@gmail.com', '08113084334', 'BCA', '0372185625', 'Hendro Suseno Hadi', '1', 'Hendro Suseno Hadi', 1, '2020-08-28 06:45:25', 94, 'IMG-20200828-WA00423.jpg', 'anggota', 'sudah bayar', '111112111211', 0),
(96, '3605102605660001', '123456', '3605102605660001', 'Hendro Suseno Hadi', 'jln Musi 2 Bendo \r\n', '35', '3506', '3506140', 'hendrosusenoh@gmail.com', '08113084334', 'BCA', '0372185625', 'Hendro Suseno Hadi', '1', 'Hendro Suseno Hadi', 1, '2020-08-28 07:15:10', 94, 'Screenshot_20200828_190112.jpg', 'anggota', 'sudah bayar', '111112111212', 0),
(97, '3525130902940003', '123456', '3525130902940003', 'RIZKY FEBRIANTO', 'wringin kurung jaya ', '35', '3525', '3525040', 'rizkyfebry09@gmail.com', '081216590250', 'MANDIRI', '79000803944', 'rizky febrianto', '2', 'hosterweb', 1, '2020-08-28 11:07:19', 1, '5db8fe523529f.jpg', 'tidak aktif', 'sudah bayar', '13', 0),
(102, '', '', '1111111111111114', 'alief', 'sad', '13', '1303', '1303051', 'asd@asd', '2131212313', 'dsa', 'asd', 'asd', '10', 'asd', 1, '2020-08-28 11:07:29', 97, NULL, 'tidak aktif', 'belum bayar', '131', 0),
(103, '3525135112760013', '123456', '3525135112760013', 'RIZKY FEBRIANTO', 'WRINGIN KURUNG JAYA', '35', '3525', '3525040', 'rizkyfebry09@gmail.com', '081216590250', 'MANDIRI', '79000803944', 'RIZKY FEBRIANTO', '2', 'HOSTERWEB', 1, '2020-08-29 12:11:02', 1, '5db8fe523529f.jpg', 'tidak aktif', 'sudah bayar', '14', 0),
(104, '1313131313131313', '123456', '1313131313131313', 'ALIEF FEBRIANA', 'wwww', '36', '3602', '3602121', 'alief@gmail.com', '131313131313', 'MANDIRI', '79000803944', 'rizky febrianto', '2', 'hosterweb', 1, '2020-08-29 12:11:07', 1, '9401.jpeg', 'tidak aktif', 'sudah bayar', '15', 0),
(105, 'Rayhan01', '123456', '3517080612010001', 'AHMAD RAYHAN ALQODRI', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'neomasterolshop@gmail.com', '085784247981', 'BCA', '1131658384', 'AHMAD RAYHAN ALQODRI', '1', 'Shohan01', 105, '2020-08-31 06:39:49', 79, 'IMG-20200829-WA0022.jpg', 'anggota', 'sudah bayar', '11111112111', 0),
(106, '3506151012720002', '123456', '3506151012720002', 'Rachmat Hidayat', 'Dawuhan RT 01/01', '35', '3506', '3506170', 'dayatkdr72@gmail.com', '081336547234', 'BCA', '4610389134', 'Rachmat Hidayat', '1', 'Agus Sujaki', 1, '2020-08-29 12:17:11', 67, 'IMG-20200829-WA00221.jpg', 'anggota', 'sudah bayar', '111112112', 0),
(107, '3518110402720001', '123456', '3518110402720001', 'Mahfud Saiq', 'Dsn.Termas, DS jekek', '35', '3518', '3518110', 'mahfudsaiq@gmail.com', '085231261110', 'BRI', '641601013916530', 'Mahfud Saiq', '1', 'Rachmat Hidayat', 1, '2020-08-29 01:30:38', 106, 'IMG-20200829-WA0034.jpg', 'anggota', 'sudah bayar', '1111121121', 0),
(108, '0518102512640002', '123456', '0518102512640002', 'Moh Dahlan', 'Dsn Karangtengah RT 02/01 Garu', '35', '3518', '3518110', 'mohdahlan1964@gmail.com', '085233219529', 'Mandiri', '0344832074', 'Umi Fadlolin', '1', 'Rachmat Hidayat', 1, '2020-08-29 01:31:10', 106, 'IMG-20200829-WA00341.jpg', 'anggota', 'sudah bayar', '1111121122', 0),
(109, '3506151012720002', '123456', '3506151012720002', 'Rachmat Hidayat', 'Ds Dawuhan RT 01/01', '35', '3506', '3506170', 'dayatkdr72@gmail.com', '081336547234', 'BCA', '4610389134', 'Rachmat Hidayat', '1', 'Rachmat Hidayat', 1, '2020-08-29 01:31:37', 106, 'IMG-20200829-WA00342.jpg', 'anggota', 'sudah bayar', '1111121123', 0),
(110, 'Sehatberkah', '123456', '3504173010570002', 'MUHYIN DIMYATI', 'dsn.Balong jambe rt/rw: 003/015\r\nDs. Blaru', '35', '3506', '3506141', 'muhyindim23@gmail.com', '081234209458', 'Bank Jatim', '0423024844', 'MUHYIN DIMYATI', '1', 'Berkahjaya01', 110, '2020-09-01 12:35:01', 54, 'IMG-20200829-WA00222.jpg', 'anggota', 'sudah bayar', '1111112', 0),
(111, '3506106109750003', '123456', '3506106109750003', 'Eni nurwahyuningtyas', 'Jalan Musi 2 Bendo kec pare kab kadiri jatim', '35', '3506', '3506140', 'tyashendro2@gmail.com', '082240396344', 'Bri', '041201037639502', 'Eni nurwahyuningtyas', '4', 'Hendro Suseno Hadi', 1, '2020-08-29 08:23:35', 86, 'IMG-20200829-WA00223.jpg', 'anggota', 'sudah bayar', '11111211122', 0),
(112, '3525141601670002', '123456', '3525141601670002', 'Poernomo', 'Jalan Nitrogen no 1 Petrokimia gresik', '35', '3525', '3525100', 'poernomo16@gmail.com', '081946742280', 'Bca', '7900076716', 'Tanti saraswati', '4', 'Hendro Suseno Hadi', 1, '2020-08-30 08:29:48', 86, 'IMG-20200830-WA0026.jpg', 'anggota', 'sudah bayar', '11111211123', 0),
(113, '3209312909680003', '123456', '3209312909680003', 'SAMII', 'Blok desa rre 03/01, Warujaya, Depok, Cirebon, *45155*', '32', '3209', '3209141', 'putrapantura2011@gmail.com', '081222102123', 'Bca', '7745153186', 'SAMII', '4', 'M samsul azhar', 1, '2020-08-30 12:50:20', 68, 'IMG-20200830-WA0029.jpg', 'anggota', 'sudah bayar', '111112122', 0),
(114, '3506142808880001', '123456', '3506142808880001', 'POERWANTORO SANJAYA SH', 'SuryaCafe Brubus desa Papar 64153', '35', '3506', '3506180', 'poerwantoro.sanjaya88@gmail.com', '085200011123', 'BCA', '0332177107', 'POERWANTORO SANJAYA SH', '1', 'Dyno Bachtiar Bintoro', 1, '2020-08-30 10:03:28', 87, 'IMG-20200830-WA0062.jpg', 'anggota', 'sudah bayar', '11111211131', 0),
(115, '3518070907700005', '123456', '3518070907700005', 'TOYIB', 'dsn. Rejosari, RT. 03 RW. 09 DS. Banjarsari  ', '35', '3518', '3518080', 'lisbathoyibalisba@gmail.com', '085792204799', 'BRI', '6413-01-012836-53-1', 'TOYIB', '1', 'Agus Sujaki', 1, '2020-08-30 10:04:03', 67, 'IMG-20200830-WA0070.jpg', 'anggota', 'sudah bayar', '111112113', 0),
(116, '3209312909680003', '123456', '3209312909680003', 'SAMII', 'Blok desa rt/re 03/01 Warujaya, Depok, Cirebon, 45155', '32', '3209', '3209141', 'putrapantura2011@gmail.com', '081222102123', 'BCA', '7745153186', 'SAMUU', '1', 'SAMII', 1, '2020-09-01 10:00:11', 113, 'IMG-20200901-WA0016.jpg', 'anggota', 'sudah bayar', '1111121221', 0),
(117, '3209312909680003', '123456', '3209312909680003', 'SAMII', 'Blok desa rre 03/01, Warujaya, 45155\r\n\r\n', '32', '3209', '3209141', 'putrapantura2011@gmail.com', '081222102123', 'BCA', '7745153186', 'SAMII', '1', 'Samii', 1, '2020-09-01 10:00:36', 113, 'IMG-20200901-WA00161.jpg', 'anggota', 'sudah bayar', '1111121222', 0),
(118, '3209312909680003', '123456', '3209312909680003', 'SAMII', 'Blok desa rre 03/01, Warujaya', '32', '3209', '3209141', 'putrapantura2011@gmail.com', '081222102123', 'BCA', '7745153186', 'SAMII', '1', 'Samii', 1, '2020-09-01 10:00:54', 113, 'IMG-20200901-WA00162.jpg', 'anggota', 'sudah bayar', '1111121223', 0),
(119, 'Etty', '123456', '3517084405750005', 'ETI MAHBUBI', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'shohan13neomaster@gmail.com', '085731948818', 'BCA', '1130926670', 'ETI MAHBUBI', '1', 'Shohan01', 119, '2020-09-01 01:01:15', 79, 'IMG-20200831-WA0017.jpg', 'anggota', 'sudah bayar', '11111112112', 0),
(120, '3506046202790001', '123456', '3506046202790001', 'istiyanah', 'dusun krajan RT 01 RW 02 desa mangunrejo kediri', '35', '3506', '3506030', 'istiya71@gmail.com', '082333029777', 'BRI', '627801023161531', 'istiyanah', '4', 'hendro suseno hadi', 1, '2020-08-31 09:42:42', 94, 'IMG-20200831-WA00171.jpg', 'anggota', 'sudah bayar', '111112111213', 0),
(121, '1271120110680001', '123456', '1271120110680001', 'basuki widodo', 'jalan sentosa Komp Panggon Indah No 57 LK 11 Rengas Pulau Medan Marelan', '12', '1275', '1275200', 'basukiwidodo6@gmail.com', '082162801151', 'mandiri syariah', '1968100102', 'basuki widodo', '4', 'hendro suseno hadi', 1, '2020-09-01 10:01:13', 95, 'IMG-20200901-WA00163.jpg', 'anggota', 'sudah bayar', '1111121112111', 0),
(122, 'Rayhan02', '123456', '3517080612010001', 'AHMAD RAYHAN ALQODRI', 'Pengkol Ceweng Diwek Jombang', '35', '3517', '3517040', 'shohan13neomaster@gmail.com', '085784247981', 'BCA', '1131658384', 'AHMAD RAYHAN ALQODRI', '1', 'Shohan01', 122, '2020-09-02 05:44:45', 79, 'IMG-20200901-WA0044.jpg', 'anggota', 'sudah bayar', '11111112113', 0),
(123, '3524140506700001', '123456', '3524140506700001', 'Muhammad Muflik.Sag', 'Blimbing', '35', '3524', '3524250', 'Muhammadmuflikh123@gmail.com', '08123042812', 'BNI 46', '0161091096', 'Muhammad Muflik', '1', 'Arif Rohman Hakim', 1, '2020-09-03 10:26:37', 48, 'IMG-20200903-WA0005.jpg', 'anggota', 'sudah bayar', '113', 0),
(124, 'Rizqi', '020274', '3517190202740007', 'emy irsyadi', 'jl.kelurahan rt 002 rw 003 desa tambar', '35', '3517', '3517110', 'emyirsyadi@gmail.com', '081243297599', 'bca', '1130788773', 'emy irsyadi', '1', 'ikhwan07', 124, '2020-09-06 06:16:03', 60, 'IMG-20200906-WA0049.jpg', 'anggota', 'sudah bayar', '1111311', 0),
(125, 'Pelangi', '123456', '3506183005790001', 'Sehatberkah02', 'Kepung', '35', '3571', '3571020', 'agufau@gmail.com', '082331160228', 'Bank Jatim', '0423024852', 'Agus  Fauzi', '3', 'Muhyin dimyati', 125, '2020-09-16 04:24:51', 110, 'IMG-20200909-WA0033.jpg', 'anggota', 'sudah bayar', '11111121', 0),
(126, '3504173010570002', '123456', '3504173010570002', 'Sehatberkah03', 'Blaru', '35', '3506', '3506141', 'muhyindim23@gmail.com', '081234209458', 'Bank Jatim', '0423024844', 'Muhyin Dimyati', '3', 'Muhyin dimyati', 1, '2020-09-09 08:47:28', 110, 'IMG-20200909-WA00331.jpg', 'anggota', 'sudah bayar', '11111122', 0),
(127, 'ABDUL ROFIQ', '123456', '3524142004690002', 'ABDUL ROFIQ', 'Weru', '35', '3524', '3524250', 'arif.hakim2405@gmail.com', '085785014531', 'KOMPAQ', '123456789', 'Abdul Rofiq', '1', 'Arif Rohman Hakim', 127, '2020-09-09 08:57:29', 1, 'IMG-20200909-WA00332.jpg', 'anggota', 'sudah bayar', '16', 0),
(128, '3517091307840003', '123456', '3517091307840003', 'ilyas nurul azam', 'jl nangka dsn sukopuro rt 003 rw 002 ds kwaron', '35', '3517', '3517040', 'ilyasnurulazam@gmail.com', '081334093793', 'bri', '365301017390537', 'ilyas nurul azam', '1', 'ikhwan08', 1, '2020-09-13 10:11:39', 61, 'IMG-20200913-WA0100.jpeg', 'anggota', 'sudah bayar', '1111321', 0);

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
