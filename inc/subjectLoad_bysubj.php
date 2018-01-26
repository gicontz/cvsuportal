<?php
include_once('../functions.php');
session_start();
$subjid = $_GET['subjId'];
$course_code = $_GET['coursecode'];
$coursetitle = $_GET['coursetitle'];
$instructorId = $subjectClass->getInstructorId($_SESSION['users_details']['user_id'], "../config.ini");
$ay = $_SESSION['users_details']['acad_year'];
$instructorSubjects = $subjectClass->showSubjectbyId($instructorId, $ay, $subjid, "../config.ini");
if($instructorSubjects[0] != "") :
?>
<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $course_code . ' ' . $coursetitle; ?></h4>
</div>
<div class="modal-body" id="subj_sect">
<table class="table table-striped table-responsive">
	<tr>
		<th>Manage</th>
		<th>Course</th>
		<th>Year/Section</th>
	</tr>

	<?php
	foreach($instructorSubjects as $subject){
	?>
	<tr>
		<td><a class="fa fa-pencil manage_section"  data-toggle="modal" data-target="#modal-addhomework" title="Add Work" data-dismiss="modal"  title="Manage" data-target="#modalsections_subject" href="javascript:void(0);" data-href="<?php echo 'inc/manage_section.php?sectId=' . $subject['section_id'] . '&course_main_title=' . str_replace(' ', '%20', $subject['course_main_title']) . '&year=' . $subject['year'] . '&section=' . $subject['section'] . '&subjId=' . $subjid; ?>" href="javascript:void(0);"></a></td>
		<td><?php echo $subject['course_main_title']; ?></td>
		<td><?php echo $subject['year'] . $subject['section']; ?></td>
	</tr>
	<?php
	}
	?>
</table>
</div>
<?php

endif;
?>
<script type="text/javascript">
	$('.manage_section').on('click',function(){
		var link = $(this).attr('data-href');
    	$('#modal-addhomework .modal-content').load(link);
	});
</script>