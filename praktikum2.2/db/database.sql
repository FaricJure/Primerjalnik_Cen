-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 10, 2019 at 03:42 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum2.2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `uid` tinytext NOT NULL,
  `pwd` tinytext NOT NULL,
  `email` longtext NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `notification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uid`, `pwd`, `email`, `admin`, `notification`) VALUES
(3, 'admin', '$2y$10$xJ3EOO.RTe8pR6CCkJcDLOm8k/J5V7M1fMQ0uElkYiEv0sDoxtLDu', 'admin@mail.com', 1, 0),
(4, 'Eftimije', '$2y$10$TK1ynl7xXIj629n9rUHzC.b175K/ld.VKWbASY1vl1B/BGloLlDu.', 'tomovskie@gmail.com', 0, 0),
(5, 'Bojana', '$2y$10$XUOqowwbyQs.GRU60O6n3.EdywFBykz/LuJdO98vVf2f9idJFeDXG', 'bojana@gmail.com', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
