-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2025 at 08:05 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama` varchar(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `kategori`, `stok`, `harga`) VALUES
(1, 'Arabica', 'Biji Kopi', 9, 195000),
(2, 'Robusta', 'Biji Kopi', 130, 185000),
(3, 'Arabica Blend', 'Biji Kopi', 130, 185000),
(4, 'Arabica Toraja', 'Biji Kopi', 90, 185000),
(5, 'Robusta Tubruk', 'Biji Kopi', 310, 175000),
(6, 'Robusta Blend', 'Biji Kopi', 4, 175000),
(7, 'Arabica Grinded', 'Bubuk Kopi', 2, 205000),
(8, 'Espresso Machine', 'Peralatan Kopi', 10, 15000000),
(9, 'Latte', 'Kopi', 60, 25000),
(10, 'Susu UHT', 'Bahan Kopi', 20, 20500),
(11, 'Robusta Toraja', 'Bubuk Kopi', 20, 180000),
(12, 'Robusta Grinded', 'Bubuk Kopi', 100, 180000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'Biji Kopi', 'Jadi ini tu biji kopi bro'),
(2, 'Bubuk kopi', 'Jadi ini tu bubuk kopi bro'),
(3, 'Kopi', 'jadi ini tu kopi yang siap minum'),
(4, 'Peralatan Kopi', 'jadi ini tu peralatan-peralatan kopi'),
(5, 'Bahan Kopi', 'jadi ini tu bahan untuk bikin segala jenis kopi');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'Dzakwan', 'Jl. Juanda 7', '8392918394', 'dzakwan@gmail.com'),
(2, 'Fauzan', 'Jl. M Said', '82739173928', 'Fauzan@gmail.com'),
(3, 'Fattah', 'Jl. Bumi Sempaja', '83726461903', 'Fattah@gmail.com'),
(4, 'Reyvan', 'Jl. in aja dulu', '82761728402', 'reychan@gmail.com'),
(5, 'Raja', 'Jl. Cino', '87251162537', 'Raja@gmail.com'),
(6, 'Supirman', 'Surabaya', '82631127392', 'supirman@gmail.com'),
(7, 'Mulyono', 'Solo', '8237182391', 'mulyono@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_barang` int DEFAULT NULL,
  `jenis` varchar(10) NOT NULL,
  `jumlah` int NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_barang`, `jenis`, `jumlah`, `keterangan`) VALUES
(1, 8, 'masuk', 5, 'Barang telah diterima'),
(2, 4, 'keluar', 29, 'Barang telah keluar gudang'),
(3, 2, 'keluar', 10, 'Barang telah keluar gudang'),
(4, 10, 'masuk', 40, 'Barang telah diterima'),
(5, 7, 'masuk', 4, 'Barang telah diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
