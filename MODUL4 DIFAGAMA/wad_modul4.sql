-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 09:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_modul4`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `nama_barang`, `harga`) VALUES
(220822884, 216191421, 'COSRX BHA Blackhead Power Liquid 100mL', 325489),
(220845576, 216191421, 'COSRX H/CENTELLA AQUA SOOTH AMPOULE 40ML', 404000),
(220846578, 216191421, 'COSRX BHA Blackhead Power Liquid 100mL', 325489),
(220846828, 216191421, 'COSRX H/CENTELLA AQUA SOOTH AMPOULE 40ML', 404000),
(220847307, 216191421, 'COSRX Low pH Good Morning Gel Cleanser 150ml', 126899),
(220849135, 212151422, 'COSRX BHA Blackhead Power Liquid 100mL', 325489),
(220849191, 212151422, 'COSRX H/CENTELLA AQUA SOOTH AMPOULE 40ML', 404000),
(220849340, 212151422, 'COSRX Low pH Good Morning Gel Cleanser 150ml', 126899),
(220850399, 212151422, 'COSRX BHA Blackhead Power Liquid 100mL', 325489),
(220850685, 212151422, 'COSRX Low pH Good Morning Gel Cleanser 150ml', 126899);

-- --------------------------------------------------------

--
-- Table structure for table `prod_catalog`
--

CREATE TABLE `prod_catalog` (
  `nama_brg` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_brg` int(255) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prod_catalog`
--

INSERT INTO `prod_catalog` (`nama_brg`, `deskripsi`, `harga_brg`, `gambar`) VALUES
('COSRX BHA Blackhead Power Liquid 100mL', 'Congested pores, be gone!\r\nEffectively penetrates into the skin and cleans up clogged pores.\r\nAlso helps skin to rebuild its moisture shield.', 325489, 'https://beureka.com/wp-content/uploads/2017/04/COSRX-BHA-Blackhead-Power-Liquid-100ml.jpg'),
('COSRX H/CENTELLA AQUA SOOTH AMPOULE 40ML', 'Pure hydration without any irritation!\r\nA lightweight, fast-absorbing ampoule that delivers immediate, pure hydration even for angry, red acne skin.', 404000, 'https://quickbutik.imgix.net/7684x/products/5d06e7f130554.png'),
('COSRX Low pH Good Morning Gel Cleanser 150ml', 'Have a good morning! Have a good skin!\r\nGentle gel type cleanser with midly acidic pH level', 126899, 'https://fivezero.files.wordpress.com/2017/06/cosrx-low-ph-good-morning-gel-cleanser-00w.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` bigint(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_hp`, `password`) VALUES
(212151422, 'sanny devert', 'dsaneey@gmail.com', 83242425, '$2y$10$poTnbgx8DA/WGbBJTg5VRO0LeYEiDaHBElc3uXV3mcrlqH/q/0kOS'),
(216191421, 'max high', 'maxxco@gmail.com', 83555555555, '$2y$10$mb4Rr0pCcXyw/AnHqvhbWuEqj3PtIUheFhW0CCdj8mm/5PYqzQ8r.'),
(217671418, 'sally ice', 'skukss@gmail.com', 0, '$2y$10$HeT3gk4XpTebZtBHdgBrvunMkbm57U7tjlMEUSVTrVHvQLAyl.33i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `prod_catalog`
--
ALTER TABLE `prod_catalog`
  ADD PRIMARY KEY (`nama_brg`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
