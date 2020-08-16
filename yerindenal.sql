-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2020 at 02:42 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yerindenal`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`) VALUES
(1, 'Urun1', 'Köy Peyniri', 'Erzumun\'un da üretilen tuz suyu peyniri', 25, 3, 75, '0000-00-00 00:00:00', 'apolat171@gmail.com'),
(2, 'Urun2', 'Köy Fasülyesi', 'Erzumun\'un da yeti?tirilen fasulyeler', 15, 2, 30, '2020-06-10 20:30:49', 'apolat171@gmail.com'),
(13, 'Urun2', 'Salamura Zeytin', 'Ege bölgemizde üretilen zeytinlerin salamura yap?lm?? ve paketlenmi?...', 50, 1, 50, '2020-06-27 16:35:24', 'apolat171@gmail.com'),
(14, 'Urun2', 'Salamura Zeytin', 'Ege bölgemizde üretilen zeytinlerin salamura yap?lm?? ve paketlenmi?...', 50, 3, 150, '2020-06-27 16:37:18', 'apolat171@gmail.com'),
(15, 'Urun2', 'Salamura Zeytin', 'Ege bölgemizde üretilen zeytinlerin salamura yapilmis ve paketlenmis zeytinlerimiz', 55, 2, 110, '2020-06-28 13:25:09', 'apolat171@gmail.com'),
(16, '', 'Koy Tereyagi', 'Koy Tereyagi yani nasil tarif edek', 30, 3, 90, '2020-06-28 13:25:10', 'apolat171@gmail.com'),
(17, '', 'Salamura Zeytin', 'Ege bölgemizde üretilen zeytinlerin salamura yapilmis ve paketlenmis zeytinlerimiz', 55, 1, 55, '2020-07-07 23:08:58', 'apolat171@gmail.com'),
(18, '', 'Salamura Zeytin', 'Ege bölgemizde üretilen zeytinlerin salamura yapilmis ve paketlenmis zeytinlerimiz', 55, 2, 110, '2020-07-24 15:13:16', 'apolat171@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_owner` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`, `product_owner`) VALUES
(1, 'Köy Peyniri', 'Erzumun\'un da üretilen tuz suyu peyniri', '8883-köy-peyniri.jpg', 26, '25.00', 1),
(2, 'Salamura Zeytin', 'Ege bölgemizde üretilen zeytinlerin salamura yapilmis ve paketlenmis zeytinlerimiz', '1501-salamura-zeytin.jpg', 47, '55.00', 3),
(3, 'Köy Fasülyesi', 'Erzumun\'un da yetistirilen fasulyeler', '4788-fasülye.png', 25, '20.00', 1),
(7, 'Koy Tereyagi', 'Koy Tereyagi yani nasil tarif edek', '4732-download.jpg', 50, '30.00', 1),
(32, 'Kastamonu Erigi', 'Kastomunuda yetistirilen erikler', '8713-uryani-erigini.jpg', 85, '14.00', 3),
(46, 'Misir Unu Ekmegi', 'Karadenizdd uretilen ekmek', '6502-download.jpg', 5, '5.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(1, 'Adem Enes', 'Polat', 'Infinite Loop', 'Erzurum', 25400, 'apolat171@gmail.com', '1234', 'admin'),
(3, 'Semih', 'Unal', 'Infinite Loop', 'Turkey', 37500, 's.u.@gmail.com', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
