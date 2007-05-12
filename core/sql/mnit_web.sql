-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Dec 31, 2006 at 08:43 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2
-- 
-- Database: `mnit_web`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `contact_directory`
-- 

CREATE TABLE `contact_directory` (
  `directoryid` tinyint(4) NOT NULL auto_increment,
  `pin` varchar(30) collate latin1_general_ci NOT NULL default '',
  `name` varchar(30) collate latin1_general_ci NOT NULL default '',
  `phone` varchar(30) collate latin1_general_ci NOT NULL default '',
  `intercom` varchar(10) collate latin1_general_ci default NULL,
  `email` varchar(30) collate latin1_general_ci NOT NULL default '',
  `post` enum('administration','faculty','student','otherstaff','institute','misc') collate latin1_general_ci NOT NULL default 'administration',
  `lastupdated` date NOT NULL default '0000-00-00',
  `updatedby` varchar(30) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`directoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='MNIT Directory' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `contact_directory`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `custom_civilworks`
-- 

CREATE TABLE `custom_civilworks` (
  `q` char(1) collate latin1_general_ci NOT NULL default '',
  `w` char(1) collate latin1_general_ci NOT NULL default '',
  `e` char(1) collate latin1_general_ci NOT NULL default '',
  `r` char(1) collate latin1_general_ci NOT NULL default '',
  `t` char(1) collate latin1_general_ci NOT NULL default '',
  `y` char(1) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`q`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='''custom_'' miscelaneous tables';

-- 
-- Dumping data for table `custom_civilworks`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `custom_goodspro`
-- 

CREATE TABLE `custom_goodspro` (
  `q` char(1) collate latin1_general_ci NOT NULL default '',
  `w` char(1) collate latin1_general_ci NOT NULL default '',
  `e` char(1) collate latin1_general_ci NOT NULL default '',
  `r` char(1) collate latin1_general_ci NOT NULL default '',
  `t` char(1) collate latin1_general_ci NOT NULL default '',
  `y` char(1) collate latin1_general_ci NOT NULL default '',
  PRIMARY KEY  (`q`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='''custom_'' miscelaneous tables';

-- 
-- Dumping data for table `custom_goodspro`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `custom_gradepoints`
-- 

CREATE TABLE `custom_gradepoints` (
  `grade` char(3) collate latin1_general_ci NOT NULL default '',
  `value` tinyint(4) NOT NULL default '0',
  `area` enum('academic','projects') collate latin1_general_ci NOT NULL default 'academic',
  PRIMARY KEY  (`grade`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='''custom_'' miscelaneous tables';

-- 
-- Dumping data for table `custom_gradepoints`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `custom_hostelstructure`
-- 

CREATE TABLE `custom_hostelstructure` (
  `hno` varchar(5) collate latin1_general_ci NOT NULL default '',
  `single` int(11) NOT NULL default '0',
  `double` int(11) NOT NULL default '0',
  `triple` int(11) NOT NULL default '0',
  `totalrooms` int(11) NOT NULL default '0',
  `capacity` int(11) NOT NULL default '0',
  PRIMARY KEY  (`hno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `custom_hostelstructure`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `custom_scholarship`
-- 

CREATE TABLE `custom_scholarship` (
  `sid` varchar(15) collate latin1_general_ci NOT NULL default '',
  `name` varchar(50) collate latin1_general_ci NOT NULL default '',
  `sponsor` varchar(50) collate latin1_general_ci NOT NULL default '',
  `qualifications` varchar(80) collate latin1_general_ci NOT NULL default '',
  `details` mediumtext collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `custom_scholarship`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `faq_sectioned`
-- 

CREATE TABLE `faq_sectioned` (
  `qid` tinyint(4) NOT NULL auto_increment,
  `question` varchar(100) collate latin1_general_ci NOT NULL default '',
  `postedby` varchar(20) collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `lastupdated` date NOT NULL default '0000-00-00',
  `answer` mediumtext collate latin1_general_ci NOT NULL,
  `section` enum('general','undergraduate','postgraduate','PhD.','enquiry','scholarship') collate latin1_general_ci NOT NULL default 'general',
  PRIMARY KEY  (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `faq_sectioned`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `info_academics`
-- 

CREATE TABLE `info_academics` (
  `fragmentcode` smallint(3) NOT NULL auto_increment,
  `sectionname` varchar(50) collate latin1_general_ci NOT NULL default '0',
  `sectionid` tinyint(2) NOT NULL default '0',
  `paraid` char(2) collate latin1_general_ci NOT NULL default '1',
  `paratype` enum('popup','data') collate latin1_general_ci NOT NULL default 'popup',
  `postedby` varchar(20) collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(20) collate latin1_general_ci NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='''info_'' Content of Website' AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `info_academics`
-- 

INSERT INTO `info_academics` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(11, 'Courses Offered', 1, '1', 'data', 'Anant', '2005-08-18', '', '2005-08-18', '\r\nThe Institute offers Under Graduate, Post Graduate and Research programs through 13 well established departments. We offer the following Courses:\r\n<ul>\r\n<li>B.Tech. (through 8 Branches)</li><li>B.Arch. (5 year course)<br /></li>\r\n<li>M.Tech. (in 8 Specialisations)</li>\r\n<li>Ph.D. Programmes</li>\r\n</ul>For more information on these courses visit the respective department home pages.<span style="font-weight: bold;"></span>												'),
(12, 'Departments', 2, '1', 'data', 'Anant', '2005-08-18', '', '2005-08-18', '\r\nThe institute offers its courses through the following academic departments: <br /><ul> <li><a href="http://arc.mnit.ac.in/">Architecture</a></li> <li><a href="http://che.mnit.ac.in/">Chemical Engg.</a></li> <li><a href="http://civ.mnit.ac.in/">Civil Engineering</a></li> <li><a href="../departments/cse/index.php">Computer Engg.</a></li> <li><a href="http://ele.mnit.ac.in/">Electrical Engg.</a></li> <li><a href="http://ece.mnit.ac.in/">Electronics &amp; Communication Engg.</a></li> <li><a href="http://mec.mnit.ac.in/">Mechanical Engg.</a></li> <li><a href="http://met.mnit.ac.in/">Metallurgical Engg.</a></li> <br /><li>Chemistry, Humanities, Mathematics, Physics and Structural Engg.</li> </ul>						'),
(13, 'Fee Structure', 3, '1', 'popup', 'Anant', '2005-08-18', '', '2005-08-18', 'Click here for Fee Structure Details'),
(14, 'Academic Calendar', 4, '1', 'popup', 'Anant', '2005-08-18', '', '2005-08-18', 'Click Here for academic Calendar\r\n'),
(15, 'Financial Aid', 5, '1', 'popup', 'Anant', '2005-08-18', '', '2005-08-18', 'MNIT Regulations on Fees and Financial Assistance'),
(16, 'Financial Aid', 5, '1d', 'data', 'Anant', '2005-08-18', '', '0000-00-00', '<h3>REGULATIONS OF FEE AND FINANCIAL ASSISTANCE</H3>\r\n\r\n<ul>\r\n<li>SC/ST/Girls are exempted from tuition fees.</li>\r\n<li>SC/ST candidates can get a loan of Rs. 10,000/- from DRDO.</li>\r\n<li>Some social trusts also sanctions scholarships for students of this college(Details are available at proctor section).</li>\r\n<li>Social welfare department of state government also gives financial aid to SC/ST and physically handicaped candidates depending on the availability of funds.</li>\r\n<li>Assistantship @Rs. 5000/- per month will be awarded to GATE qualified candidates as per norms for the duration of the M.Tech. programme. The number of assistantship in each programme will be as per guidelines of MHRD. However, GATE qualified candidates do not automatically become eligible for the sanction of this assistantship. The candidates should qualify in GATE with a minimum score of 75 percentile for general candidates and 50 percentile for SC/ST candidates to become eligible for MHRD assistantship.</li>\r\n<li>Assistantship will not be awarded to those who are in receipt of salary from any source.</li>\r\n<li>In case a student decides to discontinue the postgraduate programme, he/she will be required to refund the entire amount of assistantship drawn.</li>\r\n<li>If a student is directed to discontinue his/her studies by the institute for reasons of negligence/shortage of attendance/improper behavior/ use of unfair means at the institute examination or any other reason at the discretion of the institute, he/she will be liable to refund the entire amount of assistantship received. Assistantship once discontinued will not be restored.</li>\r\n<li>The continuance of the assistantship shall depend upon the satisfactory progress report of work, attendance, conduct of the recipient as communicated by the Head of the Department concerned and academic performance in the End Term Examination, as per ordinances/ regulations in vogue.</li>\r\n<li>The initial payment of assistantship to the eligible students is generally delayed due to time required for processing.</li>\r\n</ul>'),
(17, 'Financial Aid', 5, '2', 'popup', 'Anant', '2005-08-18', '', '0000-00-00', 'Undergraduate Scholarship Information'),
(18, 'Financial Aid', 5, '2d', 'data', 'Anant', '2005-08-18', '', '0000-00-00', 'Information about UG Scholarships Here'),
(19, 'Fee Structure', 3, '1d', 'data', 'Anant', '2005-08-18', '', '0000-00-00', 'The Fee Structure here...'),
(20, 'Academic Calendar', 4, '1d', 'data', 'Anant', '2005-08-18', '', '0000-00-00', 'Academic Calendar here...');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_administration`
-- 

CREATE TABLE `info_administration` (
  `fragmentcode` smallint(6) NOT NULL auto_increment,
  `sectionname` varchar(50) collate latin1_general_ci NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(2) collate latin1_general_ci NOT NULL default '',
  `paratype` enum('popup','data') collate latin1_general_ci NOT NULL default 'data',
  `postedby` varchar(20) collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(20) collate latin1_general_ci NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='''info_'' Content of Website ' AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `info_administration`
-- 

INSERT INTO `info_administration` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Board Of Governors', 1, '1', 'data', 'Rahul Murmuria', '2005-08-17', '', '2005-08-17', 'The Board guides the Director of the institute and in responsible for all administrative proceedings of the institute. We have representatives from various departments of central government among other eminent personalities from the buisness world in the board. Also an inclusion of profile BOG under administration.'),
(2, 'Finance Committee', 2, '1', 'data', 'Rahul Murmuria', '2005-08-17', '', '2005-08-17', 'This committee takes care of the management of all funds of the institute. They oversee the expenditure of the yearly grant that the AICTE provides the college with.'),
(3, 'Building & Works committee', 3, '1', 'data', 'Rahul Murmuria', '2005-08-17', '', '2005-08-17', 'This committee is established to manage the infrastructure and the buildings of the company.'),
(4, 'The Senate', 4, '1', 'data', 'Rahul Murmuria', '2005-08-17', '', '2005-08-17', 'This is the core administrative body of the institute and comprises of all Deans, ');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_institute`
-- 

CREATE TABLE `info_institute` (
  `fragmentcode` smallint(6) NOT NULL auto_increment,
  `sectionname` varchar(50) character set latin1 collate latin1_general_ci NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(2) character set latin1 collate latin1_general_ci NOT NULL default '',
  `paratype` enum('popup','data') character set latin1 collate latin1_general_ci NOT NULL default 'data',
  `postedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

-- 
-- Dumping data for table `info_institute`
-- 

INSERT INTO `info_institute` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(2, 'Placement Opportunities', 2, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'The Department has been making all efforts in maintaining and developing highly professional relationships with HRD people in the industry to provide placement to all students. In the academic year 2001-2003, 35 organisations conducted campus interviews for recruitment of final year students and selected 171 students, 23 result awaited. Nearly 70 percent of eligible students got confirmed appointment letters before appearing for final year examinations. Only students securing aggregate marks of 60 percent or above are eligible for campus placement, for the session 2002-2003 262 students were eligible. \r\n\r\nIn the year 2003-2004 there were 381 students in the final year out of which 320 students were eligible for placement out of which 232 got placed. The pay package varies from a minimum of Rs. 1.76 lakh to as high as Rs. 6 lakh p.a.'),
(3, 'Job Opportunities', 3, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', ' The availabilty of highly qualified,skilled and experienced faculty and specialized academic staff determine, to a great extent, the excellence of an academic institute. In fact, one may state that backbone of any academic institute is its faculty. The institute is proud of its outstanding and dedicated faculty.\r\n\r\nFurther Job Vacancies are posted online from time to time and candidates can pickup the news release either from newspaper advertisements or online (from the link below). The respective departments directly oversee the release and execution of job vacancy notices.'),
(4, 'Infrastructure', 4, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'The Institute boasts of fabulus infratructure and hi-tech engineering facilities for the academic and lab purposes. The labs of various departments are equiped with all instruments and machines required which has been facilitated as a result of direct funding from Central Government. \r\n\r\nClick on the link below to read on about the various Labs, Sport Facilities and Libraries. '),
(5, 'Central Library', 4, '2d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>CENTRAL LIBRARY</H3><p>\r\n\r\nThe Institute has a spacious and well equipped library which is being run according to an open access system. It has rich collection of about 1,33,600 volumes of books, periodicals, reports and reference material. In addition to the books from main library, some more books are issued to students from book bank also. To the students belonging to weaker section(SC/ST) some additional books are given from the Book Bank. Xeroxing facility is available to the users at very nominal rate.</p><p>\r\n\r\nThere is a video viewing facility. Large number of books, periodicals, video cassettes and CD-ROMs are available. The library is being fully computerized. The CDNET facilities are to be developed very soon. Library has procured LIBSYS Software(Multi-user) and started the computerization of in house data.\r\n</p><p>\r\nFollowing services are also being provided to the users.\r\n<ul><li>Reference Services</li>\r\n    <li>Video Viewing Facilities</li>\r\n    <li>INTERNET Facilities</li>\r\n    <li>DELNET Facilities</li>\r\n    <li>CD-ROM Data Bases</li>\r\n    <li>Photocopy Services</li>\r\n    <li>BIS/IRC Codes Services</li>\r\n    <li>OPAC Services(in house data)</li></ul>\r\n</p>'),
(1, 'About MNIT', 1, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Malaviya National Institute of Technology, Jaipur Rajasthan was established in 1962 and since emerged into one of the premium institutes in India for engineering and research. This section covers the following'),
(58, 'Infrastructure', 4, '4', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Medical Centre'),
(59, 'Medical Centre', 4, '4d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>MEDICAL CENTRE</H3><p>\r\n\r\nInstitute has the facility for medical checkup and treatment of staff and the students. Institute dispensary is provided in the campus and is manned by a full time residential Medical officer and two compounders. In addition, services od a part time Lady Doctor and a Homeopath are also available to the students and the staff.\r\n</p><p>\r\nThe dispensary observes the following timings:\r\n</p><p>\r\nApril-September\r\n<ul><li>\r\nMorning - 8:00 A.M. to 12:00 Noon\r\n</li><li>\r\nEvening - 5:00 P.M. to 6:30 P.M\r\n</li></ul>\r\nOctober-March\r\n<ul><li>\r\nMorning - 9:00 A.M. to 1:00 Noon\r\n</li><li>\r\nEvening - 5:00 P.M. to 6:30 P.M\r\n</li></ul></p><p>\r\nThe dispensary remains open from 9:30 A.M. to 11:00 A.M. on Sundays and Holidays.\r\n</p><p>\r\nApart from the MNIT dispensary, some of the government hospitals like Jaipuria Hospital and SMS Medical College hospital are also located within 5 kms, where 24 hours emergency services are available\r\n</p>\r\n'),
(6, 'History', 1, '2d', 'data', 'Rahul Murmuria', '2005-08-18', 'Rahul Murmuria', '2005-08-18', '<h3>History of MNIT</h3><p>\r\n\r\nThe Malaviya National Institute of Technology, Jaipur is one of the Centre of Excellence in the country established by the MHRD, Government of India. The Institute formerly known as Malaviya Regional Engineering College was established in the year 1962,  as a joint venture of the Government of India and Government of Rajasthan.\r\n\r\n</p><b>The beginning:</b><p>\r\nIn 1963, the college started funcioning from its temporary campus at Pilani and admitted 30 srudents each in Electical Engg. and Mechanical Engg. The college moved to the present campus to Jaipur in 1965. The college was inspired by the great educationist and freedom fighter Pt. Madan Mohan Malaviya and thus named as The Malaviya Regional Engineering College. Prof. V.G. Garde, the great educationist and visionary, was the first principal to nurture this college into a world renowned Institution. \r\n\r\n</p><b>The Mission:</b><p>\r\n Since its inception, the Institute is committed to the cause of technical upgradation of the Rajasthan state in particular and of the country in general. It is a matter of great pride that the Institute is well-known for its excellent academic and extra-curricular standards. It is actively engaged in research, consultancy and development activities.\r\n\r\n\r\n</p><b>Kalaidoscope of Cultures:</b><p>\r\nThe Institute was originally conceived as a regional education centre and has, through the years, scrupulously guarded this character. All the states and union territories of the country are represented in the undergraduate intake of the Institute, thus making it a small but perfect example of the celebrated ''unity in diversity'' of India.\r\n\r\n</p><b>Our Course Structure Over the Years:</b><p>\r\nIt had a mandate to run five year Bachelor of Engineering programmes in Civil, Electrical, Mechanical and Metallurgical Engineering. The duration of the B.E. Degree Course was changed to four years from the academic session 1983-84. \r\n</p><p>\r\nAt present, the Institute offers nine 4 year undergraduate courses of study leading to the Bachelor of Technology degree (in Chemical, Civil, Computer, Electrical, Electronics & Communication, Information Technology, Mechanical and Metallurgical Engineering and 5 year Bachelor of Architecture degree) with over 1700 students and there are nine PG specializations besides doctoral programs with over 300 students. There are over 150 highly motivated, young and dynamic faculty members engaged in teaching and research. \r\n\r\n</p><b>Transition to a "National Institute of Technology" under Central Government:</b><p>\r\nThe Institute got the status of National Institute of Technology and got  the status of Deemed University on June 26, 2002. The Institute is now under The Ministry of Human  Resource and Development, New Delhi. The Institue has also been selected to participate in the Technical Education Quality Improvement Program of the Government of India and the World Bank.   </p>'),
(11, 'Mission & Vision', 1, '3d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '\r\n<h3>Mission</h3>\r\nTo create technical manpower for meeting the current and future demands of industry. To reorganize education and research in close interaction with industry with emphasis on the development of leadership qualities in the young men and women entering the portals of the Institute with sensitivity to social development and eye for opportunities for growth in the international perspective.\r\n\r\n<h3>Vision</h3>\r\nTo create a center for imparting technical education of International standards and conducting research at the cutting edge of technology to meet the current and future challenges of technological development. \r\n\r\n<h3>Quality Policy</h3>\r\nThe MNIT shall strive to impart knowledge in such a manner so as to achieve total satisfaction of students, parents, employers, and the society. \r\n\r\n<h3>Institute Motto</h3>\r\nExcellence can be achieved only through perseverance and hard work. \r\n												'),
(12, 'Eco-consciousness', 1, '4d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>Eco-Conciousness</h3>\r\nThe Institute is highly eco-conscoius and maintains a sustainable environment for the benefit of mankind by protecting the flora and fauna of the campus. A variety of species of plants and trees is developed in the campus making it lush green. A variety of avion species e.g pigeon, peacock etc. can be seen in the campus.\r\n\r\nAs a first step to preserve our environment from pollution, motorbikes are banned for all students who have joined us 2004-2005 batch onwards.\r\n\r\n<h3>Energy Consciousness</h3>\r\nThe Institute has installed solar lamps with timers at different locations in the campus to conserve energy. It is charged with solar energy during day time which is utilized to glow tubelights or bulbs during the night. The recurring cost of this system is almost negligible. many tubelights have been replaced with CFL. Capacitor banks have been installed at various places to improve power factor(power factor remains 0.99 and has even touched 1.0). \r\n\r\n<h3>Water Consciousness</h3>\r\nThere is shortage of water everywhere. MNIT has taken several steps to overcome this problem through rain water harvesting and wastewater management. \r\n<b>Waste Water Management </b>\r\nThe waste water generated from various sources in the campus is recycled after treatment and used for watering plants, trees and lawns. \r\n<b>Rain Water Harvesting </b>\r\nAt present, there are two such facilities in the campus at the newly built #8 and near the Deaprtment of civil Engineering. \r\n\r\n'),
(56, 'Infrastructure', 4, '3', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'College Canteen & Hostel Canteen'),
(57, 'Canteen', 4, '3d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>CANTEEN FACILITIES</h3><p>\r\n\r\nOne canteen near the instructional zone and another near the hostels provide facilities to the students and the staff during and beyond the working hours.\r\n</p>\r\n\r\n<h3>COLLEGE CANTEEN</h3><p>\r\nThis canteen is equipped with a large seating area of 10000 sq. ft (fake figure) is located in the college area near the Computer Department and the Administrative Block. </p>\r\n\r\n<h3>HOSTEL CANTEEN</h3><p>\r\nThis Canteen was recently privatised and is located in the Boys Hostel Area. '),
(7, 'Infrastructure', 4, '2', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Central Library'),
(8, 'About MNIT', 1, '2', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'MNIT: A History'),
(9, 'About MNIT', 1, '3', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Mission & Vision'),
(10, 'About MNIT', 1, '4', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Eco-Conciousness');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_research`
-- 

CREATE TABLE `info_research` (
  `fragmentcode` smallint(6) NOT NULL auto_increment,
  `sectionname` varchar(50) character set latin1 collate latin1_general_ci NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(2) character set latin1 collate latin1_general_ci NOT NULL default '',
  `paratype` enum('popup','data') character set latin1 collate latin1_general_ci NOT NULL default 'data',
  `postedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `info_research`
-- 

INSERT INTO `info_research` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Research Initiatives wth outside Centres', 1, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Along with teaching and academic research leading to doctoral degree, the Institute gives top priority to the research and development projects sponsored by outside national and international agencies and user organisations. Industrial consultancy is another significant area of activity of the Institute.'),
(2, 'Apprenticeship in Continuing research activities', 2, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'The Institute is currently promoting numerous research activities within the campus under the supervision of our qualified base of senior faculty as concerned. Help can be provided for new researchers under any of our professors. '),
(3, 'Current Projects & Activities', 3, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', ''),
(4, 'Job Opportunities', 4, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Freshers are invited to take up the research activities under a supervisor on an ad-hoc basis and  allowances are sanctioned in accordance with the quality and time duration of the project.'),
(5, 'Consultancy and Sponsored Research', 5, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'etc.....');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_students`
-- 

CREATE TABLE `info_students` (
  `fragmentcode` smallint(6) NOT NULL auto_increment,
  `sectionname` varchar(50) character set latin1 collate latin1_general_ci NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(2) character set latin1 collate latin1_general_ci NOT NULL default '',
  `paratype` enum('popup','data') character set latin1 collate latin1_general_ci NOT NULL default 'data',
  `postedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `info_students`
-- 

INSERT INTO `info_students` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Hostel Facilities', 1, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'The office of the Dean Student Affairs deals with  Hostel admission and administration. The Institute recognizes that a major concern to all students and parents is the availability and quality of accomodation and food. There are nine fully-furnished hostels(having 3-seated, 2-seated and single seated rooms); eight for boys and one for girls. There is also a Married Students'' Hostel for students pursuing the degrees of M.Tech. or Ph.D in the institute and wishing to stay with their families.\r\n\r\nEach hostel has following composition of administration:\r\n\r\nWarden\r\nAssistant Warden\r\nCaretaker\r\nMess Assistant'),
(2, 'Hostel Facilities', 1, '2', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Rooms and Mess'),
(3, 'Rooms and Mess', 1, '2d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>ROOM AND MESS FACILITIES</h3><p>Each room is furnished with cots, study tables and storage space. Basic amenities are provided and entertainment facilities in the form of Common Room with Cable TV and table-tennis are available in each hostel. Each hostel has incoming phone with Indian Telephone Card facilities. Dining hall and common room of hostel(#8) is fully air-cooled and the rest of the hostels are under the process of being air-cooled. The International Students Hostel for boys houses 12 double-seated suites.</p><p>There is a mess attached to each hostel which is fully maintained by students through MNIT Mess Council and Mess Committees. Wardens advise the students from time to time. The students Mess Committee ensures hygenic and tasty food at an affordable price.</p><p>Have the following students representations<br>Mess Secretary<br>Jt Secretary<br>Members - 3<br>This committee is nominated through open applications.</p><p>\r\nIn addition, each Hostel resident is expected to monitor the quality of raw materials and cooked food on a regular basis.</p>'),
(4, 'Extra Curicular Activities', 2, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'It is important that students take part in sport and cultural activities and learn to organise events alogside their academic persuits. Hence the institute takes special steps to promote extra-curricular activities. '),
(5, 'Creative Arts', 2, '2d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>Creative Arts Society</h3><p>\r\n\r\nCreative Arts Society provides the platform on which, through healthy competition, the students showcase and sharpen their ability to act or improvise, to sing or dance, to debate or recite, to write or draw. There are some technical Divisions also conducting Quizes or Technical Workshops. The student organisers and volunteers learn to take responsibility and thus begin their training in managerial skills.</p><p>\r\n\r\nThe following are links to homepages of the Various Divisions of Creative Arts:<br>\r\n<br><a>Electronica</a>\r\n<br><a>Itika</a>\r\n<br><a>Photography</a>\r\n<br><a>Dramatics</a>\r\n<br><a>Music</a>\r\n<br><a>Fine Arts</a>\r\n<br><a>Literary</a>\r\n<br><a>SPIC Macay</a>\r\n</p><p>\r\nEach division will be headed by a faculty advisor and the following students committee.\r\n<ul><li>Secretary from III year</li>\r\n    <li>Jt Secretary from II year</li>\r\n    <li>Members 3 one each from IV and I year at least </li></p><p>\r\n\r\nThe Students will be selected through nominations/ open applications\r\n\r\n</p>'),
(6, 'Extra Curicular Activities', 2, '2', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Creative Arts Society'),
(7, 'Extra Curicular Activities', 2, '3', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'National Service Scheme'),
(8, 'National Service Scheme', 2, '3d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>National Service Scheme</h3><p>\r\n\r\nThe National Service Scheme was started in 1969-70, which was celebrated as the birth centenary year of Mahatma Gandhi, the father of nation. The idea of creating social responsibilities among students and youths was originated by Mahatmaji during the period of National Liberation movements. His suggestion was thatfirst duty of students should be not to treat the period of study as one of the opportunities for indulgence in intellectual luxury but for preparing themselves for dedication in services, and by that to uplift the life of villagers to a higher material and moral level.\r\nThe commencement of the scheme is the culmination of a long drawn discussion by popular national leaders and educational thinkers on the theme of making education more realistic and community oriented. Dr.S.Radhakrishnan commission, committee under the chairmanship of Dr.C.Deshmukh, Kothari commission etc are some of the commissions whose recommendations led to the establishment of National Service Scheme. Dr.K.G.Saiyyaidain, the then secretary of education, Govt. of India whose report "National Service for Youth" formed the final basis for National Service Scheme.\r\n</p><p>The Institute has a university level NSS Unit sponsored by the Department of Youth Affairs and Sports, Government of India and headed by the Programme Co-ordinator. All incoming students are required to register in the first year either for NSS or Sports or Creative Arts which are now offered as 2-credit courses. Objectives and Motto of National Service Scheme. The overall objective of the National Service Scheme is educational. Service to the community is the activity through which this objective is sought to be obtained.\r\n</p><p>\r\nThe Motto or watchword of the NSS is "NOT ME BUT YOU"</p><p>\r\n<ul><li>Specific aims are: To work with and among people and understand the community in which they work.</li>\r\n<li>To understand themselves in relation to their community.</li>\r\n    <li>Identify the needs and problem of the community and involve them in problem solving process.</li>\r\n    <li>Develop among themselves a sense of social and civic responsibility.</li>\r\n    <li>Develop competence required for group living and sharing of responsibilities.</li>\r\n    <li>Gain skills in mobilising communitty participation.</li>\r\n    <li>Acquire leadership qualities and democratic attitude.</li>\r\n    <li>Develop capacity to meet emergencies and natural disasters.</li>\r\n    <li>Practice national integration and social harmony.</li>\r\n    <li>To engage in creative and constructive social action.</li>\r\n</p><p>\r\nDr.S.K.Tiwari , Programme Officer.\r\n"National Service Scheme, MNIT, Jaipur was able to achieve significant progress in equipping young technocrats towards the goal of " healthy youth"for "healthy society"- The major projects and activities taken up and successfully completed during the last 5 yrs include:-\r\nCamps, Classes and Exhibitions Blood Donation AIDS Awareness Programme Community Healthcare PulsePolio Immunization Programmes Awareness against Social Maladies Promotion of Human Values in the Society Tree Plantation Campus Development ."'),
(9, 'Extra Curicular Activities', 2, '4', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'Sport Events'),
(10, 'Sport Events', 2, '4d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>Sports at MNIT</h3><p>\r\n\r\nGames & Sport Education in its broad sense means development of overall lifelong personality of an individual. The practice of Physical Education & Sports is a fundamental right for all (UNESCO). This department is committed to develop cardio respiratory fitness, general motor ability, differential ability, quick decision ability, quick judgment ability, quick reflex action and decreased movement time. \r\n</p><p>\r\nAn Annual Atheletic Meet is organised annually with events renging for track to field and even games like Basket Ball, Football etc.\r\n</p><p>\r\nApart from this, Inter-branch Games is also an annual feature, where students represent their Department Teams in Games like Football, Tennis, Badminton, Basket Ball and Table Tennis among many others...\r\n</p><p>\r\nThere are college teams in place also for most of the games and they take part in mant Inter-College ivents both within and outside Rajasthan.\r\n</p><p>\r\nFor more details on current News and Programmes, and past achievements, check out the <a>Physical Education & Sports Department Homepage</a>.</p>'),
(11, 'Workshops and Seminars', 3, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '//feed with the latest on general workshops conducted on regular basis by the institute and by the students themselves//');

-- --------------------------------------------------------

-- 
-- Table structure for table `info_visitorsguide`
-- 

CREATE TABLE `info_visitorsguide` (
  `fragmentcode` smallint(6) NOT NULL auto_increment,
  `sectionname` varchar(50) character set latin1 collate latin1_general_ci NOT NULL default '',
  `sectionid` tinyint(4) NOT NULL default '0',
  `paraid` char(2) character set latin1 collate latin1_general_ci NOT NULL default '',
  `paratype` enum('popup','data') character set latin1 collate latin1_general_ci NOT NULL default 'data',
  `postedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `dateposted` date NOT NULL default '0000-00-00',
  `updatedby` varchar(20) character set latin1 collate latin1_general_ci NOT NULL default '',
  `lastupdated` date NOT NULL default '0000-00-00',
  `data` mediumtext character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`fragmentcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `info_visitorsguide`
-- 

INSERT INTO `info_visitorsguide` (`fragmentcode`, `sectionname`, `sectionid`, `paraid`, `paratype`, `postedby`, `dateposted`, `updatedby`, `lastupdated`, `data`) VALUES 
(1, 'Location and Vibrance of Jaipur City', 1, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'The institute is located in Malaviya Nagar on Jawahar Lal  Nehru Marg, Jaipur,  in a campus amidst beautiful   surroundings with forest parks, public parks and hillocks. Jaipur the pink-city of India, a heady mix of tradition &amp; modernity, vibrant with recreational, social as well as educational experiences for the students. It has all the facilities and entertainment a student needs: excellent international brand shops, restaurants, clubs, sports facilities and a thriving cultural scene.\r\n\r\nJaipur is situated in Northern India at a distance of around 260 km south of Delhi. It offers a multitude of interesting places and attractions. Such as lush parks and places for recreation. There sare several magnificent palaces and forts.\r\nIt is a city of fun, food and festivals. Vibrant colous, lively folk music and dance performances mark the celebrations of every relegious occasion and every change of season. 												'),
(2, 'How To Reach MNIT?', 2, '2d', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '<h3>DRIVING TO MNIT CAMPUS:</h3><p>\r\n\r\n</p><b>From National Highway 8 :</b><p>\r\n\r\nWhich connects jaipur to Delhi, Ajmer, Udaipur, Ahmedabad, Vadodara, Mumbai one can reach to Sindhi Camp Bus stand. From Sindhi camp which is 10 kms away from MNIT campus one can take bus no. 7 and 17. One can also get prepaid taxi''s too for the MNIT campus\r\n\r\n</p><b>From National Highway 11:</b><p>\r\n\r\nWhich connects Agra-Jaipur-Bikaner one can reach to Sindhi Camp Bus stand. From Sindhi camp which is 10 kms away from MNIT campus one can take bus no. 7 and 17. One can also get prepaid taxi''s too for the MNIT campus\r\n\r\n</p><b>From National Highway 12:</b><p>\r\n\r\nWhich connects Jabalpur-Bhopal-Khilchipur-Aklera-Jhalawar-Kota-Bundi-Devli-Tonk-Jaipur. One can reach to Sindhi Camp Bus stand. From Sindhi camp which is 10 kms away from MNIT campus one can take bus no. 7 and 17. Prepaid taxis are also available from bus stand to the MNIT campus.\r\n\r\n</p><br><h3>BY TRAIN:</h3><p>\r\nIndian railways connect Jaipur to almost all major cities of the country. There are three stops close to MNIT: one on Durgapura, about 3 kms from MNIT, from where one can hire a taxi to reach MNIT, another at GhandhiNagar railway station, one km away from MNIT, one can hire a taxi or take bus no. 7 and 17 to reach MNIT.<br>\r\nThe main railway station is about 13 kms from MNIT, one can take a taxi or bus no 7 to reach MNIT.\r\n\r\n</p><br><h3>FROM SANGANER AIRPORT:</h3><p>\r\n\r\nMNIT is roughly five kilometers from Sanganer airport, from there one can either hire a taxi to reach MNIT or take bus no 13 to reach Tonk Phatak and then Bus no, 7 or 17 to reach MNIT.</p>'),
(3, 'How To Reach MNIT?', 2, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'The Institute is located in Malaviya Nagar, Jaipur, a prime location in the City of Jaipur. It is well connected with the National Highways, Jaipur Central Railway Station and Sanganer Airport, Jaipur. Public transport is available just outside the campus, with direct bus to all important parts of the city.'),
(5, 'How To Reach MNIT?', 2, '2', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'How To Reach - Road, Rail and Air?'),
(6, 'College Tour', 3, '1', 'data', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', 'This is a flash tour that will guide you through the campus and the departments as you unlock Doors after Doors sitting in front of your computer screen. \r\n<br><br>\r\nPlease note, if you donot have flash Player installed, it will be automatically downloaded the first time you try this tour (It may take a few extra seconds during Download).<br>'),
(7, 'College Tour', 3, '2', 'popup', 'Rahul Murmuria', '2005-08-18', '', '0000-00-00', '\r\nTake a Tour												');
