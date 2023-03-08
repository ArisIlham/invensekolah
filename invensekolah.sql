-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 04:32 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invensekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `no` int(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `no_barang` varchar(25) NOT NULL,
  `jml_barang` int(25) NOT NULL,
  `st_barang` varchar(255) NOT NULL,
  `gmb_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no`, `nama_barang`, `no_barang`, `jml_barang`, `st_barang`, `gmb_barang`) VALUES
(1, 'balabala', '1001', 21, '', 'http://localhost:8080/invensekolah/Upload/balabala_logoku.Png'),
(2, 'gehu', '1002', 22, '', 'http://localhost:8080/invensekolah/Upload/gehu_logoku.Png'),
(3, 'tempe', '1003', 4, 'Ruangan dan Alat', 'http://localhost:8080/invensekolah/upload/tempe_logoku.Png'),
(4, 'ffffff', '1004', 4, 'Sarana Lab Kimia/Fisika', 'http://localhost:8080/invensekolah/upload/ffffff_logoku.Png'),
(5, 'adnab', '1006', 90, 'Sarana Olahraga', 'http://localhost:8080/invensekolah/upload/adnab_logoku.Png'),
(6, 'wjqwhh', '289', 990, 'Sarana Olahraga', 'http://localhost:8080/invensekolah/upload/wjqwhh_logoku.Png'),
(7, 'balabala', '789', 89, 'Sarana Komputer', ''),
(8, 'tempe', '678', 8, 'Ruangan dan Alat', 'http://localhost:8080/invensekolah/upload/tempe'),
(9, 'balabala', '67', 67, 'Ruangan dan Alat', ''),
(10, 'gehu', '789', 789, 'Sarana Komputer', ''),
(11, 'balabala', '89', 98, 'Ruangan dan Alat', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `no` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
