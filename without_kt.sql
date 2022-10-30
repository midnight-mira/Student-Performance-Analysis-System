-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 06:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sps`
--

-- --------------------------------------------------------

--
-- Table structure for table `without_kt`
--

CREATE TABLE `without_kt` (
  `sr_no` int(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `intake_total` int(255) NOT NULL,
  `intake_fe` int(255) NOT NULL,
  `intake_dse` int(255) NOT NULL,
  `intake_te` int(255) NOT NULL,
  `year1` varchar(255) NOT NULL,
  `year2` varchar(255) NOT NULL,
  `year3` varchar(255) NOT NULL,
  `year4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `without_kt`
--

INSERT INTO `without_kt` (`sr_no`, `year`, `intake_total`, `intake_fe`, `intake_dse`, `intake_te`, `year1`, `year2`, `year3`, `year4`) VALUES
(5, '2017-18', 10, 4, 2, 0, '3', '3 + 2', '', ''),
(6, '2017-18', 4, 4, 0, 0, '0', '', '', ''),
(8, '2018-19', 10, 4, 2, 0, '3', '3 + 2', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `without_kt`
--
ALTER TABLE `without_kt`
  ADD PRIMARY KEY (`sr_no`,`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `without_kt`
--
ALTER TABLE `without_kt`
  MODIFY `sr_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
