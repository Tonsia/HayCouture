-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2022 at 06:53 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haycouture`
--

-- --------------------------------------------------------

--
-- Table structure for table `fabric`
--

DROP TABLE IF EXISTS `fabric`;
CREATE TABLE IF NOT EXISTS `fabric` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fabric_name` varchar(50) NOT NULL,
  `fabric_path` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabric`
--

INSERT INTO `fabric` (`id`, `fabric_name`, `fabric_path`, `status`) VALUES
(1, 'color1', 'fabric/1932_huge.jpg', '1'),
(2, 'color2', 'fabric/1933_huge.jpg', '1'),
(3, 'color3', 'fabric/1934_huge.jpg', '1'),
(4, 'color4', 'fabric/1935_huge.jpg', '1'),
(5, 'color5', 'fabric/2037_huge.jpg', '1'),
(6, 'color6', 'fabric/2044_huge.jpg', '1'),
(7, 'color7', 'fabric/2076_huge.jpg', '1'),
(8, 'color8', 'fabric/2123_huge.jpg', '1'),
(9, 'color9', 'fabric/2125_huge.jpg', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
