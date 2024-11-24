-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 03:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation`
--

CREATE TABLE `blood_donation` (
  `donor_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `blood_type` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `donation_date` datetime DEFAULT NULL,
  `donation_center_name` varchar(150) NOT NULL,
  `donation_center_address` varchar(255) NOT NULL,
  `last_donation_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `blood_volume` float DEFAULT NULL,
  `blood_donation_status` varchar(50) DEFAULT 'Pending',
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_donation`
--

INSERT INTO `blood_donation` (`donor_id`, `name`, `dob`, `blood_type`, `email`, `phone`, `appointment_date`, `donation_date`, `donation_center_name`, `donation_center_address`, `last_donation_date`, `status`, `blood_volume`, `blood_donation_status`, `remarks`) VALUES
(32, 'Doner 4', '2024-11-07', 'B+', 'donor4@gmail.com', '01722100538', '2024-11-27 17:08:00', '2024-11-29 16:36:00', 'Dhaka Medical', 'Dhaka', '2024-02-23', 'Approved', 2, 'Done', ''),
(33, 'Donor 1', '2011-02-24', 'B+', 'donor1@gmail.com', '01767522952', '2024-11-27 17:19:00', '2024-11-27 17:19:00', 'Dhaka Medical', 'Dhaka', '2024-01-23', 'Approved', 2, 'Pending', NULL),
(34, 'donor 2', '2024-11-14', 'A+', 'donor2@gmail.com', '01767522952', '2024-11-28 17:27:00', '2024-11-28 17:27:00', 'Dhaka Medical', 'Dhaka', '2020-06-24', 'Approved', 2, 'Done', 'You have to take healthy food'),
(35, 'donor 3', '2016-02-15', 'A-', 'donor3@gmail.com', '01767522952', '2024-11-28 17:31:00', '2024-11-28 17:31:00', 'Dhaka Medical', 'Dhaka', '2024-01-23', 'Approved', 2, 'Done', 'You have to take healthy foods.'),
(36, 'donor 5', '2016-02-23', 'B+', 'donor5@gmail.com', '01767522952', '2024-11-28 17:52:00', '2024-11-28 17:52:00', 'Dhaka Medical', 'Dhaka', '2024-01-23', 'Approved', 2, 'Pending', NULL),
(37, 'Rahiful', '2016-02-16', 'B+', 'rahifulislam7@gmail.com', '0176752295', '2024-11-29 18:57:00', '2024-11-29 18:57:00', 'Dhaka Medical', 'Dhaka', '2024-01-15', 'Approved', 2, 'Pending', NULL),
(38, 'donor7', '2014-02-17', 'B+', 'donor7@gmail.com', '01767522952', '2024-11-28 19:46:00', '2024-11-08 22:46:00', 'dhaka', 'House: 8, Road: 2, Ekota housing, Uttar Badda, Dhaka', '2024-01-23', 'Approved', 2, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_list`
--

CREATE TABLE `blood_list` (
  `id` int(11) NOT NULL,
  `blood_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('Available','Unavailable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Sumaiya Najnin Haque', '12345'),
(2, 'Donor1', '12345'),
(3, 'donor3', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donation`
--
ALTER TABLE `blood_donation`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `blood_list`
--
ALTER TABLE `blood_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_donation`
--
ALTER TABLE `blood_donation`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `blood_list`
--
ALTER TABLE `blood_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
