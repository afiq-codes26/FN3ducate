-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 02:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fn3ducate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation_db`
--

CREATE TABLE `allocation_db` (
  `Allocation_ID` int(11) NOT NULL,
  `Tutor_ID` varchar(6) NOT NULL,
  `Timeslot_Code` varchar(4) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Timeslot` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allocation_db`
--

INSERT INTO `allocation_db` (`Allocation_ID`, `Tutor_ID`, `Timeslot_Code`, `Type`, `Timeslot`) VALUES
(110, 'T00010', 'T002', 'Grouped', '9.00 am to 10.00 am'),
(111, 'T00010', 'T002', 'Grouped', '9.00 am to 10.00 am'),
(112, 'T00010', 'T003', 'Grouped', ''),
(113, 'T00010', 'T007', 'Grouped', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_db`
--

CREATE TABLE `booking_db` (
  `Booking_ID` int(11) NOT NULL,
  `Student_ID` varchar(6) NOT NULL,
  `Tutor_ID` varchar(6) NOT NULL,
  `Level_Code` varchar(3) NOT NULL,
  `Allocation_ID` int(11) DEFAULT NULL,
  `Subject_ID` varchar(5) DEFAULT NULL,
  `Booking_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_db`
--

INSERT INTO `booking_db` (`Booking_ID`, `Student_ID`, `Tutor_ID`, `Level_Code`, `Allocation_ID`, `Subject_ID`, `Booking_Date`) VALUES
(104, 'ID0008', 'T00010', 'L03', 110, 'S0001', '2024-05-10'),
(105, 'ID0002', 'T00010', 'L04', 111, 'S0001', '2024-05-09'),
(106, 'ID0003', 'T00010', 'L04', 111, 'S0001', '2024-05-15'),
(107, 'ID0007', 'T00010', 'L01', 112, 'S0003', '2024-05-22'),
(108, 'ID0007', 'T00010', 'L04', 113, 'S0003', '2024-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `level_db`
--

CREATE TABLE `level_db` (
  `Level_Code` varchar(3) NOT NULL,
  `Student_Level` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level_db`
--

INSERT INTO `level_db` (`Level_Code`, `Student_Level`) VALUES
('L01', 'Form 1'),
('L02', 'Form 2'),
('L03', 'Form 3'),
('L04', 'Form 4'),
('L05', 'Form 5');

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

CREATE TABLE `student_db` (
  `Student_ID` varchar(6) NOT NULL,
  `Level_Code` varchar(3) NOT NULL,
  `Student_Name` varchar(50) DEFAULT NULL,
  `Password_Stud` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_db`
--

INSERT INTO `student_db` (`Student_ID`, `Level_Code`, `Student_Name`, `Password_Stud`) VALUES
('ID0001', 'L04', 'Afiq Aiman ', 'abc123'),
('ID0002', 'L05', 'Abdul Naufal Fitri', 'def456'),
('ID0003', 'L04', 'Nariesya Auni', 'abc112'),
('ID0004', 'L05', 'Aina Alesha', 'abc234'),
('ID0005', 'L05', 'Karl Xavier', 'abc445'),
('ID0006', 'L05', 'Imann Shaizmy', 'def334'),
('ID0007', 'L05', 'Iman Nur Batrisyia', 'abc223'),
('ID0008', 'L05', 'Othman Arif', 'geiboiu'),
('ID0010', 'L03', 'Adam Harith ', 'acd114'),
('user00', 'L03', 'Nur Amirah Syahirah', 'abc1123');

-- --------------------------------------------------------

--
-- Table structure for table `subject_db`
--

CREATE TABLE `subject_db` (
  `Subject_ID` varchar(5) NOT NULL,
  `Subject_Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_db`
--

INSERT INTO `subject_db` (`Subject_ID`, `Subject_Name`) VALUES
('S0001', 'English'),
('S0002', 'Additional Mathematics'),
('S0003', 'Mathematics'),
('S0004', 'Science'),
('S0005', 'Physics'),
('S0006', 'Chemistry'),
('S0007', 'Biology'),
('S0008', 'History');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_db`
--

CREATE TABLE `timeslot_db` (
  `Timeslot_Code` varchar(4) NOT NULL,
  `Timeslot` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeslot_db`
--

INSERT INTO `timeslot_db` (`Timeslot_Code`, `Timeslot`) VALUES
('T001', '8.00 am to 9.00 am'),
('T002', '9.00 am to 10.00 am'),
('T003', '10.00 am to 11.00 am'),
('T004', '11.00 am to 12.00 pm'),
('T005', '12.00 pm to 1.00 pm'),
('T006', '1.00 pm to 2.00 pm'),
('T007', '2.00 pm to 3.00 pm'),
('T008', '3.00 pm to 4.00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tutorsubject_db`
--

CREATE TABLE `tutorsubject_db` (
  `Teaching_ID` int(11) NOT NULL,
  `Tutor_ID` varchar(6) NOT NULL,
  `Subject_ID` varchar(5) NOT NULL,
  `Tutor_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorsubject_db`
--

INSERT INTO `tutorsubject_db` (`Teaching_ID`, `Tutor_ID`, `Subject_ID`, `Tutor_Name`) VALUES
(102, 'T00010', 'S0001', 'Dr. Othman'),
(103, 'T00010', 'S0003', 'Dr. Othman');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_db`
--

CREATE TABLE `tutor_db` (
  `Tutor_ID` varchar(6) NOT NULL,
  `Tutor_Phone` varchar(13) NOT NULL,
  `Password_Tut` varchar(10) NOT NULL,
  `Tutor_Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor_db`
--

INSERT INTO `tutor_db` (`Tutor_ID`, `Tutor_Phone`, `Password_Tut`, `Tutor_Name`) VALUES
('T00010', '0192177598', 'abc112', 'Dr. Othman Fahrin bin Azril');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation_db`
--
ALTER TABLE `allocation_db`
  ADD PRIMARY KEY (`Allocation_ID`),
  ADD KEY `allocation_tutor` (`Tutor_ID`),
  ADD KEY `allocation_timeslot` (`Timeslot_Code`);

--
-- Indexes for table `booking_db`
--
ALTER TABLE `booking_db`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `booking_tutor` (`Tutor_ID`),
  ADD KEY `booking_student` (`Student_ID`),
  ADD KEY `booking_level` (`Level_Code`),
  ADD KEY `booking_allocation` (`Allocation_ID`),
  ADD KEY `booking_subject` (`Subject_ID`);

--
-- Indexes for table `level_db`
--
ALTER TABLE `level_db`
  ADD PRIMARY KEY (`Level_Code`);

--
-- Indexes for table `student_db`
--
ALTER TABLE `student_db`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `student_level` (`Level_Code`);

--
-- Indexes for table `subject_db`
--
ALTER TABLE `subject_db`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `timeslot_db`
--
ALTER TABLE `timeslot_db`
  ADD PRIMARY KEY (`Timeslot_Code`);

--
-- Indexes for table `tutorsubject_db`
--
ALTER TABLE `tutorsubject_db`
  ADD PRIMARY KEY (`Teaching_ID`),
  ADD KEY `teaching_tutor` (`Tutor_ID`),
  ADD KEY `teaching_subject` (`Subject_ID`);

--
-- Indexes for table `tutor_db`
--
ALTER TABLE `tutor_db`
  ADD PRIMARY KEY (`Tutor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation_db`
--
ALTER TABLE `allocation_db`
  MODIFY `Allocation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `booking_db`
--
ALTER TABLE `booking_db`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tutorsubject_db`
--
ALTER TABLE `tutorsubject_db`
  MODIFY `Teaching_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation_db`
--
ALTER TABLE `allocation_db`
  ADD CONSTRAINT `allocation_timeslot` FOREIGN KEY (`Timeslot_Code`) REFERENCES `timeslot_db` (`Timeslot_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allocation_tutor` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor_db` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_db`
--
ALTER TABLE `booking_db`
  ADD CONSTRAINT `booking_allocation` FOREIGN KEY (`Allocation_ID`) REFERENCES `allocation_db` (`Allocation_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_level` FOREIGN KEY (`Level_Code`) REFERENCES `level_db` (`Level_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_student` FOREIGN KEY (`Student_ID`) REFERENCES `student_db` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_subject` FOREIGN KEY (`Subject_ID`) REFERENCES `subject_db` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_tutor` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor_db` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_db`
--
ALTER TABLE `student_db`
  ADD CONSTRAINT `student_level` FOREIGN KEY (`Level_Code`) REFERENCES `level_db` (`Level_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutorsubject_db`
--
ALTER TABLE `tutorsubject_db`
  ADD CONSTRAINT `teaching_subject` FOREIGN KEY (`Subject_ID`) REFERENCES `subject_db` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaching_tutor` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor_db` (`Tutor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
