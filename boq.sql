-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2016 at 11:13 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boq`
--

-- --------------------------------------------------------

--
-- Table structure for table `boq_code`
--

CREATE TABLE `boq_code` (
  `id` int(11) NOT NULL,
  `boq_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq_code`
--

INSERT INTO `boq_code` (`id`, `boq_code`) VALUES
(1, 100),
(2, 101),
(3, 102);

-- --------------------------------------------------------

--
-- Table structure for table `boq_items`
--

CREATE TABLE `boq_items` (
  `id` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `boq_code` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boq_items`
--

INSERT INTO `boq_items` (`id`, `item_code`, `boq_code`, `quantity`) VALUES
(1, 10002, 101, 3),
(11, 10001, 101, 34),
(12, 10003, 101, 12),
(14, 10004, 101, 3),
(21, 10001, 102, 3),
(23, 10002, 102, 3),
(24, 10004, 102, 12),
(25, 10002, 103, 234);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `Item_name` varchar(250) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `material_cost` double NOT NULL,
  `waist` double NOT NULL,
  `eqp_hr` double NOT NULL,
  `eqp_rate` double NOT NULL,
  `other_cost` double NOT NULL,
  `margin` double NOT NULL,
  `total_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Item_name`, `item_code`, `material_cost`, `waist`, `eqp_hr`, `eqp_rate`, `other_cost`, `margin`, `total_amount`) VALUES
(8, 'Ballalsdkflsdf', '10001', 32434, 10, 12.9, 129, 0, 10, 69775.5),
(9, '32432', '10002', 2342, 12, 12, 3, 0, 23, 5001.04),
(10, '3243', '10003', 323, 23, 2, 3, 0, 12, 726.29),
(11, 'dfgdfg', '10004', 3324, 34, 34, 3, 0, 3, 7880.16),
(12, 'werwerwer', '10005', 3234, 23, 1, 23, 0, 2, 7234.82);

-- --------------------------------------------------------

--
-- Table structure for table `item_codes`
--

CREATE TABLE `item_codes` (
  `id` int(11) NOT NULL,
  `item_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_codes`
--

INSERT INTO `item_codes` (`id`, `item_code`) VALUES
(1, 10000),
(7, 10001),
(8, 10002),
(9, 10003),
(10, 10004),
(11, 10005);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `materials_name` varchar(252) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `materials_name`, `quantity`, `unit`, `rate`, `amount`, `item_id`) VALUES
(1, 'sdfsdf', 34, 'sd', 34, 32434, 10001),
(2, 'sdfsdf', 34, '32', 234, 2342, 10002),
(3, 'ewer', 32, 's', 23, 323, 10003),
(4, 'sdf', 3, 's', 32, 3324, 10004),
(5, 'ewrrew', 32, 'sd', 323, 3234, 10005);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boq_code`
--
ALTER TABLE `boq_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boq_items`
--
ALTER TABLE `boq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_codes`
--
ALTER TABLE `item_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boq_code`
--
ALTER TABLE `boq_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `boq_items`
--
ALTER TABLE `boq_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item_codes`
--
ALTER TABLE `item_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
