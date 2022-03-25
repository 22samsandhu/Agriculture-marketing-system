-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 30, 2021 at 02:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(40) NOT NULL,
  `Admin_id` int(10) NOT NULL,
  `A_username` varchar(15) NOT NULL,
  `A_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Admin_id`, `A_username`, `A_password`) VALUES
('Samandeep', 1010, 'samsandhu22', 'sam@1010');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`name`, `email`, `text`) VALUES
('tom', 'tom@gmail.com', 'thus is now done'),
('hardy', 'tom@gmail.com', 'another test'),
('samandeep ', 'sams22andhu@gmail.com', 'hi i am saman'),
('samandeep ', 'sams22andhu@gmail.com', 'hi i am saman');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_username` varchar(20) NOT NULL,
  `l_password` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_username`, `l_password`, `id_user`) VALUES
('aman100', 'aman001', 50),
('helly100', 'helly0001', 47),
('jennifer100', 'jennifer458', 48),
('john100', 'john0001', 44),
('jyoti100', 'jyoti0001', 51),
('punit1', 'punit1', 75),
('rahul100', 'rahul0001', 43),
('robert100', 'robert0001', 46),
('sam1', 'sam1', 72),
('test', 'test0001', 42),
('test1', 'test1458', 52),
('test2', 'test2', 70),
('test3', 'test3', 71),
('test4', 'test4', 73),
('test5', 'test5', 74),
('test8', 'test8', 76),
('vivek', 'vivek456', 49),
('william100', 'eilliam0001', 45);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date_time`, `quantity`, `price`, `total_amount`, `product_id`, `customer_id`, `supplier_id`) VALUES
(21, '2021-11-28 23:02:42', 5, 0, 0, 19, 52, 50),
(22, '2021-11-28 23:03:11', 5, 0, 20, 19, 52, 50),
(23, '2021-11-29 03:57:34', 12, 0, 0, 18, 49, 46),
(28, '2021-11-29 17:10:29', 10, 0, 500, 19, 65, 45),
(29, '2021-11-30 08:44:13', 5, 2200, 11000, 16, 67, 45),
(30, '2021-11-30 08:52:38', 2, 40, 80, 21, 67, 52),
(31, '2021-11-30 11:10:26', 2, 40, 80, 22, 73, 67),
(32, '2021-11-30 12:20:09', 3, 2200, 0, 16, 75, 45),
(33, '2021-11-30 12:26:00', 5, 800, 4000, 18, 75, 50),
(34, '2021-11-30 13:02:50', 2, 40, 80, 20, 50, 42);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_detail` varchar(40) NOT NULL,
  `catagory` varchar(30) NOT NULL,
  `stock` int(5) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `price` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `catagory`, `stock`, `supplier_id`, `price`, `product_img`) VALUES
(16, 'wheat', '2967 Hibreed wheat', 'grain', 45, 45, 2200, 'C:/xampp/htdocs/agriculture/img/logo.jpg'),
(18, 'musterd', '4546 pioneer 1 kg', 'oilseeds', 50, 50, 800, ''),
(19, 'Apple', 'good Quality 1 Kg apple', 'Fruit', 20, 45, 50, ''),
(20, 'Banana', '1 duzzon banan', 'Fruit', 25, 42, 40, ''),
(21, 'mango', 'Write something about your product', 'fruit', 100, 52, 40, 'images/pi.jpg'),
(22, 'Apple', 'high quality', 'Fruit', 45, 67, 40, 'images/product.jpg'),
(23, 'tractor', 'Holland 3630 modal 2014', 'machinary', 2, 75, 450000, 'images/product.jpg'),
(24, 'Apple', '10 kg pack', 'Fruit', 20, 75, 700, 'images/logo.png'),
(25, 'Tractor', 'John Deer 5050D modal 2015', 'machinary', 1, 76, 500000, 'images/logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(10) NOT NULL,
  `role_def` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_def`) VALUES
(1, 'Farmer'),
(2, 'Merchant'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(40) DEFAULT NULL,
  `contact_no` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(70) DEFAULT NULL,
  `id_admin` int(10) NOT NULL DEFAULT 1010,
  `id_role` int(10) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT 'images/avatar.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `contact_no`, `email`, `address`, `id_admin`, `id_role`, `profile_image`) VALUES
(42, '', 'test', 2525522, 'test@gmail.com', 'delhi', 1010, 1, NULL),
(43, '', 'Rahul', 2147483647, 'rahul@gmail.com', 'Jaipur', 1010, 2, NULL),
(44, '', 'John', 25665625, 'john@gmail.com', 'callifornia', 1010, 3, NULL),
(45, '', 'William', 2147483647, 'william@gmail.com', 'New york', 1010, 1, NULL),
(46, '', 'Robert', 2147483647, 'Robert@gmail.com', 'delhi', 1010, 1, NULL),
(47, '', 'helly', 2147483647, 'helly@gmail.com', 'Jaipur', 1010, 2, NULL),
(48, '', 'Jennifer', 2147483647, 'jennifer@gmail.com', 'delhi', 1010, 3, NULL),
(49, '', 'vivek ', 45441545, 'vivek@gmail.com', 'hydrabad', 1010, 2, NULL),
(50, 'S', 'Aman', 2147483647, 'aman@gmail.com', 'chennai', 1010, NULL, 'images/avatar.png'),
(51, '', 'jyoti', 2525522, 'jyoti@gmail.com', 'calcutta', 1010, 3, NULL),
(52, '', 'test1', 8659799, 'test1@gmail.com', 'test1 home', 1010, 2, NULL),
(62, 'tom ', 'harry ', 2147483647, 'tom@harry.com', NULL, 1010, NULL, NULL),
(64, 'hat', 'marry', 2147483647, 'har@matty.com', NULL, 1010, 1, NULL),
(65, 'cat ', 'dog', 2147483647, 'dog@cat.go', 'tyrter', 1010, 1, 'images/wheat.jpg'),
(66, 'tommy', 'dog', 2147483647, 'eamil@email.com', 'rererre', 1010, 1, 'images/wheat (2).jpg'),
(67, 'saman', 'deep', 2147483647, 'how@gmail.com', 'ramsinghpur', 1010, 1, 'images/avatar.png'),
(68, 'saman', 'deep', 2525, 'how1@gmail.com', NULL, 1010, NULL, 'images/avatar.jpeg'),
(69, 'saman', 'deep', 25665625, 'test011@gmail.com', NULL, 1010, NULL, 'images/avatar.jpeg'),
(70, 'saman', 'deep', 2147483647, 'test2@gmail.com', NULL, 1010, NULL, 'images/avatar.jpeg'),
(71, 'saman', 'deep', 2147483647, 'test3@gmail.com', NULL, 1010, NULL, 'images/avatar.jpeg'),
(72, 'saman', 'deep', 2525, 'sam1@gmail.com', NULL, 1010, NULL, 'images/avatar.jpeg'),
(73, 'saman', 'deep', 2147483647, 'test4@gmail.com', 'ramsinghpur', 1010, 2, 'images/avatar.png'),
(74, 'xyz', 'xyz', 25665625, 'test5@gmail.com', NULL, 1010, NULL, 'images/avatar.jpeg'),
(75, 'punit', 'kaur', 25665625, 'punit1@gmail.com', 'ramsinghpur', 1010, NULL, 'images/logo.png'),
(76, 'saman', 'deep', 2147483647, 'test8@gmail.com', 'ramsinghpur', 1010, 2, 'images/avatar.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`),
  ADD UNIQUE KEY `A_username` (`A_username`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_username`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_fk` (`product_id`),
  ADD KEY `customer_fk` (`customer_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_fk` (`supplier_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `admin_fk` (`id_admin`),
  ADD KEY `role_fk` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `fk_foreign_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `supplier_fk` FOREIGN KEY (`supplier_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`Admin_id`),
  ADD CONSTRAINT `role_fk` FOREIGN KEY (`id_role`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
