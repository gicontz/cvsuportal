<?php 
include_once("../functions.php");
	$ctr = 1;
	$cid = $_POST['cid'];
    $subjects  = $subjectClass->showSubjects("../config.ini", $cid);

    echo '{"subjects":[';    
    	foreach($subjects as $subject){
    		if($ctr > 1){
    			echo ",";
    		}
    		$ctr++;
    		echo '{';    		
    				echo '"subj_id": "' . $subject['subj_id'] . '", ';
    				echo '"course_code": "' . $subject["course_code"] . '", ';
    				echo '"course_title": "' . $subject["course_title"] . '" ';     		
    		echo '}';
    	}  
echo ']}';
?>     