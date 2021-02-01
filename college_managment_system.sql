-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 07:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_management_system`
--
CREATE DATABASE IF NOT EXISTS `college_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `college_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `add_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `zip_code` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`add_id`, `address`, `city`, `zip_code`) VALUES
(1, 'dfgdfg', 'lissabon', 3242),
(2, 'sdfsf', 'los angele', 324),
(3, 'center gor', 'omsk', 2345),
(4, 'שלון', 'חיפה', 3298011),
(5, 'lsad 12', 'חיפה', 3298011),
(6, 'sdfsdf 21', 'ashdod', 2345),
(8, 'gdfgdgf 11', 'ashkelon', 324234),
(10, 'dsfsdf 23', 'praha', 1),
(22, 'sdfs 34', 'almata', 324243);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `add_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Cid` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(10) NOT NULL,
  `duration` int(5) UNSIGNED NOT NULL,
  `Fac_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Cid`, `c_name`, `duration`, `Fac_id`) VALUES
(765745, '4course', 25, 97689),
(8678678, '3course', 44, 256534),
(54535345, '1course', 50, 256534),
(57546456, '2course', 24, 17657),
(87686465, '5course', 55, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `examid` int(10) UNSIGNED NOT NULL,
  `subject` varchar(10) NOT NULL,
  `semester` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examination`
--

INSERT INTO `examination` (`examid`, `subject`, `semester`) VALUES
(423455, 'c++', 2),
(4353454, 'php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_course`
--

CREATE TABLE `exam_course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `room No` int(4) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `duration` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_course`
--

INSERT INTO `exam_course` (`course_id`, `exam_id`, `room No`, `date`, `duration`) VALUES
(765745, 4353454, 55, '2020-05-13', 60),
(8678678, 423455, 123, '2020-07-15', 60),
(8678678, 4353454, 123, '2020-07-22', 60),
(54535345, 423455, 25, '2020-05-13', 50);

-- --------------------------------------------------------

--
-- Table structure for table `extended_links`
--

CREATE TABLE `extended_links` (
  `Link_id` int(10) UNSIGNED NOT NULL,
  `Fac_id` int(10) UNSIGNED NOT NULL,
  `Description_link` varchar(20) NOT NULL,
  `url` varchar(30) NOT NULL,
  `aid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(10) UNSIGNED NOT NULL,
  `Fac_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `Fac_name`) VALUES
(0, 'תוכנה'),
(7657, 'חשמל'),
(17657, 'בניין'),
(97689, 'אדריכלות'),
(256534, 'חומרים');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `Num_group` int(2) UNSIGNED NOT NULL,
  `Academic_year` int(4) UNSIGNED NOT NULL,
  `Num_of_student` int(3) UNSIGNED NOT NULL,
  `semester` int(1) UNSIGNED NOT NULL,
  `Fac_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `Num_group`, `Academic_year`, `Num_of_student`, `semester`, `Fac_id`) VALUES
(1, 445, 2, 34, 1, 0),
(2, 446, 3, 23, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gr_course`
--

CREATE TABLE `gr_course` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Message_id` int(10) UNSIGNED NOT NULL,
  `Sending_time` date NOT NULL,
  `Destination_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(100) NOT NULL,
  `aid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(10) UNSIGNED NOT NULL,
  `gender` varchar(6) NOT NULL,
  `Birth_date` date NOT NULL,
  `add_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `f_name`, `l_name`, `email`, `phone`, `gender`, `Birth_date`, `add_id`, `group_id`) VALUES
(313, 'olga', 'buzova', 'fdgfd@gmail.com', 549244356, 'Female', '2021-01-06', 2, 2),
(330, 'cristiano', 'ronaldo', 'asd@gmail.com', 4365564, 'Male', '2021-01-01', 1, 1),
(332, 'emma', 'watson', 'em@gfdg', 4353453, 'Female', '2021-01-07', 3, 1),
(333, 'Sergey', 'Shilin', 'ssfdsfsdf@gmail.com', 345345, 'Male', '2021-01-06', 4, 1),
(335, 'Aigerim', 'Amanova', 'dsfsdf@fasfd', 435435, 'Female', '2021-01-15', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stud_exam`
--

CREATE TABLE `stud_exam` (
  `sid` int(10) UNSIGNED NOT NULL,
  `examid` int(10) UNSIGNED NOT NULL,
  `grade` int(2) UNSIGNED NOT NULL,
  `test no` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(10) NOT NULL,
  `l_name` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `Birth_date` date NOT NULL,
  `add_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `f_name`, `l_name`, `email`, `phone`, `gender`, `Birth_date`, `add_id`) VALUES
(8, 'Anthony ', 'Davis', 'asdsad@ffs', 4563453, 'Male', '2021-01-07', 8),
(336, 'mila', 'kunis', 'sdfdsf@gfd', 32424, 'Female', '2021-01-07', 22),
(337, 'John ', 'Doe', 'john@gfdss', 4345345, 'Male', '2020-12-30', 6),
(338, 'allen', 'iverson', 'sdfsdf@fds', 4535345, 'Male', '2021-01-14', 10);

-- --------------------------------------------------------

--
-- Table structure for table `teach_course`
--

CREATE TABLE `teach_course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `Tid` int(10) UNSIGNED NOT NULL,
  `schedule_time` date NOT NULL,
  `room` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `log_in_time` date NOT NULL,
  `log_off_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `user_name`, `log_in_time`, `log_off_time`) VALUES
(123432, 'admin', 'admin', '2021-01-06', '2021-01-13'),
(234234, 'zxczxc', '3user', '2020-06-26', '2020-06-09'),
(897898, 'sadg', '5user', '2020-06-24', '2020-06-27'),
(4324234, '234234', '1user', '2020-06-03', '2020-06-10'),
(8757567, 'asdasd', '2user', '2020-06-03', '2020-06-18'),
(435643645, 'asdgsdf', 'adminuser', '2020-06-10', '2020-06-11'),
(456547657, 'asddsafgh', '4user', '2020-06-15', '2020-06-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`),
  ADD UNIQUE KEY `add_id` (`add_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Fac_id` (`Fac_id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`examid`);

--
-- Indexes for table `exam_course`
--
ALTER TABLE `exam_course`
  ADD PRIMARY KEY (`course_id`,`exam_id`),
  ADD UNIQUE KEY `course_id` (`course_id`,`exam_id`),
  ADD KEY `exam_course_ibfk_1` (`exam_id`);

--
-- Indexes for table `extended_links`
--
ALTER TABLE `extended_links`
  ADD PRIMARY KEY (`Link_id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `Num_group` (`Num_group`),
  ADD KEY `Fac_id` (`Fac_id`);

--
-- Indexes for table `gr_course`
--
ALTER TABLE `gr_course`
  ADD PRIMARY KEY (`group_id`,`course_id`),
  ADD KEY `gr_course_ibfk_1` (`course_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Message_id`),
  ADD KEY `aid` (`aid`),
  ADD KEY `Destination_id` (`Destination_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `add_id` (`add_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `stud_exam`
--
ALTER TABLE `stud_exam`
  ADD PRIMARY KEY (`sid`,`examid`),
  ADD UNIQUE KEY `sid` (`sid`,`examid`),
  ADD KEY `stud_exam_ibfk_2` (`examid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `add_id` (`add_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `teach_course`
--
ALTER TABLE `teach_course`
  ADD PRIMARY KEY (`course_id`,`Tid`),
  ADD KEY `teach_course_ibfk_2` (`Tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`add_id`) REFERENCES `address_book` (`add_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Fac_id`) REFERENCES `faculty` (`fac_id`);

--
-- Constraints for table `exam_course`
--
ALTER TABLE `exam_course`
  ADD CONSTRAINT `exam_course_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `examination` (`examid`),
  ADD CONSTRAINT `exam_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`Cid`);

--
-- Constraints for table `extended_links`
--
ALTER TABLE `extended_links`
  ADD CONSTRAINT `extended_links_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admin` (`Aid`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`Fac_id`) REFERENCES `faculty` (`fac_id`);

--
-- Constraints for table `gr_course`
--
ALTER TABLE `gr_course`
  ADD CONSTRAINT `gr_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`Cid`),
  ADD CONSTRAINT `gr_course_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `admin` (`Aid`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`add_id`) REFERENCES `address_book` (`add_id`);

--
-- Constraints for table `stud_exam`
--
ALTER TABLE `stud_exam`
  ADD CONSTRAINT `stud_exam_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `stud_exam_ibfk_2` FOREIGN KEY (`examid`) REFERENCES `examination` (`examid`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`add_id`) REFERENCES `address_book` (`add_id`);

--
-- Constraints for table `teach_course`
--
ALTER TABLE `teach_course`
  ADD CONSTRAINT `teach_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`Cid`),
  ADD CONSTRAINT `teach_course_ibfk_2` FOREIGN KEY (`Tid`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
