<?php

include_once("../functions.php");
echo '{"subjects":[';
	$ctr = 1;
	$instrid = $_POST["uid"];
	$ay = $_POST["ay"];

    $subjs = $subjectClass->showSubjectLoad($instrid, $ay, '../config.ini');
    
    	foreach($subjs as $subjloads){
    		if($ctr > 1){
    			echo ",";
    		}
    		$ctr++;
    		echo '{';    		
    				echo '"course_code": "' . $subjloads["course_code"] . '", ';
    				echo '"course_title": "' . $subjloads["course_title"] . '", ';
    				echo '"course": "' . $subjloads["course"] . '", ';
    				echo '"year": "' . $subjloads["year"] . '", ';
    				echo '"section": "' . $subjloads["section"] . '", ';
                    echo '"units": "' . $subjloads["units"] . '", ';
                    echo '"mode": "' . $subjloads["mode"] . '", ';
    				echo '"prerequisite": "' . $subjloads["prerequisite"] . '"';     		
    		echo '}';
    	}   

echo ']}';