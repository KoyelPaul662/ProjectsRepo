-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 12:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(30) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_pass` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `admin_email`, `admin_pass`) VALUES
(3, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` text NOT NULL,
  `ctg_des` varchar(150) NOT NULL,
  `ctg_status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `ctg_des`, `ctg_status`) VALUES
(19, 'Fresh Vegetables', '', 1),
(20, 'Juice', '', 1),
(21, 'Fruit', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pdt_id` int(255) NOT NULL,
  `pdt_name` varchar(200) NOT NULL,
  `pdt_price` int(200) NOT NULL,
  `pdt_des` varchar(250) NOT NULL,
  `pdt_ctg` int(200) NOT NULL,
  `pdt_img` varchar(200) NOT NULL,
  `pdt_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pdt_id`, `pdt_name`, `pdt_price`, `pdt_des`, `pdt_ctg`, `pdt_img`, `pdt_status`) VALUES
(8, 'Broccoli', 13, 'Broccoli is an edible green plant in the cabbage family whose large flowering head, stalk and small associated leaves are eaten as a vegetable.', 19, 'p-03.jpg', 1),
(9, 'Orange', 25, 'The orange is the fruit of various citrus species in the family Rutaceae (see list of plants known as orange); it primarily refers to Citrus × sinensis, which is also called sweet orange, to distinguish it from the related Citrus × aurantium, referre', 21, 'p-07.jpg', 1),
(10, 'Avocado Smoothie', 45, 'Combine the pineapple, spinach, avocado, banana, coconut milk, lime juice, maple syrup, salt, ice, and protein powder, if using, in a blender. Blend until creamy. Taste and adjust the sweetness to your liking.', 20, 'p-25.jpg', 1),
(11, 'Avocado', 8, 'The avocado, a tree likely originating from southcentral Mexico, is classified as a member of the flowering plant family Lauraceae. ', 21, 'p-01.jpg', 1),
(12, 'Apple', 6, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', 21, 'p-09.jpg', 1),
(13, 'Carrot', 2, 'The carrot is a root vegetable, usually orange in color, though purple, black, red, white, and yellow cultivars exist. They are a domesticated form of the wild carrot, Daucus carota, native to Europe and Southwestern Asia.', 19, 'p-12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_cart`
--

CREATE TABLE `products_cart` (
  `id` int(10) NOT NULL,
  `pdt_id` int(255) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pdt_name` varchar(200) NOT NULL,
  `pdt_price` int(200) NOT NULL,
  `quantity` int(8) NOT NULL,
  `total` double(15,2) NOT NULL,
  `pdt_des` varchar(250) NOT NULL,
  `pdt_ctg` varchar(200) NOT NULL,
  `pdt_img` varchar(200) NOT NULL,
  `pdt_status` enum('A','I') NOT NULL,
  `date` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_order`
--

CREATE TABLE `products_order` (
  `id` int(10) NOT NULL,
  `pdt_id` int(255) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pdt_name` varchar(200) NOT NULL,
  `pdt_price` int(200) NOT NULL,
  `quantity` int(8) NOT NULL,
  `total` double(15,2) NOT NULL,
  `pdt_des` varchar(250) NOT NULL,
  `pdt_ctg` varchar(200) NOT NULL,
  `pdt_img` varchar(200) NOT NULL,
  `pdt_status` enum('A','I') NOT NULL,
  `deliveryadd` varchar(30) NOT NULL,
  `date` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_order`
--

INSERT INTO `products_order` (`id`, `pdt_id`, `user_id`, `username`, `pdt_name`, `pdt_price`, `quantity`, `total`, `pdt_des`, `pdt_ctg`, `pdt_img`, `pdt_status`, `deliveryadd`, `date`, `datetime`) VALUES
(1, 10, '7', 'koyelp', 'Avocado Smoothie', 45, 3, 135.00, 'Combine the pineapple, spinach, avocado, banana, coconut milk, lime juice, maple syrup, salt, ice, and protein powder, if using, in a blender. Blend until creamy. Taste and adjust the sweetness to your liking.', 'Juice', 'p-25.jpg', 'A', 'F-57/370/197,KALYANI,RATHTALA,', '2023-02-03', '2023-02-03 08:46:33'),
(2, 14, '7', 'koyelp', 'sari', 200, 3, 600.00, 'Sari', 'Sari', 'home13.jpeg', 'A', 'kalyani', '2023-02-03', '2023-02-03 09:00:40'),
(3, 9, '8', 'kakali123', 'Orange', 25, 6, 150.00, 'The orange is the fruit of various citrus species in the family Rutaceae (see list of plants known as orange); it primarily refers to Citrus × sinensis, which is also called sweet orange, to distinguish it from the related Citrus × aurantium, referre', 'Fruit', 'p-07.jpg', 'A', 'kalyani', '2023-02-03', '2023-02-03 09:02:08'),
(4, 9, '7', 'koyelp', 'Orange', 25, 5, 125.00, 'The orange is the fruit of various citrus species in the family Rutaceae (see list of plants known as orange); it primarily refers to Citrus × sinensis, which is also called sweet orange, to distinguish it from the related Citrus × aurantium, referre', 'Fruit', 'p-07.jpg', 'A', 'F-57/370/197,KALYANI,RATHTALA,', '2023-02-03', '2023-02-03 09:19:59'),
(5, 14, '8', 'kakali123', 'sari', 200, 3, 600.00, 'Sari', 'Sari', 'home13.jpeg', 'A', 'rathtala', '2023-02-03', '2023-02-03 09:20:58'),
(6, 13, '8', 'kakali123', 'Carrot', 2, 10, 20.00, 'The carrot is a root vegetable, usually orange in color, though purple, black, red, white, and yellow cultivars exist. They are a domesticated form of the wild carrot, Daucus carota, native to Europe and Southwestern Asia.', 'Fresh Vegetables', 'p-12.jpg', 'A', 'F-57/370/197,KALYANI,RATHTALA,', '2023-02-03', '2023-02-03 10:01:13'),
(7, 8, '7', 'koyelp', 'Broccoli', 13, 2, 26.00, 'Broccoli is an edible green plant in the cabbage family whose large flowering head, stalk and small associated leaves are eaten as a vegetable.', 'Fresh Vegetables', 'p-03.jpg', 'A', 'kalyani', '2023-04-19', '2023-04-19 06:28:09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_info_ctg`
-- (See below for the actual view)
--
CREATE TABLE `product_info_ctg` (
`pdt_id` int(255)
,`pdt_name` varchar(200)
,`pdt_price` int(200)
,`pdt_des` varchar(250)
,`pdt_img` varchar(200)
,`pdt_status` tinyint(5)
,`ctg_id` int(11)
,`ctg_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` int(11) NOT NULL,
  `user_roles` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`, `user_roles`) VALUES
(5, 'asibur', 'asibur', 'rahman', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 2147483647, 5),
(6, 'koyel', 'koyel', 'paul', 'koyel@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 2147483647, 0),
(7, 'koyelp', 'koyelp', 'koyelp', 'koyelp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, 0),
(8, 'kakali123', 'kakali', 'paul', 'kakali123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2147483647, 0);

-- --------------------------------------------------------

--
-- Structure for view `product_info_ctg`
--
DROP TABLE IF EXISTS `product_info_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_info_ctg`  AS SELECT `products`.`pdt_id` AS `pdt_id`, `products`.`pdt_name` AS `pdt_name`, `products`.`pdt_price` AS `pdt_price`, `products`.`pdt_des` AS `pdt_des`, `products`.`pdt_img` AS `pdt_img`, `products`.`pdt_status` AS `pdt_status`, `category`.`ctg_id` AS `ctg_id`, `category`.`ctg_name` AS `ctg_name` FROM (`products` join `category`) WHERE `products`.`pdt_ctg` = `category`.`ctg_id``ctg_id`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `products_cart`
--
ALTER TABLE `products_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_order`
--
ALTER TABLE `products_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products_cart`
--
ALTER TABLE `products_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_order`
--
ALTER TABLE `products_order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
