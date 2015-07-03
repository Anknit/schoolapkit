
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2015 at 12:40 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a8335275_WorkDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `cityList`
--

CREATE TABLE `cityList` (
  `cityId` int(11) NOT NULL,
  `cityName` varchar(45) NOT NULL,
  PRIMARY KEY (`cityId`),
  UNIQUE KEY `cityId_UNIQUE` (`cityId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cityList`
--

INSERT INTO `cityList` VALUES(1, 'Delhi-NCR');
INSERT INTO `cityList` VALUES(2, 'Agra');
INSERT INTO `cityList` VALUES(3, 'Mathura');
INSERT INTO `cityList` VALUES(4, 'Gwalior');

-- --------------------------------------------------------

--
-- Table structure for table `eventList`
--

CREATE TABLE `eventList` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(200) NOT NULL,
  `eventDate` varchar(45) NOT NULL,
  `cityId` varchar(45) NOT NULL,
  PRIMARY KEY (`eventId`),
  UNIQUE KEY `eventId_UNIQUE` (`eventId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventList`
--

INSERT INTO `eventList` VALUES(1, 'St Andrews Annual Function', '2015-03-15', '2');
INSERT INTO `eventList` VALUES(2, 'Inter-school Dance Competition', '2015-04-06', '1');
INSERT INTO `eventList` VALUES(3, 'Girls Art Competition', '2015-03-28', '3');
INSERT INTO `eventList` VALUES(4, 'High School Singing Competition', '2015-04-11', '4');

-- --------------------------------------------------------

--
-- Table structure for table `locationlist`
--

CREATE TABLE `locationlist` (
  `locationId` int(11) NOT NULL,
  `locationName` varchar(45) NOT NULL,
  `cityId` int(11) NOT NULL,
  PRIMARY KEY (`locationId`),
  UNIQUE KEY `locationId_UNIQUE` (`locationId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationlist`
--

INSERT INTO `locationlist` VALUES(1, 'Noida-Sector-50', 1);
INSERT INTO `locationlist` VALUES(2, 'Kamla-Nagar', 2);
INSERT INTO `locationlist` VALUES(3, 'DayalBagh', 2);
INSERT INTO `locationlist` VALUES(4, 'Vrindavan', 3);
INSERT INTO `locationlist` VALUES(5, 'KeshavPuram', 4);

-- --------------------------------------------------------

--
-- Table structure for table `schoollist`
--

CREATE TABLE `schoollist` (
  `schoolId` int(11) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `cityId` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `schoolLink` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`schoolId`),
  UNIQUE KEY `schoolId_UNIQUE` (`schoolId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoollist`
--

INSERT INTO `schoollist` VALUES(1, 'Kothari International School', 1, 1, 'www.kothariinternational.com');
INSERT INTO `schoollist` VALUES(2, 'DPS Noida', 1, 1, 'www.dpsnoida.com');
INSERT INTO `schoollist` VALUES(3, 'St. Andrews School', 2, 2, 'www.standrewsagra.com');
INSERT INTO `schoollist` VALUES(4, 'Saraswati Vidya Mandir', 2, 2, 'www.svmschool.com');
INSERT INTO `schoollist` VALUES(5, 'Dolly''s Public School', 2, 2, 'www.dollypublicschool.com');
INSERT INTO `schoollist` VALUES(6, 'Radhakrishna Public school', 2, 3, 'www.rkpublicschool.com');
INSERT INTO `schoollist` VALUES(7, 'Prelude Public School', 2, 3, 'www.preludeschool.com');
INSERT INTO `schoollist` VALUES(8, 'Radha Girls School', 3, 4, 'www.radhaschool.com');
INSERT INTO `schoollist` VALUES(9, 'Montfort School', 4, 5, 'www.montfort.com');
