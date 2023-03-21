-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 01:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) NOT NULL,
  `eventaddress` varchar(255) NOT NULL,
  `eventlocationmap` varchar(255) NOT NULL,
  `shortinfo` varchar(255) NOT NULL,
  `brieinfo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventaddress`, `eventlocationmap`, `shortinfo`, `brieinfo`, `img`) VALUES
(1, '24-a, Old No 40-a, Dewan Rama Road, Purasaiwalkam', 'https://www.google.com/maps/d/viewer?mid=1VJQtauJAuvjzI1W2bRnr7Q8VISg&hl=en_US&ll=0%2C0&z=3', 'Something', 'Something', 'upload/event.jpeg'),
(2, '24-a, Old No 40-a, Dewan Rama Road, Purasaiwalkam', 'https://www.google.com/maps/d/viewer?mid=1VJQtauJAuvjzI1W2bRnr7Q8VISg&hl=en_US&ll=0%2C0&z=3', 'Something', 'Something', 'upload/event.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `cpassword`) VALUES
(1, 'someone@gmail.com', '$2y$10$zeMw3uo9kICiohWfaAMClOFo7jK0AOgwND3X51g3PJkymuPPlKX/u', '$2y$10$RbhUxPPFe9j031v7ieeZtesaXHqlLl2vY.DxSKY71drByZAlfuJUC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
