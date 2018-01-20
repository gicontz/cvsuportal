<?php 
include_once("../functions.php");
	$ctr = 1;
	$cid = $_POST['cid'];
    $sections  = $subjectClass->showSections("../config.ini", $cid);

    echo '{"sections":[';    
    	foreach($sections as $section){
    		if($ctr > 1){
    			echo ",";
    		}
    		$ctr++;
    		echo '{';    		
    				echo '"section_id": "' . $section['section_id'] . '", ';
    				echo '"year": "' . $section["year"] . '", ';
    				echo '"section": "' . $section["section"] . '" ';     		
    		echo '}';
    	}  
echo ']}';
?>     