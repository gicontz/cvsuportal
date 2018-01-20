<?php

include_once("../functions.php");
echo '{"subjects":[';
	$ctr = 1;
	$instrid = $_POST["uid"];
	$ay = $_POST["ay"];

    $sections  = $subjectClass->showSections("../config.ini");
    
    	foreach($sections as $section){
    		if($ctr > 1){
    			echo ",";
    		}
    		$ctr++;
    		echo '{';    		
    				echo '"course_code": "' . $section["course_code"] . '", ';
    				echo '"course_title": "' . $section["course_title"] . '", ';
    				echo '"course": "' . $section["course"] . '", ';
    				echo '"year": "' . $section["year"] . '", ';
    				echo '"section": "' . $section["section"] . '", ';
    				echo '"units": "' . $subjloads["units"] . '", ';
    				echo '"prerequisite": "' . $subjloads["prerequisite"] . '"';     		
    		echo '}';
    	}   

echo ']}';