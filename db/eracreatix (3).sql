-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2024 at 11:58 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eracreatix`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `for_order` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `shippingName` varchar(300) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCountry` varchar(255) DEFAULT NULL,
  `billingName` varchar(255) DEFAULT NULL,
  `billingAddress` longtext,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCountry` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `for_order`, `mobile_no`, `shippingName`, `shippingAddress`, `shippingCity`, `shippingPincode`, `shippingState`, `shippingCountry`, `billingName`, `billingAddress`, `billingCity`, `billingPincode`, `billingState`, `billingCountry`, `status`, `regDate`, `updationDate`) VALUES
(7, '25', NULL, '9984087027', 'BAL ANAND PATEL', 'MUNGRA Badshahpur', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 'BAL ANAND PATEL', 'MUNGRA Badshahpur', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 0, '2024-06-12 23:26:50', NULL),
(8, '25', 'era_666ac262c58b2', '9984087027', 'BAL ANAND PATEL', 'MUNGRA Badshahpur', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 'BAL ANAND PATEL', 'MUNGRA Badshahpur', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 0, '2024-06-12 23:26:51', NULL),
(9, '1', NULL, '9984087027', 'BAL ANAND PATEL', 'NH31 NEAR GREEN GARDEN', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 'BAL ANAND PATEL', 'NH31 NEAR GREEN GARDEN', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 0, '2024-06-13 01:33:45', NULL),
(10, '1', 'era_666ae021a6410', '9984087027', 'BAL ANAND PATEL', 'NH31 NEAR GREEN GARDEN', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 'BAL ANAND PATEL', 'NH31 NEAR GREEN GARDEN', 'JAUNPUR', 222202, 'Uttar Pradesh', 'India', 0, '2024-06-13 01:33:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '2017-01-24 16:21:18', '13-06-2024 02:23:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '1',
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryImage` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryImage`, `creationDate`, `updationDate`) VALUES
(27, 'Green Vegitalble', '1717646298.png', '2024-06-06 03:58:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `address` longtext,
  `order_id` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `GSTN` varchar(255) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `size`, `color`, `address`, `order_id`, `transaction_id`, `GSTN`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(13, 25, '29', 1, 'NEW SIZE', 'COLOR RED', '7', 'era_666ac2cf07dfb', NULL, 'null', '2024-06-12 23:28:39', 'COD', NULL),
(14, 25, '30', 1, 'product size', 'product color', '7', 'era_666adeddcc4f5', NULL, 'null', '2024-06-13 01:28:21', 'COD', NULL),
(15, 25, '30', 4, 'product size', 'product color', '7', 'era_666ae0716af3f', NULL, 'GABKKKKKK', '2024-06-13 01:35:05', 'COD', 'In Process'),
(16, 25, '29', 2, 'NEW SIZE', 'COLOR RED', '7', 'era_666ae0716af3f', NULL, 'GABKKKKKK', '2024-06-13 01:35:05', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
`id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `message` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `message`, `postingDate`) VALUES
(3, 15, 'In Process', 'Product ready for Shipping', 'ok', '2024-06-15 11:35:03'),
(4, 15, 'In Process', 'Product out for delivery', 'kk', '2024-06-15 11:41:57'),
(5, 15, 'In Process', 'Product out for delivery', 'kk', '2024-06-15 11:42:47'),
(6, 15, 'In Process', 'Product out for delivery', 'kk', '2024-06-15 11:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
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
  `productHighlight` varchar(255) DEFAULT 'No highlight available',
  `additionalInfo` varchar(255) DEFAULT 'no info available',
  `productrefundandExchange` varchar(255) DEFAULT 'no refund policy',
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `productImage4` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `skuId`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `size`, `color`, `productHighlight`, `additionalInfo`, `productrefundandExchange`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `productImage4`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(29, 'SKUIDNW', 27, 15, 'Amul Milk', 'Amul', 22, 25, 'NEW SIZE', 'COLOR RED', '                                                    	                                                    	                                                    	                                                    	                                           ', 'Genpact is a professional services firm legally domiciled in Bermuda with its headquarters in New York City, New York', 'Genpact is a professional services firm legally domiciled in Bermuda with its headquarters in New York City, New York', 'Genpact is a professional services firm legally domiciled in Bermuda with its headquarters in New York City, New York', '2022-07-20.jpg', 'download.jpg', 'drycoconut.jpg', 'Ginger.jpg', 0, 'In Stock', '2024-06-10 12:22:13', NULL),
(30, 'NEWSKU', 27, 15, 'SECOND PRO', 'Product Company', 15, 20, 'product size', 'product color', 'Highlight', 'Addition info', 'Return', 'Description', 'astangik.JPG', 'astangik.webp', 'p3.JPG', 'p1.JPG', 20, 'In Stock', '2024-06-13 08:58:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE IF NOT EXISTS `review_table` (
`review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `review_reply` varchar(255) NOT NULL,
  `reply_by` varchar(255) NOT NULL,
  `created_on` bigint(20) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
`id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `subcategoryImage` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `subcategoryImage`, `creationDate`, `updationDate`) VALUES
(15, 27, 'Tomato', '1718021928.png', '2024-06-06 03:58:34', '10-06-2024 05:48:48 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
`id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(8, 'giplanand@gmail.com', 0x3130332e3232362e3230322e32343000, '2024-06-06 04:18:30', NULL, 0),
(9, 'giplanand@gmail.com', 0x3130332e3232362e3230322e32343000, '2024-06-06 04:18:39', NULL, 0),
(10, 'yash@gmail.com', 0x3135322e35382e3133312e3231320000, '2024-06-08 13:04:16', NULL, 0),
(11, 'yash@gmail.com', 0x3135322e35382e3133312e3231320000, '2024-06-08 13:04:26', NULL, 0),
(12, 'yash@gmail.com', 0x3135322e35382e3133312e3536000000, '2024-06-08 13:05:04', NULL, 1),
(13, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:23:19', NULL, 0),
(14, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:23:27', NULL, 1),
(15, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:27:02', NULL, 1),
(16, 'yash@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:28:05', NULL, 1),
(17, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:30:25', NULL, 1),
(18, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:34:30', NULL, 1),
(19, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:34:45', NULL, 1),
(20, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:43:17', NULL, 1),
(21, 'giplanand@gmail.com', 0x3130332e3232362e3230322e31393900, '2024-06-10 12:48:58', NULL, 1),
(22, 'sandeep.vortex368@gmail.com', 0x3135322e35392e3137362e3133330000, '2024-06-11 07:00:09', NULL, 0),
(23, 'sandeep.vortex368@gmail.com', 0x3135322e35392e3137362e3133330000, '2024-06-11 07:01:15', NULL, 1),
(24, 'giplanand@gmail.com', 0x3130332e3232362e3230312e32320000, '2024-06-11 10:26:19', NULL, 1),
(25, 'sandeep.vortex368@gmail.com', 0x3135322e35382e3135372e3139340000, '2024-06-11 17:41:41', NULL, 1),
(26, 'sandeep.vortex368@gmail.com', 0x3135322e35382e3138342e3135310000, '2024-06-12 04:33:46', NULL, 1),
(27, 'giplanand@gmail.com', 0x3130332e3232362e3230312e32320000, '2024-06-12 08:57:09', NULL, 1),
(28, 'sandeep.vortex368@gmail.com', 0x3135322e35392e3137372e3233360000, '2024-06-12 13:25:53', NULL, 1),
(29, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 09:09:16', NULL, 1),
(30, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 09:13:12', NULL, 1),
(31, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 09:18:37', NULL, 1),
(32, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 09:53:35', NULL, 1),
(33, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 09:54:32', NULL, 1),
(34, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 11:35:35', NULL, 1),
(35, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 12:04:22', NULL, 1),
(36, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 12:45:11', NULL, 1),
(37, 'giplanand@gmail.com', 0x3a3a3100000000000000000000000000, '2024-06-13 12:45:21', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `regDate`, `updationDate`) VALUES
(25, 'ANAND PATEL', 'giplanand@gmail.com', 9984087027, '202cb962ac59075b964b07152d234b70', '2024-06-03 03:28:53', NULL),
(26, 'Yash', 'yash@gmail.com', 7987997878, '827ccb0eea8a706c4c34a16891f84e7b', '2024-06-08 13:04:53', NULL),
(27, 'Sandeep Sampoorna', 'sandeep.vortex368@gmail.com', 8853858797, '3347a705e7ab944a2c5fad5fd68a2eca', '2024-06-11 07:00:47', NULL);

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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
