<?php
$instructorId = $subjectClass->getInstructorId($_SESSION['users_details']['user_id'], "config.ini");
$instructorSubjects = $subjectClass->showSubjectsofInstructor($instructorId, "config.ini");
if($instructorSubjects[0] != "") :
?>
<table class="table table-striped table-hover">
	<tr>
		<th>Manage</th>
		<th>Course Code</th>
		<th>Course Title</th>
	</tr>

	<?php
	foreach($instructorSubjects as $subject){
	?>
	<tr>
		<td><button class="fa fa-pencil-square-o" data-toggle="modal" data-target="#modal" data-subjid="<?php echo $subject['subj_id']; ?>"></button></td>
		<td><?php echo $subject['course_code']; ?></td>
		<td><?php echo $subject['course_title']; ?></td>
	</tr>
	<?php
	}
	?>
</table>
<?php

else:
	echo "<h4>No Subject Loads</h4>";

endif;