-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2022 at 05:03 PM
-- Server version: 10.5.12-MariaDB-0+deb11u1
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `vendor_id` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `name`, `vendor_id`, `price`, `category_id`, `created`) VALUES
(1, 'Black Jacket', '6', 32000, '8', '2022-06-01 02:12:30'),
(2, 'Tesla Car', '3', 290000, '8', '2013-03-03 01:20:10'),
(3, 'One bottle of Oil', '7', 3000, '3', '2014-09-20 03:10:25'),
(4, 'LG Tv', '6', 120000, '4', '2015-04-11 04:11:12'),
(5, 'HP Pavillion', '7', 480000, '4', '2016-01-04 05:20:30'),
(6, 'HP Mouse X90', '6', 7000, '7', '2017-01-10 06:40:10'),
(7, 'Milo Refill', '1', 1500, '5', '2017-05-02 02:20:30'),
(8, 'HB Pencil', '2', 200, '2', '2018-01-04 05:15:35'),
(9, 'Test Product', '4', 1000, '9', '2019-01-02 02:20:30'),
(10, '14 inch Frontal Wig', '6', 45000, '3', '2020-02-01 06:22:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
