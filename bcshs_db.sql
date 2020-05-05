-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 05:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcshs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `ay_id` int(11) NOT NULL,
  `schl_year` varchar(10) NOT NULL,
  `current` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`ay_id`, `schl_year`, `current`) VALUES
(23, '2020', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `class_2020_1`
--

CREATE TABLE `class_2020_1` (
  `enrollment_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` enum('Attending','Not Attending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_2020_1`
--

INSERT INTO `class_2020_1` (`enrollment_id`, `schedule_id`, `status`) VALUES
(2, 3, NULL),
(2, 4, NULL),
(2, 5, NULL),
(2, 6, NULL),
(2, 7, NULL),
(2, 8, NULL),
(2, 9, NULL),
(2, 10, NULL),
(2, 11, NULL),
(4, 3, NULL),
(4, 4, NULL),
(4, 5, NULL),
(4, 6, NULL),
(4, 7, NULL),
(4, 8, NULL),
(4, 9, NULL),
(4, 10, NULL),
(4, 11, NULL),
(5, 3, NULL),
(5, 4, NULL),
(5, 5, NULL),
(5, 6, NULL),
(5, 7, NULL),
(5, 8, NULL),
(5, 9, NULL),
(5, 10, NULL),
(5, 11, NULL),
(6, 3, NULL),
(6, 4, NULL),
(6, 5, NULL),
(6, 6, NULL),
(6, 7, NULL),
(6, 8, NULL),
(6, 9, NULL),
(6, 10, NULL),
(6, 11, NULL),
(3, 3, NULL),
(3, 4, NULL),
(3, 5, NULL),
(3, 6, NULL),
(3, 7, NULL),
(3, 8, NULL),
(3, 9, NULL),
(3, 10, NULL),
(3, 11, NULL),
(7, 22, NULL),
(7, 23, NULL),
(7, 24, NULL),
(7, 25, NULL),
(7, 26, NULL),
(7, 27, NULL),
(7, 28, NULL),
(7, 29, NULL),
(7, 30, NULL),
(9, 22, NULL),
(9, 23, NULL),
(9, 24, NULL),
(9, 25, NULL),
(9, 26, NULL),
(9, 27, NULL),
(9, 28, NULL),
(9, 29, NULL),
(9, 30, NULL),
(8, 22, NULL),
(8, 23, NULL),
(8, 24, NULL),
(8, 25, NULL),
(8, 26, NULL),
(8, 27, NULL),
(8, 28, NULL),
(8, 29, NULL),
(8, 30, NULL),
(10, 22, NULL),
(10, 23, NULL),
(10, 24, NULL),
(10, 25, NULL),
(10, 26, NULL),
(10, 27, NULL),
(10, 28, NULL),
(10, 29, NULL),
(10, 30, NULL),
(11, 22, NULL),
(11, 23, NULL),
(11, 24, NULL),
(11, 25, NULL),
(11, 26, NULL),
(11, 27, NULL),
(11, 28, NULL),
(11, 29, NULL),
(11, 30, NULL),
(12, 13, NULL),
(12, 14, NULL),
(12, 15, NULL),
(12, 16, NULL),
(12, 17, NULL),
(12, 18, NULL),
(12, 19, NULL),
(12, 20, NULL),
(12, 21, NULL),
(13, 13, NULL),
(13, 14, NULL),
(13, 15, NULL),
(13, 16, NULL),
(13, 17, NULL),
(13, 18, NULL),
(13, 19, NULL),
(13, 20, NULL),
(13, 21, NULL),
(14, 13, NULL),
(14, 14, NULL),
(14, 15, NULL),
(14, 16, NULL),
(14, 17, NULL),
(14, 18, NULL),
(14, 19, NULL),
(14, 20, NULL),
(14, 21, NULL),
(15, 13, NULL),
(15, 14, NULL),
(15, 15, NULL),
(15, 16, NULL),
(15, 17, NULL),
(15, 18, NULL),
(15, 19, NULL),
(15, 20, NULL),
(15, 21, NULL),
(16, 13, NULL),
(16, 14, NULL),
(16, 15, NULL),
(16, 16, NULL),
(16, 17, NULL),
(16, 18, NULL),
(16, 19, NULL),
(16, 20, NULL),
(16, 21, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class_2020_2`
--

CREATE TABLE `class_2020_2` (
  `enrollment_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` enum('Attending','Not Attending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `curriculum_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester` enum('First Semester','Second Semester') NOT NULL,
  `grade_level` enum('Grade 11','Grade 12','','') NOT NULL,
  `hours` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculum_id`, `strand_id`, `subject_id`, `semester`, `grade_level`, `hours`) VALUES
(318, 1, 86, 'First Semester', 'Grade 11', '80'),
(320, 1, 88, 'First Semester', 'Grade 11', '80'),
(321, 1, 89, 'First Semester', 'Grade 11', '80'),
(322, 1, 90, 'First Semester', 'Grade 11', '80'),
(323, 1, 91, 'First Semester', 'Grade 11', '80'),
(333, 2, 32, 'First Semester', 'Grade 12', '80'),
(337, 1, 93, 'First Semester', 'Grade 11', '20'),
(338, 3, 86, 'First Semester', 'Grade 11', '80'),
(339, 1, 95, 'First Semester', 'Grade 11', '80'),
(340, 1, 96, 'First Semester', 'Grade 11', '80'),
(341, 1, 87, 'First Semester', 'Grade 11', '80'),
(342, 1, 168, 'Second Semester', 'Grade 11', '80'),
(343, 1, 169, 'Second Semester', 'Grade 11', '80'),
(344, 1, 170, 'Second Semester', 'Grade 11', '80'),
(345, 1, 171, 'Second Semester', 'Grade 11', '80'),
(346, 1, 93, 'Second Semester', 'Grade 11', '20'),
(347, 1, 172, 'Second Semester', 'Grade 11', '80'),
(348, 1, 177, 'Second Semester', 'Grade 11', '80'),
(349, 1, 174, 'Second Semester', 'Grade 11', '80'),
(350, 1, 173, 'Second Semester', 'Grade 11', '80');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL,
  `acronym` varchar(10) NOT NULL,
  `dept_head` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `acronym`, `dept_head`) VALUES
(21, 'Science, Technology, Engineering and Mathematics', 'STEM', 358),
(22, 'Accounting, Business and Management', 'ABM', 354),
(23, 'Humanities and Social Sciences', 'HUMSS', 356),
(24, 'General Academic Strand', 'GAS', 345),
(25, 'Tech-Vocational Livelihood', 'TVL', 399);

-- --------------------------------------------------------

--
-- Table structure for table `educationalbackground`
--

CREATE TABLE `educationalbackground` (
  `student_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_2020_1`
--

CREATE TABLE `enrollment_2020_1` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `strand_id` int(11) NOT NULL,
  `offer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment_2020_1`
--

INSERT INTO `enrollment_2020_1` (`enrollment_id`, `student_id`, `grade_level`, `strand_id`, `offer_id`) VALUES
(1, 137, 'Grade 12', 6, NULL),
(2, 90, 'Grade 11', 1, 2),
(3, 93, 'Grade 11', 1, 2),
(4, 91, 'Grade 11', 1, 2),
(5, 92, 'Grade 11', 1, 2),
(6, 94, 'Grade 11', 1, 2),
(7, 100, 'Grade 12', 1, 3),
(8, 107, 'Grade 12', 1, 3),
(9, 108, 'Grade 12', 1, 3),
(10, 101, 'Grade 12', 1, 3),
(11, 102, 'Grade 12', 1, 3),
(12, 109, 'Grade 11', 2, 4),
(13, 110, 'Grade 11', 2, 4),
(14, 103, 'Grade 11', 2, 4),
(15, 104, 'Grade 11', 2, 4),
(16, 111, 'Grade 11', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_2020_2`
--

CREATE TABLE `enrollment_2020_2` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `strand_id` int(11) NOT NULL,
  `offer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grades_2020_1`
--

CREATE TABLE `grades_2020_1` (
  `grade_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `first_quarter` float NOT NULL,
  `second_quarter` float NOT NULL,
  `final` float NOT NULL,
  `remark` enum('PENDING','PASSED','FAILED') DEFAULT NULL,
  `enrollment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades_2020_1`
--

INSERT INTO `grades_2020_1` (`grade_id`, `schedule_id`, `first_quarter`, `second_quarter`, `final`, `remark`, `enrollment_id`) VALUES
(16, 3, 88, 0, 88, 'PASSED', 2),
(17, 4, 0, 0, 0, 'PENDING', 2),
(18, 5, 0, 0, 0, 'PENDING', 2),
(19, 6, 0, 0, 0, 'PENDING', 2),
(20, 7, 0, 0, 0, 'PENDING', 2),
(21, 8, 0, 0, 0, 'PENDING', 2),
(22, 9, 0, 0, 0, 'PENDING', 2),
(23, 10, 0, 0, 0, 'PENDING', 2),
(24, 11, 0, 0, 0, 'PENDING', 2),
(25, 3, 0, 0, 0, 'PENDING', 4),
(26, 4, 0, 0, 0, 'PENDING', 4),
(27, 5, 0, 0, 0, 'PENDING', 4),
(28, 6, 0, 0, 0, 'PENDING', 4),
(29, 7, 0, 0, 0, 'PENDING', 4),
(30, 8, 0, 0, 0, 'PENDING', 4),
(31, 9, 0, 0, 0, 'PENDING', 4),
(32, 10, 0, 0, 0, 'PENDING', 4),
(33, 11, 0, 0, 0, 'PENDING', 4),
(34, 3, 0, 0, 0, 'PENDING', 5),
(35, 4, 0, 0, 0, 'PENDING', 5),
(36, 5, 0, 0, 0, 'PENDING', 5),
(37, 6, 0, 0, 0, 'PENDING', 5),
(38, 7, 0, 0, 0, 'PENDING', 5),
(39, 8, 0, 0, 0, 'PENDING', 5),
(40, 9, 0, 0, 0, 'PENDING', 5),
(41, 10, 0, 0, 0, 'PENDING', 5),
(42, 11, 0, 0, 0, 'PENDING', 5),
(43, 3, 0, 0, 0, 'PENDING', 6),
(44, 4, 0, 0, 0, 'PENDING', 6),
(45, 5, 0, 0, 0, 'PENDING', 6),
(46, 6, 0, 0, 0, 'PENDING', 6),
(47, 7, 0, 0, 0, 'PENDING', 6),
(48, 8, 0, 0, 0, 'PENDING', 6),
(49, 9, 0, 0, 0, 'PENDING', 6),
(50, 10, 0, 0, 0, 'PENDING', 6),
(51, 11, 0, 0, 0, 'PENDING', 6),
(52, 3, 80, 0, 80, 'PASSED', 3),
(53, 4, 0, 0, 0, 'PENDING', 3),
(54, 5, 0, 0, 0, 'PENDING', 3),
(55, 6, 0, 0, 0, 'PENDING', 3),
(56, 7, 0, 0, 0, 'PENDING', 3),
(57, 8, 0, 0, 0, 'PENDING', 3),
(58, 9, 0, 0, 0, 'PENDING', 3),
(59, 10, 0, 0, 0, 'PENDING', 3),
(60, 11, 0, 0, 0, 'PENDING', 3),
(61, 22, 0, 0, 0, 'PENDING', 7),
(62, 23, 0, 0, 0, 'PENDING', 7),
(63, 24, 0, 0, 0, 'PENDING', 7),
(64, 25, 0, 0, 0, 'PENDING', 7),
(65, 26, 0, 0, 0, 'PENDING', 7),
(66, 27, 0, 0, 0, 'PENDING', 7),
(67, 28, 0, 0, 0, 'PENDING', 7),
(68, 29, 0, 0, 0, 'PENDING', 7),
(69, 30, 0, 0, 0, 'PENDING', 7),
(70, 22, 0, 0, 0, 'PENDING', 9),
(71, 23, 0, 0, 0, 'PENDING', 9),
(72, 24, 0, 0, 0, 'PENDING', 9),
(73, 25, 0, 0, 0, 'PENDING', 9),
(74, 26, 0, 0, 0, 'PENDING', 9),
(75, 27, 0, 0, 0, 'PENDING', 9),
(76, 28, 0, 0, 0, 'PENDING', 9),
(77, 29, 0, 0, 0, 'PENDING', 9),
(78, 30, 0, 0, 0, 'PENDING', 9),
(79, 22, 0, 0, 0, 'PENDING', 8),
(80, 23, 0, 0, 0, 'PENDING', 8),
(81, 24, 0, 0, 0, 'PENDING', 8),
(82, 25, 0, 0, 0, 'PENDING', 8),
(83, 26, 0, 0, 0, 'PENDING', 8),
(84, 27, 0, 0, 0, 'PENDING', 8),
(85, 28, 0, 0, 0, 'PENDING', 8),
(86, 29, 0, 0, 0, 'PENDING', 8),
(87, 30, 0, 0, 0, 'PENDING', 8),
(88, 22, 0, 0, 0, 'PENDING', 10),
(89, 23, 0, 0, 0, 'PENDING', 10),
(90, 24, 0, 0, 0, 'PENDING', 10),
(91, 25, 0, 0, 0, 'PENDING', 10),
(92, 26, 0, 0, 0, 'PENDING', 10),
(93, 27, 0, 0, 0, 'PENDING', 10),
(94, 28, 0, 0, 0, 'PENDING', 10),
(95, 29, 0, 0, 0, 'PENDING', 10),
(96, 30, 0, 0, 0, 'PENDING', 10),
(97, 22, 0, 0, 0, 'PENDING', 11),
(98, 23, 0, 0, 0, 'PENDING', 11),
(99, 24, 0, 0, 0, 'PENDING', 11),
(100, 25, 0, 0, 0, 'PENDING', 11),
(101, 26, 0, 0, 0, 'PENDING', 11),
(102, 27, 0, 0, 0, 'PENDING', 11),
(103, 28, 0, 0, 0, 'PENDING', 11),
(104, 29, 0, 0, 0, 'PENDING', 11),
(105, 30, 0, 0, 0, 'PENDING', 11),
(106, 13, 0, 0, 0, 'PENDING', 12),
(107, 14, 0, 0, 0, 'PENDING', 12),
(108, 15, 0, 0, 0, 'PENDING', 12),
(109, 16, 0, 0, 0, 'PENDING', 12),
(110, 17, 0, 0, 0, 'PENDING', 12),
(111, 18, 0, 0, 0, 'PENDING', 12),
(112, 19, 0, 0, 0, 'PENDING', 12),
(113, 20, 0, 0, 0, 'PENDING', 12),
(114, 21, 0, 0, 0, 'PENDING', 12),
(115, 13, 0, 0, 0, 'PENDING', 13),
(116, 14, 0, 0, 0, 'PENDING', 13),
(117, 15, 0, 0, 0, 'PENDING', 13),
(118, 16, 0, 0, 0, 'PENDING', 13),
(119, 17, 0, 0, 0, 'PENDING', 13),
(120, 18, 0, 0, 0, 'PENDING', 13),
(121, 19, 0, 0, 0, 'PENDING', 13),
(122, 20, 0, 0, 0, 'PENDING', 13),
(123, 21, 0, 0, 0, 'PENDING', 13),
(124, 13, 0, 0, 0, 'PENDING', 14),
(125, 14, 0, 0, 0, 'PENDING', 14),
(126, 15, 0, 0, 0, 'PENDING', 14),
(127, 16, 0, 0, 0, 'PENDING', 14),
(128, 17, 0, 0, 0, 'PENDING', 14),
(129, 18, 0, 0, 0, 'PENDING', 14),
(130, 19, 0, 0, 0, 'PENDING', 14),
(131, 20, 0, 0, 0, 'PENDING', 14),
(132, 21, 0, 0, 0, 'PENDING', 14),
(133, 13, 0, 0, 0, 'PENDING', 15),
(134, 14, 0, 0, 0, 'PENDING', 15),
(135, 15, 0, 0, 0, 'PENDING', 15),
(136, 16, 0, 0, 0, 'PENDING', 15),
(137, 17, 0, 0, 0, 'PENDING', 15),
(138, 18, 0, 0, 0, 'PENDING', 15),
(139, 19, 0, 0, 0, 'PENDING', 15),
(140, 20, 0, 0, 0, 'PENDING', 15),
(141, 21, 0, 0, 0, 'PENDING', 15),
(142, 13, 0, 0, 0, 'PENDING', 16),
(143, 14, 0, 0, 0, 'PENDING', 16),
(144, 15, 0, 0, 0, 'PENDING', 16),
(145, 16, 0, 0, 0, 'PENDING', 16),
(146, 17, 0, 0, 0, 'PENDING', 16),
(147, 18, 0, 0, 0, 'PENDING', 16),
(148, 19, 0, 0, 0, 'PENDING', 16),
(149, 20, 0, 0, 0, 'PENDING', 16),
(150, 21, 0, 0, 0, 'PENDING', 16);

-- --------------------------------------------------------

--
-- Table structure for table `grades_2020_2`
--

CREATE TABLE `grades_2020_2` (
  `grade_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `first_quarter` float NOT NULL,
  `second_quarter` float NOT NULL,
  `final` float NOT NULL,
  `remark` enum('PENDING','PASSED','FAILED') DEFAULT NULL,
  `enrollment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ions`
--

CREATE TABLE `ions` (
  `ion_id` int(11) NOT NULL,
  `ion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ions`
--

INSERT INTO `ions` (`ion_id`, `ion`) VALUES
(1, 'Core'),
(2, 'Applied'),
(3, 'Specialized');

-- --------------------------------------------------------

--
-- Table structure for table `offerings`
--

CREATE TABLE `offerings` (
  `offer_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `section_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerings`
--

INSERT INTO `offerings` (`offer_id`, `grade_level`, `section_id`, `strand_id`) VALUES
(1, 'Grade 11', 1, 1),
(2, 'Grade 12', 2, 2),
(3, 'Grade 11', 5, 4),
(4, 'Grade 12', 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `offerings_2020_1`
--

CREATE TABLE `offerings_2020_1` (
  `offer_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `section_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `adviser` int(11) DEFAULT NULL,
  `max_enrollee` int(11) DEFAULT NULL,
  `enrolled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offerings_2020_1`
--

INSERT INTO `offerings_2020_1` (`offer_id`, `grade_level`, `section_id`, `strand_id`, `adviser`, `max_enrollee`, `enrolled`) VALUES
(2, 'Grade 11', 1, 1, 343, 30, 5),
(3, 'Grade 12', 2, 1, 344, 30, 5),
(4, 'Grade 11', 3, 2, 345, 30, 5),
(5, 'Grade 12', 4, 2, 346, 30, 0),
(6, 'Grade 11', 5, 3, 347, 30, 0),
(7, 'Grade 12', 6, 3, 348, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `offerings_2020_2`
--

CREATE TABLE `offerings_2020_2` (
  `offer_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `section_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `adviser` int(11) DEFAULT NULL,
  `max_enrollee` int(11) DEFAULT NULL,
  `enrolled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offerings_def_1`
--

CREATE TABLE `offerings_def_1` (
  `offer_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `section_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offerings_def_1`
--

INSERT INTO `offerings_def_1` (`offer_id`, `grade_level`, `section_id`, `strand_id`) VALUES
(1, 'Grade 11', 1, 1),
(3, 'Grade 12', 2, 1),
(4, 'Grade 11', 3, 2),
(5, 'Grade 12', 4, 2),
(6, 'Grade 11', 5, 3),
(7, 'Grade 12', 6, 3),
(8, 'Grade 11', 7, 4),
(9, 'Grade 12', 8, 4),
(10, 'Grade 11', 9, 5),
(11, 'Grade 12', 10, 5),
(13, 'Grade 11', 11, 6),
(14, 'Grade 12', 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `offerings_def_2`
--

CREATE TABLE `offerings_def_2` (
  `offer_id` int(11) NOT NULL,
  `grade_level` enum('Grade 11','Grade 12') NOT NULL,
  `section_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `relationship` enum('Father','Mother','Guardian') NOT NULL,
  `p_address` varchar(100) DEFAULT NULL,
  `p_contact` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room`) VALUES
(4, 'room1'),
(5, 'room2'),
(6, 'room3'),
(7, 'room4'),
(8, 'room5'),
(9, 'room6'),
(10, 'room7'),
(11, 'room8'),
(12, 'room9'),
(13, 'room10'),
(14, 'room11'),
(15, 'room12'),
(16, 'room13'),
(17, 'room14'),
(18, 'room15'),
(19, 'room16'),
(20, 'room17'),
(21, 'room18'),
(22, 'room19'),
(23, 'room20');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `offer_id`, `days`, `time`, `room_id`, `t_id`, `subject_id`) VALUES
(1, 1, 'TBA', 'TBA', 4, 343, 25),
(2, 2, 'TBA', 'TBA', 5, 344, 51),
(3, 3, 'TBA', 'TBA', 17, 355, 54),
(4, 4, 'TBA', 'TBA', 19, 406, 50),
(5, 2, 'TBA', 'TBA', 15, 360, 50),
(6, 2, 'TBA', 'TBA', 15, 360, 50),
(7, 2, 'TBA', 'TBA', 15, 360, 50),
(8, 2, 'TBA', 'TBA', 15, 360, 50),
(9, 2, 'TBA', 'TBA', 15, 360, 50),
(10, 2, 'TBA', 'TBA', 15, 360, 50),
(11, 2, 'TBA', 'TBA', 15, 360, 50),
(12, 2, 'TBA', 'TBA', 15, 360, 50),
(13, 2, 'TBA', 'TBA', 15, 360, 50),
(14, 2, 'TBA', 'TBA', 15, 360, 50),
(15, 2, 'TBA', 'TBA', 15, 360, 50),
(16, 2, 'TBA', 'TBA', 15, 360, 50);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_2020_1`
--

CREATE TABLE `schedule_2020_1` (
  `schedule_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_2020_1`
--

INSERT INTO `schedule_2020_1` (`schedule_id`, `offer_id`, `subject_id`, `days`, `time`, `room_id`, `teacher_id`) VALUES
(3, 2, 86, 'M', '8:00 - 9:00', 4, 343),
(4, 2, 87, 'M', '9:00 - 10:00', 8, 344),
(5, 2, 88, 'W', '8:30 - 9:30', 11, 345),
(6, 2, 89, 'F', '2:30 - 3:30', 18, 346),
(7, 2, 90, 'W', '1:30 - 2:30', 22, 347),
(8, 2, 91, 'T', '4:30 - 5:30', 10, 348),
(9, 2, 93, 'F', '11:00 - 12:00', 6, 349),
(10, 2, 95, 'W', '9:00 - 10:00', 8, 350),
(11, 2, 96, 'W', '9:30 - 10:30', 12, 351),
(13, 4, 86, 'M', '7:30 - 8:30', 5, 343),
(14, 4, 87, 'T', '8:00 - 9:00', 7, 344),
(15, 4, 103, 'T', '8:00 - 9:00', 9, 345),
(16, 4, 89, 'T', '7:30 - 8:30', 6, 346),
(17, 4, 90, 'M', '8:00 - 9:00', 7, 347),
(18, 4, 91, 'W', '8:30 - 9:30', 7, 348),
(19, 4, 93, 'W', '7:30 - 8:30', 7, 349),
(20, 4, 95, 'W', '7:30 - 8:30', 6, 350),
(21, 4, 35, 'F', '8:30 - 9:30', 7, 351),
(22, 3, 97, 'T', '7:00 - 8:00', 15, 343),
(23, 3, 98, 'T', '8:00 - 9:00', 10, 344),
(24, 3, 93, 'W', '10:00 - 11:00', 5, 345),
(25, 3, 99, 'F', '11:00 - 12:00', 9, 346),
(26, 3, 100, 'T', '7:30 - 8:30', 5, 347),
(27, 3, 102, 'S', '8:30 - 9:30', 10, 348),
(28, 3, 25, 'M', '9:00 - 10:00', 6, 349),
(29, 3, 26, 'T', '8:00 - 9:00', 6, 350),
(30, 3, 27, 'W', '9:30 - 10:30', 8, 346);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_2020_2`
--

CREATE TABLE `schedule_2020_2` (
  `schedule_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_def_1`
--

CREATE TABLE `schedule_def_1` (
  `schedule_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_def_1`
--

INSERT INTO `schedule_def_1` (`schedule_id`, `offer_id`, `subject_id`, `days`, `time`, `room_id`, `teacher_id`) VALUES
(8, 1, 86, 'M', '8:00 - 9:00', 4, 343),
(9, 1, 87, 'M', '9:00 - 10:00', 8, 344),
(10, 1, 88, 'W', '8:30 - 9:30', 11, 345),
(11, 1, 89, 'F', '2:30 - 3:30', 18, 346),
(12, 1, 90, 'W', '1:30 - 2:30', 22, 347),
(13, 1, 91, 'T', '4:30 - 5:30', 10, 348),
(14, 1, 93, 'F', '11:00 - 12:00', 6, 349),
(15, 1, 95, 'W', '9:00 - 10:00', 8, 350),
(16, 1, 96, 'W', '9:30 - 10:30', 12, 351),
(17, 3, 97, 'T', '7:00 - 8:00', 15, 343),
(18, 3, 98, 'T', '8:00 - 9:00', 10, 344),
(19, 3, 93, 'W', '10:00 - 11:00', 5, 345),
(20, 3, 99, 'F', '11:00 - 12:00', 9, 346),
(21, 3, 100, 'T', '7:30 - 8:30', 5, 347),
(22, 3, 102, 'S', '8:30 - 9:30', 10, 348),
(23, 3, 25, 'M', '9:00 - 10:00', 6, 349),
(24, 3, 26, 'T', '8:00 - 9:00', 6, 350),
(25, 3, 27, 'W', '9:30 - 10:30', 8, 346),
(26, 4, 86, 'M', '7:30 - 8:30', 5, 343),
(27, 4, 87, 'T', '8:00 - 9:00', 7, 344),
(28, 4, 103, 'T', '8:00 - 9:00', 9, 345),
(29, 4, 89, 'T', '7:30 - 8:30', 6, 346),
(30, 4, 90, 'M', '8:00 - 9:00', 7, 347),
(31, 4, 91, 'W', '8:30 - 9:30', 7, 348),
(32, 4, 93, 'W', '7:30 - 8:30', 7, 349),
(33, 4, 95, 'W', '7:30 - 8:30', 6, 350),
(34, 4, 35, 'F', '8:30 - 9:30', 7, 351);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_def_2`
--

CREATE TABLE `schedule_def_2` (
  `schedule_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `days` varchar(10) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section`) VALUES
(1, 'NEWTON'),
(2, 'EINSTEIN'),
(3, 'JK ROWLING'),
(4, 'WALT DISNEY'),
(5, 'DEWEY'),
(6, 'SMITH'),
(7, 'ARISTOTLE'),
(8, 'EPICURUS'),
(9, 'PYTHAGORAS'),
(10, 'SOCRATES'),
(11, 'Celery'),
(12, 'Chamomile'),
(13, 'Chives '),
(14, 'Gerante'),
(15, 'Binary'),
(16, 'Syntax'),
(17, 'Tecnico'),
(18, 'Oryza Sativa'),
(19, 'Darwin'),
(20, 'Hawkings'),
(21, 'Anderson'),
(22, 'Carnegie'),
(23, 'Shakespeare'),
(24, 'Homer'),
(25, 'Archimedes'),
(26, 'Da Vinci'),
(27, 'Picasso'),
(28, 'Copernicus'),
(29, 'Cumin'),
(30, 'Parsley'),
(31, 'Saffron'),
(32, 'Sorvegliante'),
(33, 'Bytes'),
(34, 'Codec'),
(35, 'Pixel'),
(36, 'Ipomea');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `current` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `semester`, `current`) VALUES
(1, 'First Semester', 'yes'),
(2, 'Second Semester', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `strands`
--

CREATE TABLE `strands` (
  `strand_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `strand_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strands`
--

INSERT INTO `strands` (`strand_id`, `track_id`, `strand`, `strand_desc`) VALUES
(1, 1, 'STEM', 'Science, Technology, Engineering and Math'),
(2, 1, 'ABM', 'Accountancy, Business and Management'),
(3, 1, 'HUMSS', 'Humanities and Social Sciences Strand'),
(4, 1, 'GAS', 'General Academic Strand'),
(5, 2, 'TVL', 'Technical Vocational Livelihood'),
(6, 1, 'ICT', 'Information and Communication Technology');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `age` varchar(11) DEFAULT NULL,
  `gender` enum('1','2') NOT NULL,
  `bdate` varchar(15) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `strand_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `grade_level` enum('Grade 11','Grade 12') DEFAULT NULL,
  `contact` varchar(20) NOT NULL,
  `status` enum('new','old','transferee') NOT NULL,
  `enrollee` enum('Registered','Enrolled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `lrn`, `first_name`, `last_name`, `middle_name`, `extension_name`, `age`, `gender`, `bdate`, `home_address`, `strand_id`, `user_id`, `grade_level`, `contact`, `status`, `enrollee`) VALUES
(90, '000000000000', 'Markony Runel', 'Alea', 'Lubay', 's', '', '1', '0000-00-00', '#', 1, 6, 'Grade 11', '09265213721', 'new', 'Registered'),
(91, '000000000000', 'Jhehann', 'Almayda', 'Bokeron', '', '', '1', '0000-00-00', 'm', 1, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(92, '127340000003', 'JohnMart', 'Andradee', 'Nayre', '', NULL, '2', '0000-00-00', 'ra', 1, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(93, '000000000000', 'Rocris', 'A?onuevo', 'Rocris', '', '', '1', '0000-00-00', 'as', 1, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(94, '127340000005', 'Romelyn', 'Barcelon', 'Gontenias', '', NULL, '1', '0000-00-00', 's', 1, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(95, '127340000006', 'Romulo', 'Belen', 'Galvez', '', NULL, '1', '0000-00-00', 'd', 5, NULL, 'Grade 11', 'old', 'new', 'Registered'),
(96, '127340000007', 'Kim James', 'Brazil', 'Kim James', '', NULL, '1', '0000-00-00', 'sa', 5, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(97, '127340000008', 'Aisa Ross', 'Brillo', 'Aisa Ross', '', NULL, '1', '0000-00-00', 'sa', 5, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(98, '127340000009', 'Neilcy', 'Bustillo', 'Cuasito', '', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(99, '127340000010', 'Michelle', 'Caballes', 'Javier', '', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 12', '09265213721', 'new', 'Registered'),
(100, '127340000011', 'Dante', 'Cagang', 'Gabriel', 'Jr', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(101, '127340000012', 'Jhenney Anne', 'Despacio', 'Monleon', '', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(102, '127340000013', 'Chofrancis', 'Dinoy', 'To-ong', '', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(103, '127340000014', 'Clarence', 'Eralino', 'De Veyra', '', NULL, '1', '0000-00-00', '', 2, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(104, '127340000015', 'Carina', 'Esmolo', '', '', NULL, '1', '0000-00-00', '', 2, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(105, '127340000016', 'Jane Carla', 'Etis', 'Rapas', '', NULL, '1', '0000-00-00', '', 3, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(106, '127340000018', 'Javin', 'Granada', 'Alkuino', '', NULL, '1', '0000-00-00', '', 3, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(107, '127340000063', 'Loyd Vincent', 'Cortez', '', '', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(108, '127340000064', 'Kessille Jane', 'De Jesus', 'Sayson', '', NULL, '1', '0000-00-00', '', 1, NULL, 'Grade 12', '09265213721', 'old', 'Registered'),
(109, '127340000065', 'Mark Julius', 'Donoga', 'Bagarinao', '', NULL, '1', '0000-00-00', '', 2, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(110, '127340000066', 'Mhearalyn', 'Eleoran', 'Sumandal', '', NULL, '', '0000-00-00', '', 2, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(111, '127340000067', 'John Phil', 'Estremos', 'Sangag', '', NULL, '2', '0000-00-00', '', 2, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(112, '127340000068', 'Jhon Carlo', 'Flores', 'Noronio', '', NULL, '2', '0000-00-00', '', 6, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(113, '127340000069', 'Aldrin', 'Geromala', 'Digman', '', NULL, '2', '0000-00-00', '', 6, NULL, 'Grade 11', '09265213721', 'old', 'Registered'),
(114, '127340000070', 'Brett', 'Gofredo', 'Anabasa', '', NULL, '2', '0000-00-00', '', 6, NULL, 'Grade 11', '09265213721', 'new', 'Registered'),
(115, '127340000071', 'Jovanie', 'Gonato', 'Porazo', '', NULL, '2', '0000-00-00', '', 6, NULL, 'Grade 11', '09265213721', 'new', 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `ion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `ion_id`) VALUES
(25, 'General Physics 1', 3),
(26, 'General Chemistry 1', 3),
(27, 'General Biology 2', 3),
(32, 'General Physics 2', 1),
(33, 'General Chemistry 2', 3),
(34, 'Work Immersion/Research/Career Advocacy/Culminating Activities', 1),
(35, 'Organization and Management', 2),
(36, 'Humanities 1 (Creative Writing or Creative Non-fiction but preferably Creative Writing)', 2),
(37, 'Social Sciences (Dicipline & Ideas in the Social Sciences or Philippine Politics and Governance)', 1),
(38, 'Humanities 2 (Introduction to World Religions and Belief Systems, Trends, Networks & Crirical thinking in the 21st Century but preferably IWRL)', 1),
(39, 'Elective 1 (from any strand) - Food & beverage Services', 1),
(40, 'Disaster Readiness and Risk Reduction (for GA)', 1),
(41, 'Applied Economics', 1),
(42, 'Elective 2 (from any strand)', 1),
(43, 'Work Immersion/Research/Career Advocacy/Culminating Activity', 2),
(44, 'Introduction to World Religions and Belief Systems', 1),
(45, 'Dicipline & Ideas in the Social Sciences', 2),
(46, 'Creative Writing / Malikhaing Pagsulat', 2),
(47, 'Dicipline and Ideas in the Applied Social Sciences', 1),
(48, 'Creative Non-fiction2', 2),
(49, 'Philippine Politics and Governance', 1),
(50, 'Inquiries, Investigations and Immersion', 1),
(51, 'Trends, Networks & Crirical thinking in the 21st Century', 1),
(52, 'Community Engagement Solidarity and Citizenship', 1),
(53, 'Cookery (Grade 12, First Semester)', 1),
(54, 'Hair Dressing (Grade 12, First Semester)', 1),
(55, 'Agri-Crop Production (Grade 11, First Semester)', 1),
(56, 'CSS (Grade 12, First Semester)', 1),
(57, 'tourism Promotion Services', 1),
(58, 'Cookery (Grade 11, Second Semester)', 1),
(59, 'Hair Dressing (Grade 11, Second Semester)', 1),
(60, 'Agri-Crop Production (Grade 12, Second Semester)', 1),
(61, 'CSS (Grade 11, Second Semester)', 1),
(62, 'Local Tour Guiding Services', 1),
(63, 'Food and Beverage Services', 1),
(64, 'Beauty Care and Nail Care', 1),
(65, 'Agri-Crop Production (Grade 12, First Semester)', 1),
(66, 'CSS (Grade 12, First Semester)', 1),
(67, 'Front Office', 3),
(68, 'Bread and Pastry', 1),
(69, 'Wellness Massage', 1),
(70, 'Agri-Crop Production (Grade 12, Second Semester)', 1),
(71, 'CSS (Grade 12, Second Semester)', 1),
(72, 'Travel Services', 1),
(74, 'Fundamentals of ABM 1', 1),
(75, 'Principle of Marketing', 1),
(76, 'Fundamentals of ABM 2', 1),
(77, 'Business Mathematics', 1),
(78, 'Business Finance', 1),
(79, 'Business Ethics and Social Responsibility', 1),
(86, 'Oral Communication', 1),
(87, 'General Mathematics', 1),
(88, 'Earth Science', 1),
(89, 'Kumunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 1),
(90, '21st Century Literature from the Philippines and the World', 1),
(91, 'Personal Development', 1),
(93, 'Physical Education and Health', 1),
(95, 'Empowerment Technologies (for the strand)', 2),
(96, 'Pre-Calculus', 3),
(97, 'Introduction to Philosophy of the Human Person', 1),
(98, 'Understanding Culture, Society and Politics', 1),
(99, 'English for Academic Professional Purposes', 1),
(100, 'Practical Research 2', 2),
(102, 'Filipino sa Piling  Larangan', 2),
(103, 'Earth and Life Science ', 1),
(168, 'Reading and Writing', 1),
(169, 'Pagbasa at Pagsusuri ng Ibat\'t-Ibang Teksto Tungo sa Pananaliksik', 1),
(170, 'Statsitics and Probability', 1),
(171, 'Contemporary Philippine Arts from the Region', 1),
(172, 'Practical Research 1', 2),
(173, 'General Biology 1', 3),
(174, 'Basic Calculus', 3),
(175, 'Media and Information Literacy', 1),
(176, 'Disaster Readiness and Risk Reduction (for STEM)', 1),
(177, 'Entrepreneurship', 2),
(178, 'General Chemistry 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `extension_name` varchar(255) DEFAULT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `last_name`, `first_name`, `middle_name`, `extension_name`, `contact`, `address`, `position`, `user_id`, `dept_id`) VALUES
(343, 'Balaga', 'Cle Marven', 'Palma', '', '', '30 de', 'Teacher 1', 2, 21),
(344, 'Babagay', 'Runy Jade', 'Dacera', '', '', '', 'Teacher 1', NULL, 23),
(345, 'Baltazar', 'Stephen Alexeus ', 'Gorgonio', '', '', '', NULL, NULL, 21),
(346, 'Dongon', 'Beth Catherine', 'Meode', '', '', '', NULL, NULL, 21),
(347, 'Flandez', 'Resalyn ', 'Masong', '', '', '', 'Teacher 1', NULL, 23),
(348, 'Gato', 'Glenda ', 'Barola', '', '', '', NULL, NULL, 21),
(349, 'Gonzales', 'Adam ', 'Joshua', '', '', '', NULL, NULL, 21),
(350, 'Mabalda', 'Arnold ', 'Salano', '', '', '', NULL, NULL, 21),
(351, 'Pacino', 'Glyzel Ann', 'Garcia', '', '', '', NULL, NULL, 21),
(352, 'Tabudlong', 'Emily ', 'Mazo', '', '', '', NULL, NULL, 21),
(353, 'Tapayan', 'Maria Editha', 'Cagadas', '', '', '', NULL, NULL, 21),
(354, 'Albaladejo', 'Alvin ', 'Ibona', '', '', '', NULL, NULL, 21),
(355, 'Arayan', 'Dioress Vincen ', 'dela Torre', '', '', '', NULL, NULL, 21),
(356, 'Burlas', 'Joerey ', 'Alao', '', '', '', NULL, NULL, 22),
(357, 'Dumaguing', 'Arcelie ', 'C.', '', '', '', NULL, NULL, 22),
(358, 'Fernandez', 'Eric ', 'Loreto', '', '', '', NULL, NULL, 22),
(359, 'Fernandez', 'Rowena Amor ', 'Tabudlong', '', '', '', NULL, NULL, 22),
(360, 'Recto', 'Francis ', 'Babatuan', '', '', '', NULL, NULL, 22),
(361, 'Malle', 'Albert ', 'Ligaya', '', '', '', NULL, NULL, 22),
(362, 'Matunog', 'Teddy ', 'Balionog', '', '', '', NULL, NULL, 22),
(363, 'Maturan', 'Nelson ', 'Bitos', '', '', '', NULL, NULL, 22),
(364, 'Monderondo', 'Janice Marie ', 'Suganob', '', '', '', NULL, NULL, 22),
(365, 'Pacino', 'Kirk Roy', 'Yap', '', '', '', NULL, NULL, 22),
(366, 'Puson', 'Rene ', 'Sabarez', '', '', '', NULL, NULL, 22),
(367, 'Sapiler', 'Celestino', 'Ibanez', 'Jr. ', '', '', NULL, NULL, 22),
(368, 'Tigol', 'Abel Keint ', 'Galano', '', '', '', NULL, NULL, 22),
(369, 'Varron', 'Ghia Rose ', 'Seda', '', '', '', NULL, NULL, 22),
(370, 'Abordo', 'Maria Clarissa ', 'Boiser', '', '', '', 'Teacher 1', NULL, 22),
(371, 'Abrantes', 'Leizl ', 'Fernandez', '', '', '', 'Teacher 2', NULL, 23),
(372, 'Astronomo', 'Roselyn ', 'Gallarde', '', '', '', NULL, NULL, 23),
(373, 'Baguhin', 'Diesa Marie Antonette ', 'Solamo', '', '', '', NULL, NULL, 23),
(374, 'Bargamento', 'Anna Larissa ', 'Arias', '', '', '', NULL, NULL, 23),
(375, 'Borela', 'Monien ', 'B.', '', '', '', NULL, NULL, 23),
(376, 'Damicog', 'Monien ', 'Pastoril', '', '', '', NULL, NULL, 23),
(377, 'Laurente', 'Jerome ', 'Cagol', '', '', '', NULL, NULL, 23),
(378, 'Modina', 'Gloreben ', 'Cajurao', '', '', '', NULL, NULL, 23),
(379, 'Panonce', 'Celia Natividad ', 'Caraballa', '', '', '', NULL, NULL, 23),
(380, 'Patosa', 'Conie Alona ', 'Babagay', '', '', '', NULL, NULL, 24),
(381, 'Yunzal', 'Ananias ', 'Natividad', 'Jr. ', '', '', NULL, NULL, 24),
(382, 'Bongcales', 'Lourie Mae ', 'O.', '', '', '', NULL, NULL, 24),
(383, 'Balagao', 'Sherey Mae', 'Ulbora', '', '', '', NULL, NULL, 24),
(384, 'Bibera', 'Loise Mariel ', 'Capacio', '', '', '', NULL, NULL, 24),
(385, 'Alao', 'Stephanie ', 'Pagatpat', '', '', '', 'Teacher 1', NULL, 24),
(386, 'Cajandab', 'Elsa Fara ', 'Monares', '', '', '', NULL, NULL, 24),
(387, 'Calutan', 'Melboy ', 'Nablo', '', '', '', NULL, NULL, 24),
(388, 'Caminade', 'Olimpia ', 'Himang', '', '', '', NULL, NULL, 24),
(389, 'Dante', 'Noreneil ', 'D.', '', '', '', NULL, NULL, 24),
(390, 'Dupal', 'Alner ', 'Cabatingan', '', '', '', NULL, NULL, 24),
(391, 'Hilardo', 'Marites ', 'Tagolgol', '', '', '', NULL, NULL, 24),
(392, 'Mamalias', 'Jonathan ', 'Soralta', '', '', '', NULL, NULL, 25),
(393, 'Mercurio', 'Ma. Judith ', 'Cabia', '', '', '', NULL, NULL, 25),
(394, 'Moscatiles', 'Noel ', 'Vitalla', '', '', '', NULL, NULL, 25),
(395, 'Ompoy', 'Rona May ', 'Yap', '', '', '', NULL, NULL, 25),
(396, 'Palmero', 'Monina ', 'Valenzona', '', '', '', NULL, NULL, 25),
(397, 'Pical', 'Mechil ', 'Bandalan', '', '', '', NULL, NULL, 25),
(398, 'Pono', 'Geofrey ', 'Alejandre', '', '', '', NULL, NULL, 25),
(399, 'Vilbar', 'Dax Edwin Lee ', 'L.', '', '', '', NULL, NULL, 25),
(400, 'Yu', 'Jose Carlito', 'Esperanza', 'Jr.', '', '', NULL, NULL, 25),
(401, 'Suarez', 'Estela', '', '', '', '', NULL, NULL, 25),
(402, 'Bustillo', 'Irene', '', '', '', '', NULL, NULL, 25),
(403, 'Ibona', 'Famila', '', '', '', '', NULL, NULL, 25),
(404, 'Piano', 'Aljun', '', '', '', '', NULL, NULL, 25),
(405, 'Cayunda', 'Sandy Merlita ', 'E.', '', '', '', NULL, NULL, 25),
(406, 'Pantas', 'Deona Faye ', 'S.', '', '', '', NULL, NULL, 25),
(407, 'Israel', 'Jane ', 'T.', '', '', '', NULL, NULL, 25),
(408, 'Posas', 'Jureina ', 'E.', '', '', '', NULL, NULL, 25),
(409, 'Simpron', 'Judy An', '', '', '', '', NULL, NULL, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `track_id` int(11) NOT NULL,
  `track_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`track_id`, `track_name`) VALUES
(1, 'Academic'),
(2, 'Tech-Vocational Livelihood');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Administrator','Faculty','Encoder','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', '$2y$10$POY.bseW90YCkXcfl0wArO2eU3.c4UoZVzTwCjmVlDJlJtyUKQcku', 'Administrator'),
(2, 'Balaga, Cle Marven Palma', 'teacher', '$2y$10$10PjtqgPhbPsdZiOoFytvud7/F2u9AJSWE.FtK74OU3orVQdBAPPy', 'Faculty'),
(4, 'Encoder', 'encoder', '$2y$10$iUKs5V58XdDlidDCnl4oyO5zG8Eqk9gb0UCFSUnAvd8jJ7c2ftjvK', 'Encoder'),
(5, 'Student', 'student', '$2y$10$78bzbLtY/3J9AomMFTVf8OuT12mw1BjxJkXmJyQV8r7JnrxG.YHuK', 'Student'),
(6, 'Markony Runel', 'runel', '$2y$10$m8iJpM.gXBV0II.Ng4hYV.k.1MmhAyDl28c5auYZ3YxyF/ZF6Otwu', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`ay_id`);

--
-- Indexes for table `class_2020_1`
--
ALTER TABLE `class_2020_1`
  ADD KEY `fk_schedule_2020_1_class_2020_1` (`schedule_id`),
  ADD KEY `fk_enrollment_2020_1_class_2020_1` (`enrollment_id`);

--
-- Indexes for table `class_2020_2`
--
ALTER TABLE `class_2020_2`
  ADD KEY `fk_schedule_2020_2_class_2020_2` (`schedule_id`),
  ADD KEY `fk_enrollment_2020_2_class_2020_2` (`enrollment_id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`curriculum_id`),
  ADD KEY `fk_subject_curriculum` (`subject_id`),
  ADD KEY `fk_strands_curriculum` (`strand_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `fk_teacher_department` (`dept_head`);

--
-- Indexes for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  ADD KEY `fk_subjects_educationalbackground` (`student_id`);

--
-- Indexes for table `enrollment_2020_1`
--
ALTER TABLE `enrollment_2020_1`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `fk_strand_enrollment_2020_1` (`strand_id`),
  ADD KEY `fk_offerings_2020_1_enrollment_2020_1` (`offer_id`);

--
-- Indexes for table `enrollment_2020_2`
--
ALTER TABLE `enrollment_2020_2`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `fk_strand_enrollment_2020_2` (`strand_id`),
  ADD KEY `fk_offerings_2020_2_enrollment_2020_2` (`offer_id`);

--
-- Indexes for table `grades_2020_1`
--
ALTER TABLE `grades_2020_1`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `fk_schedule_2020_1_grades_2020_1` (`schedule_id`),
  ADD KEY `fk_enrollment_2020_1_grades_2020_1` (`enrollment_id`);

--
-- Indexes for table `grades_2020_2`
--
ALTER TABLE `grades_2020_2`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `fk_schedule_2020_2_grades_2020_2` (`schedule_id`),
  ADD KEY `fk_enrollment_2020_2_grades_2020_2` (`enrollment_id`);

--
-- Indexes for table `ions`
--
ALTER TABLE `ions`
  ADD PRIMARY KEY (`ion_id`);

--
-- Indexes for table `offerings`
--
ALTER TABLE `offerings`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_strand_offerings` (`strand_id`),
  ADD KEY `fk_section_offerings` (`section_id`);

--
-- Indexes for table `offerings_2020_1`
--
ALTER TABLE `offerings_2020_1`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_section_offerings_2020_1` (`section_id`),
  ADD KEY `fk_strand_offerings_2020_1` (`strand_id`),
  ADD KEY `fk_adviser_offerings_2020_1` (`adviser`);

--
-- Indexes for table `offerings_2020_2`
--
ALTER TABLE `offerings_2020_2`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_section_offerings_2020_2` (`section_id`),
  ADD KEY `fk_strand_offerings_2020_2` (`strand_id`),
  ADD KEY `fk_adviser_offerings_2020_2` (`adviser`);

--
-- Indexes for table `offerings_def_1`
--
ALTER TABLE `offerings_def_1`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_section_offerings_def_1` (`section_id`),
  ADD KEY `fk_strand_offerings_def_1` (`strand_id`);

--
-- Indexes for table `offerings_def_2`
--
ALTER TABLE `offerings_def_2`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `fk_section_offerings_def_2` (`section_id`),
  ADD KEY `fk_strand_offerings_def_2` (`strand_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `fk_student_parents` (`student_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `fk_offer_sched` (`offer_id`),
  ADD KEY `fk_room_sched` (`room_id`),
  ADD KEY `fk_teacher_schedule` (`t_id`),
  ADD KEY `fk_subjects_schedule1` (`subject_id`);

--
-- Indexes for table `schedule_2020_1`
--
ALTER TABLE `schedule_2020_1`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `fk_subjects_scedule_2020_1` (`subject_id`),
  ADD KEY `fk_offerings_2020_1_schedule_2020_1` (`offer_id`),
  ADD KEY `fk_room_schedule_2020_1` (`room_id`),
  ADD KEY `fk_teacher_schedule_2020_1` (`teacher_id`);

--
-- Indexes for table `schedule_2020_2`
--
ALTER TABLE `schedule_2020_2`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `fk_subjects_scedule_2020_2` (`subject_id`),
  ADD KEY `fk_offerings_2020_2_schedule_2020_2` (`offer_id`),
  ADD KEY `fk_room_schedule_2020_2` (`room_id`),
  ADD KEY `fk_teacher_schedule_2020_2` (`teacher_id`);

--
-- Indexes for table `schedule_def_1`
--
ALTER TABLE `schedule_def_1`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `fk_subjects_scedule_def_1` (`subject_id`),
  ADD KEY `fk_offerings_def_1_schedule_def_1` (`offer_id`),
  ADD KEY `fk_room_schedule_def_1` (`room_id`),
  ADD KEY `fk_teacher_schedule_def_1` (`teacher_id`);

--
-- Indexes for table `schedule_def_2`
--
ALTER TABLE `schedule_def_2`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `fk_subjects_scedule_def_2` (`subject_id`),
  ADD KEY `fk_offerings_def_2_schedule_def_2` (`offer_id`),
  ADD KEY `fk_room_schedule_def_2` (`room_id`),
  ADD KEY `fk_teacher_schedule_def_2` (`teacher_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `strands`
--
ALTER TABLE `strands`
  ADD PRIMARY KEY (`strand_id`),
  ADD KEY `fk_tracks_strands` (`track_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_users_student` (`user_id`),
  ADD KEY `fk_strands_studnet` (`strand_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fk_ions_subjects` (`ion_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_users_teacher` (`user_id`),
  ADD KEY `fk_department_teacher2` (`dept_id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`track_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicyear`
--
ALTER TABLE `academicyear`
  MODIFY `ay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `curriculum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `enrollment_2020_1`
--
ALTER TABLE `enrollment_2020_1`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `enrollment_2020_2`
--
ALTER TABLE `enrollment_2020_2`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades_2020_1`
--
ALTER TABLE `grades_2020_1`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `grades_2020_2`
--
ALTER TABLE `grades_2020_2`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ions`
--
ALTER TABLE `ions`
  MODIFY `ion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offerings`
--
ALTER TABLE `offerings`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offerings_2020_1`
--
ALTER TABLE `offerings_2020_1`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offerings_2020_2`
--
ALTER TABLE `offerings_2020_2`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offerings_def_1`
--
ALTER TABLE `offerings_def_1`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offerings_def_2`
--
ALTER TABLE `offerings_def_2`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedule_2020_1`
--
ALTER TABLE `schedule_2020_1`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedule_2020_2`
--
ALTER TABLE `schedule_2020_2`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_def_1`
--
ALTER TABLE `schedule_def_1`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `schedule_def_2`
--
ALTER TABLE `schedule_def_2`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_2020_1`
--
ALTER TABLE `class_2020_1`
  ADD CONSTRAINT `fk_enrollment_2020_1_class_2020_1` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment_2020_1` (`enrollment_id`),
  ADD CONSTRAINT `fk_schedule_2020_1_class_2020_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_2020_1` (`schedule_id`);

--
-- Constraints for table `class_2020_2`
--
ALTER TABLE `class_2020_2`
  ADD CONSTRAINT `fk_enrollment_2020_2_class_2020_2` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment_2020_2` (`enrollment_id`),
  ADD CONSTRAINT `fk_schedule_2020_2_class_2020_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_2020_2` (`schedule_id`);

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `fk_strands_curriculum` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`),
  ADD CONSTRAINT `fk_subject_curriculum` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_teacher_department` FOREIGN KEY (`dept_head`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `educationalbackground`
--
ALTER TABLE `educationalbackground`
  ADD CONSTRAINT `fk_subjects_educationalbackground` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `enrollment_2020_1`
--
ALTER TABLE `enrollment_2020_1`
  ADD CONSTRAINT `fk_offerings_2020_1_enrollment_2020_1` FOREIGN KEY (`offer_id`) REFERENCES `offerings_2020_1` (`offer_id`),
  ADD CONSTRAINT `fk_strand_enrollment_2020_1` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `enrollment_2020_2`
--
ALTER TABLE `enrollment_2020_2`
  ADD CONSTRAINT `fk_offerings_2020_2_enrollment_2020_2` FOREIGN KEY (`offer_id`) REFERENCES `offerings_2020_2` (`offer_id`),
  ADD CONSTRAINT `fk_strand_enrollment_2020_2` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `grades_2020_1`
--
ALTER TABLE `grades_2020_1`
  ADD CONSTRAINT `fk_enrollment_2020_1_grades_2020_1` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment_2020_1` (`enrollment_id`),
  ADD CONSTRAINT `fk_schedule_2020_1_grades_2020_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_2020_1` (`schedule_id`);

--
-- Constraints for table `grades_2020_2`
--
ALTER TABLE `grades_2020_2`
  ADD CONSTRAINT `fk_enrollment_2020_2_grades_2020_2` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollment_2020_2` (`enrollment_id`),
  ADD CONSTRAINT `fk_schedule_2020_2_grades_2020_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_2020_2` (`schedule_id`);

--
-- Constraints for table `offerings`
--
ALTER TABLE `offerings`
  ADD CONSTRAINT `fk_section_offerings` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `fk_strand_offerings` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `offerings_2020_1`
--
ALTER TABLE `offerings_2020_1`
  ADD CONSTRAINT `fk_adviser_offerings_2020_1` FOREIGN KEY (`adviser`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `fk_section_offerings_2020_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `fk_strand_offerings_2020_1` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `offerings_2020_2`
--
ALTER TABLE `offerings_2020_2`
  ADD CONSTRAINT `fk_adviser_offerings_2020_2` FOREIGN KEY (`adviser`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `fk_section_offerings_2020_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `fk_strand_offerings_2020_2` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `offerings_def_1`
--
ALTER TABLE `offerings_def_1`
  ADD CONSTRAINT `fk_section_offerings_def_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `fk_strand_offerings_def_1` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `offerings_def_2`
--
ALTER TABLE `offerings_def_2`
  ADD CONSTRAINT `fk_section_offerings_def_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `fk_strand_offerings_def_2` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`);

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `fk_student_parents` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_offer_sched` FOREIGN KEY (`offer_id`) REFERENCES `offerings` (`offer_id`),
  ADD CONSTRAINT `fk_room_sched` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `fk_subjects_schedule` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `fk_subjects_schedule1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `fk_teacher_schedule` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `schedule_2020_1`
--
ALTER TABLE `schedule_2020_1`
  ADD CONSTRAINT `fk_offerings_2020_1_schedule_2020_1` FOREIGN KEY (`offer_id`) REFERENCES `offerings_2020_1` (`offer_id`),
  ADD CONSTRAINT `fk_room_schedule_2020_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `fk_subjects_scedule_2020_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `fk_teacher_schedule_2020_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `schedule_2020_2`
--
ALTER TABLE `schedule_2020_2`
  ADD CONSTRAINT `fk_offerings_2020_2_schedule_2020_2` FOREIGN KEY (`offer_id`) REFERENCES `offerings_2020_2` (`offer_id`),
  ADD CONSTRAINT `fk_room_schedule_2020_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `fk_subjects_scedule_2020_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `fk_teacher_schedule_2020_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `schedule_def_1`
--
ALTER TABLE `schedule_def_1`
  ADD CONSTRAINT `fk_offerings_def_1_schedule_def_1` FOREIGN KEY (`offer_id`) REFERENCES `offerings_def_1` (`offer_id`),
  ADD CONSTRAINT `fk_room_schedule_def_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `fk_subjects_scedule_def_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `fk_teacher_schedule_def_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `schedule_def_2`
--
ALTER TABLE `schedule_def_2`
  ADD CONSTRAINT `fk_offerings_def_2_schedule_def_2` FOREIGN KEY (`offer_id`) REFERENCES `offerings_def_2` (`offer_id`),
  ADD CONSTRAINT `fk_room_schedule_def_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `fk_subjects_scedule_def_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `fk_teacher_schedule_def_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `strands`
--
ALTER TABLE `strands`
  ADD CONSTRAINT `fk_tracks_strands` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`track_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_strands_studnet` FOREIGN KEY (`strand_id`) REFERENCES `strands` (`strand_id`),
  ADD CONSTRAINT `fk_users_student` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_ions_subjects` FOREIGN KEY (`ion_id`) REFERENCES `ions` (`ion_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_department_teacher2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `fk_users_teacher` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
