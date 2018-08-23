-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2018 at 02:28 AM
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
  `DayID` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `ScheduleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(36, 'Atheneaum ISD', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `departmenthead`
--

CREATE TABLE `departmenthead` (
  `DepartmentHeadID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(32, '15-2000810', 'Raymundo', 'Remiticado', 'Alfeche', 'alfeche492@gmail.com', 'Naga City', '1999-02-11', '09058456538', 32, 0),
(38, '15-2000921', 'sdafasdfsdaf', 'dsafasf', 'dsafasdf', 'sdfafdasd@dsa.com', 'sdfasdfasdf', '2018-08-23', '342342', 28, 0);

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
(2, 32, 4, '2018-08-17 14:08:06', 1),
(4, 38, 3, '2018-08-22 23:46:19', 1);

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
(18, 32, 41, 1),
(23, 38, 47, 1);

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
  `ShiftID` int(11) NOT NULL,
  `Created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IsDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `ScheduleDescription`, `ShiftID`, `Created_at`, `IsDeleted`) VALUES
(1, 'Librarian Morning', 1, '2018-08-17 13:53:37', 0),
(3, 'Librarian Afternoon', 2, '2018-08-17 13:58:29', 0),
(4, 'Office Assistant', 1, '2018-08-17 13:58:59', 0),
(5, 'sdfdasfsdafsd', 2, '2018-08-22 23:51:15', 0);

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
(47, 'CoverPageSeptember.jpg', '2018-08-22 18:52:14');

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
(326, 'ccs@gmail.com', 'ccs@gmail.com', 'Unverified', 32, 2, 1, 0, '2018-08-18 21:52:07'),
(327, 'atheneaum@gmail.com', 'atheneaum@gmail.com', 'Unverified', 34, 2, 1, 0, '2018-08-18 21:54:43'),
(328, 'atheneaumisd@gmail.com', 'atheneaumisd@gmail.com', 'Unverified', 36, 2, 1, 0, '2018-08-18 21:54:44'),
(329, 'casp@gmail.com', 'casp@gmail.com', 'Unverified', 33, 2, 1, 0, '2018-08-18 21:54:44'),
(330, 'Maintainance@gmail.com', 'Maintainance@gmail.com', 'Unverified', 35, 2, 1, 0, '2018-08-18 21:54:44');

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
(40, 'Raymundo', 'Remiticado', 'Alfeche', 'Naga City', '1999-02-11', 'Male', '09752186818', 320);

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
(14, 320, 40);

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
(23, '5b758207de6df', '2018-08-16 13:54:15', 'Active', 320);

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
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `ShiftID` (`ShiftID`);

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
-- AUTO_INCREMENT for table `catigory`
--
ALTER TABLE `catigory`
  MODIFY `CatigoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  MODIFY `DailyScheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `DayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `departmenthead`
--
ALTER TABLE `departmenthead`
  MODIFY `DepartmentHeadID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nas`
--
ALTER TABLE `nas`
  MODIFY `NasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nasschedule`
--
ALTER TABLE `nasschedule`
  MODIFY `NasScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nasuploadedpicture`
--
ALTER TABLE `nasuploadedpicture`
  MODIFY `NasUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QuestionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `ShiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploadedpicture`
--
ALTER TABLE `uploadedpicture`
  MODIFY `UploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserInfoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useruploadedpicture`
--
ALTER TABLE `useruploadedpicture`
  MODIFY `UserUploadedPictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `userverificationcode`
--
ALTER TABLE `userverificationcode`
  MODIFY `UserVerificationCodeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
