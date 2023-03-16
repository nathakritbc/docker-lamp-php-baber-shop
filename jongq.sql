-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 16, 2023 at 10:08 AM
-- Server version: 8.0.32
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jongq`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jongs`
--

CREATE TABLE `tb_jongs` (
  `id` int NOT NULL,
  `jong_date` date NOT NULL,
  `jong_time` time NOT NULL,
  `jong_status` varchar(50) NOT NULL,
  `jong_slip` text NOT NULL,
  `time_slot_id` int NOT NULL,
  `user_id` int NOT NULL,
  `jong_date_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jongs`
--

INSERT INTO `tb_jongs` (`id`, `jong_date`, `jong_time`, `jong_status`, `jong_slip`, `time_slot_id`, `user_id`, `jong_date_time`) VALUES
(4, '2023-03-16', '14:30:00', 'PENDING', '6412e9b6d5f4b34f660ac4e4aff82fe327d0f6c595527Portfolio.png', 3, 3, '10:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_time_slots`
--

CREATE TABLE `tb_time_slots` (
  `id` int NOT NULL,
  `time_slot_time` varchar(100) NOT NULL,
  `time_slot_status` tinyint(1) NOT NULL DEFAULT '1',
  `time_slot_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_time_slots`
--

INSERT INTO `tb_time_slots` (`id`, `time_slot_time`, `time_slot_status`, `time_slot_description`) VALUES
(1, '10:00:00', 1, '10:00-10.50 AM'),
(2, '11:30:00', 1, '11:30-12.50 AM'),
(3, '14:30:00', 0, '14:30-15.50 AM'),
(4, '15:30:00', 1, '15:30-16.50 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `full_name`, `tel`, `username`, `email`, `password`, `profile`, `user_role`) VALUES
(3, 'docker', '0613256897', 'docker', 'docker@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `time_slot_id` (`time_slot_id`);

--
-- Indexes for table `tb_time_slots`
--
ALTER TABLE `tb_time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_time_slots`
--
ALTER TABLE `tb_time_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  ADD CONSTRAINT `tb_jongs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`),
  ADD CONSTRAINT `tb_jongs_ibfk_2` FOREIGN KEY (`time_slot_id`) REFERENCES `tb_time_slots` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
