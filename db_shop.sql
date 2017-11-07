-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 03:30 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` varchar(10) NOT NULL,
  `kategori_id` char(4) NOT NULL,
  `barang_nama` varchar(40) NOT NULL,
  `barang_harga` int(11) NOT NULL,
  `barang_satuan` varchar(15) NOT NULL,
  `barang_deskripsi` text NOT NULL,
  `barang_gambar` varchar(100) NOT NULL,
  `barang_aktif` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `barang_nama`, `barang_harga`, `barang_satuan`, `barang_deskripsi`, `barang_gambar`, `barang_aktif`) VALUES
('AA05', '1', 'JACKET BLACK', 321, '', 'ALL SIZE\nLIMITED EDITION', 'Arsenal1.jpg', 1),
('AB01', '2', 'JERSEY HOME', 123, '', 'ALL SIZE\nSTOCK : 100 PCS', 'jersey_cewek.jpg', 1),
('AB02', '2', 'KAOS CEWEK', 20000, '', 'ALL SIZE\nSTOCK : 100 PCS', 'kaos_cewek.jpg', 1),
('AB03', '2', 'JACKET CEWEK', 123, '', 'ALL SIZE\nSTOCK : 100 PCS', 'jaket_cewek.jpg', 1),
('AB04', '1', 'JERSEY CHAMPS', 123, '', 'ALL SIZE\nSTOCK : 100 PCS', 'away.jpg', 1),
('AB05', '1', 'JACKET PARASIT', 123, '', 'ALL SIZE\nSTOCK : 100 PCS', 'jaket_blue.jpg', 1),
('AC01', '3', 'JERSEY BAYI', 1234, '', 'ALL SIZE\nSTOCK : 100 PCS', 'baju_bayi.jpg', 1),
('AC02', '3', 'JACKET ANAK1', 234, '', 'ALL SIZE\nSTOCK : 100 PCS', 'jaket_anak.jpg', 1),
('AC03', '4', 'TOPI', 150000, '', 'ALL SIZE\nSTOCK : 100 PCS', 'topi_arsenal.jpg', 1),
('AC04', '4', 'SYALL', 123, '', 'ALL SIZE\nSTOCK : 100 PCS', 'syall.jpg', 1),
('AC5', '4', 'JAM TANGAN', 2016, '', 'ALL SIZE\nSTOCK : 100 PCS', 'jam.jpg', 1),
('AD01', '4', 'GELANG', 123, '', 'STOCK : 100 PCS', 'gelang.jpg', 0),
('AA01', '1', 'JERSEY HOME', 123, '', 'SIZE : S, M, XL\nSTOCK : 50 PCS', 'home_shirt.jpg', 1),
('AA02', '1', 'JERSEY HOME L', 123456, '', 'SIZE : M, XL\nSTOCK : 10 PCS', 'home_shirt_long.jpg', 1),
('AA03', '1', 'JERSEY AWAY', 12345, '', 'SIZE : M\nLIMITED EDITION', 'away_shirt.jpg', 1),
('AA04', '1', 'JACKET YELLOW', 123, '', 'ALL SIZE\nSTOCK : 123', 'jaket_kuning.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_nomor` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cart_tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_nomor`, `customer_id`, `cart_tanggal`) VALUES
(11, 1, '2016-01-15 00:05:58'),
(31, 3, '2016-01-16 14:01:53'),
(21, 2, '2016-01-15 01:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_nomor` int(11) NOT NULL,
  `barang_id` varchar(10) NOT NULL,
  `cart_barang_qty` int(11) NOT NULL,
  `cart_barang_harga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_nomor`, `barang_id`, `cart_barang_qty`, `cart_barang_harga`) VALUES
(21, 'P003', 1, 23000),
(11, 'P003', 2, 23000),
(31, 'P002', 1, 45000),
(11, 'P002', 3, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2bce2ac95ee3f91c0b8e7beef3cd7bfb', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.130 Chrome/43.0.2357.13', 1453472850, 'a:5:{s:9:"user_data";s:0:"";s:13:"customer_nama";s:14:"Noval Agustian";s:5:"level";s:1:"1";s:4:"leve";s:5:"Admin";s:11:"kategori_id";s:1:"1";}'),
('dbae6fd5e68e3f6528bf54f0a366d03d', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.130 Chrome/43.0.2357.13', 1453470432, 'a:6:{s:11:"customer_id";s:1:"2";s:14:"customer_email";s:15:"admin@gmail.com";s:13:"customer_nama";s:14:"Noval Agustian";s:5:"level";s:1:"1";s:4:"leve";s:5:"Admin";s:11:"kategori_id";s:1:"2";}');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(40) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_telepon` varchar(15) NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_password` text NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_alamat`, `customer_telepon`, `customer_email`, `customer_password`, `level`) VALUES
(1, 'Aroon Ramsey', 'Sragi sebeleh rel sepur', '085729152011', 'elex39@gmail.com', '+1bcCoTyeasgCAErApRZ9CQ+WBhfYUTIA2YEjg5D3llIrQmGarHJQUFmDSYPHJg4NtSxmnyIl1drb96EocmimQ==', 0),
(2, 'Noval Agustian', 'Kedungwuni barat pekalongan', '085729152011', 'admin@gmail.com', 'E9KFTEgFPrEc0u+eqj31DrgwEFDSULUZ7MqoDH8dHC/F5+6L2qI3BvI+G8uKogP7mX3D4gMFPkPoUR2sKRxq4A==', 1),
(3, 'agus', 'buaran', '085729152012', 'agus@gmail.com', 'HxDln4nLeFWNw/v+PHUj/3bstO5vrOJiAdhm7kM00OldoSJ4CXsQgxLAEQ0e0a/HA26YUzdCDzwNrRypvW4Pfw==', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(4) NOT NULL,
  `kategori_nama` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Means'),
(2, 'Ladies'),
(3, 'Kids'),
(4, 'Asessories');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(4) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `customer_id`, `isi_pesan`) VALUES
(4, 1, 'maaf produk yang anda kirim tidak sesuai dengan keterangan di website anda, saya kecewa');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE IF NOT EXISTS `tentang` (
  `tentang_id` int(4) NOT NULL,
  `tentang_nama` varchar(20) NOT NULL,
  `tentang_alamat` text NOT NULL,
  `tentang_telepon` varchar(15) NOT NULL,
  `tentang_email` varchar(25) NOT NULL,
  `tentang_bank` varchar(15) NOT NULL,
  `tentang_norek` varchar(20) NOT NULL,
  `tentang_an` varchar(25) NOT NULL,
  `tentang_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`tentang_id`, `tentang_nama`, `tentang_alamat`, `tentang_telepon`, `tentang_email`, `tentang_bank`, `tentang_norek`, `tentang_an`, `tentang_ket`) VALUES
(1, 'Gooner Shop', 'jalan raya kedungwuni barat', '085729152011', 'novalagustian73@gmail.com', 'BCA', '2500270112', 'NOFAL AGUSTIAN', 'Kami adalah DISTRO ARSENAL ONLIINE yang berproduksi di pekalongan asli. kami mengajak untuk menikmati kemudahan berbelanja online. Hanya dengan sedikit waktu, apa yang anda inginkan sudah ditangan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_nomor`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_nomor`,`barang_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`tentang_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
