-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2022 at 11:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harapansehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `nama_pasien`, `usia`, `keluhan`, `jenis_kelamin`, `tanggal_lahir`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 'asd'),
(2, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id_histori` int(11) NOT NULL,
  `id_antrian` int(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_histori`, `id_antrian`, `nama_pasien`, `usia`, `keluhan`, `jenis_kelamin`, `tanggal_lahir`) VALUES
(1, 2, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(2, 0, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(3, 3, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(4, 3, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(5, 3, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(6, 3, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd'),
(7, 3, 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `kondisikesehatan`
--

CREATE TABLE `kondisikesehatan` (
  `id_kondisikesehatan` int(11) NOT NULL,
  `berat_badan` varchar(255) NOT NULL,
  `tinggi_badan` varchar(255) NOT NULL,
  `tekanan_darah` varchar(255) NOT NULL,
  `mata_minus` varchar(255) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `alamat`, `no_hp`) VALUES
(1, 'riki@gmail.com', 'riki', '$2y$10$oVhd70dHgXE.zM2uiAW1ZuF9zo3Z21/v/kFAV7NBNZouV3iYDqa2.', 'Baleendah', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `kondisikesehatan`
--
ALTER TABLE `kondisikesehatan`
  ADD PRIMARY KEY (`id_kondisikesehatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kondisikesehatan`
--
ALTER TABLE `kondisikesehatan`
  MODIFY `id_kondisikesehatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
