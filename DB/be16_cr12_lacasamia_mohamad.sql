-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 07:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be16_cr12_lacasamia_mohamad`
--
CREATE DATABASE IF NOT EXISTS `be16_cr12_lacasamia_mohamad` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be16_cr12_lacasamia_mohamad`;

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `size` varchar(30) NOT NULL,
  `room_number` varchar(12) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` decimal(10,5) NOT NULL,
  `longitude` decimal(10,5) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `reduction` enum('No','Yes') NOT NULL DEFAULT 'Yes',
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `title`, `size`, `room_number`, `city`, `address`, `latitude`, `longitude`, `picture`, `reduction`, `price`) VALUES
(1, 'Apartment 1120 Wien', '89', '10', 'Vienna', '718 Jenna Park', '48.19404', '16.30790', 'pic1.png', 'No', '1,200'),
(2, 'Apartment 1220 Wien', '102', '40', 'Vienna', '4672 Weeping Birch Lane', '48.19558', '16.30827', 'pic2.png', 'No', '3,000'),
(3, 'Apartment 1150 Wien', '80', '20', 'Vienna', '22939 Morningstar Park', '48.21827', '16.32366', 'pic3.png', 'Yes', '2,000'),
(4, 'Apartment 1160 Wien', '100', '50', 'Vienna', '36 Melody Lane', '48.24240', '16.27131', 'pic4.png', 'Yes', '1,500'),
(5, 'Apartment 1170 Wien', '50', '20', 'Vienna', '4 Charing Cross Way', '48.29646', '16.73159', 'pic5.png', 'No', '1,400'),
(6, 'Apartment 1230 Wien', '70', '11', 'Vienna', '85 Sommers Hill', '48.20754', '16.24905', 'pic6.png', 'Yes', '5,000'),
(7, 'Apartment 1180 Wien', '60', '30', 'Vienna', '4 Charing Cross Way', '48.20699', '16.10860', 'pic7.png', 'Yes', '3,100'),
(8, 'Apartment 1130 Wien', '100', '2', 'Vienna', '4672 Weeping Birch Lane', '48.21461', '16.27681', 'pic8.png', 'Yes', '900'),
(9, 'Apartment 1170 Wien', '80', '30', 'Vienna', '17120 Artisan Trail', '48.20482', '16.06532', 'pic9.png', 'Yes', '1,300'),
(10, 'Apartment 1140 Wien', '102', '1', 'Vienna', '553 Parkside Point', '48.20971', '16.38214', 'pic10.png', 'Yes', '2,200'),
(11, 'veinna', '123', '3', 'Vienna', 'Vienna, now', '48.54545', '19.84781', '62e3f38ad5e0f.png', 'No', '20000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
