-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 07:06 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mir`
--

-- --------------------------------------------------------

--
-- Table structure for table `1_db`
--

CREATE TABLE IF NOT EXISTS `1_db` (
  `imdbid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` varchar(12) NOT NULL,
  `mpaa` varchar(20) NOT NULL,
  `movie_rating` int(11) NOT NULL,
  `genre` varchar(15) NOT NULL,
  `release_date` datetime NOT NULL,
  `runtime` varchar(15) NOT NULL,
  `director` varchar(50) NOT NULL,
  `writers` varchar(50) NOT NULL,
  `actors` varchar(50) NOT NULL,
  `plot` varchar(50) NOT NULL,
  `poster` text NOT NULL,
  `imdblink` text NOT NULL,
  PRIMARY KEY (`imdbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ginfo`
--

CREATE TABLE IF NOT EXISTS `ginfo` (
  `imdbid` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL,
  PRIMARY KEY (`imdbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ninfo`
--

CREATE TABLE IF NOT EXISTS `ninfo` (
  `imdbid` int(11) NOT NULL,
  `release_date` datetime NOT NULL,
  `runtime` varchar(20) NOT NULL,
  `directors` varchar(50) NOT NULL,
  `writers` varchar(50) NOT NULL,
  `actors` varchar(50) NOT NULL,
  `plot` varchar(50) NOT NULL,
  `poster` text NOT NULL,
  `imdblink` text NOT NULL,
  PRIMARY KEY (`imdbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinfo`
--

CREATE TABLE IF NOT EXISTS `pinfo` (
  `imdbid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `year` varchar(12) NOT NULL,
  `mpaa` varchar(15) NOT NULL,
  `movie_rating` varchar(15) NOT NULL,
  `genre` varchar(15) NOT NULL,
  PRIMARY KEY (`imdbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
