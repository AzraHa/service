-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 01:30 PM
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
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `reservation_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_phone` int(11) NOT NULL,
  `reservation_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_slot` time NOT NULL,
  `reservation_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tirehotel`
--

CREATE TABLE `tirehotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_sifra` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_tireType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_tireNum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_dateFrom` date NOT NULL,
  `hotel_dateTo` date NOT NULL,
  `hotel_dateRes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_level` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_username`, `user_password`, `user_date`, `user_level`) VALUES
(1, 'Azra', 'Hadzihajdarevic', 'azrychh@gmail.com', 'Azra', '14e1b600b1fd579f47433b88e8d85291', '2019-08-22 11:35:29', ''),
(2, 'Adnan', 'Hadzihajdarevic', 'adnan@gmail.com', 'Adnan', '14e1b600b1fd579f47433b88e8d85291', '2019-08-22 14:40:45', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `reservation_username` (`reservation_username`);

--
-- Indexes for table `tirehotel`
--
ALTER TABLE `tirehotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD UNIQUE KEY `hotel_username` (`hotel_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tirehotel`
--
ALTER TABLE `tirehotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `tirehotel` (`hotel_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`reservation_username`) REFERENCES `users` (`user_username`);

--
-- Constraints for table `tirehotel`
--
ALTER TABLE `tirehotel`
  ADD CONSTRAINT `tirehotel_ibfk_1` FOREIGN KEY (`hotel_username`) REFERENCES `users` (`user_username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
