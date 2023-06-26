-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 07:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_muslim`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesan`
--

CREATE TABLE `detail_pemesan` (
  `id_detail_pemesan` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesan`
--

INSERT INTO `detail_pemesan` (`id_detail_pemesan`, `id_pemesan`, `username`, `id_produk`, `jumlah_produk`) VALUES
(36, 16, 'user', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id_pemesan` int(11) NOT NULL,
  `tanggal_pemesan` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id_pemesan`, `tanggal_pemesan`, `total_harga`, `total_bayar`) VALUES
(16, '2023-06-25', 400000, 412000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(64) NOT NULL,
  `jenis_produk` varchar(64) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_produk`, `stok`, `harga`, `gambar`) VALUES
(6, 'Celana training parasut ', 'pakaian pria', 23, 145000, '648ad8ecd9dc6.jpg'),
(7, 'Joggers jumbo zipper', 'pakaian wanita', 12, 200000, '648ad92942795.jpg'),
(8, 'MARDI MERCREDI Sweatshirt ', 'pakaian wanita', 54, 260000, '648b45ee6c31d.jpg'),
(9, 'GIOVANA BLOUSE Linen ', 'pakaian wanita', 45, 80000, '648c169469d2f.jpg'),
(10, ' Ghea Katun Linen Rami Polos', 'pakaian pria', 90, 78000, '648c1726dd554.jpg'),
(11, 'Hoodie Sweater Hitam', 'pakaian pria', 12, 55000, '648c17935ff95.jpeg'),
(12, 'Kurta Pakistan Anak', 'baju anak', 67, 130000, '648c185276552.jpg'),
(13, 'setelan koko muslim', 'baju anak', 88, 76000, '648c18c525929.jpg'),
(14, 'BNIB SEPATU ORIGINAL ADIDAS', 'sepatu', 54, 230000, '648c195a3110e.jpg'),
(15, 'Sepatu Sneakers Pria Nike Air Force', 'sepatu', 45, 255000, '648d6788ec43c.jpg'),
(16, 'Sepatu Pria Casual Kets Sneakers', 'sepatu', 12, 147000, '648d67da06288.jpg'),
(17, 'Sepatu Kasual Sneakers Putih', 'sepatu', 76, 190000, '648d683d6b131.jpg'),
(18, 'Footstep Footwear Sepatu pria ', 'sepatu', 65, 193000, '648d68fe31083.png'),
(19, 'ADIDAS ZX 750 BLACK WHITE RED', 'sepatu', 89, 450000, '648d693a20dc5.jpg'),
(20, 'Johnwin Kaos Casual Pria Sablon Hijau', 'pakaian pria', 34, 199920, '648d6a6a20750.jpg'),
(21, 'FortKlas Sweater Polos', 'pakaian pria', 23, 65000, '64906b16d3901.jpg'),
(23, 'Kaos Sweater Branded Pria', 'pakaian pria', 12, 95500, '64906bbf7fa94.jpg'),
(24, 'Hoodie Mickey Mouse', 'pakaian wanita', 89, 69500, '64906c498e488.jpg'),
(25, 'df sweatshirt unisex THESIGN', 'pakaian pria', 120, 390200, '64906c99d6962.jpg'),
(26, 'Winter Sweater Men Thick Warm', 'pakaian pria', 56, 650500, '649072533bcd9.jpg'),
(27, 'AMBRO06 CASHMERE KNIT SWEATER', 'pakaian pria', 55, 135200, '649072acc9e27.jpg'),
(28, 'CEIL02 CASHMERE SHAWL SWEATER', 'pakaian pria', 88, 110500, '6490730674141.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `no_tlp`, `role`) VALUES
(2, 'ediefanto', '$2y$10$PwdzZAezR56lQi9aFMF61eu/blmJVfuFPph39SrlqkTkrFRro6632', 'Muhammad Ediefanto', 'laki-laki', '2023-06-22', 'Getassrabi', '08977979474', 'admin'),
(4, 'zuliyanto', '$2y$10$HmikJdFMd6pBiayAypxK8.qLj00vzl81sPStriIevHKAW7XGL78QC', 'Muhammad Zuliyanto', 'laki-laki', '2023-06-07', 'Getassrabi Kebangsa', '08977979433', 'user'),
(5, 'dika', '$2y$10$Vx/TYUBr3FUQtdbBEJSxQuxUiGyyN/yqTS1jn/AgTKZG8MSbxGGqC', 'Muhammad Dika Ardianto', 'laki-laki', '2014-02-15', 'Kudus', '089779793456', 'admin'),
(6, 'seliyanursel', '$2y$10$pZDpwZn4UlMXY0mf0IEL2.d8yIICMOgkRWWfv3QVtQ35N6ryD1X4S', 'Seliya Nur Seliya', 'perempuan', '2004-02-20', 'Karanganyar Demak', '089677647373', 'user'),
(7, 'arzak', '$2y$10$mmqFvc/AhVU.mI7g1u2cV.hPRZrVa/riilDnsQWPaLPPTAyZp5okG', 'arzakhidayatullah', 'laki-laki', '2023-06-01', 'Getassrabi', '9876567', 'user'),
(8, 'zulyanto', '$2y$10$uhKzBiIAYJlV53R6glgsCeK/Bhp00oix9y0.LtzWrEX2K7mdvQika', 'muhammad zuliyanto', 'laki-laki', '2023-06-15', 'getassrabi', '34567', 'user'),
(9, 'arzak ganteng', '$2y$10$zVkKjJBE9Ym5Jij7hsLnJu1UYC264hsX9pcWIzMMddyAfh65InkRy', 'arzakkkk', 'laki-laki', '2023-06-12', 'jepara', '2345654', 'user'),
(13, 'admin', '$2y$10$W.TrrhrvpRKI74UfNdPHS.1fwhiYMuLKHd1oArSn/CNfvHLsk2zXq', 'Zuliyanto', 'laki-laki', '2003-05-26', 'getassrabi', '08977979474', 'admin'),
(14, 'user', '$2y$10$AyqjE8yRxBIQzwAzrM190uSj2oaNxPVAuo21oDqPNIVH6RuUxZV5W', 'user', 'laki-laki', '2023-06-01', 'fsdfsfsfsf', '3234234243', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pemesan`
--
ALTER TABLE `detail_pemesan`
  ADD PRIMARY KEY (`id_detail_pemesan`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id_pemesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pemesan`
--
ALTER TABLE `detail_pemesan`
  MODIFY `id_detail_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
