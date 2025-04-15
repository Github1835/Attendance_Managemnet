-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 04, 2023 at 07:31 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `event1`
-- 

CREATE TABLE `event1` (
  `Eno` int(11) NOT NULL auto_increment,
  `Ev_name` varchar(20) NOT NULL,
  `Ev_date` date NOT NULL,
  PRIMARY KEY  (`Eno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `event1`
-- 

INSERT INTO `event1` (`Eno`, `Ev_name`, `Ev_date`) VALUES 
(1, 'Creato', '2023-05-24');
