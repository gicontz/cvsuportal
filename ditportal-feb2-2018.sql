-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2018 at 07:49 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses_table`
--

INSERT INTO `courses_table` (`course_id`, `course`, `course_main_title`, `department_id`, `acad_year`) VALUES
(2, 'BSIT', 'Bachelor of Science in Information Technology', 0, '2017-2018'),
(3, 'BSCS', 'Bachelor of Science in Computer Science', 2, '2017-2018');

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
  `remarks` varchar(20) NOT NULL,
  `ay` varchar(100) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `grades_table`
--

INSERT INTO `grades_table` (`grade_ID`, `student_number`, `subj_id`, `final_grade`, `remarks`, `ay`, `sem`) VALUES
(1, 201501380, '1', '2.00', 'PASSED', '2017-2018', 2),
(2, 2015011662, '1', '2.00', 'PASSED', '2017-2018', 2),
(3, 2015011553, '1', '2.75', 'PASSED', '2017-2018', 2),
(4, 2015011607, '1', '1.75', 'PASSED', '2017-2018', 2),
(5, 201501603, '1', '1.75', 'PASSED', '2017-2018', 2),
(6, 201501758, '1', '2.75', 'PASSED', '2017-2018', 2),
(7, 2015011571, '1', '2.00', 'PASSED', '2017-2018', 2),
(8, 2015011378, '1', '2.25', 'PASSED', '2017-2018', 2),
(9, 2015011888, '1', '2.00', 'PASSED', '2017-2018', 2),
(10, 2015011344, '1', '2.00', 'PASSED', '2017-2018', 2),
(11, 201501940, '1', '2.50', 'PASSED', '2017-2018', 2),
(12, 2015011728, '1', '2.25', 'PASSED', '2017-2018', 2),
(13, 2015011350, '1', '2.50', 'PASSED', '2017-2018', 2),
(14, 201501960, '1', '2.25', 'PASSED', '2017-2018', 2),
(15, 2015011610, '1', '1.75', 'PASSED', '2017-2018', 2),
(16, 201402126, '1', '2.50', 'PASSED', '2017-2018', 2),
(17, 2015011336, '1', '2.00', 'PASSED', '2017-2018', 2),
(18, 2015011677, '1', '2.00', 'PASSED', '2017-2018', 2),
(19, 201501168, '1', '2.25', 'PASSED', '2017-2018', 2),
(20, 2015011585, '1', '2.00', 'PASSED', '2017-2018', 2),
(21, 2015011810, '1', '1.75', 'PASSED', '2017-2018', 2),
(22, 2015011764, '1', '2.75', 'PASSED', '2017-2018', 2),
(23, 2015011841, '1', '2.00', 'PASSED', '2017-2018', 2),
(24, 2015011806, '1', '1.75', 'PASSED', '2017-2018', 2),
(25, 2015011082, '1', '2.00', 'PASSED', '2017-2018', 2),
(26, 2015011756, '1', '2.50', 'PASSED', '2017-2018', 2),
(27, 201701151, '1', '2.50', 'PASSED', '2017-2018', 2),
(28, 2015011675, '1', '2.00', 'PASSED', '2017-2018', 2),
(29, 2015011802, '1', '2.25', 'PASSED', '2017-2018', 2),
(30, 201701829, '1', '2.75', 'PASSED', '2017-2018', 2),
(31, 2015011783, '1', '2.00', 'PASSED', '2017-2018', 2),
(32, 2015011761, '1', '2.50', 'PASSED', '2017-2018', 2),
(33, 2015011335, '1', '2.50', 'PASSED', '2017-2018', 2),
(34, 2015011597, '1', '2.00', 'PASSED', '2017-2018', 2),
(35, 2015011878, '1', '2.00', 'PASSED', '2017-2018', 2),
(36, 201701153, '1', '3.00', 'PASSED', '2017-2018', 2),
(37, 201701511, '1', '2.75', 'PASSED', '2017-2018', 2),
(38, 2015011669, '1', '2.00', 'PASSED', '2017-2018', 2),
(39, 2015011847, '1', '5.00', 'DRP', '2017-2018', 2),
(40, 201501090, '1', '2.50', 'PASSED', '2017-2018', 2),
(41, 2015011780, '1', '1.75', 'PASSED', '2017-2018', 2),
(42, 2015011601, '1', '2.75', 'PASSED', '2017-2018', 2),
(43, 2015011559, '1', '2.25', 'PASSED', '2017-2018', 2),
(44, 2015011745, '1', '2.00', 'PASSED', '2017-2018', 2),
(45, 2015011782, '1', '2.00', 'PASSED', '2017-2018', 2),
(46, 2015011874, '1', '2.25', 'PASSED', '2017-2018', 2),
(47, 201701150, '1', '2.75', 'PASSED', '2017-2018', 2),
(48, 2015011710, '1', '2.75', 'PASSED', '2017-2018', 2),
(49, 2015011124, '1', '2.00', 'PASSED', '2017-2018', 2),
(50, 2015011175, '1', '3.00', 'PASSED', '2017-2018', 2),
(51, 201501561, '1', '2.25', 'PASSED', '2017-2018', 2),
(52, 2015011279, '1', '1.75', 'PASSED', '2017-2018', 2),
(53, 201501601, '1', '2.00', 'PASSED', '2017-2018', 2),
(54, 201301699, '1', '3.00', 'PASSED', '2017-2018', 2),
(55, 201401287, '1', '2.00', 'PASSED', '2017-2018', 2),
(56, 201501260, '1', '2.25', 'PASSED', '2017-2018', 2),
(57, 201501510, '1', '3.00', 'PASSED', '2017-2018', 2),
(58, 201501174, '1', '2.25', 'PASSED', '2017-2018', 2),
(59, 2015011286, '1', '2.50', 'PASSED', '2017-2018', 2),
(60, 201501433, '1', '2.75', 'PASSED', '2017-2018', 2),
(61, 2015011223, '1', '2.50', 'PASSED', '2017-2018', 2),
(62, 201501157, '1', '2.50', 'PASSED', '2017-2018', 2),
(63, 2015011882, '1', '5.00', 'FAILED', '2017-2018', 2),
(64, 201501253, '1', '1.50', 'PASSED', '2017-2018', 2),
(65, 201501829, '1', '1.25', 'PASSED', '2017-2018', 2),
(66, 2015011933, '1', '2.25', 'PASSED', '2017-2018', 2),
(67, 2015011217, '1', '1.00', 'PASSED', '2017-2018', 2),
(68, 201501177, '1', '1.75', 'PASSED', '2017-2018', 2),
(69, 201501711, '1', '2.00', 'PASSED', '2017-2018', 2),
(70, 2014011131, '1', '2.75', 'PASSED', '2017-2018', 2),
(71, 201301986, '1', '3.00', 'PASSED', '2017-2018', 2),
(72, 2015011060, '1', '2.25', 'PASSED', '2017-2018', 2),
(73, 2015012027, '1', '2.50', 'PASSED', '2017-2018', 2),
(74, 2015011215, '1', '1.50', 'PASSED', '2017-2018', 2),
(75, 201501820, '1', '2.25', 'PASSED', '2017-2018', 2),
(76, 2015011203, '1', '2.75', 'PASSED', '2017-2018', 2),
(77, 2015011278, '1', '1.75', 'PASSED', '2017-2018', 2),
(78, 201501240, '1', '2.00', 'PASSED', '2017-2018', 2),
(79, 201501189, '1', '2.75', 'PASSED', '2017-2018', 2),
(80, 201501387, '1', '1.50', 'PASSED', '2017-2018', 2),
(81, 201501306, '1', '2.25', 'PASSED', '2017-2018', 2),
(82, 2015011217, '4', '1.75', 'PASSED', '2017-2018', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sections_table`
--

INSERT INTO `sections_table` (`section_id`, `course_id`, `year`, `section`) VALUES
(1, 2, '1', 'A'),
(2, 2, '2', 'D'),
(3, 2, '2', 'A'),
(6, 3, '3', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE IF NOT EXISTS `students_table` (
  `student_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_table`
--

INSERT INTO `students_table` (`student_number`, `user_id`, `section_id`) VALUES
(2015011217, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_table`
--

CREATE TABLE IF NOT EXISTS `subjects_table` (
`subj_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `units` int(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subjects_table`
--

INSERT INTO `subjects_table` (`subj_id`, `course_id`, `course_code`, `course_title`, `units`, `prerequisite`) VALUES
(1, 2, 'DCIT 65', 'Web Development', 3, 'ITEC 60'),
(2, 2, 'COSC 60', 'Data Structure', 3, 'DCIT 22'),
(3, 2, 'DCIT 23', 'Discrete Structure', 3, 'ITEC 21'),
(4, 2, 'DCIT 21', 'Programming I', 3, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subjloads_table`
--

INSERT INTO `subjloads_table` (`subjload_id`, `instructor_id`, `subj_id`, `section_id`, `acad_year`, `mode`) VALUES
(2, 1, 2, 2, '2017-2018', 'LAB'),
(3, 2, 2, 3, '2017-2018', 'LEC/LAB'),
(4, 1, 2, 1, '2017-2018', 'LEC/LAB'),
(5, 1, 1, 2, '2017-2018', 'LEC/LAB'),
(9, 2, 1, 3, '2017-2018', 'LEC/LAB'),
(10, 2, 3, 1, '2017-2018', 'LEC'),
(11, 2, 4, 1, '2017-2018', 'LEC/LAB'),
(12, 2, 2, 1, '2017-2018', 'LEC/LAB');

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
  `department` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`, `account_type`, `first_name`, `last_name`, `middle_name`, `extension`, `birthday`, `department`, `section_id`) VALUES
(1, 'Juan', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'instructor', 'Juan', 'Cruz', 'Dela', 'secret', 'august', 'CEO', 3),
(2, 'admin', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'instructor', 'Gimel', 'Contillo', 'Corpuz', '', '', 'DIT', 0),
(3, 'head', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'deptchair', 'Brylle', 'Samson', 'D', '', '', 'DIT', 0),
(4, 'student', '4rbKzK7xXINTNSc2cLBnjHKK6g6TXfsA_Zra_U9fFMY', 'student', 'Erwin', 'Hayag', 'O', '', '', '', 0);

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
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `grade_ID` bigint(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
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
MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subjects_table`
--
ALTER TABLE `subjects_table`
MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjloads_table`
--
ALTER TABLE `subjloads_table`
MODIFY `subjload_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
