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
-- Database: `summer_portal`
--

CREATE DATABASE IF NOT EXISTS summer_portal DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE `summer_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `cadet`
--

CREATE TABLE IF NOT EXISTS `cadet` (
  `studentID` int NOT NULL,
  `studentFN` varchar(50) NOT NULL,
  `studentLN` varchar(50) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Adding data into cadet
--

INSERT INTO `cadet` (`studentID`, `studentFN`, `studentLN`) VALUES
(7654321, 'Kyle', 'Kauffman'),
(1234567, 'Kishan', 'Patel');

-- --------------------------------------------------------

--
-- Table structure for table `finalSchedule`
--

CREATE TABLE IF NOT EXISTS `finalSchedule` (
  `programID` int NOT NULL,
  `studentID` int NOT NULL,
  `periodNum` int DEFAULT NULL,
  PRIMARY KEY (`studentID`, `periodNum`, `programID`),
  FOREIGN KEY (`studentID`) REFERENCES `cadet` (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `tempSchedule` (
  `period1programID1` int NOT NULL,
  `period1programID2` int NOT NULL,
  `period1programID3` int NOT NULL,
  `period2programID1` int NOT NULL,
  `period2programID2` int NOT NULL,
  `period2programID3` int NOT NULL,
  `period3programID1` int NOT NULL,
  `period3programID2` int NOT NULL,
  `period3programID3` int NOT NULL,
  `studentID` int NOT NULL,
  PRIMARY KEY (`studentID`),
  FOREIGN KEY (`studentID`) REFERENCES `cadet` (`studentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `finalSchedule` (`studentID`, `periodNum`, `programID`) VALUES
(7654321, 1, 1),
(7654321, 2, 2),
(7654321, 3, 3),
(1234567, 1, 2),
(1234567, 2, 3),
(1234567, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `programID` int NOT NULL,
  `programName` varchar(50) NOT NULL,
  `enrollmentLimit` int NOT NULL,
  PRIMARY KEY (`programID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Inserting data for table `program`
--

INSERT INTO `program` (`programID`,`programName`,`enrollmentLimit`) VALUES
(1, 'Jump', 300),
(2, 'Soaring', 300),
(3, 'ESET', 1100);