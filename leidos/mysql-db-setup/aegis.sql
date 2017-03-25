-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 01:10 AM
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `projectType` varchar(255) NOT NULL,
  `projLocation` varchar(255) NOT NULL,
  `budget` float(15,2) NOT NULL,
  `completion` enum('Ongoing','Completed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `title`, `description`, `startDate`, `endDate`, `projectType`, `projLocation`, `budget`, `completion`) VALUES
(21, 'This is just a testing project', 'yes yes you update the description yes yes yoo', '2017-03-18', '2017-04-18', 'Civil', 'Spain', 250000.00, 'Ongoing'),
(27, 'Test Users', 'Testtt', '2017-03-19', '2017-03-19', 'Civil', 'Canada', 145.00, 'Ongoing'),
(36, 'Skills Funding Agency Project (SFA)', 'Under this 4-year Solution Development\r\nframework contract with the SFA we provided application design, development\r\nand support services for the Learning Records Service (LRS) application. The\r\nService Layer was developed as a .NET / SQL Server application, to assist the\r\nSFA’s preferred move from the Java / Oracle platform to a .NET / SQL Server\r\ntechnology, web service integration with external stakeholders (including\r\nAwarding Organisations and Ofqual), and usability and user interface\r\nimprovements for Learners and Learning Providers. We also integrated LRS\r\nwith a new data warehouse enabling the SFA to interrogate, analyse and future\r\nmodel the data held within the LRS databases.\r\nSkill-sets utilised over the duration of the project included enterprise architecture\r\nservices, requirements gathering, business analysis, agile development\r\naccompanied by supporting test, documentation, and project management\r\nresources.', '2017-03-22', '2017-04-08', 'Civil', 'United Arab Emirates', 250000.00, 'Ongoing'),
(40, 'Feel The Wave by Talal Shaikh', 'This project is purely dedicated to Mr. Talal Shaikh.', '2017-03-23', '2017-03-23', 'Advance Solutions', 'Canada', 1234567936.00, 'Ongoing'),
(41, 'Party''s', 'Yes it''s a party batchhh - Update', '2017-03-14', '2017-04-27', 'Civil', 'United Arab Emirates', 25000.00, 'Completed'),
(42, 'Office of Rail Regulation (ORR) Business Intelligence (BI) - Data Warehouse & National Rail Trends Portal', 'We worked to identify areas where\r\nworkflows and/or technical processes can be improved or streamlined to reduce\r\nthe administrative burden and further ORR’s ambitions for business intelligence\r\nbest practice. The approach taken to deliver this Best Practice BI Review\r\nthrough the deployment of an experienced, multi-skilled team, with the\r\nnecessary consultancy knowledge and recent, relevant experience in business\r\nanalytics providing flexibility and assurance to ORR.', '2017-03-24', '2017-03-24', 'Civil', 'United Arab Emirates', 1234567936.00, 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `projects_skills`
--

CREATE TABLE `projects_skills` (
  `projectID` int(11) DEFAULT NULL,
  `skillsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_skills`
--

INSERT INTO `projects_skills` (`projectID`, `skillsID`) VALUES
(41, 3),
(41, 7),
(41, 1),
(36, 7),
(36, 4),
(42, 1),
(21, 10),
(21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE `projects_users` (
  `projectID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`projectID`, `userID`) VALUES
(27, 14),
(21, 16),
(27, 14),
(36, 14),
(40, 16),
(41, 16),
(41, 14),
(36, 16),
(21, 14),
(21, 19),
(21, 21),
(36, 22),
(21, 22);

-- --------------------------------------------------------

--
-- Table structure for table `request_temp`
--

CREATE TABLE `request_temp` (
  `projectID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_temp`
--

INSERT INTO `request_temp` (`projectID`, `userID`, `datetime`) VALUES
(42, 14, '0000-00-00 00:00:00'),
(21, 16, '0000-00-00 00:00:00'),
(36, 16, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillsID` int(11) NOT NULL,
  `skillName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillsID`, `skillName`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'LEADERSHIP'),
(5, 'PYTHON'),
(6, 'C#'),
(7, 'C++'),
(8, 'WEB PROGRAMMING'),
(9, 'SQL'),
(10, 'ADOBE PHOTOSHOP'),
(11, 'ILLUSTRATOR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `plocation` varchar(50) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `category` enum('Developer','Sales','Designer','Quality','Management') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `role`, `fname`, `lname`, `password`, `sector`, `location`, `email`, `designation`, `plocation`, `availability`, `picture`, `category`) VALUES
(7, 'admin', 'Admin', 'Admin', 'Admin', '123', 'Civil', 'United Arab Emirates', 'admin@leidos.com', 'Admin', 'United Arab Emirates', 'Unavailable', 'default.jpg', 'Management'),
(14, 'syed123', 'Employee', 'Syed ', 'Waqas', '123', 'Defense', 'United Kingdom', 'sw1@leidos.com', 'Programmer', 'United Kingdom', 'Available', 'default.jpg', 'Developer'),
(16, 'manager', 'Project Manager', 'Anthea', 'Marie', '123', 'Security', 'Canada', 'pm@leidos.com', 'Project Manager', 'Canada', 'Available', 'default.jpg', 'Management'),
(19, 'boss', 'Project Manager', 'Jun Ji', 'Hyun', '123', 'Security', 'Canada', 'boss@leidos.com', 'Creative Content Creator', 'Spain', 'Available', 'default.jpg', 'Management'),
(20, 'kh1', 'Employee', 'Kurt', 'Harem', '123', 'Civil', 'United Arab Emirates', 'kh1@leidos.com', 'Web Developer', '', 'Available', 'default.jpg', 'Developer'),
(21, 'ac1', '', 'Aston', 'Martin', '123', 'Civil', 'Canada', '', 'Graphic Designer', 'Spain', 'Available', 'default.jpg', NULL),
(22, 'sm1', 'Employee', 'Super', 'Man', '123', 'Civil', 'United Arab Emirates', 'sm1@leidos.com', 'Game Programmer', '', 'Available', 'default.jpg', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `users_skills`
--

CREATE TABLE `users_skills` (
  `userID` int(11) DEFAULT NULL,
  `skillsID` int(50) NOT NULL,
  `percentage` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_skills`
--

INSERT INTO `users_skills` (`userID`, `skillsID`, `percentage`) VALUES
(7, 8, 100),
(16, 1, 100),
(14, 1, 100),
(16, 6, 100),
(20, 6, 100),
(20, 8, 100),
(20, 10, 100),
(21, 11, 80),
(21, 10, 100),
(19, 1, 100),
(19, 4, 100),
(19, 11, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD KEY `projectID` (`projectID`),
  ADD KEY `skillsID` (`skillsID`);

--
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD KEY `projectID` (`projectID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `request_temp`
--
ALTER TABLE `request_temp`
  ADD KEY `projectID` (`projectID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD KEY `userID` (`userID`),
  ADD KEY `skillsID` (`skillsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects_skills`
--
ALTER TABLE `projects_skills`
  ADD CONSTRAINT `projects_skills_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_skills_ibfk_2` FOREIGN KEY (`skillsID`) REFERENCES `skills` (`skillsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD CONSTRAINT `projects_users_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_users_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_temp`
--
ALTER TABLE `request_temp`
  ADD CONSTRAINT `request_temp_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `users_skills_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_skills_ibfk_2` FOREIGN KEY (`skillsID`) REFERENCES `skills` (`skillsID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
