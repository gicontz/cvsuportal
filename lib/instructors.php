<?php
include_once('XDLINE.php');

class Instructor extends XDLINE{
	
	public function addInstructor($userId){
		return parent::insert("instructors_table", array(
			'user_id' => $userId,
		), "Instructor Added Successfully!", "Instructor Cannot be added, Try Again!", $configfile);
	}

	public function loadDepartmentInstructors($userId, $configfile){
		$DeptId = $this->getDeptId($userId, $configfile);
		$data = array();

		if($DeptId != "") :
		$data = parent::select("last_name, middle_name, first_name, extension, total_units, instructor_id", "users_table
				inner join instructors_table on users_table.user_id = instructors_table.user_id
				inner join departments_table on departments_table.department_id = instructors_table.department_id", 
				"instructors_table.department_id = $DeptId and instructors_table.status = 'active'", $configfile);
		endif;

		return $data;
	}

	public function getInstructorId($userId, $configfile){
		return parent::select("instructor_id", "instructors_table", "user_id = $userId", $configfile)[0]["instructor_id"];
	}

	public function getDeptId($userId, $configfile){
		$iid = $this->getInstructorId($userId, $configfile);
		return parent::select("department_id", "dept_head_table", "instructor_id = $iid", $configfile)[0]["department_id"];
	}

	public function getInstructorNames($configfile){
		return parent::select("user_id, first_name, last_name", "users_table", "`account_type` = 'instructor' OR `account_type` = 'deptchair'", $configfile);
	}
}