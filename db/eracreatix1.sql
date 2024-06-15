-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 01:58 PM
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
-- Database: `eracreatix`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `for_order` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `shippingName` varchar(300) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCountry` varchar(255) DEFAULT NULL,
  `billingName` varchar(255) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCountry` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `for_order`, `mobile_no`, `shippingName`, `shippingAddress`, `shippingCity`, `shippingPincode`, `shippingState`, `shippingCountry`, `billingName`, `billingAddress`, `billingCity`, `billingPincode`, `billingState`, `billingCountry`, `status`, `regDate`, `updationDate`) VALUES
(1, '19', 'order_666450b6342e3', '794512', 'Full', 'jaipalpur ramnagar jaunpur', 'Jaunpur', 222202, 'Uttar Pradesh', 'India', 'Full', 'jaipalpur ramnagar jaunpur', 'Jaunpur', 222202, 'Uttar Pradesh', 'India', 0, '2024-06-08 02:08:14', NULL),
(2, '19', 'order_6664534783005', '79465132', 'Full', 'jaipalpur ramnagar jaunpur', 'Jaunpur', 222202, 'Uttar Pradesh', 'India', 'Full', 'jaipalpur ramnagar jaunpur', 'Jaunpur', 222202, 'Uttar Pradesh', 'India', 0, '2024-06-08 02:19:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2017-01-24 16:21:18', '21-06-2018 08:27:55 PM');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `quantity`, `size`, `color`, `postingDate`) VALUES
(12, 19, 22, 1, '30', ' Green', '2024-06-08 13:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryImage` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryImage`, `creationDate`, `updationDate`) VALUES
(11, 'Gifts', '1716037793.png', '2024-04-20 12:00:55', '18-05-2024 06:39:53 PM'),
(23, 'Lamps', '1713615738.png', '2024-04-20 12:22:18', NULL),
(25, 'Toys', '1714825490.png', '2024-05-04 12:24:50', NULL),
(26, 'Decore', '1717068727.png', '2024-05-30 11:32:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `GSTN` varchar(255) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `size`, `color`, `address`, `order_id`, `transaction_id`, `GSTN`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 19, '22', 2, '20', 'Black', '1', 'order_666450b6342e3', NULL, '79465132564', '2024-06-08 02:08:14', 'COD', 'In Process'),
(2, 19, '2', 1, 'null', 'null', '2', 'order_6664534783005', NULL, NULL, '2024-06-12 02:19:11', 'COD', NULL),
(3, 19, '3', 1, 'null', 'null', '2', 'order_6664534783005', NULL, NULL, '2024-06-12 02:19:11', 'COD', NULL),
(4, 19, '27', 1, '20', 'Red', '1', 'order_666450b6342e3', NULL, '79465132564', '2024-06-13 02:08:14', 'COD', 'fse'),
(5, 19, '3', 1, 'null', 'null', '2', 'order_6664534783005', NULL, NULL, '2024-06-12 02:19:11', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `message`, `postingDate`) VALUES
(35, 1, 'In Process', 'Product ready for Shipping', 'on way', '2024-06-12 11:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `skuId` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `productHighlight` longtext DEFAULT 'No highlight available',
  `additionalInfo` longtext DEFAULT 'no info available',
  `productrefundandExchange` longtext DEFAULT 'no refund policy',
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `productImage4` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `skuId`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `size`, `color`, `productHighlight`, `additionalInfo`, `productrefundandExchange`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `productImage4`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 'SKUID', 11, 3, 'Micromax 81cm (32) HD Ready LED TV  (32T6175MHD, 2 x HDMI, 2 x USB)', 'Micromax test', 139900, 200000, '', '', '                                                    	                                                    	                                                    	                                                    	No highlight available																					', 'no info available', 'no refund policy', '<div class=\"HoUsOy\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; font-size: 18px; white-space: nowrap; line-height: 1.4; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\">General</div><ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sales Package</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">1 TV Unit, Remote Controller, Battery (For Remote Controller), Quick Installation Guide and User Manual: All in One, Wall Mount Support</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Model Name</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">32T6175MHD</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Display Size</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">81 cm (32)</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Screen Type</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">LED</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">HD Technology &amp; Resolutiontest</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">HD Ready, 1366 x 768</li></ul></li></ul>', 'micromax1.jpeg', 'micromax main image.jpg', 'micromax main image.jpg', NULL, 1200, 'Out of Stock', '2017-01-30 16:54:35', ''),
(2, 'SKUID', 23, 4, 'Apple iPhone 6 (Silver, 16 GB)', 'Apple INC', 36990, 50000, '10', 'red', '                                                    	                                                    	                                                    	No highlight available																																							', 'no info available', 'no refund policy', '<div class=\"_2PF8IO\" style=\"box-sizing: border-box; margin: 0px 0px 0px 110px; padding: 0px; flex: 1 1 0%; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px;\"><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">1 GB RAM | 16 GB ROM |</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">4.7 inch Retina HD Display</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">8MP Primary Camera | 1.2MP Front</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Li-Ion Battery</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">A8 Chip with 64-bit Architecture and M8 Motion Co-processor Processor</li></ul></div>', 'apple-iphone-6-1.jpeg', 'apple-iphone-6-2.jpeg', 'apple-iphone-6-3.jpeg', NULL, 0, 'Out of Stock', '2017-01-30 16:59:00', ''),
(3, NULL, 25, 4, 'Redmi Note 4 (Gold, 32 GB)  (With 3 GB RAM)', 'Redmi', 10999, 15000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<br><div><ol><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5.5 inch Full HD Display<br></li><li>13MP Primary Camera | 5MP Front<br></li><li>4100 mAh Li-Polymer Battery<br></li><li>Qualcomm Snapdragon 625 64-bit Processor<br></li></ol></div>', 'mi-redmi-note-4-1.jpeg', 'mi-redmi-note-4-2.jpeg', 'mi-redmi-note-4-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:03:15', ''),
(4, NULL, 11, 4, 'Lenovo K6 Power (Silver, 32 GB) ', 'Lenovo', 9999, 11000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5 inch Full HD Display<br></li><li>13MP Primary Camera | 8MP Front<br></li><li>4000 mAh Li-Polymer Battery<br></li><li>Qualcomm Snapdragon 430 Processor<br></li></ul>', 'lenovo-k6-power-k33a42-1.jpeg', 'lenovo-k6-power-k33a42-2.jpeg', 'lenovo-k6-power-k33a42-3.jpeg', NULL, 45, 'In Stock', '2017-02-04 04:04:43', ''),
(5, NULL, 23, 4, 'Lenovo Vibe K5 Note (Gold, 32 GB)  ', 'Lenovo', 11999, 13000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5.5 inch Full HD Display<br></li><li>13MP Primary Camera | 8MP Front<br></li><li>3500 mAh Li-Ion Polymer Battery<br></li><li>Helio P10 64-bit Processor<br></li></ul>', 'lenovo-k5-note-pa330010in-1.jpeg', 'lenovo-k5-note-pa330116in-2.jpeg', 'lenovo-k5-note-pa330116in-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:06:17', ''),
(6, NULL, 25, 4, 'Micromax Canvas Mega 4G', 'Micromax', 6999, 8999, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>3 GB RAM | 16 GB ROM |<br></li><li>5.5 inch HD Display<br></li><li>13MP Primary Camera | 5MP Front<br></li><li>2500 mAh Battery<br></li><li>MT6735 Processor<br></li></ul>', 'micromax-canvas-mega-4g-1.jpeg', 'micromax-canvas-mega-4g-2.jpeg', 'micromax-canvas-mega-4g-3.jpeg', NULL, 35, 'In Stock', '2017-02-04 04:08:07', ''),
(7, NULL, 11, 4, 'SAMSUNG Galaxy On5', 'SAMSUNG', 7490, 8000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>1.5 GB RAM | 8 GB ROM | Expandable Upto 128 GB<br></li><li>5 inch HD Display<br></li><li>8MP Primary Camera | 5MP Front<br></li><li>2600 mAh Li-Ion Battery<br></li><li>Exynos 3475 Processor<br></li></ul>', 'samsung-galaxy-on7-sm-1.jpeg', 'samsung-galaxy-on5-sm-2.jpeg', 'samsung-galaxy-on5-sm-3.jpeg', NULL, 20, 'In Stock', '2017-02-04 04:10:17', ''),
(8, NULL, 23, 4, 'OPPO A57', 'OPPO', 14990, 15000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 256 GB<br></li><li>5.2 inch HD Display<br></li><li>13MP Primary Camera | 16MP Front<br></li><li>2900 mAh Battery<br></li><li>Qualcomm MSM8940 64-bit Processor<br></li></ul>', 'oppo-a57-na-original-1.jpeg', 'oppo-a57-na-original-2.jpeg', 'oppo-a57-na-original-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:11:54', ''),
(9, NULL, 25, 5, 'Affix Back Cover for Mi Redmi Note 4', 'Techguru', 259, 500, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>Suitable For: Mobile<br></li><li>Material: Polyurethane<br></li><li>Theme: No Theme<br></li><li>Type: Back Cover<br></li><li>Waterproof<br></li></ul>', 'amzer-amz98947-original-1.jpeg', 'amzer-amz98947-original-2.jpeg', 'amzer-amz98947-original-3.jpeg', NULL, 10, 'In Stock', '2017-02-04 04:17:03', ''),
(11, NULL, 11, 6, 'Acer ES 15 Pentium Quad Core', 'Acer', 19990, 22000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>Intel Pentium Quad Core Processor ( )<br></li><li>4 GB DDR3 RAM<br></li><li>Linux/Ubuntu Operating System<br></li><li>1 TB HDD<br></li><li>15.6 inch Display<br></li></ul>', 'acer-aspire-notebook-original-1.jpeg', 'acer-aspire-notebook-original-2.jpeg', 'acer-aspire-notebook-original-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:26:17', ''),
(12, NULL, 23, 6, 'Micromax Canvas Laptab II (WIFI) Atom 4th Gen', 'Micromax', 10999, 15000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>Intel Atom Processor ( 4th Gen )<br></li><li>2 GB DDR3 RAM<br></li><li>32 bit Windows 10 Operating System<br></li><li>11.6 inch Touchscreen Display<br></li></ul>', 'micromax-lt777w-2-in-1-laptop-original-1.jpeg', 'micromax-lt777w-2-in-1-laptop-original-2.jpeg', 'micromax-lt777w-2-in-1-laptop-original-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:28:17', ''),
(13, NULL, 25, 6, 'HP Core i5 5th Gen', 'HP', 41990, 42000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">HP Core i5 5th Gen - (4 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) N8M28PA 15-ac123tx Notebook</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(15.6 inch, Turbo SIlver, 2.19 kg)</span><br><div><ul><li>Intel Core i5 Processor ( 5th Gen )<br></li><li>4 GB DDR3 RAM<br></li><li>64 bit Windows 10 Operating System<br></li><li>1 TB HDD<br></li><li>15.6 inch Display<br></li></ul></div>', 'hp-notebook-original-1.jpeg', 'hp-notebook-original-2.jpeg', 'hp-notebook-original-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:30:24', ''),
(14, NULL, 11, 6, 'Lenovo Ideapad 110 APU Quad Core A6 6th Gen', 'Lenovo', 22990, 229900, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Lenovo Ideapad 110 APU Quad Core A6 6th Gen - (4 GB/500 GB HDD/Windows 10 Home) 80TJ00D2IH IP110 15ACL Notebook</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(15.6 inch, Black, 2.2 kg)</span><br><div><ul><li>AMD APU Quad Core A6 Processor ( 6th Gen )<br></li><li>4 GB DDR3 RAM<br></li><li>64 bit Windows 10 Operating System<br></li><li>500 GB HDD<br></li><li>15.6 inch Display<br></li></ul></div>', 'lenovo-ideapad-notebook-original-1.jpeg', 'lenovo-ideapad-notebook-original-2.jpeg', 'lenovo-ideapad-notebook-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:32:15', ''),
(15, NULL, 23, 8, 'The Wimpy Kid Do -It- Yourself Book', 'ABC', 205, 250, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">The Wimpy Kid Do -It- Yourself Book</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(English, Paperback, Jeff Kinney)</span><br><div><ul><li>Language: English<br></li><li>Binding: Paperback<br></li><li>Publisher: Penguin Books Ltd<br></li><li>ISBN: 9780141339665, 0141339667<br></li><li>Edition: 1<br></li></ul></div>', 'diary-of-a-wimpy-kid-do-it-yourself-book-original-1.jpeg', 'diary-of-a-wimpy-kid-do-it-yourself-book-original-1.jpeg', 'diary-of-a-wimpy-kid-do-it-yourself-book-original-1.jpeg', NULL, 50, 'In Stock', '2017-02-04 04:35:13', ''),
(16, NULL, 25, 8, 'Thea Stilton and the Tropical Treasure ', 'XYZ', 240, 399, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul><li>Language: English<br></li><li>Binding: Paperback<br></li><li>Publisher: Scholastic<br></li><li>ISBN: 9789351032083, 9351032086<br></li><li>Edition: 2015<br></li><li>Pages: 176<br></li></ul>', '22-thea-stilton-and-the-tropical-treasure-original-1.jpeg', '22-thea-stilton-and-the-tropical-treasure-original-1.jpeg', '22-thea-stilton-and-the-tropical-treasure-original-1.jpeg', NULL, 30, 'In Stock', '2017-02-04 04:36:23', ''),
(17, NULL, 11, 9, 'Induscraft Solid Wood King Bed With Storage', 'Induscraft', 32566, 34999, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Induscraft Solid Wood King Bed With Storage</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(Finish Color - Honey Brown)</span><br><div><ul><li>Material Subtype: Rosewood (Sheesham)<br></li><li>W x H x D: 1850 mm x 875 mm x 2057.5 mm<br></li><li>Floor Clearance: 8 mm<br></li><li>Delivery Condition: Knock Down<br></li></ul></div>', 'inaf245-queen-rosewood-sheesham-induscraft-na-honey-brown-original-1.jpeg', 'inaf245-queen-rosewood-sheesham-induscraft-na-honey-brown-original-2.jpeg', 'inaf245-queen-rosewood-sheesham-induscraft-na-honey-brown-original-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:40:37', ''),
(18, NULL, 23, 10, 'Nilkamal Ursa Metal Queen Bed', 'Nilkamal', 6523, 7999, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">@home by Nilkamal Ursa Metal Queen Bed</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(Finish Color - NA)</span><br><div><ul><li>Material Subtype: Carbon Steel<br></li><li>W x H x D: 1590 mm x 910 mm x 2070 mm<br></li><li>Floor Clearance: 341 mm<br></li><li>Delivery Condition: Knock Down<br></li></ul></div>', 'flbdorsabrqbblk-queen-carbon-steel-home-by-nilkamal-na-na-original-1.jpeg', 'flbdorsabrqbblk-queen-carbon-steel-home-by-nilkamal-na-na-original-2.jpeg', 'flbdorsabrqbblk-queen-carbon-steel-home-by-nilkamal-na-na-original-3.jpeg', NULL, 0, 'In Stock', '2017-02-04 04:42:27', ''),
(19, NULL, 25, 12, 'Asian Casuals  (White, White)', 'Asian', 379, 400, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Colour: White, White</li><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Outer Material: Denim</li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><br></div></li></ul>', '1.jpeg', '2.jpeg', '3.jpeg', NULL, 45, 'In Stock', '2017-03-10 20:16:03', ''),
(20, NULL, 11, 12, 'Adidas MESSI 16.3 TF Football turf Shoes  (Blue)', 'Adidas', 4129, 5000, NULL, NULL, 'No highlight available', 'no info available', 'no refund policy', '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Colour: Blue</li><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Closure: Laced</li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Weight</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>200 g (per single Shoe) - Weight of the product may vary depending on size.</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Style</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Panel and Stitch Detail, Textured Detail</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Tip Shape</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Round</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Season</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>AW16</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Closure</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Laced</b></li></ul></li></ul>', '1.jpeg', '2.jpeg', '3.jpeg', NULL, 0, 'In Stock', '2017-03-10 20:19:22', ''),
(21, 'SKUID', 11, 13, 'sTICKER', 'eRAcREATIX', 400, 1000, NULL, NULL, 'fsefse', 'fsefse', 'fsefse', 'fsefse', 'post_5.png', 'post_4.png', 'post_5.png', NULL, 10, 'In Stock', '2024-05-30 11:47:25', NULL),
(22, 'SKUID', 11, 13, 'sTICKER', 'eRAcREATIX', 400, 1000, '50, 50, 100', 'Red,  Green,  Black, Grey', '                                                    se', 'fes', 'fse', 'fes', 'comment_2.png', 'comment_1.png', 'comment_3.png', NULL, 10, 'In Stock', '2024-05-31 13:00:46', NULL),
(27, 'SKUID', 11, 13, 'sTICKER', 'eRAcREATIX', 400, 1000, '10, 10', 'red, red', 'fse', 'fes', 'fes', 'fes', '1.jfif', '1.jfif', '2.jpg', '2.jpg', 0, 'In Stock', '2024-06-10 12:08:17', NULL),
(28, 'SKUID', 11, 13, 'sTICKER', 'eRAcREATIX', 400, 1000, '10, 50', 'red, Grey', 'fes', 'fes', 'fes', 'fse', '1.jfif', '2.jpg', '3.jpg', '1.jfif', 10, 'In Stock', '2024-06-10 12:10:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `review_reply` varchar(255) NOT NULL,
  `reply_by` varchar(255) NOT NULL,
  `created_on` bigint(20) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `subcategoryImage` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `subcategoryImage`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Led Television', NULL, '2017-01-26 16:24:52', '26-01-2017 11:03:40 PM'),
(3, 4, 'Television', NULL, '2017-01-26 16:29:09', ''),
(4, 4, 'Mobiles', NULL, '2017-01-30 16:55:48', ''),
(5, 4, 'Mobile Accessories', NULL, '2017-02-04 04:12:40', ''),
(6, 4, 'Laptops', NULL, '2017-02-04 04:13:00', ''),
(7, 4, 'Computers', NULL, '2017-02-04 04:13:27', ''),
(8, 3, 'Comics', NULL, '2017-02-04 04:13:54', ''),
(9, 5, 'Beds', NULL, '2017-02-04 04:36:45', ''),
(10, 5, 'Sofas', NULL, '2017-02-04 04:37:02', ''),
(11, 5, 'Dining Tables', NULL, '2017-02-04 04:37:51', ''),
(12, 6, 'Men Footwears', NULL, '2017-03-10 20:12:59', ''),
(13, 11, 'Wall Stickers', '1716812415.png', '2024-05-27 12:20:15', NULL),
(14, 11, 'Fresh', '1717336019.png', '2024-06-01 09:41:22', '02-06-2024 07:16:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-04 14:50:55', NULL, 1),
(2, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-06 15:56:52', NULL, 1),
(3, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-06 16:14:02', NULL, 1),
(4, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-06 16:14:32', NULL, 1),
(5, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-06 16:15:29', NULL, 1),
(6, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-06 16:16:46', NULL, 1),
(7, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-08 12:35:40', NULL, 1),
(8, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-08 12:45:58', NULL, 1),
(9, 'yash@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-08 13:05:40', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `regDate`, `updationDate`) VALUES
(1, 'Anuj Kumar', 'anuj.lpu1@gmail.com', 9009857868, 'f925916e2754e5e03f75dd58a5733251', '2017-02-04 19:30:50', ''),
(19, 'Yash', 'yash@gmail.com', 9876543210, '827ccb0eea8a706c4c34a16891f84e7b', '2024-04-25 12:11:56', NULL),
(24, 'Yash', 'user@user.com', 9876543210, '827ccb0eea8a706c4c34a16891f84e7b', '2024-04-26 11:52:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
