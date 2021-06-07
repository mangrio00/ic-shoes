-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 09:06 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

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
(2, 'Ultraboost', 'Adidas', 'Putih-Kuning', 1250000, 6, 'FotoProduk_2.jpg'),
(3, 'New Balance 997', 'New Balance', 'Putih-Orange', 799000, 5, 'FotoProduk_3.jpg'),
(7, 'Converse Low Sekolah', 'Converse Sekolah', 'Black-White-Grey', 999000, 21, 'FotoProduk_7.jpg');

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

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_transaksi`, `id_barang`, `nama_barang`, `ukuran`, `total_items`, `id_pembeli`, `date`) VALUES
(1, 0, 2, 'Ultraboost', 0, 3, 3, '31 May 2021 - 11:29:21'),
(2, 0, 1, 'Air Jordan 1', 0, 1, 3, '31 May 2021 - 11:29:21'),
(3, 0, 2, 'Ultraboost', 0, 3, 3, '31 May 2021 - 11:35:00'),
(4, 0, 1, 'Air Jordan 1', 0, 1, 3, '31 May 2021 - 11:35:00'),
(5, 0, 1, 'Air Jordan 1', 0, 1, 3, '31 May 2021 - 11:40:26'),
(6, 0, 3, 'New Balance 997', 0, 1, 3, '31 May 2021 - 11:40:26'),
(7, 0, 1, 'Air Jordan 1', 0, 1, 3, '31 May 2021 - 16:40:05'),
(8, 0, 2, 'Ultraboost', 0, 1, 3, '31 May 2021 - 16:40:05'),
(9, 0, 3, 'New Balance 997', 0, 1, 3, '31 May 2021 - 17:05:31'),
(10, 0, 1, 'Air Jordan 1', 0, 1, 3, '31 May 2021 - 17:05:31'),
(11, 0, 3, 'New Balance 997', 0, 1, 3, '31 May 2021 - 17:09:02'),
(12, 0, 2, 'Ultraboost', 0, 1, 3, '31 May 2021 - 17:09:02'),
(13, 10, 3, 'New Balance 997', 0, 1, 3, '31 May 2021 - 17:12:01'),
(14, 10, 4, 'Air Jordan 12', 0, 1, 3, '31 May 2021 - 17:12:01'),
(15, 11, 1, 'Air Jordan 1', 0, 1, 3, '31 May 2021 - 21:07:42'),
(16, 11, 2, 'Ultraboost', 0, 1, 3, '31 May 2021 - 21:07:42'),
(17, 12, 1, 'Air Jordan Mantul', 0, 1, 3, '31 May 2021 - 23:02:33'),
(18, 12, 2, 'Ultraboost', 0, 1, 3, '31 May 2021 - 23:02:33'),
(19, 13, 2, 'Ultraboost', 40, 1, 3, '31 May 2021 - 23:48:46'),
(20, 14, 2, 'Ultraboost', 42, 2, 3, '01 June 2021 - 00:09:56'),
(21, 14, 7, 'Converse Low Sekolah', 43, 2, 8, '01 June 2021 - 09:24:29'),
(22, 14, 3, 'New Balance 997', 42, 1, 8, '01 June 2021 - 09:24:29'),
(23, 14, 1, 'Air Jordan', 39, 1, 13, '02 June 2021 - 11:06:20'),
(24, 14, 1, 'Air Jordan', 44, 2, 13, '02 June 2021 - 11:06:20'),
(25, 14, 7, 'Converse Low Sekolah', 41, 1, 13, '02 June 2021 - 11:06:20'),
(26, 17, 1, 'Air Jordan', 39, 1, 13, '02 June 2021 - 11:13:53'),
(27, 17, 1, 'Air Jordan', 44, 1, 13, '02 June 2021 - 11:13:53'),
(28, 17, 7, 'Converse Low Sekolah', 42, 1, 13, '02 June 2021 - 11:13:53'),
(29, 18, 3, 'New Balance 997', 39, 1, 13, '02 June 2021 - 11:15:29'),
(30, 18, 3, 'New Balance 997', 42, 1, 13, '02 June 2021 - 11:15:29'),
(31, 18, 2, 'Ultraboost', 41, 1, 13, '02 June 2021 - 11:15:29'),
(32, 18, 1, 'Air Jordan', 41, 1, 13, '02 June 2021 - 11:15:29'),
(33, 18, 1, 'Air Jordan', 43, 1, 13, '02 June 2021 - 11:15:29'),
(34, 19, 1, 'Air Jordan', 43, 2, 14, '02 June 2021 - 13:54:15'),
(35, 19, 2, 'Ultraboost', 44, 1, 14, '02 June 2021 - 13:54:15'),
(36, 19, 1, 'Air Jordan', 38, 1, 14, '02 June 2021 - 13:54:15'),
(37, 20, 1, 'Air Jordan Merah', 41, 2, 14, '02 June 2021 - 13:59:08'),
(38, 20, 1, 'Air Jordan Merah', 44, 1, 14, '02 June 2021 - 13:59:08');

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

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `total_items`, `total_price`, `metode_bayar`, `pengiriman`, `status`, `date`) VALUES
(4, 3, 2, 2550000, 'OVO', '', 0, '31 May 2021 - 16:40:05'),
(8, 3, 2, 2099000, 'Bank BNI', '', 0, '31 May 2021 - 17:05:31'),
(9, 3, 2, 2049000, 'Link Aja', '', 0, '31 May 2021 - 17:09:02'),
(10, 3, 2, 2198999, 'OVO', '', 0, '31 May 2021 - 17:12:01'),
(11, 3, 2, 2550000, 'Bank Mandiri', '', 0, '31 May 2021 - 21:07:42'),
(13, 3, 1, 1250000, 'OVO', 'SiCepat', 1, '31 May 2021 - 23:48:46'),
(16, 13, 4, 5399000, 'Bank BNI', 'Go-Send', 1, '02 June 2021 - 11:06:20'),
(17, 13, 3, 5399000, 'ATM Bersama', 'JNE', 1, '02 June 2021 - 11:13:53'),
(18, 13, 5, 7248000, 'Bank BNI', 'Go-Send', 1, '02 June 2021 - 11:15:29'),
(19, 14, 4, 5650000, 'Bank BNI', 'TIKI', 1, '02 June 2021 - 13:54:15');

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
  `no_hp` int(11) NOT NULL,
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
(4, 'Admin Afif Raihan', 'Admin Afif', 'adminafif@gmail.com', 'rumahku surgaku', 1234567, 'FotoProfile_4.jpg', '$2y$10$SzZPB/npb42l1cuKusOfXeQVG9zPv7sIRlHTwDI.MIwVTdl0tvugi', 1, '30 May 2021 - 13:51:46', 1),
(5, 'User Lama', 'userlama', 'userlama@gmail.com', 'di suatu tempat yang ramai', 1234567, 'default.jpg', '$2y$10$SHYr1FvjPvTQDzK8x5kene7yOmwfRat3ENKSVgcOeDzUcwfQvnbW2', 2, '30 May 2021 - 17:22:31', 0),
(7, 'winico', 'okin', 'winico@gmail.com', 'jakaarta', 12345, 'FotoProfile_7.jpg', '$2y$10$dEcj3tTKlY6O1Ed2IF/NLOzvsD/UjISfZM4j8JmEOXa3Rn9.3NTFe', 2, '31 May 2021 - 21:29:59', 0),
(8, 'Admin', 'Admin', 'admin@gmail.com', 'Admin Address', 1234567890, 'default.jpg', '$2y$10$WOobGmoS6YZ5VBEtpCCoQezkAsquMZmsIsAq4ikM/bU.pNn0K8VZy', 2, '01 June 2021 - 07:25:12', 1),
(9, 'Admin Yoriko', 'New Admin', 'newadmin@gmail.com', 'Banjarmasin', 81239424, 'FotoProfile_9.png', '$2y$10$pmtpOwB7YX5tmPsbUusUTuFJYIlBHFGM2J77UJ1UEBoOmSAOexk9m', 1, '01 June 2021 - 07:26:14', 1),
(11, 'satu dua', 'satudua', 'satudua@gmail.com', 'satudua', 12121221, 'default.jpg', '$2y$10$Vo8YmoDRzRsZ/N4LYZ8qEOYiTzqq0cIoTPQZGgNwqcduupZaRnEIu', 2, '01 June 2021 - 09:12:24', 0),
(14, 'Made', 'Made', 'made@gmail.com', 'semarang', 1234542, 'FotoProfile_14.jpg', '$2y$10$hR950gEzkII3facwhIZw0OAMKtKkCOxlxicKowyHW6h2zM3dhv8JK', 2, '02 June 2021 - 13:48:54', 1);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
