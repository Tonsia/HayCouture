-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2023 at 06:21 AM
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
  `status` varchar(50) NOT NULL COMMENT '2=Pending                                            3=Processing\r\n4=Shipped\r\n5=Delivered\r\n6=Rejected\r\n9=Returned',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `size_id`, `color_id`, `quantity`, `status`) VALUES
(5, '40', 'HCP18', 1, 4, 3, '2'),
(6, '40', 'HCP19', 2, 30, 3, '9'),
(7, '40', 'HCP25', 1, 4, 2, '2'),
(9, '40', 'HCP25', 1, 31, 5, '4'),
(10, '40', 'HCP19', 2, 30, 3, '9'),
(11, '40', 'HCP25', 2, 29, 4, '3'),
(12, '40', 'HCP25', 1, 4, 6, '5'),
(13, '40', 'HCP25', 2, 29, 4, '5'),
(14, '40', 'HCP22', 1, 1, 5, '5'),
(15, '40', 'HCP23', 1, 32, 2, '5'),
(16, '40', 'HCP23', 1, 32, 1, '9'),
(17, '40', 'HCP23', 1, 31, 1, '5'),
(18, '40', 'HCP23', 1, 32, 1, '9'),
(19, '40', 'HCP23', 1, 31, 3, '3'),
(20, '40', 'HCP23', 1, 31, 1, '5'),
(21, '40', 'HCP23', 1, 31, 1, '2'),
(22, '40', 'HCP23', 1, 31, 1, '9'),
(23, '40', 'HCP23', 1, 31, 2, '5'),
(24, '40', 'HCP23', 1, 32, 10, '9'),
(25, '40', 'HCP24', 2, 33, 3, '9'),
(26, '40', 'HCP23', 1, 32, -1, '9'),
(27, '40', 'HCP23', 1, 31, -2, '9'),
(28, '40', 'HCP23', 1, 32, 1, '9'),
(29, '32', 'HCP23', 1, 31, 1, '2'),
(30, '32', 'HCP23', 1, 31, 1, '2'),
(31, '32', 'HCP11', 1, 28, 1, '1'),
(32, '40', 'HCP23', 1, 31, 4, '9'),
(33, '40', 'HCP26', 2, 30, 1, '2'),
(34, '40', 'HCP23', 1, 32, -1, '2'),
(41, '44', 'HCP21', 1, 2, 2, '5'),
(40, '44', 'HCP24', 3, 33, 1, '3'),
(44, '40', 'HCP23', 1, 32, 2, '2'),
(43, '44', 'HCP17', 1, 29, 2, '1'),
(45, '40', 'HCP24', 3, 33, 3, '2'),
(51, '40', 'HCP25', 2, 4, 3, '2'),
(49, '40', 'HCP21', 1, 2, 3, '2'),
(50, '40', 'HCP24', 2, 33, 2, '2'),
(52, '40', 'HCP25', 1, 29, 4, '2'),
(53, '40', 'HCP18', 1, 4, 2, '2'),
(54, '40', 'HCP18', 1, 4, 4, '2'),
(55, '40', 'HCP18', 1, 4, 6, '2'),
(56, '45', 'HCP18', 1, 4, 1, '2'),
(57, '40', 'HCP23', 1, 32, 5, '2'),
(58, '40', 'HCP19', 2, 30, 4, '2'),
(59, '40', 'HPC01', 2, 27, 4, '2'),
(60, '40', 'HCP19', 2, 30, 4, '2'),
(61, '40', 'HPC01', 2, 27, 3, '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color_details`
--

INSERT INTO `color_details` (`colordetail_id`, `product_id`, `color_id`, `img1`, `img2`) VALUES
(175, 'HPC01', 27, 'assets/uploaded_files/product_images/HPC0127_1.webp', 'assets/uploaded_files/product_images/HPC0127_2.webp'),
(188, 'HCP17', 29, 'assets/uploaded_files/product_images/HCP1729_1.webp', 'assets/uploaded_files/product_images/HCP1729_2.webp'),
(189, 'HCP18', 4, 'assets/uploaded_files/product_images/HCP184_1.webp', 'assets/uploaded_files/product_images/HCP184_2.webp'),
(190, 'HCP19', 30, 'assets/uploaded_files/product_images/HCP1930_1.webp', 'assets/uploaded_files/product_images/HCP1930_2.webp'),
(191, 'HCP20', 28, 'assets/uploaded_files/product_images/HCP2028_1.webp', 'assets/uploaded_files/product_images/HCP2028_2.webp'),
(192, 'HCP21', 2, 'assets/uploaded_files/product_images/HCP212_1.webp', 'assets/uploaded_files/product_images/HCP212_2.webp'),
(193, 'HCP22', 1, 'assets/uploaded_files/product_images/HCP221_1.webp', 'assets/uploaded_files/product_images/HCP221_2.webp'),
(195, 'HCP23', 32, 'assets/uploaded_files/product_images/HCP2332_1.webp', 'assets/uploaded_files/product_images/HCP2332_2.webp'),
(196, 'HCP24', 27, 'assets/uploaded_files/product_images/HCP2427_1.webp', 'assets/uploaded_files/product_images/HCP2427_2.webp'),
(197, 'HCP24', 33, 'assets/uploaded_files/product_images/HCP2433_1.webp', 'assets/uploaded_files/product_images/HCP2433_2.webp'),
(198, 'HCP25', 4, 'assets/uploaded_files/product_images/HCP254_1.webp', 'assets/uploaded_files/product_images/HCP254_2.webp'),
(199, 'HCP25', 29, 'assets/uploaded_files/product_images/HCP2529_1.webp', 'assets/uploaded_files/product_images/HCP2529_2.webp'),
(200, 'HCP25', 31, 'assets/uploaded_files/product_images/HCP2531_1.webp', 'assets/uploaded_files/product_images/HCP2531_2.webp'),
(201, 'HCP26', 30, 'assets/uploaded_files/product_images/HCP2630_1.webp', 'assets/uploaded_files/product_images/HCP2630_2.webp'),
(202, 'HCP27', 33, 'assets/uploaded_files/product_images/HCP2733_1.webp', 'assets/uploaded_files/product_images/HCP2733_2.webp'),
(215, 'HCP30', 40, 'assets/uploaded_files/product_images/HCP3040_1.webp', 'assets/uploaded_files/product_images/HCP3040_2.webp');

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `couponcode`, `amount`, `minexpense`, `expiredate`, `status`) VALUES
(1, 'SIMPLYSAVES', 1000, 5000, '2023-02-02', 1),
(2, 'SAVEKARO', 100, 1000, '2023-07-07', 1),
(8, 'WELCOME50', 50, 800, '2023-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customorder`
--

DROP TABLE IF EXISTS `customorder`;
CREATE TABLE IF NOT EXISTS `customorder` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `tcolor` varchar(100) NOT NULL,
  `bcolor` varchar(100) NOT NULL,
  `neckline` varchar(100) NOT NULL,
  `sleeve` varchar(100) NOT NULL,
  `bottom` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `paymentid` varchar(200) NOT NULL DEFAULT 'Pending',
  `status` varchar(50) NOT NULL COMMENT '2=Pending                                            3=Processing\r\n4=Shipped\r\n5=Delivered\r\n6=Rejected\r\n9=Returned',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customorder`
--

INSERT INTO `customorder` (`id`, `userid`, `uniqueid`, `tcolor`, `bcolor`, `neckline`, `sleeve`, `bottom`, `size`, `amount`, `paymentid`, `status`, `created`) VALUES
(14, '40', '1666694915', 'fabric/2044_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-short', 'bott-flared', 'S', 1000, 'pay_KXye2HjKU4UoWz', '5', '2022-10-25 11:40:24'),
(24, '40', '1667208062', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'L', 1400, 'Pending', '1', '2022-10-31 09:21:02'),
(23, '40', '1667208030', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'L', 1400, 'Pending', '1', '2022-10-31 09:20:30'),
(11, '40', '1666693581', 'fabric/2044_huge.jpg', 'fabric/2125_huge.jpg', 'neck-u_neck', 'sleev-short', 'bott-flared', 'M', 1200, 'pay_KXyGaGr5GGYp6A', '4', '2022-10-25 11:40:24'),
(22, '40', '1667207964', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'L', 1400, 'Pending', '1', '2022-10-31 09:19:24'),
(21, '40', '1666778146', 'fabric/2037_huge.jpg', 'fabric/2076_huge.jpg', 'neck-v_neck', 'sleev-3_4', 'bott-pencil', 'M', 1200, 'Pending', '1', '2022-10-26 09:55:46'),
(20, '40', '1666778004', 'fabric/2076_huge.jpg', 'fabric/2123_huge.jpg', 'neck-u_neck', 'sleev-3_4', 'bott-pencil', 'M', 1200, 'pay_KYMHWHxHJcY1Sq', '2', '2022-10-26 09:53:24'),
(25, '40', '1667208099', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:21:39'),
(26, '40', '1667208135', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:22:15'),
(27, '40', '1667208173', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:22:53'),
(28, '40', '1667208198', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:23:18'),
(29, '40', '1667208266', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:24:26'),
(30, '40', '1667208300', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:25:00'),
(31, '40', '1667208328', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:25:28'),
(32, '40', '1667208544', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-boat', 'sleev-cap', 'bott-a_line', 'XL', 1600, 'Pending', '1', '2022-10-31 09:29:04'),
(33, '40', '1675145434', 'fabric/2076_huge.jpg', 'fabric/2123_huge.jpg', 'neck-v_neck', 'sleev-without', 'bott-pencil', 'L', 1400, 'pay_LAgIvsaqpbwtL6', '5', '2023-01-31 06:10:34'),
(34, '40', '1675319547', 'fabric/2044_huge.jpg', 'fabric/2044_huge.jpg', 'neck-crew', 'sleev-cap', 'bott-a_line', 'L', 1400, 'pay_LBTi1IMpjaLkaY', '2', '2023-02-02 06:32:27'),
(35, '40', '1675319891', 'fabric/2037_huge.jpg', 'fabric/2044_huge.jpg', 'neck-crew', 'sleev-3_4', 'bott-flared', 'XL', 1600, 'pay_LBTnpids2G0UqH', '2', '2023-02-02 06:38:11'),
(36, '40', '1675320546', 'fabric/2125_huge.jpg', 'fabric/2123_huge.jpg', 'neck-boat', 'sleev-long', 'bott-a_line', '2XL', 2000, 'pay_LBTzO9iaBqKXyf', '2', '2023-02-02 06:49:06');

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
(3, 1, 'Pathanamthitta', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `cartid` varchar(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `paymentid` varchar(50) NOT NULL,
  `totalamt` double NOT NULL,
  `addressid` int(50) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cartid`, `userid`, `paymentid`, `totalamt`, `addressid`, `createdtime`, `status`) VALUES
(1, '9', 40, 'pay_KHPVui9nkob2Eo', 2995, 1, '2022-09-13 14:02:53', '1'),
(17, '53', 40, 'pay_LDWo7uT4kWjn9f', 1040, 1, '2023-02-07 10:52:50', '1'),
(18, '54', 40, 'pay_LDWqbhJvEvrxcl', 2080, 1, '2023-02-07 10:55:11', '1'),
(16, '45', 40, 'pay_KYME1XbkXZtuUP', 2397, 1, '2022-10-26 09:50:21', '1'),
(12, '28', 40, 'pay_KIVnv68xsJWsZo', 900, 1, '2022-09-16 08:48:42', '1'),
(13, '41', 44, 'pay_KYG9MNGEXGeViB', 1000, 1, '2022-10-26 03:53:47', '1'),
(15, '44', 40, 'pay_KYME1XbkXZtuUP', 1800, 1, '2022-10-26 09:50:21', '1'),
(19, '55', 40, 'pay_LFEL3eX5Icubei', 3120, 1, '2023-02-11 18:07:02', '1'),
(20, '57', 40, 'pay_LGkHT00uFYHvCD', 4500, 1, '2023-02-15 14:01:00', '1'),
(21, '59', 40, 'pay_LGm1PCNWqoeKGw', 2200, 2, '2023-02-15 15:43:11', '1'),
(22, '60', 40, 'pay_LGmY07LeWrLwUk', 1818, 2, '2023-02-15 16:14:01', '1'),
(23, '61', 40, 'pay_LGpBI10TyUv9ae', 1667, 2, '2023-02-15 18:48:37', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `product_id`, `cat_id`, `product_price`, `product_discount`, `product_total`, `product_desc`, `product_feat`, `product_selling`, `product_sale`, `product_arrival`, `product_status`) VALUES
(10, 'Mojito Ankle', 'HPC01', 10, '550.00', '0.00', '550.00', '<ul>\r\n<li>The Shops and Establishments Act regulates conditions of workaqsd lists rights of employees in the unorganised sector and provides a list of obligations for every employer. It applies nationwide to shops, commercial establishments, hotels, restaurants, eating houses, theatres and other places of public amusement or entertainments. Every shop and establishment is required to register itself under the Act within 30 days of commencement of work, whether or not it has employees.&nbsp;</li>\r\n</ul>', 2, 2, 2, 2, 1),
(17, 'Plum Ankle', 'HCP17', 10, '420.00', '0.00', '420.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 1, 1, 1),
(18, 'Lavender Ankle', 'HCP18', 10, '520.00', '0.00', '520.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(19, 'Bottle Green Ankle', 'HCP19', 10, '450.00', '0.00', '450.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 1, 2, 2, 1),
(20, 'Pista Capri', 'HCP20', 40, '420.00', '0.00', '420.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(21, 'Red Capri', 'HCP21', 40, '500.00', '0.00', '500.00', 'Style yourself with these ankle length leggings from HAY!. These leggings are the perfect blend of style and comfort and come in radiant colours that match perfectly with our kurtas.', 1, 2, 2, 2, 1),
(22, 'Black Capri', 'HCP22', 40, '149.00', '0.00', '149.00', 'Our capri are made to perfection for premium comfort and all day use and made from premium fluid fabrics.\r\n', 1, 2, 2, 2, 1),
(23, 'Leaves and Beyond Kurti', 'HCP23', 10, '900.00', '5.00', '855.00', '<p>Leaves and Beyond Kurti has boat neck with three-quarter sleeves with front slit Garment Length 42 inches</p>', 1, 2, 1, 2, 1),
(24, 'Diamonds and Flowers', 'HCP24', 12, '799.00', '0.00', '799.00', 'Diamonds and Flowers Kurti has a boat neck with lace details in neck.\r\nGarment Length 47 inches.', 1, 1, 1, 1, 1),
(25, 'High Twist', 'HCP25', 10, '599.00', '0.00', '599.00', 'Has a round neck with three-quarter sleeves.\r\nLength-42\"\r\nMade of Viscose Material.\r\nMade with LIVA ultrasoft fluid fabric.', 1, 1, 1, 1, 1),
(26, 'Floral', 'HCP26', 10, '599.00', '0.00', '599.00', '<p>Floral Print Kurthi</p>', 1, 1, 2, 2, 1),
(28, 'Kalamkari', 'HCP27', 12, '980.00', '10.00', '882.00', '<p>ABCDEFGH</p>', 1, 2, 2, 2, 1),
(30, 'Inkblue Ankle', 'HCP30', 10, '414.00', '0.00', '414.00', '<p>Nice One</p>', 1, 1, 1, 2, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
(27, 'Teal', '#42ffc0', 1),
(39, 'Reddish Browns', '#8a0000', 2),
(40, 'Blue', '#1c01a2', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_name`, `reg_email`, `reg_pwd`, `reg_mob`, `reg_addr`, `reg_city`, `reg_state`, `reg_pin`, `reg_district`, `reg_role`, `reg_status`) VALUES
(39, 'Ansi', 'thomastonsia@gmail.com', '95578a1e1ac81a967c476ee7f4cd2c4f', '9632587412', 'fg', 'Changanacherry', 'Kerala', '852369', 'Kottayam', 1, 1),
(40, 'Tonsia Treesa', 'tonsiatreesa@gmail.com', 'e4c31793c7f3a8a356804fc0c90e57c5', '9061274835', 'Nest Homes', 'Changanacherry', 'Kerala', '686535', 'Kottayam', 1, 1),
(23, 'admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', '', '', '', '', '', '', 4, 1),
(41, 'n bnh', 'anitjames@amaljyothi.ac.in', 'bcd530adcab1620d1c412f6c3120c5a6', '9000000000', 'gtft ygfyv y', 'Changanacherry', 'Kerala', '685503', 'Kottayam', 1, 1),
(34, 'Rose Jobi', 'taniarosejobi@mca.ajce.in', '5e52d2e8b761178fe08396796ddf7de4', '9014528745', 'Chirakavayalil H', 'Changanacherry', 'Kerala', '689523', 'Kottayam', 1, 1),
(33, 'Geya Merin', 'geyamerinshibu@mca.ajce.in', '74402061a0bb19e994a86543ccca272d', '9874563214', 'ABC', 'Changanacherry', 'Kerala', '852147', 'Kottayam', 1, 2),
(30, 'Priya Mathew', 'pm@gmail.com', 'd226641a56a8be99bc6ad1cee88a9554', '9874563214', 'XYZ House', 'Changanacherry', 'Kerala', '874521', 'Kottayam', 1, 2),
(42, 'Designer', 'designer@gmail.com', '83dffbf894f849e7975a69a2c24aca8b', '', '', '', '', '', '', 3, 1),
(43, 'Moderator', 'moderator@gmail.com', 'fd5d7b6839f2810ef7b3f55ec8b7c20e', '', '', '', '', '', '', 2, 1),
(44, 'Aleena Mathew', 'aleenamathew177@gmail.com', '6f81983f49fde18415d6e74daa744911', '9061274835', 'Lee Villa', 'Ettumanoor', 'Kerala', '685232', 'Kottayam', 1, 1),
(45, 'NMs', 'markzeblow@gmail.com', '066abcf4ee7ee6994c6d89734d123c2b', '8129396266', 'KP House', 'Changanacherry', 'Kerala', '691585', 'Kottayam', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `remember_tokens`
--

DROP TABLE IF EXISTS `remember_tokens`;
CREATE TABLE IF NOT EXISTS `remember_tokens` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `productid` varchar(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `ratingscore` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ratingdesc` longtext NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `productid`, `userid`, `ratingscore`, `title`, `ratingdesc`, `created`, `review_status`) VALUES
(3, 'HCP19', '40', '5', 'Nice Product', 'Good One', '2022-10-24 12:05:24', 1),
(4, 'HCP25', '40', '4', 'NIce', 'Good Quality', '2022-10-24 15:07:38', 2),
(5, 'HCP23', '40', '2', 'Hi', 'hELLOO\n', '2022-10-24 19:53:09', 2),
(6, 'HCP23', '40', '5', 'Great', 'Nice\n', '2022-10-24 19:53:56', 1),
(7, 'HCP21', '44', '4', 'Nice', 'Great Material', '2022-10-26 09:26:28', 1),
(8, 'HCP21', '44', '5', 'good', 'excellent', '2022-10-26 09:37:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sgst`
--

DROP TABLE IF EXISTS `sgst`;
CREATE TABLE IF NOT EXISTS `sgst` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `state_id` int(50) NOT NULL,
  `taxpercent` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `state_id` (`state_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgst`
--

INSERT INTO `sgst` (`id`, `state_id`, `taxpercent`, `status`) VALUES
(1, 2, 17, 1),
(2, 1, 1, 1),
(4, 3, 18, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size_details`
--

INSERT INTO `size_details` (`sizedet_id`, `product_id`, `size_id`, `quantity`) VALUES
(197, 'HCP17', '1', '2'),
(198, 'HCP18', '1', '6'),
(199, 'HCP19', '2', '7'),
(201, 'HCP21', '1', '10'),
(202, 'HCP22', '1', '50'),
(204, 'HCP24', '2', '15'),
(205, 'HCP24', '3', '4'),
(216, 'HCP20', '1', '10'),
(217, 'HCP20', '2', '15'),
(218, 'HCP25', '2', '177'),
(219, 'HCP25', '1', '10'),
(272, 'HCP23', '1', '15'),
(274, 'HPC01', '1', '10'),
(275, 'HPC01', '2', '8'),
(279, 'HCP27', '2', '20'),
(280, 'HCP27', '1', '15'),
(283, 'HCP26', '1', '10'),
(284, 'HCP26', '2', '15'),
(297, 'HCP30', '2', '50');

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
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `taxtitle` varchar(20) NOT NULL,
  `rate` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1-active\r\n2-not active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`id`, `regid`, `name`, `mobile`, `hname`, `cityid`, `disctrictid`, `stateid`, `pin`, `status`) VALUES
(1, 40, 'Tonsia Treesa', '8129396333', 'Padinjarekuttu', 1, 1, 1, '265845', 1),
(2, 40, 'Mathew', '9972379812', 'Harry villa', 1, 1, 1, '356343', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `productid` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userid`, `productid`, `status`) VALUES
(1, '40', 'HCP11', 2),
(2, '40', 'HCP24', 2),
(3, '40', 'HCP17', 2),
(4, '40', 'HCP18', 2),
(6, '40', 'HCP24', 2),
(7, '40', 'HCP17', 2),
(8, '40', 'HCP17', 2),
(9, '40', 'HCP17', 2),
(10, '40', 'HCP17', 2),
(11, '40', 'HCP23', 2),
(12, '40', 'HCP17', 2),
(13, '40', 'HCP11', 2),
(14, '40', 'HCP11', 1),
(15, '40', 'HCP17', 2),
(16, '40', 'HPC01', 2),
(17, '40', 'HCP17', 2),
(18, '40', 'HCP17', 2),
(19, '40', 'HCP17', 1),
(20, '44', 'HCP17', 1),
(21, '45', 'HCP18', 2);

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
