-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 07:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mens_apparal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pid` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pid`, `customer_id`, `price`, `qty`, `date_updated`) VALUES
(73, 17, 1, 450, 1, '2022-10-02 16:51:17'),
(85, 3, 3, 550, 1, '2022-10-02 23:13:03'),
(86, 3, 3, 550, 1, '2022-10-02 23:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cat_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `sub_category` int(255) NOT NULL,
  `cart_button` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `is_deleted`, `date_updated`, `sub_category`, `cart_button`) VALUES
(1, 'Shoe', 'download.jfif', 1, '2022-09-11 11:19:40', 0, 0),
(2, 'Slipers', 'images.jfif', 1, '2022-09-05 21:19:24', 0, 0),
(3, 'Slipers', 'images.jfif', 1, '2022-09-05 21:22:19', 7, 0),
(4, 'dd', 'images.jfif', 1, '2022-09-05 21:21:35', 0, 0),
(5, 'Phone Acc', 'hImYqMss.png', 1, '2022-09-05 22:23:22', 0, 0),
(6, '', 'bottles-famous-global-beer-brands-poznan-pol-mar-including-heineken-becks-bud-miller-corona-stella-artois-san-miguel-143170440.jpg', 1, '2022-10-01 10:17:33', 0, 0),
(7, 'Shirts', 'Basin Mixer.jpg', 0, '2022-10-01 10:18:50', 0, 0),
(8, 'Trouser', 'bottles-famous-global-beer-brands-poznan-pol-mar-including-heineken-becks-bud-miller-corona-stella-artois-san-miguel-143170440.jpg', 0, '2022-10-01 10:20:19', 0, 1),
(9, 'Burger', 'download.jfif', 0, '2022-10-01 14:49:14', 9, 0),
(10, 'Burger', 'download.jfif', 1, '2022-10-01 14:49:15', 7, 0),
(11, 'Burger', 'fast-food.jpg', 1, '2022-10-01 14:49:40', 7, 0),
(12, 'Tacos', 'aussie-style-beef-and-salad-tacos-86525-1.jpeg', 0, '2022-10-01 15:35:24', 7, 0),
(13, 'Dew', 'dsd.PNG', 1, '2022-10-01 22:24:45', 0, 0),
(14, 'Dews', 'dsd.PNG', 1, '2022-10-01 22:26:14', 0, 0),
(15, 'Main', 'download.jfif', 1, '2022-10-02 13:43:02', 0, 0),
(16, 'dew', 'download.jfif', 1, '2022-10-02 13:43:56', 0, 0),
(17, 'dew', 'download.jfif', 1, '2022-10-02 13:44:36', 0, 0),
(18, 'dew', 'download.jfif', 1, '2022-10-02 13:46:58', 0, 1),
(19, 'dew', 'Basin Mixer.jpg', 1, '2022-10-02 13:48:13', 7, 0),
(20, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:27', 8, 0),
(21, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:29', 8, 0),
(22, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:48', 8, 0),
(23, 'Beer', 'images.jfif', 1, '2022-10-02 15:37:55', 8, 0),
(24, 'Dew', 'Basin Mixer.jpg', 0, '2022-10-16 17:02:54', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `color_code`, `is_deleted`, `date_updated`) VALUES
(1, 'Black', '#000', 0, '2022-10-16 21:18:18'),
(2, 'Red', '#000', 1, '2022-10-16 21:25:15'),
(3, 'Red', '#FF0000', 0, '2022-10-16 21:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `subject`, `message`, `date_updated`) VALUES
(4, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', 'sas', '2022-09-12 22:35:23'),
(5, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', 'dsds', '2022-09-15 10:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `phone`, `nic`, `address`, `gender`, `password`, `is_deleted`) VALUES
(1, '', 'admin', '', '', '', 0, '123456', 0),
(2, 'Thilini Maheshika', 'thili@gmail.com', '0713664071', '962670426G', 'Banwalgodalla, Kosmulla', 2, '123456', 1),
(3, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', '0713664071', '962670426G', 'Banwalgodalla, Kosmulla', 1, '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(2) NOT NULL,
  `pid` int(2) NOT NULL,
  `order_qty` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `pid`, `order_qty`, `price`) VALUES
(33, 31, 3, 1, 550),
(34, 31, 17, 1, 450),
(35, 33, 17, 1, 450);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_highlight` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_qty` int(255) NOT NULL,
  `product_active` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `size_id` int(255) NOT NULL,
  `color_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `product_name`, `product_description`, `product_highlight`, `product_price`, `product_qty`, `product_active`, `date_updated`, `is_deleted`, `product_image`, `cat_id`, `size_id`, `color_id`) VALUES
(1, 'Arract', 'we are selling ml you can buy ml wise', '35.8 alcohol', 250, 1700, 1, '2022-10-03 00:47:49', 1, 'images.jfif', 20, 0, 0),
(3, 'Chicken Burger', 'World best bag', 'Best Bag', 55, 18, 1, '2022-10-02 20:16:38', 0, 'fast-food.jpg', 9, 1, 1),
(9, 'Tops', 'ss', 's', 4500, 5, 0, '2022-09-11 12:09:22', 1, 'images.jfif', 1, 0, 0),
(10, 'Office Slipers', 'ss', 'ss', 2500, 50, 0, '2022-09-11 12:11:27', 1, 'download.jfif', 3, 0, 0),
(11, 'Office Casual', 'sss', 'best slipers', 4500, 5, 0, '2022-09-11 12:07:26', 1, 'download.jfif', 3, 0, 0),
(12, 'Speeker', 'ss', 'ss', 250, 50, 0, '2022-09-11 12:11:47', 1, 'direct.PNG', 1, 0, 0),
(13, 'Office Slipers Profecional', 'a', 'ss', 6500, 5, 0, '2022-09-11 12:06:55', 1, 'download.jfif', 3, 0, 0),
(14, 'Bata Waves', 'ss', 'ss', 8500, 5, 0, '2022-09-11 11:52:42', 1, 'images.jfif', 1, 0, 0),
(16, 'Taco', 'best Taco', 'ss', 450, 0, 1, '2022-10-02 20:14:54', 0, 'download (1).jfif', 12, 3, 3),
(17, 'Burger', 'big burger', 'sasas', 450, 2, 1, '2022-10-02 20:21:12', 0, 'download.jfif', 9, 3, 3),
(18, 'Dew1', 'sasas', 'sasa', 450, 5, 1, '2022-10-01 22:25:14', 1, 'dsd.PNG', 14, 0, 0),
(19, 'sasa', 'sasa', 'sas', 456, 5, 1, '2022-10-01 22:26:38', 1, 'dsd.PNG', 14, 0, 0),
(20, 'sasahhh', 'sasa', 'sasa', 545, 45, 1, '2022-10-01 22:29:10', 1, 'dsd.PNG', 14, 0, 0),
(21, 'gfgfg', 'dsdsd', 'dsdsd', 778, 888, 1, '2022-10-01 22:33:08', 1, 'dsd.PNG', 14, 0, 0),
(22, 'asa', 'sas', 'ss', 445, 5, 1, '2022-10-02 13:49:16', 0, 'Basin Mixer.jpg', 12, 1, 3),
(23, 'Corton Tshire', 'asa', 'sas', 650, 5, 1, '2022-10-16 22:01:09', 0, 'Basin Mixer.jpg', 9, 0, 0),
(24, 'sssss', 'ss', 'ss', 450, 5, 0, '2022-10-16 22:01:50', 1, 'Kitchens Accessories.jpg', 9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `payment` int(2) NOT NULL,
  `date_updated` datetime NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `order_status` int(5) NOT NULL,
  `tracking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`order_id`, `customer_id`, `total`, `shipping_address`, `billing_address`, `payment`, `date_updated`, `is_deleted`, `order_status`, `tracking`) VALUES
(31, 3, 1000, '', '', 1, '2022-10-02 20:16:38', 0, 3, '07:02'),
(33, 3, 450, '', '', 1, '2022-09-14 20:21:12', 0, 2, '17:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `header_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `header_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `about_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `about_desc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `company_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `sub_image` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twiiter` varchar(255) NOT NULL,
  `link_instragram` varchar(255) NOT NULL,
  `header_rotate_image` varchar(255) NOT NULL,
  `about_experience` int(255) NOT NULL,
  `opening` varchar(255) CHARACTER SET cp1250 NOT NULL,
  `shop_status` int(2) NOT NULL,
  `privacy_policy` varchar(9999) NOT NULL,
  `terms_and_condition` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`header_image`, `header_title`, `header_desc`, `about_title`, `about_desc`, `company_phone`, `company_email`, `company_address`, `sub_image`, `about_image`, `link_facebook`, `link_twiiter`, `link_instragram`, `header_rotate_image`, `about_experience`, `opening`, `shop_status`, `privacy_policy`, `terms_and_condition`) VALUES
('Spouts.jpg', 'Welcome to Senving Restaurent', 'With this shop hompeage template', 'About Us', 'Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!', '0713664076', 'asn@gmail.com', 'Banwalgodalla, Kosmulla', 'mcdonaldsglobal.jpg', 'na-beers-counter-ebe988ba9d8751cbcbb6cd49476ba405673d252c-s1100-c50.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'hero.png', 20, 'Monday - Saturday 09AM - 09PM  Sunday 10AM - 08PM', 1, '<h1>What Is a Terms and Conditions Agreement?</h1></br>\n<p>A terms and conditions agreement outlines the website administratorâ€™s rules regarding user behavior and provides information about the actions the website administrator can and will perform.</p>\n\nEssentially, your terms and conditions text is a contract between your website and its users. In the event of a legal dispute, arbitrators will look at it to determine whether each party acted within their rights.\n\nCreating the best terms and conditions page possible will protect your business from the following:\n\nAbusive users: Terms and Conditions agreements allow you to establish what constitutes appropriate activity on your site or app, empowering you to remove abusive users and content that violates your guidelines.\nIntellectual property theft: Asserting your claim to the creative assets of your site in your terms and conditions will prevent ownership disputes and copyright infringement.\nPotential litigation: If a user lodges a legal complaint against your business, showing that they were presented with clear terms and conditions before they used your site will help you immensely in court.\nIn short, terms and conditions give you control over your site and legal enforcement if users try to take advantage of your operations.', 'sasasa');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_description` varchar(255) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `size_description`, `is_deleted`, `date_updated`) VALUES
(1, 'M', '256 X 45', 0, '2022-10-16 21:32:01'),
(2, 'S', '256 X 45', 1, '2022-10-16 21:32:12'),
(3, 'L', '256', 0, '2022-10-16 21:47:21'),
(4, 'L', '256', 1, '2022-10-16 21:47:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
