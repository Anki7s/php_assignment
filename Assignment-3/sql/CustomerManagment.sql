-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2019 at 03:28 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customermanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `userType` varchar(50) NOT NULL DEFAULT 'customer',
  `imageName` varchar(255) DEFAULT NULL,
  `ProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstName`, `lastName`, `userName`, `email`, `password`, `gender`, `age`, `userType`, `imageName`, `ProductId`) VALUES
(1, 'Ragini', 'Mahale', 'ragini', 'ragini@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', 20, 'admin', NULL, 0),
(5, 'Nikhil', 'Paitl', 'nikhil', 'nikhil@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', 20, 'customer', 'images4.jpg', 0),
(8, 'Punam', ' Dhomse', 'punam', 'punam@gmail.com', '202cb962ac59075b964b07152d234b70', 'female', 20, 'customer', 'images5.jpg', 0),
(9, 'Suraj', 'Pawar', 'suraj', 'sp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 20, 'customer', 'images2.jpg', 0),
(10, 'demo', 'demo', 'demo', 'demo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 21, 'customer', 'images3.jpg', 0),
(58, 'harshal', 'sonawane', 'harshal', 'harshal@gmail.com', 'e358efa489f58062f10dd7316b65649e', 'male', 20, 'customer', 'images16.jpg', 0),
(59, 'suchita', 'nikam', 'suchita123', 'suchita@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'male', 20, 'customer', 'images17.jpg', 0),
(60, 'shikha', 'gupta', 'shikha123', 'shikha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'female', 20, 'customer', 'images18.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`id`, `ProductId`) VALUES
(5, 2),
(5, 1),
(58, 1),
(59, 1),
(59, 2),
(8, 1),
(9, 1),
(59, 1),
(9, 2),
(8, 2),
(10, 1),
(63, 1),
(60, 2),
(64, 1),
(61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `Id`) VALUES
(1, 'Bags', 8),
(2, 'Shoes', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `Id` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
