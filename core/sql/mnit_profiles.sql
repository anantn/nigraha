-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 31, 2006 at 08:42 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `mnit_profiles`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `administration`
-- 

CREATE TABLE `administration` (
  `userid` varchar(10) collate latin1_general_ci NOT NULL default '',
  `alias` varchar(20) collate latin1_general_ci NOT NULL default '',
  `password` varchar(15) collate latin1_general_ci NOT NULL default '',
  `accesslvl` enum('user','sadmin','admin','dadmin','post','dpost','ban') collate latin1_general_ci NOT NULL default 'user',
  `fullname` varchar(30) collate latin1_general_ci NOT NULL default '',
  `paddress` text collate latin1_general_ci NOT NULL,
  `dept` enum('AR','CE','CH','CP','CY','EC','EE','HS','IT','MA','ME','MT','PH','HO','SD','TP','AA','SA','FA','AD') collate latin1_general_ci NOT NULL default 'AR',
  `deptposts` text collate latin1_general_ci NOT NULL,
  `phone` varchar(30) collate latin1_general_ci default NULL,
  `intercom` varchar(10) collate latin1_general_ci NOT NULL default '',
  `email` varchar(60) collate latin1_general_ci default NULL,
  `miscdata` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `administration`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `faculty`
-- 

CREATE TABLE `faculty` (
  `sno` int(11) NOT NULL auto_increment,
  `userid` varchar(6) collate latin1_general_ci NOT NULL default '',
  `alias` varchar(20) collate latin1_general_ci NOT NULL default '',
  `accesslvl` enum('user','sadmin','admin','dadmin','post','dpost','ban') collate latin1_general_ci NOT NULL default 'user',
  `fullname` varchar(30) collate latin1_general_ci NOT NULL default '',
  `paddress` text collate latin1_general_ci NOT NULL,
  `address` text collate latin1_general_ci NOT NULL,
  `gender` enum('M','F') collate latin1_general_ci NOT NULL default 'M',
  `dept` enum('AR','CE','CH','CP','CY','EC','EE','HS','IT','MA','ME','MT','PH','HO','SD','TP','AA','SA','FA','AD') collate latin1_general_ci NOT NULL default 'AR',
  `deptposts` text collate latin1_general_ci NOT NULL,
  `qualification` text collate latin1_general_ci NOT NULL,
  `phone` varchar(30) collate latin1_general_ci NOT NULL default '',
  `intercom` varchar(10) collate latin1_general_ci NOT NULL default '',
  `mobile` varchar(13) collate latin1_general_ci NOT NULL default '',
  `alternate_email` varchar(60) collate latin1_general_ci NOT NULL default '',
  `specialisation` text collate latin1_general_ci NOT NULL,
  `achievements/awards` text collate latin1_general_ci NOT NULL,
  `publications` mediumtext collate latin1_general_ci NOT NULL,
  `research_works` text collate latin1_general_ci NOT NULL,
  `showfields` text collate latin1_general_ci NOT NULL,
  `posts` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`sno`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=23 ;

-- 
-- Dumping data for table `faculty`
-- 

INSERT INTO `faculty` (`sno`, `userid`, `alias`, `accesslvl`, `fullname`, `paddress`, `address`, `gender`, `dept`, `deptposts`, `qualification`, `phone`, `intercom`, `mobile`, `alternate_email`, `specialisation`, `achievements/awards`, `publications`, `research_works`, `showfields`, `posts`) VALUES 
(17, 'CE14', 'rgoyal', 'dadmin', 'Rohit Goyal', '3-Ta-41, Jawahar Nagar\r\nJaipur 302 004', '3-Ta-41, Jawahar Nagar\r\nJaipur 302 004', 'M', 'CE', '', '', '2651971', '3263', '9314506900', 'rgoyal_jp@yahoo.com', '', '', '', '', 'a:2:{i:0;s:9:"accesslvl";i:1;s:8:"paddress";}', 'a:1:{i:0;s:9:"MNIT,User";}'),
(21, 'CP04', 'msgaur', 'sadmin', 'Manoj Singh Gaur', 'Jaipur', 'Jaipur', 'M', 'CP', '', '', '01412702460', '3227', '', 'gaurms@gmail.com', '', '', '', '', 'a:2:{i:0;s:9:"accesslvl";i:1;s:8:"paddress";}', 'a:1:{i:0;s:9:"MNIT,User";}'),
(22, 'CP08', 'vlaxmi', 'dadmin', 'Vijay Laxmi', 'Jaipur', 'Jaipur', 'F', 'CP', '', '', '01412702460', '3333', '', 'vlgaur@yahoo.co.in', '', '', '', '', 'a:2:{i:0;s:9:"accesslvl";i:1;s:8:"paddress";}', 'a:1:{i:0;s:9:"MNIT,User";}');

-- --------------------------------------------------------

-- 
-- Table structure for table `student`
-- 

CREATE TABLE `student` (
  `userid` varchar(6) collate latin1_general_ci NOT NULL default '',
  `alias` varchar(20) collate latin1_general_ci NOT NULL default '',
  `accesslvl` enum('user','sadmin','admin','dadmin','post','dpost','ban') collate latin1_general_ci NOT NULL default 'user',
  `fullname` varchar(30) collate latin1_general_ci NOT NULL default '',
  `gender` enum('M','F') collate latin1_general_ci NOT NULL default 'M',
  `bloodgp` varchar(5) collate latin1_general_ci NOT NULL default '',
  `nationality` varchar(50) collate latin1_general_ci NOT NULL default '',
  `paddress` text collate latin1_general_ci NOT NULL,
  `dept` enum('AR','CE','CH','CP','CY','EC','EE','HS','IT','MA','ME','MT','PH','HO','SD','TP','AA','SA','FA','AD') collate latin1_general_ci NOT NULL default 'AR',
  `deptposts` varchar(80) collate latin1_general_ci NOT NULL default '',
  `fathersname` varchar(30) collate latin1_general_ci NOT NULL default '',
  `fathersoccupation` varchar(75) collate latin1_general_ci NOT NULL default '',
  `mothersname` varchar(30) collate latin1_general_ci NOT NULL default '',
  `phone` varchar(30) collate latin1_general_ci NOT NULL default '',
  `altmail` varchar(60) collate latin1_general_ci NOT NULL default '',
  `localguardian` varchar(50) collate latin1_general_ci NOT NULL default '',
  `localphone` varchar(30) collate latin1_general_ci NOT NULL default '',
  `neareststation` varchar(75) collate latin1_general_ci NOT NULL default '',
  `posts` text collate latin1_general_ci NOT NULL,
  `about` text collate latin1_general_ci NOT NULL,
  `miscdata` text collate latin1_general_ci NOT NULL,
  `showfields` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `student`
-- 

INSERT INTO `student` (`userid`, `alias`, `accesslvl`, `fullname`, `gender`, `bloodgp`, `nationality`, `paddress`, `dept`, `deptposts`, `fathersname`, `fathersoccupation`, `mothersname`, `phone`, `altmail`, `localguardian`, `localphone`, `neareststation`, `posts`, `about`, `miscdata`, `showfields`) VALUES 
('040701', 'test', 'user', 'Abhishek Golchha', 'M', '', '', 'Test', 'CH', '', '', '', '', '0938902380', '', '', '0', '', 'a:1:{i:0;s:9:"MNIT,User";}', '', '', 'a:2:{i:0;s:9:"accesslvl";i:1;s:8:"paddress";}');
