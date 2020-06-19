-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 07:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `owner_user_id` int(11) NOT NULL,
  `owner_username` varchar(200) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`owner_user_id`, `owner_username`, `account_id`, `amount`, `active`) VALUES
(1, 'user', 2, 51, 1),
(1, 'user', 3, 145, 1),
(1, 'user', 5, 230, 1),
(1, 'user', 6, 0, 1),
(1, 'user', 8, 0, 1),
(3, 'user2', 9, 189, 1),
(3, 'user2', 10, 149, 1),
(101, 'Ropttt', 11, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `text`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam suscipit malesuada risus ut ultricies. Sed tellus felis, gravida elementum maximus id, accumsan eget lectus. Sed congue ac justo hendrerit tempor. Suspendisse ornare placerat neque, at interdum sem sodales sit amet.'),
(2, 'Quisque ullamcorper tincidunt lectus, a semper nisl gravida a. Praesent pharetra aliquet nibh, sit amet suscipit metus feugiat nec. In non turpis pharetra, tristique nunc quis, tempor nisi. Vivamus ultrices nisi id egestas viverra. Morbi eget pharetra nisl. Sed bibendum risus eget turpis dictum congue. Maecenas vitae neque risus. Sed.');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `user_id` int(11) NOT NULL,
  `from_account_id` int(11) DEFAULT NULL,
  `to_account_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`user_id`, `from_account_id`, `to_account_id`, `amount`, `transaction_id`, `transaction_type`) VALUES
(1, NULL, 2, 30, 1, 'Deposit'),
(1, NULL, 2, 12, 2, 'Deposit'),
(1, NULL, 2, 12, 3, 'Deposit'),
(1, NULL, 2, 12, 4, 'Withdraw'),
(1, NULL, 2, 12, 5, 'Withdraw'),
(3, NULL, 9, 300, 6, 'Deposit'),
(3, NULL, 9, 123, 7, 'Withdraw'),
(1, NULL, 2, 10, 8, 'Withdraw'),
(1, NULL, 2, 12, 9, 'Deposit'),
(1, NULL, 2, 5, 10, 'Deposit'),
(1, NULL, 2, 600, 11, 'Withdraw'),
(1, 2, 10, 50, 12, 'Transfer'),
(101, NULL, 11, 20, 13, 'Deposit'),
(101, 11, 2, 1, 14, 'Transfer'),
(1, NULL, 3, 5, 15, 'Withdraw');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `date`, `username`, `password`, `balance`, `active`) VALUES
(1, 'User User', 'user@user.com', '1998-05-28', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 426, 1),
(3, 'User2 Test', 'user2@user.com', '2017-02-02', 'user2', '7e58d63b60197ceb55a1c487989a3720', 424, 1),
(101, 'Adrian Camaj', 'adrian.camaj00@gmail.com', '2000-07-20', 'Ropttt', 'b15f87c022c6814ef223e7165b99af26', 19, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
