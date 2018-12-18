-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Set-2018 às 23:00
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(5, 'Nike', 1, 2),
(6, 'Faber castle', 1, 2),
(7, 'ASD', 1, 2),
(10, 'Nike', 1, 2),
(11, 'Addidas', 1, 2),
(12, 'Nike', 1, 2),
(13, 'Windowns', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'TÃªnis', 1, 2),
(2, 'sapatos', 1, 2),
(3, 'Flores', 1, 1),
(4, 'Animais', 1, 1),
(5, 'Lugar', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_place` int(11) NOT NULL,
  `gstn` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `payment_place`, `gstn`, `order_status`, `user_id`) VALUES
(1, '2018-09-17', 'Cliente teste', '963852741', '10.00', '1.80', '11.80', '5', '6.80', '2', '4.80', 3, 2, 1, '1.80', 2, 1),
(2, '2018-09-13', 'Bruno', '159357', '100000.00', '18000.00', '118000.00', '18000', '100000.00', '50000', '50000.00', 1, 1, 1, '18000.00', 2, 1),
(3, '2018-09-01', 'teste', '1597346820', '100000.00', '0.00', '100000.00', '0', '100000.00', '100000', '0.00', 1, 1, 1, '0.00', 2, 1),
(4, '2018-09-01', 'Bruno', '123456789', '350.00', '0.00', '350.00', '10', '340.00', '340', '0.00', 2, 1, 1, '0.00', 2, 1),
(5, '2018-09-19', 'teste', '159357', '500.00', '0.00', '500.00', '100', '400.00', '400', '0.00', 2, 1, 1, '0.00', 2, 1),
(6, '2018-09-19', 'teste', '789516423', '100000.00', '0.00', '100000.00', '50000', '50000.00', '10000', '40000.00', 1, 3, 2, '0.00', 2, 1),
(7, '2018-09-20', 'Bruno', '741852963', '500100.00', '0.00', '500100.00', '100', '500000.00', '250000', '250000.00', 3, 2, 2, '0.00', 1, 1),
(8, '2018-09-20', 'Erika', '963852741', '100.00', '0.00', '100.00', '0', '100.00', '100', '0.00', 2, 1, 1, '0.00', 1, 1),
(9, '2018-09-20', 'Erik', '7531598462', '5600.00', '0.00', '5600.00', '0', '5600.00', '5600', '0.00', 1, 1, 2, '0.00', 1, 1),
(10, '2018-09-20', 'Elton', '4567823', '5010.00', '0.00', '5010.00', '0', '5010.00', '200', '4810.00', 2, 1, 1, '0.00', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '5', '10', '10.00', 2),
(2, 0, 3, '1', '100', '100.00', 1),
(3, 0, 3, '1', '100', '100.00', 1),
(4, 0, 2, '1', '100000', '100000.00', 1),
(5, 2, 2, '1', '100000', '100000.00', 2),
(6, 3, 2, '1', '100000', '100000.00', 2),
(7, 4, 4, '7', '50', '350.00', 2),
(8, 5, 4, '10', '50', '500.00', 2),
(9, 6, 2, '1', '100000', '100000.00', 2),
(10, 7, 3, '1', '100', '100.00', 1),
(11, 7, 11, '1', '500000', '500000.00', 1),
(12, 8, 6, '5', '100', '100.00', 1),
(13, 9, 10, '1', '5000', '5000.00', 1),
(14, 9, 9, '3', '200', '600.00', 1),
(15, 10, 10, '1', '5000', '5000.00', 1),
(16, 10, 13, '1', '10', '10.00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'Penguin', '../assests/images/stock/4254203235b9676b231712.jpg', 1, 1, '5', '10', 2, 2),
(2, 'carro', '../assests/images/stock/4180532215b9acea90d14c.jpg', 10, 1, '46', '100000', 2, 2),
(3, 'Penguim', '../assests/images/stock/2437338665b9a5af49f02c.jpg', 10, 2, '-2', '100', 1, 1),
(4, 'Koala', '../assests/images/stock/3361992145b9a9e7d013a5.jpg', 10, 2, '83', '50', 2, 2),
(5, '', '../assests/images/stock/20676569625ba2a1b52bbee.jpg', 10, 1, '1', '100', 2, 2),
(6, 'CrisÃ¢ntemo', '../assests/images/stock/11727830325ba4066373fff.jpg', 13, 3, '45', '100', 1, 1),
(7, 'Deserto', '../assests/images/stock/2210594675ba4068709519.jpg', 13, 5, '2', '10000000', 1, 1),
(8, 'HortÃªnsia', '../assests/images/stock/9007627845ba4069f58070.jpg', 13, 3, '100', '20', 1, 1),
(9, 'Agua-Viva', '../assests/images/stock/9917201355ba406db68fac.jpg', 13, 4, '17', '200', 1, 1),
(10, 'Koala', '../assests/images/stock/20568223925ba406f7205e4.jpg', 13, 4, '3', '5000', 1, 1),
(11, 'Farol', '../assests/images/stock/90339175ba4072c336b8.jpg', 13, 5, '6', '500000', 1, 1),
(12, 'Pinguim', '../assests/images/stock/5865011235ba4073f1df4a.jpg', 13, 4, '3', '1000', 1, 1),
(13, 'Tulipa', '../assests/images/stock/7600648645ba4075525d4e.jpg', 13, 3, '199', '10', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(12, 'admin2', '202cb962ac59075b964b07152d234b70', 'admin@admin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`,`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `brand_id_2` (`brand_id`,`categories_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
