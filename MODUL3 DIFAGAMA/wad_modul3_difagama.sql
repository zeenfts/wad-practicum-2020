-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 12:45 PM
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
-- Database: `wad_modul3_difagama`
--

-- --------------------------------------------------------

--
-- Table structure for table `events_tb`
--

CREATE TABLE `events_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `benefit` varchar(200) DEFAULT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_tb`
--

INSERT INTO `events_tb` (`id`, `name`, `deskripsi`, `gambar`, `kategori`, `tanggal`, `mulai`, `berakhir`, `tempat`, `benefit`, `harga`) VALUES
(151264527, 'AI Entrepreneur Summit 2020', 'Hadir kembali secara ekslusif pada tahun ini mengambil tema \"Innovation for Future Unknown\" bagi anda seorang Entrepreneur yang berkecimpung dengan AI maupun yang baru akan memulainya. Kegiatan ini terbuka bagi semua tingkatan member! Acara ini adalah yang terbesar dan hanya diadakan setiap ada revolusi terbaru yang mendadak!!', 'chuttersnap-Q_KdjKxntH8-unsplash.jpg', 'Online', '2021-03-15', '06:27:00', '23:04:00', 'Microsoft Teams', 'Nothing', 35000),
(151285621, 'Food Review Consultation (Michelin Star)', 'Belajar langsung dari expert berbasis Michelin Star. Jangan sia-siakan kesempatan ini. Anda akan tahu restoran seperti apa yang benar-benar berkualitas.', 'chuttersnap-aEnH4hJ_Mrs-unsplash.jpg', 'Offline', '2021-02-09', '07:21:00', '16:21:00', 'Restoran M', 'Snacks, Sertifikat', 47900),
(151296816, 'Openmind Junior Astronaut sedunia v3.1', 'Pertemuan pertama para freshgraduate calon astronaut dari segala penjuru dunia', 'possessed-photography-JjGXjESMxOY-unsplash.jpg', 'Online', '2020-11-30', '08:15:00', '22:15:00', 'Zoom Meeting', 'Sertifikat, Souvenir', 0),
(151296918, 'Data Science Applied in Drone Industry', 'Tren yang sedang meningkat saat ini. Apa jadinya jika Ia ada pada drone??', 'possessed-photography-Oqho9QTkBfw-unsplash.jpg', 'Online', '2020-12-18', '07:18:00', '13:18:00', 'Google Meet', 'Sertifikat, Souvenir', 210039);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events_tb`
--
ALTER TABLE `events_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events_tb`
--
ALTER TABLE `events_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
