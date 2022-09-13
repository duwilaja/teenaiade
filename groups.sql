-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2015 at 12:45 AM
-- Server version: 5.1.46
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `grpid` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `grpname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `grpgroup` varchar(2) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`rowid`),
  UNIQUE KEY `grpid` (`grpid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`rowid`, `grpid`, `grpname`, `grpgroup`) VALUES
(1, 'SPEEDY', 'SPEEDY', '1'),
(2, 'GSM', 'GSM', '1'),
(3, 'VSAT', 'VSAT', '1'),
(4, 'SD', 'SD', '2'),
(5, 'SMP', 'SMP', '2'),
(6, 'SMA', 'SMA', '2'),
(8, '20', '20', '99'),
(9, '50', '50', '99'),
(10, '10', '10', '99');
