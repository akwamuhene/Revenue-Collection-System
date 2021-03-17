-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 08:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `targid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `moment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`targid`, `userid`, `target`, `moment`) VALUES
(4, 3, 1000, '2020-03-01 03:44:20'),
(7, 7, 3333333, '2020-03-01 03:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `taxtable`
--

CREATE TABLE `taxtable` (
  `taxid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `taxtype` varchar(120) NOT NULL,
  `amtc` varchar(11) NOT NULL,
  `collector` varchar(120) NOT NULL,
  `moment` datetime NOT NULL,
  `taxnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxtable`
--

INSERT INTO `taxtable` (`taxid`, `userid`, `taxtype`, `amtc`, `collector`, `moment`, `taxnum`) VALUES
(35, 3, 'Mkt Tolls', '0', 'luck', '2020-03-01 16:44:48', 5379168);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `user` varchar(120) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dateregistered` datetime NOT NULL,
  `access` int(11) NOT NULL,
  `suspend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `user`, `pass`, `fname`, `lname`, `sex`, `dob`, `phone`, `dateregistered`, `access`, `suspend`) VALUES
(1, 'admin', 'admin', 'Asante', 'Adoma', 'Male', '2020-02-25', '0501350908', '2020-02-25 13:40:47', 1, 0),
(3, 'luck', 'luck', 'Nathaniel Febiri', 'Obeng', 'Male', '1992-09-16', '0249149420', '2020-02-29 16:40:18', 2, 0),
(7, 'nanahemaa', 'nanahemaa', 'Alice', 'Asantewaa', 'Female', '2020-03-01', '0241470799', '2020-03-01 03:56:35', 2, 0),
(8, 'adsan', 'adsan', 'Collins Asante', 'Adoma', 'Male', '2020-03-01', '0552539861', '2020-03-01 04:28:28', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`targid`);

--
-- Indexes for table `taxtable`
--
ALTER TABLE `taxtable`
  ADD PRIMARY KEY (`taxid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `targid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `taxtable`
--
ALTER TABLE `taxtable`
  MODIFY `taxid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
