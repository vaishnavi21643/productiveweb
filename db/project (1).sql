-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2024 at 06:31 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `UserName` varchar(30) NOT NULL DEFAULT '',
  `Password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`UserName`, `Password`) VALUES
('Admin', 'asdf'),
('root', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

DROP TABLE IF EXISTS `ans`;
CREATE TABLE IF NOT EXISTS `ans` (
  `ExpertID` int NOT NULL,
  `UserID` int NOT NULL,
  `QueID` int NOT NULL,
  `Question` varchar(300) NOT NULL,
  `Answer` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`ExpertID`, `UserID`, `QueID`, `Question`, `Answer`) VALUES
(1, 13, 1, 'What is HTML?', 'Hypertext Markup Language'),
(1, 13, 3, 'What is CSS?', 'cascading style sheet'),
(1, 17, 4, 'helloooo', 'hi how ru\r\n'),
(1, 17, 5, 'hello mam how to do glow effect in css\r\n', 'example\r\n.glow-box {\r\n    width: 200px;\r\n    height: 100px;\r\n    background-color: #333;\r\n    color: white;\r\n    text-align: center;\r\n    line-height: 100px;\r\n    font-size: 20px;\r\n    border-radius: 10px;\r\n    box-shadow: 0 0 20px 5px rgba(0, 255, 255, 0.8);\r\n}\r\nTo create a glow effect in CSS, you can use the box-shadow or text-shadow properties, depending on whether you want to apply the effect ');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_email` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `username`, `title`, `author`, `category`, `file_path`) VALUES
(1, 'vaishnavi', 'newbook', 'smndfd', 'horror', 'uploads/html.pdf'),
(2, 'vaishnavi', 'book2', 'author', 'selfhelp', 'uploads/html.pdf'),
(3, 'vaishnavi', 'me', 'me', 'selfhelp', 'uploads/html.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `Subject` varchar(10) NOT NULL,
  `ChapID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) NOT NULL,
  `Info` varchar(5000) NOT NULL,
  PRIMARY KEY (`ChapID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expertsugg`
--

DROP TABLE IF EXISTS `expertsugg`;
CREATE TABLE IF NOT EXISTS `expertsugg` (
  `ExpertID` int NOT NULL DEFAULT '0',
  `Name` varchar(50) NOT NULL,
  `Email_id` varchar(500) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  PRIMARY KEY (`ExpertID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `expertsugg`
--

INSERT INTO `expertsugg` (`ExpertID`, `Name`, `Email_id`, `Subject`, `Description`) VALUES
(1, 'Parth Varde', 'parthvarde50@gmail.com', 'About Chapter', 'Insert new chapter in CSS course');

-- --------------------------------------------------------

--
-- Table structure for table `expert_info`
--

DROP TABLE IF EXISTS `expert_info`;
CREATE TABLE IF NOT EXISTS `expert_info` (
  `Expert_id` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL DEFAULT '',
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email_id` varchar(40) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  PRIMARY KEY (`Expert_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `expert_info`
--

INSERT INTO `expert_info` (`Expert_id`, `FirstName`, `MiddleName`, `LastName`, `Email_id`, `Gender`, `UserName`, `Password`) VALUES
(1, 'vaishnavi', 'pandurang', 'dhanavade', 'vaishnavidhanavvade9@gmail.com', 'female', 'vaishnavi', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Description` varchar(5000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Description`, `name`, `email`) VALUES
('Hello', 'Parth Varde', 'parthvarde50@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`) VALUES
(31, 'hjbjh', 'ghvhfc'),
(34, 'python', 'snake'),
(36, 'sbkdfjb', 'jksvjhbsfghrymkjjffffffffffffffffffffff\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `Book` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `OrderNo` int NOT NULL AUTO_INCREMENT,
  `Full` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Addr` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `City` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `PinCode` int NOT NULL,
  `State` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  PRIMARY KEY (`OrderNo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Book`, `OrderNo`, `Full`, `Addr`, `City`, `PinCode`, `State`, `Email`, `Mobile`) VALUES
('HTML Complete Reference', 4, 'Parth Varde', 'dshjgjhdsjg					', 'Ahmedabad', 380051, 'Gujarat', 'parthvarde50@gmail.com', '8488061712'),
('HTML Complete Reference', 5, 'vaish', '			akjsbhjbas		', 'pune', 411047, 'Maharashtra', 'vaishnavidhanavade9@gmail.com', '8665554331'),
('HTML Complete Reference', 6, 'vaish', 'S No 82/6/1 Karmabhumi', 'Pune', 411047, 'Maharashtra', 'sdjbfhjsh@gmail.com', '8665554331'),
('HTML Complete Reference', 7, 'vaishnavi', 'S No 82/6/1 Karmabhumi', 'Pune', 411047, 'Maharashtra', 'sdjbfhjsh@gmail.com', '8665554331');

-- --------------------------------------------------------

--
-- Table structure for table `que`
--

DROP TABLE IF EXISTS `que`;
CREATE TABLE IF NOT EXISTS `que` (
  `QueID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  PRIMARY KEY (`QueID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `que`
--

INSERT INTO `que` (`QueID`, `UserID`, `UserName`, `Description`) VALUES
(1, 13, 'parth', 'What is HTML?'),
(3, 13, 'parth', 'What is CSS?'),
(4, 17, 'vaishnavi', 'helloooo'),
(5, 17, 'vaishnavi', 'hello mam how to do glow effect in css\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `responsesugg`
--

DROP TABLE IF EXISTS `responsesugg`;
CREATE TABLE IF NOT EXISTS `responsesugg` (
  `ExpertID` int NOT NULL DEFAULT '0',
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`ExpertID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `Title` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Info` varchar(153) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Dinfo` varchar(850) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  UNIQUE KEY `Title` (`Title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `User_id` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Email_id` varchar(40) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(40) NOT NULL,
  PRIMARY KEY (`User_id`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_id`, `FirstName`, `LastName`, `Gender`, `Email_id`, `UserName`, `Password`) VALUES
(13, 'Parth', 'Varde', 'male', 'parthvarde50@gmail.com', 'parth', 'asdf'),
(14, 'Dhaval ', 'Dave', 'male', 'dhavaldave055@gmail.com', 'dhaval', 'asdf'),
(15, 'vaishnavi', 'dhanavade', 'female', 'vaishnavidhanavade9@gmail.com', '26vaishnav', 'vaishnavi123'),
(17, 'vaishnavi', 'dhanavade', 'female', 'vaishnavidhanavade9@gmail.com', 'vaishnavi', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
