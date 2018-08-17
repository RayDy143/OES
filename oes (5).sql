-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 07:39 PM
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
-- Table structure for table `catigory`
--

CREATE TABLE `catigory` (
  `CatigoryID` int(11) NOT NULL,
  `Catigory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dailyschedule`
--

CREATE TABLE `dailyschedule` (
  `DailyScheduleID` int(11) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `ScheduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyschedule`
--

INSERT INTO `dailyschedule` (`DailyScheduleID`, `Day`, `StartTime`, `EndTime`, `ScheduleID`) VALUES
(126, 'Monday', '07:45:00', '12:05:00', 136),
(127, 'Tuesday', '07:45:00', '00:05:00', 136),
(128, 'Wednesday', '07:45:00', '00:05:00', 136),
(129, 'Thursday', '07:45:00', '00:05:00', 136),
(130, 'Friday', '07:45:00', '00:05:00', 136),
(132, 'Monday', '13:05:00', '19:00:00', 137),
(133, 'Tuesday', '13:05:00', '18:00:00', 137),
(138, 'Monday', '08:05:00', '12:05:00', 138),
(139, 'Tuesday', '08:05:00', '00:05:00', 138),
(140, 'Wednesday', '08:05:00', '00:05:00', 138),
(141, 'Thursday', '08:05:00', '00:05:00', 138),
(142, 'Friday', '08:05:00', '00:05:00', 138),
(143, 'Saturday', '08:05:00', '17:05:00', 138),
(144, 'Monday', '13:05:00', '18:18:00', 139),
(145, 'Tuesday', '13:05:00', '18:18:00', 139),
(146, 'Wednesday', '13:05:00', '18:18:00', 139),
(147, 'Thursday', '13:05:00', '18:18:00', 139),
(148, 'Friday', '13:05:00', '18:18:00', 139),
(155, 'Wednesday', '13:00:00', '06:00:00', 137),
(156, 'Thursday', '13:05:00', '18:00:00', 137),
(157, 'Friday', '13:05:00', '18:00:00', 137),
(160, 'Saturday', '01:05:00', '05:05:00', 137),
(161, 'Saturday', '08:00:00', '17:05:00', 136),
(162, 'Monday', '08:05:00', '12:05:00', 140),
(163, 'Tuesday', '08:05:00', '12:05:00', 140),
(164, 'Wednesday', '08:05:00', '12:05:00', 140),
(165, 'Thursday', '08:05:00', '12:05:00', 140),
(166, 'Friday', '08:05:00', '12:05:00', 140),
(167, 'Saturday', '08:05:00', '17:05:00', 140);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(100) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`, `IsDeleted`) VALUES
(1, 'SWS', 0),
(2, 'CCS', 0),
(3, 'CASP', 0),
(4, 'Admin', 0),
(5, 'Aichi', 0),
(6, 'Library', 0),
(11, 'SHS', 0),
(12, 'Multimedia', 0),
(21, 'Atheneaum', 0),
(22, 'Maintainance', 0),
(23, 'ISD', 0),
(27, 'STAR', 0);

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
(20, '15-2000810', 'Raymundo', 'Remiticado', 'Alfeche', 'alfeche492@gmail.com', 'Naga City Cebu', '2018-07-04', '09752186818', 12, 0),
(21, '15-2000811', 'dsfsafsdas', 'fsdgsfdgsd', 'ertewrtewr', 'sdasa@gasda.com', 'rewrwqrwqes', '2011-04-08', '9080890', 23, 0),
(22, '15-2000812', 'Liza', 'Alfeche', 'Soberano', 'sdfsa@gmail.com', 'hgjhgjhkhgkkh', '2018-08-08', '90980980', 22, 0),
(23, '24332423', 'Jamie', 'sdaf', 'Dionson', 'sdafs@dsa.com', 'sdaf', '2018-08-08', '23423', 1, 0),
(24, '12312312', 'Ed', 'dsfadf', 'Sheeran', 'sdfsafs@gmail.com', 'Im thinking bout how', '2018-08-08', '0923232233', 2, 0),
(25, '2312312', 'Justin', 'Adafsda', 'Beiber', 'justin@gmail.com', 'sadfsadfsadfasd', '2018-08-08', '09032432423', 23, 0),
(26, '15-2000819', 'Rolando', 'dsafas', 'Quillan', 'junjun@gmail.com', 'Cebu City', '2018-04-08', '0909324234', 12, 0),
(27, '15-2000829', 'Rica', 'Reyes', 'Vargas', 'rica@gmail.com', 'Cebu City', '2014-05-06', '09029323223', 1, 0),
(28, '3543543', 'ddsafasdfsad', 'sdafsadf', 'fsadfsad', 'sadfsda@gmail.com', 'sdafdsafsadfasdf dsafasdfsadfasd sadfasfsdafas', '1998-02-11', '65765765765', 27, 0);

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
(18, 20, 137, '2018-08-09 13:14:03', 0),
(19, 20, 136, '2018-08-09 13:15:36', 1),
(20, 21, 136, '2018-08-09 13:16:39', 1),
(21, 22, 136, '2018-08-09 13:16:53', 0),
(22, 22, 136, '2018-08-09 13:16:53', 0),
(23, 23, 136, '2018-08-09 13:17:06', 0),
(24, 23, 136, '2018-08-09 13:17:20', 1),
(25, 24, 136, '2018-08-09 13:17:31', 0),
(27, 25, 136, '2018-08-09 13:18:05', 1),
(28, 26, 136, '2018-08-09 13:18:49', 1),
(29, 27, 136, '2018-08-09 13:19:11', 1),
(30, 28, 136, '2018-08-09 13:19:23', 1),
(31, 22, 140, '2018-08-09 16:34:59', 0),
(32, 22, 140, '2018-08-09 16:35:13', 0),
(33, 22, 140, '2018-08-09 16:36:25', 1),
(34, 24, 140, '2018-08-09 16:39:34', 0),
(35, 24, 140, '2018-08-09 16:40:17', 0),
(36, 24, 140, '2018-08-09 16:40:40', 0),
(37, 24, 140, '2018-08-09 16:41:00', 0),
(38, 24, 140, '2018-08-09 16:41:22', 0),
(39, 24, 140, '2018-08-09 16:41:38', 0),
(40, 24, 140, '2018-08-09 16:42:15', 0),
(41, 24, 140, '2018-08-09 16:42:48', 0),
(42, 24, 140, '2018-08-09 16:43:02', 0),
(43, 24, 140, '2018-08-09 16:43:12', 0),
(44, 24, 136, '2018-08-09 17:31:55', 0),
(45, 24, 140, '2018-08-09 17:32:55', 0),
(46, 24, 137, '2018-08-09 17:33:16', 1);

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
(1, 20, 12, 0),
(2, 21, 17, 0),
(3, 22, 18, 0),
(4, 23, 19, 1),
(5, 24, 20, 1),
(6, 25, 21, 1),
(7, 26, 22, 1),
(8, 27, 23, 1),
(9, 28, 24, 1),
(10, 21, 27, 0),
(11, 21, 28, 1),
(12, 20, 29, 1),
(13, 22, 30, 1);

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
  `CatigoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `ScheduleDescription` varchar(250) NOT NULL,
  `Shift` varchar(50) NOT NULL,
  `Created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `ScheduleDescription`, `Shift`, `Created_at`, `IsDeleted`) VALUES
(136, 'NAS-Faculty', 'Morning', '2018-08-06 02:56:11', 0),
(137, 'NAS-Faculy', 'Afternoon', '2018-08-06 03:00:01', 0),
(138, 'NAS Office', 'Morning', '2018-08-06 05:22:41', 0),
(139, 'NAS Office', 'Afternoon', '2018-08-06 12:17:49', 0),
(140, 'Office- Multimedi', 'Morning', '2018-08-09 14:23:43', 0);

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
(7, '1522725235nancy.jpg', '2018-08-02 03:35:46'),
(8, 'DSC_0919.JPG', '2018-08-02 08:50:17'),
(9, 'DSC_0924.JPG', '2018-08-03 04:40:52'),
(10, 'DSC_09191.JPG', '2018-08-03 17:52:47'),
(11, 'DSC_0923.JPG', '2018-08-03 19:28:52'),
(12, 'DSC06952.JPG', '2018-08-03 22:31:11'),
(13, '1522725235nancy1.jpg', '2018-08-04 02:30:11'),
(14, 'DSC_6329.JPG', '2018-08-04 14:21:22'),
(15, '1522725235nancy2.jpg', '2018-08-07 23:45:22'),
(16, '1522725235nancy3.jpg', '2018-08-07 23:47:26'),
(17, '1522725235nancy4.jpg', '2018-08-07 23:48:41'),
(18, 'facility3.jpg', '2018-08-07 23:52:21'),
(19, 'Admin-icon.png', '2018-08-07 23:54:30'),
(20, 'Family_day_tshirt.png', '2018-08-08 00:02:17'),
(21, '27TH_Foundation_Logo.png', '2018-08-08 00:04:23'),
(22, '4_DNTS_LOGP_WITH_TEXT.png', '2018-08-08 02:52:27'),
(23, 'ACT_CARES_MANUAL.jpg', '2018-08-08 09:29:49'),
(24, 'Screenshot_(9).png', '2018-08-09 12:08:06'),
(25, 'Screenshot_(1).png', '2018-08-09 13:50:23'),
(26, 'Screenshot_(6).png', '2018-08-09 13:51:50'),
(27, 'Screenshot_(37).png', '2018-08-09 14:01:16'),
(28, 'Screenshot_(6)1.png', '2018-08-09 14:03:50'),
(29, '1522725235nancy5.jpg', '2018-08-09 14:04:41'),
(30, '1522725235nancy6.jpg', '2018-08-09 16:31:19');

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
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`UserID`, `Email`, `Password`, `Status`, `DepartmentID`, `UserTypeID`, `IsFirstLogin`, `IsDeleted`) VALUES
(150, 'xcvzcvz@gmail.com', '123123123', 'Verified', 3, 2, 0, 1),
(165, 'alfeche492@gmail.com', 'jr09058456538', 'Verified', 4, 1, 0, 0),
(166, 'qwerr12355@gmail.com', '09058456538', 'Verified', 4, 1, 0, 0),
(173, 'andres@gmail.com', '123123123', 'Verified', 1, 2, 0, 0),
(174, 'sadfsadfs@gmail.com', 'sadfsadfs@gmail.com', 'Unverified', 4, 1, 1, 0),
(175, 'casp@gmail.com', '09058456538', 'Verified', 3, 2, 0, 0),
(177, 'andresgotera@gmail.com', 'andresgotera@gmail.com', 'Unverified', 1, 2, 1, 0),
(178, 'aichi@gmail.com', 'aichi@gmail.com', 'Unverified', 5, 2, 1, 0),
(179, 'zzzzzzzzzzzzz@gmail.com', 'zzzzzzzzzzzzz@gmail.com', 'Unverified', 4, 1, 1, 1),
(180, 'weqrweqrwqe@gmail.com', 'weqrweqrwqe@gmail.com', 'Unverified', 4, 1, 1, 0);

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
(32, 'Andres', 'S', 'Gotera', 'Cebu City', '2018-03-03', 'Male', '090909090909', 150),
(33, 'Raymundo', 'Remiticado', 'Alfeche ', 'Naga City', '1999-02-11', 'Male', '09752186818', 165),
(34, 'Lee', 'Min', 'Joo', 'Seoul Korea', '2018-08-04', 'Male', '090909090', 166),
(35, 'Andres', 'S', 'Gotera', 'Cebu City', '2008-08-04', 'Male', '090909090909', 173),
(36, 'Nancy', 'Mcdonie', 'Alfeche', 'Seoul Korea', '2018-08-04', 'Female', '09309432094', 175);

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
(6, 150, 9),
(7, 165, 10),
(8, 166, 11),
(9, 173, 12),
(10, 175, 13);

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
(15, '5b63db53bc1cd', '2018-08-03 04:34:27', 'Active', 150),
(16, '5b649622b37ea', '2018-08-03 17:51:30', 'Active', 165),
(17, '5b64ac76ce655', '2018-08-03 19:26:46', 'Active', 166);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catigory`
--
ALTER TABLE `catigory`
  ADD PRIMARY KEY (`CatigoryID`);

--
-- Indexes for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD PRIMARY KEY (`DailyScheduleID`),
  ADD KEY `ScheduleID` (`ScheduleID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `nas`
--
ALTER TABLE `nas`
  ADD PRIMARY KEY (`NasID`),
  ADD UNIQUE KEY `IDNumber` (`IDNumber`),
  ADD KEY `DepartmentID` (`DepartmentID`),
  ADD KEY `DepartmentID_2` (`DepartmentID`);

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
  ADD KEY `CatigoryID` (`CatigoryID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`);

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
-- AUTO_INCREMENT for table `catigory`
--
ALTER TABLE `catigory`
  MODIFY `CatigoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  MODIFY `DailyScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `NasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nasschedule`
--
ALTER TABLE `nasschedule`
  MODIFY `NasScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nasuploadedpicture`
--
ALTER TABLE `nasuploadedpicture`
  MODIFY `NasUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `uploadedpicture`
--
ALTER TABLE `uploadedpicture`
  MODIFY `UploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useruploadedpicture`
--
ALTER TABLE `useruploadedpicture`
  MODIFY `UserUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  MODIFY `UserVerificationCodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD CONSTRAINT `dailyschedule_ibfk_1` FOREIGN KEY (`ScheduleID`) REFERENCES `schedule` (`ScheduleID`);

--
-- Constraints for table `nas`
--
ALTER TABLE `nas`
  ADD CONSTRAINT `nas_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

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
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`CatigoryID`) REFERENCES `catigory` (`CatigoryID`);

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
