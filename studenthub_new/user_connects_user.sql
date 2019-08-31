-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 08:21 AM
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
(1, 2, '2', '2018-06-01 14:41:21'),
(1, 5, '2', '2018-07-27 13:15:22'),
(1, 6, '0', '2018-07-21 09:31:44'),
(2, 1, '2', '2018-06-01 14:41:22'),
(5, 1, '2', '2018-07-27 13:15:22'),
(6, 1, '0', '2018-07-21 09:31:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_connects_user`
--
ALTER TABLE `user_connects_user`
  ADD PRIMARY KEY (`sender_id`,`reciever_id`),
  ADD KEY `FK_CONNECTOR_ID` (`reciever_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_connects_user`
--
ALTER TABLE `user_connects_user`
  ADD CONSTRAINT `FK_CONNECTOR_ID` FOREIGN KEY (`reciever_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
