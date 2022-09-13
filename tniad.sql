-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: tniad
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `daily`
--

DROP TABLE IF EXISTS `daily`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `daily_h`
--

DROP TABLE IF EXISTS `daily_h`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_h` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dailyinlog`
--

DROP TABLE IF EXISTS `dailyinlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dailyinlog` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dailyinlog_h`
--

DROP TABLE IF EXISTS `dailyinlog_h`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dailyinlog_h` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destination` (
  `source` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `destination` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `domain` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dtm` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domains` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `dname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `grpid` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `grpname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `grpgroup` varchar(2) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`rowid`),
  UNIQUE KEY `grpid` (`grpid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hosts`
--

DROP TABLE IF EXISTS `hosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hosts` (
  `hostid` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hostname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ip2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `ip3` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `mac` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hostdesc` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `bw` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `npsn` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `activedt` date DEFAULT NULL,
  `group1` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `group2` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `group3` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `group4` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `group5` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `group6` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `group7` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `ping` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `ping2` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `ping3` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `snmp` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `top` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  `urutanh` int(11) NOT NULL,
  PRIMARY KEY (`hostid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hourly`
--

DROP TABLE IF EXISTS `hourly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hourly` (
  `host` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `ip2` varchar(20) NOT NULL,
  `checkdt` date NOT NULL,
  `checkhr` int(11) NOT NULL,
  `trafficin` int(11) NOT NULL,
  `trafficout` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hourly_h`
--

DROP TABLE IF EXISTS `hourly_h`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hourly_h` (
  `host` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `ip2` varchar(20) NOT NULL,
  `checkdt` date NOT NULL,
  `checkhr` int(11) NOT NULL,
  `trafficin` int(11) NOT NULL,
  `trafficout` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kodam`
--

DROP TABLE IF EXISTS `kodam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kodam` (
  `kodamid` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kodamname` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `map` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `top` int(11) DEFAULT '100',
  `left` int(11) DEFAULT '100',
  `tot` int(11) NOT NULL DEFAULT '0',
  `ok` int(11) NOT NULL DEFAULT '0',
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`kodamid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `korem`
--

DROP TABLE IF EXISTS `korem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korem` (
  `kodam` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `korem` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `top` int(11) NOT NULL,
  `left` int(11) NOT NULL,
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rowid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mrtg`
--

DROP TABLE IF EXISTS `mrtg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mrtg` (
  `ip` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `host` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `trafficin` int(11) NOT NULL,
  `trafficout` int(11) NOT NULL,
  `logdtm` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `propinsi`
--

DROP TABLE IF EXISTS `propinsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propinsi` (
  `Prop` varchar(9) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `Deskripsi` varchar(26) CHARACTER SET utf8 DEFAULT NULL,
  `leftpix` int(11) NOT NULL,
  `toppix` int(11) NOT NULL,
  `tot` int(11) NOT NULL,
  `ok` int(11) NOT NULL,
  `maps` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`Prop`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `urutan_group2`
--

DROP TABLE IF EXISTS `urutan_group2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urutan_group2` (
  `kodamid` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `urutan` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kodamid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `uname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `upwd` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `ugrp` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `uwhere` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `centermap` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-10 12:01:46
