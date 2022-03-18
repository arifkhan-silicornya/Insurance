-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 06:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(100) NOT NULL,
  `preAddress` text NOT NULL,
  `perAddress` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `preAddress`, `perAddress`, `email`, `create_date`, `update_date`) VALUES
(2, '', '', 'jahidcse.me@gmail.com', '2021-03-06 07:45:22', '2021-03-06 07:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `profile_pic`, `create_date`) VALUES
(1, 'jahid', 'admin@gmail.com', 'b714337aa8007c433329ef43c7b8252c', 'c507668ea75f124dde9653b4a96f1921602d4b1455b14', '2021-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facilities_id` int(100) NOT NULL,
  `facilities_name` varchar(100) NOT NULL,
  `facilities_price` int(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `package_id` int(100) NOT NULL,
  `status` int(6) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facilities_id`, `facilities_name`, `facilities_price`, `image`, `package_id`, `status`, `create_date`) VALUES
(1, 'Hospitalization (in-patient service)', 5000, 'adbc7d23694f695d7e578475a736870c603f6f8af3e1b', 1, 0, '2021-02-16'),
(2, 'Out-patient service', 5000, 'b9ae47eab93172ca0522e3913cd5d507603f6f9539034', 1, 0, '2021-02-16'),
(3, 'Hospitalization (in-patient service)', 135000, 'adbc7d23694f695d7e578475a736870c603f6fb042e97', 3, 0, '2021-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE `gift` (
  `gift_id` int(10) NOT NULL,
  `sender` int(100) NOT NULL,
  `reciever` int(100) NOT NULL,
  `Create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_info`
--

CREATE TABLE `insurance_info` (
  `insurance_id` int(50) NOT NULL,
  `insurance_type` varchar(100) NOT NULL,
  `policy_title` text NOT NULL,
  `policy_icon` varchar(100) NOT NULL,
  `policy_delete` int(2) NOT NULL DEFAULT 0,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_info`
--

INSERT INTO `insurance_info` (`insurance_id`, `insurance_type`, `policy_title`, `policy_icon`, `policy_delete`, `create_date`) VALUES
(1, 'Health Insurance', 'Custom-tailored Health and Life Insurance plan to suit the changing needs of you and your family.', 'life', 0, '2021-02-13 18:17:38'),
(2, 'Automobiles', 'Kick start a hassle-free ride! A worry-free journey ensured with our convenient combos of Motor &amp; Life/Health insurance coverage.', 'automobiles', 1, '2021-02-13 18:28:35'),
(3, 'Life Insurance', 'Be it for your loved one&rsquo;s future, we offer the simplest of all', 'health', 1, '2021-02-13 18:29:25'),
(4, 'Savings', 'Do not save what is left after spending; instead spend what is left after saving. This is not only for you , but also for your family.', 'savings', 1, '2021-02-13 20:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `nominee_id` int(10) NOT NULL,
  `nominee_nid` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `relation_ship` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `flat_area` varchar(100) NOT NULL,
  `post_office` varchar(100) NOT NULL,
  `thana` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `post_code` int(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`nominee_id`, `nominee_nid`, `full_name`, `relation_ship`, `birth_date`, `email`, `phone`, `flat_area`, `post_office`, `thana`, `district`, `post_code`, `division`, `order_id`, `create_date`) VALUES
(3, 123456789, 'MD. ARIF KHAN', 'mother', '1971-09-03', 'ari@gmail.com', 1749903970, '10/1 Mayakanan , P.O : Basabo , P.S.: Sabujbagh', 'a', 'a', 'a', 1214, 'a', 2, '2021-03-05 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `customer_nid` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `package_id` int(100) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_status` int(100) NOT NULL DEFAULT 0,
  `nominee_nid` int(100) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `customer_nid`, `customer_name`, `package_id`, `phone_number`, `email`, `payment_status`, `nominee_nid`, `order_time`) VALUES
(2, 17, 123456789, 'Md. Raju', 1, 1749903970, 'jahidcse.me@gmail.com', 0, 123456789, '2021-03-05 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(100) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `premium` int(100) NOT NULL,
  `coverage` int(100) NOT NULL,
  `package_title` varchar(100) NOT NULL,
  `insurance_id` int(100) NOT NULL,
  `package_delete` int(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `premium`, `coverage`, `package_title`, `insurance_id`, `package_delete`, `create_date`, `update_date`) VALUES
(1, 'Assure Health (Bronze)', 350, 50000, 'For 1 year &amp; 1 person by Chartered Life Insurance Co. Ltd.', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Assure Health (Silver)', 1700, 100000, 'For 1 year &amp; 1 person by Chartered Life Insurance Co. Ltd.', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reciever`
--

CREATE TABLE `reciever` (
  `reciever_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `nid_number` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(1000) NOT NULL DEFAULT 'avatar',
  `gender` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `createDate` date NOT NULL DEFAULT current_timestamp(),
  `updateDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nid_number`, `name`, `email`, `phoneNumber`, `password`, `profile_picture`, `gender`, `status`, `createDate`, `updateDate`) VALUES
(22, 963258741, 'Jahid Hasan', 'jahidcse.me@gmail.com', 1236985471, '12345', 'avatar', 'male', 0, '2021-03-06', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facilities_id`);

--
-- Indexes for table `gift`
--
ALTER TABLE `gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `insurance_info`
--
ALTER TABLE `insurance_info`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`nominee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `reciever`
--
ALTER TABLE `reciever`
  ADD PRIMARY KEY (`reciever_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facilities_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gift`
--
ALTER TABLE `gift`
  MODIFY `gift_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_info`
--
ALTER TABLE `insurance_info`
  MODIFY `insurance_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nominee`
--
ALTER TABLE `nominee`
  MODIFY `nominee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reciever`
--
ALTER TABLE `reciever`
  MODIFY `reciever_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
