-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2016 at 02:06 PM
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
-- Table structure for table `buyer2`
--

CREATE TABLE `buyer2` (
  `item_id` int(11) NOT NULL,
  `payment_due` decimal(10,2) NOT NULL,
  `user_user_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer2`
--

INSERT INTO `buyer2` (`item_id`, `payment_due`, `user_user_id`) VALUES
(352566, '0.00', 'by1234'),
(534555, '12.45', 'by9856'),
(355532, '100.21', 'by8465'),
(534557, '3.01', 'by9345'),
(545326, '12.02', 'by8465'),
(455356, '0.00', 'by8574'),
(335235, '0.00', 'by1345'),
(975943, '0.00', 'by8465'),
(447586, '0.00', 'by1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
