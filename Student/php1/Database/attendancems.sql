-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2023 at 07:18 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancems`
--

-- --------------------------------------------------------

--
-- Table structure for table `event1`
--

DROP TABLE IF EXISTS `event1`;
CREATE TABLE IF NOT EXISTS `event1` (
  `No` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event1`
--

INSERT INTO `event1` (`No`, `Name`) VALUES
(2, 'Result of written test held on 21-May-2022 for the post of lecturer - Civil Engineering - SFI'),
(3, 'Result of written test held on 21-May-2022 for the post of lecturer - Physics - SFI'),
(4, 'Advertisement for recruitment April-2022'),
(5, 'Application form for recruitment April-2022'),
(6, 'Tracer Form For Alumni'),
(7, 'Fee Circular for semester 4 SFI students'),
(8, 'Fee Circular for semester 4 GIA students'),
(9, 'Vaccination Circular'),
(10, 'AICTE & ISTE Approved STTP on Energy Conservation and Energy Management');

-- --------------------------------------------------------

--
-- Table structure for table `event2`
--

DROP TABLE IF EXISTS `event2`;
CREATE TABLE IF NOT EXISTS `event2` (
  `Eno` int(11) NOT NULL AUTO_INCREMENT,
  `Ev_name` varchar(100) NOT NULL,
  `Ev_date` date NOT NULL,
  PRIMARY KEY (`Eno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event2`
--

INSERT INTO `event2` (`Eno`, `Ev_name`, `Ev_date`) VALUES
(1, 'Creato', '2023-05-24'),
(2, 'Shardotsav', '2022-10-09'),
(3, 'Ganesh Chaturthy Celebration', '2023-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `mid_marks`
--

DROP TABLE IF EXISTS `mid_marks`;
CREATE TABLE IF NOT EXISTS `mid_marks` (
  `Enroll_no` bigint(15) NOT NULL,
  `Sub_code` int(11) NOT NULL,
  `Sub_name` varchar(50) NOT NULL,
  `obt_marks` int(11) NOT NULL,
  PRIMARY KEY (`Enroll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mid_marks`
--

INSERT INTO `mid_marks` (`Enroll_no`, `Sub_code`, `Sub_name`, `obt_marks`) VALUES
(206040307008, 3330701, 'C Programming', 30),
(206040307108, 3330701, 'C Programming', 29);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `StuRollno` char(12) NOT NULL,
  `StuName` varchar(60) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email_ID` varchar(50) NOT NULL,
  `Contact_no` varchar(50) NOT NULL,
  `Sem` int(1) NOT NULL,
  `Year` int(1) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Branch_ID` varchar(6) NOT NULL,
  PRIMARY KEY (`StuRollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StuRollno`, `StuName`, `Gender`, `Email_ID`, `Contact_no`, `Sem`, `Year`, `Password`, `Branch_ID`) VALUES
('206040307008', 'Valand Vishal', 'M', 'vishalv@gmail.com', '9182638910', 6, 3, 'Vishal2211', 'CE0001'),
('206040307108', 'Rana Krish JayeshKumar', 'M', 'krishrana@gmail.com', '8371029380', 6, 3, 'Krish1122', 'CE0001');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
