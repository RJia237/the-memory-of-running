-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2016 at 01:02 PM
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
-- Table structure for table `item2`
--

CREATE TABLE `item2` (
  `item_id` int(11) NOT NULL,
  `auction_item_name` varchar(200) NOT NULL,
  `auction_item_description` varchar(200) NOT NULL,
  `auction_item_image` blob NOT NULL,
  `auction_item_comments` varchar(600) NOT NULL,
  `seller_user_user_id` varchar(11) NOT NULL,
  `auction_item_selling_price` decimal(10,2) NOT NULL,
  `auction_item_successful_bidder` varchar(11) NOT NULL,
  `auction_item_close_date` datetime NOT NULL,
  `auction_item_payment_date` date NOT NULL,
  `shipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item2`
--

INSERT INTO `item2` (`item_id`, `auction_item_name`, `auction_item_description`, `auction_item_image`, `auction_item_comments`, `seller_user_user_id`, `auction_item_selling_price`, `auction_item_successful_bidder`, `auction_item_close_date`, `auction_item_payment_date`, `shipment_id`) VALUES
(12345, 'dress size 12-14', 'never worn before, red sleeveless silk lace material', 0x7265645f64726573732e6a7067, '', 'by9763', '10.45', 'by1234', '2016-02-20 17:56:00', '2016-02-21', 0),
(54321, 'make up kit 12 piece set', 'Includes eye liner, mascara, foundation and lots of other fabulous products', 0x6d616b6575705f69742e6a7067, '', 'by5373', '12.45', 'by9856', '2016-02-12 17:56:00', '0000-00-00', 0),
(23453, 'fake blood', 'great for costumes and halloween this is easily washed off', 0x66616b655f626c6f6f642e626d70, '', 'by8253', '100.21', 'by8465', '2016-02-22 17:56:00', '2016-02-23', 0),
(42353, 'foot ball', 'top quality will last long even with the roughest players', 0x666f6f7462616c6c2e706e67, '', 'by7645', '3.01', 'by9345', '2016-02-23 17:56:00', '2016-02-23', 0),
(34386, 'deep philosophy book', 'great book about how the mind thinks will make you wander and think very deeply', 0x626f6f6b2e6a706567, '', 'by7343', '12.02', 'by8465', '2016-02-24 17:56:00', '0000-00-00', 0),
(79896, 'leather laptop bag', 'black leather with metal studded pouch great for carrying your laptop anywhere you go', 0x6c6170746f705f6261672e706e67, '', 'by8734', '52.06', 'na', '2016-02-25 17:56:00', '0000-00-00', 0),
(85878, 'toy bear', '12 inch stuffed plush bear for toddlers', 0x626561722e6a7067, '', 'by7671', '7.50', 'na', '2016-02-26 17:56:00', '0000-00-00', 0),
(96969, 'cotton bed and pillow cover', 'soft, brand new and fast delivery', 0x6265645f636f7665722e6a7067, '', 'by6457', '82.09', 'na', '2016-02-27 17:56:00', '0000-00-00', 0),
(86887, 'play station three console with games', 'great value for price with 5 games as for more details', 0x706c617973746174696f6e2e6a70672c2067616d65732e6a70673f, '', 'by7645', '200.00', 'na', '2016-02-28 17:56:00', '0000-00-00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
