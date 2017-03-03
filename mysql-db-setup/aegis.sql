-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 07:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aegis`
--

-- --------------------------------------------------------

--
-- Table structure for table `empskillslist`
--

CREATE TABLE `empskillslist` (
  `skillsID` int(11) NOT NULL,
  `skillName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empskillslist`
--

INSERT INTO `empskillslist` (`skillsID`, `skillName`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'LEADERSHIP'),
(5, 'PYTHON'),
(6, 'C#'),
(7, 'C++'),
(8, 'WEB PROGRAMMING'),
(9, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `empwithskills`
--

CREATE TABLE `empwithskills` (
  `empID` varchar(10) DEFAULT NULL,
  `skillsID` int(11) DEFAULT NULL,
  `percentage` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empwithskills`
--

INSERT INTO `empwithskills` (`empID`, `skillsID`, `percentage`) VALUES
('test1', 1, 70),
('test1', 2, 20),
('test2', 1, 0),
('test2', 2, 0),
('test4', 1, 50),
('test1', 7, 80);

-- --------------------------------------------------------

--
-- Table structure for table `projectemp`
--

CREATE TABLE `projectemp` (
  `projectID` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectemp`
--

INSERT INTO `projectemp` (`projectID`, `username`) VALUES
(2, 'test1'),
(5, 'test1'),
(3, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `projectType` varchar(255) NOT NULL,
  `projLocation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `title`, `description`, `startDate`, `endDate`, `projectType`, `projLocation`) VALUES
(1, 'Project 1', 'Sample Description', '2017-01-26', '2017-01-31', 'Civil', 'United Arab Emirates'),
(2, 'Project 2', 'Same Project', '2017-01-28', '2017-01-31', 'Health', 'South Korea'),
(3, 'Project 3', 'Project Desc 3', '2017-01-26', '2017-01-28', 'Civil', 'United Arab Emirates'),
(4, 'Project 4', 'Projct', '2017-01-26', '2017-01-26', 'Civil', 'United Arab Emirates'),
(5, 'BATYRZHAN ', 'DFSFSDFSDFS', '2017-02-12', '2017-02-12', 'Civil', 'United Arab Emirates'),
(6, 'tessssssst', 'testtttttttttttttt', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(7, 'tessssssst', 'testtttttttttttttt', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(8, 'tessssssssst', 'etetsdgdfsdlfk', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(9, 'askdjkasdsjadskadj', 'kljkfsjkdlfsjdklfsjdf', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(10, 'askdjkasdsjadskadj', 'kljkfsjkdlfsjdklfsjdf', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(11, 'TESTTTTTTTTTT', 'ahsdjsakdadakjsd', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(12, 'Testing123', 'ajsadhsajkdalk', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(13, 'bruh123', 'bruhhhh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(14, 'bruh123', 'bruhhhh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(15, 'bruh123', 'bruhhhh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(16, 'bruh123', 'bruhhhh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(17, 'bruh123', 'bruhhhh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(18, 'bruh123', 'bruhhhh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(19, 'adklaskd', 'kakldlasjdasl', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(20, 'Testinggg', 'test', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(21, 'Testinggg', 'test', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(22, 'Testinggg', 'test', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(23, 'BATYRFUCK', 'BUTTT', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(24, 'Bruhhh9420934', 'ekfjsklgsdlkfg', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(25, 'Bruhhh9420934', 'ekfjsklgsdlkfg', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(26, 'Bruhhh9420934', 'ekfjsklgsdlkfg', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(27, 'Bruhhh9420934', 'ekfjsklgsdlkfg', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(28, 'adklaskd', 'kakldlasjdasl', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(29, 'f8ewqaijfio`', 'fjbjvkbfjakbvjdbvfj', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(30, 'echaushdvuh', 'huidhvupshwduvoh', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(31, 'dhcuhsdiuncuish', 'huvihsudihnvuinuin sun', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(32, 'Testing', 'Test123', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(33, 'bruuuuuuuuuuuuuuuuuuuuuh', 'bruujjjjjjkfndslkfnsd', '2017-02-19', '2017-02-19', 'Civil', 'United Arab Emirates'),
(34, 'testing', 'Testing again', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(35, 'This is a project', 'This is a description of the project', '2017-03-25', '2017-04-01', 'Civil', 'United Arab Emirates'),
(36, 'Test Skills 1', 'Test Skills 1', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(37, 'Test Skills 1', 'Test Skills 1', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(38, 'Testing Skills 2', 'Testing Skills 2', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(39, 'Testing Skills 3', 'Testing Skills 3', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(40, 'Testing Skills 4', 'Testing Skills 4', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(41, 'Testing Skills 5', 'Testing Skills 5', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(42, 'Testing Skills 6', 'Testing Skills 6', '2017-03-24', '2017-03-29', 'Civil', 'United Arab Emirates'),
(43, 'Testing Skills 6', 'Testing Skills 6', '2017-03-24', '2017-03-29', 'Civil', 'United Arab Emirates'),
(44, 'Testing Skills 6', 'Testing Skills 6', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(45, 'Test Skills', 'Test Skills', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates'),
(46, 'Test Skills', 'Test Skills', '2017-03-02', '2017-03-02', 'Civil', 'United Arab Emirates');

-- --------------------------------------------------------

--
-- Table structure for table `projectskillslist`
--

CREATE TABLE `projectskillslist` (
  `projectID` int(11) DEFAULT NULL,
  `skillsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectskillslist`
--

INSERT INTO `projectskillslist` (`projectID`, `skillsID`) VALUES
(1, 2),
(1, 1),
(2, 1),
(2, 4),
(1, 3),
(2, 4),
(15, 9),
(15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `role`, `fname`, `lname`, `password`, `sector`, `location`, `email`) VALUES
('aa395', 'Employee', 'Aliyu', 'Abubakar', 'password', 'Advance Solutions', 'Canada', 'aa395@leidos.com'),
('ab536', 'Employee', 'Anthea', 'Marie', 'anthea', 'Health', 'South Korea', 'ab536@leidos.com'),
('bs234', 'Employee', 'Batyrzhan', 'Saginbek', 'password', 'Civil', 'United Arab Emirates', 'bs234@leidos.com'),
('test1', 'Employee', 'Test', 'Test', 'password', 'Civil', 'United Arab Emirates', 'test@leidos.com'),
('test2', 'Employee', 'Test', 'Test', 'password', 'Civil', 'United Arab Emirates', 'test2@leidos.com'),
('test3', 'Employee', 'Test', 'Test', '123', 'Civil', 'United Arab Emirates', 'test3@leidos.com'),
('test4', 'Employee', 'Test', 'Test', 'test', 'Civil', 'United Arab Emirates', 'test4@leidos.com'),
('wms31', 'Project Manager', 'Syed Waqas', 'Muhammad', 'password', 'Security', 'United Kingdom', 'wms31@leidos.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empskillslist`
--
ALTER TABLE `empskillslist`
  ADD PRIMARY KEY (`skillsID`);

--
-- Indexes for table `empwithskills`
--
ALTER TABLE `empwithskills`
  ADD KEY `empID` (`empID`),
  ADD KEY `skillsID` (`skillsID`);

--
-- Indexes for table `projectemp`
--
ALTER TABLE `projectemp`
  ADD KEY `projectID` (`projectID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `projectskillslist`
--
ALTER TABLE `projectskillslist`
  ADD KEY `projectID` (`projectID`),
  ADD KEY `skillsID` (`skillsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empskillslist`
--
ALTER TABLE `empskillslist`
  MODIFY `skillsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `empwithskills`
--
ALTER TABLE `empwithskills`
  ADD CONSTRAINT `empwithskills_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empwithskills_ibfk_2` FOREIGN KEY (`skillsID`) REFERENCES `empskillslist` (`skillsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectemp`
--
ALTER TABLE `projectemp`
  ADD CONSTRAINT `projectemp_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectemp_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectskillslist`
--
ALTER TABLE `projectskillslist`
  ADD CONSTRAINT `projectskillslist_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectskillslist_ibfk_2` FOREIGN KEY (`skillsID`) REFERENCES `empskillslist` (`skillsID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
