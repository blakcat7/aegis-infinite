-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 06:08 PM
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
CREATE DATABASE IF NOT EXISTS `aegis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aegis`;

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
  `projLocation` varchar(255) NOT NULL,
  `budget` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `title`, `description`, `startDate`, `endDate`, `projectType`, `projLocation`, `budget`) VALUES
(1, 'Project Testing #1', 'This is a project testing. 1234567890!@#$%^&*()', '2017-03-09', '2017-03-09', 'Civil', 'United Arab Emirates', 5000.00),
(3, 'Project Testing #2', 'Happy Project', '2017-03-11', '2017-03-11', 'Civil', 'United Arab Emirates', 50000.00),
(4, 'Project Testing #3', '', '0000-00-00', '0000-00-00', 'Civil', 'United Arab Emirates', 45.00),
(6, 'Project Testing #4', '', '2017-03-11', '2017-03-11', 'Civil', 'United Arab Emirates', 4554564.00),
(7, 'Project Testing #5', 'akjhalkfhlaksdfdasf', '2017-03-11', '2017-03-11', 'Civil', 'United Arab Emirates', 254465.00),
(8, 'Project Testing #6', '', '0000-00-00', '0000-00-00', 'Civil', 'United Arab Emirates', 0.00),
(9, 'Parameters A', '', '0000-00-00', '0000-00-00', 'Civil', 'United Arab Emirates', 0.00),
(10, 'Project - Admin Version', 'Project Admin', '2017-03-12', '2017-03-12', 'Civil', 'United Arab Emirates', 545312.00),
(11, 'Blahhhhh', '', '0000-00-00', '0000-00-00', 'Civil', 'United Arab Emirates', 0.00),
(12, 'Project Test 121432', '', '0000-00-00', '0000-00-00', 'Civil', 'United Arab Emirates', 0.00),
(13, 'TESTINGGG', '', '0000-00-00', '0000-00-00', 'Civil', 'United Arab Emirates', 0.00),
(14, 'Add Project', '', '2017-03-13', '2017-03-13', 'Civil', 'United Arab Emirates', 0.00);

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
(1, 1),
(3, 1),
(3, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 4),
(9, 7),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE `projects_users` (
  `projectID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_temp`
--

CREATE TABLE `request_temp` (
  `projectID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'SQL');

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
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `role`, `fname`, `lname`, `password`, `sector`, `location`, `email`, `designation`, `plocation`, `availability`, `picture`) VALUES
(7, 'admin', 'Admin', 'Admin', 'Admin', '123', 'Civil', 'United Arab Emirates', 'admin@leidos.com', 'Admin', '', '', 'default.jpg'),
(14, 'syed123', 'Employee', 'Syed ', 'Waqas', '123', 'Civil', 'United Kingdom', 'syed@leidos.com', 'Programmer', 'South Korea', 'Available', 'default.jpg');

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
(14, 8, 90),
(14, 8, 90),
(14, 8, 90);

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
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
-- Constraints for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `users_skills_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `cias`
--
CREATE DATABASE IF NOT EXISTS `cias` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cias`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `itemId` int(11) NOT NULL,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDesc` text COMMENT 'content or description',
  `itemImage` varchar(80) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@codeinsect.com', '$2y$10$IFDU.XIGMTB8LvEG1mRAw.mvbpmTRI2bIBNfeGvWfuxEXyEspVpNW', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2016-12-09 17:52:50'),
(2, 'manager@codeinsect.com', '$2y$10$quODe6vkNma30rcxbAHbYuKYAZQqUaflBgc4YpV9/90ywd.5Koklm', 'Manager', '9890098900', 2, 1, 1, '2016-12-09 17:49:56', 1, '2017-01-22 10:31:52'),
(3, 'employee@codeinsect.com', '$2y$10$M3ttjnzOV2lZSigBtP0NxuCtKRte70nc8TY5vIczYAQvfG/8syRze', 'Employee', '9890098900', 3, 0, 1, '2016-12-09 17:50:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;--
-- Database: `cisock`
--
CREATE DATABASE IF NOT EXISTS `cisock` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cisock`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `userId` varchar(45) DEFAULT NULL,
  `body` varchar(320) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `teamId` int(11) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `avatar`, `tagline`, `teamId`, `isAdmin`) VALUES
(1, 'admin@example.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 'Schmadmin', 'assassin_avatar', 'They see me mowin...<br/>...my front lawn.', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `r_rcode` varchar(50) NOT NULL,
  `r_mcode` varchar(50) NOT NULL,
  `create` varchar(5) NOT NULL,
  `edit` varchar(5) NOT NULL,
  `delete` varchar(5) NOT NULL,
  `view` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rcode` varchar(50) NOT NULL,
  `rname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rcode`, `rname`) VALUES
('Admin', 'Administrator'),
('Emp', 'Employee'),
('PrjM', 'Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `u_rcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `u_rcode`) VALUES
(1, 'waqas', '123', 'Admin'),
(2, 'anthea', '123', 'Admin'),
(3, 'batyrz', '123', 'PrjM'),
(4, 'rizvi', '123', 'Emp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD KEY `r_rcode` (`r_rcode`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rcode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_rcode` (`u_rcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`r_rcode`) REFERENCES `role` (`rcode`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`u_rcode`) REFERENCES `role` (`rcode`) ON UPDATE CASCADE;
--
-- Database: `eduscope`
--
CREATE DATABASE IF NOT EXISTS `eduscope` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eduscope`;

-- --------------------------------------------------------

--
-- Table structure for table `case_studies`
--

CREATE TABLE `case_studies` (
  `id` int(11) NOT NULL,
  `fk_job_id` int(11) NOT NULL,
  `fk_qualification_id` int(11) NOT NULL,
  `employer` text NOT NULL,
  `location` text NOT NULL,
  `salary` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_studies`
--

INSERT INTO `case_studies` (`id`, `fk_job_id`, `fk_qualification_id`, `employer`, `location`, `salary`) VALUES
(1, 109, 74, 'Scottish Government', 'Edinburgh', '16500'),
(2, 36, 78, 'Clinton House Nursing Home', 'South Lanarkashire', '14000'),
(3, 44, 109, 'Elipse', 'London', '26000'),
(4, 105, 109, 'Royal London Group', 'Edinburgh', '29000'),
(5, 93, 78, 'Pro-Partnership LLC', 'Qatar', '16500'),
(6, 66, 117, 'LabTech Services Ltd', 'Aberdeen', '17000'),
(7, 97, 78, 'RBS Group', 'Edinburgh', '16000'),
(8, 18, 22, 'Blanknyc', 'USA', '27000'),
(9, 27, 68, 'Charles River Laboratories', 'Tranent', '13000'),
(10, 11, 74, 'AXA Corporate Solutions', 'London', '27000'),
(11, 77, 265, 'Nature Power Consultants', 'Stirling', '25000'),
(12, 47, 59, 'Expro', 'Stirling', '32000'),
(13, 69, 58, 'Lloyds Banking Group', 'Edinburgh', '14000'),
(14, 57, 74, 'IHG', 'Edinburgh', '14000'),
(15, 113, 68, 'Spirit Co', 'Edinburgh', '14000'),
(16, 59, 117, 'Ingenico', 'Dalgety Bay', '54000'),
(17, 89, 59, 'Petrofac', 'Shetland', '32000'),
(18, 25, 73, 'Capital Stockworks Limited', 'Fife', '55000'),
(19, 117, 68, 'Welcome Trust and NHS Lothian', 'Edinburgh', '16000'),
(20, 104, 58, 'Royal Bank of Scotland', 'Edinburgh', '17000'),
(21, 48, 59, 'Exxon Mobil', 'Southampton', '38000'),
(22, 14, 74, 'Bank of Scotland', 'Edinburgh', '15000'),
(23, 8, 78, 'ASDA', 'Paisley', '10000'),
(24, 39, 78, 'Decathlon UK', 'Glasgow', '18000'),
(25, 54, 79, 'Heineken UK', 'Edinburgh', '24000'),
(26, 72, 59, 'MacTaggart Scott', 'Edinburgh', '28000'),
(27, 52, 81, 'Heathrow Airport Limited', 'London', '28000'),
(28, 34, 59, 'Chevron North Sea', 'Aberdeen', '36000'),
(29, 82, 241, 'North Sea Well Engineering Ltd', 'Aberdeen', '25000'),
(30, 83, 241, 'Norwell Engineering', 'Aberdeen', '20000'),
(31, 63, 117, 'Jiangsheng School', 'China', '16000'),
(32, 67, 58, 'Legatesden Farm', 'Aberdeenshire', '24000'),
(33, 13, 59, 'Baker Hughes', 'Aberdeen', '26000'),
(34, 13, 59, 'GyroData', 'Aberdeen', '35000'),
(35, 13, 59, 'Schlumberger', 'Aberdeen', '35000'),
(36, 13, 59, 'Schlumberger D&M', 'Aberdeen', '28500'),
(37, 37, 73, 'Cooper Software Ltd', 'Dunfermline', '41000'),
(38, 7, 59, 'ASDA', 'Edinburgh', '13000'),
(39, 87, 81, 'PDI Limited', 'Aberdeen', '24000'),
(40, 15, 59, 'Bibby Offshore', 'Aberdeen', '10000'),
(41, 58, 78, 'INEOS', 'Grangemouth', '29000'),
(42, 38, 71, 'Cristal', 'Stallingborough', '30000'),
(43, 6, 81, 'Arup', 'South Queensferry', '24000'),
(44, 76, 81, 'Mott MacDonald', 'Hinkley', '25000'),
(45, 53, 78, 'Heatric - Division of Meggitt', 'Holton Heath', '27500'),
(46, 122, 73, 'Zonal Retail Data Systems', 'Edinburgh', '23000'),
(47, 110, 265, 'Scottish Water', 'Glasgow', '23000'),
(48, 42, 59, 'Edwards Vacuum', 'Burgess Hill', '28000'),
(49, 42, 59, 'EKES', 'Eask Kilbride', '21000'),
(50, 42, 59, 'FMC Technologies', 'Dunfermline', '28000'),
(51, 114, 81, 'Subsea 7', 'Aberdeen', '30000'),
(52, 114, 81, 'WSP Group', 'Edinburgh', '23000'),
(53, 28, 78, 'Chevron', 'Aberdeen', '27100'),
(54, 32, 59, 'Chevron Europe', 'Aberdeen', '36000'),
(55, 32, 81, 'Jacobs UK Ltd', 'Glasgow', '24000'),
(56, 3, 59, 'Aker Solutions', 'Aberdeen', '30000'),
(57, 3, 59, 'Rolls Royce', 'Birmingham', '27000'),
(58, 4, 59, 'AMEC', 'Aberdeen', '35000'),
(59, 4, 59, 'AMEC', 'Aberdeen', '30000'),
(60, 24, 81, 'Cape plc', 'Middlesex', '24000'),
(61, 98, 74, 'RDF Oil', 'London', '30000'),
(62, 60, 78, 'Institute of Occupational Medicine', 'Edinburgh', '19000'),
(63, 80, 74, 'NHS', 'Edinburgh', '22000'),
(64, 103, 59, 'Rolls-Royce plc', 'Derby', '26000'),
(65, 112, 79, 'Sir Robert McAlpine', 'Edinburgh', '16500'),
(66, 120, 59, 'Wood Group Kenny', 'Glasgow', '27000'),
(67, 116, 73, 'TSB', 'Edinburgh', '18000'),
(68, 2, 72, 'Agile Solutions', 'Glasgow', '20000'),
(69, 68, 73, 'Lloyd''s Banking Group', 'Edinburgh', '25000'),
(70, 70, 74, 'Lloyds Banking Group', 'London', '25000'),
(71, 19, 73, 'Blazing Griffin', 'Edinburgh', '20000'),
(72, 118, 59, 'WFF Technologies', 'Livingston', '18000'),
(73, 12, 59, 'Baker Hughes', 'Aberdeen', '38000'),
(74, 9, 74, 'ASDA', 'Edinburgh', '24000'),
(75, 64, 79, 'K2 Marketing Solutions Ltd', 'Kirkcaldy', '15000'),
(76, 108, 59, 'Science & Technology Facilities Council - RAL Space', 'Didcot', '23000'),
(77, 88, 59, 'Petrofac', 'Works offshore', '33000'),
(78, 94, 68, 'Quintiles', 'Livingston', '17500'),
(79, 85, 78, 'Nuclear Graduates', 'Sellafield', '25000'),
(80, 101, 58, 'Risktec Solutions', 'Glasgow', '28000'),
(81, 61, 58, 'Intertek Testing Services', 'Aberdeen', '25000'),
(82, 17, 74, 'BlackRock', 'Edinburgh', '24000'),
(83, 65, 109, 'KPMG', 'Edinburgh', '26000'),
(84, 21, 241, 'BP', 'Aberdeen', '37000'),
(85, 21, 241, 'BP', 'Egypt', '50000'),
(86, 21, 241, 'Chevron', 'Aberdeen', '36500'),
(87, 21, 241, 'Chevron', 'Aberdeen', '37000'),
(88, 21, 241, 'Chevron Limited', 'Aberdeen', '60000'),
(89, 21, 241, 'Maersk Oil', 'Fife', '70000'),
(90, 21, 241, 'Petroleum Experts', 'Edinburgh', '42000'),
(91, 91, 72, 'Police Scotland', 'Edinburgh', '25000'),
(92, 95, 68, 'Quintiles', 'Livingston', '18000'),
(93, 16, 59, 'Bifab', 'Kirkcaldy', '16000'),
(94, 16, 265, 'Logan Energy Ltd', 'Edinburgh', '24000'),
(95, 16, 265, 'REpower UK', 'Edinburgh', '25000'),
(96, 92, 71, 'Polymer Logistics Scotland', 'Grangemouth', '22000'),
(97, 86, 265, 'Orenda', 'Ayrshire', '35000'),
(98, 96, 68, 'Randox', 'Crumlin', '19000'),
(99, 78, 241, 'Nexen', 'Aberdeen', '65000'),
(100, 78, 241, 'Nexen', 'Uxbridge', '40000'),
(101, 50, 78, 'Greaves Sports', 'Glasgow', '15000'),
(102, 23, 241, 'Cameron', 'Sunbury', '40000'),
(103, 74, 74, 'Maplin Electronics Ltd', 'Liverpool', '7000'),
(104, 45, 78, 'Ellis Brigham Mountain Sports', 'Renfrewshire', '11400'),
(105, 111, 73, 'Simul8', 'Glasgow', '24000'),
(106, 40, 73, 'Edesix Ltd', 'Edinburgh', '26000'),
(107, 40, 73, 'NS Tech', 'Edinburgh', '21000'),
(108, 119, 73, 'Widgit Software, Symbols Worldwide Ltd', 'Cubbington', '22000'),
(109, 56, 78, 'Heriot-Watt University', 'Edinburgh', '6000'),
(110, 1, 78, 'Aberdeen City Council', 'Aberdeen', '22000'),
(111, 55, 74, 'Heriot Watt Sports Union', 'Edinburgh', '17000'),
(112, 31, 59, 'Chevron (NorthSea Ltd)', 'Aberdeen', '45000'),
(113, 35, 78, 'City of Edinburgh Council', 'Edinburgh', '7500'),
(114, 26, 58, 'Carr Gomm', 'Edinburgh', '13000'),
(115, 75, 71, 'Morrisons M Local', 'Edinburgh', '6000'),
(116, 81, 78, 'NHS Fife', 'St Andrews', '9000'),
(117, 20, 74, 'Bout Pomeroy Chartered Accountants', 'Ireland', '20000'),
(118, 10, 74, 'Audit Scotland', 'Edinburgh', '19000'),
(119, 46, 59, 'Ensco plc', 'Aberdeen', '35000'),
(120, 41, 59, 'Edinburgh Airport', 'Edinburgh', '19000'),
(121, 115, 22, 'Top Shop', 'Edinburgh', '12000'),
(122, 100, 265, 'RES Ltd', 'Glasgow', '24750');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext,
  `fk_subject_id` int(11) NOT NULL,
  `est_salary` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `fk_subject_id`, `est_salary`) VALUES
(1, 'Sports Development Officer', NULL, 23, '22000'),
(2, 'IT Consultant', NULL, 9, '20000'),
(3, 'Graduate Mechanical Engineer', NULL, 19, '30000'),
(4, 'Graduate Piping Engineer', NULL, 19, '35000'),
(6, 'Graduate Civil Engineer', NULL, 8, '24000'),
(7, 'General Assistant', NULL, 19, '13000'),
(8, 'Delivery Driver', NULL, 23, '10000'),
(9, 'Manager', NULL, 18, '24000'),
(10, 'Trainee Auditor', NULL, 18, '19000'),
(11, 'Assistant Underwriter', NULL, 18, '27000'),
(12, 'LWD/MWD Field Engineer', NULL, 19, '38000'),
(13, 'Field Engineer', NULL, 19, '26000'),
(14, 'Customer Adviser', NULL, 18, '15000'),
(15, 'Graduate Asset Management Engineer', NULL, 19, '10000'),
(16, 'Project Engineer', NULL, 19, '16000'),
(17, 'Pension & Investments Analyst', NULL, 18, '24000'),
(18, 'Assistant Designer for Menswear', NULL, 2, '27000'),
(19, 'Junior Developer', NULL, 9, '20000'),
(20, 'Trainee Accountant', NULL, 18, '20000'),
(21, 'Petroleum Engineer', NULL, 25, '37000'),
(23, 'Sales & Marketing Analyst', NULL, 25, '40000'),
(24, 'Graduate Project Manager', NULL, 8, '24000'),
(25, 'Chief Technology Officer', NULL, 9, '55000'),
(26, 'Support Worker', NULL, 6, '13000'),
(27, 'Assistant Pathelogy Technician', NULL, 27, '13000'),
(28, 'Graduate Facilities Engineer', NULL, 6, '27100'),
(31, 'Subsea Engineer', NULL, 19, '45000'),
(32, 'Graduate Facilities Engineer', NULL, 19, '36000'),
(34, 'Drilling and Completions Engineer', NULL, 19, '36000'),
(35, 'Support Assistant', NULL, 23, '7500'),
(36, 'Activities Coordinator', NULL, 23, '14000'),
(37, 'Finance Controller', NULL, 9, '41000'),
(38, 'Graduate Chemist', NULL, 7, '30000'),
(39, 'Department Manager', NULL, 23, '18000'),
(40, 'Software Engineer', NULL, 9, '26000'),
(41, 'Turnaround Coordinator', NULL, 19, '19000'),
(42, 'Graduate Engineer', NULL, 19, '28000'),
(44, 'Actuarial Analyst', NULL, 18, '26000'),
(45, 'Sales Assistant', NULL, 23, '11400'),
(46, 'Trainee Engineer', NULL, 19, '35000'),
(47, 'Associate Engineer', NULL, 19, '32000'),
(48, 'Cost and Schedule Engineer', NULL, 19, '38000'),
(50, 'Retail Assistant', NULL, 23, '15000'),
(52, 'Development Graduate', NULL, 8, '28000'),
(53, 'Graduate Design Engineer', NULL, 6, '27500'),
(54, 'Deployment Planner', NULL, 5, '24000'),
(55, 'Sports Union President', NULL, 18, '17000'),
(56, 'Sports Centre Assistant', NULL, 23, '6000'),
(57, 'Bar Manager', NULL, 18, '14000'),
(58, 'Graduate Chemical Engineer', NULL, 6, '29000'),
(59, 'Business Solutions Manager', NULL, 22, '54000'),
(60, 'Graduate Scientist', NULL, 23, '19000'),
(61, 'Offshore Chemist', NULL, 6, '25000'),
(62, 'Graduate Highways Engineer', NULL, 8, '24000'),
(63, 'ESL Teacher', NULL, 22, '16000'),
(64, 'Marketing Assistant', NULL, 5, '15000'),
(65, 'Pensions Actuary Trainee', NULL, 18, '26000'),
(66, 'Administrator', NULL, 22, '17000'),
(67, 'Farmer', NULL, 6, '24000'),
(68, 'IT Trainee', NULL, 9, '25000'),
(69, 'Auditor', NULL, 6, '14000'),
(70, 'IT Trainee', NULL, 18, '25000'),
(72, 'Design Engineer', NULL, 19, '28000'),
(74, 'Sales Adviser', NULL, 18, '7000'),
(75, 'Team Member', NULL, 7, '6000'),
(76, 'Graduate Civil Engineer', NULL, 8, '25000'),
(77, 'Assistant Wind Analyst', NULL, 19, '25000'),
(78, 'Reservoir Engineer', NULL, 25, '65000'),
(80, 'Graduate Statistician', NULL, 18, '22000'),
(81, 'Technical Instructor - Pulmonary Rehabilitation', NULL, 23, '9000'),
(82, 'Drilling Engineer', NULL, 25, '25000'),
(83, 'Drilling Engineer', NULL, 25, '20000'),
(85, 'Nuclear Graduate', NULL, 6, '25000'),
(86, 'Renewables Assistant', NULL, 19, '35000'),
(87, 'Graduate Analyst', NULL, 8, '24000'),
(88, 'Mechanical Technical Clerk', NULL, 19, '33000'),
(89, 'Chemical Clerk', NULL, 19, '32000'),
(91, 'Police Officer', NULL, 9, '25000'),
(92, 'QHSE Trainee', NULL, 7, '22000'),
(93, 'Administrative Assistant', NULL, 5, '16500'),
(94, 'Medical Laboratory Assistant', NULL, 27, '17500'),
(95, 'Project Coordinator', NULL, 27, '18000'),
(96, 'Research & Development Scientist', NULL, 27, '19000'),
(97, 'Administrator', NULL, 5, '16000'),
(98, 'Graduate Project Services Engineer', NULL, 18, '30000'),
(100, 'Wind Resource Analyst', NULL, 19, '24750'),
(101, 'Nuclear Safety Engineer', NULL, 6, '28000'),
(103, 'Graduate Trainee Engineer', NULL, 19, '26000'),
(104, 'Corporate Banking Administrion', NULL, 6, '17000'),
(105, 'Actuarial Trainee', NULL, 18, '29000'),
(108, 'Mechanical Engineer', NULL, 19, '23000'),
(109, 'A3 Case Worker', NULL, 18, '16500'),
(110, 'Graduate Energy Specialist', NULL, 19, '23000'),
(111, 'Software Developer', NULL, 9, '24000'),
(112, 'Health and Safety Administration Assistant', NULL, 5, '16500'),
(113, 'Bar Superviser', NULL, 27, '14000'),
(114, 'Graduate Engineer', NULL, 8, '30000'),
(115, 'Visual Merchandiser', NULL, 2, '12000'),
(116, 'Internet Adviser', NULL, 9, '18000'),
(117, 'Clinical Measurement Technician', NULL, 27, '16000'),
(118, 'Junior Mechanical Engineer', NULL, 19, '18000'),
(119, 'Software Test Engineer', NULL, 9, '22000'),
(120, 'Integrity Engineer', NULL, 19, '27000'),
(122, 'Graduate Developer', NULL, 9, '23000'),
(124, 'Account Man', 'count money', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(11) NOT NULL,
  `name` varchar(124) DEFAULT NULL,
  `short_title` varchar(32) DEFAULT NULL,
  `type` text NOT NULL,
  `fk_subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `short_title`, `type`, `fk_subject_id`) VALUES
(1, 'Bachelor of Arts in Interior Design', 'BA (Hons) Interior Design', 'Bachelors', 2),
(2, 'Bachelor of Arts in Accountancy and Finance', 'BA Acc & Fin (Dubai)', 'Bachelors', 1),
(3, 'Bachelor of Arts in Accounting and Business Finance', 'BA Acc and Bus Fin', 'Bachelors', 1),
(4, 'Bachelor of Arts in Accountancy', 'BA Accountancy', 'Bachelors', 1),
(5, 'Bachelor of Arts in Accountancy and Finance', 'BA Accountancy & Finance', 'Bachelors', 1),
(6, 'Bachelor of Arts in Accountancy and Finance', 'BA Accountancy & Finance', 'Bachelors', 1),
(7, 'Bachelor of Arts in Accountancy and Finance', 'BA Accountancy & Finance', 'Bachelors', 1),
(8, 'Bachelor of Arts in Accountancy and Business Law', 'BA Acct & Bus Law', 'Bachelors', 1),
(9, 'Bachelor of Arts in Applied Languages and Translating', 'BA App Languages & Trans', 'Bachelors', 26),
(10, 'Bachelor of Arts in Architecture', 'BA Architecture', 'Bachelors', 4),
(11, 'Bachelor of Arts in Architecture', 'BA Architecture', 'Bachelors', 4),
(12, 'Bachelor of Arts in British Sign Language (Interpreting, Translating and Applied Language Studies)', 'BA BSL (Int, Trans & ALS)', 'Bachelors', 26),
(13, 'Bachelor of Arts in Business and Finance', 'BA Bus & Fin (Dubai)', 'Bachelors', 1),
(14, 'Bachelor of Arts in Business and Finance', 'BA Bus & Finance', 'Bachelors', 1),
(15, 'Bachelor of Arts in Business Management with Industrial Experience', 'BA Bus Mgt w Ind Exp', 'Bachelors', 1),
(16, 'Bachelor of Arts in Business Management with Industrial Experience', 'BA Bus Mgt w Ind Exp', 'Bachelors', 1),
(17, 'Bachelor of Arts in Business and Finance', 'BA Business & Finance', 'Bachelors', 1),
(18, 'Bachelor of Arts in Business and Finance', 'BA Business and Finance', 'Bachelors', 1),
(19, 'Bachelor of Arts in Business and Economics', 'BA Business Economics', 'Bachelors', 10),
(20, 'Bachelor of Arts in Business Management', 'BA Business Management', 'Bachelors', 1),
(21, 'Bachelor of Arts in Business Management', 'BA Business Mgmt', 'Bachelors', 1),
(22, 'Bachelor of Arts in Fashion Design for Industry', 'BA Fashion Design for Industry', 'Bachelors', 2),
(23, 'Bachelor of Arts in Fashion Design for Industry', 'BA Fashion Design for Industry', 'Bachelors', 2),
(24, 'Bachelor of Arts in Fashion Marketing and Retailing', 'BA Fashion Mkting & Retailing', 'Bachelors', 2),
(25, 'Bachelor of Arts in Finance and Business Law', 'BA Finance & Business Law', 'Bachelors', 17),
(26, 'Bachelor of Arts in French and Applied Language Studies', 'BA French and App Lang Stud', 'Bachelors', 26),
(27, 'Bachelor of Arts in German and Applied Language Studies', 'BA German and App Lang Stud', 'Bachelors', 26),
(28, 'Bachelor of Arts in Hospitality and Tourism Management', 'BA Hospitality & Tourism Mgt', 'Bachelors', 2),
(29, 'Bachelor of Arts in Accountancy', 'BA in Accountancy', 'Bachelors', 1),
(30, 'Bachelor of Arts in Business and Accounting', 'BA in Business & Accounting', 'Bachelors', 1),
(31, 'Bachelor of Arts in Economics', 'BA in Economics', 'Bachelors', 10),
(32, 'Bachelor of Arts in Fashion', 'BA in Fashion', 'Bachelors', 2),
(33, 'Bachelor of Arts in Fashion Communication', 'BA in Fashion Communication', 'Bachelors', 2),
(34, 'Bachelor of Arts in Fashion Design', 'BA in Fashion Design', 'Bachelors', 2),
(35, 'Bachelor of Arts in Fashion Menswear', 'BA in Fashion Menswear', 'Bachelors', 2),
(36, 'Bachelor of Arts in Fashion Marketing and Retailing', 'BA in Fashion Mkting&Retailing', 'Bachelors', 2),
(37, 'Bachelor of Arts in Fashion Womenswear', 'BA in Fashion Womenswear', 'Bachelors', 2),
(38, 'Bachelor of Arts in Foreign Languages and Teaching English to Speakers of Other Languages', 'BA in Foreign Langs & TESOL', 'Bachelors', 26),
(39, 'Bachelor of Arts in Interior Design', 'BA in Interior Design (ord)', 'Bachelors', 2),
(40, 'Bachelor of Arts in International Management', 'BA in International Mgt', 'Bachelors', 1),
(41, 'Bachelor of Arts in Management', 'BA in Management', 'Bachelors', 1),
(42, 'Bachelor of Arts in International Business Management and Languages', 'BA Int Bus Mgt & Languages', 'Bachelors', 1),
(43, 'Bachelor of Arts in International Fashion Retailing', 'BA Int Fash Retailing', 'Bachelors', 2),
(44, 'Bachelor of Arts in International Management and Languages', 'BA International Man & Lang', 'Bachelors', 26),
(45, 'Bachelor of Arts in Languages (Interpreting and Translating)', 'BA Languages (Inter & Trans)', 'Bachelors', 26),
(46, 'Bachelor of Arts in Management and Psychology', 'BA Mgt and Psychology', 'Bachelors', 22),
(47, 'Bachelor of Arts in Psychology', 'BA Psychology', 'Bachelors', 22),
(48, 'Bachelor of Arts in Spanish and Applied Language Studies', 'BA Spanish and App Lang Stud', 'Bachelors', 26),
(49, 'Bachelor of Business Administration', 'Bach of Business Admin', 'Bachelors', 5),
(50, 'Bachelor of Business Administration (Accountancy and Finance)', 'BBA (A and F)', 'Bachelors', 1),
(51, 'Bachelor of Business Administration with Information Technology', 'BBA with Information Tech', 'Bachelors', 11),
(52, 'Bachelor of Engineering in Chemical Engineering', 'BEng Chem Eng', 'Bachelors', 6),
(53, 'Bachelor of Engineering in Chemical Engineering with Pharmaceutical Chemistry', 'BEng Chemical Eng w Pharm Chem', 'Bachelors', 6),
(54, 'Bachelor of Engineering in Civil and Environmental Engineering', 'BEng Civil & Environ Eng', 'Bachelors', 8),
(55, 'Bachelor of Engineering in Computing and Electronics', 'BEng Computing & Electronics', 'Bachelors', 11),
(56, 'Bachelor of Engineering in Electrical and Electronic Engineering (Computer and Internet Engineering)', 'BEng Elec & Elec Eng (CIE)', 'Bachelors', 11),
(57, 'Bachelor of Engineering in Electrical and Electronic Engineering', 'BEng Electrical & Electron Eng', 'Bachelors', 11),
(58, 'Bachelor of Engineering in Chemical Engineering', 'BEng in Chemical Engineering', 'Bachelors', 6),
(59, 'Bachelor of Engineering in Mechanical Engineering', 'BEng Mech Eng', 'Bachelors', 19),
(60, 'Bachelor of Engineering in Mechanical Engineering and Energy Engineering', 'BEng Mech Eng & Energy E', 'Bachelors', 19),
(61, 'Bachelor of Engineering in Petroleum Engineering', 'BEng Petroleum Engineering', 'Bachelors', 25),
(62, 'BEng (Ord) Robotics and Cybertronics', 'BEng Robot & Cyber', 'Bachelors', 11),
(63, 'Bachelor of Engineering in Robotics, Autonomous and Interactive Systems', 'BEng Robotic Auton & Inter Sys', 'Bachelors', 11),
(64, 'Bachelor of Engineering in Robotics, Sensing and Automation', 'BEng Robotics, Sensing & Autom', 'Bachelors', 11),
(65, 'Bachelor of Engineering in Structural Engineering with Architectural Design', 'BEng Struct Eng w Archit Des', 'Bachelors', 4),
(66, 'Bachelor of Science in Architectural Engineering', 'BSc Architectural Eng', 'Bachelors', 4),
(67, 'Bachelor of Science in Biological Sciences (Food and Beverage Science)', 'BSc Bio Sc (Food & Bev Sc)', 'Bachelors', 27),
(68, 'Bachelor of Science in Biological Sciences', 'BSc Bio Sciences', 'Bachelors', 27),
(69, 'Bachelor of Science in Biochemistry', 'BSc Biochemistry', 'Bachelors', 27),
(70, 'Bachelor of Science in Biological Sciences (Cell and Molecular Biology)', 'BSc Biological Sc (CMB)', 'Bachelors', 27),
(71, 'Bachelor of Science in Mathematics with Professional Education', 'BSc Maths with Prof Education', 'Bachelors', 18),
(72, 'Bachelor of Science in Microbiology', 'BSc Microbiology', 'Bachelors', 27),
(73, 'Master of Engineering in Petroleum Engineering', 'MEng Petroleum Engineering', 'Masters', 25),
(74, 'Master of Engineering in Robotics, Autonomous and Interactive Systems', 'MEng Robotic Auton & Inter Sys', 'Masters', 11),
(75, 'Master of Engineering in Robotics and Cybertronics', 'MEng Robotics & Cybertronics', 'Masters', 11),
(76, 'Master of Engineering in Robotics, Sensing and Automation', 'MEng Robotics, Sensing & Autom', 'Masters', 11),
(77, 'Master of Engineering in Software Engineering', 'MEng Software Engineering', 'Masters', 9),
(78, 'Master of Philosophy', 'MPhil (Acc & Finance)', 'Masters', 1),
(79, 'Master of Philosophy', 'MPhil (Actuarial Maths)', 'Masters', 18),
(80, 'Master of Philosophy', 'MPhil (Applied Geoscience)', 'Masters', 21),
(81, 'Master of Philosophy', 'MPhil (Architectural Eng)', 'Masters', 8),
(82, 'Master of Philosophy', 'MPhil (Chemical)', 'Masters', 7),
(83, 'Master of Philosophy', 'MPhil (Chemistry)', 'Masters', 7),
(84, 'Master of Philosophy', 'MPhil (Civil)', 'Masters', 8),
(85, 'Master of Philosophy', 'MPhil (Computer Science)', 'Masters', 9),
(86, 'Master of Philosophy', 'MPhil (Const)', 'Masters', 2),
(87, 'Master of Philosophy', 'MPhil (Economics)', 'Masters', 10),
(88, 'Master of Philosophy', 'MPhil (Electrical)', 'Masters', 11),
(89, 'Master of Philosophy', 'MPhil (Environment)', 'Masters', 10),
(90, 'Master of Philosophy', 'MPhil (Food Science)', 'Masters', 12),
(91, 'Master of Philosophy', 'MPhil (Languages)', 'Masters', 26),
(92, 'Master of Philosophy', 'MPhil (Mathematics)', 'Masters', 18),
(93, 'Master of Philosophy', 'MPhil (Petroleum Engineering)', 'Masters', 25),
(94, 'Master of Philosophy', 'MPhil (Physics)', 'Masters', 20),
(95, 'Master of Philosophy', 'MPhil (Psychology)', 'Masters', 22),
(96, 'Master of Physics in Engineering Physics', 'MPhys Engineering Physics', 'Masters', 20),
(97, 'Master of Physics in Physics', 'MPhys in Physics', 'Masters', 20),
(98, 'Master of Science in Accounting', 'MSc Accounting', 'Masters', 1),
(99, 'Master of Science in Actuarial Management', 'MSc Actuarial Management', 'Masters', 18),
(100, 'Master of Science in Actuarial Science and Management', 'MSc Actuarial Sci and Man', 'Masters', 18),
(101, 'Master of Science in Arabic-English Translating', 'MSc Arabic-Eng Translating', 'Masters', 26),
(102, 'Master of Science in Architectural Project Management', 'MSc Archit Project Mgt', 'Masters', 8),
(103, 'Master of Science in Architectural Facilities Management', 'MSc Architect Fac Mgt', 'Masters', 8),
(104, 'Master of Science in Architectural Engineering', 'MSc Architectural Eng', 'Masters', 8),
(105, 'Master of Science in Arabic-English Translation and Computer-Assisted Translation Tools', 'MSc Ar-Eng Tran & Comp A T T', 'Masters', 26),
(106, 'Master of Science in Artificial Intelligence with Speech and Multimodal Interaction', 'MSc Art Intell with SMI', 'Masters', 9),
(107, 'Master of Science in Artificial Intelligence', 'MSc Artificial Intelligence', 'Masters', 9),
(108, 'Master of Science in Chinese-English Translating and Conference Interpreting', 'MSc C-E Tran & Conf Int (2yr)', 'Masters', 26),
(109, 'Master of Science in Chinese-English Translating', 'MSc Chinese-Eng Translating', 'Masters', 26),
(110, 'Master of Science in Chemical Innovation and Regulation (Erasmus Mundus) (ChIR)', 'MSc ChIR (Erasmus Mundus)', 'Masters', 8),
(111, 'Master of Science in Civil Engineering and Construction Management', 'MSc Civil Eng & Constr Mgt', 'Masters', 8),
(112, 'Master of Science in Civil Engineering', 'MSc Civil Engineering', 'Masters', 8),
(113, 'Master of Science in Climate Change: Impacts and Mitigation', 'MSc Climate Change: IM', 'Masters', 21),
(114, 'Master of Science in Computational Biology', 'MSc Computational Biology', 'Masters', 27),
(115, 'Master of Science in Computational Mathematics', 'MSc Computational Maths', 'Masters', 18),
(116, 'Master of Science in Computer Services Management', 'MSc Computer Services Mgt', 'Masters', 9),
(117, 'Master of Science in Computer Systems Management', 'MSc Computer Systems Mgt', 'Masters', 9),
(118, 'Master of Science in Computing', 'MSc Computing', 'Masters', 9),
(119, 'Master of Science in Construction Project Management', 'MSc Con Proj Man WB', 'Masters', 8),
(120, 'MSc Concrete Enginering', 'MSc Concrete Enginering', 'Masters', 8),
(121, 'Master of Science in Construction Management (Project Management)', 'MSc Const Man (Proj)', 'Masters', 8),
(122, 'Master of Science in Construction Financial Management', 'MSc Constr Fin Mgt', 'Masters', 1),
(123, 'Master of Science in Construction Project Management', 'MSc Constr Project Mgt', 'Masters', 5),
(124, 'Master of Science in Creative Software Systems', 'MSc Creative Software Sys', 'Masters', 9),
(125, 'Master of Science in Cultural Resource Management', 'MSc Cultural Resource Mgt', 'Masters', 2),
(126, 'Master of Science in e-Commerce', 'MSc e-Commerce', 'Masters', 5),
(127, 'Master of Science in Economics, Banking and Finance', 'MSc Econ, Banking & Finance', 'Masters', 10),
(128, 'Master of Science in Embedded Systems Engineering', 'MSc Embedded Sys Eng', 'Masters', 14),
(129, 'Master of Science in Energy', 'MSc Energy', 'Masters', 20),
(130, 'Master of Science in Engineering Psychology with Ergonomics', 'MSc Eng Psych w Ergonomics', 'Masters', 22),
(131, 'Master of Science in Environmental Services', 'MSc Environmental Services', 'Masters', 17),
(132, 'Master of Science in Ethics in Fashion (Consumerism, Communication and Sustainability)', 'MSc Ethics in Fashion (CCS)', 'Masters', 2),
(133, 'Master of Science in Facilities Management', 'MSc Facilities Mgt', 'Masters', 5),
(134, 'Master of Science in Fashion and Textiles Management', 'MSc Fashion & Textiles Mgt', 'Masters', 2),
(135, 'Master of Science in Finance and Management', 'MSc Finance & Management', 'Masters', 5),
(136, 'Master of Science in Financial Mathematics', 'MSc Financial Mathematics', 'Masters', 18),
(137, 'Master of Science in Flood Risk Management', 'MSc Flood Risk Mgt', 'Masters', 24),
(138, 'Master of Science in Facilities Management and Asset Maintenance', 'MSc FMAM', 'Masters', 5),
(139, 'Master of Science in Food and Beverage Science', 'MSc Food & Beverage Science', 'Masters', 12),
(140, 'Master of Science in Food Science, Safety and Health', 'MSc Food Sc, Safety & Health', 'Masters', 12),
(141, 'Master of Science in Food Science and Nutrition', 'MSc Food Science and Nutrition', 'Masters', 12),
(142, 'Master of Science in Forensic Materials', 'MSc Forensic Materials', 'Masters', 27),
(143, 'Master of Science in Geotechnical Engineering', 'MSc Geotechnical Eng', 'Masters', 14),
(144, 'Master of Science in Logistics with Green and Sustainable Supply Chain Management', 'MSc Green & Sustainable SCM', 'Masters', 5),
(145, 'Master of Science in Housing', 'MSc Housing', 'Masters', 24),
(146, 'Master of Science in Housing Studies', 'MSc Housing Studies', 'Masters', 24),
(147, 'Master of Science in Human Factors', 'MSc Human Factors', 'Masters', 27),
(148, 'Master of Science in Human Health and Disease', 'MSc Human Health & Disease', 'Masters', 27),
(149, 'Master of Science in International Business Management with Performance Management', 'MSc IBM w Performance Mgt', 'Masters', 5),
(150, 'Master of Science in International Business Management with Project Management', 'MSc IBM w Project Mgt', 'Masters', 5),
(151, 'Master of Science in International Business Management with Tourism', 'MSc IBM with Tourism', 'Masters', 5),
(152, 'Master of Science in International Marketing Management with Consumer Psychology', 'MSc IMM w Consumer Psychology', 'Masters', 5),
(153, 'Master of Science in International Marketing Management with Digital Marketing', 'MSc IMM w Digital Marketing', 'Masters', 5),
(154, 'Master of Science in International Marketing Management with Sustainability', 'MSc IMM with Sustainability', 'Masters', 5),
(155, 'Master of Science in International Marketing Management with Tourism', 'MSc IMM with Tourism', 'Masters', 5),
(156, 'Master of Science in Bioprocessing', 'MSc in Bioprocessing', 'Masters', 27),
(157, 'Master of Science in Business Strategy, Leadership and Change', 'MSc in Business Strategy, LC', 'Masters', 5),
(158, 'Master of Science in Construction Financial Management', 'MSc in Con Fin Man', 'Masters', 5),
(159, 'Master of Science in Energy', 'MSc in Energy', 'Masters', 20),
(160, 'Master of Science in Finance', 'MSc in Finance', 'Masters', 1),
(161, 'Master of Science in Financial management', 'MSc in Financial Mgt', 'Masters', 1),
(162, 'Master of Science in Human Resource Management', 'MSc in Human Res Mgt', 'Masters', 5),
(163, 'Master of Science in Industrial Management (International)', 'MSc in Industrial Mgt (Inter)', 'Masters', 5),
(164, 'Master of Science in Investment Management', 'MSc in Investment Management', 'Masters', 5),
(165, 'Master of Science in Logistics and Supply Chain Management with Marketing', 'MSc in Logistics w Marketing', 'Masters', 5),
(166, 'Master of Science in Logistics and Supply Chain Management with Business Performance', 'MSc in LSCM & Bus Performance', 'Masters', 5),
(167, 'Master of Science in Malting and Brewing', 'MSc in Malt & Brew', 'Masters', 6),
(168, 'Master of Science in Marketing', 'MSc in Marketing', 'Masters', 10),
(169, 'Master of Science in Mathematics', 'MSc in Mathematics', 'Masters', 18),
(170, 'Master of Science in Mobile Communications', 'MSc in Mobile Comms', 'Masters', 9),
(171, 'Master of Science in Oil and Gas Technology', 'MSc in Oil and Gas Technology', 'Masters', 25),
(172, 'Master of Science in Strategic Focus', 'MSc in Strategic Focus', 'Masters', 2),
(173, 'Master of Science in Sustainability Engineering', 'MSc in Sustainability Eng', 'Masters', 11),
(174, 'Master of Science in Industrial Photonics', 'MSc Industrial Photonics', 'Masters', 20),
(175, 'Master of Science in Information Technology (Software Engineering)', 'MSc Info Tech (SE)', 'Masters', 9),
(176, 'Master of Science in Information Technology (Business)', 'MSc Information Tech (Bus)', 'Masters', 9),
(177, 'Master of Science in Information Technology (E-Learning)', 'MSc Information Tech (E-L)', 'Masters', 9),
(178, 'Master of Science in Information Technology (Information Systems)', 'MSc Information Tech (IS)', 'Masters', 9),
(179, 'Master of Science in Information Technology (Software Systems)', 'MSc Information Tech (SS)', 'Masters', 9),
(180, 'Master of Science in International Accounting and Environmental Economics', 'MSc Int Acc & Env Economics', 'Masters', 1),
(181, 'Master of Science in International Accounting and Management', 'MSc Int Accounting & Mgt', 'Masters', 1),
(182, 'Master of Science in International Banking and Finance', 'MSc Int Banking and Finance', 'Masters', 1),
(183, 'Master of Science in International Business Management with Finance', 'MSc Int Bus Mgt w Finance', 'Masters', 1),
(184, 'Master of Science in International Business Management with Logistics', 'MSc Int Bus Mgt w Logistics', 'Masters', 5),
(185, 'Master of Science in International Business Management with Marketing', 'MSc Int Bus Mgt w Marketing', 'Masters', 5),
(186, 'Master of Science in International Business Management with Sustainability Management', 'MSc Int Bus Mgt w Sus Mgt', 'Masters', 5),
(187, 'Master of Science in International Business Management with Human Resource Management', 'MSc Int Bus Mgt with HRM', 'Masters', 5),
(188, 'Master of Science in International Finance and Corporate Accountability', 'MSc Int Fin & Corporate Acc', 'Masters', 1),
(189, 'Master of Science in International Finance and Economic Development', 'MSc Int Fin & Econ Development', 'Masters', 1),
(190, 'Master of Science in International Finance and Environmental Economics', 'MSc Int Fin & Env Economics', 'Masters', 1),
(191, 'Master of Science in International Management and Business Communications', 'MSc Int Mgt and Bus Comm', 'Masters', 5),
(192, 'Master of Science in International Management and Business Communication', 'MSc Int Mgt and Bus Comm', 'Masters', 5),
(193, 'Master of Science in Intelligent Systems', 'MSc Intelligent Systems', 'Masters', 9),
(194, 'Master of Science in Intelligent Web Technology', 'MSc Intelligent Web Tech', 'Masters', 9),
(195, 'Master of Science in International Accounting and Finance', 'MSc Inter Acc & Finance', 'Masters', 1),
(196, 'Master of Science in International Fashion Marketing', 'MSc Intern Fashion Mkt', 'Masters', 2),
(197, 'Master of Science in International Design Marketing', 'MSc International Des Mkt', 'Masters', 2),
(198, 'Master of Science in International Fashion Marketing and Retailing', 'MSc International FM&R', 'Masters', 5),
(199, 'Master of Science in International Marketing', 'MSc International Marketing', 'Masters', 10),
(200, 'Master of Science in International Marketing Management', 'MSc International Mkting Mgt', 'Masters', 5),
(201, 'Master of Science in Interpreting', 'MSc Interpreting', 'Masters', 26),
(202, 'Master of Science in Interpreting and Translating', 'MSc Interpreting & Translating', 'Masters', 26),
(203, 'Master of Science in Information Technology (Applied Systems)', 'MSc IT (App Sys)', 'Masters', 9),
(204, 'Master of Science in Information Technology (Embedded Systems)', 'MSc IT (ES)', 'Masters', 9),
(205, 'Master of Science in Information Technology (Information Systems)', 'MSc IT (IS)', 'Masters', 9),
(206, 'Master of Science in Information Technology (Mobile Communications)', 'MSc IT (MC)', 'Masters', 9),
(207, 'Master of Science in Information Technology (Systems)', 'MSc IT (SYS)', 'Masters', 9),
(208, 'Master of Science in Logistics and Supply Chain Management', 'MSc Log & Sup Chain Mgt', 'Masters', 5),
(209, 'Master of Science in Logistics and Supply Chain Management with Lean Six Sigma', 'MSc Logistics w Lean Six Sigma', 'Masters', 5),
(210, 'Master of Science in Logistics and Supply Chain Management with Shipping and Port Operations', 'MSc LSCM w SPO', 'Masters', 5),
(211, 'Master of Science in Malting and Brewing', 'MSc Malting and Brewing', 'Masters', 6),
(212, 'Master of Science in Managing Business Performance', 'MSc Managing Bus Performance', 'Masters', 5),
(213, 'Master of Science in Marine Biodiversity and Biotechnology', 'MSc Marine Biodiv & Biotech', 'Masters', 27),
(214, 'Master of Science in Marine Renewable Energy', 'MSc Marine Renewable Energy', 'Masters', 6),
(215, 'Master of Science in Marine Renewable Energy', 'MSc Marine Renewable Energy', 'Masters', 6),
(216, 'Master of Science in Marine Resource Development and Protection', 'MSc Marine Res Dev & Prot', 'Masters', 6),
(217, 'Master of Science in Marine Resource Management', 'MSc Marine Resource Mgt', 'Masters', 19),
(218, 'Master of Science in Marine Resource Management', 'MSc Marine Resource Mgt', 'Masters', 19),
(219, 'Master of Science in Marine Science', 'MSc Marine Science', 'Masters', 27),
(220, 'Master of Science in Marine Spatial Planning', 'MSc Marine Spatial Planning', 'Masters', 27),
(221, 'Master of Science in Maritime Logistics and Supply Chain Management', 'MSc Maritime Log & SCM', 'Masters', 5),
(222, 'Master of Science in Materials for Sustainable and Renewable Energies', 'MSc Mat Sus&Renew Energies', 'Masters', 5),
(223, 'Master of Science in Project Management for the Oil and Gas Industry', 'MSc Mgt Oil & Gas Industry', 'Masters', 25),
(224, 'Master of Science in Microsystems with Photonics', 'MSc Microsys Photonics', 'Masters', 9),
(225, 'Master of Science in Mobile and Handheld Applications', 'MSc Mobile & Handheld Apps', 'Masters', 9),
(226, 'Postgraduate Certificate in Software Engineering', 'MSc Mobile & Handheld Apps', 'Masters', 9),
(227, 'Master of Science in Nanotechnology and Microsystems', 'MSc Nanotech & Micro', 'Masters', 9),
(228, 'Master of Science in Oil and Gas Technology', 'MSc Oil & Gas Technology', 'Masters', 25),
(229, 'Master of Science in Operations Management', 'MSc Operations Management', 'Masters', 5),
(230, 'Master of Science in Optics and Photonics Technologies', 'MSc Optics & Pho Technologies', 'Masters', 20),
(231, 'Master of Science in Petroleum Engineering', 'MSc Pet Eng', 'Masters', 25),
(232, 'Master of Science in Petroleum Engineering Joint with University Technology Petronas', 'MSc Pet Eng UTP', 'Masters', 25),
(233, 'Master of Science in Petroleum Engineering with Project Management', 'MSc Petroleum Eng w Proj Mgt', 'Masters', 25),
(234, 'Master of Science in Petroleum Engineering', 'MSc Petroleum Engineering', 'Masters', 25),
(235, 'Master of Science in Petroleum Geoscience', 'MSc Petroleum Geoscience', 'Masters', 25),
(236, 'Master of Science in Photonics and Optoelectronic Devices', 'MSc Photonics & Opto Dev', 'Masters', 20),
(237, 'Master of Science Erasmus Mundus Masters in Photonics', 'MSc Photonics (EM)', 'Masters', 20),
(238, 'Master of Science in Property Investment and Finance', 'MSc PIF', 'Masters', 1),
(239, 'Master of Science in Property Investment and Finance (DL)', 'MSc PIF', 'Masters', 1),
(240, 'Master of Science in Property Investment and Finance', 'MSc Property Invest & Fin', 'Masters', 1),
(241, 'Master of Science in Quantitative Financial Risk Management', 'MSc Quant Fin Risk Mgmt', 'Masters', 1),
(242, 'Master of Science in Quantitative Finance and Mathematics', 'MSc Quant Finance and Maths', 'Masters', 1),
(243, 'Master of Science in Quantitative Financial Engineering', 'MSc Quantitative Financial Eng', 'Masters', 1),
(244, 'Master of Science in Quantity Surveying', 'MSc Quantity Surveying', 'Masters', 5),
(245, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in Auto Robotics', 'MSc RAIS spec Auton Robotics', 'Masters', 11),
(246, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in Embedded Robotics', 'MSc RAIS spec Emb Robotics', 'Masters', 11),
(247, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in Evolutionary and Bioinspired Robotics', 'MSc RAIS spec Evo Bio Robotics', 'Masters', 11),
(248, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in Human-Robot Interaction', 'MSc RAIS spec H-R Interaction', 'Masters', 11),
(249, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in Marine Robotics', 'MSc RAIS spec Marine Robotics', 'Masters', 11),
(250, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in MicroRobotics', 'MSc RAIS spec MicroRobotics', 'Masters', 11),
(251, 'Master of Science in Robotics, Autonomous and Interactive Systems with a specialism in Robot Vision', 'MSc RAIS spec Robot Vision', 'Masters', 11),
(252, 'Master of Science in Real Estate Investment and Finance', 'MSc Real Est Invest & Fin', 'Masters', 1),
(253, 'Master of Science in Real Estate Management and Development', 'MSc Real Est Mgt Dev', 'Masters', 5),
(254, 'Master of Science in Real Estate and Planning', 'MSc Real Estate and Planning', 'Masters', 10),
(255, 'Master of Science in Renewable Energy and Distributed Generation', 'MSc Renewable En & Dist Gen', 'Masters', 11),
(256, 'Master of Science in Renewable Energy Development', 'MSc Renewable Energy Dev', 'Masters', 11),
(257, 'Master of Science in Renewable Energy Development', 'MSc Renewable Energy Dev', 'Masters', 11),
(258, 'Master of Science in Renewable Energy Engineering', 'MSc Renewable Energy Eng', 'Masters', 11),
(259, 'Master of Science', 'MSc Research (Food Science)', 'Masters', 12),
(260, 'Master of Science', 'MSc Research (Human Ex Phys)', 'Masters', 27),
(261, 'Master of Science', 'MSc Research (Maths)', 'Masters', 18),
(262, 'Master of Science', 'MSc Research (Petroleum Eng)', 'Masters', 25),
(263, 'Master of Science', 'MSc Research (Sport & Ex Sc)', 'Masters', 23),
(264, 'Master of Science', 'MSc Research (Textiles)', 'Masters', 2),
(265, 'Master of Science in Research in the Built Environment', 'MSc Research Built Environment', 'Masters', 5),
(266, 'Master of Science in Reservoir Evaluation and Management', 'MSc Reservoir Eval & Mgt', 'Masters', 5),
(267, 'Master of Science in Safety, Risk and Reliability Engineering', 'MSc Saf Risk & Rel', 'Masters', 14),
(268, 'Master of Science in Safety and Risk Management', 'MSc Safety & Risk Mgt', 'Masters', 5),
(269, 'Master of Science in Safety, Risk and Reliability Engineering', 'MSc Safety Risk & Rel Eng', 'Masters', 14),
(270, 'Master of Science in Sensor Networks', 'MSc Sensor Networks', 'Masters', 9),
(271, 'Master of Science in Sign Language Interpreting (EUMASLI)', 'MSc Sign Lang Intrpt (EUMASLI)', 'Masters', 26),
(272, 'Master of Science in Smart Grid and Demand Management', 'MSc Smart Grid & Demand Mgt', 'Masters', 10),
(273, 'Master of Science in Smart Systems Integration', 'MSc Smart Systems Integration', 'Masters', 9),
(274, 'Master of Science in Software Engineering', 'MSc Software Engineering', 'Masters', 9),
(275, 'Master of Science in Strategic Project Planning', 'MSc Strat Proj Plan', 'Masters', 5),
(276, 'Master of Science in Strategic Project Management', 'MSc Strategic Project Mgt', 'Masters', 5),
(277, 'Master of Science in Strategy and International Management Accounting', 'MSc Strategy & Int Mgt Acc', 'Masters', 1),
(278, 'Master of Science in Strategic Management of Innovation (Fashion Textiles)', 'MSc StratMgt of Inov(F Tex)', 'Masters', 2),
(279, 'Master of Science in Structural Rehabilitation Repair and Maintenance', 'MSc Struct Rehab Rep & Main', 'Masters', 8),
(280, 'Master of Science in Structural Engineering', 'MSc Structural Engineering', 'Masters', 8),
(281, 'Master of Science in Structural and Foundation Engineering', 'MSc Structural Foundation Eng', 'Masters', 8),
(282, 'Master of Science in Supply Chain Management', 'MSc Supply Chain Mgt', 'Masters', 5),
(283, 'Master of Science in Sustainable River Catchment Flood Management', 'MSc Sust River CFM', 'Masters', 12),
(284, 'Master of Science in Sustainable Building Design', 'MSc Sustainable Bld Design', 'Masters', 2),
(285, 'Master of Science in Sustainable Community Design', 'MSc Sustainable Com Design', 'Masters', 2),
(286, 'Master of Science in Sustainable Urban Management', 'MSc Sustainable Urban Mgmt', 'Masters', 4),
(287, 'Master of Science in Systems Level Integration', 'MSc System Level Integration', 'Masters', 9),
(288, 'Master of Science in Translation and Intercultural Communication (Arabic-English)(DL)', 'MSc Trans (Ara-Eng)', 'Masters', 26),
(289, 'Master of Science in Translating', 'MSc Translating', 'Masters', 26),
(290, 'Master of Science in Translating and Conference Interpreting', 'MSc Translating & Conf Int', 'Masters', 26),
(291, 'Master of Science in Translating for Business', 'MSc Translating for Business', 'Masters', 26),
(292, 'Master of Science in Translation and Computer-Assisted Translation Tools', 'MSc Translation & Comp-ATT', 'Masters', 26),
(293, 'Master of Science in Translation & European Studies', 'MSc Translation & European Stu', 'Masters', 26),
(294, 'Master of Science in Urban Real Estate Management and Development', 'MSc Urb Real Est Mgt & Dev', 'Masters', 4),
(295, 'Master of Science in Urban Real Estate Management and Development', 'MSc Urb Real Estate', 'Masters', 4),
(296, 'Master of Science in Urban Real Estate Management and Development', 'MSc Urb Real Estate', 'Masters', 4),
(297, 'Master of Science in Urban and Regional Planning', 'MSc Urban & Reg Planning', 'Masters', 24),
(298, 'Master of Science in Urban Regeneration and Real Estate Development', 'MSc Urban Reg & Real Est D', 'Masters', 24),
(299, 'Master of Science in Urban Regeneration', 'MSc Urban Regeneration', 'Masters', 24),
(300, 'Master of Science in Urban Strategies and Design', 'MSc Urban Strat and Design', 'Masters', 24),
(301, 'Master of Science in Urban and Regional Planning', 'MSc URP', 'Masters', 24),
(302, 'Master of Science in Vision, Image and Robotics (Erasmus Mundus)', 'MSc Vision & Robotics (EM)', 'Masters', 9),
(303, 'Master of Science in Vision, Image and Signal Processing', 'MSc VISP', 'Masters', 9),
(304, 'Master of Science in Water and Environmental Management', 'MSc Water Env Management', 'Masters', 24),
(305, 'Master of Science in Water Resources and Catchment Management', 'MSc Water Res & Catch Mgt', 'Masters', 24),
(306, 'Master of Science in Water Resources', 'MSc Water Resources', 'Masters', 7),
(307, 'Master of Science in Water Resources Engineering Management', 'MSc Water Resources Eng Mgt', 'Masters', 5),
(308, 'Master of Science in Water Technology and Desalination', 'MSc Water Tech and Desalin', 'Masters', 7),
(309, 'Master of Science in Web Entrepreneurship', 'MSc Web Entrepreneurship', 'Masters', 9),
(310, 'Postgraduate Certificate in Energy', 'PG Cert in Energy', 'PG', 20),
(311, 'Postgraduate Certificate in International Business Management', 'Pg Cert Int Business Mgt', 'PG', 5),
(312, 'Postgraduate Certificate in Marine Renewable Energy', 'PG Cert Marine Energy', 'PG', 7),
(313, 'Postgraduate Certificate in Petroleum Geoscience', 'PG Cert Petroleum Geoscience', 'PG', 25),
(314, 'Post Gradute Certificate Sensor Networks', 'PG Cert Sensor Networks', 'PG', 9),
(315, 'Post Graduate Certificate in Sign Language Interpreting (EUMASLI)', 'PG Cert Sign Lang Intrpt (E)', 'PG', 26),
(316, 'Postgraduate Diploma in Advanced Internet Applications', 'PG Dip Adv Internet Apps', 'PG', 9),
(317, 'PG Dip Concrete Enginering', 'PG Dip Concrete Enginering', 'PG', 8),
(318, 'PG Dip Concrete Enginering', 'PG Dip Concrete Enginering', 'PG', 8),
(319, 'Postgraduate Diploma in Construction Financial Management', 'PG Dip Constr Fin Mg', 'PG', 1),
(320, 'Postgraduate Diploma in Facilities Management', 'PG Dip Fac Man', 'PG', 24),
(321, 'Postgraduate Diploma in Facilities Management and Asset Maintenance (DL)', 'PG Dip Fac Man Asset', 'PG', 24),
(322, 'Postgraduate Diploma in Housing', 'PG Dip Housing', 'PG', 24),
(323, 'Postgraduate Diploma in Marine Renewable Energy', 'PG Dip Marine Energy', 'PG', 7),
(324, 'Postgraduate Diploma in Petroleum Geoscience', 'PG Dip Petroleum Geoscience', 'PG', 25),
(325, 'Post Gradute Diploma Sensor Networks', 'PG Dip Sensor Networks', 'PG', 9),
(326, 'Post Graduate Diploma in Sign Language Interpreting (EUMASLI)', 'PG Dip Sign Lang Intrpt (E)', 'PG', 26),
(327, 'Postgraduate Diploma in Urban and Regional Planning', 'PG Dip Urban & Reg P', 'PG', 24),
(328, 'Postgraduate Certificate in Accounting, Economics and Finance', 'PgCert Acc, Econ & Finance', 'PG', 10),
(329, 'Postgraduate Certificate in Accounting', 'PgCert Accounting', 'PG', 1),
(330, 'Postgraduate Certificate in Actuarial Management', 'PGCert Actuarial Management', 'PG', 18),
(331, 'Postgraduate Certificate in Actuarial Science and Management', 'PgCert Actuarial Sci and Man', 'PG', 18),
(332, 'Postgraduate Certificate in Actuarial Science', 'PgCert Actuarial Science', 'PG', 18),
(333, 'Postgraduate Certificate in Advanced Internet Applications', 'PgCert Adv Internet Applicatio', 'PG', 9),
(334, 'Postgraduate Certificate in Advanced Mathematics and Statistics for Engineers', 'PgCert Adv Maths & Stats f Eng', 'PG', 18),
(335, 'Postgraduate Certificate in Advanced Mechanical Engineering', 'PgCert Adv Mech Eng', 'PG', 19),
(336, 'Postgraduate Certificate in Applied Psychology', 'PgCert Applied Psychology', 'PG', 22),
(337, 'Postgraduate Certificate in Architectural Project Management', 'PgCert Archit Project Mgt', 'PG', 4),
(338, 'Postgraduate Certificate in Architectural Facilities Management', 'PgCert Architect Fac Mgt', 'PG', 4),
(339, 'Postgraduate Certificate in Architectural Engineering', 'PgCert Architectural Eng', 'PG', 4),
(340, 'Postgraduate Certificate in Artificial Intelligence', 'PgCert Artificial Intelligence', 'PG', 11),
(341, 'Postgraduate Certificate in Bioinformatics', 'PgCert Bioinformatics', 'PG', 27),
(342, 'Postgraduate Certificate in Biotechnology', 'PgCert Biotechnology', 'PG', 27),
(343, 'Postgraduate Certificate in Building Conservation (Technology and Management)', 'PgCert Bldg Cons (Tech & Mgt)', 'PG', 4),
(344, 'Postgraduate Certificate in Building Services Engineering Management', 'PgCert Bldg Serv Eng Mgt', 'PG', 4),
(345, 'Postgraduate Certificate in Building Services Facilities Management', 'PgCert Bldg Serv Fac Mgt', 'PG', 4),
(346, 'Postgraduate Certificate in Building Services Engineering', 'PGCert BSE (DL)', 'PG', 25),
(347, 'Postgraduate Certificate in Marketing', 'PgCert in Marketing', 'PG', 1),
(348, 'Postgraduate Certificate in Oil and Gas Technology', 'PgCert Oil & Gas Technology', 'PG', 25),
(349, 'Postgraduate Diploma in Chinese-English Translating and Conference Interpreting', 'PgDip C-E Tran & Conf Int(2yr)', 'PG Diploma', 26),
(350, 'Postgraduate Diploma in Chinese-English Translating', 'PgDip Chinese-Eng Translating', 'PG Diploma', 26),
(351, 'Postgraduate Diploma in Chemical Innovation and Regulation (Erasmus Mundus) (ChIR)', 'PgDip ChIR (Erasmus Mundus)', 'PG Diploma', 6),
(352, 'Postgraduate Diploma in Civil Engineering and Construction Management', 'PgDip Civil Eng & Constr Mgt', 'PG Diploma', 8),
(353, 'Postgraduate Diploma in Civil Engineering', 'PgDip Civil Engineering', 'PG Diploma', 8),
(354, 'Postgraduate Diploma in Clothing Management and Intelligent Textiles and Clothing', 'PgDip Clothing Mgt & IT & C', 'PG Diploma', 2),
(355, 'Postgraduate Diploma in Computational Mathematics', 'PgDip Computational Maths', 'PG Diploma', 18),
(356, 'Postgraduate Diploma in Computer Services Management', 'PgDip Computer Services Mgt', 'PG Diploma', 9),
(357, 'Postgraduate Diploma in Computing', 'PgDip Computing', 'PG Diploma', 9),
(358, 'Postgraduate Diploma in Ethics in Fashion (Consumerism, Communication and Sustainability)', 'PgDip Ethics in Fashion (CCS)', 'PG Diploma', 2),
(359, 'Postgraduate Diploma in Food and Beverage Science', 'PgDip Food & Beverage Science', 'PG Diploma', 12),
(360, 'Postgraduate Diploma in Food Science, Safety and Health', 'PgDip Food Sc,Safety & Health', 'PG Diploma', 12),
(361, 'Postgraduate Diploma in Food Science and Nutrition', 'PgDip Food Science and Nutriti', 'PG Diploma', 12),
(362, 'Postgraduate Diploma in Information Technology (Software Systems)', 'PgDip Information Tech (SS)', 'PG Diploma', 9),
(363, 'Postgraduate Diploma in International Accounting and Environmental Economics', 'PgDip Int Acc & Env Economics', 'PG Diploma', 1),
(364, 'Postgraduate Diploma in International Accounting and Management', 'PgDip Int Accounting & Mgt', 'PG Diploma', 1),
(365, 'Postgraduate Diploma in International Banking and Finance', 'PgDip Int Banking and Finance', 'PG Diploma', 1),
(366, 'Postgraduate Diploma in International Business Management with Finance', 'PgDip Int Bus Mgt w Finance', 'PG Diploma', 1),
(367, 'Postgraduate Diploma in Malting and Brewing', 'PGDip Malting and Brewing', 'PG Diploma', 27),
(368, 'Postgraduate Diploma in Marine Biodiversity and Biotechnology', 'PgDip Marine Biodiv & Biotech', 'PG Diploma', 27),
(369, 'Postgraduate Diploma in Marine Renewable Energy', 'PgDip Marine Renewable Energy', 'PG Diploma', 27),
(370, 'Postgraduate Diploma in Marine Resource Development and Protection', 'PgDip Marine Res Dev & Prot', 'PG Diploma', 27),
(371, 'Doctor of Philosophy', 'PhD (Acc & Finance)', 'PhD', 1),
(372, 'Doctor of Philosophy', 'PhD (Actuarial Mathematics)', 'PhD', 18),
(373, 'Doctor of Philosophy', 'PhD (Brewing)', 'PhD', 27),
(374, 'Doctor of Philosophy', 'PhD (Chemical)', 'PhD', 6),
(375, 'Doctor of Philosophy', 'PhD (Chemistry)', 'PhD', 7),
(376, 'Doctor of Philosophy', 'PhD (Civil)', 'PhD', 8),
(377, 'Doctor of Philosophy', 'PhD (Computer Science)', 'PhD', 9),
(378, 'Doctor of Philosophy', 'PhD (Const)', 'PhD', 4),
(379, 'Doctor of Philosophy', 'PhD (Economics)', 'PhD', 10),
(380, 'Doctor of Philosophy', 'PhD (Electrical)', 'PhD', 11),
(381, 'Doctor of Philosophy', 'PhD (Food Science)', 'PhD', 12),
(382, 'Doctor of Philosophy', 'PhD (Languages)', 'PhD', 26),
(383, 'Doctor of Philosophy', 'PhD (Life Science)', 'PhD', 10),
(384, 'Doctor of Philosophy', 'PhD (Management)', 'PhD', 2),
(385, 'Doctor of Philosophy', 'PhD (Marine Biology)', 'PhD', 27),
(386, 'Doctor of Philosophy', 'PhD (Mathematics)', 'PhD', 18),
(387, 'Doctor of Philosophy', 'PhD (Mechanical)', 'PhD', 19),
(388, 'Doctor of Philosophy', 'PhD (Microbiology)', 'PhD', 27),
(389, 'Doctor of Philosophy', 'PhD Petroleum Eng', 'PhD', 25),
(390, 'Doctor of Philosophy', 'PhD Physics', 'PhD', 20),
(391, 'Doctor of Philosophy', 'PhD Textiles', 'PhD', 20),
(399, 'Masters in Accounts', 'MA in Accounts', 'Masters', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_pending`
--

CREATE TABLE `request_pending` (
  `fk_sender_user_id` int(11) NOT NULL,
  `fk_acceptor_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_pending`
--

INSERT INTO `request_pending` (`fk_sender_user_id`, `fk_acceptor_user_id`) VALUES
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_description`) VALUES
(1, 'Accounting & Finance', ''),
(2, 'Art & Design', ''),
(4, 'Building', ''),
(5, 'Business Studies', ''),
(6, 'Chemical Engineering', ''),
(7, 'Chemistry', ''),
(8, 'Civil Engineering', ''),
(9, 'Computer Science', ''),
(10, 'Economics', ''),
(11, 'Electrical & Electronic Engineering', ''),
(14, 'General Engineering', ''),
(17, 'Law', ''),
(18, 'Mathematics', ''),
(19, 'Mechanical Engineering', ''),
(20, 'Physics', ''),
(21, 'Astronomy', ''),
(22, 'Psycology', ''),
(23, 'Sports science', ''),
(24, 'Town & Country Plan & Landscape', ''),
(25, 'Petroleum Engineering', ''),
(26, 'Languages', ''),
(27, 'Biology', '');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(24) DEFAULT NULL,
  `rank` int(3) DEFAULT NULL,
  `Teaching Quality` decimal(3,1) DEFAULT NULL,
  `Student Experience` decimal(3,1) DEFAULT NULL,
  `Research quality` varchar(3) DEFAULT NULL,
  `entry` int(3) DEFAULT NULL,
  `Graduate prospects` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `rank`, `Teaching Quality`, `Student Experience`, `Research quality`, `entry`, `Graduate prospects`) VALUES
(1, 'Cambridge', 1, '83.8', '86.3', '57', 602, '89.3'),
(2, 'Oxford', 2, '83.1', '86.8', '53', 573, '87.1'),
(3, 'Imperial College', 3, '79.8', '87.8', '56', 568, '91.1'),
(4, 'St Andrews', 4, '83.2', '86.8', '40', 517, '83.3'),
(5, 'Durham', 5, '81.9', '86.7', '39', 523, '84.4'),
(6, 'Warwick', 6, '79.6', '85.0', '45', 482, '79.8'),
(7, 'Exeter', 7, '82.6', '87.7', '38', 463, '79.8'),
(8, 'Surrey', 8, '86.9', '90.3', '30', 424, '78.8'),
(9, 'LSE', 9, '72.1', '78.4', '53', 533, '78.5'),
(10, 'UCL', 10, '74.2', '81.3', '51', 502, '83.1'),
(11, 'Lancaster', 11, '82.3', '85.4', '39', 436, '82.5'),
(12, 'Bath', 12, '82.7', '87.0', '37', 479, '85.2'),
(13, 'Loughborough', 13, '84.5', '89.3', '36', 397, '83.7'),
(14, 'Leeds', 14, '83.7', '88.0', '37', 431, '78.4'),
(15, 'York', 15, '81.7', '86.6', '38', 437, '76.0'),
(16, 'Southampton', 16, '79.3', '86.5', '45', 411, '78.1'),
(17, 'Birmingham', 17, '80.8', '84.2', '37', 426, '86.7'),
(18, 'East Anglia', 18, '83.2', '88.8', '36', 408, '70.3'),
(19, 'Sussex', 19, '78.6', '85.0', '32', 386, '84.1'),
(20, 'Bristol', 20, '75.5', '81.5', '47', 487, '79.6'),
(21, 'Sheffield', 21, '81.3', '87.2', '38', 428, '75.7'),
(22, 'Edinburgh', 22, '74.5', '82.4', '44', 484, '78.6'),
(23, 'Kent', 23, '81.5', '85.4', '35', 363, '76.7'),
(24, 'Newcastle', 23, '82.0', '88.4', '38', 424, '79.1'),
(25, 'Nottingham', 25, '79.5', '83.9', '38', 428, '81.3'),
(26, 'Glasgow', 26, '80.0', '86.9', '40', 470, '79.3'),
(27, 'King''s College', 27, '73.9', '79.7', '44', 455, '85.7'),
(28, 'Leicester', 28, '77.5', '84.4', '32', 386, '72.1'),
(29, 'Manchester', 28, '79.0', '84.7', '40', 435, '78.5'),
(30, 'Aston', 30, '83.3', '87.9', '26', 369, '78.8'),
(31, 'Queen''s Belfast', 31, '81.6', '87.3', '40', 385, '78.7'),
(32, 'Reading', 32, '80.5', '85.8', '37', 373, '70.3'),
(33, 'Cardiff', 33, '80.7', '86.0', '35', 426, '80.1'),
(34, 'Queen Mary', 34, '80.5', '83.3', '38', 411, '73.3'),
(35, 'Essex', 35, '83.7', '88.0', '37', 313, '64.1'),
(36, 'Royal Holloway', 36, '82.6', '84.1', '36', 398, '62.7'),
(37, 'Dundee', 37, '84.4', '87.1', '31', 410, '80.0'),
(38, 'Buckingham', 38, '88.0', '88.4', 'n/a', 304, '83.4'),
(39, 'Heriot-Watt', 38, '80.8', '84.2', '37', 413, '78.1'),
(40, 'Liverpool', 38, '77.9', '83.4', '32', 404, '76.1'),
(41, 'City', 41, '82.7', '85.6', '21', 379, '78.9'),
(42, 'Swansea', 41, '82.6', '86.5', '34', 326, '81.4'),
(43, 'Keele', 43, '87.0', '90.2', '22', 358, '76.1'),
(44, 'SOAS', 44, '75.2', '80.8', '28', 407, '68.3'),
(45, 'Aberdeen', 45, '77.4', '83.7', '30', 446, '76.2'),
(46, 'Strathclyde', 46, '76.2', '85.6', '38', 476, '72.0'),
(47, 'Coventry', 47, '87.6', '89.3', '4', 310, '74.2'),
(48, 'St George''s', 48, '78.7', '81.6', '22', 418, '93.4'),
(49, 'Harper Adams', 49, '82.6', '89.3', '6', 331, '73.3'),
(50, 'Stirling', 50, '78.7', '82.3', '31', 375, '73.3'),
(51, 'Royal Agricultural Uni', 51, '79.3', '85.6', '1', 307, '69.7'),
(52, 'Bangor', 52, '85.8', '87.8', '27', 321, '67.7'),
(53, 'De Montfort', 53, '82.4', '84.6', '9', 307, '76.9'),
(54, 'Nottingham Trent', 54, '83.6', '85.8', '7', 310, '67.6'),
(55, 'Oxford Brookes', 55, '83.2', '85.7', '11', 348, '69.2'),
(56, 'Falmouth', 56, '83.7', '83.5', '5', 309, '74.5'),
(57, 'Ulster', 57, '82.9', '87.0', '32', 306, '63.6'),
(58, 'Bath Spa', 58, '85.8', '85.8', '8', 318, '55.1'),
(59, 'Portsmouth', 59, '83.4', '85.9', '9', 310, '66.9'),
(60, 'Brunel', 60, '78.2', '83.8', '25', 352, '63.4'),
(61, 'Norwich Arts', 61, '83.8', '83.5', '6', 357, '63.4'),
(62, 'Creative Arts', 62, '82.7', '81.5', '3', 332, '52.0'),
(63, 'Lincoln', 62, '81.1', '84.6', '10', 335, '70.7'),
(64, 'Northumbria', 64, '82.9', '85.1', '9', 363, '66.3'),
(65, 'Winchester', 64, '84.2', '85.0', '6', 307, '60.7'),
(66, 'Goldsmiths', 66, '76.6', '76.3', '33', 360, '56.0'),
(67, 'Hull', 67, '80.0', '83.8', '17', 332, '66.7'),
(68, 'Edge Hill', 68, '83.2', '83.5', '5', 319, '63.8'),
(69, 'Chichester', 69, '84.0', '85.3', '6', 310, '57.5'),
(70, 'Huddersfield', 69, '82.2', '84.0', '9', 333, '74.1'),
(71, 'Robert Gordon', 69, '80.6', '83.5', '4', 385, '83.1'),
(72, 'Sheffield Hallam', 72, '80.9', '83.9', '5', 319, '64.7'),
(73, 'West of England', 73, '80.0', '82.5', '9', 324, '70.8'),
(74, 'Liverpool John Moores', 74, '81.6', '85.0', '9', 344, '63.3'),
(75, 'Bradford', 75, '78.8', '84.4', '9', 314, '75.2'),
(76, 'Hertfordshire', 76, '78.6', '82.8', '6', 318, '75.3'),
(77, 'Manchester Metropolitan', 77, '81.0', '82.2', '8', 347, '63.0'),
(78, 'Roehampton', 78, '78.0', '79.9', '25', 286, '60.9'),
(79, 'Aberystwyth', 79, '78.4', '80.4', '28', 312, '62.5'),
(80, 'Liverpool Hope', 79, '86.8', '86.4', '9', 304, '53.9'),
(81, 'Arts, Bournemouth', 81, '81.4', '80.0', '2', 322, '61.4'),
(82, 'Bournemouth', 82, '75.2', '78.8', '9', 329, '66.4'),
(83, 'Northampton', 82, '82.3', '84.1', '3', 283, '60.7'),
(84, 'Derby', 84, '84.4', '85.3', '3', 290, '60.0'),
(85, 'Middlesex', 85, '78.7', '81.8', '10', 270, '64.9'),
(86, 'Plymouth', 85, '82.3', '84.1', '16', 312, '60.2'),
(87, 'Chester', 87, '82.7', '83.7', '4', 299, '63.6'),
(88, 'Gloucestershire', 88, '79.8', '82.6', '4', 317, '55.7'),
(89, 'York St John', 89, '82.4', '83.0', '4', 292, '65.3'),
(90, 'Brighton', 90, '78.6', '80.9', '8', 321, '66.9'),
(91, 'Leeds Trinity', 91, '83.5', '82.3', '2', 284, '65.8'),
(92, 'Central Lancashire', 92, '80.4', '83.5', '6', 315, '62.4'),
(93, 'Edinburgh Napier', 93, '80.2', '83.7', '5', 347, '69.1'),
(94, 'Glasgow Caledonian', 94, '77.0', '82.5', '7', 372, '70.2'),
(95, 'Staffordshire', 95, '81.8', '82.8', '17', 274, '58.4'),
(96, 'Queen Margaret', 96, '78.9', '82.3', '7', 341, '59.6'),
(97, 'Abertay Dundee', 97, '80.0', '83.1', '5', 338, '65.6'),
(98, 'Salford', 98, '80.1', '80.9', '8', 334, '59.5'),
(99, 'Arts, London', 99, '75.9', '74.5', '8', 320, '59.2'),
(100, 'St Mary''s, Twickenham', 100, '80.5', '84.8', '4', 289, '66.7'),
(101, 'Worcester', 100, '81.4', '84.5', '4', 301, '63.9'),
(102, 'Teesside', 102, '82.9', '84.3', '4', 306, '59.8'),
(103, 'Cardiff Metropolitan', 103, '79.1', '81.8', '4', 317, '59.8'),
(104, 'Sunderland', 104, '82.5', '84.2', '6', 294, '62.3'),
(105, 'Birmingham City', 105, '78.0', '79.3', '4', 300, '64.8'),
(106, 'Greenwich', 106, '79.2', '82.4', '5', 315, '58.2'),
(107, 'Canterbury Christ Church', 107, '80.7', '81.9', '5', 279, '57.8'),
(108, 'Anglia Ruskin', 108, '82.5', '83.9', '5', 254, '65.0'),
(109, 'Buckinghamshire New', 109, '81.5', '81.1', '2', 257, '57.6'),
(110, 'Bedfordshire', 110, '80.4', '82.7', '7', 229, '58.3'),
(111, 'Kingston', 111, '76.1', '79.9', '5', 299, '60.7'),
(112, 'Bishop Grosseteste', 112, '80.9', '80.6', '2', 284, '69.1'),
(113, 'South Wales', 112, '77.5', '78.3', '4', 322, '59.0'),
(114, 'Leeds Beckett', 114, '78.5', '82.7', '4', 288, '58.5'),
(115, 'Newman, Birmingham', 115, '83.1', '84.6', '3', 293, '54.6'),
(116, 'Southampton Solent', 115, '79.5', '82.1', '1', 276, '54.6'),
(117, 'Westminster', 115, '72.9', '80.6', '10', 311, '55.1'),
(118, 'West of Scotland', 118, '81.8', '81.8', '4', 305, '65.7'),
(119, 'Cumbria', 119, '76.9', '77.6', '1', 299, '64.9'),
(120, 'London South Bank', 120, '77.0', '81.3', '9', 248, '67.9'),
(121, 'West London', 121, '76.9', '77.5', '2', 259, '60.5'),
(122, 'Glyndŵr', 122, '80.5', '79.3', '2', 257, '66.3'),
(123, 'Bolton', 123, '81.6', '80.8', '3', 287, '60.1'),
(124, 'UCP Marjon', 123, '76.3', '77.3', 'n/a', 319, '60.4'),
(125, 'London Metropolitan', 125, '76.0', '78.6', '4', 239, '47.7'),
(126, 'Highlands and Islands', 126, '78.8', '76.5', 'n/a', 272, '56.0'),
(127, 'Bolton', 127, '81.6', '80.8', '3', 287, '60.1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_email`, `user_valid`) VALUES
(2, 'username', '$2y$10$/NGeamAqSZo/OLKgsOf6Huv40QE9wkgoAnTFYEJuzlQapRzKchaK2', 'username@email.com', 0),
(3, 'saeed', 'anything', 'bkcwewl', 0),
(4, 'username2', '$2y$10$ooXw.0KFr0PF0kwU9Keni.gN.kcGuOcepvc0f5UkI5i5.hol4PUt.', 'username2@gmail.com', 0),
(5, 'username3', '$2y$10$kLeethvv8Xq2wYkeokoWv.asoanGrH0zyXicBuGQoaXZawP31sduu', 'username3@gmail.com', 0),
(7, 'tats', '$2y$10$uljwLiFlbg66CoPl9iUQIeF4yAv6F5ERtsasuLhkFAsr6Vl1WmqBm', 'tats@gmail.com', 0),
(8, 'hani', '$2y$10$AyP95p0hJoh3alCG7GJepOxQ/8z11IdP3nkT/Y.Kek7cCegyWsMly', 'h.ragabhassen@hw.ac.', 0),
(9, 'newuser', '$2y$10$YyxVyHps9AsPZ2MVYfH.9Og2xLgbatb8nfbEFoPMloOg/CHffYQnC', 'newuser@gmail.com', 0),
(10, 'lala123', '$2y$10$3h8Ucbz.b1/qIbDkPTYiUu1xzXCmk8MAJMiEtfV/FI0Ljyxqltshm', 'lala@gmail.com', 0),
(11, 'admin007', '$2y$10$vdFWYEZ1EWzE77H8kbvRGu909IscS7IgTgpltIycsJ3TBYNde.Rd6', 'admin@gg.com', 0),
(12, 'blah', '$2y$10$MMQVivYJT1LfFkaXLHZtQe1ZuXMoyPDrUAW4VECakgGZG9Y9gIvCK', 'blah@blah.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_jobs`
--

CREATE TABLE `user_jobs` (
  `fk_user_id` int(11) NOT NULL,
  `fk_job_id` int(11) NOT NULL,
  `company_name` text,
  `company_location` text,
  `salary` decimal(10,0) DEFAULT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_jobs`
--

INSERT INTO `user_jobs` (`fk_user_id`, `fk_job_id`, `company_name`, `company_location`, `salary`, `start_year`, `end_year`) VALUES
(2, 67, 'Farmer Industry', 'Farmville', '5000', 1993, 1996),
(2, 68, 'McDonalds', 'London', '25000', 2010, 2012),
(2, 124, 'McDonalds', 'London', '25000', 2013, 2015),
(10, 69, 'McDonalds', 'London', '25000', 2010, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `user_school_qualification`
--

CREATE TABLE `user_school_qualification` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `school_name` text NOT NULL,
  `grad_year` year(4) NOT NULL,
  `qualification` enum('GCSE/S4','AS Levels','A Levels','Scottish Highers','Advance Scottish Highers') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_school_qualification`
--

INSERT INTO `user_school_qualification` (`id`, `fk_user_id`, `school_name`, `grad_year`, `qualification`) VALUES
(28, 2, 'GCSE school', 2010, 'GCSE/S4'),
(30, 2, 'A level School', 2012, 'A Levels'),
(31, 4, 'My GCSE School', 2010, 'GCSE/S4');

-- --------------------------------------------------------

--
-- Table structure for table `user_school_qualification_subjects`
--

CREATE TABLE `user_school_qualification_subjects` (
  `fk_user_school_qualification_id` int(11) NOT NULL,
  `fk_subject_id` int(11) NOT NULL,
  `score` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_school_qualification_subjects`
--

INSERT INTO `user_school_qualification_subjects` (`fk_user_school_qualification_id`, `fk_subject_id`, `score`) VALUES
(30, 1, 'A*'),
(30, 2, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user_subject_score`
--

CREATE TABLE `user_subject_score` (
  `fk_user_id` int(11) NOT NULL,
  `fk_subject_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `universities` int(11) DEFAULT NULL,
  `jobs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subject_score`
--

INSERT INTO `user_subject_score` (`fk_user_id`, `fk_subject_id`, `score`, `universities`, `jobs`) VALUES
(2, 1, 140, 2, 1),
(2, 2, 120, 0, 0),
(2, 6, NULL, NULL, 2),
(10, 6, NULL, NULL, 1),
(11, 11, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_uni_qualification`
--

CREATE TABLE `user_uni_qualification` (
  `fk_user_id` int(11) NOT NULL,
  `fk_qualification_id` int(11) NOT NULL,
  `fk_uni_id` int(11) NOT NULL,
  `grad_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_uni_qualification`
--

INSERT INTO `user_uni_qualification` (`fk_user_id`, `fk_qualification_id`, `fk_uni_id`, `grad_year`) VALUES
(2, 4, 1, 2014),
(2, 399, 1, 2014),
(11, 55, 1, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

CREATE TABLE `userdetail` (
  `userDetail_id` int(11) NOT NULL,
  `userDetail_firstName` varchar(30) NOT NULL,
  `userDetail_lastName` varchar(30) NOT NULL,
  `userDetail_profilePicture` varchar(64) NOT NULL,
  `userDetail_DOB` date NOT NULL,
  `userDetail_minQualification` enum('GCSE/S4','AS Levels/S5','A Levels/S6','Bachelors','Bachelors with Honours','Masters','PhD') NOT NULL,
  `userDetail_nationality` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`userDetail_id`, `userDetail_firstName`, `userDetail_lastName`, `userDetail_profilePicture`, `userDetail_DOB`, `userDetail_minQualification`, `userDetail_nationality`) VALUES
(2, 'user', 'name', '', '1994-12-12', 'GCSE/S4', 'american'),
(4, 'Von', 'Eric', '', '2016-03-16', '', 'french'),
(5, 'Bart', 'Simpson', '', '2013-06-17', '', 'american'),
(8, 'Hani', 'Mee', '', '1981-03-27', '', 'afghan'),
(11, 'Waqas', 'Butts', '', '1994-12-01', 'Bachelors', 'pakistani'),
(12, 'Blah', 'Blah', '', '2015-01-01', 'GCSE/S4', 'batswana');

-- --------------------------------------------------------

--
-- Table structure for table `usermentor`
--

CREATE TABLE `usermentor` (
  `fk_mentor_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermentor`
--

INSERT INTO `usermentor` (`fk_mentor_id`, `fk_user_id`) VALUES
(12, 11),
(11, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_studies`
--
ALTER TABLE `case_studies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`fk_qualification_id`,`fk_job_id`),
  ADD KEY `qualifications` (`fk_qualification_id`),
  ADD KEY `jobs` (`fk_job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`fk_subject_id`),
  ADD KEY `subjects` (`fk_subject_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject_id` (`fk_subject_id`);

--
-- Indexes for table `request_pending`
--
ALTER TABLE `request_pending`
  ADD UNIQUE KEY `fk_sender_user_id` (`fk_sender_user_id`,`fk_acceptor_user_id`),
  ADD KEY `acceptor id` (`fk_acceptor_user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_jobs`
--
ALTER TABLE `user_jobs`
  ADD UNIQUE KEY `fk_user_id` (`fk_user_id`,`fk_job_id`,`start_year`),
  ADD KEY `job` (`fk_job_id`);

--
-- Indexes for table `user_school_qualification`
--
ALTER TABLE `user_school_qualification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_user_id_2` (`fk_user_id`,`qualification`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `user_school_qualification_subjects`
--
ALTER TABLE `user_school_qualification_subjects`
  ADD UNIQUE KEY `fk_user_school_qualification_i_2` (`fk_user_school_qualification_id`,`fk_subject_id`),
  ADD KEY `subject` (`fk_subject_id`);

--
-- Indexes for table `user_subject_score`
--
ALTER TABLE `user_subject_score`
  ADD UNIQUE KEY `fk_user_id` (`fk_user_id`,`fk_subject_id`);

--
-- Indexes for table `user_uni_qualification`
--
ALTER TABLE `user_uni_qualification`
  ADD UNIQUE KEY `fk_user_id` (`fk_user_id`,`fk_qualification_id`,`fk_uni_id`);

--
-- Indexes for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD PRIMARY KEY (`userDetail_id`);

--
-- Indexes for table `usermentor`
--
ALTER TABLE `usermentor`
  ADD UNIQUE KEY `userMentor_mentor_fk_user_id` (`fk_mentor_id`),
  ADD UNIQUE KEY `userMentor_user_fk_user_id` (`fk_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_studies`
--
ALTER TABLE `case_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_school_qualification`
--
ALTER TABLE `user_school_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `userdetail`
--
ALTER TABLE `userdetail`
  MODIFY `userDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_studies`
--
ALTER TABLE `case_studies`
  ADD CONSTRAINT `jobs` FOREIGN KEY (`fk_job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qualifications` FOREIGN KEY (`fk_qualification_id`) REFERENCES `qualifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `subjects` FOREIGN KEY (`fk_subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request_pending`
--
ALTER TABLE `request_pending`
  ADD CONSTRAINT `acceptor id` FOREIGN KEY (`fk_acceptor_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender id` FOREIGN KEY (`fk_sender_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_jobs`
--
ALTER TABLE `user_jobs`
  ADD CONSTRAINT `job` FOREIGN KEY (`fk_job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_school_qualification`
--
ALTER TABLE `user_school_qualification`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_school_qualification_subjects`
--
ALTER TABLE `user_school_qualification_subjects`
  ADD CONSTRAINT `qualification` FOREIGN KEY (`fk_user_school_qualification_id`) REFERENCES `user_school_qualification` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject` FOREIGN KEY (`fk_subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_subject_score`
--
ALTER TABLE `user_subject_score`
  ADD CONSTRAINT `user` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_uni_qualification`
--
ALTER TABLE `user_uni_qualification`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userdetail`
--
ALTER TABLE `userdetail`
  ADD CONSTRAINT `userdetail_ibfk_1` FOREIGN KEY (`userDetail_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"aegis","table":"users"},{"db":"aegis","table":"users_skills"},{"db":"aegis","table":"request_temp"},{"db":"aegis","table":"projects_users"},{"db":"aegis","table":"skills"},{"db":"aegis","table":"projects"},{"db":"aegis","table":"projects_skills"},{"db":"aegis","table":"image"},{"db":"aegis","table":"projectemp"},{"db":"aegis","table":"projectskillslist"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- Dumping data for table `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('aegis', 'request_temp', 'projectID', 'aegis', 'projects', 'projectID'),
('aegis', 'request_temp', 'userID', 'aegis', 'users', 'userID');

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'aegis', 'users', '{"sorted_col":"`availability` ASC"}', '2017-03-13 10:38:38'),
('root', 'aegis', 'users_skills', '{"sorted_col":"`percentage` ASC"}', '2017-03-14 15:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2017-01-19 07:52:37', '{"collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
