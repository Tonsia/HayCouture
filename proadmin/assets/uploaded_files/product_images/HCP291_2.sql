-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2022 at 07:30 PM
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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `productid` varchar(50) NOT NULL,
  `size_id` int(20) NOT NULL,
  `color_id` int(20) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `size_id`, `color_id`, `quantity`, `status`) VALUES
(5, '40', 'HCP18', 1, 4, 3, '2'),
(6, '40', 'HCP19', 2, 30, 3, '2'),
(7, '40', 'HCP25', 1, 4, 2, '2'),
(9, '40', 'HCP25', 1, 31, 4, '1'),
(10, '40', 'HCP19', 2, 30, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  `cat_desc` varchar(500) NOT NULL,
  `cat_status` int(2) NOT NULL DEFAULT '1' COMMENT '1=Active\r\n2=Inactive',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`) VALUES
(10, 'Ankle Leggings', 'Ankle leggings are one of the most comfortable items you can wear, but this go-to wardrobe staple has its detractors.', 1),
(11, 'Churidar Leggings', 'Leggings are ultra cozy, they are usually made with a soft polyester material and essentially feels like your wearing pajama.', 1),
(12, 'Kurthi', 'An outfit that has stretched beyond the Indian borders, and has evolved down the ages to suit the ever-changing demands of the fashion forward world.', 1),
(40, 'Capri', 'Capri pants are pants that are longer than shorts, but are not as long as trousers. A cropped slim pants, and also used as a specific term to refer to pants that end on the ankle bone.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `city_name` varchar(60) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `district_id`, `city_name`, `status`) VALUES
(1, 1, 'Changanacherry', 1),
(2, 1, 'Ettumanoor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `color_details`
--

DROP TABLE IF EXISTS `color_details`;
CREATE TABLE IF NOT EXISTS `color_details` (
  `colordetail_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `color_id` int(10) NOT NULL,
  `img1` varchar(100) DEFAULT NULL,
  `img2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`colordetail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color_details`
--

INSERT INTO `color_details` (`colordetail_id`, `product_id`, `color_id`, `img1`, `img2`) VALUES
(174, 'HCP1', 27, 'assets/uploaded_files/product_images/HCP127_1.webp', 'assets/uploaded_files/product_images/HCP127_2.webp'),
(175, 'HPC01', 27, 'assets/uploaded_files/product_images/HPC0127_1.webp', 'assets/uploaded_files/product_images/HPC0127_2.webp'),
(176, 'HCP11', 28, 'assets/uploaded_files/product_images/HCP1128_1.webp', 'assets/uploaded_files/product_images/HCP1128_2.webp'),
(177, 'HCP11', 28, 'assets/uploaded_files/product_images/HCP1128_1.webp', 'assets/uploaded_files/product_images/HCP1128_2.webp'),
(179, 'HCP11', 28, 'assets/uploaded_files/product_images/HCP1128_1.webp', 'assets/uploaded_files/product_images/HCP1128_2.webp'),
(181, 'HCP13', 4, 'assets/uploaded_files/product_images/HCP134_1.webp', 'assets/uploaded_files/product_images/HCP134_2.webp'),
(182, 'HCP14', 28, 'assets/uploaded_files/product_images/HCP1428_1.webp', 'assets/uploaded_files/product_images/HCP1428_2.webp'),
(183, 'HCP14', 28, 'assets/uploaded_files/product_images/HCP1428_1.webp', 'assets/uploaded_files/product_images/HCP1428_2.webp'),
(184, 'HCP14', 4, 'assets/uploaded_files/product_images/HCP144_1.webp', 'assets/uploaded_files/product_images/HCP144_2.webp'),
(186, 'HCP15', 29, 'assets/uploaded_files/product_images/HCP1529_1.webp', 'assets/uploaded_files/product_images/HCP1529_2.webp'),
(187, 'HCP11', 28, 'assets/uploaded_files/product_images/HCP1128_1.webp', 'assets/uploaded_files/product_images/HCP1128_2.webp'),
(188, 'HCP17', 29, 'assets/uploaded_files/product_images/HCP1729_1.webp', 'assets/uploaded_files/product_images/HCP1729_2.webp'),
(189, 'HCP18', 4, 'assets/uploaded_files/product_images/HCP184_1.webp', 'assets/uploaded_files/product_images/HCP184_2.webp'),
(190, 'HCP19', 30, 'assets/uploaded_files/product_images/HCP1930_1.webp', 'assets/uploaded_files/product_images/HCP1930_2.webp'),
(191, 'HCP20', 28, 'assets/uploaded_files/product_images/HCP2028_1.webp', 'assets/uploaded_files/product_images/HCP2028_2.webp'),
(192, 'HCP21', 2, 'assets/uploaded_files/product_images/HCP212_1.webp', 'assets/uploaded_files/product_images/HCP212_2.webp'),
(193, 'HCP22', 1, 'assets/uploaded_files/product_images/HCP221_1.webp', 'assets/uploaded_files/product_images/HCP221_2.webp'),
(194, 'HCP23', 31, 'assets/uploaded_files/product_images/HCP2331_1.webp', 'assets/uploaded_files/product_images/HCP2331_2.webp'),
(195, 'HCP23', 32, 'assets/uploaded_files/product_images/HCP2332_1.webp', 'assets/uploaded_files/product_images/HCP2332_2.webp'),
(196, 'HCP24', 27, 'assets/uploaded_files/product_images/HCP2427_1.webp', 'assets/uploaded_files/product_images/HCP2427_2.webp'),
(197, 'HCP24', 33, 'assets/uploaded_files/product_images/HCP2433_1.webp', 'assets/uploaded_files/product_images/HCP2433_2.webp'),
(198, 'HCP25', 4, 'assets/uploaded_files/product_images/HCP254_1.webp', 'assets/uploaded_files/product_images/HCP254_2.webp'),
(199, 'HCP25', 29, 'assets/uploaded_files/product_images/HCP2529_1.webp', 'assets/uploaded_files/product_images/HCP2529_2.webp'),
(200, 'HCP25', 31, 'assets/uploaded_files/product_images/HCP2531_1.webp', 'assets/uploaded_files/product_images/HCP2531_2.webp'),
(201, 'HCP26', 30, 'assets/uploaded_files/product_images/HCP2630_1.webp', 'assets/uploaded_files/product_images/HCP2630_2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `couponcode` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `minexpense` int(50) NOT NULL,
  `expiredate` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponcode`, `amount`, `minexpense`, `expiredate`, `status`) VALUES
(1, 'SIMPLYSAVES', 1000, 5000, '2022-09-24', 1),
(2, 'SAVEKARO', 100, 500, '2022-09-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(60) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `state_id`, `district_name`, `status`) VALUES
(1, 1, 'Kottayam', 1),
(2, 1, 'Kollam', 1),
(3, 2, 'North Goa', 1),
(4, 2, 'South Goa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(6) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(60) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `product_discount` decimal(8,2) NOT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `product_desc` longtext NOT NULL,
  `product_feat` int(10) NOT NULL,
  `product_selling` int(10) NOT NULL,
  `product_sale` int(10) NOT NULL,
  `product_arrival` int(10) NOT NULL,
  `product_status` int(2) NOT NULL DEFAULT '1' COMMENT '1=active\r\n2=disabled',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `cat_test` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `product_id`, `cat_id`, `product_price`, `product_discount`, `product_total`, `product_desc`, `product_feat`, `product_selling`, `product_sale`, `product_arrival`, `product_status`) VALUES
(10, 'Mojito Ankle', 'HPC01', 10, '550.00', '0.00', '550.00', '<ul>\r\n<li>The Shops and Establishments Act regulates conditions of workaqsd lists rights of employees in the unorganised sector and provides a list of obligations for every employer. It applies nationwide to shops, commercial establishments, hotels, restaurants, eating houses, theatres and other places of public amusement or entertainments. Every shop and establishment is required to register itself under the Act within 30 days of commencement of work, whether or not it has employees.&nbsp;</li>\r\n</ul>', 2, 2, 2, 2, 1),
(16, 'Lemon Yellow Ankle', 'HCP11', 10, '450.00', '0.00', '450.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(17, 'Plum Ankle', 'HCP17', 10, '420.00', '0.00', '420.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 1, 1, 1),
(18, 'Lavender Ankle', 'HCP18', 10, '520.00', '0.00', '520.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(19, 'Bottle Green Ankle', 'HCP19', 10, '450.00', '0.00', '450.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 1, 2, 2, 1),
(20, 'Pista Capri', 'HCP20', 40, '420.00', '0.00', '420.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(21, 'Red Capri', 'HCP21', 40, '500.00', '0.00', '500.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(22, 'Black Capri', 'HCP22', 40, '149.00', '0.00', '149.00', 'Our capri are made to perfection for premium comfort and all day use and made from premium fluid fabrics.\r\n', 1, 2, 2, 2, 1),
(23, 'Leaves and Beyond Kurti', 'HCP23', 12, '900.00', '5.00', '855.00', 'Leaves and Beyond Kurti has boat neck with three-quarter sleeves with front slit\r\nGarment Length 42 inches', 1, 2, 1, 2, 1),
(24, 'Diamonds and Flowers', 'HCP24', 12, '799.00', '0.00', '799.00', 'Diamonds and Flowers Kurti has a boat neck with lace details in neck.\r\nGarment Length 47 inches.', 1, 1, 1, 1, 1),
(25, 'High Twist', 'HCP25', 10, '599.00', '0.00', '599.00', 'Has a round neck with three-quarter sleeves.\r\nLength-42\"\r\nMade of Viscose Material.\r\nMade with LIVA ultrasoft fluid fabric.', 1, 1, 1, 1, 1),
(26, 'Floral', 'HCP26', 11, '599.00', '0.00', '599.00', 'Floral Print Kurthi', 1, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

DROP TABLE IF EXISTS `product_color`;
CREATE TABLE IF NOT EXISTS `product_color` (
  `color_id` int(2) NOT NULL AUTO_INCREMENT,
  `color` varchar(20) NOT NULL,
  `color_code` varchar(8) NOT NULL,
  `color_status` int(2) NOT NULL DEFAULT '1' COMMENT '1-Active\r\n2-Disabled',
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`color_id`, `color`, `color_code`, `color_status`) VALUES
(1, 'Black', '#000000', 1),
(2, 'Red', '#ff0000', 1),
(3, 'Silver', '#C0C0C0', 1),
(4, 'Lavender', '#ee82ee', 1),
(5, 'White', '#FFFFFF', 1),
(33, 'Maroon', '#933939', 1),
(32, 'Orange', '#ee892b', 1),
(31, 'Green', '#0fc24e', 1),
(30, 'Bottle Green', '#1e8311', 1),
(29, 'Purple', '#830b93', 1),
(28, 'Honey', '#d0b60b', 1),
(27, 'Teal', '#42ffc0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

DROP TABLE IF EXISTS `product_size`;
CREATE TABLE IF NOT EXISTS `product_size` (
  `size_id` int(2) NOT NULL AUTO_INCREMENT,
  `size` varchar(6) NOT NULL,
  `size_status` int(2) NOT NULL DEFAULT '1' COMMENT '1-Active\r\n2-Disabled',
  PRIMARY KEY (`size_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`size_id`, `size`, `size_status`) VALUES
(1, 'S', 1),
(2, 'M', 1),
(3, 'XL', 1),
(11, 'XXL', 1),
(14, 'L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(60) NOT NULL,
  `reg_email` varchar(60) NOT NULL,
  `reg_pwd` varchar(60) NOT NULL,
  `reg_mob` varchar(13) NOT NULL,
  `reg_addr` varchar(60) NOT NULL,
  `reg_city` varchar(60) NOT NULL,
  `reg_state` varchar(20) NOT NULL,
  `reg_pin` varchar(6) NOT NULL,
  `reg_district` varchar(20) NOT NULL,
  `reg_role` int(11) NOT NULL DEFAULT '1' COMMENT '1:Customer',
  `reg_status` int(2) NOT NULL DEFAULT '1' COMMENT '1-active\r\n2-disabled',
  PRIMARY KEY (`reg_id`),
  UNIQUE KEY `reg_email` (`reg_email`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_name`, `reg_email`, `reg_pwd`, `reg_mob`, `reg_addr`, `reg_city`, `reg_state`, `reg_pin`, `reg_district`, `reg_role`, `reg_status`) VALUES
(39, 'Ansi', 'thomastonsia@gmail.com', '95578a1e1ac81a967c476ee7f4cd2c4f', '9632587412', 'fg', 'Changanacherry', 'Kerala', '852369', 'Kottayam', 1, 1),
(40, 'Tonsia Treesa', 'tonsiatreesa@gmail.com', '7e3590d68dd10bec6acf72dadcb1f674', '9652365897', 'ABC', 'Changanacherry', 'Kerala', '985632', 'Kottayam', 1, 1),
(23, 'admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', '', '', '', '', '', '', 4, 1),
(41, 'n bnh', 'anitjames@amaljyothi.ac.in', 'bcd530adcab1620d1c412f6c3120c5a6', '9000000000', 'gtft ygfyv y', 'Changanacherry', 'Kerala', '685503', 'Kottayam', 1, 1),
(34, 'Rose Jobi', 'taniarosejobi@mca.ajce.in', '5e52d2e8b761178fe08396796ddf7de4', '9014528745', 'Chirakavayalil H', 'Changanacherry', 'Kerala', '689523', 'Kottayam', 1, 1),
(32, 'Princia Anna', 'tonsiatreesathomas@mca.ajce.in', '066abcf4ee7ee6994c6d89734d123c2b', '9876543210', '123', 'Changanacherry', 'Kerala', '987654', 'Kottayam', 1, 1),
(33, 'Geya Merin', 'geyamerinshibu@mca.ajce.in', '74402061a0bb19e994a86543ccca272d', '9874563214', 'ABC', 'Changanacherry', 'Kerala', '852147', 'Kottayam', 1, 1),
(30, 'Priya Mathew', 'pm@gmail.com', 'd226641a56a8be99bc6ad1cee88a9554', '9874563214', 'XYZ House', 'Changanacherry', 'Kerala', '874521', 'Kottayam', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `size_details`
--

DROP TABLE IF EXISTS `size_details`;
CREATE TABLE IF NOT EXISTS `size_details` (
  `sizedet_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `size_id` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  PRIMARY KEY (`sizedet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_details`
--

INSERT INTO `size_details` (`sizedet_id`, `product_id`, `size_id`, `quantity`) VALUES
(177, 'HCP1', '1', '10'),
(178, 'HCP1', '2', '5'),
(187, 'HCP13', '1', '45452'),
(188, 'HCP14', '1', '20'),
(189, 'HCP14', '1', '5'),
(190, 'HCP14', '1', '2'),
(193, 'HCP15', '1', '2'),
(194, 'HCP15', '1', '5'),
(197, 'HCP17', '1', '2'),
(198, 'HCP18', '1', '10'),
(199, 'HCP19', '2', '15'),
(201, 'HCP21', '1', '10'),
(202, 'HCP22', '1', '50'),
(203, 'HCP23', '1', '20'),
(204, 'HCP24', '2', '15'),
(205, 'HCP24', '3', '2'),
(216, 'HCP20', '1', '10'),
(217, 'HCP20', '2', '15'),
(218, 'HCP25', '2', '20'),
(219, 'HCP25', '1', '10'),
(221, 'HCP11', '3', '20'),
(222, 'HCP11', '2', '10'),
(223, 'HCP11', '1', '45'),
(228, 'HCP26', '1', '10'),
(229, 'HCP26', '2', '15'),
(258, 'HPC01', '1', '10'),
(259, 'HPC01', '2', '15');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `status`) VALUES
(1, 'Kerala', 1),
(2, 'Goa', 1),
(3, 'Karnataka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `reg_id` int(11) DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `reg_id` (`reg_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

DROP TABLE IF EXISTS `useraddress`;
CREATE TABLE IF NOT EXISTS `useraddress` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `regid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `cityid` int(50) NOT NULL,
  `disctrictid` int(50) NOT NULL,
  `stateid` int(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`id`, `regid`, `name`, `mobile`, `hname`, `cityid`, `disctrictid`, `stateid`, `pin`, `status`) VALUES
(1, 40, 'Tonsia Treesa', '8129396333', 'Padinjarekuttu', 1, 1, 1, '265845', 1),
(2, 40, 'Nm NEisl', '9972379812', 'Harry villa', 1, 1, 1, '356343', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cat_test` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
