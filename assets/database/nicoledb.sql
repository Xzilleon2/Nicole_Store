-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 08:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nicoledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `PRICE` int(11) DEFAULT NULL,
  `ImgURL` varchar(255) NOT NULL,
  `CATEGORY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `NAME`, `PRICE`, `ImgURL`, `CATEGORY`) VALUES
(1, 'Rice', 100, 'assets/ProductImages/Rice.jfif', 'Food'),
(2, 'salt', 15, 'assets/ProductImages/salt.jfif', 'spices'),
(3, 'Pilot Ballpens', 20, 'assets/ProductImages/ballpens.jfif', 'School Supplies'),
(4, 'Vinegar', 22, 'assets/ProductImages/Vinegar.jpg', 'Food'),
(5, 'Soy Sauce', 20, 'assets/ProductImages/soysauce.jpg', 'Food'),
(6, 'jeans', 500, 'assets/ProductImages/jeans.jpg', 'Clothes'),
(7, 'Hoody', 450, 'assets/ProductImages/Hoody.jpg', 'Clothes'),
(8, 'garlic', 15, 'assets/ProductImages/garlic.jpg', 'Food'),
(9, 'Ginger', 13, 'assets/ProductImages/ginger.jfif', 'Food'),
(10, 'shorts', 300, 'assets/ProductImages/shorts.jpg', 'Clothes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
