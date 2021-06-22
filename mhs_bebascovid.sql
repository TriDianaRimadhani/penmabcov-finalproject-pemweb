-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 09:37 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhs_bebascovid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `user_name`, `password`) VALUES
(1, 'admin1', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bebascov`
--

CREATE TABLE `tb_bebascov` (
  `id_bebascov` int(50) NOT NULL,
  `jurusan_bebascov` varchar(100) NOT NULL,
  `kategori_bebascov` varchar(100) NOT NULL,
  `file_bebascov` varchar(500) NOT NULL,
  `id_mhs` int(100) NOT NULL,
  `id_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id_data` int(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `domisili` varchar(100) NOT NULL,
  `riwayat_cov` varchar(50) NOT NULL,
  `kontak_cov` varchar(50) NOT NULL,
  `riwayat_vaksin` varchar(50) NOT NULL,
  `kesediaan_kuliah` varchar(50) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_mhs` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id_data`, `alamat`, `domisili`, `riwayat_cov`, `kontak_cov`, `riwayat_vaksin`, `kesediaan_kuliah`, `id_admin`, `id_mhs`) VALUES
(1, 'Kab. Gresik, Jawa Timur', 'Gresik', 'Belum', 'Belum', 'Belum', 'Bersedia', 1, 2),
(2, 'Ds. Maju, Kec. Bangkit, Kab. Lamongan , Jawa Timur', 'Lamongan', 'Belum', 'Belum', 'Belum', 'Bersedia', 1, 1),
(3, 'Kel. Blauran, Surabaya, Jawa Timur', 'Surabaya', 'Belum', 'Belum', 'Belum', 'Tidak', 1, 4),
(4, 'Kec. Patihan, Kab. Tuban, Jawa Timur', 'Tuban', 'Belum', 'Belum', 'Belum', 'Bersedia', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketsehat`
--

CREATE TABLE `tb_ketsehat` (
  `id_ketsehat` int(5) NOT NULL,
  `jurusan_ketsehat` varchar(100) NOT NULL,
  `kategori_ketsehat` varchar(100) NOT NULL,
  `file_ketsehat` varchar(500) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `id_mhs` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(11) NOT NULL,
  `npm_mhs` varchar(100) DEFAULT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `password_mhs` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `status_ver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `npm_mhs`, `nama_mhs`, `password_mhs`, `email`, `jurusan`, `fakultas`, `status_ver`) VALUES
(1, '202099837748', 'Rynata', '5678', 'rynata02@student.id', 'Sistem Informasi', 'Ilmu Komputer', 'Belum diverifikasi'),
(2, '202034775900', 'Agung Lukman', '1234', 'agungluk@student.id', 'Teknik Lingkungan', 'Teknik', 'Belum diverifikasi'),
(3, '202035876978', 'Anariksa Dika', '2345', 'anariksadika@student.id', 'Teknologi Pangan', 'Teknik', 'Diverifikasi'),
(4, '202036782890', 'Kinira Gusti', '3456', 'kinira@student.id', 'Ilmu Komunikasi', 'Ilmu Sosial dan Politik', 'Kuliah tatap muka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bebascov`
--
ALTER TABLE `tb_bebascov`
  ADD PRIMARY KEY (`id_bebascov`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `tb_ketsehat`
--
ALTER TABLE `tb_ketsehat`
  ADD PRIMARY KEY (`id_ketsehat`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id_data` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bebascov`
--
ALTER TABLE `tb_bebascov`
  ADD CONSTRAINT `tb_bebascov_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  ADD CONSTRAINT `tb_bebascov_ibfk_3` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`id_mhs`);

--
-- Constraints for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD CONSTRAINT `tb_data_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  ADD CONSTRAINT `tb_data_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`id_mhs`);

--
-- Constraints for table `tb_ketsehat`
--
ALTER TABLE `tb_ketsehat`
  ADD CONSTRAINT `tb_ketsehat_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  ADD CONSTRAINT `tb_ketsehat_ibfk_3` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mhs` (`id_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
