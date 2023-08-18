-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 05:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`, `created_at`) VALUES
(2, 'Subid', '$2y$10$OY4pjhcHt1ZLmXKNUFOS1uRn2xMUw4Lz9hvN5Ir6yCcCssLdTksJK', '2019-07-14 13:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `buyer_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `credit` bigint(255) NOT NULL,
  `product_ID` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `name`, `phone`, `address`, `bank`, `credit`, `product_ID`, `created_at`) VALUES
(17, 'Naruto', 9818392179, 'Swoyambhu', 'kist', 23456789, 2, '2019-07-14 12:20:25'),
(21, 'Naruto', 9841263215, 'Swoyambhu', 'Nabil', 4242424424242, 7, '2019-07-14 14:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `product_ID` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `numb` int(50) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `Phone` bigint(20) NOT NULL,
  `photosource` varchar(500) NOT NULL,
  `brands` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`product_ID`, `model`, `numb`, `price`, `description`, `Phone`, `photosource`, `brands`, `created_at`) VALUES
(2, 'Sweater', 1, '1000', 'Brown sweater', 9860423849, 'Clothes/sweater.jpg', 'levi', '2022-05-05 10:29:56'),
(3, ' sweatshirt', 5, '6400', 'high quality sweatshirt', 9803915724, 'Clothes/sweatshirt.webp', 'Juju', '2022-05-09 12:34:57'),
(6, 'Shirt', 4, '65000', 'high quality mens shirt.', 9860423849, 'Clothes/shirt.jpg', 'meesho', '2022-05-09 14:13:38'),
(7, 'one piece', 2, '1599', 'summer dress', 9803915723, 'Clothes/onepiece.jpg', 'VS', '2022-05-07 14:15:15'),
(8, 'Party dress', 5, '15000', 'Perfect part dress', 9843214301, 'Clothes/partydress.jpg', 'levi\'s', '2022-05-05 14:16:00'),
(9, 'tshirt', 8, '2300', 'simple unisex tshirt', 9803915723, 'Clothes/tshirt.webp', 'juju wears', '2022-05-06 14:16:25'),
(11, 'jeans', 1, '2999', 'ladies jean pant', 9803915723, 'Clothes/jeans.webp', 'nike', '2022-05-05 14:40:05'),
(12, 'joggers', 3, '65000', 'comfortable joggers', 9803926632, 'Clothes/joggers.webp', 'ktm city', '2022-05-05 15:59:33'),
(13, 'skirt', 3, '850', 'pretty skirt', 67326487364, 'Clothes/skirt.jpg', 'vs', '2022-05-05 16:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `created_at`) VALUES
(3, 'subidshrestha', '$2y$10$Q9EpvnNb0Unv2C3uh42LB.NW8f2kPTMURkwP1cgblFZPAqnZKvo0e', 'subideminem@gmail.com', 9818392179, '2019-07-14 10:26:54'),
(4, 'aishwarya', '$2y$10$k.ZkhaIwp0p9BblUwxlMR.eqOA0s.xP49R/yeZVC8RviGECQndToy', 'aishwaryaadhikari@gmail.com', 9843343434, '2022-05-27 20:08:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `buyer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
