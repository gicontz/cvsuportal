<?php
include_once('XDLINE.php');

class Subjects extends XDLINE{

	private $course_id = 0;
	private $user_id = 0;
	private $configfile = "";
	private $student_number = "";
	private $standings = array(
			"second_year" => 0,
			"third_year" => 0,
			"fourth_year" => 0
		);

	function __construct(){
		$args = func_get_args();
		switch (func_num_args()) {
			case 1:
			self::__construct1($args[0]);
			break;
			case 2:
			self::__construct2($args[0], $args[1]);
			break;			
			default:
			break;
		}
	}

	function __construct1($conf){
		$this->configfile = $conf;
	}

	function __construct2($user_id, $conf){
		$this->configfile = $conf;
		$this->user_id = $user_id;
		$this->course_id = $this->getCourseId($user_id);
	}
	
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
		$this->student_number = $studentNumber;
		return parent::select("*", "`subjects_table` 
			INNER JOIN `grades_table` ON `subjects_table`.`subj_id` = `grades_table`.`subj_id`", "`grades_table`.`student_number` = '$studentNumber' and final_grade != '5.00'", $configfile);
	}

	public function hasRecords(){
		return parent::select("COUNT(grades_table.student_number)", "`subjects_table` 
			INNER JOIN `grades_table` ON `subjects_table`.`subj_id` = `grades_table`.`subj_id`", "`grades_table`.`student_number` = '$this->student_number'", $this->configfile)[0]["COUNT(grades_table.student_number)"] > 0;
	}

	public function getTotalUnitsPassed($passedSubjects, $count = 0){		
		if ($passedSubjects[0] != ""){
			foreach ($passedSubjects as $key => $value) {
				$count += $passedSubjects[$key]['units'];
			}
		}
		return $count;
	}

	public function getCourseId($user_id){		
		$sect_id = parent::select("section_id", "students_table", "user_id = ".  $user_id, "config.ini")[0]['section_id'];
		return parent::select("course_id", "sections_table", "section_id = $sect_id", "config.ini")[0]['course_id'];
	}

	public function percentageOfFailure($student_number, $configfile){
		$count = parent::select("COUNT(student_number)", "grades_table inner join university_table on university_table.acad_year = grades_table.ay and university_table.semester = grades_table.sem", "student_number = $student_number", $configfile)[0]["COUNT(student_number)"];
		
		$count_five = parent::select("COUNT(student_number)", "grades_table inner join university_table on university_table.acad_year = grades_table.ay and university_table.semester = grades_table.sem", "student_number = $student_number and final_grade = '5.00'", $configfile)[0]["COUNT(student_number)"];
		return $count_five / $count * 100;
	}

	public function standing_units(){	

		$this->standings['second_year'] = parent::select("SUM(units)", "subjects_table", "course_id = $this->course_id and year_to_take = 1", $this->configfile)[0]['SUM(units)'];

		$this->standings['third_year'] = parent::select("SUM(units)", "subjects_table", "course_id = $this->course_id and year_to_take = 1 || year_to_take = 2", $this->configfile)[0]['SUM(units)'];

		$this->standings['fourth_year'] = parent::select("SUM(units)", "subjects_table", "course_id = $this->course_id and year_to_take = 1 || year_to_take = 2 || year_to_take = 3", $this->configfile)[0]['SUM(units)'];

		return $this->standings;
	}

	public function student_standing(){
		$total_credits = parent::select("SUM(units)", "grades_table inner join subjects_table on grades_table.subj_id = subjects_table.subj_id", "student_number = '$this->student_number' and final_grade != '5.00'", $this->configfile)[0]['SUM(units)'];
		return $total_credits >= $this->standings["second_year"] and $total_credits < $this->standings["third_year"] ? "2nd year standing" : $total_credits >= $this->standings["third_year"] and $total_credits < $this->standings["fourth_year"] ? "3rd year standing" : $total_credits >= $this->standings["fourth_year"] ? "4th year standing" : "1st year standing" ;
	}

	private function isSubjectable($passed_subj, $subj_prereq){
		$standing = $this->student_standing();
		return ($passed_subj == $subj_prereq || $subj_prereq == "") || $subj_prereq == $standing;
	}

	public function availableSubjects($subjectLists, $passedSubjects, $totalUnitsPassed){
		if($this->hasRecords() && $passedSubjects[0] != "") :
			foreach ($subjectLists as $key => $value) {
				foreach ($passedSubjects as $keys => $values) {
					if ($passedSubjects[$keys]['subj_id'] == $subjectLists[$key]['subj_id']) {					
						break;
					}else if ($keys == count($passedSubjects)-1) {

						if ($this->isSubjectable($passedSubjects[$keys]['course_code'], $subjectLists[$key]['prerequisite'])) {
							echo "<tr id='row-".$subjectLists[$key]["subj_id"]."'>
							<td>".$subjectLists[$key]["course_code"]."</td>
							<td>".$subjectLists[$key]["course_title"]."</td>
							<td>".$subjectLists[$key]["units"]."</td>
							<td></td>
							<td></td>

							<td class='btn-addSubject' id='td-".$subjectLists[$key]["subj_id"]."'>
							<button class='btn btn-success btn-xs addBtn' value='".$subjectLists[$key]["units"]."'><i class='fa fa-plus'></i>
							</button>
							</td>

							<td class='btn-subSubject' id='sub-td-".$subjectLists[$key]["subj_id"]."'>
							<button class='btn btn-danger btn-xs subBtn' value='".$subjectLists[$key]["units"]."'><i class='fa fa-minus'></i>
							</button>
							</td>
							</tr>";
							break;
						}
					}
				}
			}								
		else :
			echo "<h3>No records found or you needs to stop for a semester</h3>";
		endif;
	}

}