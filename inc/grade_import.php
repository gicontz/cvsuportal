<?php
include("../functions.php");
session_start();

$ay = $_SESSION['users_details']['acad_year'];
$sem = $_SESSION['users_details']['semester'];
$status = "Wrong Sheet Name! Please re-upload the file and try again";
$grades = $_POST["grades"][$_POST["sheetName"]];
$subjId = $_POST["subjid"];

for($index = 1; $index <= sizeof($grades) - 1; $index++){
$orig_sn = str_replace("-", "", $grades[$index][0]);
$grade = $grades[$index][1];
$remarks = $grades[$index][2];

$existing_Grades = $XDL::select("*", "grades_table", "student_number = $orig_sn and subj_id = $subjId and ay = '$ay' and sem = '$sem'", "../config.ini");

if($existing_Grades[0] == ""){
	$status = $XDL::insert("grades_table", array(
		'student_number' => $orig_sn,
		'subj_id' => $subjId,
		'final_grade' => $grade,
		'ay' => $ay,
		'sem' => $sem,
		'remarks' => $remarks
	), "Grades are uploaded Successfully!", "Cannot Upload Grades, try Again!", "../config.ini");
}else{
	$status = "Grading Sheet Already Imported! Contact Administrator if you have mistaken on your previous upload";
}
}

echo $status;