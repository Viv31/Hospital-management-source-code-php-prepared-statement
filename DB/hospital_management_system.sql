-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 06:45 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `admin_password`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `appointment_time` time(6) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `msg_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `full_name`, `age`, `gender`, `email`, `blood_group`, `disease`, `doctor`, `appointment_time`, `appointment_date`, `appointment_status`, `user_id`, `msg_read`) VALUES
(1, 'Vaibhav ', 27, 'male', 'viv@gmail.com', 'A+', 'Cancer', 'Dr nayla ', '21:59:00.000000', '2021-02-06', 2, 1, 1),
(2, 'viv', 27, 'male', 'viv@gmail.com', 'A+', 'Cancer', 'Dr nayla ', '21:58:00.000000', '2021-02-06', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_number` bigint(11) NOT NULL,
  `doctor_specification` varchar(100) NOT NULL,
  `consult_fees` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_name`, `doctor_number`, `doctor_specification`, `consult_fees`) VALUES
(1, 'Dr nayla ', 987654321, 'TB', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `full_name`, `age`, `gender`, `address`, `city`, `blood_group`, `user_email`, `user_password`, `upload_image`) VALUES
(1, 'vaibhav gangrade', 27, 'Male', '73,sakhipura ujjain MP', 'Ujjain', 'A+', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
