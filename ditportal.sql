-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 09:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ditportal`
--
CREATE DATABASE IF NOT EXISTS `ditportal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ditportal`;

-- --------------------------------------------------------

--
-- Table structure for table `courses_table`
--
-- Creation: Dec 12, 2017 at 02:20 PM
--

DROP TABLE IF EXISTS `courses_table`;
CREATE TABLE `courses_table` (
  `course_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `acad_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `courses_table`:
--   `acad_year`
--       `university_table` -> `acad_year`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept_head_table`
--
-- Creation: Dec 12, 2017 at 02:17 PM
--

DROP TABLE IF EXISTS `dept_head_table`;
CREATE TABLE `dept_head_table` (
  `dept_head_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `dept_head_table`:
--   `instructor_id`
--       `instructors_table` -> `instructor_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `instructors_table`
--
-- Creation: Dec 12, 2017 at 02:16 PM
--

DROP TABLE IF EXISTS `instructors_table`;
CREATE TABLE `instructors_table` (
  `instructor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `academic_rankment` varchar(100) NOT NULL,
  `educational_attainment` varchar(100) NOT NULL,
  `nature_of_appointttainment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `instructors_table`:
--   `user_id`
--       `users_table` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `populations_table`
--
-- Creation: Dec 12, 2017 at 02:23 PM
--

DROP TABLE IF EXISTS `populations_table`;
CREATE TABLE `populations_table` (
  `population_id` int(11) NOT NULL,
  `acad_year` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `population_total` int(11) NOT NULL,
  `population_male` int(11) NOT NULL,
  `population_female` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `populations_table`:
--   `course_id`
--       `courses_table` -> `course_id`
--   `acad_year`
--       `courses_table` -> `acad_year`
--

-- --------------------------------------------------------

--
-- Table structure for table `sections_table`
--
-- Creation: Dec 12, 2017 at 02:12 PM
--

DROP TABLE IF EXISTS `sections_table`;
CREATE TABLE `sections_table` (
  `section_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `sections_table`:
--   `course_id`
--       `courses_table` -> `course_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--
-- Creation: Dec 12, 2017 at 02:08 PM
--

DROP TABLE IF EXISTS `students_table`;
CREATE TABLE `students_table` (
  `student_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `students_table`:
--   `user_id`
--       `users_table` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjects_table`
--
-- Creation: Dec 12, 2017 at 02:19 PM
--

DROP TABLE IF EXISTS `subjects_table`;
CREATE TABLE `subjects_table` (
  `subj_id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `units` int(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `subjects_table`:
--

-- --------------------------------------------------------

--
-- Table structure for table `university_table`
--
-- Creation: Dec 12, 2017 at 02:11 PM
--

DROP TABLE IF EXISTS `university_table`;
CREATE TABLE `university_table` (
  `acad_year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `university_table`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--
-- Creation: Dec 12, 2017 at 02:05 PM
--

DROP TABLE IF EXISTS `users_table`;
CREATE TABLE `users_table` (
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
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `users_table`:
--

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`, `account_type`, `first_name`, `last_name`, `middle_name`, `extension`, `birthday`, `department`, `section_id`) VALUES
(1, 'Juan', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1', 'instructor', 'Juan', 'Cruz', 'Dela', 'secret', 'august', 'CEO', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_table`
--
ALTER TABLE `courses_table`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `acad_year` (`acad_year`);

--
-- Indexes for table `dept_head_table`
--
ALTER TABLE `dept_head_table`
  ADD PRIMARY KEY (`dept_head_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `instructors_table`
--
ALTER TABLE `instructors_table`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `populations_table`
--
ALTER TABLE `populations_table`
  ADD PRIMARY KEY (`population_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `acad_year` (`acad_year`);

--
-- Indexes for table `sections_table`
--
ALTER TABLE `sections_table`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
  ADD PRIMARY KEY (`student_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects_table`
--
ALTER TABLE `subjects_table`
  ADD PRIMARY KEY (`subj_id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `university_table`
--
ALTER TABLE `university_table`
  ADD PRIMARY KEY (`acad_year`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_table`
--
ALTER TABLE `courses_table`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dept_head_table`
--
ALTER TABLE `dept_head_table`
  MODIFY `dept_head_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `populations_table`
--
ALTER TABLE `populations_table`
  MODIFY `population_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections_table`
--
ALTER TABLE `sections_table`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects_table`
--
ALTER TABLE `subjects_table`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses_table`
--
ALTER TABLE `courses_table`
  ADD CONSTRAINT `courses_table_ibfk_1` FOREIGN KEY (`acad_year`) REFERENCES `university_table` (`acad_year`);

--
-- Constraints for table `dept_head_table`
--
ALTER TABLE `dept_head_table`
  ADD CONSTRAINT `dept_head_table_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors_table` (`instructor_id`);

--
-- Constraints for table `instructors_table`
--
ALTER TABLE `instructors_table`
  ADD CONSTRAINT `instructors_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`);

--
-- Constraints for table `populations_table`
--
ALTER TABLE `populations_table`
  ADD CONSTRAINT `populations_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses_table` (`course_id`),
  ADD CONSTRAINT `populations_table_ibfk_2` FOREIGN KEY (`acad_year`) REFERENCES `courses_table` (`acad_year`);

--
-- Constraints for table `sections_table`
--
ALTER TABLE `sections_table`
  ADD CONSTRAINT `sections_table_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses_table` (`course_id`);

--
-- Constraints for table `students_table`
--
ALTER TABLE `students_table`
  ADD CONSTRAINT `students_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
