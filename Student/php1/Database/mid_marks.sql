-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 07:10 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `mid_marks`
-- 

CREATE TABLE `mid_marks` (
  `Enroll_no` bigint(15) NOT NULL,
  `Sub_code` int(11) NOT NULL,
  `Sub_name` varchar(50) NOT NULL,
  `obt_marks` int(11) NOT NULL,
  PRIMARY KEY  (`Enroll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `mid_marks`
-- 

INSERT INTO `mid_marks` (`Enroll_no`, `Sub_code`, `Sub_name`, `obt_marks`) VALUES 
(206040307001, 3330701, 'Computer Programming', 30);
