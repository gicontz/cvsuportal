<?php
include_once('../functions.php');
session_start();
$sectId = $_GET['sectId'];
$course_main_title = $_GET['course_main_title'];
$year = $_GET['year'];
$section = $_GET['section'];
$subjId = $_GET['subjId'];
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><?php echo $course_main_title . ' - ' . $year . $section; ?></h4>
</div>
<div class="modal-body" id="subj_sect">

	<div class="modal-set">
		
	</div>

	<button  class="btn btn-default">Add homework</button>
	<button class="btn btn-default">Add Project</button>
	<button class="btn btn-default upload_grade" href="javascript:void(0);" data-href="inc/upload_grade.php?subjId=<?php echo $subjId; ?>">Upload Grades</button>
</div>

<div class="modal-footer">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" data-dismiss="modal">Back</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>

<script type="text/javascript">
	$(".upload_grade").on('click', function(){
		var link = $(this).attr('data-href');
		$('#modal-addhomework .modal-set').load(link);
	});
</script>