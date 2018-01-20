<?php 
include_once("../functions.php");

    $iid = $_POST['instructor_id'];
    $sid = $_POST['section_id'];
    $subid = $_POST['subj_id'];
    $ay = $_POST['acad_year'];
    $mode = $_POST['mode'];
    if($iid != 0 && $sid != 0 && $subid != 0 && $ay != "") :
	   echo $subjectClass->loadSubjectbyInstructor($iid, $subid, $sid, $ay, $mode, "../config.ini");    
    else :
       echo "Please Choose Appropriate Information!";
    endif;
?>     