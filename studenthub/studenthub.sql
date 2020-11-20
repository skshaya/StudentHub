-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 11:41 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studenthub`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `new_achieve` (`_caption` VARCHAR(100), `_postType` VARCHAR(10), `_userId` INT, `_achieveDate` DATE, `_image` VARCHAR(200))  BEGIN
START TRANSACTION;
	INSERT INTO post(caption,post_type,added_time,user_id)
	VALUES (_caption,_postType,NOW(),_userId); 
	 
	INSERT INTO achievement 
	VALUES (LAST_INSERT_ID(),_achieveDate);
	
	INSERT INTO post_has_image 
	VALUES (LAST_INSERT_ID(),_image);
	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `new_event` (`_caption` VARCHAR(100), `_postType` VARCHAR(10), `_userId` INT, `_startTime` DATETIME, `_endTime` DATETIME, `_venue` VARCHAR(50), `_image` VARCHAR(200))  BEGIN
START TRANSACTION;
	INSERT INTO post(caption,post_type,added_time,user_id)
	VALUES (_caption,_postType,NOW(),_userId); 
	 
	INSERT INTO event 
	VALUES (LAST_INSERT_ID(),_startTime,_endTime,_venue);
	
	INSERT INTO post_has_image 
	VALUES (LAST_INSERT_ID(),_image);
	
COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `new_vacancy` (`_caption` VARCHAR(100), `_postType` VARCHAR(10), `_userId` INT, `_position` VARCHAR(50), `_image` VARCHAR(200))  BEGIN
START TRANSACTION;
	INSERT INTO post(caption,post_type,added_time,user_id)
	VALUES (_caption,_postType,NOW(),_userId); 
	 
	INSERT INTO vacancy
	VALUES (LAST_INSERT_ID(),_position);
	
	INSERT INTO post_has_image 
	VALUES (LAST_INSERT_ID(),_image);
	
COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `post_id` int(11) NOT NULL,
  `achieve_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`post_id`, `achieve_time`) VALUES
(26, '2018-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL COMMENT 'create fk after post table',
  `time` datetime NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `time`, `content`) VALUES
(1, 1, 31, '2018-06-02 12:08:36', 'hello'),
(2, 1, 31, '2018-06-02 12:09:53', 'another one'),
(5, 1, 31, '2018-06-05 15:04:55', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `post_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `venue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`post_id`, `start_time`, `end_time`, `venue`) VALUES
(21, '2018-05-09 18:06:00', '2018-05-07 11:01:00', '3rtgrer'),
(31, '2018-05-01 18:00:00', '2018-05-03 23:00:00', 'University Premises');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `user_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `verified` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE `moderator` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `post_type` varchar(10) NOT NULL,
  `added_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `caption`, `post_type`, `added_time`, `user_id`) VALUES
(21, 'hello there ', 'event', '2018-05-31 17:22:27', 1),
(26, 'vcvxcvx ', 'achieve', '2018-06-01 13:02:21', 1),
(28, 'fgdfg ', 'vacancy', '2018-06-01 13:53:29', 1),
(30, 'afdsfsdf ', 'vacancy', '2018-06-01 13:56:41', 1),
(31, 'Annual Vesak Festival ', 'event', '2018-06-01 16:14:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_has_image`
--

CREATE TABLE `post_has_image` (
  `post_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_has_image`
--

INSERT INTO `post_has_image` (`post_id`, `image`) VALUES
(21, 'user_img/32484656_593862360998004_5445354748427370496_n.png'),
(26, 'NULL'),
(28, 'NULL'),
(30, 'user_img/aye captain.jpg'),
(31, 'user_img/Vesak-800x445.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `reg_number` varchar(15) NOT NULL,
  `address` varchar(120) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `nic` char(10) NOT NULL,
  `dob` date NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'general',
  `pro_pic` varchar(120) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `degree` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `lname`, `reg_number`, `address`, `contact_no`, `nic`, `dob`, `role`, `pro_pic`, `email`, `occupation`, `batch`, `degree`) VALUES
(1, 'isuru117', 'halo4', 'Isuru', 'Edirisinghe', 'UWU/CST/15/059', 'some address', '0713232814', '960182928v', '1996-01-18', 'general', 'images/26165417_10214987397501338_1281222704810453319_n.jpg', 'isuruedirisinghe80@gmaill.com', 'Student', '2014/2015', 'Computer Science and Technology'),
(2, 'saman', 'qwerty', 'Saman', 'Kumara', 'UWU/IIT/14/039', 'some address', '0713434567', '987062928v', '1990-06-06', 'general', 'images/my3newut.jpg', 'saman@uwu.ac.lk', 'Software Engineer', '2012/2013', 'Computer Science and Technology');

-- --------------------------------------------------------

--
-- Table structure for table `user_connects_user`
--

CREATE TABLE `user_connects_user` (
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_connects_user`
--

INSERT INTO `user_connects_user` (`sender_id`, `reciever_id`, `status`, `time`) VALUES
(1, 2, '1', '2018-06-01 14:41:21'),
(2, 1, '1', '2018-06-01 14:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes_post`
--

CREATE TABLE `user_likes_post` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `liked` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_reports_post`
--

CREATE TABLE `user_reports_post` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `post_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`post_id`, `position`) VALUES
(28, 'qsqwwewr'),
(30, 'sdfsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_COMMENT_USER` (`user_id`),
  ADD KEY `FK_COMMENT_POST` (`post_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`user_id`,`mod_id`),
  ADD KEY `FK_GENERAL` (`mod_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `FK_MSG_SENDER` (`sender_id`),
  ADD KEY `FK_MSG_RECIEVER` (`reciever_id`);

--
-- Indexes for table `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `FK_POST_USER` (`user_id`);

--
-- Indexes for table `post_has_image`
--
ALTER TABLE `post_has_image`
  ADD PRIMARY KEY (`post_id`,`image`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `reg_number` (`reg_number`),
  ADD UNIQUE KEY `nic` (`nic`);

--
-- Indexes for table `user_connects_user`
--
ALTER TABLE `user_connects_user`
  ADD PRIMARY KEY (`sender_id`,`reciever_id`),
  ADD KEY `FK_CONNECTOR_ID` (`reciever_id`);

--
-- Indexes for table `user_likes_post`
--
ALTER TABLE `user_likes_post`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `FK_LIKE_POST` (`post_id`);

--
-- Indexes for table `user_reports_post`
--
ALTER TABLE `user_reports_post`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `FK_REPORT_POST` (`post_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement`
--
ALTER TABLE `achievement`
  ADD CONSTRAINT `FK_ACHIEVE_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_COMMENT_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_COMMENT_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_EVENT_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general`
--
ALTER TABLE `general`
  ADD CONSTRAINT `FK_GENERAL` FOREIGN KEY (`mod_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_MSG_RECIEVER` FOREIGN KEY (`reciever_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MSG_SENDER` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `FK_MOD` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_POST_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_has_image`
--
ALTER TABLE `post_has_image`
  ADD CONSTRAINT `FK_IMAGE_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_connects_user`
--
ALTER TABLE `user_connects_user`
  ADD CONSTRAINT `FK_CONNECTOR_ID` FOREIGN KEY (`reciever_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_likes_post`
--
ALTER TABLE `user_likes_post`
  ADD CONSTRAINT `FK_LIKE_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LIKE_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_reports_post`
--
ALTER TABLE `user_reports_post`
  ADD CONSTRAINT `FK_REPORT_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_REPORT_USER` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `FK_VACANCY_POST` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
