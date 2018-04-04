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

	public function showCurrentSubjects($student_number){
		
	}

	public function loadSubjectbyStudent($student_number, $subjId, $sectionId, $configfile){
		return parent::insert("subjloads_table", array(
			'instructor_id' => $instructorId,
			'subj_id' => $subjId,
			'section_id' => $sectionId
		), "Subject Successfully Loaded!", "Subject Cannot Load to the Instructor, Try Again!", $configfile);
	}

	public function removeLoad($subjload_id, $configfile){
		return parent::delete("subjloads_table", "subjload_id = $subjload_id", "Subject Load Removed!", "Subject Load Wasn't Removed, Try Again!", $configfile);
	}

	public function showSubjectbyId($instructorId, $ay, $subjId, $configfile){
		$data = array();

		if($instructorId != "" && $ay != "" && $subjId != "") :
			$data = parent::select("subjload_id, subjloads_table.section_id, course_main_title, course_code, course_title, units, prerequisite, course, year, section, mode", "subjects_table
				inner join subjloads_table on subjects_table.subj_id = subjloads_table.subj_id
				inner join sections_table on sections_table.section_id = subjloads_table.section_id
				inner join courses_table on sections_table.course_id = courses_table.course_id", 
				"subjloads_table.instructor_id = $instructorId and subjloads_table.acad_year = '$ay' and sections_table.section_id = subjloads_table.section_id and subjloads_table.subj_id = $subjId", $configfile);
		endif;

		return $data;
	}

	public function showSubjectLoad($instructorId, $ay, $configfile){
		$data = array();

		if($instructorId != "" && $ay != "") :
			$data = parent::select("subjload_id, course_code, course_title, units, prerequisite, course, year, section, mode", "subjects_table
				inner join subjloads_table on subjects_table.subj_id = subjloads_table.subj_id
				inner join sections_table on sections_table.section_id = subjloads_table.section_id
				inner join courses_table on sections_table.course_id = courses_table.course_id", 
				"subjloads_table.instructor_id = $instructorId and subjloads_table.acad_year = '$ay' and sections_table.section_id = subjloads_table.section_id", $configfile);
		endif;

		return $data;
	}

	public function showSubjectsofInstructor($instructorId, $ay, $configfile){
		$data = array();

		if($instructorId != "") :
			$data = parent::select("instructor_id, subjects_table.subj_id, section_id, course_code, course_title", "subjloads_table join subjects_table on subjects_table.subj_id = subjloads_table.subj_id", 
				"instructor_id = $instructorId and subjloads_table.acad_year = '$ay' GROUP BY subj_id", $configfile);
		endif;

		return $data;		
	}

	public function getInstructorId($userId, $configfile){
		return parent::select("instructor_id", "instructors_table", "user_id = $userId", $configfile)[0]["instructor_id"];
	}

	public function getSubjects($courseid, $configfile){
		return parent::select("*", "subjects_table", "`course_id` = $courseid", $configfile);
	}

	public function getPassedSubjects($studentNumber, $configfile){
		return parent::select("*", "`subjects_table` 
			INNER JOIN `grades_table` ON `subjects_table`.`subj_id` = `grades_table`.`subj_id`", "`grades_table`.`student_number` = '$studentNumber'", $configfile);
	}

	public function getTotalUnitsPassed($passedSubjects, $count = 0){		
		if ($passedSubjects[0] != ""){
			foreach ($passedSubjects as $key => $value) {
				$count += $passedSubjects[$key]['units'];
			}
		}
		return $count;
	}


	// private function isSubjectable($subjectLists, $passedSubjects, $student_number){
	// 	$thirdysUnits = parent::select("SUM(units)", "grades_table inner join subjects_table on grades_table.subj_id = subjects_table.subj_id", "student_number = $student_number and year_to_take != 4 and year_to_take != 0");
	// 	return $passedSubjects[$keys]['course_code'] == $subjectLists[$key]['prerequisite']) || ($subjectLists[$key]['prerequisite'] == '') || ($totalUnitsPassed >= 92 && $subjectLists[$key]['prerequisite'] == '3rd year standing') || ($totalUnitsPassed >= 335 && $subjectLists[$key]['prerequisite'] == "4th year standing" ;
	// }

	// public function availableSubjects($subjectLists, $passedSubjects, $totalUnitsPassed){
	// 	if($passedSubjects[0] != "") :
	// 		foreach ($subjectLists as $key => $value) {
	// 			foreach ($passedSubjects as $keys => $values) {
	// 				if ($passedSubjects[$keys]['subj_id'] == $subjectLists[$key]['subj_id']) {
	// 					break;
	// 				}else if ($keys == count($passedSubjects)-1) {

	// 					if () {

	// 						echo "<tr id='row-".$subjectLists[$key]["subj_id"]."'>
	// 						<td>".$subjectLists[$key]["course_code"]."</td>
	// 						<td>".$subjectLists[$key]["course_title"]."</td>
	// 						<td>".$subjectLists[$key]["units"]."</td>
	// 						<td></td>
	// 						<td></td>

	// 						<td class='btn-addSubject' id='td-".$subjectLists[$key]["subj_id"]."'>
	// 						<button class='btn btn-success btn-xs addBtn' value='".$subjectLists[$key]["units"]."'><i class='fa fa-plus'></i>
	// 						</button>
	// 						</td>

	// 						<td class='btn-subSubject' id='sub-td-".$subjectLists[$key]["subj_id"]."'>
	// 						<button class='btn btn-danger btn-xs subBtn' value='".$subjectLists[$key]["units"]."'><i class='fa fa-minus'></i>
	// 						</button>
	// 						</td>
	// 						</tr>";
	// 						break;
	// 					}
	// 				}
	// 			}
	// 		}								
	// 	else :
	// 		echo "<h3>No records found</h3>";
	// 	endif;
	// }

}