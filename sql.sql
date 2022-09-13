-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2014 at 08:33 AM
-- Server version: 5.1.46
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

DROP TABLE IF EXISTS `daily`;
CREATE TABLE IF NOT EXISTS `daily` (
  `host` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `checkdt` date DEFAULT NULL,
  `trafficin` int(11) DEFAULT NULL,
  `trafficout` int(11) DEFAULT NULL,
  `ping` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ping2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log1` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log3` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  KEY `host` (`host`),
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `daily`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyinlog`
--

DROP TABLE IF EXISTS `dailyinlog`;
CREATE TABLE IF NOT EXISTS `dailyinlog` (
  `host` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `group1` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `checkdt` date DEFAULT NULL,
  `trafficin` int(11) DEFAULT NULL,
  `trafficout` int(11) DEFAULT NULL,
  `ping` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ping2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log1` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log3` varchar(1) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dailyinlog`
--


-- --------------------------------------------------------

--
-- Table structure for table `dailyinlog_h`
--

DROP TABLE IF EXISTS `dailyinlog_h`;
CREATE TABLE IF NOT EXISTS `dailyinlog_h` (
  `host` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `group1` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `checkdt` date DEFAULT NULL,
  `trafficin` int(11) DEFAULT NULL,
  `trafficout` int(11) DEFAULT NULL,
  `ping` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ping2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log1` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log3` varchar(1) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dailyinlog_h`
--


-- --------------------------------------------------------

--
-- Table structure for table `daily_h`
--

DROP TABLE IF EXISTS `daily_h`;
CREATE TABLE IF NOT EXISTS `daily_h` (
  `host` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `checkdt` date DEFAULT NULL,
  `trafficin` int(11) DEFAULT NULL,
  `trafficout` int(11) DEFAULT NULL,
  `ping` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ping2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log1` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `log3` varchar(1) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `daily_h`
--


-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `source` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `destination` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `domain` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dtm` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `destination`
--

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
CREATE TABLE IF NOT EXISTS `domains` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `dname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `domains`
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
(7, '10', '10', '99'),
(8, '20', '20', '99'),
(9, '50', '50', '99');

-- --------------------------------------------------------

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
CREATE TABLE IF NOT EXISTS `hosts` (
  `hostid` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hostname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ip2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip3` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `mac` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hostdesc` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `bw` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `npsn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `activedt` date NULL,
  `group1` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `group2` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `group3` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `group4` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `group5` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `group6` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `group7` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `ping` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `ping2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ping3` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `snmp` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`hostid`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hosts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mrtg`
--

DROP TABLE IF EXISTS `mrtg`;
CREATE TABLE IF NOT EXISTS `mrtg` (
  `ip` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `host` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `trafficin` int(11) NOT NULL,
  `trafficout` int(11) NOT NULL,
  `logdtm` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mrtg`
--


-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

DROP TABLE IF EXISTS `propinsi`;
CREATE TABLE IF NOT EXISTS `propinsi` (
  `Prop` varchar(9) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `Deskripsi` varchar(26) CHARACTER SET utf8 DEFAULT NULL,
  `leftpix` int(11) NOT NULL,
  `toppix` int(11) NOT NULL,
  `tot` int(11) NOT NULL,
  `ok` int(11) NOT NULL,
  PRIMARY KEY (`Prop`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`Prop`, `Deskripsi`, `leftpix`, `toppix`, `tot`, `ok`) VALUES
('NAD', ' Nanggroe Aceh Darussalam', 230, 240, 0, 0),
('Sumut', 'Sumatera Utara', 280, 280, 0, 0),
('Sumbar', 'Sumatera Barat', 310, 340, 0, 0),
('Bengkulu', 'Bengkulu', 350, 390, 0, 0),
('Riau', 'Riau', 350, 340, 0, 0),
('Kepri', 'Kepulauan Riau', 400, 330, 0, 0),
('Jambi', 'Jambi', 380, 370, 0, 0),
('Sumsel', 'Sumatera Selatan', 410, 410, 0, 0),
('Lampung', 'Lampung', 410, 450, 0, 0),
('Babel', 'Kepulauan Bangka Belitung', 440, 390, 0, 0),
('DKI', 'DKI Jakarta', 460, 480, 0, 0),
('Jabar', 'Jawa Barat', 470, 500, 0, 0),
('Banten', 'Banten', 430, 480, 0, 0),
('Jateng', 'Jawa Tengah', 510, 490, 0, 0),
('DIY', 'Daerah Istimewa Yogyakarta', 495, 500, 0, 0),
('Jatim', 'Jawa Timur', 560, 500, 0, 0),
('Kalbar', 'Kalimantan Barat', 520, 370, 0, 0),
('Kalteng', 'Kalimantan Tengah', 570, 390, 0, 0),
('Kalsel', 'Kalimantan Selatan', 620, 410, 0, 0),
('Kaltim', 'Kalimantan Timur', 660, 340, 0, 0),
('Kaltara', 'Kalimantan Utara', 590, 350, 0, 0),
('Bali', 'Bali', 620, 520, 0, 0),
('NTB', 'Nusa Tenggara Barat', 660, 520, 0, 0),
('NTT', 'Nusa Tenggara Timur', 800, 550, 0, 0),
('Sulbar', 'Sulawesi Barat', 710, 380, 0, 0),
('Sulut', 'Sulawesi Utara', 800, 330, 0, 0),
('Sulteng', 'Sulawesi Tengah', 740, 380, 0, 0),
('Sulsel', 'Sulawesi Selatan', 720, 430, 0, 0),
('Sultra', 'Sulawesi Tenggara', 760, 420, 0, 0),
('Gorontalo', 'Gorontalo', 750, 330, 0, 0),
('Maluku', 'Maluku', 900, 410, 0, 0),
('Malut', 'Maluku Utara', 880, 330, 0, 0),
('Papbar', 'Papua Barat', 1000, 370, 0, 0),
('Papua', 'Papua', 1120, 420, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `uname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `upwd` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `ugrp` varchar(2) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upwd`, `ugrp`) VALUES
('a', 'a aja', 'a', '0'),
('b', 'cssss', 'd', '5');


