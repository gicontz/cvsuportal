<?php
include_once('XDLINE.php');

class Subjects extends XDLINE{
	
	public function loadSubjectbyInstructor($instructorId, $subjId, $sectionId, $acad_year, $mode, $configfile){
		return parent::insert("subjloads_table", array(
			'instructor_id' => $instructorId,
			'subj_id' => $subjId,
			'section_id' => $sectionId,
			'acad_year' => "{$acad_year}",
			'mode' => $mode
		), "Subject Successfully Loaded!", "Subject Cannot Load to the Instructor, Try Again!", $configfile);
	}

	public function showSections($configfile, $courseid){
		return parent::select("course_id, section_id, year, section", "sections_table", "course_id = $courseid", $configfile);
	}

	public function showCourses($configfile){
		return parent::select("course_id, course_main_title", "courses_table", "", $configfile);
	}

	public function showSubjects($configfile, $courseid){
		return parent::select("course_id, subj_id, course_code, course_title", "subjects_table", "course_id = $courseid", $configfile);
	}

	public function loadSubjectbyStudent($student_number, $subjId, $sectionId, $configfile){
		return parent::insert("subjloads_table", array(
			'instructor_id' => $instructorId,
			'subj_id' => $subjId,
			'section_id' => $sectionId
		), "Subject Successfully Loaded!", "Subject Cannot Load to the Instructor, Try Again!", $configfile);
	}

	public function showSubjectLoad($instructorId, $ay, $configfile){
		$data = array();

		if($instructorId != "") :
		$data = parent::select("course_code, course_title, units, prerequisite, course, year, section, mode", "subjects_table
				inner join subjloads_table on subjects_table.subj_id = subjloads_table.subj_id
				inner join sections_table on sections_table.section_id = subjloads_table.section_id
				inner join courses_table on sections_table.course_id = courses_table.course_id", 
				"subjloads_table.instructor_id = $instructorId and subjloads_table.acad_year = '$ay' and sections_table.section_id = subjloads_table.section_id", $configfile);
		endif;

		return $data;
	}

	public function getInstructorId($userId, $configfile){
		return parent::select("instructor_id", "instructors_table", "user_id = $userId", $configfile)[0]["instructor_id"];
	}
}