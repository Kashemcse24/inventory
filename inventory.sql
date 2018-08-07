-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 11:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `created_at`, `updated_at`) VALUES
(24, 'Dhanmondi', '2018-05-21 11:51:42', '2018-05-21 11:51:42'),
(25, 'Tejgaon', '2018-05-21 11:51:51', '2018-05-21 11:51:51'),
(26, 'motijheel', '2018-05-21 14:38:46', '2018-05-21 14:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(3, 'dsfsdf', '2018-04-24 06:45:19', '2018-04-24 06:45:19'),
(4, 'dsfsdfsf', '2018-05-21 14:05:06', '2018-05-21 14:05:06'),
(5, 'ddd', '2018-05-21 14:13:00', '2018-05-21 14:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `created_at`, `updated_at`) VALUES
(2, 'blue', '2018-04-28 11:38:30', '2018-04-28 11:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE `distribute` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `product_quentity` varchar(100) NOT NULL,
  `stock_out` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribute`
--

INSERT INTO `distribute` (`id`, `user_name`, `name`, `product_quentity`, `stock_out`, `created_at`, `updated_at`) VALUES
(3, 'admin2', 'light', '', '2', '2018-05-06 05:13:42', '2018-05-06 05:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `stock_out` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id`, `user_name`, `product_name`, `stock_out`, `created_at`, `updated_at`) VALUES
(8, 'admin2', '12', '6', '2018-04-30 11:55:07', '2018-04-30 11:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `pool`
--

CREATE TABLE `pool` (
  `id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `word_name` varchar(100) NOT NULL,
  `road_name` varchar(100) NOT NULL,
  `pool_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pool`
--

INSERT INTO `pool` (`id`, `area_name`, `word_name`, `road_name`, `pool_name`, `created_at`, `updated_at`) VALUES
(13, 'Dhanmondi', 'Kolabagan', '1st Lane', 'KL1LANE-001', '2018-05-21 11:54:47', '2018-05-21 11:54:47'),
(14, 'Dhanmondi', 'Kolabagan', '', '', '2018-05-22 13:19:08', '2018-05-22 13:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `product_type` varchar(100) NOT NULL,
  `color_name` varchar(100) DEFAULT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_quentity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_name`, `product_type`, `color_name`, `product_size`, `product_quentity`, `created_at`, `updated_at`) VALUES
(17, 'mobile phone', '6', '0', '1', '2', 4, '2018-04-26 11:10:38', '2018-04-26 11:10:38'),
(18, 'light', '6', '1', '1', 'm', 2, '2018-04-28 11:14:33', '2018-04-28 11:14:33'),
(21, 'Tshirt', 'cloth', '1', 'blue', 'xxxs', 11, '2018-04-29 06:37:38', '2018-04-29 06:37:38'),
(22, 'Pant', 'cloth', 'Cloth', 'red', 'xxxmmm', 2, '2018-04-29 06:39:44', '2018-04-29 06:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `product_type`, `created_at`, `updated_at`) VALUES
(3, 'fddfs', '2018-05-03 11:03:16', '2018-05-03 11:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `road`
--

CREATE TABLE `road` (
  `id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `word_name` varchar(100) NOT NULL,
  `road_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `road`
--

INSERT INTO `road` (`id`, `area_name`, `word_name`, `road_name`, `created_at`, `updated_at`) VALUES
(13, 'Dhanmondi', 'Kolabagan', '1st Lane', '2018-05-21 11:53:31', '2018-05-21 11:53:31'),
(14, 'Dhanmondi', 'Kolabagan', '2nd Lane', '2018-05-21 11:53:44', '2018-05-21 11:53:44'),
(15, 'Dhanmondi', 'Kolabagan', 'Bosir Uddin Road', '2018-05-21 11:54:04', '2018-05-21 11:54:04'),
(16, '', '', '', '2018-05-22 13:22:58', '2018-05-22 13:22:58'),
(17, '', '', '', '2018-05-22 13:26:18', '2018-05-22 13:26:18'),
(18, '', '', '', '2018-05-22 13:28:03', '2018-05-22 13:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size_code` varchar(100) NOT NULL,
  `size0` varchar(100) NOT NULL,
  `size1` varchar(100) NOT NULL,
  `size2` varchar(100) NOT NULL,
  `size3` varchar(100) NOT NULL,
  `size4` varchar(100) NOT NULL,
  `size5` varchar(100) NOT NULL,
  `size6` varchar(100) NOT NULL,
  `size7` varchar(100) NOT NULL,
  `size8` varchar(100) NOT NULL,
  `size9` varchar(100) NOT NULL,
  `size10` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_code`, `size0`, `size1`, `size2`, `size3`, `size4`, `size5`, `size6`, `size7`, `size8`, `size9`, `size10`, `created_at`, `updated_at`) VALUES
(3, 'meter', '1', '3', '1', '2', '4', '5', '6', '3', '2', '1', '4', '2018-05-22 11:04:56', '2018-05-22 11:04:56'),
(4, '', '1', '3', '1', '2', '4', '5', '6', '3', '2', '1', '4', '2018-05-22 13:09:01', '2018-05-22 13:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `user_name`, `user_type`, `password`, `created_at`, `updated_at`) VALUES
(18, 'kashem khan', '01924428858', 'kashem@brandbangla.com', 'kashemcse24', 'Distributor', 'kashemcse24', '2018-04-29 10:18:58', '2018-04-29 10:18:58'),
(19, 'sdfdsf', '33333333', 'dfdf@gmail.com', 'admin2', 'Distributor', '1236', '2018-04-29 10:38:39', '2018-04-29 10:38:39'),
(20, 'fdfds', '01924428858', 'kashem@brandbangla.com', 'kashemkhan', 'Distributor', '0125412014', '2018-04-29 10:42:43', '2018-04-29 10:42:43'),
(21, 'nishi', '019244428858', 'nishi@gmail.com', 'nishicse', 'Purchases', 'nishicse', '2018-04-30 06:16:44', '2018-04-30 06:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `word_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `area_name`, `word_name`, `created_at`, `updated_at`) VALUES
(27, '25', 'Kolabagan', '2018-05-21 11:52:11', '2018-05-21 11:52:11'),
(28, 'Tejgaon', 'Farmgate', '2018-05-21 14:37:49', '2018-05-21 14:37:49'),
(29, 'motijheel', 'fokirapul', '2018-05-21 14:39:33', '2018-05-21 14:39:33'),
(30, '', '', '2018-05-22 13:29:39', '2018-05-22 13:29:39'),
(31, '', '', '2018-05-22 13:57:58', '2018-05-22 13:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribute`
--
ALTER TABLE `distribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `road`
--
ALTER TABLE `road`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribute`
--
ALTER TABLE `distribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pool`
--
ALTER TABLE `pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `road`
--
ALTER TABLE `road`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
