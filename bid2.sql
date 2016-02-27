-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2016 at 01:36 PM
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
-- Table structure for table `bid2`
--

CREATE TABLE `bid2` (
  `item_id` int(11) NOT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `auction_item_auction_item_id` int(11) NOT NULL,
  `buyer_user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid2`
--

INSERT INTO `bid2` (`item_id`, `bid_amount`, `bid_id`, `auction_item_auction_item_id`, `buyer_user_id`) VALUES
(352566, '1.05', 135795, 12345, 'by1234'),
(352566, '1.00', 135795, 12345, 'by8745'),
(352566, '0.50', 135795, 12345, 'by1234'),
(534555, '1.25', 597531, 54321, 'by9856'),
(534555, '1.20', 597531, 54321, 'by1234'),
(355532, '10.02', 257983, 23453, 'by8465'),
(355532, '10.00', 257983, 23453, 'by6485'),
(534557, '0.30', 465883, 42353, 'by9345'),
(534557, '0.30', 465883, 42353, 'by3847'),
(545326, '1.20', 378246, 34386, 'by8465'),
(545326, '1.00', 378246, 34386, 'by8745'),
(455356, '5.21', 878856, 79896, 'by8574'),
(335235, '0.75', 944658, 85878, 'by1345'),
(335235, '0.60', 944658, 85878, 'by9856'),
(975943, '8.21', 106665, 96969, 'by8465'),
(975943, '7.50', 106665, 96969, 'by3456'),
(447586, '20.00', 955757, 86887, 'by1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
