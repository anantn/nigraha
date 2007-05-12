-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 31, 2006 at 08:42 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `mnit_ce`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `info_courses`
-- 

CREATE TABLE `info_courses` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `info_courses`
-- 

INSERT INTO `info_courses` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Course Structure and Syllabus', 0, '1', 'header', 'Rahul Murmuria', '2005-08-18', '', '2005-08-18', '<p>This page gives the current Syllabus being followed at the Department of Computer Engineering. </p>\r\n');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_faculty`
-- 

CREATE TABLE `info_faculty` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `info_faculty`
-- 

INSERT INTO `info_faculty` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'The Faculty Database', 0, '1', 'header', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p>Welcome to the facuty database of Department of Computer Engineering. The following is the list of our  faculty in alphabetical order. Click on their names to view their Homepages with their profiles...\r\n</p>\r\n<p class="right"><a href="#">Read more... </a> </p>');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_jobs`
-- 

CREATE TABLE `info_jobs` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `info_jobs`
-- 

INSERT INTO `info_jobs` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Job Notices', 0, '1', 'header', 'Rahul Murmuria', '2005-08-18', '', '2005-08-18', 'This page is for those candidates looking for faculty status or any non-teaching staff job at Department of Computer Engineering, MNIT. Vacancy notices will be posted here from time to time and newspaper advertisements will also be reliesed.');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_labs`
-- 

CREATE TABLE `info_labs` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `info_labs`
-- 

INSERT INTO `info_labs` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Our Laboratories', 0, '1', 'header', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p>Here is a description of the Labs and Network that exists in our institute under the Department of Computer Engineering. We instill great pride in quoting that we have one of the best networks in the country and our labs have adequate resourses to serve the future needs of our students.</p>'),
(2, 'Popup Labs Trial', 1, '1', 'popup', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', 'Let the Popup Begin!'),
(3, 'Let The Popup Begin!', 1, '1d', 'data', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', 'So, it works. Note, the Section name was taken from the popup''s sectionname this time, paraid being=1 !');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_research`
-- 

CREATE TABLE `info_research` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `info_research`
-- 

INSERT INTO `info_research` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Research and Development', 0, '1', 'header', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p>Our faculty is of exemplary quality and hence research activities are plenty.</p>'),
(2, 'Sample Data', 1, '1', 'data', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', 'This is an example of the research activities that can take place...'),
(3, 'Sample Data', 1, '2', 'popup', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', 'Popup Research 1'),
(4, 'Popup Research 1', 1, '2d', 'data', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p>Eureka! The window has poped! This is one of the results of research activities that can take place...</p>');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_tour`
-- 

CREATE TABLE `info_tour` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `info_tour`
-- 

INSERT INTO `info_tour` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Tour the Department', 0, '1', 'header', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p>The flash tour in the main website walks you through all the departments door to door. This page gives you further insights on the events and people at the Department of Computer Engineering...</p>');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_welcome`
-- 

CREATE TABLE `info_welcome` (
  `fragmentcode` tinyint(4) NOT NULL auto_increment,
  `sectionname` varchar(30) NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(3) NOT NULL default '',
  `paratype` enum('popup','data','header') NOT NULL default 'data',
  `postedby` varchar(30) NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `info_welcome`
-- 

INSERT INTO `info_welcome` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Welcome to Civil Department!', 0, '1', 'header', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p>This is the Home Page for Department of Civil Engineering at MNIT. Below are feeds of the latest news and Notices of the department. There are tabs above for other sections of this web site. The Faculty tab also has links to the personal Homepages of each faculty.</p>\r\n\r\n<p class="right"><a href="#">Read more... </a> </p>'),
(2, 'Please Note:', 1, '1', 'data', 'Rahul Murmuria', '2005-08-19', '', '2005-08-19', '<p class=""block"">This box can be used for displaying any note the needs to be put up on the cover, this is also fed from database and in availabe for edit in the CMS <font face="impact" color="#000099"><em>Lets Hope this works it can even write <font style="BACKGROUND-COLOR: #ccff33"><font color="#cc0000">x<sup>2</sup></font></font></em></font></p>');

-- --------------------------------------------------------

-- 
-- Table structure for table `news_active`
-- 

CREATE TABLE `news_active` (
  `paraid` tinyint(4) NOT NULL auto_increment,
  `parahead` varchar(80) collate latin1_general_ci NOT NULL default '',
  `data` mediumtext collate latin1_general_ci NOT NULL,
  `postedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `approvedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `dateapproved` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`paraid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `news_active`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `news_archive`
-- 

CREATE TABLE `news_archive` (
  `paraid` tinyint(4) NOT NULL auto_increment,
  `parahead` varchar(80) collate latin1_general_ci NOT NULL default '',
  `data` mediumtext collate latin1_general_ci NOT NULL,
  `postedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `approvedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `dateapproved` date NOT NULL default '0000-00-00',
  `appstatus` enum('y','n') collate latin1_general_ci NOT NULL default 'n',
  PRIMARY KEY  (`paraid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `news_archive`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `notice_active`
-- 

CREATE TABLE `notice_active` (
  `paraid` tinyint(4) NOT NULL auto_increment,
  `parahead` varchar(80) collate latin1_general_ci NOT NULL default '',
  `data` mediumtext collate latin1_general_ci NOT NULL,
  `postedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `approvedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `dateapproved` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`paraid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `notice_active`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `notice_archive`
-- 

CREATE TABLE `notice_archive` (
  `paraid` tinyint(4) NOT NULL auto_increment,
  `parahead` varchar(80) collate latin1_general_ci NOT NULL default '',
  `data` mediumtext collate latin1_general_ci NOT NULL,
  `postedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `approvedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  `dateapproved` date NOT NULL default '0000-00-00',
  `appstatus` enum('y','n') collate latin1_general_ci NOT NULL default 'n',
  PRIMARY KEY  (`paraid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `notice_archive`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `syllabus`
-- 

CREATE TABLE `syllabus` (
  `sno` tinyint(4) NOT NULL auto_increment,
  `semester` tinyint(4) NOT NULL default '0',
  `scode` varchar(7) NOT NULL default '',
  `title` varchar(50) NOT NULL default '',
  `sarea` varchar(5) NOT NULL default '',
  `credit` tinyint(4) NOT NULL default '0',
  `lhours` tinyint(4) NOT NULL default '0',
  `thours` tinyint(4) NOT NULL default '0',
  `phours` tinyint(4) NOT NULL default '0',
  `tduration` tinyint(4) NOT NULL default '0',
  `pduration` tinyint(4) NOT NULL default '0',
  `cws` tinyint(4) NOT NULL default '0',
  `prs` tinyint(4) NOT NULL default '0',
  `mte` tinyint(4) NOT NULL default '0',
  `ete` tinyint(4) NOT NULL default '0',
  `pre` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`sno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `syllabus`
-- 

INSERT INTO `syllabus` (`sno`, `semester`, `scode`, `title`, `sarea`, `credit`, `lhours`, `thours`, `phours`, `tduration`, `pduration`, `cws`, `prs`, `mte`, `ete`, `pre`) VALUES 
(1, 1, 'IC-101', 'Computer Systems & Programming', 'ESA', 4, 3, 0, 2, 3, 0, 0, 25, 25, 50, 0),
(2, 2, 'IC-101', 'Computer Systems & Programming', 'ESA', 4, 3, 0, 2, 3, 0, 0, 25, 25, 50, 0),
(3, 3, 'IC-201', 'Mathemetics - 3', 'BS', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
(4, 3, 'CP-201', 'Logic Systems and Design', 'DC', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
(5, 3, 'CP-203', 'Data Structures', 'DC', 5, 3, 1, 2, 3, 0, 10, 20, 20, 50, 0),
(6, 3, 'CP-205', 'Discrete Structures', 'DC', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
(7, 3, 'CP-207', 'Electronic Circuits and Design', 'ESA', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0);
