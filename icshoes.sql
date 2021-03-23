-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 04:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(5) NOT NULL,
  `usernameAdmin` varchar(15) NOT NULL,
  `passwordAdmin` varchar(20) NOT NULL,
  `alamatAdmin` varchar(50) NOT NULL,
  `emailAdmin` varchar(50) NOT NULL,
  `namaAdmin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` varchar(5) NOT NULL,
  `idAdmin` varchar(5) NOT NULL,
  `namaBarang` varchar(30) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `warnaBarang` varchar(20) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `harga` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barangpesanan`
--

CREATE TABLE `barangpesanan` (
  `idPesanan` varchar(5) NOT NULL,
  `idBarang` varchar(5) NOT NULL,
  `idBarangPesanan` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `idCheckout` varchar(5) NOT NULL,
  `idPesanan` varchar(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noHp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` varchar(5) NOT NULL,
  `idCheckout` varchar(5) NOT NULL,
  `metodePembayaran` varchar(20) NOT NULL,
  `statusPembayaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `idPengiriman` varchar(5) NOT NULL,
  `metodePengiriman` varchar(20) NOT NULL,
  `idCheckout` varchar(5) NOT NULL,
  `biayaPengiriman` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idPesanan` varchar(5) NOT NULL,
  `idUser` varchar(5) NOT NULL,
  `totalHarga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` varchar(5) NOT NULL,
  `usernameUser` varchar(15) NOT NULL,
  `passwordUser` varchar(20) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `namaUser` varchar(20) NOT NULL,
  `alamatUser` varchar(50) NOT NULL,
  `noHpUser` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `idUser` varchar(5) NOT NULL,
  `idBarang` varchar(5) NOT NULL,
  `idWishlist` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `fk_idAdmin_barang` (`idAdmin`);

--
-- Indexes for table `barangpesanan`
--
ALTER TABLE `barangpesanan`
  ADD PRIMARY KEY (`idPesanan`,`idBarang`,`idBarangPesanan`),
  ADD KEY `fk_idBarang_barangpesanan` (`idBarang`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`idCheckout`,`idPesanan`),
  ADD KEY `fk_idPesanan_checkout` (`idPesanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`),
  ADD KEY `fk_idCheckout_pembayaran` (`idCheckout`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`idPengiriman`),
  ADD KEY `fk_idCheckout_pengiriman` (`idCheckout`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idPesanan`),
  ADD KEY `fk_idUser_pesanan` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`idUser`,`idBarang`,`idWishlist`),
  ADD KEY `fk_idBarang_wishlist` (`idBarang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_idAdmin_barang` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Constraints for table `barangpesanan`
--
ALTER TABLE `barangpesanan`
  ADD CONSTRAINT `fk_idBarang_barangpesanan` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `fk_idPesanan_barangpesanan` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`);

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_idPesanan_checkout` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_idCheckout_pembayaran` FOREIGN KEY (`idCheckout`) REFERENCES `checkout` (`idCheckout`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `fk_idCheckout_pengiriman` FOREIGN KEY (`idCheckout`) REFERENCES `checkout` (`idCheckout`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_idUser_pesanan` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_idBarang_wishlist` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `fk_idUser_wishlist` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
