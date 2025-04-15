-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 04, 2023 at 07:30 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `college_info`
-- 

CREATE TABLE `college_info` (
  `No` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  PRIMARY KEY  (`No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `college_info`
-- 

INSERT INTO `college_info` (`No`, `Name`) VALUES 
(1, 'BBIT Admission Inquiry 2020-2021');
