-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 10:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jasmine_boutique`
--
CREATE DATABASE IF NOT EXISTS `jasmine_boutique` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jasmine_boutique`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`) VALUES
(4, 'jass', 'nn@gmail.com', '0549658455', '12345'),
(5, 'sAD', 'ggea@mail.com', '05659654', '123321');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `qty`) VALUES
(11, 4, 9, 5),
(12, 4, 18, 8),
(13, 4, 26, 1),
(14, 4, 26, 1),
(15, 5, 23, 1),
(16, 5, 22, 1),
(17, 5, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `old_price` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `old_price`, `price`, `image`) VALUES
(3, 'Golden chrysanthemum flower', 'flower', NULL, 20, 'flowers/fl6.png.jpg'),
(4, 'pink pox with flowers on-demand coordination', 'flower', NULL, 110, 'flowers/fl1.png.jpg'),
(5, 'Flower design with vase', 'flower', NULL, 85, 'flowers/fl2.png.jpg'),
(6, 'White flower with vase', 'flower', NULL, 100, 'flowers/fl3.png.jpg'),
(7, 'Bouqet of purple flowers', 'flower', NULL, 150, 'flowers/fl4.png.jpg'),
(8, 'Elegent bouqet of white flowers', 'flower', NULL, 120, 'flowers/fl5.png.jpg'),
(9, 'Ballons set for birthday', 'ballon', NULL, 90, 'ballons/ba1.png.jpg'),
(10, 'custom birthday design', 'ballon', NULL, 300, 'ballons/ba2.png.jpg'),
(11, 'set of ballons with phrase written on it', 'ballon', NULL, 50, 'ballons/ba3.png.jpg'),
(12, 'Birhday set of ballons with number', 'ballon', NULL, 100, 'ballons/ba4.png.jpg'),
(13, 'birhday design', 'ballon', NULL, 70, 'ballons/ba5.png.jpg'),
(14, 'Birhday design', 'ballon', NULL, 280, 'ballons/ba6.png.jpg'),
(15, 'shoes,baby embroidery,new born blanket', 'babe', NULL, 110, 'babes/bo2.png.jpg'),
(16, 'new born clothing set (boy)', 'babe', NULL, 250, 'babes/bo7.png.jpg'),
(17, 'blanket,new born sock with star', 'babe', NULL, 90, 'babes/bo8.png.jpg'),
(18, 'new born clothing set(boy)', 'babe', NULL, 200, 'babes/bo5.png.jpg'),
(19, 'new born clothing set(girl)', 'babe', NULL, 150, 'babes/bo6.png.jpg'),
(20, 'shower set', 'babe', NULL, 140, 'babes/bo4.png.jpg'),
(21, 'Box of chocolate with heart', 'choco', NULL, 50, 'chocos/Ch1.png.jpg'),
(22, 'Chocolate cubes stuffed with pistachio', 'choco', NULL, 30, 'chocos/choc4.png.jpg'),
(23, 'Chocolate with dried fruits', 'choco', NULL, 55, 'chocos/choc3.png.jpg'),
(24, 'Chocolate covered with nuts', 'choco', NULL, 70, 'chocos/choco7.png.jpg'),
(25, 'small box of chocolate with 6 pieces', 'choco', NULL, 25, 'chocos/choc6.png.jpg'),
(26, 'small box of Chocolate covered with sprankles', 'choco', NULL, 45, 'chocos/choc5.png.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `total` double NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `total`, `order_date`, `customer_id`) VALUES
(1, 2140, '2023-02-20 00:06:58', 4),
(2, 2140, '2023-02-20 00:29:04', 4),
(3, 2140, '2023-02-20 00:29:06', 4),
(4, 2140, '2023-02-20 00:29:06', 4),
(5, 2140, '2023-02-20 00:32:09', 4),
(6, 2140, '2023-02-20 00:34:24', 4),
(7, 135, '2023-02-20 00:41:49', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `product_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`product_id`, `rate`, `customer_id`) VALUES
(21, 4, 4),
(22, 3, 4),
(23, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`customer_id`),
  ADD KEY `orders_ibfk_2` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_id` (`customer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`product_id`,`customer_id`),
  ADD KEY `reviews_ibfk_1` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
