-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2013 at 03:20 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bnation`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `for` int(11) NOT NULL COMMENT 'story id',
  `by` int(11) NOT NULL COMMENT 'uid',
  `review` int(11) NOT NULL COMMENT '1-fine ; 0-spam',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `review`
--


-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL COMMENT '1-story ; 2-reply',
  `tagline` varchar(100) DEFAULT NULL,
  `content` longtext,
  `by` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `tagline` (`tagline`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stories`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Abondoned/Not-in-use/Using-usernames table instead',
  `lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT 'Abondoned/Not-in-use/Using-usernames table instead',
  `uid` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `is_verified` int(1) DEFAULT NULL,
  `timestamp` int(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `ocuppation` varchar(100) DEFAULT NULL,
  `occupationat` varchar(100) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL COMMENT 'current;hometown',
  `pp` int(255) DEFAULT NULL,
  `pp_dimensions` varchar(11) DEFAULT NULL COMMENT 'top;left',
  `gender` int(1) DEFAULT NULL COMMENT '0-f;1-m',
  `fbid` int(255) DEFAULT NULL COMMENT 'facebook id',
  `setup` int(2) DEFAULT NULL COMMENT '1-done; 0-none',
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

