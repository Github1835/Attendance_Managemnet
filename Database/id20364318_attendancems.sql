-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2023 at 11:09 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20364318_attendancems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` char(8) NOT NULL,
  `AdminName` varchar(60) NOT NULL,
  `Email_ID` varchar(50) DEFAULT NULL,
  `Password` varchar(10) NOT NULL,
  `Contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `AdminName`, `Email_ID`, `Password`, `Contact_no`) VALUES
('ADMIN001', 'Krish Rana', 'krishrana1835@gmail.com', 'Admin1122', '8371029380');

-- --------------------------------------------------------

--
-- Table structure for table `attd1`
--

CREATE TABLE `attd1` (
  `StuRollno` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date and Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attd1`
--

INSERT INTO `attd1` (`StuRollno`, `Status`, `Date and Time`) VALUES
('206040307007', '0', '2023-03-20 00:00:00'),
('206040307008', '0', '2023-03-20 00:00:00'),
('206040307039', '0', '2023-03-20 00:00:00'),
('206040307108', '0', '2023-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Att_ID` char(20) NOT NULL,
  `ADate` date NOT NULL,
  `STime` char(7) NOT NULL,
  `ETime` char(7) NOT NULL,
  `Status` int(1) NOT NULL,
  `Type` varchar(5) NOT NULL,
  `Lect_ID` char(8) NOT NULL,
  `Sub_ID` char(8) NOT NULL,
  `StuRollno` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Att_ID`, `ADate`, `STime`, `ETime`, `Status`, `Type`, `Lect_ID`, `Sub_ID`, `StuRollno`) VALUES
('A0322020433307027003', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307003'),
('A0322020433307027007', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307007'),
('A0322020433307027008', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307008'),
('A0322020433307027009', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307009'),
('A0322020433307027039', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307039'),
('A0322020433307027086', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307086'),
('A0322020433307027097', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307097'),
('A0322020433307027106', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307106'),
('A0322020433307027108', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307108'),
('A0322020433307027109', '2023-03-22', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307109'),
('A0322101133307017007', '2023-03-22', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307007'),
('A0322101133307017008', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307008'),
('A0322101133307017039', '2023-03-22', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307039'),
('A0322101133307017108', '2023-03-22', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307108'),
('A0322101133307017109', '2023-03-22', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307109'),
('A0322101133307027003', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307003'),
('A0322101133307027007', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307007'),
('A0322101133307027008', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307008'),
('A0322101133307027009', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307009'),
('A0322101133307027039', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307039'),
('A0322101133307027086', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307086'),
('A0322101133307027097', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307097'),
('A0322101133307027106', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307106'),
('A0322101133307027108', '2023-03-22', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307108'),
('A0322101133307027109', '2023-03-22', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307109'),
('A0322111233307017007', '2023-03-22', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307007'),
('A0322111233307017008', '2023-03-22', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307008'),
('A0322111233307017039', '2023-03-22', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307039'),
('A0322111233307017108', '2023-03-22', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307108'),
('A0322120133307027003', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307003'),
('A0322120133307027007', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307007'),
('A0322120133307027008', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307008'),
('A0322120133307027009', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307009'),
('A0322120133307027039', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307039'),
('A0322120133307027086', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307086'),
('A0322120133307027097', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307097'),
('A0322120133307027106', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307106'),
('A0322120133307027108', '2023-03-22', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307108'),
('A0322120133307027109', '2023-03-22', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307109'),
('A0323101133307027003', '2023-03-23', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307003'),
('A0323101133307027007', '2023-03-23', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307007'),
('A0323101133307027008', '2023-03-23', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307008'),
('A0323101133307027009', '2023-03-23', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307009'),
('A0323101133307027039', '2023-03-23', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307039'),
('A0323101133307027086', '2023-03-23', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307086'),
('A0323101133307027097', '2023-03-23', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307097'),
('A0323101133307027106', '2023-03-23', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307106'),
('A0323101133307027108', '2023-03-23', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307108'),
('A0323101133307027109', '2023-03-23', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330702', '206040307109'),
('A0324101133307017003', '2023-03-24', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307003'),
('A0324101133307017007', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307007'),
('A0324101133307017008', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307008'),
('A0324101133307017009', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307009'),
('A0324101133307017039', '2023-03-24', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307039'),
('A0324101133307017086', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307086'),
('A0324101133307017097', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307097'),
('A0324101133307017106', '2023-03-24', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307106'),
('A0324101133307017108', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307108'),
('A0324101133307017109', '2023-03-24', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307109'),
('A0324111233307017003', '2023-03-24', '11:30', '12:30', 0, 'Lect', 'CE001234', '3330701', '206040307003'),
('A0324111233307017007', '2023-03-24', '11:30', '12:30', 1, 'Lect', 'CE001234', '3330701', '206040307007'),
('A0324111233307017008', '2023-03-24', '11:30', '12:30', 1, 'Lect', 'CE001234', '3330701', '206040307008'),
('A0324111233307017009', '2023-03-24', '11:30', '12:30', 1, 'Lect', 'CE001234', '3330701', '206040307009'),
('A0324111233307017039', '2023-03-24', '11:30', '12:30', 0, 'Lect', 'CE001234', '3330701', '206040307039'),
('A0324111233307017086', '2023-03-24', '11:30', '12:30', 1, 'Lect', 'CE001234', '3330701', '206040307086'),
('A0324111233307017097', '2023-03-24', '11:30', '12:30', 1, 'Lect', 'CE001234', '3330701', '206040307097'),
('A0324111233307017106', '2023-03-24', '11:30', '12:30', 0, 'Lect', 'CE001234', '3330701', '206040307106'),
('A0324111233307017108', '2023-03-24', '11:30', '12:30', 1, 'Lect', 'CE001234', '3330701', '206040307108'),
('A0324111233307017109', '2023-03-24', '11:30', '12:30', 0, 'Lect', 'CE001234', '3330701', '206040307109'),
('A0325020433307027003', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307003'),
('A0325020433307027007', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307007'),
('A0325020433307027008', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307008'),
('A0325020433307027009', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307009'),
('A0325020433307027039', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307039'),
('A0325020433307027086', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307086'),
('A0325020433307027097', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307097'),
('A0325020433307027106', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307106'),
('A0325020433307027108', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307108'),
('A0325020433307027109', '2023-03-25', '02:00', '04:00', 1, 'Lab', 'CE001234', '3330702', '206040307109'),
('A0325040633307017003', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307003'),
('A0325040633307017007', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307007'),
('A0325040633307017008', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307008'),
('A0325040633307017009', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307009'),
('A0325040633307017039', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307039'),
('A0325040633307017086', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307086'),
('A0325040633307017097', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307097'),
('A0325040633307017106', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307106'),
('A0325040633307017108', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307108'),
('A0325040633307017109', '2023-03-25', '04:00', '06:00', 1, 'Lab', 'CE001234', '3330701', '206040307109'),
('A0325101133307017003', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307003'),
('A0325101133307017007', '2023-03-25', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307007'),
('A0325101133307017008', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307008'),
('A0325101133307017009', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307009'),
('A0325101133307017039', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307039'),
('A0325101133307017086', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307086'),
('A0325101133307017097', '2023-03-25', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307097'),
('A0325101133307017106', '2023-03-25', '10:30', '11:30', 0, 'Lect', 'CE001234', '3330701', '206040307106'),
('A0325101133307017108', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307108'),
('A0325101133307017109', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330701', '206040307109'),
('A0325101133307027003', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307003'),
('A0325101133307027007', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307007'),
('A0325101133307027008', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307008'),
('A0325101133307027009', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307009'),
('A0325101133307027039', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307039'),
('A0325101133307027086', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307086'),
('A0325101133307027097', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307097'),
('A0325101133307027106', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307106'),
('A0325101133307027108', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307108'),
('A0325101133307027109', '2023-03-25', '10:30', '11:30', 1, 'Lect', 'CE001234', '3330702', '206040307109'),
('A0325111233307017003', '2023-03-25', '11:30', '12:30', 1, 'Lab', 'CE001234', '3330701', '206040307003'),
('A0325111233307017007', '2023-03-25', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307007'),
('A0325111233307017008', '2023-03-25', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307008'),
('A0325111233307017009', '2023-03-25', '11:30', '12:30', 1, 'Lab', 'CE001234', '3330701', '206040307009'),
('A0325111233307017039', '2023-03-25', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307039'),
('A0325111233307017086', '2023-03-25', '11:30', '12:30', 1, 'Lab', 'CE001234', '3330701', '206040307086'),
('A0325111233307017097', '2023-03-25', '11:30', '12:30', 1, 'Lab', 'CE001234', '3330701', '206040307097'),
('A0325111233307017106', '2023-03-25', '11:30', '12:30', 0, 'Lab', 'CE001234', '3330701', '206040307106'),
('A0325111233307017108', '2023-03-25', '11:30', '12:30', 1, 'Lab', 'CE001234', '3330701', '206040307108'),
('A0325111233307017109', '2023-03-25', '11:30', '12:30', 1, 'Lab', 'CE001234', '3330701', '206040307109'),
('A0325120133307027003', '2023-03-25', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307003'),
('A0325120133307027007', '2023-03-25', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307007'),
('A0325120133307027008', '2023-03-25', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307008'),
('A0325120133307027009', '2023-03-25', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307009'),
('A0325120133307027039', '2023-03-25', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307039'),
('A0325120133307027086', '2023-03-25', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307086'),
('A0325120133307027097', '2023-03-25', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307097'),
('A0325120133307027106', '2023-03-25', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307106'),
('A0325120133307027108', '2023-03-25', '12:30', '01:30', 0, 'Lect', 'CE001234', '3330702', '206040307108'),
('A0325120133307027109', '2023-03-25', '12:30', '01:30', 1, 'Lect', 'CE001234', '3330702', '206040307109');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_ID` char(8) NOT NULL,
  `BranchName` varchar(30) NOT NULL,
  `Lect_ID` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_ID`, `BranchName`, `Lect_ID`) VALUES
('CE001122', 'Computer', 'CE001234'),
('CE007788', 'Mechenical', 'CE002233'),
('EC001122', 'Electical Communication', 'CE001234');

-- --------------------------------------------------------

--
-- Table structure for table `event1`
--

CREATE TABLE `event1` (
  `No` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Path` varchar(200) NOT NULL DEFAULT '#'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event1`
--

INSERT INTO `event1` (`No`, `Name`, `Path`) VALUES
(2, 'Result of written test held on 21-May-2023 for the post of lecturer - Civil Engineering - SFI', '#'),
(3, 'Result of written test held on 21-May-2022 for the post of lecturer - Physics - SFI', '#'),
(4, 'Advertisement for recruitment April-2022', '#'),
(5, 'Application form for recruitment April-2022', '#'),
(7, 'Fee Circular for semester 4 SFI students', '#'),
(8, 'Fee Circular for semester 4 GIA students', '#'),
(10, 'AICTE & ISTE Approved STTP on Energy Conservation and Energy Management', '#'),
(12, 'facebook', 'facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `event2`
--

CREATE TABLE `event2` (
  `Eno` int(11) NOT NULL,
  `Ev_name` varchar(100) NOT NULL,
  `Ev_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event2`
--

INSERT INTO `event2` (`Eno`, `Ev_name`, `Ev_date`) VALUES
(1, 'Creato', '2023-05-23'),
(2, 'Shardotsav', '2022-10-09'),
(3, 'Ganesh Chaturthy Celebration', '2023-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `Lect_ID` char(8) NOT NULL,
  `LectName` varchar(60) NOT NULL,
  `Email_ID` varchar(50) DEFAULT NULL,
  `Password` varchar(10) NOT NULL,
  `Contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`Lect_ID`, `LectName`, `Email_ID`, `Password`, `Contact_no`) VALUES
('CE001234', 'Rana Krish', 'krishrana1835@gmail.com', 'Lect1122', '8371029380'),
('CE002233', 'Vishal Valand', 'vishal@gmail.com', 'vishal', '5487965432');

-- --------------------------------------------------------

--
-- Table structure for table `lect_sub`
--

CREATE TABLE `lect_sub` (
  `Sub_ID` char(8) NOT NULL,
  `Lect_ID` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lect_sub`
--

INSERT INTO `lect_sub` (`Sub_ID`, `Lect_ID`) VALUES
('3330701', 'CE001234'),
('3330702', 'CE001234'),
('3330703', 'CE002233');

-- --------------------------------------------------------

--
-- Table structure for table `mid_marks`
--

CREATE TABLE `mid_marks` (
  `StuRollno` char(12) NOT NULL,
  `Sub_ID` char(8) NOT NULL,
  `SubName` varchar(50) NOT NULL,
  `obt_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mid_marks`
--

INSERT INTO `mid_marks` (`StuRollno`, `Sub_ID`, `SubName`, `obt_marks`) VALUES
('206040307008', '3330701', 'C Programming', 22),
('206040307108', '3330701', 'C Programming', 26),
('206040307039', '3330701', 'C Programming', 25),
('206040307007', '3330701', 'C Programming', 22),
('206040307007', '3330702', 'Advanced Java Programming', 12),
('206040307008', '3330702', 'Advanced Java Programming', 0),
('206040307039', '3330702', 'Advanced Java Programming', 0),
('206040307108', '3330702', 'Advanced Java Programming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StuRollno` char(12) NOT NULL,
  `StuName` varchar(60) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email_ID` varchar(50) NOT NULL,
  `Contact_no` varchar(50) NOT NULL,
  `Sem` int(1) NOT NULL,
  `Year` int(1) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Branch_ID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StuRollno`, `StuName`, `Gender`, `Email_ID`, `Contact_no`, `Sem`, `Year`, `Password`, `Branch_ID`) VALUES
('206040307003', 'Rishi', 'F', 'rishi@gmail.com', '2564781635', 6, 3, '', 'CE001122'),
('206040307007', 'Rohit Virendra Vitthalbhai', 'M', 'rohitvirendra2005@gmail.com', '9182638910', 6, 3, NULL, 'CE001122'),
('206040307008', 'Valand Vishal', 'M', 'vishalvaland101@gmail.com', '9182638910', 6, 3, 'vishal', 'CE001122'),
('206040307009', 'Kewal', 'M', 'kewal@gmail.com', '2564865475', 6, 3, NULL, 'CE001122'),
('206040307039', 'Rohan Rohit', 'M', 'krishrana1835@gmail.com', '2564781635', 6, 3, NULL, 'CE001122'),
('206040307086', 'Parv', 'M', 'parv@gmail.com', '4587965213', 6, 3, NULL, 'CE001122'),
('206040307097', 'Dharmi', 'F', 'dharmi@gmail.com', '8974563548', 6, 3, NULL, 'CE001122'),
('206040307106', 'Fiza', 'F', 'fizza@gmail.com', '5978462136', 6, 3, NULL, 'CE001122'),
('206040307108', 'Rana Krish JayeshKumar', 'M', 'krishrana1835@gmail.com', '8371029380', 6, 3, 'Krish1122', 'CE001122'),
('206040307109', 'Vaidushi', 'F', 'vaidu@gmail.com', '7845968512', 6, 3, NULL, 'CE001122');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Sub_ID` char(8) NOT NULL,
  `SubName` varchar(50) NOT NULL,
  `Sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Sub_ID`, `SubName`, `Sem`) VALUES
('3330701', 'C Programming', 6),
('3330702', 'Advanced Java Programming', 6),
('3330703', 'Advanced Maths', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_br`
--

CREATE TABLE `sub_br` (
  `Sub_ID` char(8) NOT NULL,
  `Branch_ID` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_br`
--

INSERT INTO `sub_br` (`Sub_ID`, `Branch_ID`) VALUES
('3330701', 'CE001122'),
('3330702', 'CE001122'),
('3330703', 'CE007788');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `attd1`
--
ALTER TABLE `attd1`
  ADD PRIMARY KEY (`StuRollno`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Att_ID`),
  ADD KEY `StuRollno` (`StuRollno`),
  ADD KEY `Lect_ID` (`Lect_ID`,`Sub_ID`),
  ADD KEY `Sub_ID` (`Sub_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_ID`),
  ADD KEY `Lect_ID` (`Lect_ID`);

--
-- Indexes for table `event1`
--
ALTER TABLE `event1`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `event2`
--
ALTER TABLE `event2`
  ADD PRIMARY KEY (`Eno`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`Lect_ID`);

--
-- Indexes for table `lect_sub`
--
ALTER TABLE `lect_sub`
  ADD PRIMARY KEY (`Sub_ID`),
  ADD KEY `Sub_ID` (`Sub_ID`,`Lect_ID`),
  ADD KEY `lectid` (`Lect_ID`);

--
-- Indexes for table `mid_marks`
--
ALTER TABLE `mid_marks`
  ADD KEY `Sub_ID` (`Sub_ID`),
  ADD KEY `StuRollno` (`StuRollno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StuRollno`),
  ADD KEY `Branch_ID` (`Branch_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Sub_ID`);

--
-- Indexes for table `sub_br`
--
ALTER TABLE `sub_br`
  ADD PRIMARY KEY (`Sub_ID`),
  ADD KEY `brid` (`Branch_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event2`
--
ALTER TABLE `event2`
  MODIFY `Eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Lect_ID` FOREIGN KEY (`Lect_ID`) REFERENCES `lecturer` (`Lect_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `StuRollno` FOREIGN KEY (`StuRollno`) REFERENCES `student` (`StuRollno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sub_ID` FOREIGN KEY (`Sub_ID`) REFERENCES `subject` (`Sub_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `Lecturer_ID` FOREIGN KEY (`Lect_ID`) REFERENCES `lecturer` (`Lect_ID`);

--
-- Constraints for table `lect_sub`
--
ALTER TABLE `lect_sub`
  ADD CONSTRAINT `lectid` FOREIGN KEY (`Lect_ID`) REFERENCES `lecturer` (`Lect_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `subid` FOREIGN KEY (`Sub_ID`) REFERENCES `subject` (`Sub_ID`) ON DELETE CASCADE;

--
-- Constraints for table `mid_marks`
--
ALTER TABLE `mid_marks`
  ADD CONSTRAINT `stuno` FOREIGN KEY (`StuRollno`) REFERENCES `student` (`StuRollno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjectID` FOREIGN KEY (`Sub_ID`) REFERENCES `subject` (`Sub_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Branch_ID` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`);

--
-- Constraints for table `sub_br`
--
ALTER TABLE `sub_br`
  ADD CONSTRAINT `brid` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ssubid` FOREIGN KEY (`Sub_ID`) REFERENCES `subject` (`Sub_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
