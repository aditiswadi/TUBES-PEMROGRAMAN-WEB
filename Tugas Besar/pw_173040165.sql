-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 12:38 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_173040165`
--

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan_teknologi`
--

CREATE TABLE `perusahaan_teknologi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `penghasilan` varchar(64) NOT NULL,
  `laba` varchar(64) NOT NULL,
  `asset` varchar(64) NOT NULL,
  `karyawan` varchar(64) NOT NULL,
  `kantor` varchar(128) NOT NULL,
  `ceo` varchar(128) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan_teknologi`
--

INSERT INTO `perusahaan_teknologi` (`id`, `nama`, `penghasilan`, `laba`, `asset`, `karyawan`, `kantor`, `ceo`, `gambar`) VALUES
(1, 'Apple Inc', 'US$ 233,715 milyar', 'US$ 53,394 milyar', 'US$ 290,479 milyar', '110.000 orang', 'Cupertino, California, Amerika Serikat', 'Timothy D.Cook', 'apple.jpg'),
(2, 'Samsung Electronics', 'US$ 177,44 milyar', 'US$ 16,532 milyar', 'US$ 206,585 milyar', '319.000 orang', 'Suwon, Korea Selatan', 'Oh-Hyun Kwon', 'samsung.jpg'),
(3, 'Amazon.com', 'US$ 107.006 milyar', 'US$ 596 juta', 'US$ 65,444 milyar', '230.800 orang', 'Seattle, Washington, Amerika Serikat', 'Jeffrey P. Bezos', 'amazon.jpg'),
(4, 'Hon Hai Precision Industry (Foxconn)', 'US$ 141,213 milyar', 'US$ 4,627 juta', 'US$ 70,28 milyar', '1.060.000 orang', 'New Taipei City, Taiwan', 'Terry Gou', 'foxconn.jpg'),
(5, 'HP (Hewlett Packard)', 'US$ 103,335 milyar', 'US$ 4,554 milyar', 'US$ 106,882 milyar', '287.000 orang', 'Palo Alto, California, Amerika Serikat', 'Dion J. Weisler', 'hp.png'),
(6, 'Microsoft', 'US$ 93,58 milyar', 'US$ 12,193 milyar', 'US$ 176,223 milyar', '118.000 orang', 'Redmond, Washington, Amerika Serikat', 'Satya Nadella', 'microsoft.jpg'),
(7, 'IBM', 'US$ 82,461 milyar', 'US$ 13,19 milyar', 'US$ 110,495 orang', '411.798 orang', 'Armonk, New york, Amerika Serikat', 'Virginia M. Rometty', 'ibm.jpg'),
(8, 'Alphabet Inc', 'US$ 74,989 milyar', 'US$ 16,348 milyar', 'US$ 147,461 milyar', 'Mountain View, California, Amerika Serikat', 'Mountain View, California, Amerika Serikat', 'Larry Page', '5afbd7a2c7505.png'),
(9, 'Sony', 'US$ 67,519 milyar', 'US$ 1,231 milyar', 'US$ 148,466 milyar', '125.300 orang', 'Tokyo, Jepang', 'Kazuro Hirai', 'sony.jpg'),
(10, 'Panasonic', 'US$ 62,921 milyar', 'US$ 1,61 milyar', 'US$ 49,804 milyar', '249.520 orang', 'Osaka, Jepang', 'Kazuhiro Tsuga', 'panasonic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$SRklsadnNHJZG.3pc0BgpePOIr8hLqSIfj3yMudQUeJF0cZ8obNUi'),
(4, 'adit', '$2y$10$r6mOahSgcSFsRt96GoJ6jujFzDfk6dDPB6ZfTYAcjdgiIwYMh9DZy'),
(5, 'galih', '$2y$10$MFzT8gy3/PwjHMOv8Ja4RujUGBoUJb2Q/3uygixZySUWGPP5G7.PG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perusahaan_teknologi`
--
ALTER TABLE `perusahaan_teknologi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perusahaan_teknologi`
--
ALTER TABLE `perusahaan_teknologi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
