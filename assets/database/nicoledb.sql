-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 10:46 AM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `PRODUCT_ID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `TOTAL_PRICE` decimal(10,2) DEFAULT NULL,
  `DATE_ADDED` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CART_ID`, `CUSTOMER_ID`, `PRODUCT_ID`, `QUANTITY`, `TOTAL_PRICE`, `DATE_ADDED`) VALUES
(14, 1, 1, 1, 100.00, '2025-05-14'),
(15, 1, 2, 2, 30.00, '2025-05-14'),
(16, 1, 3, 7, 140.00, '2025-05-14'),
(17, 1, 7, 1, 450.00, '2025-05-14'),
(18, 1, 11, 20, 4000.00, '2025-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `CONTACT_NUMBER` varchar(50) DEFAULT NULL,
  `ROLE` varchar(50) DEFAULT NULL,
  `isACTIVE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CUSTOMER_ID`, `NAME`, `EMAIL`, `PASSWORD`, `CONTACT_NUMBER`, `ROLE`, `isACTIVE`) VALUES
(1, 'Joseph Mejos', 'Xzilleon2@gmail.com', '$2y$10$uKJw69Xd2/ufSkjaKZqd1.5DMTnLyVPHdJo1w/U9qL9Ed9DLHbl6W', '09165211715', 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `DISCOUNT_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) DEFAULT NULL,
  `DISCOUNT_PERCENT` decimal(5,2) DEFAULT NULL,
  `DATE_START` date DEFAULT current_timestamp(),
  `DATE_END` date DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`DISCOUNT_ID`, `PRODUCT_ID`, `DISCOUNT_PERCENT`, `DATE_START`, `DATE_END`, `STATUS`) VALUES
(1, 1, 0.20, '2025-05-14', '2025-05-22', 'Available'),
(2, 3, 0.20, '2025-05-14', '2025-05-30', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `featureds`
--

CREATE TABLE `featureds` (
  `FEATURED_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) DEFAULT NULL,
  `isFeatured` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featureds`
--

INSERT INTO `featureds` (`FEATURED_ID`, `PRODUCT_ID`, `isFeatured`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `INVENTORY_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) DEFAULT NULL,
  `STACK_QUANTITY` int(11) DEFAULT NULL,
  `RESTOCK_DATE` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`INVENTORY_ID`, `PRODUCT_ID`, `STACK_QUANTITY`, `RESTOCK_DATE`) VALUES
(1, 1, 18, '2025-05-13'),
(2, 2, 13, '2025-05-13'),
(3, 3, 85, '2025-05-13'),
(4, 4, 100, '2025-05-15'),
(5, 5, 80, '2025-05-15'),
(6, 6, 60, '2025-05-15'),
(7, 7, 42, '2025-05-15'),
(8, 8, 50, '2025-05-15'),
(9, 9, 100, '2025-05-15'),
(10, 10, 60, '2025-05-15'),
(11, 11, 50, '2025-05-15'),
(12, 12, 40, '2025-05-15'),
(13, 13, 50, '2025-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `CODE` varchar(100) DEFAULT NULL,
  `TOTAL_PRICE` decimal(10,2) DEFAULT NULL,
  `CLAIM_DATE` date DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `RESTOCKED` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ORDER_ID`, `CUSTOMER_ID`, `CODE`, `TOTAL_PRICE`, `CLAIM_DATE`, `STATUS`, `RESTOCKED`) VALUES
(14, 1, 'ORD-C14AF5', 191.00, '2025-05-15', 'Paid', 0),
(15, 1, 'ORD-77ED18', 175.00, '2025-05-15', 'Expired', 0),
(16, 1, 'ORD-4FF412', 176.00, '2025-05-15', 'Paid', 0),
(17, 1, 'ORD-F67B5F', 352.00, '2025-05-15', 'Paid', 0),
(18, 1, 'ORD-E6E256', 105.00, '2025-05-15', 'Expired', 0),
(19, 1, 'ORD-AD4B75', 3600.00, '2025-05-15', 'Expired', 1),
(20, 1, 'ORD-CF12D9', 450.00, '2025-05-16', 'Paid', 0),
(21, 1, 'ORD-B4B518', 6000.00, '2025-05-16', 'Expired', 0),
(22, 1, 'ORD-0A913F', 30.00, '2025-05-16', 'Expired', 1),
(23, 1, 'ORD-E98547', 6000.00, '2025-05-16', 'Paid', 0),
(24, 1, 'ORD-7E8085', 4000.00, '2025-05-16', 'Expired', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `RESERVATION_ID` int(11) DEFAULT NULL,
  `TOTAL_PRICE` int(11) DEFAULT NULL,
  `PAYMENT_DATE` date DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 'shorts', 300, 'assets/ProductImages/shorts.jpg', 'Clothes'),
(11, 'Imported Jackets', 200, 'assets/ProductImages/Jackets.jfif', 'Clothes'),
(12, 'Apples', 30, 'assets/ProductImages/apple.jfif', 'Fruits'),
(13, 'Mango', 30, 'assets/ProductImages/mangoes.jfif', 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `reserveitems`
--

CREATE TABLE `reserveitems` (
  `ITEM_ID` int(11) NOT NULL,
  `CART_ID` int(11) DEFAULT NULL,
  `ORDER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reserveitems`
--

INSERT INTO `reserveitems` (`ITEM_ID`, `CART_ID`, `ORDER_ID`) VALUES
(7, 14, 14),
(8, 15, 14),
(9, 16, 14),
(10, 14, 15),
(11, 15, 15),
(12, 14, 16),
(13, 16, 16),
(14, 16, 17),
(15, 15, 18),
(16, 17, 19),
(17, 17, 20),
(18, 18, 21),
(19, 15, 22),
(20, 18, 23),
(21, 18, 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`DISCOUNT_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indexes for table `featureds`
--
ALTER TABLE `featureds`
  ADD PRIMARY KEY (`FEATURED_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`INVENTORY_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `CUSTOMER_ID` (`CUSTOMER_ID`),
  ADD KEY `RESERVATION_ID` (`RESERVATION_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`);

--
-- Indexes for table `reserveitems`
--
ALTER TABLE `reserveitems`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `CART_ID` (`CART_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CUSTOMER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `DISCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `featureds`
--
ALTER TABLE `featureds`
  MODIFY `FEATURED_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `INVENTORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reserveitems`
--
ALTER TABLE `reserveitems`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `products` (`PRODUCT_ID`);

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `products` (`PRODUCT_ID`);

--
-- Constraints for table `featureds`
--
ALTER TABLE `featureds`
  ADD CONSTRAINT `featureds_ibfk_1` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `products` (`PRODUCT_ID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `products` (`PRODUCT_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`CUSTOMER_ID`) REFERENCES `customers` (`CUSTOMER_ID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`RESERVATION_ID`) REFERENCES `reserveitems` (`ITEM_ID`);

--
-- Constraints for table `reserveitems`
--
ALTER TABLE `reserveitems`
  ADD CONSTRAINT `reserveitems_ibfk_1` FOREIGN KEY (`CART_ID`) REFERENCES `cart` (`CART_ID`),
  ADD CONSTRAINT `reserveitems_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `orders` (`ORDER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
