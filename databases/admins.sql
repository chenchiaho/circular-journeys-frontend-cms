-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 09:05 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `circular_journeys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `sid` int(11) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`sid`, `account_id`, `password_hash`) VALUES
(2, 'kevinLa', '$2y$10$uS4kY1gRTYj02v12uvr/SeL1HYqnLEoTdzJpM/u7V8LW4nKlthkSq'),
(3, 'Anchor', '$2y$10$8ygdQqqGJ7mQSzE7FEoXk./N0G6XGJbYJcjPzTsxOYXQV1t3OWmsC'),
(4, 'Circle', '$2y$10$lxNFSJhX8YZnuSzwm8pEIOjlH166vq0b8XqUsQFTpVxY.VHyif2mq'),
(5, 'Alan', '$2y$10$m7ScZmsTplvDxbxRkYxdmunfJHbZ7F04PAUBWOBL9djX5BH.6/M0.'),
(6, 'Feng', '$2y$10$Hhx.wOdaLu.ncG9DSRPEGOU.lXv5t68bgRtEq5TFFc0q5CYqI.n82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `account_id_2` (`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
