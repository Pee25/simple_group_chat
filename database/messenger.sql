-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 10:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sent_by`, `message`, `date`) VALUES
(25, 8, 'asdasd', '2020-12-09 14:24:18'),
(26, 0, '', '2020-12-09 14:36:19'),
(27, 0, '', '2020-12-09 14:38:13'),
(28, 7, 'sdadsasd', '2020-12-09 14:38:59'),
(29, 7, 'ewewew', '2020-12-09 14:39:04'),
(30, 8, 'ddddd', '2020-12-09 14:39:26'),
(31, 7, 'dddd', '2020-12-09 14:43:54'),
(32, 7, '', '2020-12-09 14:49:18'),
(33, 7, 'asdasd', '2020-12-09 14:49:21'),
(34, 7, 'dddddddddddddddd', '2020-12-09 14:49:29'),
(35, 7, 'ddddddddddddd', '2020-12-09 14:50:26'),
(36, 9, 'hahahaha', '2020-12-09 14:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `Id_receive` int(11) NOT NULL,
  `receive_by_id` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-unread, 1-read'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`Id_receive`, `receive_by_id`, `status`) VALUES
(10, 8, 0),
(11, 7, 0),
(12, 8, 0),
(13, 8, 0),
(14, 7, 0),
(15, 7, 0),
(16, 8, 0),
(17, 7, 0),
(18, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Date_Registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` int(1) NOT NULL COMMENT '0-inactive, 1-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `FirstName`, `LastName`, `Email`, `Password`, `Date_Registered`, `Status`) VALUES
(7, 'Paul', 'Gasme2', 'gasmenp@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-08 10:07:56', 1),
(8, 'Anna', 'kakay', 'anyone@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-09 03:19:20', 1),
(9, 'TaeTae', 'sssss', 'anim@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-09 03:19:32', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`Id_receive`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `Id_receive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
