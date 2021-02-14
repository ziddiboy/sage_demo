-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2021 at 07:10 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epic_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` text NOT NULL,
  `course_details` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_details`, `is_active`, `date_created`, `date_updated`) VALUES
(1, 'php', 'sdjsdjsjdl', 1, '2021-02-13 12:18:30', '2021-02-13 12:18:30'),
(2, 'java', 'java course', 1, '2021-02-14 07:28:34', '2021-02-14 07:28:34'),
(3, 'javascript_new', 'new course added', 1, '2021-02-14 13:38:42', '2021-02-14 13:38:42'),
(4, 'english', 'english course', 1, '2021-02-14 13:41:38', '2021-02-14 13:41:38'),
(5, 'math', 'math course', 1, '2021-02-14 13:55:07', '2021-02-14 13:55:07'),
(6, 'check', 'course detials', 1, '2021-02-14 14:09:37', '2021-02-14 14:09:37'),
(7, 'test ', 'again', 1, '2021-02-14 14:10:04', '2021-02-14 14:10:04'),
(8, 'new course', 'starting today', 1, '2021-02-14 17:37:49', '2021-02-14 17:37:49'),
(9, 'test', 'course details', 0, '2021-02-15 00:00:32', '2021-02-15 00:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `contact` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `fname`, `lname`, `dob`, `contact`, `is_active`, `date_created`, `date_updated`) VALUES
(2, 'nbnbn', 'kkjk', '2021-02-03', '8000029460', 0, '2021-02-13 12:00:39', '2021-02-13 12:00:39'),
(3, 'question', 'yyyy', '2021-02-03', '9876543213', 1, '2021-02-13 12:34:15', '2021-02-13 12:34:15'),
(4, 'abc', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 12:34:29', '2021-02-13 12:34:29'),
(5, 'abc', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 12:36:10', '2021-02-13 12:36:10'),
(6, 'abc1', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 12:36:20', '2021-02-13 12:36:20'),
(7, 'tema', 'test', '2021-02-03', '9876543213', 1, '2021-02-13 12:36:58', '2021-02-13 12:36:58'),
(8, 'rest123', 'now', '2021-02-03', '9876543213', 1, '2021-02-13 12:37:56', '2021-02-13 12:37:56'),
(9, 'abc123', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 13:29:01', '2021-02-13 13:29:01'),
(10, 'abc123ww', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 13:37:22', '2021-02-13 13:37:22'),
(11, 'check', 'sdsdsd', '2021-02-03', '9876543213', 1, '2021-02-13 13:38:26', '2021-02-13 13:38:26'),
(12, 'abc3ww', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 13:38:49', '2021-02-13 13:38:49'),
(13, 'abc3ww', 'asasas', '2021-02-03', '9876543213', 1, '2021-02-13 13:39:58', '2021-02-13 13:39:58'),
(14, 'Gaurav', 'Kumar', '2021-02-10', '1234567892', 1, '2021-02-14 07:07:57', '2021-02-14 07:07:57'),
(24, 'test now', 'test again', '2021-02-11', '1234567890', 1, '2021-02-14 13:38:09', '2021-02-14 13:38:09'),
(25, 'demo_address1', '321', '2021-02-04', '1234567892', 1, '2021-02-14 17:36:58', '2021-02-14 17:36:58'),
(26, 'kevin', 'pereira', '2021-02-02', '1234567789', 0, '2021-02-15 00:00:05', '2021-02-15 00:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_mapping`
--

DROP TABLE IF EXISTS `student_course_mapping`;
CREATE TABLE IF NOT EXISTS `student_course_mapping` (
  `stud_cour_map_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stud_cour_map_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course_mapping`
--

INSERT INTO `student_course_mapping` (`stud_cour_map_id`, `stud_id`, `course_id`, `is_active`, `date_created`, `date_updated`) VALUES
(1, 4, 2, 1, '2021-02-14 21:15:48', '2021-02-14 21:15:48'),
(2, 5, 5, 1, '2021-02-14 21:16:49', '2021-02-14 21:16:49'),
(3, 7, 7, 1, '2021-02-14 21:16:49', '2021-02-14 21:16:49'),
(4, 7, 7, 1, '2021-02-14 21:16:49', '2021-02-14 21:16:49'),
(5, 9, 7, 1, '2021-02-14 21:16:49', '2021-02-14 21:16:49'),
(6, 10, 8, 1, '2021-02-14 21:16:49', '2021-02-14 21:16:49'),
(7, 10, 7, 1, '2021-02-14 21:16:49', '2021-02-14 21:16:49'),
(8, 14, 6, 1, '2021-02-14 21:18:37', '2021-02-14 21:18:37'),
(9, 4, 8, 1, '2021-02-14 21:18:54', '2021-02-14 21:18:54'),
(10, 8, 6, 1, '2021-02-14 21:18:54', '2021-02-14 21:18:54'),
(11, 9, 6, 1, '2021-02-14 21:20:50', '2021-02-14 21:20:50'),
(12, 11, 8, 1, '2021-02-14 21:20:50', '2021-02-14 21:20:50'),
(13, 14, 5, 1, '2021-02-15 00:01:17', '2021-02-15 00:01:17'),
(14, 14, 4, 1, '2021-02-15 00:01:17', '2021-02-15 00:01:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
