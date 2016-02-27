-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2016 at 01:28 PM
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
-- Table structure for table `feedback2`
--

CREATE TABLE `feedback2` (
  `feedback_id` varchar(11) NOT NULL,
  `rating_out_of_five` int(11) NOT NULL,
  `feedback_comment` text NOT NULL,
  `user_userid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback2`
--

INSERT INTO `feedback2` (`feedback_id`, `rating_out_of_five`, `feedback_comment`, `user_userid`) VALUES
('f1234', 5, 'great', 'by8253'),
('f5643', 4, 'really good', 'by7645'),
('f3567', 5, 'superb', 'by1234'),
('f5678', 4, 'awesome', 'by8465'),
('f3456', 5, 'perfect', 'by9345'),
('f4567', 3, 'relatively good came a bit late', 'by9763');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
