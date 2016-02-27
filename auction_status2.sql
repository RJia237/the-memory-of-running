-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2016 at 01:59 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_status2`
--

CREATE TABLE `auction_status2` (
  `auction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `auction_item_start_date` datetime NOT NULL,
  `auction_item_planned_close_date` datetime NOT NULL,
  `current_highest_bid_bid_id` decimal(10,2) NOT NULL,
  `auction_item_reserve_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction_status2`
--

INSERT INTO `auction_status2` (`auction_id`, `item_id`, `bid_id`, `auction_item_start_date`, `auction_item_planned_close_date`, `current_highest_bid_bid_id`, `auction_item_reserve_price`) VALUES
(12345, 352566, 1234567, '2016-02-13 17:56:00', '2016-02-20 17:56:00', '1.05', '0.90'),
(54321, 534555, 4673778, '2016-02-14 17:56:00', '2016-02-21 17:56:00', '1.25', '1.50'),
(23453, 355532, 4578765, '2016-02-15 17:56:00', '2016-02-22 17:56:00', '10.02', '8.00'),
(42353, 534557, 7475764, '2016-02-16 17:56:00', '2016-02-23 17:56:00', '0.30', '0.20'),
(34386, 545326, 4452524, '2016-02-17 17:56:00', '2016-02-24 17:56:00', '1.20', '0.10'),
(79896, 455356, 3552544, '2016-02-18 17:56:00', '2016-02-25 17:56:00', '5.21', '5.00'),
(85878, 335235, 5352356, '2016-02-19 17:56:00', '2016-02-26 17:56:00', '0.75', '0.80'),
(96969, 975943, 5253545, '2016-02-20 17:56:00', '2016-02-27 17:56:00', '8.21', '8.00'),
(86887, 447586, 5352643, '2016-02-21 17:56:00', '2016-02-28 17:56:00', '20.00', '20.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
