<?php
include_once('../functions.php');

	$subloadid = $_POST['subloadid'];
    echo $subjectClass->removeLoad($subloadid, "../config.ini");
