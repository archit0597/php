-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 09:41 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `custid` bigint(20) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `custpass` varchar(50) NOT NULL,
  `custphone` bigint(10) NOT NULL,
  `custaddress` varchar(60) NOT NULL,
  `custstate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`custid`, `custname`, `custemail`, `custpass`, `custphone`, `custaddress`, `custstate`) VALUES
(30, 'Raj', 'raj@gmail.com', 'raj', 9566211984, 'D-407', 'Tamil Nadu'),
(31, 'Archit', 'archit@gmail.com', 'archit', 9566210984, 'C-407', 'Tamil Nadu'),
(32, 'Aryaman', 'aryaman@gmail.com', 'aryaman', 9566213443, 'C-876', 'Tamil Nadu'),
(33, 'Saatvik', 'saatvik@gmail.com', 'saatvik', 9876543542, 'F-677', 'Tamil Nadu'),
(34, 'Ayan', 'ayan@gmail.com', 'ayan', 9565265523, 'E-908', 'Tamil Nadu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`custid`),
  ADD UNIQUE KEY `UNIQUE` (`custemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `custid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
