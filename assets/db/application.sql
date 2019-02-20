-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2019 at 10:03 AM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OrganisationName` varchar(255) NOT NULL,
  `CountryCode` char(5) NOT NULL,
  `phone` int(11) NOT NULL,
  `AccountLocation` varchar(255) NOT NULL,
  `AccountType` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `OrganisationName`, `CountryCode`, `phone`, `AccountLocation`, `AccountType`) VALUES
(29, 'Quadrant', '+254', 727143163, 'Nakuru', 'NGO'),
(30, 'Name ', '+255', 727143163, 'Nakuru', 'NGO'),
(31, 'EvansCorp', '+256', 707393954, 'Nakuru', 'NGO'),
(32, 'Name ', '+256', 707393954, 'Nakuru', 'Church'),
(33, 'Name ', '+255', 707393954, 'Nakuru', 'Church'),
(34, 'Name ', '+256', 707393954, 'Nakuru', 'Church'),
(35, 'Name ', '+255', 707393954, 'Nakuru', 'Church'),
(36, 'Name ', '+255', 707393954, 'Nakuru', 'NGO'),
(37, 'EvansCorp', '+255', 707393954, 'nakuru', 'Church'),
(38, 'EvansCorp', '+255', 707393954, 'nakuru', 'Church'),
(39, 'EvansCorp', '+254', 707393954, 'Nakuru', 'NGO'),
(40, 'EvansCorp', '+254', 707393954, 'Nakuru', 'NGO');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `CatID` int(11) NOT NULL AUTO_INCREMENT,
  `CatOrgId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`CatID`),
  KEY `CatOrgId` (`CatOrgId`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CatID`, `CatOrgId`, `Name`, `Description`) VALUES
(38, 29, 'Student', '   \r\n    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus debitis autem commodi? Molestiae, tenetur aspernatur dolorum ad dignissimos reprehenderit maxime fuga vitae ipsum hic? Minima earum eos quod delectus recusandae, quaerat, excepturi maiores quis alias, amet voluptatem non et libero perspiciatis quas. Voluptatibus velit qui amet ab dignissimos, veniam magni!'),
(40, 2, 'Organizations ', '   Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus debitis autem commodi? Molestiae, tenetur aspernatur dolorum ad dignissimos reprehenderit maxime fuga vitae ipsum hic? Minima earum eos quod delectus recusandae, quaerat, excepturi maiores quis alias, amet voluptatem non et libero perspiciatis quas. Voluptatibus velit qui amet ab dignissimos, veniam magni!'),
(41, 2, 'Staff', '   \r\n    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus debitis autem commodi? Molestiae, tenetur aspernatur dolorum ad dignissimos reprehenderit maxime fuga vitae ipsum hic? Minima earum eos quod delectus recusandae, quaerat, excepturi maiores quis alias, amet voluptatem non et libero perspiciatis quas. Voluptatibus velit qui amet ab dignissimos, veniam magni!'),
(42, 2, 'Teachers', '   \r\n    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus debitis autem commodi? Molestiae, tenetur aspernatur dolorum ad dignissimos reprehenderit maxime fuga vitae ipsum hic? Minima earum eos quod delectus recusandae, quaerat, excepturi maiores quis alias, amet voluptatem non et libero perspiciatis quas. Voluptatibus velit qui amet ab dignissimos, veniam magni!'),
(43, 38, 'Organization', '   \r\n       \r\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi enim nam et est ad inventore nulla velit impedit modi at ipsam eos dolorum dolor commodi, odit eligendi eum soluta mollitia quibusdam minima! Cum illo odio tenetur excepturi accusamus accusantium consequuntur!\r\n'),
(45, 1, 'Staff', '   \r\n    	Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur atque tempore cum provident quam, quod nulla adipisci expedita excepturi quibusdam alias vitae dolorem vero. Minus vel cum iusto sequi possimus recusandae vitae voluptatem quae atque corrupti, blanditiis eligendi nulla repudiandae.'),
(46, 1, 'Teachers', '   \r\n    	Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur atque tempore cum provident quam, quod nulla adipisci expedita excepturi quibusdam alias vitae dolorem vero. Minus vel cum iusto sequi possimus recusandae vitae voluptatem quae atque corrupti, blanditiis eligendi nulla repudiandae.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `ContID` int(11) NOT NULL AUTO_INCREMENT,
  `ContCatID` int(11) NOT NULL,
  `CountryCode` char(5) NOT NULL,
  `ContPhone` int(11) NOT NULL,
  `ContName` varchar(255) NOT NULL,
  `ContCreator` varchar(255) NOT NULL,
  `ContEmail` varchar(255) NOT NULL,
  PRIMARY KEY (`ContID`),
  KEY `ContCatID` (`ContCatID`),
  KEY `ContCreator` (`ContCreator`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ContID`, `ContCatID`, `CountryCode`, `ContPhone`, `ContName`, `ContCreator`, `ContEmail`) VALUES
(57, 36, '+254', 727143163, 'Dan', '10', 'randdanny76@gmail.com'),
(64, 1, '+254', 70739395, 'Dan', '21', 'randdanny76@gmail.com'),
(65, 38, '252', 727143163, 'Danniel', '10', 'koechvantos@gmail.com'),
(61, 1, '+254', 707393954, 'Dan', '1', 'randdanny76@gmail.com'),
(63, 1, '+252', 2147483647, 'Dan', '1', 'randdanny76@gmail.com'),
(66, 1, '+255', 2147483647, 'Dan', '21', 'randdanny76@gmail.com'),
(67, 1, '+252', 707393, 'Dan', '21', 'randdanny76@gmail.com'),
(69, 45, '+254', 707393, 'Dan', '20', 'randdanny76@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `MsgID` int(11) NOT NULL AUTO_INCREMENT,
  `MsgText` text NOT NULL,
  `MsgCreateTime` datetime DEFAULT NULL,
  `MsgSender` int(11) NOT NULL,
  PRIMARY KEY (`MsgID`),
  KEY `MsgSender` (`MsgSender`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MsgID`, `MsgText`, `MsgCreateTime`, `MsgSender`) VALUES
(48, '                    Here i am come ', '2019-02-12 10:52:42', 10),
(49, '        dx            ', '2019-02-12 10:54:23', 10),
(50, '  ded                  ', '2019-02-12 10:56:14', 10),
(51, '    ff                ', '2019-02-14 13:01:36', 10),
(52, '      ccc              ', '2019-02-14 13:10:01', 10),
(53, '              hello      ', '2019-02-14 13:10:18', 10),
(54, '   heloo                 ', '2019-02-19 13:00:11', 10),
(55, '            fff                ', '2019-02-19 13:00:57', 10),
(56, '            fff                ', '2019-02-19 13:01:57', 10),
(57, 'This is my message ', '2019-02-20 11:18:18', 28),
(58, 'This is my message ', '2019-02-20 11:18:18', 28),
(59, 'This is my message ', '2019-02-20 11:18:18', 28),
(60, 'This is my message ', '2019-02-20 11:18:19', 28),
(61, 'This is my message ', '2019-02-20 11:18:19', 28),
(62, '                    Here is the message brothers ', '2019-02-20 12:17:13', 28),
(63, '                    Here is the message brothers ', '2019-02-20 12:17:13', 28),
(64, '                    Here is the message brothers ', '2019-02-20 12:17:13', 28),
(65, '                    Here is the message brothers ', '2019-02-20 12:18:44', 28),
(66, '                    Here is the message brothers ', '2019-02-20 12:18:44', 28),
(67, '                    Here is the message brothers ', '2019-02-20 12:18:44', 28),
(68, '                    Here is the message brothers ', '2019-02-20 12:18:57', 28),
(69, '                    Here is the message brothers ', '2019-02-20 12:18:57', 28),
(70, '                    Here is the message brothers ', '2019-02-20 12:18:57', 28),
(71, '                    Here is the message brothers ', '2019-02-20 12:22:10', 28),
(72, '                    Here is the message brothers ', '2019-02-20 12:22:10', 28),
(73, '                    Here is the message brothers ', '2019-02-20 12:22:10', 28),
(74, '                    Here is the message brothers ', '2019-02-20 12:23:44', 28),
(75, '                    Here is the message brothers ', '2019-02-20 12:23:44', 28),
(76, '                    Here is the message brothers ', '2019-02-20 12:23:44', 28),
(77, '                    ', '2019-02-20 12:24:55', 28),
(78, '                    ', '2019-02-20 12:24:55', 28),
(79, '                    ', '2019-02-20 12:24:55', 28),
(80, '    Here is a call                 ', '2019-02-20 12:25:27', 28),
(81, 'ssss                    ', '2019-02-20 12:25:44', 28),
(82, 'ssss                    ', '2019-02-20 12:26:37', 28);

-- --------------------------------------------------------

--
-- Table structure for table `msgdata`
--

DROP TABLE IF EXISTS `msgdata`;
CREATE TABLE IF NOT EXISTS `msgdata` (
  `msgdataId` int(11) NOT NULL AUTO_INCREMENT,
  `MsgID` int(11) NOT NULL,
  `Recipients` int(11) NOT NULL,
  PRIMARY KEY (`msgdataId`),
  KEY `MsgID` (`MsgID`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgdata`
--

INSERT INTO `msgdata` (`msgdataId`, `MsgID`, `Recipients`) VALUES
(48, 0, 2147483647),
(49, 0, 2147483647),
(50, 1, 2147483647),
(51, 1, 2147483647),
(52, 1, 0),
(53, 1, 0),
(54, 1, 2147483647),
(55, 1, 727143163),
(56, 1, 727143163),
(57, 1, 2147483647),
(58, 1, 2147483647),
(59, 1, 2147483647),
(60, 1, 2147483647),
(61, 1, 252707393),
(62, 0, 2147483647),
(63, 0, 2147483647),
(64, 0, 2147483647),
(65, 0, 2147483647),
(66, 0, 2147483647),
(67, 0, 2147483647),
(68, 0, 2147483647),
(69, 0, 2147483647),
(70, 0, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `accountId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `accountId`, `Name`, `UserName`, `Email`, `Password`) VALUES
(10, 29, 'Evans', 'qq', 'biwottech@gmail.com', 'Evans'),
(11, 12, 'Dan', '', 'Dan', 'Evans'),
(12, 12, 'Dan', '', '', 'Evans'),
(13, 12, 'Dan', '', '', 'Evans'),
(14, 12, 'Dan', '', '', 'Evans'),
(15, 12, 'Dan', '', '', 'Evans'),
(16, 12, 'Dan', '', '', 'Evans'),
(17, 12, 'Dan', '', '', 'Evans'),
(18, 1, 'Dan', 'Dancan', 'randdanny76@gmail.com', 'Evans'),
(19, 1, 'Dan', 'Dancan', 'randdanny7@gmail.com', 'Evans'),
(20, 1, 'Daniel ', 'ill', 'ra@gmail.com', 'Evans'),
(21, 1, 'Evans ', 'biwottech', 'koechvantos@gmail.com', 'Evans'),
(22, 1, 'Dan', 'Dancan', 'randdan@gmail.com', 'Evans'),
(23, 32, 'Dan', 'biwottech@gmail.com', 'ray76@gmail.com', 'Evans'),
(24, 33, 'Dan', 'biwottech@gmail.com', 'ran76@gmail.com', 'Evans'),
(25, 34, 'Dan', 'biwottech@gmail.com', 'randd76@gmail.com', 'Evans'),
(27, 38, 'Dan', 'biwottech@gmail.com', 'randdann558y6@gmail.com', 'Evans'),
(28, 40, 'Dan', NULL, 'biwott@gmail.com', '$2y$10$Tj4bzn1/Yv4WYsKvigDtlObtxZm1FBBM7METOjN00ieu2YOrUNAA.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
