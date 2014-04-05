-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2014 at 11:10 PM
-- Server version: 5.5.27
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE IF NOT EXISTS `booking_table` (
  `book_id` int(11) NOT NULL,
  `custo_id` int(11) NOT NULL,
  `reserv_id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`book_id`, `custo_id`, `reserv_id`, `days`, `total_price`) VALUES
(1, 4, 8, '1 ', '1200'),
(2, 5, 9, '5 ', '1250'),
(3, 6, 11, '5 ', '2000'),
(4, 7, 12, '5 ', '2500'),
(5, 8, 16, '5 ', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE IF NOT EXISTS `customer_info` (
  `custo_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`custo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`custo_id`, `name`, `email`, `address`) VALUES
(1, 'Niloy', 'niloy.cste@gmail.com', 'Feni'),
(2, 'ds', 'sdfasd', 'sdf'),
(3, 'sdfsdf', 'niloy.cste@gmail.com', 'sdfsdfsfdsdsd'),
(4, 'sdfsdf', 'sdf', 'sdf'),
(5, '', '', ''),
(6, 'dfd', 'A@GMAIL.COM', 'dfd'),
(7, 'df', 'niloy.cste@gmail.com', 'sdf'),
(8, 'sdfsdf', 'A@GMAIL.COM', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_available`
--

CREATE TABLE IF NOT EXISTS `reservation_available` (
  `auto-id` int(11) NOT NULL AUTO_INCREMENT,
  `reserv_id` int(11) NOT NULL,
  `room_type_name` text NOT NULL,
  `unit_price` bigint(15) NOT NULL,
  `available` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`auto-id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `reservation_available`
--

INSERT INTO `reservation_available` (`auto-id`, `reserv_id`, `room_type_name`, `unit_price`, `available`, `updated_at`, `created_at`, `type`, `image`, `description`) VALUES
(1, 1, 'Single', 400, 10, '2014-04-03 01:55:29', '2014-04-01 20:53:06', 'Dilux', 'img/dilux/single.jpg', 'This is single Room of dilux'),
(2, 1, 'Double', 500, 10, '2014-04-03 01:55:29', '2014-04-01 20:53:06', 'Dilux', 'img/dilux/double.jpg', 'This is double room of Dilux'),
(3, 1, 'Family', 700, 10, '2014-04-03 01:55:29', '2014-04-01 20:53:06', 'Dilux', 'img/dilux/family.jpg', 'This is Family Room Of Dilux'),
(4, 1, 'Couple', 800, 10, '2014-04-03 01:55:29', '2014-04-01 20:53:06', 'Dilux', 'img/dilux/couple.jpg', 'This is Couple Room of Dilux'),
(5, 2, 'Single', 400, 10, '2014-04-01 21:53:10', '2014-04-01 20:53:06', 'Dilux', 'img/dilux/single.jpg', 'This is single Room of dilux'),
(6, 2, 'Double', 800, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Luxury', 'img/luxury/single.jpg', 'This is Double Room of Luxury'),
(7, 2, 'Family', 1000, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Luxury', 'img/luxury/family.jpg', 'This is Family Room of Luxury'),
(8, 2, 'Couple', 1200, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Luxury', 'img/luxury/family.jpg', 'This is Family Rom of Luxury'),
(9, 3, 'Single', 250, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'AC', 'img/ac/single.jpg', 'This is Single Room of AC'),
(10, 3, 'Double', 300, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'AC', 'img/ac/double.jpg', 'This is double Room of AC'),
(11, 3, 'Family', 400, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'AC', 'img/ac/family.jpg', 'This is Family Room Of AC'),
(12, 3, 'Couple', 500, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'AC', 'img/ac/couple.jpg', 'This is Couple Room of AC'),
(13, 4, 'Single', 200, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Non-AC', 'img/non_ac/single.jpg', 'This is Single Room Of Non Ac'),
(14, 4, 'Double', 300, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Non-AC', 'img/non_ac/double.jpg', 'This is A Double Room Of Non-AC'),
(15, 4, 'Family', 400, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Non-AC', 'img/non_ac/family.jpg', 'This is Family Room Of Non-AC'),
(16, 4, 'Couple', 500, 10, '2014-04-03 02:04:06', '2014-04-01 20:53:06', 'Non-AC', 'img/non_ac/couple.jpg', 'This is Couple Room Of Non-AC');

--
-- Triggers `reservation_available`
--
DROP TRIGGER IF EXISTS `reservation_available_create`;
DELIMITER //
CREATE TRIGGER `reservation_available_create` BEFORE INSERT ON `reservation_available`
 FOR EACH ROW SET NEW.created_at = CURRENT_TIMESTAMP, NEW.updated_at = '0000-00-00 00-00-00'
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_details`
--

CREATE TABLE IF NOT EXISTS `reservation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auto_id` int(11) NOT NULL,
  `arrival` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `confirmation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `reservation_details`
--

INSERT INTO `reservation_details` (`id`, `auto_id`, `arrival`, `departure`, `status`, `confirmation`) VALUES
(1, 6, '04/04/2014', '05/04/2014  ', 'active', 'ij2tw565'),
(2, 5, '04/04/2014', '05/04/2014  ', 'active', 'ensmhhce'),
(3, 7, '04/04/2014', '05/04/2014  ', 'active', 'yuzxtzvv'),
(4, 8, '04/04/2014', '05/04/2014  ', 'active', 'd6agpa7o'),
(5, 9, '05/04/2014', '10/04/2014  ', 'active', 'gqe40ywt'),
(6, 11, '05/04/2014', '10/04/2014  ', 'active', 'a6xsv0xi'),
(7, 12, '05/04/2014', '10/04/2014  ', 'active', 'kbsq5w6b'),
(8, 16, '05/04/2014', '10/04/2014  ', 'active', 'vizhsigm');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_type`
--

CREATE TABLE IF NOT EXISTS `reservation_type` (
  `reserv_id` int(11) NOT NULL AUTO_INCREMENT,
  `reserv_name` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `auto-id` int(11) NOT NULL,
  PRIMARY KEY (`reserv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `reservation_type`
--

INSERT INTO `reservation_type` (`reserv_id`, `reserv_name`, `updated_at`, `created_at`, `image`, `description`, `type`, `auto-id`) VALUES
(2, 'Luxury', '2014-04-01 21:28:57', '2014-04-01 20:53:06', 'img/luxury/single.jpg', 'sdfsdf', 'Single', 5),
(3, 'AC', '2014-04-01 21:28:57', '2014-04-01 20:53:06', 'img/ac/family.jpg', 'sdfsdf', 'Family', 11),
(4, 'NON-AC', '2014-04-01 21:28:57', '2014-04-01 20:53:06', 'img/non_ac/couple.jpg', 'sdfs', 'Couple', 16),
(1, 'Dilux', '2014-04-01 21:30:17', '2014-04-01 20:53:06', 'img/dilux/double.jpg', 'sdfsdf', 'Double', 2);

--
-- Triggers `reservation_type`
--
DROP TRIGGER IF EXISTS `reservation_type_create`;
DELIMITER //
CREATE TRIGGER `reservation_type_create` BEFORE INSERT ON `reservation_type`
 FOR EACH ROW SET NEW.created_at = CURRENT_TIMESTAMP, NEW.updated_at = '0000-00-00 00-00-00'
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'niloy', 'niloy');
