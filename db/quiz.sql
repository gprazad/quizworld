-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 20, 2016 at 03:31 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `quiz`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `cat_no` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`cat_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `category`
-- 

INSERT INTO `category` (`cat_no`, `name`) VALUES 
(1, 'National'),
(2, 'International'),
(3, 'Sports'),
(4, 'Science & Technology'),
(5, 'Mathematics & Logic'),
(6, 'Literature'),
(7, 'History');

-- --------------------------------------------------------

-- 
-- Table structure for table `message`
-- 

CREATE TABLE `message` (
  `mid` int(11) NOT NULL auto_increment,
  `msg_time` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `sender_name` text character set latin1 NOT NULL,
  `sender_mail` text character set latin1 NOT NULL,
  `sender_message` text character set latin1 NOT NULL,
  `reply_id` int(11) NOT NULL,
  PRIMARY KEY  (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `message`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `player`
-- 

CREATE TABLE `player` (
  `pid` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `score` int(11) NOT NULL,
  `category` text NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `player`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `quiz`
-- 

CREATE TABLE `quiz` (
  `qid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL,
  `category` text character set latin1 NOT NULL,
  `question` text character set latin1 NOT NULL,
  `options` text character set latin1 NOT NULL,
  `answer` text character set latin1 NOT NULL,
  PRIMARY KEY  (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `quiz`
-- 

INSERT INTO `quiz` (`qid`, `cid`, `category`, `question`, `options`, `answer`) VALUES 
(1, 1, 'Science & Technology', ' Which of the following gases is not a noble gas?', 'Zenon,Helium,Chlorine,Argon', 'Chlorine'),
(2, 1, 'Mathematics & Logic', 'Pointing to a woman a man said, "Her mother is the, only daughter of my mother:" How is the man related to the woman ?', 'Father,Maternal Uncle,Paternal Uncle,Brother', 'Maternal Uncle'),
(3, 2, 'Science & Technology', 'Which of the following pollutes the air of big cities?', 'Copper,Lead,Copper Oxide,Chromium', 'Lead'),
(4, 1, 'National', 'Where is the Central Food Technology Research Institute situated?', 'Delhi,Mysore,Ahmedabad,Hyderabad', 'Mysore'),
(5, 2, 'National', 'Which of the following rivers does not fall into Bay of Bengal?', 'Godavari,Mahanadi,Tapti,Krishna', 'Tapti'),
(6, 3, 'Science & Technology', 'One of the digestive juices that lacks enzymes but aids digestion is ___________', 'Bile,Chyle,Chyme,Succus entericus', 'Bile'),
(7, 4, 'Science & Technology', 'Which temperature in Celsius scale is equal to 300 K ?', '30Â°C,27Â°C,300Â°C,None of these', '27Â°C'),
(8, 2, 'Mathematics & Logic', 'The difference between the greatest number and the smallest number of 5 digits 0, 1, 2, 3, 4 using all but once is __________', '32976,32679,32769,None of these', '32976'),
(9, 3, 'Mathematics & Logic', 'The number which is neither prime nor composite is __', '0,1,2,3', '1'),
(10, 4, 'Mathematics & Logic', 'The length of a room is three times its breadth. If the perimeter of the room is 64 cm, then its breadth is ___ cm.', '64,32,16,8', '8'),
(11, 5, 'Mathematics & Logic', 'Area of a parallelogram whose base is 9 cm and height 4 cm is ___ sq. cm.', '25,12,36,18', '36'),
(12, 6, 'Mathematics & Logic', 'The area of a rhombus with diagonals 12 cm and 20 cm is ____ sq cm.', '120,180,240,200', '120'),
(13, 7, 'Mathematics & Logic', 'There are 800 employees in a company. On one particular day, if 1/10th of the employees were at leave. How many employees were present?', '700,650,720,750', '720'),
(14, 8, 'Mathematics & Logic', 'The quotient in a division is 403. The divisor is 100 and the remainder is 58, the dividend is ______', '40458,34058,43058,40358', '40358'),
(15, 9, 'Mathematics & Logic', 'What least number should be added to 2600 to make it a complete square?', '3,1,9,25', '1'),
(16, 5, 'Science & Technology', 'When sun-light passes through a glass prism, which of the following colours refracts the most ?', 'Blue,Green,Red,Orange', 'Blue'),
(17, 6, 'Science & Technology', 'What is ginger?', 'Flower,Leaf,Root,Stem', 'Root');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `uid` int(11) NOT NULL auto_increment,
  `name` text character set latin1 NOT NULL,
  `password` text character set latin1 NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`uid`, `name`, `password`) VALUES 
(1, 'admin', 'pass'),
(2, 'guru', 'prasad');
