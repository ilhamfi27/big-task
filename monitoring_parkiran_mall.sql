-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 12:32 PM
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
(3, 'Gerbang Utara 2', 'K', 31, 3);

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
(4, '3277020004', 'Jl. Gandawijaya No.1', '14410');

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
(3, 'Cimahi Mall', '022298394', '022234975', 2006, 4, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(5) NOT NULL,
  `id_mall` int(5) NOT NULL,
  `id_gerbang` int(11) NOT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_mall`, `id_gerbang`, `tanggal_waktu`) VALUES
(1, 3, 29, '2018-12-02 11:13:48'),
(2, 3, 29, '2018-12-02 11:14:51'),
(3, 3, 29, '2018-12-02 11:15:14'),
(4, 3, 29, '2018-12-02 11:17:57'),
(5, 3, 29, '2018-12-02 11:17:58'),
(6, 3, 29, '2018-12-02 11:17:58'),
(7, 3, 29, '2018-12-02 11:17:59'),
(8, 3, 29, '2018-12-02 11:18:00'),
(9, 3, 29, '2018-12-02 11:18:00'),
(10, 3, 29, '2018-12-02 11:18:00'),
(11, 3, 29, '2018-12-02 11:18:00'),
(12, 3, 29, '2018-12-02 11:18:00'),
(13, 3, 29, '2018-12-02 11:18:00'),
(14, 3, 29, '2018-12-02 11:18:01'),
(15, 3, 29, '2018-12-02 11:18:01'),
(16, 3, 29, '2018-12-02 11:18:01'),
(17, 3, 29, '2018-12-02 11:18:01'),
(18, 3, 29, '2018-12-02 11:18:01'),
(19, 3, 29, '2018-12-02 11:18:01'),
(20, 3, 29, '2018-12-02 11:18:01'),
(21, 3, 29, '2018-12-02 11:18:01'),
(22, 3, 29, '2018-12-02 11:18:01'),
(23, 3, 29, '2018-12-02 11:18:01'),
(24, 3, 29, '2018-12-02 11:18:01'),
(25, 3, 29, '2018-12-02 11:18:01'),
(26, 3, 29, '2018-12-02 11:18:02'),
(27, 3, 29, '2018-12-02 11:18:02'),
(28, 3, 29, '2018-12-02 11:18:02'),
(29, 3, 31, '2018-12-02 11:18:53'),
(30, 3, 31, '2018-12-02 11:18:53'),
(31, 3, 31, '2018-12-02 11:18:53'),
(32, 3, 31, '2018-12-02 11:18:53'),
(33, 3, 31, '2018-12-02 11:18:53'),
(34, 3, 31, '2018-12-02 11:18:53'),
(35, 3, 31, '2018-12-02 11:18:54'),
(36, 3, 31, '2018-12-02 11:18:54'),
(37, 3, 31, '2018-12-02 11:18:54'),
(38, 3, 31, '2018-12-02 11:18:54'),
(39, 3, 31, '2018-12-02 11:18:54'),
(40, 3, 31, '2018-12-02 11:18:54'),
(41, 3, 31, '2018-12-02 11:18:54'),
(42, 3, 31, '2018-12-02 11:18:54'),
(43, 3, 31, '2018-12-02 11:19:08'),
(44, 3, 31, '2018-12-02 11:19:08');

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
(31, 'gerbang_utara_2', 'e16ffde555cea7dd96e119dccfcc734a', 'G', '2018-12-02');

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
  ADD KEY `id_mall` (`id_mall`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mall`
--
ALTER TABLE `mall`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_mall`) REFERENCES `mall` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
