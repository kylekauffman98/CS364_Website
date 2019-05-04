-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2011 at 07:31 AM
-- Server version: 5.1.54
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csl`
--

CREATE DATABASE IF NOT EXISTS summer_portal DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE `summer_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `cadet` (
  `studentID` int NOT NULL,
  `studentFN` varchar(50) NOT NULL,
  `studentLN` varchar(50) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `cadet` (`studentID`, `studentFN`, `studentLN`) VALUES
(1275969, 'Kyle', 'Kauffman'),
(1234567, 'Kishan', 'Patel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `programID` int NOT NULL,
  `studentID` int NOT NULL,
  `periodNum` int DEFAULT NULL,
  PRIMARY KEY (`studentID`, `periodNum`, `programID`),
  FOREIGN KEY (`studentID`) REFERENCES `cadet` (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


INSERT INTO `schedule` (`studentID`, `periodNum`, `programID`) VALUES
(1275969, 1, 1),
(1275969, 2, 2),
(1275969, 3, 3),
(1234567, 1, 2),
(1234567, 2, 3),
(1234567, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE IF NOT EXISTS `program` (
  `programID` int NOT NULL,
  `programName` varchar(50) NOT NULL,
  `enrollmentLimit` int NOT NULL,
  PRIMARY KEY (`programID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `program` (`programID`,`programName`,`enrollmentLimit`) VALUES
(1, 'Jump', 300),
(2, 'Soaring', 300),
(3, 'ESET', 1100);