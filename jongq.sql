-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 26, 2023 at 11:35 AM
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
  `bi_line_token` text NOT NULL,
  `ip_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'http://localhost',
  `bi_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barbershop_informations`
--

INSERT INTO `tb_barbershop_informations` (`id`, `bi_name`, `bi_tel`, `bi_profile`, `bi_email`, `bi_line`, `bi_descriptions`, `bi_shop_owner`, `bi_line_token`, `ip_address`, `bi_status`) VALUES
(1, 'หัวล้านตัดได้', '061-456-8963', '1.jpg', 'email@gmail.com', 'line-id***', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', 'Alva Adition Alva Adition', '8YXQMYZMXWK0F0GTY15TBNQN4z9nr5h23WVmJ7VA9Cx', ' https://6da4-2001-44c8-42cb-3904-61a8-9493-d8f-47d5.ap.ngrok.io', 1);

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
(9, '2023-03-16 14:25:55', 3, 1, 'ฟหด'),
(10, '2023-03-19 10:16:19', 3, 1, 'uioop[[[[[[[[[['),
(11, '2023-03-22 10:14:25', 5, 1, 'Ok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hairstyles`
--

CREATE TABLE `tb_hairstyles` (
  `id` int NOT NULL,
  `hairstyle_name` varchar(200) NOT NULL,
  `hairstyle_description` text NOT NULL,
  `hairstyle_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_hairstyles`
--

INSERT INTO `tb_hairstyles` (`id`, `hairstyle_name`, `hairstyle_description`, `hairstyle_img`) VALUES
(1, 'ทรงผม1', ' ทรงผมดูดี เซตหน้าม้าปัดข้าง ทรงผมผู้ชายผมยาว ทรงผมชายไทย 2023', 'img1-2020-2.jpg'),
(2, 'ทรงผม2', 'ปล่อยหน้ามาลง ขยี้เล็กน้อย ทรงผมสั้นผู้ชาย ให้ดูลุคสบาย ๆ ทรงผมผู้ชายผมยาว ทรงผมยาว ผู้ชาย', 'img2-2020-2.jpg'),
(3, 'ทรงผม 3', 'ทรงผมสั้นผู้ชาย ทรงผมสั้นเท่ๆผู้ชาย ทรงผมดูดี ย้อมผมทำสี แล้วเซ็ตผมแบบปัดด้านบน ทรงผมยาว ผู้ชาย', 'img3-2020-2.jpg');

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
  `jong_date_time` time NOT NULL,
  `jong_date_time_confirm` datetime DEFAULT NULL,
  `num` int NOT NULL DEFAULT '0'
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
  `barbershop_information_id` int NOT NULL,
  `payment_bank_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_payments`
--

INSERT INTO `tb_payments` (`id`, `payment_name`, `payment_number`, `payment_description`, `payment_image`, `barbershop_information_id`, `payment_bank_name`) VALUES
(1, 'a aa', '06332566598', '', '', 1, 'พร้อมเพย์'),
(2, 'b bb', '456-8796-8796', '', '', 1, 'กสิกร');

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
(3, 'docker update', '0611233657', 'docker_update', 'dockerupdate@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6416e1c7a43962023-03-19 10:19:512022-09-11.png', 'USER'),
(4, 'ADMIN', '0611111111', 'admin', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', '', 'ADMIN'),
(5, 'user1', '0945569865', 'user1', 'user@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', 'USER');

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
-- Indexes for table `tb_hairstyles`
--
ALTER TABLE `tb_hairstyles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) ;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_hairstyles`
--
ALTER TABLE `tb_hairstyles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jongs`
--
ALTER TABLE `tb_jongs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tb_payments`
--
ALTER TABLE `tb_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_time_slots`
--
ALTER TABLE `tb_time_slots`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `tb_jongs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ;

--
-- Constraints for table `tb_payments`
--
ALTER TABLE `tb_payments`
  ADD CONSTRAINT `tb_payments_ibfk_1` FOREIGN KEY (`barbershop_information_id`) REFERENCES `tb_barbershop_informations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
