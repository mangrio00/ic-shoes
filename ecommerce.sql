-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 06:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `brand` varchar(64) NOT NULL,
  `warna_barang` varchar(64) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `brand`, `warna_barang`, `harga`, `stok`, `image`) VALUES
(10, 'Yeezy Boost 350 V2', 'Adidas', 'Light', 5000000, 6, 'FotoProduk_10.jpg'),
(11, 'Air Jordan High', 'Nike', 'Black-Red', 7000000, 5, 'FotoProduk_11.jpg'),
(15, 'Air Max 97', 'Nike', 'Black', 1200000, 7, 'FotoProduk_15.png'),
(16, 'Checkerboard Slip-On', 'Vans', 'Black-White', 1200000, 7, 'FotoProduk_16.png');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_items` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `metode_bayar` varchar(64) NOT NULL,
  `pengiriman` varchar(64) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = cancel, 1 success, 2 = waiting',
  `date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '1 = admin, 2 = user',
  `date_created` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `username`, `email`, `alamat`, `no_hp`, `image`, `password`, `role_id`, `date_created`, `is_active`) VALUES
(8, 'Admin 1', 'Admin', 'admin1@gmail.com', 'Admin Address', '000000000000', 'FotoProfile_8.png', '$2y$10$WOobGmoS6YZ5VBEtpCCoQezkAsquMZmsIsAq4ikM/bU.pNn0K8VZy', 1, '01 June 2021 - 07:25:12', 1),
(14, 'Made', 'Made', 'made@gmail.com', 'semarang', '1234542', 'FotoProfile_14.jpg', '$2y$10$hR950gEzkII3facwhIZw0OAMKtKkCOxlxicKowyHW6h2zM3dhv8JK', 2, '02 June 2021 - 13:48:54', 1),
(16, 'Okin', 'winico', 'winico@gmail.com', 'aawrrws', '2147483647', 'default.jpg', '$2y$10$C4jMbPr5cZe9hbs5eVUo2uXImIdPiUaNNFz4fcgvBVOU8hfzv.dju', 2, '07 June 2021 - 22:42:35', 1),
(17, 'Tri Ayu', 'tri3', 'triayu@gmail.com', 'Jawa tengah', '2147483647', 'default.jpg', '$2y$10$OHt659ghbm8XvZ6u4zARweiAh9jYKDjjQS9Ufqbdm8xERPE94NXle', 2, '07 June 2021 - 23:03:54', 0),
(18, 'MadeMeeps', 'Madee', 'madeip@gmail.com', 'Jalan Semarang no 1a', '082146834144', 'default.jpg', '$2y$10$h52qYxhkn/F3r.HittLsb.bdi4qlFpUFWtM.gGTyGgyIL5/6QMLha', 2, '07 June 2021 - 23:10:05', 1),
(19, 'rio', 'riooo', 'rio@gmail.com', 'aiwdoiwa', '2147483647', 'default.jpg', '$2y$10$mHa7I4.zB8Bc7LI/RgAzsOGBDn1MdvJBRjMR/LbdDKUW5ZZXHaRDi', 2, '08 June 2021 - 11:47:53', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
