-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 02:09 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oes`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Category`, `DateAdded`, `IsDeleted`) VALUES
(2, 'Personality', '2018-09-08 17:28:21', 1),
(3, 'sadfxzv', '2018-09-08 17:28:57', 1),
(4, 'xcvxzcvxzvczx', '2018-09-08 17:47:30', 1),
(5, 'mnbmnbmb', '2018-09-08 17:48:47', 1),
(6, 'mnbmnbmb', '2018-09-08 17:48:48', 1),
(7, 'rtytryrt', '2018-09-08 17:48:59', 1),
(8, 'Behaviour', '2018-09-08 20:54:58', 1),
(9, 'Loyalty', '2018-09-09 01:47:24', 1),
(10, 'cvvcvcxzc', '2018-09-09 01:47:24', 1),
(11, 'Job Responsibility', '2018-09-20 11:55:47', 0),
(12, 'Self - Management', '2018-09-20 11:56:09', 0),
(13, 'Working Relationship', '2018-09-20 11:56:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dailyschedule`
--

CREATE TABLE `dailyschedule` (
  `DailyScheduleID` int(11) NOT NULL,
  `DayID` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `ScheduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyschedule`
--

INSERT INTO `dailyschedule` (`DailyScheduleID`, `DayID`, `StartTime`, `EndTime`, `ScheduleID`) VALUES
(7, 1, '07:05:00', '12:05:00', 14),
(8, 2, '07:05:00', '12:05:00', 14),
(9, 3, '07:05:00', '12:05:00', 14),
(10, 4, '07:05:00', '12:05:00', 14),
(11, 5, '13:05:00', '18:45:00', 14),
(12, 6, '07:05:00', '12:05:00', 14),
(13, 1, '07:05:00', '12:05:00', 1),
(14, 2, '07:05:00', '12:05:00', 1),
(15, 3, '07:05:00', '12:05:00', 1),
(16, 4, '07:05:00', '12:05:00', 1),
(17, 5, '07:05:00', '12:05:00', 1),
(18, 6, '07:05:00', '12:05:00', 1),
(19, 1, '14:30:00', '14:30:00', 15),
(20, 2, '14:30:00', '14:30:00', 15),
(21, 3, '14:30:00', '14:30:00', 15),
(22, 4, '14:30:00', '14:30:00', 15),
(23, 5, '14:30:00', '14:30:00', 15),
(24, 6, '14:30:00', '14:30:00', 15),
(25, 1, '13:05:00', '18:05:00', 16),
(26, 2, '13:05:00', '20:05:00', 16),
(27, 3, '14:14:00', '14:14:00', 16),
(28, 1, '01:00:00', '01:00:00', 18),
(29, 2, '01:00:00', '01:00:00', 18),
(30, 3, '01:00:00', '01:00:00', 18),
(31, 1, '07:05:00', '07:05:00', 26),
(32, 2, '07:05:00', '07:05:00', 26),
(33, 3, '07:05:00', '07:05:00', 26),
(34, 4, '07:05:00', '07:05:00', 26),
(35, 5, '07:05:00', '07:05:00', 26),
(36, 6, '07:05:00', '07:05:00', 26),
(37, 1, '07:05:00', '07:05:00', 27),
(38, 2, '07:05:00', '07:05:00', 27),
(39, 3, '07:05:00', '07:05:00', 27),
(40, 4, '07:05:00', '07:05:00', 27),
(41, 5, '07:05:00', '07:05:00', 27),
(42, 6, '07:05:00', '07:05:00', 27),
(43, 1, '07:05:00', '07:05:00', 28),
(44, 2, '07:05:00', '07:05:00', 28),
(45, 3, '07:05:00', '07:05:00', 28),
(46, 4, '07:05:00', '07:05:00', 28),
(47, 5, '07:05:00', '07:05:00', 28),
(48, 6, '07:05:00', '07:05:00', 28),
(49, 1, '18:45:00', '13:05:00', 29),
(50, 2, '18:45:00', '13:05:00', 29),
(51, 3, '18:45:00', '13:05:00', 29),
(52, 4, '18:45:00', '13:05:00', 29),
(53, 5, '18:45:00', '13:05:00', 29),
(54, 6, '18:45:00', '13:05:00', 29),
(55, 1, '18:45:00', '13:05:00', 30),
(56, 2, '18:45:00', '13:05:00', 30),
(57, 3, '18:45:00', '13:05:00', 30),
(58, 4, '18:45:00', '13:05:00', 30),
(59, 5, '18:45:00', '13:05:00', 30),
(60, 6, '18:45:00', '13:05:00', 30),
(61, 1, '18:45:00', '13:05:00', 31),
(62, 2, '18:45:00', '13:05:00', 31),
(63, 3, '18:45:00', '13:05:00', 31),
(64, 4, '18:45:00', '13:05:00', 31),
(65, 5, '18:45:00', '13:05:00', 31),
(66, 6, '18:45:00', '13:05:00', 31),
(67, 1, '00:05:00', '07:05:00', 32),
(68, 2, '00:05:00', '07:05:00', 32),
(69, 3, '00:05:00', '07:05:00', 32),
(70, 4, '00:05:00', '07:05:00', 32),
(71, 5, '00:05:00', '07:05:00', 32),
(72, 6, '00:05:00', '07:05:00', 32),
(73, 1, '13:05:00', '18:45:00', 33),
(74, 2, '13:05:00', '18:45:00', 33),
(75, 3, '13:05:00', '18:45:00', 33),
(76, 4, '13:05:00', '18:45:00', 33),
(77, 5, '13:05:00', '18:45:00', 33),
(78, 6, '13:05:00', '18:45:00', 33),
(79, 1, '13:05:00', '18:45:00', 34),
(80, 2, '13:05:00', '18:45:00', 34),
(81, 3, '13:05:00', '18:45:00', 34),
(82, 4, '13:05:00', '18:45:00', 34),
(83, 5, '13:05:00', '18:45:00', 34),
(84, 6, '13:05:00', '18:45:00', 34),
(85, 1, '07:05:00', '00:05:00', 35),
(86, 2, '07:05:00', '00:05:00', 35),
(87, 3, '07:05:00', '00:05:00', 35),
(88, 4, '07:05:00', '00:05:00', 35),
(89, 5, '07:05:00', '00:05:00', 35),
(90, 6, '07:05:00', '00:05:00', 35),
(91, 1, '07:05:00', '00:05:00', 36),
(92, 2, '07:05:00', '00:05:00', 36),
(93, 3, '07:05:00', '00:05:00', 36),
(94, 4, '07:05:00', '00:05:00', 36),
(95, 5, '07:05:00', '00:05:00', 36),
(96, 6, '07:05:00', '00:05:00', 36);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `DayID` int(11) NOT NULL,
  `Day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`DayID`, `Day`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `LocationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`, `IsDeleted`, `LocationID`) VALUES
(28, 'Admin', 0, 1),
(31, 'SWS', 0, 1),
(32, 'CCS', 0, 1),
(33, 'CASP', 0, 1),
(34, 'Atheneaum', 0, 1),
(35, 'Maintainance', 0, 1),
(36, 'Atheneaum ISD', 0, 2),
(37, 'Multimedia', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departmenthead`
--

CREATE TABLE `departmenthead` (
  `DepartmentHeadID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmenthead`
--

INSERT INTO `departmenthead` (`DepartmentHeadID`, `UserID`, `DepartmentID`, `DateAdded`) VALUES
(10, 327, 34, '2018-09-06 15:01:36'),
(24, 332, 37, '2018-09-12 10:29:08'),
(25, 333, 36, '2018-09-20 08:11:21'),
(28, 335, 31, '2018-09-26 01:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `DTRID` int(11) NOT NULL,
  `Schoolyear` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `Month` varchar(50) NOT NULL,
  `Date` datetime NOT NULL,
  `NasBiometricID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvaluationID` int(11) NOT NULL,
  `Schoolyear` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `StartingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateEnded` date DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '0',
  `IsDeleted` tinyint(1) DEFAULT '0',
  `HasEnded` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`EvaluationID`, `Schoolyear`, `Semester`, `StartingDate`, `DateEnded`, `IsActive`, `IsDeleted`, `HasEnded`) VALUES
(2, '2018-2019', 'First Semester', '2018-09-11 16:00:00', '2018-09-12', 0, 1, 1),
(3, '2017-2018', 'First Semester', '2018-09-11 16:00:00', '2018-09-12', 0, 1, 1),
(4, '2017-2018', 'Second Semester', '2018-09-11 16:00:00', '2018-09-12', 0, 1, 1),
(5, '2018-2019', 'First Semester', '2018-09-12 16:00:00', '2018-09-12', 0, 0, 1),
(6, '2019-2020', 'First Semester', '2018-09-19 16:00:00', '2018-09-12', 0, 1, 1),
(7, '2018-2019', 'Second Semester', '2018-09-19 16:00:00', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluationresults`
--

CREATE TABLE `evaluationresults` (
  `EvaluationResultID` int(11) NOT NULL,
  `Mean` varchar(50) NOT NULL,
  `UserID` int(11) NOT NULL,
  `NasID` int(11) NOT NULL,
  `EvaluationID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluationresults`
--

INSERT INTO `evaluationresults` (`EvaluationResultID`, `Mean`, `UserID`, `NasID`, `EvaluationID`, `Date`) VALUES
(32, '3.0', 335, 32, 7, '2018-09-24 01:29:46'),
(33, '3.0', 335, 224, 7, '2018-09-24 02:00:34'),
(34, '4.6', 324, 32, 7, '2018-09-24 02:29:36'),
(35, '3.6', 324, 224, 7, '2018-09-24 05:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocationID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocationID`, `Name`) VALUES
(1, 'Cyber Tower'),
(2, 'Bulacao Campus');

-- --------------------------------------------------------

--
-- Table structure for table `nas`
--

CREATE TABLE `nas` (
  `NasID` int(11) NOT NULL,
  `IDNumber` varchar(50) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Birthdate` date NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `IsDeleted` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nas`
--

INSERT INTO `nas` (`NasID`, `IDNumber`, `Firstname`, `Middlename`, `Lastname`, `Email`, `Address`, `Birthdate`, `ContactNumber`, `DepartmentID`, `IsDeleted`) VALUES
(32, '15-2000810', 'Raymundo', 'Remiticado', 'Alfeche', 'alfeche492@gmail.com', 'Naga City', '1999-02-11', '09058456538', 31, 0),
(38, '15-2000921', 'Rica', 'dsafasf', 'Vargas', 'rica@gmail.com', 'Basak Pardo', '2018-08-23', '342342', 32, 0),
(39, '15-2000910', 'Krischan', 'Asd', 'Solon', 'solon@gmail.com', 'Carcar City', '1995-08-25', '09432423423434', 33, 0),
(218, '15-2000922', 'Jaime', 'Adsfas', 'Dionson', 'jaime@gmail.com', 'United States', '2018-08-30', '9122334343', 34, 0),
(219, '15-2000923', 'Ella', 'Adsfas', 'Taglucpoc', 'Ella@gmail.com', 'United States', '2018-08-30', '9122334343', 36, 0),
(220, '15-2000924', 'Mea', 'Adsfas', 'Delute', 'Daemea@gmail.com', 'United States', '2018-08-30', '9122334343', 36, 1),
(221, '15-2000925', 'Millche', 'Adsfas', 'Asdfk', 'Millche@gmail.com', 'United States', '2018-08-30', '9122334343', 37, 0),
(222, '15-2000926', 'Justin', 'Adsfas', 'Bieber', 'qwerqwe2234rqw@gmail.com', 'United States', '2018-08-30', '9122334343', 31, 1),
(223, '15-2000927', 'Justin', 'Adsfas', 'Bieber', 'qwerq55werqw@gmail.com', 'United States', '2018-08-30', '9122334343', 35, 1),
(224, '32432423', 'Team', 'Bdasfsdafsa', 'Liquid', 'sadfsa@gmail.com', 'sadfasdfsdafasd', '2018-12-06', '909090909', 31, 0),
(237, '15-2000928', 'Asdfdsa', 'xcvzxcvz', 'Rdsafasdf', 'ewrqwrw@gmail.com', 'Cebu', '0000-00-00', '90909090', 31, 1),
(238, '121212121', 'Bryan', 'John', 'Logdonio', 'brayn@gmail.com', 'xzvcvcvcxvczxvvcxz sdaf asfd asf asdfsdaf', '1999-03-05', '093432443242', 32, 0),
(239, '15-2000100', 'John', 'Alfeche', 'Loyd', 'newone@gmail.com', 'Manila', '1994-09-21', '09243223223', 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nasbiometric`
--

CREATE TABLE `nasbiometric` (
  `NasBiometricID` int(11) NOT NULL,
  `NasID` int(11) NOT NULL,
  `BiometricID` int(11) NOT NULL,
  `IsCurrent` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nasevaluation`
--

CREATE TABLE `nasevaluation` (
  `NasEvaluationID` int(11) NOT NULL,
  `NasID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `EvaluationID` int(11) NOT NULL,
  `Rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasevaluation`
--

INSERT INTO `nasevaluation` (`NasEvaluationID`, `NasID`, `UserID`, `QuestionID`, `EvaluationID`, `Rating`) VALUES
(217, 32, 335, 34, 7, '3'),
(218, 32, 335, 33, 7, '3'),
(219, 32, 335, 35, 7, '3'),
(220, 32, 335, 36, 7, '3'),
(221, 32, 335, 38, 7, '3'),
(222, 32, 335, 37, 7, '3'),
(223, 32, 335, 39, 7, '3'),
(224, 32, 335, 40, 7, '3'),
(225, 32, 335, 41, 7, '3'),
(226, 32, 335, 42, 7, '3'),
(227, 32, 335, 43, 7, '3'),
(228, 32, 335, 44, 7, '3'),
(229, 32, 335, 45, 7, '3'),
(230, 32, 335, 46, 7, '3'),
(231, 32, 335, 47, 7, '3'),
(232, 32, 335, 48, 7, '3'),
(233, 32, 335, 49, 7, '3'),
(234, 32, 335, 50, 7, '3'),
(235, 32, 335, 51, 7, '3'),
(236, 32, 335, 52, 7, '3'),
(237, 32, 335, 53, 7, '3'),
(238, 32, 335, 54, 7, '3'),
(239, 32, 335, 55, 7, '3'),
(240, 32, 335, 56, 7, '3'),
(241, 32, 335, 57, 7, '3'),
(242, 32, 335, 58, 7, '3'),
(243, 224, 335, 33, 7, '3'),
(244, 224, 335, 36, 7, '3'),
(245, 224, 335, 34, 7, '3'),
(246, 224, 335, 35, 7, '3'),
(247, 224, 335, 37, 7, '3'),
(248, 224, 335, 38, 7, '3'),
(249, 224, 335, 39, 7, '3'),
(250, 224, 335, 40, 7, '3'),
(251, 224, 335, 41, 7, '3'),
(252, 224, 335, 42, 7, '3'),
(253, 224, 335, 43, 7, '3'),
(254, 224, 335, 44, 7, '3'),
(255, 224, 335, 45, 7, '3'),
(256, 224, 335, 46, 7, '3'),
(257, 224, 335, 47, 7, '3'),
(258, 224, 335, 48, 7, '3'),
(259, 224, 335, 49, 7, '3'),
(260, 224, 335, 50, 7, '3'),
(261, 224, 335, 51, 7, '3'),
(262, 224, 335, 52, 7, '3'),
(263, 224, 335, 53, 7, '3'),
(264, 224, 335, 54, 7, '3'),
(265, 224, 335, 55, 7, '3'),
(266, 224, 335, 56, 7, '3'),
(267, 224, 335, 57, 7, '3'),
(268, 224, 335, 58, 7, '3'),
(269, 32, 324, 33, 7, '4.5'),
(270, 32, 324, 35, 7, '4.5'),
(271, 32, 324, 37, 7, '4.5'),
(272, 32, 324, 36, 7, '4.5'),
(273, 32, 324, 34, 7, '4.5'),
(274, 32, 324, 38, 7, '4.5'),
(275, 32, 324, 39, 7, '4.5'),
(276, 32, 324, 40, 7, '4.5'),
(277, 32, 324, 41, 7, '4.5'),
(278, 32, 324, 42, 7, '4.5'),
(279, 32, 324, 43, 7, '4.5'),
(280, 32, 324, 44, 7, '4.8'),
(281, 32, 324, 45, 7, '4.8'),
(282, 32, 324, 46, 7, '4.8'),
(283, 32, 324, 47, 7, '4.8'),
(284, 32, 324, 48, 7, '4.8'),
(285, 32, 324, 49, 7, '4.8'),
(286, 32, 324, 50, 7, '4.8'),
(287, 32, 324, 51, 7, '4.5'),
(288, 32, 324, 52, 7, '4.5'),
(289, 32, 324, 53, 7, '4.5'),
(290, 32, 324, 54, 7, '4.5'),
(291, 32, 324, 55, 7, '4.5'),
(292, 32, 324, 56, 7, '4.5'),
(293, 32, 324, 57, 7, '4.5'),
(294, 32, 324, 58, 7, '4.5'),
(295, 224, 324, 34, 7, '3.9'),
(296, 224, 324, 33, 7, '3.4'),
(297, 224, 324, 35, 7, '3.7'),
(298, 224, 324, 36, 7, '4.9'),
(299, 224, 324, 37, 7, '2'),
(300, 224, 324, 38, 7, '3'),
(301, 224, 324, 39, 7, '3'),
(302, 224, 324, 40, 7, '3'),
(303, 224, 324, 41, 7, '3'),
(304, 224, 324, 42, 7, '3'),
(305, 224, 324, 43, 7, '3'),
(306, 224, 324, 44, 7, '4.1'),
(307, 224, 324, 45, 7, '5'),
(308, 224, 324, 46, 7, '3.6'),
(309, 224, 324, 47, 7, '4.4'),
(310, 224, 324, 48, 7, '5'),
(311, 224, 324, 49, 7, '5'),
(312, 224, 324, 50, 7, '3.4'),
(313, 224, 324, 51, 7, '3.6'),
(314, 224, 324, 52, 7, '4.2'),
(315, 224, 324, 53, 7, '4.1'),
(316, 224, 324, 54, 7, '4'),
(317, 224, 324, 55, 7, '3.2'),
(318, 224, 324, 56, 7, '3'),
(319, 224, 324, 57, 7, '3'),
(320, 224, 324, 58, 7, '3');

-- --------------------------------------------------------

--
-- Table structure for table `nasgrades`
--

CREATE TABLE `nasgrades` (
  `NasGradesID` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Grade` varchar(50) NOT NULL,
  `Schoolyear` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `NasID` int(11) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasgrades`
--

INSERT INTO `nasgrades` (`NasGradesID`, `Subject`, `Grade`, `Schoolyear`, `Semester`, `NasID`, `IsDeleted`, `DateCreated`) VALUES
(18, 'QESDF', '1.7', '2018-2019', 'First Semester', 32, 1, '2018-09-19 21:42:20'),
(19, 'SCXV', '2.5', '2018-2019', 'First Semester', 32, 1, '2018-09-19 21:42:20'),
(20, 'QESDF', '2.3', '2019-2020', 'First Semester', 32, 1, '2018-09-19 22:02:00'),
(21, 'SCXV', '2.5', '2019-2020', 'First Semester', 32, 1, '2018-09-19 22:02:00'),
(22, 'QESDF', '2.3', '2018-2019', 'First Semester', 32, 0, '2018-09-19 22:45:05'),
(23, 'SCXV', '2.5', '2018-2019', 'First Semester', 32, 0, '2018-09-19 22:45:06'),
(24, 'QESDF', '2.3', '2017-2018', 'First Semester', 32, 1, '2018-09-19 22:45:59'),
(25, 'SCXV', '2.5', '2017-2018', 'First Semester', 32, 1, '2018-09-19 22:45:59'),
(26, 'QESDF', '2.3', '2017-2018', 'First Semester', 32, 1, '2018-09-19 22:46:25'),
(27, 'SCXV', '2.5', '2017-2018', 'First Semester', 32, 1, '2018-09-19 22:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `nasschedule`
--

CREATE TABLE `nasschedule` (
  `NasScheduleID` int(11) NOT NULL,
  `NasID` int(11) NOT NULL,
  `ScheduleID` int(11) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsCurrent` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasschedule`
--

INSERT INTO `nasschedule` (`NasScheduleID`, `NasID`, `ScheduleID`, `Created_at`, `IsCurrent`) VALUES
(1, 32, 4, '2018-08-17 14:03:01', 0),
(2, 32, 4, '2018-08-17 14:08:06', 0),
(4, 38, 3, '2018-08-22 23:46:19', 0),
(5, 218, 1, '2018-08-29 17:45:18', 0),
(6, 219, 1, '2018-08-29 17:45:32', 0),
(7, 220, 1, '2018-08-29 17:46:14', 0),
(8, 221, 1, '2018-08-29 17:46:31', 0),
(9, 218, 4, '2018-08-29 17:53:08', 0),
(10, 32, 14, '2018-08-30 14:11:40', 0),
(11, 32, 14, '2018-08-30 14:17:00', 0),
(12, 32, 14, '2018-08-30 14:17:24', 0),
(13, 32, 14, '2018-08-30 14:17:30', 0),
(14, 32, 14, '2018-08-30 14:18:26', 0),
(15, 219, 14, '2018-08-30 14:19:28', 0),
(16, 39, 14, '2018-09-06 07:33:57', 1),
(17, 38, 14, '2018-09-06 07:34:14', 1),
(18, 218, 14, '2018-09-06 07:35:05', 1),
(19, 219, 14, '2018-09-06 07:35:20', 1),
(20, 220, 14, '2018-09-06 07:35:37', 1),
(21, 221, 14, '2018-09-06 07:35:56', 1),
(22, 222, 14, '2018-09-06 07:36:56', 1),
(23, 32, 16, '2018-09-07 06:15:01', 0),
(24, 224, 17, '2018-09-13 10:06:09', 0),
(25, 32, 16, '2018-09-13 15:12:06', 0),
(26, 32, 17, '2018-09-13 15:12:44', 0),
(27, 224, 20, '2018-09-19 12:47:21', 0),
(28, 224, 20, '2018-09-19 12:49:36', 0),
(29, 224, 19, '2018-09-19 12:51:34', 0),
(30, 224, 20, '2018-09-19 12:53:09', 0),
(31, 32, 14, '2018-09-19 13:47:28', 0),
(32, 32, 17, '2018-09-19 13:48:50', 0),
(33, 32, 19, '2018-09-19 13:49:31', 0),
(34, 32, 19, '2018-09-19 13:49:31', 0),
(35, 32, 17, '2018-09-19 13:49:59', 0),
(36, 32, 17, '2018-09-19 13:50:09', 0),
(37, 32, 14, '2018-09-19 13:50:14', 0),
(38, 32, 17, '2018-09-19 14:07:07', 0),
(39, 32, 14, '2018-09-19 14:07:36', 0),
(40, 32, 17, '2018-09-19 14:08:01', 1),
(41, 238, 14, '2018-09-19 14:08:13', 1),
(42, 224, 21, '2018-09-23 03:34:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nasuploadedpicture`
--

CREATE TABLE `nasuploadedpicture` (
  `NasUploadedPictureID` int(11) NOT NULL,
  `NasID` int(11) NOT NULL,
  `UploadedPictureID` int(11) NOT NULL,
  `IsCurrent` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasuploadedpicture`
--

INSERT INTO `nasuploadedpicture` (`NasUploadedPictureID`, `NasID`, `UploadedPictureID`, `IsCurrent`) VALUES
(18, 32, 41, 0),
(23, 38, 47, 0),
(24, 39, 49, 1),
(25, 218, 50, 0),
(26, 219, 50, 0),
(27, 220, 50, 0),
(28, 221, 50, 0),
(29, 222, 50, 0),
(30, 223, 50, 0),
(31, 224, 51, 1),
(32, 38, 52, 1),
(33, 222, 53, 1),
(34, 218, 54, 1),
(35, 219, 55, 1),
(36, 220, 56, 0),
(37, 221, 57, 1),
(38, 223, 58, 1),
(39, 220, 59, 0),
(40, 220, 60, 1),
(41, 32, 61, 0),
(42, 237, 50, 1),
(43, 32, 63, 1),
(44, 238, 64, 1),
(45, 239, 65, 0),
(46, 239, 66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `PositionID` int(11) NOT NULL,
  `PositionName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuestionID` int(11) NOT NULL,
  `Question` varchar(250) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `Question`, `CategoryID`, `IsDeleted`) VALUES
(1, 'Whatss', 2, 1),
(2, 'Wheres', 2, 1),
(3, 'When', 2, 1),
(4, 'How', 8, 1),
(5, 'xzczvzxc', 2, 1),
(6, 'asdfasdfas', 9, 1),
(7, 'cxbvcxbc', 2, 1),
(8, 'uyturty', 2, 1),
(9, 'Hows are you?', 8, 1),
(10, 'I dont know.', 8, 1),
(11, 'Who knows.', 9, 1),
(12, 'Life of a party', 2, 1),
(13, 'Hearts are gonna break.', 2, 1),
(14, 'Yeah Yeah Yeaho', 8, 1),
(15, 'Dont let him keep you down.', 8, 1),
(16, 'Help me.', 8, 1),
(17, 'But I just can\'t.', 2, 1),
(18, 'What is ', 8, 1),
(19, 'What is ', 8, 1),
(20, 'What is ', 8, 1),
(21, 'What is ', 8, 1),
(22, 'What is ', 8, 1),
(23, 'What is ', 8, 1),
(24, 'What is ', 8, 1),
(25, 'What is ', 8, 1),
(26, 'What is ', 8, 1),
(27, 'What is ', 8, 1),
(28, 'What is ', 8, 1),
(29, 'What is ', 8, 1),
(30, 'What is ', 8, 1),
(31, 'What is ', 8, 1),
(32, 'What is ', 8, 1),
(33, 'The scholar is able to perform his/her assigned duties.', 11, 0),
(34, 'The scholar is able to meet deadlines', 11, 0),
(35, 'The scholar work-output meets the required standard.', 11, 0),
(36, 'The scholar work-output meets the required standard.', 11, 0),
(37, 'The scholar is able to follow instructions.', 11, 0),
(38, 'The scholar is polite in dealing with clients.', 11, 0),
(39, 'The scholar is able to identify errors.', 11, 0),
(40, 'The scholar attends meetings.', 11, 0),
(41, 'The scholar joins school programs.', 11, 0),
(42, 'The scholar applies newly learned techniques at work.', 11, 0),
(43, 'The scholar handles school property appropriately.', 11, 0),
(44, 'The scholar is organized.', 12, 0),
(45, 'The scholar works with minimun supervision.', 12, 0),
(46, 'The scholar works on time.', 12, 0),
(47, 'The scholar renders overtime.', 12, 0),
(48, 'The scholar is available in his/her work area.', 12, 0),
(49, 'The scholar wears the prescribes uniform.', 12, 0),
(50, 'The scholar is physically neat.', 12, 0),
(51, 'The scholar is respectful to his/her superior.', 13, 0),
(52, 'The scholar seeks approval from superior before performing unfamiliar task.', 13, 0),
(53, 'The scholar listens to his/her superior.', 13, 0),
(54, 'The scholar accepts criticism.', 13, 0),
(55, 'The scholar is able to handle emotional upsets.', 13, 0),
(56, 'The scholar models good ethics.', 13, 0),
(57, 'The scholar is cooperative.', 13, 0),
(58, 'The scholar is courteous.', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `ScheduleDescription` varchar(250) NOT NULL,
  `ShiftID` int(11) NOT NULL,
  `Created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `ScheduleDescription`, `ShiftID`, `Created_at`, `IsDeleted`) VALUES
(1, 'Librarian Morning', 1, '2018-08-17 13:53:37', 1),
(3, 'Librarian Afternoon', 2, '2018-08-17 13:58:29', 1),
(4, 'Office Assistant', 1, '2018-08-17 13:58:59', 1),
(14, 'Office Assistant', 1, '2018-08-30 14:06:49', 0),
(15, 'New schedule', 1, '2018-09-06 06:30:17', 1),
(16, 'Librarian', 1, '2018-09-07 06:09:52', 1),
(17, 'New Schedule', 1, '2018-09-13 03:45:51', 0),
(18, 'vcvcxvvzxvcxz', 1, '2018-09-13 03:50:53', 1),
(19, 'Tarung nani', 1, '2018-09-19 12:45:54', 1),
(20, 'wqerqwerweqrweqr', 1, '2018-09-19 12:46:45', 1),
(21, 'Bulacao NAS', 1, '2018-09-21 07:31:47', 0),
(22, 'Office Assistants', 1, '2018-09-23 03:36:55', 1),
(23, 'Get out of my head.', 1, '2018-09-23 05:57:06', 1),
(24, 'Get out of my head.', 1, '2018-09-23 05:57:06', 1),
(25, 'sfafdasdf', 1, '2018-09-23 05:57:49', 1),
(26, 'asdfsdafsad', 1, '2018-09-23 06:00:13', 1),
(27, 'xcvczvxz', 1, '2018-09-23 06:01:34', 1),
(28, 'nmnbmnb', 1, '2018-09-23 06:01:49', 1),
(29, 'Empty bar', 2, '2018-09-23 06:04:42', 1),
(30, 'Empty bar', 2, '2018-09-23 06:04:42', 1),
(31, 'WTF', 2, '2018-09-23 06:06:23', 1),
(32, 'Nervous', 1, '2018-09-23 06:09:46', 0),
(33, 'Youo', 1, '2018-09-23 06:10:31', 0),
(34, 'You', 2, '2018-09-23 06:10:32', 1),
(35, 'Youngblood', 1, '2018-09-23 06:13:13', 0),
(36, 'sadfasdfasdf', 1, '2018-09-23 12:48:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `SchoolyearID` int(11) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`SchoolyearID`, `Year`, `IsDeleted`) VALUES
(7, '2018-2019', 1),
(8, '2016-2017', 0),
(9, '2019-2020', 1),
(10, '2019-2020', 0),
(11, '2019-2020', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `ShiftID` int(11) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`ShiftID`, `Shift`, `IsDeleted`) VALUES
(1, 'Morning', 0),
(2, 'Afternoon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploadedpicture`
--

CREATE TABLE `uploadedpicture` (
  `UploadedPictureID` int(11) NOT NULL,
  `Filename` varchar(250) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadedpicture`
--

INSERT INTO `uploadedpicture` (`UploadedPictureID`, `Filename`, `CreatedAt`) VALUES
(32, 'ACT_BLDG1.jpg', '2018-08-10 08:00:34'),
(33, 'Asian_College_of_Technology_Building.jpg', '2018-08-10 08:03:22'),
(34, 'Asian_College_of_Technology_Building_1.jpg', '2018-08-10 08:03:41'),
(35, 'wp2362384.jpg', '2018-08-11 07:53:20'),
(36, 'DSC_09241.JPG', '2018-08-11 11:06:20'),
(37, 'DSC_0915.JPG', '2018-08-11 17:09:05'),
(38, 'DSC_09151.JPG', '2018-08-11 17:09:05'),
(39, '1522725235nancy7.jpg', '2018-08-16 03:16:41'),
(40, '1522725235nancy.jpg', '2018-08-16 13:57:12'),
(41, 'Admin-icon.png', '2018-08-16 15:05:33'),
(42, 'IMG_8525.JPG', '2018-08-17 12:34:16'),
(43, 'August.jpg', '2018-08-22 17:30:11'),
(44, 'August1.jpg', '2018-08-22 18:46:42'),
(45, 'coverPageOfjuly.jpg', '2018-08-22 18:47:47'),
(46, 'CoverpageofMarch.jpg', '2018-08-22 18:48:39'),
(47, 'CoverPageSeptember.jpg', '2018-08-22 18:52:14'),
(48, '40038839_231844994151378_6756768595025330176_n.png', '2018-08-24 16:09:28'),
(49, '39900503_323277378241859_4545445128663203840_n.png', '2018-08-29 11:27:10'),
(50, 'default_prof_pic.png', '2018-08-29 17:30:32'),
(51, 'Team_leek_weed_interface_logo.jpg', '2018-09-06 06:19:01'),
(52, 'hoofd-paard-silhouet-zijaanzicht-met-paardenhaar-van-stippen_318-48733.jpg', '2018-09-06 07:53:10'),
(53, '68207.png', '2018-09-06 12:40:43'),
(54, 'single-leaf.png', '2018-09-06 12:41:53'),
(55, 'shield-png-0.png', '2018-09-06 12:42:07'),
(56, 'Team_leek_weed_interface_logo1.jpg', '2018-09-06 12:42:18'),
(57, 'Untitled-2.png', '2018-09-06 12:42:27'),
(58, 'Screenshot_(9).png', '2018-09-06 12:42:50'),
(59, 'IMG_8130.JPG', '2018-09-06 15:09:05'),
(60, '40043916_234541800577141_6723812688192864256_n.png', '2018-09-06 15:09:20'),
(61, 'Student_hand_book_2018.jpg', '2018-09-07 06:13:48'),
(62, '1522725235nancy1.jpg', '2018-09-09 05:00:53'),
(63, 'DSCF0344.JPG', '2018-09-12 10:28:24'),
(64, 'ACT_NEW_2018_LOGO.png', '2018-09-19 13:13:42'),
(65, 'DSC_6329.JPG', '2018-09-21 07:49:30'),
(66, 'IMG_8530.JPG', '2018-09-21 07:50:41'),
(67, 'Screenshot_(6).png', '2018-09-24 02:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Unverified',
  `DepartmentID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `IsFirstLogin` tinyint(1) NOT NULL DEFAULT '1',
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`UserID`, `Email`, `Password`, `Status`, `DepartmentID`, `UserTypeID`, `IsFirstLogin`, `IsDeleted`, `DateCreated`) VALUES
(320, 'alfeche492@gmail.com', 'jr09058456538', 'Verified', 28, 1, 0, 0, '2018-08-16 13:53:44'),
(321, 'andresgotera@gmail.com', 'andresgotera@gmail.com', 'Unverified', 31, 2, 1, 0, '2018-08-16 14:56:28'),
(324, 'batitay@gmail.com', '123123123', 'Verified', 31, 2, 0, 0, '2018-08-18 21:38:44'),
(325, 'nmcxvcxcvx@gmail.com', 'nmcxvcxcvx@gmail.com', 'Unverified', 32, 2, 1, 0, '2018-08-18 21:38:45'),
(326, 'ccs@gmail.com', 'ccs@gmail.com', 'Unverified', 32, 2, 1, 1, '2018-08-18 21:52:07'),
(327, 'atheneaum@gmail.com', 'atheneaum@gmail.com', 'Unverified', 34, 2, 1, 0, '2018-08-18 21:54:43'),
(328, 'atheneaumisd@gmail.com', 'atheneaumisd@gmail.com', 'Unverified', 36, 2, 1, 0, '2018-08-18 21:54:44'),
(329, 'casp@gmail.com', 'casp@gmail.com', 'Unverified', 33, 2, 1, 0, '2018-08-18 21:54:44'),
(330, 'Maintainance@gmail.com', 'Maintainance@gmail.com', 'Unverified', 35, 2, 1, 0, '2018-08-18 21:54:44'),
(331, 'qwerr12355@gmail.com', '123123123', 'Verified', 28, 1, 0, 0, '2018-08-24 16:02:33'),
(332, 'asdfsadfas@gmail.com', 'asdfsadfas@gmail.com', 'Unverified', 37, 2, 1, 0, '2018-09-06 06:14:39'),
(333, 'sadfweqrw@gmail.com', 'sadfweqrw@gmail.com', 'Unverified', 36, 2, 1, 0, '2018-09-06 06:14:51'),
(334, 'sdfasdf@gmail.com', 'sdfasdf@gmail.com', 'Unverified', 31, 2, 1, 0, '2018-09-07 06:42:46'),
(335, 'jemineadelute@gmail.com', '123123123', 'Verified', 31, 2, 0, 0, '2018-09-09 04:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserInfoID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `ContactNumber` varchar(30) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserInfoID`, `Firstname`, `Middlename`, `Lastname`, `Address`, `Birthdate`, `Gender`, `ContactNumber`, `UserID`) VALUES
(40, 'Raymundo', 'Remiticado', 'Alfeche', 'Naga City', '1999-02-11', 'Male', '09752186818', 320),
(41, 'Enrique', 'Alfeche', 'Gil', 'Manila Philippines', '1992-01-03', 'Male', '090909090909', 331),
(42, 'Jeminea', 'Alfeche', 'Delute', 'Apas ', '2012-09-09', 'Male', '90909090909', 335),
(43, 'Batitay', 'Adsfafsda', 'Steven', 'Cebu City', '2018-09-24', 'Female', '90898090909', 324);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `Type`) VALUES
(1, 'Admin'),
(2, 'Evaluator');

-- --------------------------------------------------------

--
-- Table structure for table `useruploadedpicture`
--

CREATE TABLE `useruploadedpicture` (
  `UserUploadedPictureID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UploadedPictureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useruploadedpicture`
--

INSERT INTO `useruploadedpicture` (`UserUploadedPictureID`, `UserID`, `UploadedPictureID`) VALUES
(14, 320, 40),
(15, 331, 48),
(16, 335, 62),
(17, 324, 67);

-- --------------------------------------------------------

--
-- Table structure for table `userverificationcode`
--

CREATE TABLE `userverificationcode` (
  `UserVerificationCodeID` int(11) NOT NULL,
  `Code` varchar(150) NOT NULL,
  `DateGenerated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(50) NOT NULL DEFAULT 'Active',
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userverificationcode`
--

INSERT INTO `userverificationcode` (`UserVerificationCodeID`, `Code`, `DateGenerated`, `Status`, `UserID`) VALUES
(22, '5b758200adb6e', '2018-08-16 13:54:08', 'Expired', 320),
(23, '5b758207de6df', '2018-08-16 13:54:15', 'Active', 320),
(24, '5b802cff29049', '2018-08-24 16:06:23', 'Active', 331),
(25, '5b94a8137c155', '2018-09-09 04:56:51', 'Active', 335);

-- --------------------------------------------------------

--
-- Table structure for table `workingdate`
--

CREATE TABLE `workingdate` (
  `WorkingDateID` int(11) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `Month` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Schoolyear` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `IsDeleted` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workingdate`
--

INSERT INTO `workingdate` (`WorkingDateID`, `Day`, `Month`, `Date`, `Schoolyear`, `Semester`, `IsDeleted`) VALUES
(90, 'Wednesday', 'June', '2018-06-06', '2018-2019', 'First Semester', 0),
(91, 'Monday', 'June', '2018-06-04', '2018-2019', 'First Semester', 0),
(92, 'Saturday', 'June', '2018-06-02', '2018-2019', 'First Semester', 0),
(93, 'Tuesday', 'June', '2018-06-05', '2018-2019', 'First Semester', 0),
(94, 'Thursday', 'June', '2018-06-07', '2018-2019', 'First Semester', 0),
(95, 'Friday', 'June', '2018-06-01', '2018-2019', 'First Semester', 1),
(96, 'Friday', 'June', '2018-06-08', '2018-2019', 'First Semester', 0),
(97, 'Saturday', 'June', '2018-06-09', '2018-2019', 'First Semester', 0),
(98, 'Monday', 'June', '2018-06-11', '2018-2019', 'First Semester', 0),
(99, 'Tuesday', 'June', '2018-06-12', '2018-2019', 'First Semester', 1),
(100, 'Wednesday', 'June', '2018-06-13', '2018-2019', 'First Semester', 0),
(101, 'Thursday', 'June', '2018-06-14', '2018-2019', 'First Semester', 0),
(102, 'Friday', 'June', '2018-06-15', '2018-2019', 'First Semester', 0),
(103, 'Saturday', 'June', '2018-06-16', '2018-2019', 'First Semester', 0),
(104, 'Monday', 'June', '2018-06-18', '2018-2019', 'First Semester', 0),
(105, 'Tuesday', 'June', '2018-06-19', '2018-2019', 'First Semester', 0),
(106, 'Wednesday', 'June', '2018-06-20', '2018-2019', 'First Semester', 0),
(107, 'Thursday', 'June', '2018-06-21', '2018-2019', 'First Semester', 0),
(108, 'Friday', 'June', '2018-06-22', '2018-2019', 'First Semester', 0),
(109, 'Saturday', 'June', '2018-06-23', '2018-2019', 'First Semester', 0),
(110, 'Monday', 'June', '2018-06-25', '2018-2019', 'First Semester', 0),
(111, 'Tuesday', 'June', '2018-06-26', '2018-2019', 'First Semester', 0),
(112, 'Wednesday', 'June', '2018-06-27', '2018-2019', 'First Semester', 0),
(113, 'Thursday', 'June', '2018-06-28', '2018-2019', 'First Semester', 0),
(114, 'Friday', 'June', '2018-06-29', '2018-2019', 'First Semester', 0),
(115, 'Saturday', 'June', '2018-06-30', '2018-2019', 'First Semester', 0),
(116, 'Thursday', 'July', '2018-07-05', '2018-2019', 'First Semester', 0),
(117, 'Friday', 'July', '2018-07-06', '2018-2019', 'First Semester', 0),
(118, 'Tuesday', 'July', '2018-07-03', '2018-2019', 'First Semester', 0),
(119, 'Wednesday', 'July', '2018-07-04', '2018-2019', 'First Semester', 0),
(120, 'Saturday', 'July', '2018-07-07', '2018-2019', 'First Semester', 0),
(121, 'Monday', 'July', '2018-07-02', '2018-2019', 'First Semester', 0),
(122, 'Monday', 'July', '2018-07-09', '2018-2019', 'First Semester', 0),
(123, 'Tuesday', 'July', '2018-07-10', '2018-2019', 'First Semester', 0),
(124, 'Wednesday', 'July', '2018-07-11', '2018-2019', 'First Semester', 0),
(125, 'Thursday', 'July', '2018-07-12', '2018-2019', 'First Semester', 0),
(126, 'Friday', 'July', '2018-07-13', '2018-2019', 'First Semester', 0),
(127, 'Saturday', 'July', '2018-07-14', '2018-2019', 'First Semester', 0),
(128, 'Monday', 'July', '2018-07-16', '2018-2019', 'First Semester', 0),
(129, 'Tuesday', 'July', '2018-07-17', '2018-2019', 'First Semester', 0),
(130, 'Wednesday', 'July', '2018-07-18', '2018-2019', 'First Semester', 0),
(131, 'Thursday', 'July', '2018-07-19', '2018-2019', 'First Semester', 0),
(132, 'Friday', 'July', '2018-07-20', '2018-2019', 'First Semester', 0),
(133, 'Saturday', 'July', '2018-07-21', '2018-2019', 'First Semester', 0),
(134, 'Monday', 'July', '2018-07-23', '2018-2019', 'First Semester', 0),
(135, 'Tuesday', 'July', '2018-07-24', '2018-2019', 'First Semester', 0),
(136, 'Wednesday', 'July', '2018-07-25', '2018-2019', 'First Semester', 0),
(137, 'Thursday', 'July', '2018-07-26', '2018-2019', 'First Semester', 0),
(138, 'Friday', 'July', '2018-07-27', '2018-2019', 'First Semester', 0),
(139, 'Saturday', 'July', '2018-07-28', '2018-2019', 'First Semester', 0),
(140, 'Monday', 'July', '2018-07-30', '2018-2019', 'First Semester', 0),
(141, 'Tuesday', 'July', '2018-07-31', '2018-2019', 'First Semester', 0),
(196, 'Friday', 'August', '2018-08-03', '2018-2019', 'First Semester', 0),
(197, 'Saturday', 'August', '2018-08-04', '2018-2019', 'First Semester', 0),
(198, 'Tuesday', 'August', '2018-08-07', '2018-2019', 'First Semester', 0),
(199, 'Thursday', 'August', '2018-08-02', '2018-2019', 'First Semester', 0),
(200, 'Wednesday', 'August', '2018-08-01', '2018-2019', 'First Semester', 0),
(201, 'Monday', 'August', '2018-08-06', '2018-2019', 'First Semester', 0),
(202, 'Wednesday', 'August', '2018-08-08', '2018-2019', 'First Semester', 0),
(203, 'Thursday', 'August', '2018-08-09', '2018-2019', 'First Semester', 0),
(204, 'Friday', 'August', '2018-08-10', '2018-2019', 'First Semester', 0),
(205, 'Saturday', 'August', '2018-08-11', '2018-2019', 'First Semester', 0),
(206, 'Monday', 'August', '2018-08-13', '2018-2019', 'First Semester', 0),
(207, 'Tuesday', 'August', '2018-08-14', '2018-2019', 'First Semester', 0),
(208, 'Wednesday', 'August', '2018-08-15', '2018-2019', 'First Semester', 0),
(209, 'Thursday', 'August', '2018-08-16', '2018-2019', 'First Semester', 0),
(210, 'Friday', 'August', '2018-08-17', '2018-2019', 'First Semester', 0),
(211, 'Saturday', 'August', '2018-08-18', '2018-2019', 'First Semester', 0),
(212, 'Monday', 'August', '2018-08-20', '2018-2019', 'First Semester', 0),
(213, 'Tuesday', 'August', '2018-08-21', '2018-2019', 'First Semester', 0),
(214, 'Wednesday', 'August', '2018-08-22', '2018-2019', 'First Semester', 0),
(215, 'Thursday', 'August', '2018-08-23', '2018-2019', 'First Semester', 0),
(216, 'Friday', 'August', '2018-08-24', '2018-2019', 'First Semester', 0),
(217, 'Saturday', 'August', '2018-08-25', '2018-2019', 'First Semester', 0),
(218, 'Monday', 'August', '2018-08-27', '2018-2019', 'First Semester', 0),
(219, 'Tuesday', 'August', '2018-08-28', '2018-2019', 'First Semester', 0),
(220, 'Wednesday', 'August', '2018-08-29', '2018-2019', 'First Semester', 0),
(221, 'Thursday', 'August', '2018-08-30', '2018-2019', 'First Semester', 0),
(222, 'Friday', 'August', '2018-08-31', '2018-2019', 'First Semester', 0),
(247, 'Friday', 'June', '2018-06-01', '2018-2019', 'First Semester', 0),
(248, 'Monday', 'September', '2018-09-03', '2018-2019', 'First Semester', 0),
(249, 'Saturday', 'September', '2018-09-01', '2018-2019', 'First Semester', 0),
(250, 'Tuesday', 'September', '2018-09-04', '2018-2019', 'First Semester', 0),
(251, 'Thursday', 'September', '2018-09-06', '2018-2019', 'First Semester', 0),
(252, 'Friday', 'September', '2018-09-07', '2018-2019', 'First Semester', 0),
(253, 'Wednesday', 'September', '2018-09-05', '2018-2019', 'First Semester', 0),
(254, 'Saturday', 'September', '2018-09-08', '2018-2019', 'First Semester', 0),
(255, 'Monday', 'September', '2018-09-10', '2018-2019', 'First Semester', 0),
(256, 'Tuesday', 'September', '2018-09-11', '2018-2019', 'First Semester', 0),
(257, 'Wednesday', 'September', '2018-09-12', '2018-2019', 'First Semester', 0),
(258, 'Thursday', 'September', '2018-09-13', '2018-2019', 'First Semester', 0),
(259, 'Saturday', 'September', '2018-09-15', '2018-2019', 'First Semester', 0),
(260, 'Friday', 'September', '2018-09-14', '2018-2019', 'First Semester', 0),
(261, 'Monday', 'September', '2018-09-17', '2018-2019', 'First Semester', 0),
(262, 'Tuesday', 'September', '2018-09-18', '2018-2019', 'First Semester', 0),
(263, 'Wednesday', 'September', '2018-09-19', '2018-2019', 'First Semester', 0),
(264, 'Thursday', 'September', '2018-09-20', '2018-2019', 'First Semester', 0),
(265, 'Saturday', 'September', '2018-09-22', '2018-2019', 'First Semester', 0),
(266, 'Friday', 'September', '2018-09-21', '2018-2019', 'First Semester', 0),
(267, 'Monday', 'September', '2018-09-24', '2018-2019', 'First Semester', 0),
(268, 'Tuesday', 'September', '2018-09-25', '2018-2019', 'First Semester', 0),
(269, 'Thursday', 'September', '2018-09-27', '2018-2019', 'First Semester', 0),
(270, 'Friday', 'September', '2018-09-28', '2018-2019', 'First Semester', 0),
(271, 'Saturday', 'September', '2018-09-29', '2018-2019', 'First Semester', 0),
(272, 'Wednesday', 'September', '2018-09-26', '', 'First Semester', 1),
(273, 'Wednesday', 'September', '2018-09-26', '2018-2019', 'First Semester', 0),
(274, 'Tuesday', 'June', '2018-06-12', '', 'First Semester', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD PRIMARY KEY (`DailyScheduleID`),
  ADD KEY `ScheduleID` (`ScheduleID`),
  ADD KEY `DayID` (`DayID`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`DayID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`),
  ADD KEY `LocationID` (`LocationID`);

--
-- Indexes for table `departmenthead`
--
ALTER TABLE `departmenthead`
  ADD PRIMARY KEY (`DepartmentHeadID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`DTRID`),
  ADD KEY `NasBiometricID` (`NasBiometricID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvaluationID`);

--
-- Indexes for table `evaluationresults`
--
ALTER TABLE `evaluationresults`
  ADD PRIMARY KEY (`EvaluationResultID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `NasID` (`NasID`),
  ADD KEY `EvaluationID` (`EvaluationID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `nas`
--
ALTER TABLE `nas`
  ADD PRIMARY KEY (`NasID`),
  ADD UNIQUE KEY `IDNumber` (`IDNumber`),
  ADD KEY `DepartmentID` (`DepartmentID`),
  ADD KEY `DepartmentID_2` (`DepartmentID`);

--
-- Indexes for table `nasbiometric`
--
ALTER TABLE `nasbiometric`
  ADD PRIMARY KEY (`NasBiometricID`),
  ADD UNIQUE KEY `BiometricID` (`BiometricID`),
  ADD KEY `NasID` (`NasID`);

--
-- Indexes for table `nasevaluation`
--
ALTER TABLE `nasevaluation`
  ADD PRIMARY KEY (`NasEvaluationID`),
  ADD KEY `NasID` (`NasID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `QuestionID` (`QuestionID`),
  ADD KEY `EvaluationID` (`EvaluationID`);

--
-- Indexes for table `nasgrades`
--
ALTER TABLE `nasgrades`
  ADD PRIMARY KEY (`NasGradesID`),
  ADD KEY `NasID` (`NasID`);

--
-- Indexes for table `nasschedule`
--
ALTER TABLE `nasschedule`
  ADD PRIMARY KEY (`NasScheduleID`),
  ADD KEY `NasID` (`NasID`),
  ADD KEY `ScheduleID` (`ScheduleID`);

--
-- Indexes for table `nasuploadedpicture`
--
ALTER TABLE `nasuploadedpicture`
  ADD PRIMARY KEY (`NasUploadedPictureID`),
  ADD KEY `NasID` (`NasID`),
  ADD KEY `UploadedPictureID` (`UploadedPictureID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `CatigoryID` (`CategoryID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `ShiftID` (`ShiftID`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`SchoolyearID`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indexes for table `uploadedpicture`
--
ALTER TABLE `uploadedpicture`
  ADD PRIMARY KEY (`UploadedPictureID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `DepartmentID` (`DepartmentID`),
  ADD KEY `UserTypeID` (`UserTypeID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserInfoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- Indexes for table `useruploadedpicture`
--
ALTER TABLE `useruploadedpicture`
  ADD PRIMARY KEY (`UserUploadedPictureID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `UploadedPictureID` (`UploadedPictureID`);

--
-- Indexes for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  ADD PRIMARY KEY (`UserVerificationCodeID`),
  ADD UNIQUE KEY `Code` (`Code`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `workingdate`
--
ALTER TABLE `workingdate`
  ADD PRIMARY KEY (`WorkingDateID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  MODIFY `DailyScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `DayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `departmenthead`
--
ALTER TABLE `departmenthead`
  MODIFY `DepartmentHeadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `DTRID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvaluationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `evaluationresults`
--
ALTER TABLE `evaluationresults`
  MODIFY `EvaluationResultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `NasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `nasbiometric`
--
ALTER TABLE `nasbiometric`
  MODIFY `NasBiometricID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nasevaluation`
--
ALTER TABLE `nasevaluation`
  MODIFY `NasEvaluationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `nasgrades`
--
ALTER TABLE `nasgrades`
  MODIFY `NasGradesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nasschedule`
--
ALTER TABLE `nasschedule`
  MODIFY `NasScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `nasuploadedpicture`
--
ALTER TABLE `nasuploadedpicture`
  MODIFY `NasUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `SchoolyearID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `ShiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploadedpicture`
--
ALTER TABLE `uploadedpicture`
  MODIFY `UploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useruploadedpicture`
--
ALTER TABLE `useruploadedpicture`
  MODIFY `UserUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  MODIFY `UserVerificationCodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `workingdate`
--
ALTER TABLE `workingdate`
  MODIFY `WorkingDateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD CONSTRAINT `dailyschedule_ibfk_1` FOREIGN KEY (`ScheduleID`) REFERENCES `schedule` (`ScheduleID`),
  ADD CONSTRAINT `dailyschedule_ibfk_2` FOREIGN KEY (`DayID`) REFERENCES `day` (`DayID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`LocationID`) REFERENCES `location` (`LocationID`);

--
-- Constraints for table `departmenthead`
--
ALTER TABLE `departmenthead`
  ADD CONSTRAINT `departmenthead_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserID`),
  ADD CONSTRAINT `departmenthead_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `evaluationresults`
--
ALTER TABLE `evaluationresults`
  ADD CONSTRAINT `evaluationresults_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserID`),
  ADD CONSTRAINT `evaluationresults_ibfk_2` FOREIGN KEY (`NasID`) REFERENCES `nasschedule` (`NasID`),
  ADD CONSTRAINT `evaluationresults_ibfk_3` FOREIGN KEY (`EvaluationID`) REFERENCES `evaluation` (`EvaluationID`);

--
-- Constraints for table `nas`
--
ALTER TABLE `nas`
  ADD CONSTRAINT `nas_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `nasevaluation`
--
ALTER TABLE `nasevaluation`
  ADD CONSTRAINT `nasevaluation_ibfk_1` FOREIGN KEY (`NasID`) REFERENCES `nas` (`NasID`),
  ADD CONSTRAINT `nasevaluation_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserID`),
  ADD CONSTRAINT `nasevaluation_ibfk_3` FOREIGN KEY (`QuestionID`) REFERENCES `question` (`QuestionID`),
  ADD CONSTRAINT `nasevaluation_ibfk_4` FOREIGN KEY (`EvaluationID`) REFERENCES `evaluation` (`EvaluationID`);

--
-- Constraints for table `nasgrades`
--
ALTER TABLE `nasgrades`
  ADD CONSTRAINT `nasgrades_ibfk_1` FOREIGN KEY (`NasID`) REFERENCES `nas` (`NasID`);

--
-- Constraints for table `nasschedule`
--
ALTER TABLE `nasschedule`
  ADD CONSTRAINT `nasschedule_ibfk_1` FOREIGN KEY (`NasID`) REFERENCES `nas` (`NasID`),
  ADD CONSTRAINT `nasschedule_ibfk_2` FOREIGN KEY (`ScheduleID`) REFERENCES `schedule` (`ScheduleID`);

--
-- Constraints for table `nasuploadedpicture`
--
ALTER TABLE `nasuploadedpicture`
  ADD CONSTRAINT `nasuploadedpicture_ibfk_1` FOREIGN KEY (`UploadedPictureID`) REFERENCES `uploadedpicture` (`UploadedPictureID`),
  ADD CONSTRAINT `nasuploadedpicture_ibfk_2` FOREIGN KEY (`NasID`) REFERENCES `nas` (`NasID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`ShiftID`) REFERENCES `shift` (`ShiftID`);

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `useraccount_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`),
  ADD CONSTRAINT `useraccount_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserID`);

--
-- Constraints for table `useruploadedpicture`
--
ALTER TABLE `useruploadedpicture`
  ADD CONSTRAINT `useruploadedpicture_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserID`),
  ADD CONSTRAINT `useruploadedpicture_ibfk_2` FOREIGN KEY (`UploadedPictureID`) REFERENCES `uploadedpicture` (`UploadedPictureID`);

--
-- Constraints for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  ADD CONSTRAINT `userverificationcode_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `useraccount` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
