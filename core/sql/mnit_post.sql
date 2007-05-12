-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 31, 2006 at 08:42 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `mnit_post`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

CREATE TABLE `news` (
  `idno` int(11) NOT NULL auto_increment,
  `headline` varchar(100) NOT NULL default '',
  `data` text NOT NULL,
  `postby` varchar(50) NOT NULL default '',
  `dept` enum('AR','CE','CH','CP','CY','EC','EE','HS','IT','MA','ME','MT','PH','HO','SD','TP','AA','SA','FA','AD') NOT NULL default 'AR',
  `postedon` date NOT NULL default '0000-00-00',
  `approvedon` date NOT NULL default '0000-00-00',
  `itemarea` enum('internal','department','central') NOT NULL default 'internal',
  `approvedby` varchar(50) NOT NULL default '',
  `status` enum('pending','active','archived','rejected','returned') NOT NULL default 'pending',
  `lastmodified` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `news`
-- 

INSERT INTO `news` (`idno`, `headline`, `data`, `postby`, `dept`, `postedon`, `approvedon`, `itemarea`, `approvedby`, `status`, `lastmodified`) VALUES 
(1, 'cool first try', 'Only text as of now. WYSIWYG and file upload will soon be added though...', 'Rahul Murmuria', 'AR', '2005-10-23', '0000-00-00', 'department', '', 'active', '2005-10-23'),
(2, 'The first internal Msg', 'All students of hostel have been debarded from the hostel.\r\n\r\nAs per Order by someone who does not concern the hostel administration atall!', 'Rahul Murmuria', 'CP', '2005-10-24', '0000-00-00', 'internal', '', 'pending', '2005-10-24');

-- --------------------------------------------------------

-- 
-- Table structure for table `notices`
-- 

CREATE TABLE `notices` (
  `idno` int(11) NOT NULL auto_increment,
  `headline` varchar(100) NOT NULL default '',
  `data` text NOT NULL,
  `postby` varchar(50) NOT NULL default '',
  `dept` enum('AR','CE','CH','CP','CY','EC','EE','HS','IT','MA','ME','MT','PH','HO','SD','TP','AA','SA','FA','AD') NOT NULL default 'AR',
  `postedon` date NOT NULL default '0000-00-00',
  `approvedon` date NOT NULL default '0000-00-00',
  `itemarea` enum('internal','department','central') NOT NULL default 'internal',
  `approvedby` varchar(50) NOT NULL default '',
  `status` enum('pending','active','archived','rejected','returned') NOT NULL default 'pending',
  `lastmodified` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `notices`
-- 

INSERT INTO `notices` (`idno`, `headline`, `data`, `postby`, `dept`, `postedon`, `approvedon`, `itemarea`, `approvedby`, `status`, `lastmodified`) VALUES 
(1, 'So a Notice now', 'Only text as of now. WYSIWYG and file upload will soon be added though...', 'Rahul Murmuria', 'AR', '2005-10-24', '0000-00-00', 'central', '', 'pending', '2005-10-24');
