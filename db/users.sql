-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 05:03 PM
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
(6, 'seliyanursel', '$2y$10$pZDpwZn4UlMXY0mf0IEL2.d8yIICMOgkRWWfv3QVtQ35N6ryD1X4S', 'Seliya Nur Seliya', 'perempuan', '2004-02-20', 'Karanganyar Demak', '089677647373', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
