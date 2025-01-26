-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2025 at 05:40 PM
-- Server version: 11.6.2-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(2, 'Sayan', 'admin', 'ayosynk0@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'COMPANY2'),
(3, 'COMPANY3'),
(4, 'COMPANY4'),
(5, 'COMPANY1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Mobile Phones'),
(5, 'Software'),
(7, 'Footwear'),
(9, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'product-16', 4, 3, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 0),
(2, 'product-15', 2, 5, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 0),
(3, 'product-14', 4, 2, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(4, 'product-13', 4, 3, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 0),
(5, 'product-12', 2, 2, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(6, 'product-11', 4, 5, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(7, 'product-10', 4, 2, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 0),
(8, 'product-9', 4, 2, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 0),
(11, 'product-8', 3, 4, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(12, 'product-7', 4, 2, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(13, 'product-6', 1, 5, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(15, 'product-5', 4, 2, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 0),
(16, 'product-4', 3, 4, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(17, 'product-3', 3, 4, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(18, 'product-2', 3, 4, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(19, 'product-1', 4, 5, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/1972aa1df3.jpg', 1),
(22, 'product-17', 5, 3, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/6242669449.jpg', 1),
(23, 'product-18', 7, 3, '<p class=\"text-white\">Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your products.<br />Details of your product and whatever and whatever</p>', 999.00, 'uploads/df0d68fb50.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
