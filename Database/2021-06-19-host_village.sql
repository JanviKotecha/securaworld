-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 06:23 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `host_village`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(256) NOT NULL,
  `eml` varchar(250) NOT NULL,
  `mob` varchar(250) NOT NULL,
  `sub` text NOT NULL,
  `msg` varchar(500) NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nm`, `eml`, `mob`, `sub`, `msg`, `dt`) VALUES
(5, 'abcd', 'abc@gmail.com', '9876543210', 'no', 'no', '2021-06-16 17:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `image`) VALUES
(3, 1, '1623904416.jpg'),
(4, 2, '1623906615.jpg'),
(7, 2, '1623906699.jpg'),
(12, 4, '1623929709.jpg'),
(13, 4, '1623929732.jpg'),
(15, 3, '1623930363.jpg'),
(23, 1, '1623990877.jpg'),
(24, 3, '1623990992.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE IF NOT EXISTS `gallery_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `category`) VALUES
(1, 'Temple'),
(2, 'Hospital'),
(3, 'School'),
(4, 'collage');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `dt`) VALUES
(1, 'admin', 'admin', '2021-06-16 04:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(250) NOT NULL,
  `eml` varchar(250) NOT NULL,
  `mob` varchar(250) NOT NULL,
  `addr` varchar(2000) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`eml`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nm`, `eml`, `mob`, `addr`, `img`) VALUES
(1, 'Sanket Mahesh Gorvadkar gfhg', 'alfacleningservices@gmail.com', '+91-9881148955', 'Nashikk', '1623998459.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  `tit` varchar(250) NOT NULL,
  `des` text NOT NULL,
  `link` varchar(250) NOT NULL,
  `lintyp` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `img`, `tit`, `des`, `link`, `lintyp`) VALUES
(2, '1624012637.jpg', 'Dolor Sitema', 'Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata fgjhMinim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata fgjh', '--------------', 'Outer'),
(8, '1624007908.jpg', 'xyz', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi', '*****', 'Outer'),
(11, '1624012223.jpg', 'hhh', 'mbjkyjk', '*****', 'Inner');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insta` varchar(250) NOT NULL,
  `fb` varchar(250) NOT NULL,
  `youtb` varchar(250) NOT NULL,
  `twit` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `insta`, `fb`, `youtb`, `twit`) VALUES
(1, '--', '--', '--', '--');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
