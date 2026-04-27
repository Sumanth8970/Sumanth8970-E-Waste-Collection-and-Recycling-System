-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 05:10 PM
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
-- Database: `ewaste`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('shyam', '12345'),
('shyam', '12345'),
('dinesh', '5555'),
('dinesh', '5555');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`name`, `email`, `message`) VALUES
('mary', 'abc@gmail.com', 'ghmfvn n n vnbvmhvmhvmhvvmv'),
('mary', 'abc@gmail.com', 'ghmfvn n n vnbvmhvmhvmhvvmv'),
('shyam', 'pp@gmail.com', 'your service can be even more better!');

-- --------------------------------------------------------

--
-- Table structure for table `sell_request`
--

CREATE TABLE `sell_request` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_time` time(6) NOT NULL,
  `status` varchar(50) NOT NULL,
  `request_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_request`
--

INSERT INTO `sell_request` (`name`, `email`, `address`, `city`, `state`, `zip`, `product_name`, `pickup_date`, `pickup_time`, `status`, `request_id`) VALUES
('shyam', 'shyamsss@gmail.com', 'iraivan naaaaaa', 'pudukkotai', 'trichy', '634774', 'sell', '1212-12-13', '12:02:00.000000', 'Rejected', '6417f0ca7d104'),
('dinesh', 'shyam@gmail.com', 'vadakans theru, north street, gomathy nagar,madhya pradesh', 'madhayaoo', 'madhay paraesh', '632873', 'old mobile phone', '2023-03-16', '15:12:00.000000', 'Rejected', '6417f13c06287'),
('maddy', 'maddy@gmail.com', 'iraivan naaaaaa', 'pudukkotai', 'trichy', '634774', 'lap', '2023-03-30', '12:00:00.000000', 'Approved', '641810d8131ce'),
('dinesh', 'shyam@gmail.com', 'vadakans theru, north street, gomathy nagar,madhya pradesh', 'madhayaoo', 'madhay paraesh', '632873', 'fgtrgt', '4354-05-31', '03:45:00.000000', 'Rejected', '641811af5080a'),
('dummy dinesh', 'herl@gmail.com', 'vadakans theru, north street, gomathy nagar,madhya pradesh', 'madhayaoo', 'madhay paraesh', '632873', 'old laptop', '2023-02-11', '13:03:00.000000', 'Approved', '6419c64ede001'),
('shyam', 'shyamsss@gmail.com', 'iraivan naaaaaa', 'pudukkotai', 'trichy', '634774', '3rfewfew', '1212-12-21', '12:12:00.000000', 'Rejected', '6419c783e86ca');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'shyam sundar32sdcd', 'herl32132@gmail.com', '23423231'),
(2, 'shyam sundar32sdcddfvdsvcsd', 'herl32sdcsd132@gmail.com', '234ewdasdcdsac'),
(3, 'sd', 'sd@gmail.com', '12345'),
(4, 'maddy', 'maddy@gmail.com', '54321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
