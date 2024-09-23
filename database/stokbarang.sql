-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2024 at 10:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idkeluar` int NOT NULL,
  `idbarang` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penerima` varchar(25) NOT NULL,
  `qty` int NOT NULL,
  `namadepartemen` varchar(30) NOT NULL,
  `tanggal_keluar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barangkeluar`
--

INSERT INTO `barangkeluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`, `namadepartemen`, `tanggal_keluar`) VALUES
(26, 19, '2024-08-30 05:36:49', 'angga', 100, 'gudang', '2024-09-01'),
(27, 20, '2024-08-30 05:58:55', 'johan', 100, 'gudang', '2024-08-30'),
(29, 22, '2024-09-03 11:25:46', 'gamal', 10, 'gudang', '2024-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idmasuk` int NOT NULL,
  `idbarang` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` varchar(25) NOT NULL,
  `qty` int NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`, `tanggal_masuk`) VALUES
(17, 19, '2024-08-30 05:32:50', 'angga', 100, '2024-09-09'),
(18, 20, '2024-08-30 05:58:25', 'johan', 100, '2024-08-28'),
(19, 21, '2024-09-01 03:14:18', 'gala', 100, '2024-09-06'),
(20, 22, '2024-09-02 03:28:15', 'toko baju', 100, '2024-08-26'),
(22, 19, '2024-09-08 00:45:05', 'KARMEN', 10, '2024-09-11'),
(23, 23, '2024-09-09 13:41:46', 'angga', 100, '2024-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `idcatatan` int NOT NULL,
  `tanggal_catatan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi_catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`idcatatan`, `tanggal_catatan`, `isi_catatan`) VALUES
(1, '2024-09-11 11:43:27', 'haloo saya angga'),
(46, '2024-09-14 05:25:45', 'isi stok gula');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `iddepartemen` int NOT NULL,
  `namadepartemen` varchar(25) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`iddepartemen`, `namadepartemen`, `keterangan`) VALUES
(1, 'gudang', '-'),
(2, 'label', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idjenis` int NOT NULL,
  `namajenis` varchar(25) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`idjenis`, `namajenis`, `keterangan`) VALUES
(2, 'umum', '-'),
(6, 'sparepart', '-');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `username`, `password`, `role`) VALUES
(1, 'angga', '12345', 'user'),
(2, 'admin', '12345', 'admin'),
(6, 'user', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `idsatuan` int NOT NULL,
  `namasatuan` varchar(25) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`idsatuan`, `namasatuan`, `keterangan`) VALUES
(3, 'pcs', 'picis'),
(4, 'kg', 'kilogram');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idbarang` int NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stok` int NOT NULL,
  `kodebarang` varchar(25) NOT NULL,
  `namasatuan` varchar(25) NOT NULL,
  `namajenis` varchar(25) NOT NULL,
  `image` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idbarang`, `namabarang`, `deskripsi`, `stok`, `kodebarang`, `namasatuan`, `namajenis`, `image`) VALUES
(19, 'gula', '-', 10, '111', 'pcs', 'umum', '9dec241d97464a8d8b2ef7758eab87df.png'),
(20, 'Van Belt B-50', '-', 0, '333', 'pcs', 'sparepart', 'bc9d25dc5a51ad5e80d43b35205c0cfa.jpg'),
(21, 'sabun cair', '-', 100, '999', 'pcs', 'umum', '3ea585d6f7cb06dd0c976f1ee4c57bc7.png'),
(22, 'baju', '-', 90, '222', 'pcs', 'umum', 'e6183f6572d4ce7b72ceb1d1afd998d4.png'),
(23, 'van belt 40', '-', 100, '777', 'pcs', 'sparepart', '9b281f56b63f047010dc61cace0ce6d3.jpg'),
(24, 'van belt 20', '-', 0, '45454', 'pcs', 'sparepart', '4e3a6b1df390db8b1cc5cf7ce021ca06.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`idcatatan`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`iddepartemen`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`idsatuan`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idkeluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idmasuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `idcatatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `iddepartemen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `idsatuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
