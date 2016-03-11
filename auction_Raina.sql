-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 24, 2016 at 01:53 AM
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
-- Table structure for table `auction_status`
--

CREATE TABLE `auction_status` (
  `auction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `auction_item_start_date` datetime NOT NULL,
  `auction_item_planned_close_data` datetime NOT NULL,
  `current_highest_bid_bid_id` int(11) NOT NULL,
  `auction_item_reserve_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `item_id` int(11) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `auction_item_auction_item_id` int(11) NOT NULL,
  `buyer_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `item_id` int(11) NOT NULL,
  `payment_due` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `rating_out_of_five` int(11) NOT NULL,
  `feedback_comment` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `auction_item_name` varchar(200) NOT NULL,
  `auction_item_description` varchar(200) NOT NULL,
  `auction_item_image` blob NOT NULL,
  `auction_item_comments` varchar(600) NOT NULL,
  `seller_user_userid` int(11) NOT NULL,
  `auction_item_selling_price` int(11) NOT NULL,
  `auction_item_successful_bidder` int(11) NOT NULL,
  `auction_item_close_date` datetime NOT NULL,
  `auction_item_payment_date` int(11) NOT NULL,
  `shipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `item_category_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_category_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `payment_method_description` varchar(255) NOT NULL,
  `item_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `item_id` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL,
  `items_sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` int(11) NOT NULL,
  `shipment_planned_date` date NOT NULL,
  `shipment_actual_date` datetime NOT NULL,
  `shipment_cost` decimal(5,2) NOT NULL,
  `shipment_comments` varchar(400) NOT NULL,
  `shipment_tracking_id` int(11) NOT NULL,
  `item_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipment_methods`
--

CREATE TABLE `shipment_methods` (
  `shipment_method_id` int(11) NOT NULL,
  `shipment_method_description` varchar(400) NOT NULL,
  `shipments_shipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_lastname` varchar(40) NOT NULL,
  `user_firstname` varchar(40) NOT NULL,
  `user_alias` varchar(40) NOT NULL,
  `user_dob` date NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_bank_account_no` int(11) NOT NULL,
  `user_postcode` varchar(8) NOT NULL,
  `feedback_feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_status`
--
ALTER TABLE `auction_status`
  ADD PRIMARY KEY (`auction_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `bid_id` (`bid_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `auction_item_auction_item_id` (`auction_item_auction_item_id`) USING BTREE,
  ADD KEY `buyer_user_id` (`buyer_user_id`) USING BTREE,
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_user_id` (`user_user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_user_id` (`user_user_id`) USING BTREE;

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `seller_user_userid_2` (`seller_user_userid`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`item_category_id`),
  ADD KEY `auction_item_auction_item_id` (`item_id`) USING BTREE;

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`),
  ADD KEY `item_item_id` (`item_item_id`) USING BTREE;

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_user_id` (`user_user_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `item_item_id` (`item_item_id`) USING BTREE;

--
-- Indexes for table `shipment_methods`
--
ALTER TABLE `shipment_methods`
  ADD PRIMARY KEY (`shipment_method_id`),
  ADD KEY `shipements_shipment_id` (`shipments_shipment_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `feedback_feedback_id` (`feedback_feedback_id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction_status`
--
ALTER TABLE `auction_status`
  ADD CONSTRAINT `auction_status_ibfk_2` FOREIGN KEY (`bid_id`) REFERENCES `bid` (`bid_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_status_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `buyer` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_category`
--
ALTER TABLE `item_category`
  ADD CONSTRAINT `item_category_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`item_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seller_ibfk_3` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`item_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipment_methods`
--
ALTER TABLE `shipment_methods`
  ADD CONSTRAINT `shipment_methods_ibfk_1` FOREIGN KEY (`shipments_shipment_id`) REFERENCES `shipments` (`shipment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
