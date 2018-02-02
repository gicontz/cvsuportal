<?php
include_once('XDLINE.php');

class Student extends XDLINE{

	public function getStudentNumber($userid, $configfile){
		return parent::select("student_number", "students_table", "user_id = $userid", $configfile)[0]['student_number'];
	}

	public function tabulateGrades($student_number, $arrayUniversity, $configfile){
		$grades = parent::select("*", "grades_table", "ay='{$arrayUniversity['acad_year']}' AND sem='{$arrayUniversity['semester']}' AND student_number=$student_number", $configfile);
		if($grades[0] != "") :
			$i = 1;
			foreach($grades as $grade){
				$subjs = parent::select("*", "subjects_table", "subj_id={$grade['subj_id']}", $configfile)[0];
			?>
			<tr id="row<?php echo $i; ?>">
				<td><input type="text" name="subj<?php echo $i; ?>-cc" class="input_types" value="<?php echo $subjs['course_code'];?>" disabled></td>
				<td><input type="text" name="subj<?php echo $i; ?>-sc" class="input_types width-100p" value="<?php echo $subjs['course_title'];?>" disabled></td>
				<td><input type="text" name="subj<?php echo $i; ?>-g" class="input_types width-50" value="<?php echo $grade['final_grade'];?>" disabled></td>
				<td><input type="text" name="subj<?php echo $i; ?>-u" class="input_types width-50" value="<?php echo $subjs['units'];?>" disabled></td>
			</tr>			
			<?php
			$i++;
			}
		endif;
	}
}