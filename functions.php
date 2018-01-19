<?php

include('lib/XDLINE.php');
include('lib/variables.php');
include('lib/subjects.php');
include('lib/instructors.php');

	$XDLINE = "XDLINE";
	$subjects = "Subjects";
	$instructors = "Instructor";
	$XDL = new $XDLINE;	
	$subjectClass = new $subjects;
	$instructorClass = new $instructors;

	
function getHeaderAssets(){
	?>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/profile-deptchar.css">

        <script src = "js/jquery.min.js"></script>
        <script src = "js/bootstrap.min.js"></script>
	<?php
}

function getFooterContents(){
	?>
<div class="col-md-12" style="background-color: white;">
                <h2><br>DIT Portal</h2>
                <p>This web portal was developed and maintained by the Organization named as the Cross Developers League: Innovate, Nurture, Excel (XDLine). <br/>Allrights reserved 2018 &copy;</p><br><br>
</div>
	<?php
}