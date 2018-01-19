<?php

include_once("../functions.php");
echo '{"instructors":[';
	$ctr = 1;
	$userid = $_POST["uid"];

    $instructors = $instructorClass->loadDepartmentInstructors($userid, '../config.ini');
    
    	foreach($instructors as $instructor){
    		if($ctr > 1){
    			echo ",";
    		}
    		$ctr++;
    		echo '{';    		
    				echo '"last_name": "' . $instructor["last_name"] . '", ';
    				echo '"middle_name": "' . $instructor["middle_name"] . '", ';
    				echo '"first_name": "' . $instructor["first_name"] . '", ';
    				echo '"extension": "' . $instructor["extension"] . '", ';
                    echo '"total_units": "' . $instructor["total_units"] . '", ';  
                    echo '"instructor_id": "' . $instructor["instructor_id"] . '" ';  		
    		echo '}';
    	}   

echo ']}';