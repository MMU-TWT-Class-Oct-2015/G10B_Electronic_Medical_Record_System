-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2016 at 11:05 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

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
(1, 'admin', '12345', 1, 951212011234, 111231234, 'admin@gmail.com', 'M', 'Tan Ker Yun', 'Surgeon', 'image\\dentist.jpg'),
(2, 'staff', 'staff', 0, 750401016765, 122345123, 'staff@gmail.com', 'M', 'Cindy', 'Heart Surgeon', 'image\\dentist.jpg'),
(6, 'JB', '12345', 0, 991104012345, 151111987, 'ng_jb94@hotmail.com', 'M', 'Ng Jin Boon', 'Dentists', 'image\\dentist.jpg'),
(33, 'Ali', '1234', 0, 891201014567, 198769768, '1231@gmail.com', 'F', 'Ali Wong', 'Dentists', 'image/nurse.jpg'),
(34, 'kelvin', '12345', 0, 870105016724, 188987652, 'asda@hotmail.com', 'm', 'kelvin Tan', 'Dentists', 'image/dr.female.png'),
(35, 'Dali', '1234', 0, 881212012345, 199999281, '123213@gmail.com', 'f', 'Dali ng', 'Dentists&#8206;', 'image/dr.female.png');

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
  `insurance` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`userId`, `patientId`, `patientName`, `patientPhoneNo`, `patientIc`, `patientAddress`, `Dob`, `patientGender`, `race`, `religion`, `insurance`, `age`) VALUES
(1, 12, 'Ali', 198712645, 870105018765, '10 jalan 12 taman bunga raya', '2016-02-02', 'm', 'malay', 'malaysian', 'AIA', NULL),
(1, 13, 'Amy', 177653456, 980115012386, 'jalan 10 taman bunga raya', '2016-02-18', 'm', 'malay', 'malaysian', 'Potential', NULL),
(1, 14, 'Lily', 192344221, 991201012345, '12,jalan 11 taman bunga raya', '2015-06-16', 'F', 'cina', 'malaysian', 'AIA', NULL),
(1, 15, 'Nami', 177895643, 990101012345, '44,jalan bunga raya taman bunga raya', '1994-07-12', 'F', 'indian', 'malaysian', 'AIA', NULL);

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
(1, 12, 1, 'Beauty Treatments', 'Nursing diagnosis', 'Interstitial Cystitis Symptoms and Signs');

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
  MODIFY `userId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `recordId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
