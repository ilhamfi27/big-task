-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 03:38 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_parkiran_mall`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata_customer`
--

CREATE TABLE `biodata_customer` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `nomor_telepon` varchar(14) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lokasi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata_customer`
--

INSERT INTO `biodata_customer` (`no_ktp`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telepon`, `id_user`, `id_lokasi`) VALUES
('7623627', 'Jelema', '1999-12-01', 'L', '0987654678', 37, 6);

-- --------------------------------------------------------

--
-- Table structure for table `gerbang_parkir`
--

CREATE TABLE `gerbang_parkir` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `peruntukan` char(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mall` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gerbang_parkir`
--

INSERT INTO `gerbang_parkir` (`id`, `nama`, `peruntukan`, `id_user`, `id_mall`) VALUES
(1, 'Gerbang Utara 1', 'M', 29, 3),
(3, 'Gerbang Utara 2', 'K', 31, 3),
(6, 'Gerbang Selatan 1', 'M', 35, 4),
(7, 'Gerbang Selatan 2', 'K', 36, 4);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(5) NOT NULL,
  `id_kelurahan` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `id_kelurahan`, `alamat`, `kode_pos`) VALUES
(4, '3277020004', 'Jl. Gandawijaya No.1', '14410'),
(5, '3273120004', 'Cimindi', '43872'),
(6, '3273120005', 'Jl Lingga Putra', '14045');

-- --------------------------------------------------------

--
-- Table structure for table `mall`
--

CREATE TABLE `mall` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` char(14) NOT NULL,
  `fax` char(12) NOT NULL,
  `tahun_berdiri` year(4) NOT NULL,
  `id_lokasi` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mall`
--

INSERT INTO `mall` (`id`, `nama`, `no_telp`, `fax`, `tahun_berdiri`, `id_lokasi`, `id_user`, `kapasitas`) VALUES
(3, 'Cimahi Mall', '022298394', '022234975', 2006, 4, 19, 100),
(4, 'BTC', '98749834', '9834759', 2001, 5, 32, 100);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(5) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_gerbang`, `tanggal_waktu`) VALUES
(35, 1, '2018-12-02 12:12:43'),
(36, 1, '2018-12-02 12:12:59'),
(37, 1, '2018-12-02 12:13:00'),
(38, 1, '2018-12-02 12:13:00'),
(39, 1, '2018-12-02 12:13:01'),
(40, 3, '2018-12-02 12:13:02'),
(41, 3, '2018-12-02 12:13:03'),
(42, 6, '2018-12-02 12:32:17'),
(43, 6, '2018-12-02 12:32:17'),
(44, 6, '2018-12-02 12:32:18'),
(45, 7, '2018-12-02 12:32:19'),
(46, 7, '2018-12-02 12:32:20'),
(47, 6, '2018-12-02 12:32:52'),
(48, 6, '2018-12-02 12:32:53'),
(49, 6, '2018-12-02 12:32:54'),
(50, 6, '2018-12-02 12:32:55'),
(51, 6, '2018-12-02 12:32:56'),
(52, 6, '2018-12-02 12:32:56'),
(53, 6, '2018-12-02 12:32:57'),
(54, 7, '2018-12-02 12:32:58'),
(55, 7, '2018-12-02 12:32:59'),
(56, 7, '2018-12-02 12:33:00'),
(57, 6, '2018-12-02 14:16:32'),
(58, 6, '2018-12-02 14:16:33'),
(59, 6, '2018-12-02 14:16:34'),
(60, 6, '2018-12-02 14:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` char(1) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `join_date`) VALUES
(19, 'mall1', 'efe6398127928f1b2e9ef3207fb82663', 'M', '2018-12-02'),
(29, 'gerbang_utara_1', 'da6311784561fdb7a8887e22c22cb325', 'G', '2018-12-02'),
(31, 'gerbang_utara_2', 'e16ffde555cea7dd96e119dccfcc734a', 'G', '2018-12-02'),
(32, 'mall2', 'efe6398127928f1b2e9ef3207fb82663', 'M', '2018-12-02'),
(35, 'gerbang_selatan_1', 'c269bd40362fb92c5b800405445be560', 'G', '2018-12-02'),
(36, 'gerbang_selatan_2', '7ed03ee267aa014c11ffdabfa8d0420a', 'G', '2018-12-02'),
(37, 'customer1', 'efe6398127928f1b2e9ef3207fb82663', 'C', '2018-12-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata_customer`
--
ALTER TABLE `biodata_customer`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `gerbang_parkir`
--
ALTER TABLE `gerbang_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mall` (`id_mall`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kota` (`id_kelurahan`);

--
-- Indexes for table `mall`
--
ALTER TABLE `mall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gerbang` (`id_gerbang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gerbang_parkir`
--
ALTER TABLE `gerbang_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mall`
--
ALTER TABLE `mall`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata_customer`
--
ALTER TABLE `biodata_customer`
  ADD CONSTRAINT `biodata_customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `biodata_customer_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`);

--
-- Constraints for table `gerbang_parkir`
--
ALTER TABLE `gerbang_parkir`
  ADD CONSTRAINT `gerbang_parkir_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `gerbang_parkir_ibfk_2` FOREIGN KEY (`id_mall`) REFERENCES `mall` (`id`);

--
-- Constraints for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_1` FOREIGN KEY (`id_kelurahan`) REFERENCES `desa_kelurahan` (`id`);

--
-- Constraints for table `mall`
--
ALTER TABLE `mall`
  ADD CONSTRAINT `mall_ibfk_1` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `mall_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_gerbang`) REFERENCES `gerbang_parkir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
