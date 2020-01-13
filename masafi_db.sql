-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2020 at 09:07 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masafi`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_module`
--

DROP TABLE IF EXISTS `access_module`;
CREATE TABLE IF NOT EXISTS `access_module` (
  `id_acmod` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL,
  `can_edit` int(1) DEFAULT '1',
  `can_save` int(1) DEFAULT '1',
  `can_delete` int(1) DEFAULT '1',
  `can_print` int(1) DEFAULT '1',
  `can_upload` int(1) DEFAULT '1',
  PRIMARY KEY (`id_acmod`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_module`
--

INSERT INTO `access_module` (`id_acmod`, `user_id`, `id_module`, `can_edit`, `can_save`, `can_delete`, `can_print`, `can_upload`) VALUES
(269, 5, 4, 1, 1, 1, 1, 1),
(349, 1, 1, 1, 1, 1, 1, 1),
(350, 1, 2, 1, 1, 1, 1, 1),
(351, 1, 3, 1, 1, 1, 1, 1),
(352, 1, 4, 1, 1, 1, 1, 1),
(353, 1, 5, 1, 1, 1, 1, 1),
(354, 2, 1, 1, 1, 1, 1, 1),
(355, 2, 2, 1, 1, 1, 1, 1),
(356, 2, 3, 1, 1, 1, 1, 1),
(357, 2, 4, 1, 1, 1, 1, 1),
(358, 2, 5, 1, 1, 1, 1, 1),
(359, 3, 1, 1, 1, 0, 0, 0),
(360, 3, 2, 1, 1, 0, 0, 0),
(361, 3, 3, 1, 1, 0, 0, 0),
(362, 3, 4, 1, 1, 0, 0, 0),
(363, 3, 5, 1, 1, 1, 1, 1),
(364, 4, 1, 1, 1, 1, 1, 1),
(365, 4, 2, 1, 1, 1, 1, 1),
(366, 4, 3, 1, 1, 1, 1, 1),
(367, 4, 4, 1, 1, 1, 1, 1),
(368, 4, 5, 1, 1, 1, 1, 1),
(369, 6, 2, 1, 1, 0, 0, 0),
(370, 6, 4, 1, 1, 0, 0, 0),
(371, 6, 5, 1, 1, 1, 1, 1),
(372, 7, 2, 1, 1, 0, 0, 0),
(373, 7, 4, 1, 1, 0, 0, 0),
(374, 7, 5, 1, 1, 1, 1, 1),
(383, 10, 1, 1, 1, 1, 1, 1),
(384, 10, 2, 1, 1, 1, 1, 1),
(385, 10, 3, 1, 1, 1, 1, 1),
(386, 10, 4, 1, 1, 1, 1, 1),
(387, 10, 5, 1, 1, 1, 1, 1),
(388, 8, 1, 1, 1, 0, 0, 0),
(389, 8, 2, 1, 1, 0, 0, 0),
(390, 8, 4, 1, 1, 0, 0, 0),
(391, 8, 5, 1, 1, 0, 0, 0),
(392, 9, 1, 1, 1, 0, 0, 0),
(393, 9, 2, 1, 1, 0, 0, 0),
(394, 9, 4, 1, 1, 0, 0, 0),
(395, 9, 5, 1, 1, 0, 0, 0),
(396, 11, 1, 1, 1, 0, 1, 0),
(397, 11, 2, 1, 1, 0, 1, 0),
(398, 11, 3, 1, 1, 0, 1, 0),
(399, 11, 4, 1, 1, 0, 1, 0),
(400, 11, 5, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customermaster`
--

DROP TABLE IF EXISTS `customermaster`;
CREATE TABLE IF NOT EXISTS `customermaster` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customermaster`
--

INSERT INTO `customermaster` (`customer_id`, `customer_name`, `customer_address`, `created_at`, `updated_at`, `status`, `created_user`, `updated_user`) VALUES
(1, 'Naisam', 'Al Karama, Bur Dubai, Office No 109, Al Karama Star Building - Dubai', '2020-01-10', '2020-01-10', '1', 1, 1),
(2, 'Miyad Khan', 'Al Karama, Bur Dubai, Office No 109, Al Karama Star Building - Dubai', '2020-01-10', '2020-01-10', '1', 1, 1),
(3, 'Praveen kv', 'Al Karama, Bur Dubai, Office No 109, Al Karama Star Building - Dubai', '2020-01-10', '2020-01-10', '1', 1, 1),
(4, 'Niyas', 'Al Karama, Bur Dubai, Office No 109, Al Karama Star Building - Dubai', '2020-01-10', '2020-01-10', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'supervisor', 'Supervisor'),
(3, 'accounts', 'Accounts'),
(4, 'sales', 'Sales'),
(5, 'guest', 'Guest'),
(6, 'sales manger', 'Sales Manger');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(19, '::1', 'admin@shuraa.com', 1578920243),
(20, '::1', 'admin@shuraa.com', 1578920258);

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

DROP TABLE IF EXISTS `log_details`;
CREATE TABLE IF NOT EXISTS `log_details` (
  `log_id` int(100) NOT NULL AUTO_INCREMENT,
  `log_data` text NOT NULL,
  `log_user` varchar(200) NOT NULL,
  `log_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_details`
--

INSERT INTO `log_details` (`log_id`, `log_data`, `log_user`, `log_date`) VALUES
(232, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-10 14:51:38'),
(233, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-10 21:24:46'),
(234, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-10 23:24:53'),
(235, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-11 12:53:39'),
(236, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-11 16:19:25'),
(237, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-12 20:09:18'),
(238, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-12 20:09:34'),
(239, '<code>Supervisor</code> logged in supervisor, Client ip : , Remote ip : ::1, location :UAE', 'supervisor', '2020-01-12 21:55:26'),
(240, '<code>Accounts</code> logged in accountant, Client ip : , Remote ip : ::1, location :UAE', 'accountant', '2020-01-12 21:56:56'),
(241, '<code>Supervisor</code> logged in supervisor, Client ip : , Remote ip : ::1, location :UAE', 'supervisor', '2020-01-12 22:06:34'),
(242, '<code>Accounts</code> logged in accountant, Client ip : , Remote ip : ::1, location :UAE', 'accountant', '2020-01-13 00:46:52'),
(243, '<code>Sales Manger</code> logged in Sales Manager, Client ip : , Remote ip : ::1, location :UAE', 'Sales Manager', '2020-01-13 01:05:25'),
(244, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-13 16:58:05'),
(245, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-13 20:44:53'),
(246, '<code>Supervisor</code> logged in supervisor, Client ip : , Remote ip : ::1, location :UAE', 'supervisor', '2020-01-13 21:23:15'),
(247, '<code>Accounts</code> logged in accountant, Client ip : , Remote ip : ::1, location :UAE', 'accountant', '2020-01-13 22:04:16'),
(248, '<code>Sales Manger</code> logged in Sales Manager, Client ip : , Remote ip : ::1, location :UAE', 'Sales Manager', '2020-01-13 22:05:02'),
(249, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-13 22:05:38'),
(250, '<code>Supervisor</code> logged in supervisor, Client ip : , Remote ip : ::1, location :UAE', 'supervisor', '2020-01-13 22:13:09'),
(251, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-13 23:22:33'),
(252, '<code>Supervisor</code> logged in supervisor, Client ip : , Remote ip : ::1, location :UAE', 'supervisor', '2020-01-13 23:24:24'),
(253, '<code>Accounts</code> logged in accountant, Client ip : , Remote ip : ::1, location :UAE', 'accountant', '2020-01-13 23:25:01'),
(254, '<code>Sales Manger</code> logged in Sales Manager, Client ip : , Remote ip : ::1, location :UAE', 'Sales Manager', '2020-01-13 23:26:24'),
(255, '<code>Supervisor</code> logged in supervisor, Client ip : , Remote ip : ::1, location :UAE', 'supervisor', '2020-01-13 23:49:28'),
(256, '<code>Administrator</code> logged in admin, Client ip : , Remote ip : ::1, location :UAE', 'admin', '2020-01-14 00:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

DROP TABLE IF EXISTS `productmaster`;
CREATE TABLE IF NOT EXISTS `productmaster` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` float NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `avail_qty` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `type` (`type`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`product_id`, `type`, `product_name`, `product_desc`, `product_img`, `product_price`, `total_quantity`, `avail_qty`, `created_at`, `updated_at`, `status`, `created_user`, `updated_user`) VALUES
(1, 1, 'Pure 200ml Sports Cap Pony x 12 Bottles', 'Pure 200ml Sports Cap Pony x 12 Bottles\n', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/u/pure_shrink_mlp_12x200ml.png', 10.5, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(2, 1, 'Pure 200ml x 12 Bottles', 'Pure 200ml x 12 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/u/pure_shrink_12x200ml.png', 7.5, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(3, 1, 'Pure 500ml x 12 Bottles', 'Pure 500ml x 12 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/u/pure_shrink_12x500ml.png', 10.2, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(4, 1, 'Zero 1.5ltr x 6 Bottles', 'Zero 1.5ltr x 6 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/z/e/zero_shrink_6x1.5ltr.png', 7.6, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(5, 3, 'Apple Juice 2ltr x 4 Bottles', 'Apple Juice 2ltr x 4 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/a/p/apple_juice_2ltrx4_.png', 36, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(6, 3, 'Pineapple Juice 1ltr x 6 Bottles', 'Pineapple Juice 1ltr x 6 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/i/pineapple_juice_1ltrx6_2.png', 47.5, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(7, 2, 'Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)', 'Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/a/pack_of_3_2_tissue_boxes_200x2ply.png', 18.6, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(8, 1, 'Pure 200ml Sports Cap Pony x 12 Bottles', 'Pure 200ml Sports Cap Pony x 12 Bottles\n', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/u/pure_shrink_mlp_12x200ml.png', 10.5, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(9, 1, 'Pure 200ml x 12 Bottles', 'Pure 200ml x 12 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/u/pure_shrink_12x200ml.png', 7.5, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(10, 1, 'Pure 500ml x 12 Bottles', 'Pure 500ml x 12 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/u/pure_shrink_12x500ml.png', 10.2, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(11, 1, 'Zero 1.5ltr x 6 Bottles', 'Zero 1.5ltr x 6 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/z/e/zero_shrink_6x1.5ltr.png', 7.6, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(12, 3, 'Apple Juice 2ltr x 4 Bottles', 'Apple Juice 2ltr x 4 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/a/p/apple_juice_2ltrx4_.png', 36, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(13, 3, 'Pineapple Juice 1ltr x 6 Bottles', 'Pineapple Juice 1ltr x 6 Bottles', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/i/pineapple_juice_1ltrx6_2.png', 47.5, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1),
(14, 2, 'Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)', 'Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)', 'https://www.masafi.com/pub/media/catalog/product/cache/a95cd6208f6f304d3ecd6458151997d3/p/a/pack_of_3_2_tissue_boxes_200x2ply.png', 18.6, 100, 0, '2020-01-10', '2020-01-10', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `created_user` int(11) NOT NULL,
  PRIMARY KEY (`type_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type_id`, `name`, `created_at`, `created_user`) VALUES
(1, 'Water', '2020-01-10', 1),
(2, 'Tissue', '2020-01-10', 1),
(3, 'Juice', '2020-01-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesmaster`
--

DROP TABLE IF EXISTS `salesmaster`;
CREATE TABLE IF NOT EXISTS `salesmaster` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_name` varchar(100) NOT NULL,
  `sales_desc` text NOT NULL,
  `product` json NOT NULL,
  `qty` json NOT NULL,
  `price` json NOT NULL,
  `total` json NOT NULL,
  `sales_vat` float NOT NULL,
  `sales_price` float NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` enum('1','0','2') NOT NULL DEFAULT '1',
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `customer_id` (`customer_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesmaster`
--

INSERT INTO `salesmaster` (`sales_id`, `sales_name`, `sales_desc`, `product`, `qty`, `price`, `total`, `sales_vat`, `sales_price`, `customer_id`, `sales_date`, `delivery_date`, `created_at`, `updated_at`, `status`, `created_user`, `updated_user`) VALUES
(6, 'Order#2', 'Test order 2', '[\"Apple Juice 2ltr x 4 Bottles\", \"Pure 200ml Sports Cap Pony x 12 Bottles\"]', '[\"12\", \"13\"]', '[\"22\", \"1\"]', '[\"264\", \"13\"]', 0, 277, 1, '2020-01-28', '2020-01-13', '2020-01-11', '2020-01-11', '1', 1, 1),
(7, 'Order#3', 'Bulk Order', '[\"Apple Juice 2ltr x 4 Bottles\", \"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\", \"Zero 1.5ltr x 6 Bottles\"]', '[\"10\", \"25\", \"30\"]', '[\"100\", \"12\", \"1\"]', '[\"1000\", \"300\", \"30\"]', 0, 1330, 1, '2020-01-29', '2020-01-13', '2020-01-11', '2020-01-11', '1', 1, 1),
(8, 'Shefeek#32423', 'Test Order', '[\"Apple Juice 2ltr x 4 Bottles\", \"Pure 200ml x 12 Bottles\"]', '[\"24\", \"43\"]', '[\"12\", \"3\"]', '[\"288\", \"129\"]', 0, 417, 1, '2020-03-12', '2020-01-13', '2020-01-13', '2020-01-13', '1', 1, 1),
(9, 'MiyadKhan#3242', 'Test Miya Khan Oorder', '[\"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\", \"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\"]', '[\"12\", \"34\"]', '[\"14\", \"3\"]', '[\"168\", \"102\"]', 0, 270, 2, '2020-01-28', '2020-01-13', '2020-01-13', '2020-01-13', '1', 1, 1),
(10, 'NiyasOrder#1', 'Facial Tissu 500, etc', '[\"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\", \"Pineapple Juice 1ltr x 6 Bottles\"]', '[\"100\", \"12\"]', '[\"3\", \"7\"]', '[\"300\", \"84\"]', 0, 384, 4, '2020-01-12', '0000-00-00', '2020-01-13', '2020-01-13', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesreturn`
--

DROP TABLE IF EXISTS `salesreturn`;
CREATE TABLE IF NOT EXISTS `salesreturn` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `salesid` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `product` json NOT NULL,
  `qty` json NOT NULL,
  `returnqty` json NOT NULL,
  `reason` text NOT NULL,
  `status` enum('1','0','2') NOT NULL DEFAULT '0',
  `supervisor_approve` enum('1','0') NOT NULL DEFAULT '0',
  `accounts_approve` enum('1','0') NOT NULL DEFAULT '0',
  `manager_approve` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `salesid` (`salesid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesreturn`
--

INSERT INTO `salesreturn` (`return_id`, `salesid`, `request_date`, `product`, `qty`, `returnqty`, `reason`, `status`, `supervisor_approve`, `accounts_approve`, `manager_approve`, `created_at`, `updated_at`, `created_user`, `updated_user`) VALUES
(1, 7, '2020-02-19', '[\"Apple Juice 2ltr x 4 Bottles\", \"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\", \"Zero 1.5ltr x 6 Bottles\"]', '[\"10\", \"25\", \"30\"]', '[\"9\", \"23\", \"\"]', 'Test', '2', '0', '0', '0', '2020-01-11', '2020-01-11', 1, 1),
(2, 6, '1970-01-01', '[\"Apple Juice 2ltr x 4 Bottles\", \"Pure 200ml Sports Cap Pony x 12 Bottles\"]', '[\"12\", \"13\"]', '[\"2\", \"10\"]', 'Test File', '0', '0', '0', '0', '2020-01-12', '2020-01-12', 1, 1),
(3, 6, '2024-01-30', '[\"Apple Juice 2ltr x 4 Bottles\", \"Pure 200ml Sports Cap Pony x 12 Bottles\"]', '[\"12\", \"13\"]', '[\"1\", \"1\"]', 'Final Return Request', '0', '0', '0', '0', '2020-01-12', '2020-01-12', 1, 1),
(4, 8, '2020-02-04', '[\"Apple Juice 2ltr x 4 Bottles\", \"Pure 200ml x 12 Bottles\"]', '[\"24\", \"43\"]', '[\"12\", \"12\"]', 'Bad item', '0', '1', '0', '0', '2020-01-13', '2020-01-13', 1, 1),
(5, 9, '2020-01-28', '[\"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\", \"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\"]', '[\"12\", \"34\"]', '[\"5\", \"10\"]', 'Damaged', '0', '1', '0', '0', '2020-01-13', '2020-01-13', 1, 1),
(6, 10, '2020-01-28', '[\"Facial Tissue 200 x 2ply x 5 Boxes (3+2 Offer)\", \"Pineapple Juice 1ltr x 6 Bottles\"]', '[\"100\", \"12\"]', '[\"40\", \"10\"]', 'Bad Quality', '0', '0', '0', '0', '2020-01-13', '2020-01-13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `profession` text NOT NULL,
  `asc` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `profession`, `asc`) VALUES
(1, '::1', 'administrator', '$2y$08$j/F/MOdNd7YOxgpgtgiex.kJ6YCUuIwO9LWBptctDdzpB8GmwiWou', '', 'admin@masafi.com', NULL, NULL, NULL, NULL, 1268889823, 1578949128, 1, 'admin', 'IT', 'Shura Manaagement and Consulttancy', '0', '', ''),
(13, '::1', NULL, '$2y$08$G3YwFz1.uE6GdV9zshzjR.byhC0SwXqwZ1rRxn11fT/uE8431kssO', NULL, 'supervisor@masafi.com', NULL, NULL, NULL, NULL, 1578845931, 1578944968, 1, 'supervisor', 'supervisor', 'Masafi', '0000', '', ''),
(14, '::1', NULL, '$2y$08$Ai/rE8xuErewwGaXUHBuA.yPdvDV2aNfCjJ4ur8791A/RzoToQkkm', NULL, 'accountant@masafi.com', NULL, NULL, NULL, NULL, 1578845999, 1578943501, 1, 'accountant', 'accountant', 'Masafi', '99999999', '', ''),
(15, '::1', NULL, '$2y$08$IltmE8LM4CGdxH3M1S9Viujc2XfjkI4gMcERmHHKK3/NLoF8HBfpi', NULL, 'salesmanager@masafi.com', NULL, NULL, NULL, NULL, 1578846044, 1578943584, 1, 'Sales Manager', 'Sales Manager', 'Masafi', '3242342', '', ''),
(16, '::1', NULL, '$2y$08$1wMNJW.DvfU9mstf9cBiwOLK8vV1Au8zeU5fdIdDMZ/7qF.NCtYFW', NULL, 'sales@masafi.com', NULL, NULL, NULL, NULL, 1578846080, NULL, 1, 'sales', 'sales', 'Masafi', '324254', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(202, 1, 1),
(207, 13, 2),
(209, 14, 3),
(211, 15, 6),
(213, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `_modules`
--

DROP TABLE IF EXISTS `_modules`;
CREATE TABLE IF NOT EXISTS `_modules` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `name_mod` varchar(45) DEFAULT NULL,
  `details_mod` varchar(45) DEFAULT NULL,
  `add_date_mod` date DEFAULT NULL,
  `upd_date_mod` date DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `url` text,
  `icon` text,
  `menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_modules`
--

INSERT INTO `_modules` (`id_mod`, `name_mod`, `details_mod`, `add_date_mod`, `upd_date_mod`, `status`, `url`, `icon`, `menu`) VALUES
(1, 'Dashboard', 'Dashboard', '2017-04-05', '2017-04-05', '1', 'dashboard', 'fa fa-lg fa-fw fa-home', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salesmaster`
--
ALTER TABLE `salesmaster`
  ADD CONSTRAINT `salesmaster_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customermaster` (`customer_id`);

--
-- Constraints for table `salesreturn`
--
ALTER TABLE `salesreturn`
  ADD CONSTRAINT `salesreturn_ibfk_1` FOREIGN KEY (`salesid`) REFERENCES `salesmaster` (`sales_id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
