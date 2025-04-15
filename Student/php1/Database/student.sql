-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 05, 2023 at 06:54 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

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
  `Password` varchar(10) NOT NULL,
  `Branch_ID` varchar(6) NOT NULL,
  PRIMARY KEY  (`StuRollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `student`
-- 

