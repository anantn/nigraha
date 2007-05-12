-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 31, 2006 at 08:42 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `mnit_library`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `archive`
-- 

CREATE TABLE `archive` (
  `idno` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text NOT NULL,
  `edition` varchar(50) NOT NULL default '',
  `ISBN` varchar(13) NOT NULL default '',
  `appcost` varchar(20) NOT NULL default '',
  `booktype` enum('Reference','Course','Application') NOT NULL default 'Reference',
  `recoby` varchar(50) NOT NULL default '',
  `recoon` date NOT NULL default '0000-00-00',
  `purchased` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `archive`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `books`
-- 

CREATE TABLE `books` (
  `idno` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text NOT NULL,
  `edition` varchar(50) NOT NULL default '',
  `ISBN` varchar(30) NOT NULL default '',
  `appcost` varchar(20) NOT NULL default '',
  `booktype` enum('Reference','Course','Application') NOT NULL default 'Reference',
  `recoby` varchar(50) NOT NULL default '',
  `recoon` date NOT NULL default '0000-00-00',
  `dept` char(2) NOT NULL default '',
  `status` enum('Pending','Approved','Purchased','Rejected') NOT NULL default 'Pending',
  `generated` enum('0','1') NOT NULL default '0',
  `genon` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `books`
-- 

INSERT INTO `books` (`idno`, `title`, `author`, `publisher`, `edition`, `ISBN`, `appcost`, `booktype`, `recoby`, `recoon`, `dept`, `status`, `generated`, `genon`) VALUES 
(5, 'Proramming Principles in C', 'Anant Narayanan', 'Addison & Welsley', '2nd Edition 2005', '58669A34rD235', '650', 'Application', 'anant', '2005-09-30', 'CP', 'Approved', '1', '0000-00-00'),
(6, 'Test', 'Test', 'test', 'test', '39075075', '1500', 'Application', 'anant', '2005-09-30', 'CP', 'Pending', '0', '0000-00-00'),
(7, 'Computer Networks', 'Morris Mano', 'PHI', '2nd Edition', '125545486464', '1000', 'Application', 'anant', '2005-09-30', 'CP', 'Approved', '1', '0000-00-00'),
(8, 'Computer Networks', 'Morris Mano', 'PHI', '2nd Edition', '125545486464', '1000', 'Application', 'anant', '2005-09-30', 'CP', 'Rejected', '0', '0000-00-00'),
(17, 'DNS and Bind', 'Albitz and Liu', 'O Reilly (Shroff Publishers India)', 'Second', 'ISBN 81-7366-', '350', 'Application', 'vlaxmi', '2005-10-01', 'CP', 'Approved', '1', '0000-00-00');
