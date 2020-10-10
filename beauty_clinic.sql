-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 04:38 PM
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
-- Database: `beauty_clinic`
--
CREATE DATABASE IF NOT EXISTS `beauty_clinic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beauty_clinic`;

-- --------------------------------------------------------

--
-- Table structure for table `dtrans`
--

DROP TABLE IF EXISTS `dtrans`;
CREATE TABLE `dtrans` (
  `ID_TRANS` varchar(10) NOT NULL,
  `ID_OBAT` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrans`
--

INSERT INTO `dtrans` (`ID_TRANS`, `ID_OBAT`) VALUES
('1', NULL),
('2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `htrans`
--

DROP TABLE IF EXISTS `htrans`;
CREATE TABLE `htrans` (
  `ID_TRANS` varchar(10) NOT NULL,
  `TOTAL_TRANS` int(11) NOT NULL,
  `TANGGAL_TRANS` datetime NOT NULL,
  `ID_PELANGGAN` varchar(10) NOT NULL,
  `ID_PERAWATAN` varchar(10) DEFAULT NULL,
  `ID_BEAUTICIAN` varchar(10) DEFAULT NULL,
  `PEMBAYARAN` varchar(255) NOT NULL,
  `STATUS_TRANS` varchar(1) NOT NULL COMMENT '0 = BELUM SELESAI,\r\n1 = SUDAH SELESAI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `htrans`
--

INSERT INTO `htrans` (`ID_TRANS`, `TOTAL_TRANS`, `TANGGAL_TRANS`, `ID_PELANGGAN`, `ID_PERAWATAN`, `ID_BEAUTICIAN`, `PEMBAYARAN`, `STATUS_TRANS`) VALUES
('1', 350000, '2020-10-08 00:00:00', '1', NULL, NULL, '', '0'),
('2', 250000, '2020-10-15 18:10:00', '2', NULL, NULL, '', '0'),
('3', 350000, '2020-10-16 02:29:00', '3', NULL, NULL, 'Tunai', '0');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `ID_MEMBER` varchar(10) NOT NULL,
  `NAMA_MEMBER` varchar(255) NOT NULL,
  `ALAMAT_MEMBER` varchar(255) NOT NULL,
  `TELEPON_MEMBER` varchar(13) NOT NULL,
  `EMAIL_MEMBER` varchar(255) NOT NULL,
  `STATUS_MEMBER` int(11) NOT NULL COMMENT '0 = tidak atif, 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID_MEMBER`, `NAMA_MEMBER`, `ALAMAT_MEMBER`, `TELEPON_MEMBER`, `EMAIL_MEMBER`, `STATUS_MEMBER`) VALUES
('1', 'Jennifer ', 'Kapasan Dalam 96', '025896354845', 'jen@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE `obat` (
  `ID_OBAT` varchar(10) NOT NULL,
  `NAMA_OBAT` varchar(255) NOT NULL,
  `STOK_OBAT` int(11) NOT NULL,
  `STATUS_OBAT` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`ID_OBAT`, `NAMA_OBAT`, `STOK_OBAT`, `STATUS_OBAT`) VALUES
('AC001', 'Benzoil peroksida', 25, '1'),
('AC002', 'Asam salisilat', 25, '1'),
('AC0022', 'Acne', 25, '1'),
('AC003', 'Sulfur dan resorcinol', 25, '1'),
('AC004', 'Tretinoin', 25, '1'),
('AC005', 'Antibiotik topikal', 25, '1'),
('AC006', 'Asam azelaic', 25, '1'),
('AC007', 'Antibiotik oral', 25, '1'),
('AC008', 'Isotretinoin', 25, '1'),
('AC009', 'Aldactone', 25, '1'),
('FA001', 'Gummy Multivitamin Beauti+', 25, '1'),
('FA002', 'Skincore 30caps', 25, '1'),
('FA003', 'Collagen Diamond 5300 Drink', 25, '1'),
('FA004', 'Aloe 10.000 & Probiotics Veg', 25, '1'),
('FA005', 'Capsules', 25, '1'),
('SK001', 'Zincore 30caps', 25, '1'),
('SK002', 'Virgin Salmon Omega-3 Fish Oil', 25, '1'),
('SK003', 'Skin Nutrition', 25, '1'),
('SK004', 'Super Collagen+C', 25, '1'),
('SK005', 'H2 Fair Skin', 25, '1'),
('SK006', 'Radiance Marine Q10', 25, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` varchar(10) NOT NULL,
  `NAMA_PELANGGAN` varchar(255) NOT NULL,
  `TELEPON_PELANGGAN` varchar(13) NOT NULL,
  `ID_MEMBER` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `TELEPON_PELANGGAN`, `ID_MEMBER`) VALUES
('1', 'jennifer', '089523698745', ''),
('2', 'PutriJeanette', '085693457567', ''),
('3', 'steee', '089523698745', '');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

DROP TABLE IF EXISTS `perawatan`;
CREATE TABLE `perawatan` (
  `ID_PERAWATAN` varchar(10) NOT NULL,
  `NAMA_PERAWATAN` varchar(255) NOT NULL,
  `HARGA_PERAWATAN` int(11) NOT NULL,
  `STATUS_PERAWATAN` varchar(1) NOT NULL COMMENT '0 = TIDAK AKTIF, 1 = AKTIF\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`ID_PERAWATAN`, `NAMA_PERAWATAN`, `HARGA_PERAWATAN`, `STATUS_PERAWATAN`) VALUES
('TR001', 'Face Care', 350000, '1'),
('TR002', 'Acne Care', 250000, '1'),
('TR003', 'Sensitive Allergy Atopy', 550000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `ID_STAFF` varchar(10) NOT NULL,
  `NAMA_STAFF` varchar(255) NOT NULL,
  `ALAMAT_STAFF` varchar(255) NOT NULL,
  `TELEPON_STAFF` varchar(13) NOT NULL,
  `JABATAN_STAFF` varchar(50) NOT NULL,
  `PASSWORD_STAFF` varchar(255) NOT NULL,
  `STATUS_STAFF` varchar(1) NOT NULL COMMENT '0 = TIDAK AKTIF, 1 = AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_STAFF`, `NAMA_STAFF`, `ALAMAT_STAFF`, `TELEPON_STAFF`, `JABATAN_STAFF`, `PASSWORD_STAFF`, `STATUS_STAFF`) VALUES
('AN0001', 'ErlandG', 'Ngangel Jaya Selatan 7', '085962345897', 'Admin', 'erland', '1'),
('AN0002', 'JimmyPratama', 'Ngagel Tama 13', '089529134567', 'Admin', 'jimmy', '1'),
('BA0001', 'GloriaMargaret', 'Jagalan 3 / 12', '081523698745', 'Beautician assistant', 'gloria', '1'),
('BA0002', 'Liona', 'Sidodadi 25', '085956321458', 'Beautician assistant', 'liona', '1'),
('BA0003', 'DewiFortuna', 'Lebak Timur 25', '081450003012', 'Beautician assistant', 'dewi', '1'),
('BA0004', 'Angela', 'Babatan Mukti 15', '081546932541', 'Beautician assistant', 'angela', '1'),
('BA0005', 'VictoriaAlexandra', 'Vila Telaga Warna C2-12', '089523647895', 'Beautician assistant', 'victoria', '1'),
('BN0001', 'AdellaAnwary', 'Ngangel Jaya 52', '0814563294787', 'Beautician', 'adella', '1'),
('BN0002', 'KimberlyWijaya', 'Kertopaten 36', '0814579325657', 'Beautician', 'kimberly', '1'),
('BN0003', 'AyleneAtmaja', 'Ngagel Jaya Tengah 15', '089523697485', 'Beautician', 'aylene', '1'),
('BN0004', 'KeyraHousten', 'Puri Sentra Raya H8-16', '081253698745', 'Beautician', 'keyra', '1'),
('BN0005', 'DianaPratama', 'Taman Internasional b7-28', '085125369187', 'Beautician', 'diana', '1'),
('BO0001', 'CelineWijaya', 'Kapasan Dalam 23', '0815469325778', 'Beauty operator', 'celine', '1'),
('BO0002', 'StefanieAngelina', 'Kapasari 5', '089563245678', 'Beauty operator', 'stefanie', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`ID_TRANS`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID_MEMBER`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID_OBAT`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`ID_PERAWATAN`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_STAFF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
