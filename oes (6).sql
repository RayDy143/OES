-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 08:29 AM
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
(2, 'Personality', '2018-09-08 17:28:21', 0),
(3, 'sadfxzv', '2018-09-08 17:28:57', 1),
(4, 'xcvxzcvxzvczx', '2018-09-08 17:47:30', 1),
(5, 'mnbmnbmb', '2018-09-08 17:48:47', 1),
(6, 'mnbmnbmb', '2018-09-08 17:48:48', 1),
(7, 'rtytryrt', '2018-09-08 17:48:59', 1),
(8, 'Behaviour', '2018-09-08 20:54:58', 0),
(9, 'Loyalty', '2018-09-09 01:47:24', 1),
(10, 'cvvcvcxzc', '2018-09-09 01:47:24', 1);

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
(11, 5, '07:05:00', '12:05:00', 14),
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
(30, 3, '01:00:00', '01:00:00', 18);

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
(21, 328, 36, '2018-09-06 15:10:09'),
(23, 321, 31, '2018-09-06 16:50:11'),
(24, 332, 37, '2018-09-12 10:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvaluationID` int(11) NOT NULL,
  `Schoolyear` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `StartingDate` date NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT '0',
  `IsDeleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`EvaluationID`, `Schoolyear`, `Semester`, `StartingDate`, `IsActive`, `IsDeleted`) VALUES
(2, '2018-2019', 'First Semester', '2018-09-12', 0, 1),
(3, '2017-2018', 'First Semester', '2018-09-12', 0, 1),
(4, '2017-2018', 'Second Semester', '2018-09-12', 0, 1),
(5, '2018-2019', 'First Semester', '2018-09-13', 0, 0),
(6, '2019-2020', 'First Semester', '2018-09-20', 0, 1);

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
(32, '15-2000810', 'Raymundo', 'Remiticado', 'Alfeche', 'alfeche492@gmail.com', 'Naga City', '1999-02-11', '09058456538', 37, 0),
(38, '15-2000921', 'Rica', 'dsafasf', 'Vargas', 'rica@gmail.com', 'Basak Pardo', '2018-08-23', '342342', 31, 0),
(39, '15-2000910', 'Krischan', 'Asd', 'Solon', 'solon@gmail.com', 'Carcar City', '1995-08-25', '09432423423434', 37, 0),
(218, '15-2000922', 'Jaime', 'Adsfas', 'Dionson', 'jaime@gmail.com', 'United States', '2018-08-30', '9122334343', 31, 0),
(219, '15-2000923', 'Ella', 'Adsfas', 'Taglucpoc', 'Ella@gmail.com', 'United States', '2018-08-30', '9122334343', 32, 0),
(220, '15-2000924', 'Mea', 'Adsfas', 'Delute', 'Daemea@gmail.com', 'United States', '2018-08-30', '9122334343', 36, 1),
(221, '15-2000925', 'Millche', 'Adsfas', 'Asdfk', 'Millche@gmail.com', 'United States', '2018-08-30', '9122334343', 33, 0),
(222, '15-2000926', 'Justin', 'Adsfas', 'Bieber', 'qwerqwe2234rqw@gmail.com', 'United States', '2018-08-30', '9122334343', 31, 1),
(223, '15-2000927', 'Justin', 'Adsfas', 'Bieber', 'qwerq55werqw@gmail.com', 'United States', '2018-08-30', '9122334343', 35, 1),
(224, '32432423', 'Team', 'Bdasfsdafsa', 'Liquid', 'sadfsa@gmail.com', 'sadfasdfsdafasd', '2018-12-06', '909090909', 37, 0),
(237, '15-2000928', 'Asdfdsa', 'xcvzxcvz', 'Rdsafasdf', 'ewrqwrw@gmail.com', 'Cebu', '0000-00-00', '90909090', 31, 1),
(238, '121212121', 'Bryan', 'John', 'Logdonio', 'brayn@gmail.com', 'xzvcvcvcxvczxvvcxz sdaf asfd asf asdfsdaf', '1999-03-05', '093432443242', 34, 0);

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
(30, 224, 20, '2018-09-19 12:53:09', 1),
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
(41, 238, 14, '2018-09-19 14:08:13', 1);

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
(44, 238, 64, 1);

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
(1, 'Whatss', 2, 0),
(2, 'Wheres', 2, 0),
(3, 'When', 2, 1),
(4, 'How', 8, 1),
(5, 'xzczvzxc', 2, 1),
(6, 'asdfasdfas', 9, 1),
(7, 'cxbvcxbc', 2, 1),
(8, 'uyturty', 2, 1),
(9, 'Hows are you?', 8, 0),
(10, 'I dont know.', 8, 0),
(11, 'Who knows.', 9, 0),
(12, 'Life of a party', 2, 0),
(13, 'Hearts are gonna break.', 2, 0),
(14, 'Yeah Yeah Yeaho', 8, 0),
(15, 'Dont let him keep you down.', 8, 0),
(16, 'Help me.', 8, 0),
(17, 'But I just can\'t.', 2, 0),
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
(32, 'What is ', 8, 1);

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
(19, 'asfsdafsadfas', 1, '2018-09-19 12:45:54', 0),
(20, 'wqerqwerweqrweqr', 1, '2018-09-19 12:46:45', 0);

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
(64, 'ACT_NEW_2018_LOGO.png', '2018-09-19 13:13:42');

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
(324, 'batitay@gmail.com', 'batitay@gmail.com', 'Unverified', 31, 2, 1, 0, '2018-08-18 21:38:44'),
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
(42, 'Jeminea', 'Alfeche', 'Delute', 'Apas ', '2012-09-09', 'Male', '90909090909', 335);

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
(16, 335, 62);

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
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvaluationID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  MODIFY `DailyScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `DepartmentHeadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvaluationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `NasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `nasgrades`
--
ALTER TABLE `nasgrades`
  MODIFY `NasGradesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nasschedule`
--
ALTER TABLE `nasschedule`
  MODIFY `NasScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `nasuploadedpicture`
--
ALTER TABLE `nasuploadedpicture`
  MODIFY `NasUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `UploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useruploadedpicture`
--
ALTER TABLE `useruploadedpicture`
  MODIFY `UserUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  MODIFY `UserVerificationCodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- Constraints for table `nas`
--
ALTER TABLE `nas`
  ADD CONSTRAINT `nas_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

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
