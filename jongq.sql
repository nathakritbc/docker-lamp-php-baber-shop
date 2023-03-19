-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 19, 2023 at 09:04 AM
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
-- Table structure for table `tb_barbershop_informations`
--

CREATE TABLE `tb_barbershop_informations` (
  `id` int NOT NULL,
  `bi_name` varchar(100) NOT NULL,
  `bi_tel` varchar(50) NOT NULL,
  `bi_profile` text NOT NULL,
  `bi_email` varchar(50) NOT NULL,
  `bi_line` varchar(50) NOT NULL,
  `bi_descriptions` text NOT NULL,
  `bi_shop_owner` varchar(100) NOT NULL,
  `bi_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barbershop_informations`
--

INSERT INTO `tb_barbershop_informations` (`id`, `bi_name`, `bi_tel`, `bi_profile`, `bi_email`, `bi_line`, `bi_descriptions`, `bi_shop_owner`, `bi_icon`) VALUES
(1, 'หัวล้านตัดได้', '061-456-8963', '1.jpg', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', 'Alva Adition', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `barbershop_information_id` int NOT NULL,
  `com_descriptions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id`, `com_date`, `user_id`, `barbershop_information_id`, `com_descriptions`) VALUES
(1, '2023-03-16 13:42:15', 3, 1, 'aaaaa'),
(4, '2023-03-16 13:52:16', 3, 1, 'addddddddddddddddd'),
(5, '2023-03-16 14:20:28', 3, 1, 'rttttttttt'),
(6, '2023-03-16 14:22:49', 3, 1, 'uuuuuuuuuuuuuuuuuuuuu'),
(7, '2023-03-16 14:24:38', 3, 1, 'errrrrrrrrrrrr'),
(8, '2023-03-16 14:24:49', 3, 1, 'oppppp'),
(9, '2023-03-16 14:25:55', 3, 1, 'ฟหด');

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_payments`
--

CREATE TABLE `tb_payments` (
  `id` int NOT NULL,
  `payment_name` varchar(100) NOT NULL,
  `payment_number` varchar(50) NOT NULL,
  `payment_description` varchar(200) NOT NULL,
  `payment_image` text NOT NULL,
  `barbershop_information_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `full_name`, `tel`, `username`, `email`, `password`, `profile`, `user_role`) VALUES
(3, 'docker update', '0611233657', 'docker_update', 'docker_update@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6415830c0c5ed2023-03-18 09:23:24chicken.png', 'USER'),
(4, 'ADMIN', '0611111111', 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barbershop_informations`
--
ALTER TABLE `tb_barbershop_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `barbershop_information_id` (`barbershop_information_id`);

--
-- Indexes for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `time_slot_id` (`time_slot_id`);

--
-- Indexes for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barbershop_information_id` (`barbershop_information_id`);

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
-- AUTO_INCREMENT for table `tb_barbershop_informations`
--
ALTER TABLE `tb_barbershop_informations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_payments`
--
ALTER TABLE `tb_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_time_slots`
--
ALTER TABLE `tb_time_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`),
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`barbershop_information_id`) REFERENCES `tb_barbershop_informations` (`id`);

--
-- Constraints for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  ADD CONSTRAINT `tb_jongs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`),
  ADD CONSTRAINT `tb_jongs_ibfk_2` FOREIGN KEY (`time_slot_id`) REFERENCES `tb_time_slots` (`id`);

--
-- Constraints for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD CONSTRAINT `tb_payments_ibfk_1` FOREIGN KEY (`barbershop_information_id`) REFERENCES `tb_barbershop_informations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
