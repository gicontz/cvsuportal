<?php
$instructorId = $subjectClass->getInstructorId($_SESSION['users_details']['user_id'], "config.ini");
$ay = $_SESSION['users_details']['acad_year'];
$instructorSubjects = $subjectClass->showSubjectsofInstructor($instructorId, $ay, "config.ini");
if($instructorSubjects[0] != "") :
?>
	<tr>
		<th>Manage</th>
		<th>Course Code</th>
		<th>Course Title</th>
	</tr>

	<?php
	foreach($instructorSubjects as $subject){
	?>
	<tr>
		<td><a class="fa fa-pencil-square-o instructor_subj" data-toggle="modal" data-target="#modalsections_subject" href="javascript:void(0);" data-href="<?php echo 'inc/subjectLoad_bysubj.php?subjId=' . $subject['subj_id'] . '&coursecode=' . str_replace(' ', '%20', $subject['course_code']) . '&coursetitle=' . str_replace(' ', '%20', $subject['course_title']); ?>"></a></td>
		<td><?php echo $subject['course_code']; ?></td>
		<td><?php echo $subject['course_title']; ?></td>
	</tr>
	<?php
	}
	?>
<?php

else:
	echo "<h4>No Subject Loads</h4>";

endif;
?>
<script type="text/javascript">
	$('.instructor_subj').on('click',function(){
		var link = $(this).attr('data-href');
    	$('#modalsections_subject .modal-content').load(link);
	});
</script>