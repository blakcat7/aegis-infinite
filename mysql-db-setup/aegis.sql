-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 11:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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

-- --------------------------------------------------------

--
-- Table structure for table `empwithskills`
--

CREATE TABLE `empwithskills` (
  `empID` varchar(10) DEFAULT NULL,
  `skillsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projectemp`
--

CREATE TABLE `projectemp` (
  `projectID` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `skillsRequired` varchar(255) NOT NULL,
  `projectType` varchar(255) NOT NULL,
  `projLocation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `title`, `description`, `startDate`, `endDate`, `skillsRequired`, `projectType`, `projLocation`) VALUES
(1, 'Rocket League Optimization', 'Fix the game lag', '2017-01-18', '2017-04-26', 'Java', 'Advance Solutions', 'United Arab Emirates');

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
('wms31', 'admin', 'Syed', 'Waqas', 'waqas123', 'advance solutions', 'United Arab Emirates', 'waqas_95@live.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empskillslist`
--
ALTER TABLE `empskillslist`
  ADD PRIMARY KEY (`skillsID`);


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
  MODIFY `skillsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `empwithskills`
--
ALTER TABLE `empwithskills`
  ADD CONSTRAINT `empwithskills_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `empwithskills_ibfk_2` FOREIGN KEY (`skillsID`) REFERENCES `empskillslist` (`skillsID`);

--
-- Constraints for table `projectemp`
--
ALTER TABLE `projectemp`
  ADD CONSTRAINT `projectemp_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `projectemp_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
