-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 05:04 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ditportal`
--
DROP DATABASE `ditportal`;
CREATE DATABASE IF NOT EXISTS `ditportal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ditportal`;

-- --------------------------------------------------------

--
-- Table structure for table `courses_table`
--

CREATE TABLE IF NOT EXISTS `courses_table` (
`course_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `course_main_title` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `acad_year` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `courses_table`
--

INSERT INTO `courses_table` (`course_id`, `course`, `course_main_title`, `department_id`, `acad_year`) VALUES
(2, 'BSIT', 'Bachelor of Science in Information Technology', 0, '2017-2018'),
(3, 'BSCS', 'Bachelor of Science in Computer Science', 2, '2017-2018'),
(4, 'BSTM', 'Bachelor of Science in Tourism Management', 4, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `departments_table`
--

CREATE TABLE IF NOT EXISTS `departments_table` (
`department_id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `dept_name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `departments_table`
--

INSERT INTO `departments_table` (`department_id`, `department`, `dept_name`) VALUES
(1, 'DIT', 'Department of Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `dept_head_table`
--

CREATE TABLE IF NOT EXISTS `dept_head_table` (
`dept_head_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dept_head_table`
--

INSERT INTO `dept_head_table` (`dept_head_id`, `instructor_id`, `department_id`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_subjects_table`
--

CREATE TABLE IF NOT EXISTS `enrolled_subjects_table` (
`enrolled_subject_id` int(11) NOT NULL,
  `student_number` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `acad_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grades_table`
--

CREATE TABLE IF NOT EXISTS `grades_table` (
`grade_ID` bigint(100) NOT NULL,
  `student_number` int(16) NOT NULL,
  `subj_id` varchar(12) NOT NULL,
  `final_grade` varchar(10) NOT NULL,
  `subj_instructor` text NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `ay` varchar(100) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `grades_table`
--

INSERT INTO `grades_table` (`grade_ID`, `student_number`, `subj_id`, `final_grade`, `subj_instructor`, `remarks`, `ay`, `sem`) VALUES
(1, 201701735, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(2, 2015011502, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(3, 201701004, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(4, 201601384, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(5, 2015011766, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(6, 201701132, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(7, 201701712, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(8, 201701489, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(9, 201701025, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(10, 201701160, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(11, 201501550, '6', '5.00', '', 'DRP', '2017-2018', 2),
(12, 2015011217, '6', '1.00', '', 'PASSED', '2017-2018', 2),
(13, 201602030, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(14, 201701054, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(15, 201701796, '6', '5.00', '', 'DRP', '2017-2018', 2),
(16, 201701110, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(17, 201701225, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(18, 201602111, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(19, 201101012, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(20, 201601079, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(21, 201601336, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(22, 201701024, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(23, 201502167, '6', '5.00', '', 'DRP', '2017-2018', 2),
(24, 201701034, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(25, 201601210, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(26, 201601343, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(27, 2015011439, '6', '5.00', '', 'DRP', '2017-2018', 2),
(28, 201701002, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(29, 201601403, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(30, 201502030, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(31, 201701082, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(32, 201502102, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(33, 201601337, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(34, 201701144, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(35, 201602012, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(36, 201701030, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(37, 201601639, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(38, 201701007, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(39, 201701001, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(40, 201502124, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(41, 201602106, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(42, 201701064, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(43, 201701155, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(44, 201701073, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(45, 201701486, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(46, 201701003, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(47, 201701074, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(48, 201602048, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(49, 201701027, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(50, 201701052, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(51, 201601047, '6', '5.00', '', 'FAILED', '2017-2018', 2),
(52, 201701735, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(53, 2015011502, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(54, 201701004, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(55, 201601384, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(56, 2015011766, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(57, 201701132, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(58, 201701712, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(59, 201701489, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(60, 201701025, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(61, 201701160, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(62, 201501550, '1', '5.00', '', 'DRP', '2017-2018', 2),
(63, 2015011217, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(64, 201602030, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(65, 201701054, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(66, 201701796, '1', '5.00', '', 'DRP', '2017-2018', 2),
(67, 201701110, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(68, 201701225, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(69, 201602111, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(70, 201101012, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(71, 201601079, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(72, 201601336, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(73, 201701024, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(74, 201502167, '1', '5.00', '', 'DRP', '2017-2018', 2),
(75, 201701034, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(76, 201601210, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(77, 201601343, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(78, 2015011439, '1', '5.00', '', 'DRP', '2017-2018', 2),
(79, 201701002, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(80, 201601403, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(81, 201502030, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(82, 201701082, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(83, 201502102, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(84, 201601337, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(85, 201701144, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(86, 201602012, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(87, 201701030, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(88, 201601639, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(89, 201701007, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(90, 201701001, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(91, 201502124, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(92, 201602106, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(93, 201701064, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(94, 201701155, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(95, 201701073, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(96, 201701486, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(97, 201701003, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(98, 201701074, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(99, 201602048, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(100, 201701027, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(101, 201701052, '1', '5.00', '', 'FAILED', '2017-2018', 2),
(102, 201601047, '1', '5.00', '', 'FAILED', '2017-2018', 2);

-- --------------------------------------------------------

--
-- Table structure for table `instructors_table`
--

CREATE TABLE IF NOT EXISTS `instructors_table` (
`instructor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `academic_rankment` varchar(100) NOT NULL,
  `educational_attainment` varchar(100) NOT NULL,
  `nature_of_appointttainment` varchar(100) NOT NULL,
  `total_units` int(2) NOT NULL DEFAULT '0',
  `department_id` int(11) DEFAULT '0',
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `instructors_table`
--

INSERT INTO `instructors_table` (`instructor_id`, `user_id`, `academic_rankment`, `educational_attainment`, `nature_of_appointttainment`, `total_units`, `department_id`, `status`) VALUES
(1, 1, '', '', '', 0, 1, 'active'),
(2, 2, '', '', '', 0, 1, 'active'),
(3, 3, '', '', '', 0, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `populations_table`
--

CREATE TABLE IF NOT EXISTS `populations_table` (
`population_id` int(11) NOT NULL,
  `acad_year` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `population_total` int(11) NOT NULL,
  `population_male` int(11) NOT NULL,
  `population_female` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sections_table`
--

CREATE TABLE IF NOT EXISTS `sections_table` (
`section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sections_table`
--

INSERT INTO `sections_table` (`section_id`, `course_id`, `year`, `section`) VALUES
(1, 2, '1', 'A'),
(2, 2, '2', 'D'),
(3, 2, '2', 'A'),
(6, 3, '3', 'A'),
(7, 2, '1', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE IF NOT EXISTS `students_table` (
  `student_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `validation_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_table`
--

INSERT INTO `students_table` (`student_number`, `user_id`, `section_id`, `validation_number`) VALUES
(2015223, 1, 3, 0),
(201412039, 0, 0, 1234),
(201501634, 0, 0, 7281),
(2015011217, 4, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_table`
--

CREATE TABLE IF NOT EXISTS `subjects_table` (
`subj_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `year_to_take` int(1) NOT NULL,
  `units` int(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `subjects_table`
--

INSERT INTO `subjects_table` (`subj_id`, `course_id`, `course_code`, `course_title`, `year_to_take`, `units`, `prerequisite`) VALUES
(1, 3, 'ENGL 1', 'Study and Thinking Skills in English', 1, 3, ''),
(2, 3, 'FIL 6', 'Komunikasyon sa Akademikong Pilipino', 1, 3, ''),
(3, 3, 'MATH 2', 'College Algebra', 1, 3, ''),
(4, 3, 'LITT 1', 'Philippine Literature', 1, 3, ''),
(5, 3, 'COSC 21', 'CS Fundamentals', 1, 3, ''),
(6, 3, 'DCIT 21', 'Programming I', 1, 3, ''),
(7, 3, 'PHED 1', 'Physical Fitness and Aerobics', 1, 2, ''),
(8, 3, 'NSTP 1', 'CWTS/LTS/ROTC', 1, 3, ''),
(9, 3, 'ENGL 2', 'Writing in the Discipline', 1, 3, 'ENGL 1'),
(10, 3, 'MATH 4', 'Plane Trigonometry', 1, 3, 'MATH 2'),
(11, 3, 'FIL 7', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 1, 3, 'FIL 1'),
(12, 3, 'HUMN 5', 'Art, Man and Society', 1, 3, ''),
(13, 3, 'DCIT 22', 'Computer Programming 2', 1, 3, 'DCIT 21'),
(14, 3, 'DCIT 23', 'Discrete Structure', 1, 3, 'ITEC 21'),
(15, 3, 'PHED 2', 'Rhytmic Activities', 1, 2, 'PHED 1'),
(16, 3, 'NSTP 2', 'CWTS/LTS/ROTC', 1, 3, 'NSTP 1'),
(17, 3, 'MATH 7', 'Differential Calculus', 2, 3, 'MATH 4'),
(18, 3, 'ENGL 6', 'Speech Communication', 2, 3, 'ENGL 2'),
(19, 3, 'SOSC 4', 'Phil, History, Geography & Institution', 2, 3, ''),
(20, 3, 'PHYS 1', 'Mechanics and Heat', 2, 3, ''),
(21, 3, 'COSC 50', 'Design and Analysis of Algorithm', 2, 3, 'DCIT 22'),
(22, 3, 'DCIT 50', 'Object Oriented Programming', 2, 3, 'DCIT 22'),
(23, 3, 'DCIT 24', 'Computer Organization and Assembly', 2, 3, 'COSC 21'),
(24, 3, 'PHED 3', 'Individual/Dual Sports', 2, 2, 'PHED 2'),
(25, 3, 'SOSC 6', 'Rizal''s Life Works and Writing', 2, 3, ''),
(26, 3, 'PHYS 2', 'Wave, Electromagnetism, Sound & Light', 2, 3, 'PHYS 1'),
(27, 3, 'MATH 8', 'Integral Calculus', 2, 3, 'MATH 7'),
(28, 3, 'COSC 55', 'Automata and Language Theory', 2, 3, 'DCIT 24'),
(29, 3, 'COSC 60', 'Data Structure', 2, 3, 'COSC 50'),
(30, 3, 'COSC 65', 'Programming Language with Compiler', 2, 3, 'COSC 50'),
(31, 3, 'COSC 70', 'Database Systems', 2, 3, 'DCIT 50'),
(32, 3, 'PHED 4', 'Team Sports', 2, 2, 'PHED 3'),
(33, 3, 'ECON 3', 'General Economics with TAR', 3, 3, ''),
(34, 3, 'ENGL 7', 'Scientific Reporting & Thesis Writing', 3, 3, 'ENGL 2'),
(35, 3, 'DCIT 55', 'Operating System', 3, 3, 'DCIT 50'),
(36, 3, 'DCIT 65', 'Web Development', 3, 3, 'ITEC 60'),
(37, 3, 'ITEC 55', 'System Analysis and Design', 3, 3, '3rd year standing'),
(38, 3, 'COSC 75', 'Digital Design', 3, 3, 'DCIT 24'),
(39, 3, 'COSC 80', 'Modelling and Simulation', 3, 3, 'COSC 65'),
(40, 3, 'STAT 1', 'Elementary Statistics', 3, 3, 'MATH 2'),
(41, 3, 'SOSC 5', 'Phil, Gov''t, Politics and New Constitution', 3, 3, ''),
(42, 3, 'BTCH 1', 'Introduction to Biotechnology', 3, 3, ''),
(43, 3, 'DCIT 60', 'Software Engineering', 3, 3, 'COSC 60'),
(44, 3, 'DCIT 35', 'Professional Ethics', 3, 3, '3rd year standing'),
(45, 3, 'DCIT 101', 'Management Information System', 3, 3, '3rd year standing'),
(46, 3, 'COSC 121', 'Data Communication', 3, 3, '3rd year standing'),
(47, 3, 'COSC 200A', 'Undergraduate Thesis (Part 1)', 3, 1, '3rd year standing'),
(48, 3, 'OJT', 'Practicum', 0, 200, ''),
(49, 3, 'SOSC 2', 'General Psychology', 4, 3, ''),
(50, 3, 'COSC 85', 'Numerical Analysis', 4, 3, 'MATH 8'),
(51, 3, '100', 'Artificial Intelligence', 4, 3, '4th year standing'),
(52, 3, 'COSC 111', 'Advance Programming', 4, 3, '4th year standing'),
(53, 3, 'COSC 126', 'Open Source Technology', 4, 3, '4th year standing'),
(54, 3, 'DCIT 99', 'Inspection Trip and Seminars', 4, 3, '4th year standing'),
(55, 3, 'COSC 200B', 'Undergraduate Thesis (Part 2)', 4, 2, 'COSC 200A'),
(56, 3, 'HUMN 6', 'Social Philosophy', 4, 3, 'HUMN 5'),
(57, 3, 'ITEC 60', 'Multimedia', 4, 6, '4th year standing'),
(58, 3, 'COSC 131', 'Embedded System', 4, 6, '4th year standing'),
(59, 3, 'COSC 200C', 'Undergraduate Thesis (Part 3)', 4, 15, 'COSC 200B');

-- --------------------------------------------------------

--
-- Table structure for table `subjloads_table`
--

CREATE TABLE IF NOT EXISTS `subjloads_table` (
`subjload_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `acad_year` varchar(100) NOT NULL,
  `mode` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `subjloads_table`
--

INSERT INTO `subjloads_table` (`subjload_id`, `instructor_id`, `subj_id`, `section_id`, `acad_year`, `mode`) VALUES
(3, 2, 2, 3, '2017-2018', 'LEC/LAB'),
(9, 2, 1, 3, '2017-2018', 'LEC/LAB'),
(10, 2, 3, 1, '2017-2018', 'LEC'),
(11, 2, 4, 1, '2017-2018', 'LEC/LAB'),
(12, 2, 2, 1, '2017-2018', 'LEC/LAB'),
(13, 2, 6, 6, '2017-2018', 'LEC/LAB');

-- --------------------------------------------------------

--
-- Table structure for table `university_table`
--

CREATE TABLE IF NOT EXISTS `university_table` (
  `acad_year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university_table`
--

INSERT INTO `university_table` (`acad_year`, `semester`) VALUES
('2017-2018', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE IF NOT EXISTS `users_table` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`, `account_type`, `first_name`, `last_name`, `middle_name`, `extension`, `birthday`, `department`) VALUES
(1, 'Juan', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'student', 'Juan', 'Cruz', 'Dela', 'secret', 'august', 'CEO'),
(2, 'admin', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'instructor', 'Gimel', 'Contillo', 'Corpuz', '', '', 'DIT'),
(3, 'head', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'deptchair', 'Brylle', 'Samson', 'D', '', '', 'DIT'),
(4, 'student', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'student', 'Erwin', 'Hayag', 'O', '', '', ''),
(6, '201501634', '0yCAZKGBcFOg1SjVrgrLM60ksvJ0wpOjj2EGM8eQ2JI', 'student', '', '', '', '', '', ''),
(7, '201412039', 'nV4PGly9b8xWdD3-gTtXxsiogtNkJcOqEPZ1k1KBihs', 'student', '', '', '', '', '', ''),
(8, 'abcdefg123', '', '', '', '', '', '', '', ''),
(10, 'abcdefg1234', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_table`
--
ALTER TABLE `courses_table`
 ADD PRIMARY KEY (`course_id`), ADD KEY `acad_year` (`acad_year`);

--
-- Indexes for table `departments_table`
--
ALTER TABLE `departments_table`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `dept_head_table`
--
ALTER TABLE `dept_head_table`
 ADD PRIMARY KEY (`dept_head_id`), ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `enrolled_subjects_table`
--
ALTER TABLE `enrolled_subjects_table`
 ADD PRIMARY KEY (`enrolled_subject_id`);

--
-- Indexes for table `grades_table`
--
ALTER TABLE `grades_table`
 ADD PRIMARY KEY (`grade_ID`);

--
-- Indexes for table `instructors_table`
--
ALTER TABLE `instructors_table`
 ADD PRIMARY KEY (`instructor_id`), ADD UNIQUE KEY `user_id_2` (`user_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `populations_table`
--
ALTER TABLE `populations_table`
 ADD PRIMARY KEY (`population_id`), ADD KEY `course_id` (`course_id`), ADD KEY `acad_year` (`acad_year`);

--
-- Indexes for table `sections_table`
--
ALTER TABLE `sections_table`
 ADD PRIMARY KEY (`section_id`), ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
 ADD PRIMARY KEY (`student_number`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects_table`
--
ALTER TABLE `subjects_table`
 ADD PRIMARY KEY (`subj_id`), ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `subjloads_table`
--
ALTER TABLE `subjloads_table`
 ADD PRIMARY KEY (`subjload_id`);

--
-- Indexes for table `university_table`
--
ALTER TABLE `university_table`
 ADD PRIMARY KEY (`acad_year`), ADD UNIQUE KEY `acad_year` (`acad_year`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_table`
--
ALTER TABLE `courses_table`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departments_table`
--
ALTER TABLE `departments_table`
MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dept_head_table`
--
ALTER TABLE `dept_head_table`
MODIFY `dept_head_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enrolled_subjects_table`
--
ALTER TABLE `enrolled_subjects_table`
MODIFY `enrolled_subject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grades_table`
--
ALTER TABLE `grades_table`
MODIFY `grade_ID` bigint(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `instructors_table`
--
ALTER TABLE `instructors_table`
MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `populations_table`
--
ALTER TABLE `populations_table`
MODIFY `population_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections_table`
--
ALTER TABLE `sections_table`
MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjects_table`
--
ALTER TABLE `subjects_table`
MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `subjloads_table`
--
ALTER TABLE `subjloads_table`
MODIFY `subjload_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses_table`
--
ALTER TABLE `courses_table`
ADD CONSTRAINT `courses_table_ibfk_1` FOREIGN KEY (`acad_year`) REFERENCES `university_table` (`acad_year`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `populations_table`
--
ALTER TABLE `populations_table`
ADD CONSTRAINT `populations_table_ibfk_1` FOREIGN KEY (`acad_year`) REFERENCES `university_table` (`acad_year`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sections_table`
--
ALTER TABLE `sections_table`
ADD CONSTRAINT `sections_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses_table` (`course_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
