-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 31, 2006 at 08:41 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `mnit_academic`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `cp201`
-- 

CREATE TABLE `cp201` (
  `idno` varchar(6) default NULL,
  `mte1` int(4) default NULL,
  `mte2` int(4) default NULL,
  `cws` int(4) default NULL,
  `prs` int(4) default NULL,
  `ete` int(4) default NULL,
  `pre` int(4) default NULL,
  `percent` int(4) default NULL,
  `grade` char(1) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `cp201`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `dept_electives`
-- 

CREATE TABLE `dept_electives` (
  `code` varchar(8) NOT NULL,
  `title` varchar(50) NOT NULL,
  `area` varchar(5) NOT NULL,
  `electiveno` tinyint(4) NOT NULL,
  `semester` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `dept_electives`
-- 

INSERT INTO `dept_electives` (`code`, `title`, `area`, `electiveno`, `semester`) VALUES 
('CP-322', 'Optimization Techniques', 'DE', 1, ''),
('CP-324', 'Combinatorics', 'DE', 1, ''),
('CP-326', 'Advanced Microprocessors', 'DE', 1, ''),
('CP-328', 'Neural Networks', 'DE', 1, ''),
('CP-330', 'Mathematical Programming', 'DE', 1, ''),
('CP-332', 'Information Theory and Coding', 'DE', 1, ''),
('CP-421', 'Advanced Topics in Computer Graphics', 'DE', 2, ''),
('CP-423', 'Advanced Topics in Networking', 'DE', 2, ''),
('CP-425', 'Distributed Data Bases', 'DE', 2, ''),
('CP-427', 'VHDL', 'DE', 2, ''),
('CP-429', 'Simulation and Modelling', 'DE', 2, ''),
('CP-441', 'Embedded Systems', 'DE', 3, ''),
('CP-443', 'Cryptography', 'DE', 3, ''),
('CP-445', 'Advanced Data Structures and Algorithms', 'DE', 3, ''),
('CP-447', 'Image Processing and Pattern Recognition', 'DE', 3, ''),
('CP-449', 'Biometrics', 'DE', 3, ''),
('CP-420', 'Advanced Topics in OS', 'DE', 4, ''),
('CP-422', 'Parallel and Distributed Computing', 'DE', 4, ''),
('CP-424', 'Computer Human Interaction', 'DE', 4, ''),
('CP-426', 'Software Project Management', 'DE', 4, ''),
('CP-428', 'Advanced Topics in Databases', 'DE', 4, ''),
('CP-440', 'Robotics', 'DE', 5, ''),
('CP-442', 'Behavioural Synthesis', 'DE', 5, ''),
('CP-444', 'Multimedia Systems', 'DE', 5, ''),
('CP-446', 'Mobile Computing', 'DE', 5, ''),
('CP-448', 'Advanced Computer Architecture', 'DE', 5, ''),
('IT-322', 'Operation Research ', 'DE', 1, ''),
('IT-324', 'Management Information System', 'DE', 1, ''),
('IT-326', 'Natural Language Processing', 'DE', 1, ''),
('IT-328', 'e-Commerce', 'DE', 1, ''),
('IT-330', 'Graph Theory ', 'DE', 1, ''),
('IT-322', 'Operation Research ', 'DE', 1, ''),
('IT-324', 'Management Information System', 'DE', 1, ''),
('IT-326', 'Natural Language Processing', 'DE', 1, ''),
('IT-328', 'e-Commerce', 'DE', 1, ''),
('IT-330', 'Graph Theory ', 'DE', 1, ''),
('IT-332', 'Information Theory and Coding', 'DE', 1, ''),
('IT-421', '3D Computer Graphics ', 'DE', 2, ''),
('IT-423', 'Network Services and Management', 'DE', 2, ''),
('IT-425', 'Data Mining and Warehousing ', 'DE', 2, ''),
('IT-427', 'Digital Hardware Design', 'DE', 2, ''),
('IT-429', 'Performance Analysis of Computer Systems', 'DE', 2, ''),
('IT-441', 'Embedded Systems and Appliances', 'DE', 3, ''),
('IT-443', 'Automata Theory', 'DE', 3, ''),
('IT-445', 'Speech Processing ', 'DE', 3, ''),
('IT-447', 'Image Analysis and Classification ', 'DE', 3, ''),
('IT-449', 'Bio-informatics', 'DE', 3, ''),
('IT-420', 'Distributed Systems ', 'DE', 4, ''),
('IT-422', 'Client Server Computing ', 'DE', 4, ''),
('IT-424', 'Soft Computing ', 'DE', 4, ''),
('IT-426', 'Software Testing and Verification  ', 'DE', 4, ''),
('IT-428', 'Data Engineering ', 'DE', 4, ''),
('IT-440', 'Computer Vision ', 'DE', 5, ''),
('IT-442', 'High Level Synthesis ', 'DE', 5, ''),
('IT-444', 'Web based Application Development  ', 'DE', 5, ''),
('IT-446', 'Critical System Design ', 'DE', 5, ''),
('IT-448', 'Parallel Computing ', 'DE', 5, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `insti_electives`
-- 

CREATE TABLE `insti_electives` (
  `code` varchar(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dept` char(4) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `area` varchar(5) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `credits` tinyint(1) NOT NULL default '0',
  `lecture_hours` tinyint(1) NOT NULL default '0',
  `tutorial_hours` tinyint(1) NOT NULL default '0',
  `practical_hours` tinyint(1) NOT NULL default '0',
  `exam_duration` tinyint(1) NOT NULL default '0',
  `practical_duration` tinyint(1) NOT NULL default '0',
  `classwork_wt` int(2) NOT NULL default '0',
  `project_wt` int(2) NOT NULL default '0',
  `midterm_wt` int(2) NOT NULL default '0',
  `endterm_wt` int(2) NOT NULL default '0',
  `presentation_wt` int(2) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `insti_electives`
-- 

INSERT INTO `insti_electives` (`code`, `title`, `dept`, `semester`, `area`, `faculty`, `credits`, `lecture_hours`, `tutorial_hours`, `practical_hours`, `exam_duration`, `practical_duration`, `classwork_wt`, `project_wt`, `midterm_wt`, `endterm_wt`, `presentation_wt`) VALUES 
('IE-201', 'Town Planning and Architecture', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-202', 'Fluid Mechanics', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-203', 'Energy Resources Utilization', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-204', 'Introduction to unit operations and Processes', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-205', 'Object Oriented Programming', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-206', 'Data Structures', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-207', 'Applied Chemistry', 'all', 'any', 'BS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-208', 'Electronic Devices & Circuits', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-209', 'Principles of Communication Engineering', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-210', 'Network Theory', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-211', 'Electrical Measurements', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-212', 'Numerical Methods', 'all', 'any', 'BS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-213', 'Mathematics-IV', 'all', 'any', 'BS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-214', 'Thermal Sciences', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-215', 'Renewable Energy Sources', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-216', 'Material Science & Technology', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-217', 'Testing of Engineering Materials', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-218', 'Solid Mechanics', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-219', 'Laser & its Engg. Applications', 'all', 'any', 'BS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-220', 'Solar Energy & Physics of  Photovoltaics', 'all', 'any', 'BS\n', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE-221', 'Urban Planning, Environment and Human Health', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IE- 222', 'Introduction to Foundation Engineering', 'all', 'any', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `syllabus`
-- 

CREATE TABLE `syllabus` (
  `code` varchar(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dept` char(4) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `area` varchar(5) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `credits` tinyint(1) NOT NULL default '0',
  `lecture_hours` tinyint(1) NOT NULL default '0',
  `tutorial_hours` tinyint(1) NOT NULL default '0',
  `practical_hours` tinyint(1) NOT NULL default '0',
  `exam_duration` tinyint(1) NOT NULL default '0',
  `practical_duration` tinyint(1) NOT NULL default '0',
  `classwork_wt` int(2) NOT NULL default '0',
  `project_wt` int(2) NOT NULL default '0',
  `midterm_wt` int(2) NOT NULL default '0',
  `endterm_wt` int(2) NOT NULL default '0',
  `presentation_wt` int(2) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `syllabus`
-- 

INSERT INTO `syllabus` (`code`, `title`, `dept`, `semester`, `area`, `faculty`, `credits`, `lecture_hours`, `tutorial_hours`, `practical_hours`, `exam_duration`, `practical_duration`, `classwork_wt`, `project_wt`, `midterm_wt`, `endterm_wt`, `presentation_wt`) VALUES 
('IC-201', 'Mathematics III', 'CP', '', 'BS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('CP-201', 'Logic System Design', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-203', 'Data Structures', 'CP', '', 'DC', '<faculty>', 5, 3, 1, 2, 3, 0, 10, 20, 20, 50, 0),
('CP-205', 'Discrete Structures', 'CP', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('CP-207', 'Electronic Circuits and Design', 'CP', '', 'ESA', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Institute Elective I', 'CP', '', 'IE', '<faculty>', 4, 0, 0, 0, 3, 0, 25, 0, 25, 50, 0),
('IC-202', 'Social Science & Economics', 'CP', '', 'HS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('CP-202', 'Principles of Programming Languages', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-204', 'Microprocessor & Interfaces', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-206', 'Object Oriented Design', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-208', 'Principles of Communication Engineering', 'CP', '', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('', 'Institute Elective II', 'CP', '', 'IE', '<faculty>', 4, 0, 0, 0, 3, 0, 25, 0, 25, 50, 0),
('CP-301', 'Computer Architecture', 'CP', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('CP-303', 'Data Base Management Systems', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-305', 'Software Engineering', 'CP', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('CP-307', 'Design and Analysis of Algorithms', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-309', 'Computer Networks', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-311', 'Group Discussion and Viva Voce', 'CP', '', 'DC', '<faculty>', 2, 0, 2, 0, 0, 0, 100, 0, 0, 0, 0),
('', 'Institute Elective III', 'CP', '', 'IE', '<faculty>', 4, 0, 0, 0, 3, 0, 25, 0, 25, 50, 0),
('IC-301', 'Technical Communication', 'CP', '', 'HS', '<faculty>', 4, 2, 2, 0, 2, 0, 25, 0, 25, 50, 0),
('CP-302', 'Operating System', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-304', 'Digital Signal Processing', 'CP', '', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('CP-306', 'Theory of Computation', 'CP', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('CP-308', 'Computer Graphics', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-310', 'Scripting Language', 'CP', '', 'DC', '<faculty>', 1, 0, 0, 2, 0, 0, 0, 100, 0, 0, 0),
('', 'Department Elective I', 'CP', '', 'DE', '<faculty>', 4, 0, 0, 0, 3, 0, 20, 0, 30, 50, 0),
('CP-401', 'Principles of Compiler Design', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-403', 'AI and Expert Systems', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-405', 'Introduction to VLSI Design', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('CP-407', 'Real Time Systems', 'CP', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Department Elective II', 'CP', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Department Elective III', 'CP', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Industrial Field/Training', 'CP', '', 'DC', '<faculty>', 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('IC-401', 'Industrial Management', 'CP', '', 'HS', '<faculty>', 4, 3, 1, 0, 2, 0, 25, 0, 25, 50, 0),
('CP-402', 'Major Project', 'CP', '', 'DC', '<faculty>', 12, 0, 12, 0, 0, 0, 20, 0, 20, 0, 0),
('', 'Department Elective IV', 'CP', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Department Elective V', 'CP', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-306', 'VLSI Algorithms', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-304', 'Signals & Systems', 'IT', '', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('IT-302', 'System Software ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IC-301', 'Technical Communication', 'IT', '', 'HS', '<faculty>', 4, 2, 2, 0, 2, 0, 25, 0, 25, 50, 0),
('', 'Institute Elective III', 'IT', '', 'IE', '<faculty>', 4, 0, 0, 0, 3, 0, 25, 0, 25, 50, 0),
('IT-311', 'Group Discussion and Viva Voce', 'IT', '', 'DC', '<faculty>', 2, 0, 2, 0, 0, 0, 100, 0, 0, 0, 0),
('IT-309', 'Data Networks ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-307', 'Data Compression', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-305', 'System Analysis and Design', 'IT', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('IT-303', 'Data Modelling and Design', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-301', 'Computer Organization ', 'IT', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('', 'Institute Elective II', 'IT', '', 'IE', '<faculty>', 4, 0, 0, 0, 3, 0, 25, 0, 25, 50, 0),
('IT-208', 'Communication Systems', 'IT', '', 'ESA', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('IT-206', 'Internet Programming in JAVA', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-204', 'Microprocessor based System Design ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-202', 'Principles of Information Technology', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IC-202', 'Social Science & Economics', 'IT', '', 'HS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('', 'Institute Elective I', 'IT', '', 'IE', '<faculty>', 4, 0, 0, 0, 3, 0, 25, 0, 25, 50, 0),
('IT-207', 'Electronic Devices and Circuits ', 'IT', '', 'ESA', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-205', 'Mathematical Foundations of IT', 'IT', '', 'DC', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('IT-203', 'Data Structures & Algorithms', 'IT', '', 'DC', '<faculty>', 5, 3, 1, 2, 3, 0, 10, 20, 20, 50, 0),
('IT-201', 'Digital Electronics ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IC-201', 'Mathematics III', 'IT', '', 'BS', '<faculty>', 4, 3, 1, 0, 3, 0, 25, 0, 25, 50, 0),
('IT-308', 'Multimedia Techniques ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-310', 'Internet Technologies', 'IT', '', 'DC', '<faculty>', 1, 0, 0, 2, 0, 0, 0, 100, 0, 0, 0),
('', 'Department Elective I', 'IT', '', 'DE', '<faculty>', 4, 3, 1, 0, 3, 0, 20, 0, 30, 50, 0),
('IT-401', 'GUI Programming ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-403', 'AI and Neural Networks ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-405', 'Information System Security', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('IT-407', 'Wireless Technologies ', 'IT', '', 'DC', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Department Elective II', 'IT', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Department Elective III', 'IT', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Industrial Field/Training', 'IT', '', 'DC', '<faculty>', 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
('IC-401', 'Industrial Management', 'IT', '', 'HS', '<faculty>', 4, 3, 1, 0, 2, 0, 25, 0, 25, 50, 0),
('IT-402', 'Major Project', 'IT', '', 'DC', '<faculty>', 12, 0, 12, 0, 0, 0, 20, 0, 20, 0, 0),
('', 'Department Elective IV', 'IT', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0),
('', 'Department Elective V', 'IT', '', 'DE', '<faculty>', 4, 3, 0, 2, 3, 0, 0, 30, 20, 50, 0);
