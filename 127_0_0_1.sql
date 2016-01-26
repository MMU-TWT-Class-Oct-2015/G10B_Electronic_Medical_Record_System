-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Jan 26, 2016 at 09:48 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1
=======
-- Generation Time: Jan 26, 2016 at 06:47 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15
>>>>>>> 2e4a19b41fccfe094935be52ff0ce608150b6362

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
<<<<<<< HEAD
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` int(11) NOT NULL,
  `doctorName` varchar(50) DEFAULT NULL,
  `speciality` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
=======
>>>>>>> 2e4a19b41fccfe094935be52ff0ce608150b6362
-- Table structure for table `members`
--

CREATE TABLE `members` (
<<<<<<< HEAD
  `userId` int(5) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `type` tinyint(1) DEFAULT NULL,
  `ic` bigint(11) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL
=======
  `id` int(5) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT ''
>>>>>>> 2e4a19b41fccfe094935be52ff0ce608150b6362
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

<<<<<<< HEAD
INSERT INTO `members` (`userId`, `username`, `password`, `type`, `ic`, `phoneNo`, `email`, `gender`) VALUES
(1, 'admin', '12345', 1, 951236875482, 103568749, 'admin@gmail.com', 'M'),
(2, 'staff', 'staff', 0, 753214865128, 365248975, 'staff@gmail.com', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `userId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `patientName` varchar(50) NOT NULL,
  `patientPhoneNo` int(11) NOT NULL,
  `patientIc` bigint(20) NOT NULL,
  `patientAddress` varchar(100) NOT NULL,
  `Dob` date NOT NULL,
  `recordId` int(11) NOT NULL,
  `patientGender` char(1) NOT NULL,
  `race` varchar(10) NOT NULL,
  `religion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `recordId` int(11) NOT NULL,
  `patientId` int(11) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
INSERT INTO `members` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');
>>>>>>> 2e4a19b41fccfe094935be52ff0ce608150b6362

--
-- Indexes for dumped tables
--

--
<<<<<<< HEAD
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorId`);

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
  ADD KEY `doctorId` (`doctorId`);
=======
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);
>>>>>>> 2e4a19b41fccfe094935be52ff0ce608150b6362

--
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `medicalId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `recordId` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`doctorId`) REFERENCES `doctor` (`doctorId`);

=======
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 2e4a19b41fccfe094935be52ff0ce608150b6362
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
