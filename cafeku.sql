-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2026 at 11:41 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafeku`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nohp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ctm` datetime DEFAULT CURRENT_TIMESTAMP,
  `mtm` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `dtm` datetime DEFAULT NULL,
  `del` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `alamat`, `nohp`, `ctm`, `mtm`, `dtm`, `del`) VALUES
(1, 'Deni', 'userdeni', 'passdeni', 'Gang Harapan', '0812121132122', '2026-09-09 18:57:51', '2026-09-23 10:28:07', NULL, 0),
(2, 'Martin', 'usermartin', 'passmartin', 'Gang Harapan', '0812121132332', '2026-09-09 18:57:51', '2026-09-23 10:28:37', NULL, 0),
(3, 'Jason', 'userjason', 'passjason', 'Gang Bersama', '0829928899', '2026-09-23 09:16:43', '2026-09-23 10:58:17', '2026-09-23 10:58:17', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
