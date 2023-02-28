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
-- Table structure for table `customorder`
--

DROP TABLE IF EXISTS `customorder`;
CREATE TABLE IF NOT EXISTS `customorder` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `tcolor` varchar(100) NOT NULL,
  `bcolor` varchar(100) NOT NULL,
  `neckline` varchar(100) NOT NULL,
  `sleeve` varchar(100) NOT NULL,
  `bottom` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customorder`
--

INSERT INTO `customorder` (`id`, `userid`, `tcolor`, `bcolor`, `neckline`, `sleeve`, `bottom`, `status`) VALUES
(3, '40', 'fabric/1933_huge.jpg', 'fabric/1933_huge.jpg', 'neck-u_neck', 'sleev-short', 'bott-flared', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
