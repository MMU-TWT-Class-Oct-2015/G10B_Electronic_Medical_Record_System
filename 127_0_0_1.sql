-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2016 at 10:59 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emr_system`
--
CREATE DATABASE IF NOT EXISTS `emr_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emr_system`;

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `patientId` int(11) DEFAULT NULL,
  `medicalId` int(11) NOT NULL,
  `symptoms` varchar(100) DEFAULT NULL,
  `diagnosis` varchar(100) DEFAULT NULL,
  `treatment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `userId` int(5) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `type` tinyint(1) DEFAULT NULL,
  `ic` bigint(11) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `doctorName` varchar(50) DEFAULT NULL,
  `speciality` varchar(20) DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`userId`, `username`, `password`, `type`, `ic`, `phoneNo`, `email`, `gender`, `doctorName`, `speciality`, `picture`) VALUES
(1, 'admin', '12345', 1, 951236875482, 103568749, 'admin@gmail.com', 'M', 'Tan Ker Yun', 'Surgeon', NULL),
(2, 'staff', 'staff', 0, 753214865128, 365248975, 'staff@gmail.com', 'F', 'Cindy', 'Heart Surgeon', NULL),
(3, 'Choong', '12345', 1, 930518016455, 167030656, 'choonghansheng93@gmail.com', 'm', 'Choong Han Sheng', 'Psychologist', NULL),
(4, 'Chong', 'cyscys', 0, 98989898989898, 123456789, 'cys1996@hotmail.com', '0', 'Chong Yee Soon', 'Physicist', NULL),
(5, 'Chong', 'cys95', 0, 999999999999, 123456789, 'cys1996@hotmail.com', 'm', 'Chong Yee Soon', 'Dota', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `userId` int(11) DEFAULT NULL,
  `patientId` int(11) NOT NULL,
  `patientName` varchar(50) DEFAULT NULL,
  `patientPhoneNo` int(11) DEFAULT NULL,
  `patientIc` bigint(20) DEFAULT NULL,
  `patientAddress` varchar(100) DEFAULT NULL,
  `Dob` date DEFAULT NULL,
  `patientGender` char(1) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  `religion` varchar(10) DEFAULT NULL,
  `insurance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`userId`, `patientId`, `patientName`, `patientPhoneNo`, `patientIc`, `patientAddress`, `Dob`, `patientGender`, `race`, `religion`, `insurance`) VALUES
(1, 12, '3', 3, 3, '3', '2016-02-02', 'm', 'malay', '3', '3'),
(1, 13, '11111', 11111, 11111, '11111', '2016-02-02', 'm', 'malay', '11111', '11111'),
(1, 14, '', 0, 0, '', '0000-00-00', '', '', '', ''),
(1, 15, '', 0, 0, '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `recordId` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `treatment` varchar(500) DEFAULT NULL,
  `diagnosis` varchar(500) DEFAULT NULL,
  `symptom` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`recordId`, `patientId`, `userId`, `treatment`, `diagnosis`, `symptom`) VALUES
(1, 12, 1, 'hihi', 'byby', 'qweqwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`medicalId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`recordId`),
  ADD KEY `patientId` (`patientId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `medicalId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `recordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD CONSTRAINT `medical_history_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `patient` (`patientId`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `members` (`userId`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `patient` (`patientId`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `members` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
