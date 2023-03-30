-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 30, 2023 at 12:01 PM
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
(3, '14:30:00', 1, '14:30-15.50 AM'),
(4, '16:30:00', 1, '15:30-16.50 AM'),
(8, '08:00:00', 1, '08:00-10.00 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_time_slots`
--
ALTER TABLE `tb_time_slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_time_slots`
--
ALTER TABLE `tb_time_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
