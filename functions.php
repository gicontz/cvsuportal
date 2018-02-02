<?php

include('lib/XDLINE.php');
include('lib/variables.php');
include('lib/subjects.php');
include('lib/instructors.php');
include('lib/students.php');

$XDLINE = "XDLINE";
$subjects = "Subjects";
$instructors = "Instructor";
$students = "Student";
$XDL = new $XDLINE;	
$subjectClass = new $subjects;
$instructorClass = new $instructors;
$studentClass = new $students;

function getHeaderAssets(){
	?>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/profile-deptchar.css">
	<link rel="stylesheet" href="css/style.css">

	<script src = "js/jquery.min.js"></script>
	<script src = "js/bootstrap.min.js"></script>
	<?php
	include_once('inc/session_checker.php');
}

function getFooterContents(){
	?>
	<footer class="footer col-md-12" style="background-color: white;">
		<h2><br>DIT Portal</h2>
		<p>This web portal was developed and maintained by the Organization named as the Cross Developers League: Innovate, Nurture, Excel (XDLine). <br/>Allrights reserved 2018 &copy;</p><br><br>
	</footer>
	<?php
}

function ___user_navigation($image, $nav_array, $nav_icons){
	global $XDLINE;
	$i = 0;
	?>
	<div class="sidebar-header">
		<a href="#"><img src="<?php echo $image; ?>" id="img" title="Profile" class="center-block"></a>
		<a href="#"><img src="<?php echo $image; ?>" id="collapsed" title="Profile" class=" center-block"></a><br>
		<h2 class="text-center" id="hide"><?php $XDLINE::getfullname($_SESSION['users_details']); ?></h2>
	</div>
	<ul class="list-unstyled components" style="font-size: 15px;">
		<?php 
		foreach($nav_array as $nav => $link){
		?>
			<li>
				<a href="<?php echo $link; ?>">
					<i class="fa <?php echo $nav_icons[$i]; ?>"></i>
					<?php echo $nav; ?>
				</a>
			</li>
		<?php 
		$i++;
		}
		?>
	</ul>
	<?php
}

function ___student_prereg(){
	inject_asset('stylesheet', 'css/prereg.css');
    include('inc/prereg.php');
}

function inject_asset($type, $url){
	if ($type == 'stylesheet') {
	?>
	<script type="text/javascript">
		$('head').append('<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>">');
	</script>
	<?php
	}
	else if ($type=='script') {
	?>
	<script type="text/javascript">
		$('head').append('<script type="text/javascript" src="<?php echo $url; ?>"><\/script>');
	</script>
	<?php
	}
}

function getproperfullname($userArray){
		return $userArray['last_name'] . ", " . $userArray['first_name'] . " " . $userArray['middle_name'];
}