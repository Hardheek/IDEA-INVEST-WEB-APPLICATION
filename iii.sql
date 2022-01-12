-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 03:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iii`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `role` text NOT NULL,
  `password` text NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`firstname`, `lastname`, `email`, `role`, `password`, `phone`) VALUES
('admin', 'admin', 'admin@gmail.com', 'accept', 'admin', 987654321),
('Harry', 'Bran', 'harry@gmail.com', 'client', '12345', 1234556789),
('bill', 'gates', 'bill@gmail.com', 'sponsor', 'billgates', 1234556722),
('io', 'out', 'io@gmail.com', 'client', '1234', 1234567777),
('harry', 'fff', 'harry@gmail.com', 'client', '980', 1234556789);

-- --------------------------------------------------------

--
-- Table structure for table `enter`
--

CREATE TABLE `enter` (
  `email` text NOT NULL,
  `startupname` text NOT NULL,
  `abstract` text NOT NULL,
  `share` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `goals` text NOT NULL,
  `address` text NOT NULL,
  `stakeholder` text NOT NULL,
  `stakeholderdet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enter`
--

INSERT INTO `enter` (`email`, `startupname`, `abstract`, `share`, `amount`, `goals`, `address`, `stakeholder`, `stakeholderdet`) VALUES
('harry@gmail.com', 'AIR', 'AIR IS THE NATURAL PHENOMENA', 10, 15000, 'PURIFY', '1244', 'RAM', 'RAM'),
('harry@gmail.com', 'EDUREKA', 'PROVIDING GOOD EDUCATION FOR POOR PEOPLE', 15, 30000, 'FOOD,STATIONARY', 'HYDERABAD', 'HARI', 'MAX COMPANY'),
('harry@gmail.com', 'SWIM', 'POOL SWIMMING', 10, 20000, 'FOR THE LUXIRIOUS', 'HYDERABAD', 'VISHNU', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` int(20) NOT NULL,
  `date` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sanctioned`
--

CREATE TABLE `sanctioned` (
  `semail` text NOT NULL,
  `cemail` text NOT NULL,
  `startupname` text NOT NULL,
  `share` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `tshare` int(11) NOT NULL,
  `tamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanctioned`
--

INSERT INTO `sanctioned` (`semail`, `cemail`, `startupname`, `share`, `amount`, `tshare`, `tamount`) VALUES
('bill@gmail.com', '', '', 0, 0, 0, 0),
('bill@gmail.com', 'harry@gmail.com', 'AIR', 10, 20000, 20, 30000),
('bill@gmail.com', 'harry@gmail.com', 'EDUREKA', 15, 30000, 20, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `sponmessage`
--

CREATE TABLE `sponmessage` (
  `email` text NOT NULL,
  `cemail` text NOT NULL,
  `startupname` text NOT NULL,
  `share` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponmessage`
--

INSERT INTO `sponmessage` (`email`, `cemail`, `startupname`, `share`, `amount`) VALUES
('bill@gmail.com', 'harry@gmail.com', 'AIR', 20, 20000),
('bill@gmail.com', 'harry@gmail.com', 'EDUREKA', 20, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorrequest`
--

CREATE TABLE `sponsorrequest` (
  `email` text NOT NULL,
  `cemail` text NOT NULL,
  `startupname` text NOT NULL,
  `share` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD UNIQUE KEY `email` (`email`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
