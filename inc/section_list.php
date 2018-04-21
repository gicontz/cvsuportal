<?php
include_once('functions.php');

$courses  = $subjectClass->showCourses("config.ini");
?>

<div class="form-group">
<select id="courses" class="form-control input-sm">
	<option value="" default>Choose Course</option>
	<?php 
	foreach($courses as $course){ ?>
	<option value="<?php echo $course['course_id']; ?>"><?php echo $course['course_main_title']; ?></option>            
	<?php
	}
	?>        
</select>
</div>

<div class="form-group">
<select id="sections" class="form-control input-sm">
	<option value="" default>Choose Section</option>
</select>
</div>

<div class="form-group">
<select id="subjects" class="form-control input-sm">
	<option value="" default>Choose Subject</option>
	<?php 
	foreach($subjects as $subject){ ?>
	<option value="<?php echo $subject['subj_id']; ?>"><?php echo $subject['course_code'] . " " . $subject['course_title']; ?></option>            
	<?php
}
?>        
</select>
</div>

<div class="form-group">
<select id="mode" class="form-control input-sm">
	<option value="" default>Choose Mode</option>
	<option value="LEC" default>LEC</option>
	<option value="LAB" default>LAB</option>
	<option value="LEC/LAB" default>LEC/LAB</option>
</select>
</div>
<button type="button" class="btn btn-primary" id="btn-addload">Done</button>

<!-- Script to filter details below by Course -->
<script type="text/javascript">
	var course_id = 0;
	$("#courses").on('change', function(){
		$("#sections *").remove();
		$("#sections").prepend('<option value="" default>Choose Section</option>');
		$("#subjects *").remove();
		$("#subjects").prepend('<option value="" default>Choose Subject</option>');
		course_id = $(this).val();                                     
		$.post("inc/sections.php", {
			cid: course_id },
			function(callback){   
				var sections = JSON.parse(callback);   
				sections.sections.forEach(function(item){
					$("#sections").append('<option value="'+ item.section_id +'" default>'+ item.year + item.section +'</option>');
				});
			}
			);

		$.post("inc/subjectlists.php", {
			cid: course_id },
			function(callback){   
				var subjects = JSON.parse(callback);   
				subjects.subjects.forEach(function(item){
					$("#subjects").append('<option value="'+ item.subj_id +'" default>'+ item.course_code + " " + item.course_title +'</option>');
				});
			}
			);
	});

	$("#btn-addload").on('click', function(){
		var iid = $("#addLoad").attr("data-id");
		var ay = $("#addLoad").attr("data-ay");
		var secId = $("#sections").val();
		var subid = $("#subjects").val();
		var mod = $("#mode").val();

		$.post("inc/load_subject_instructor.php", {
			instructor_id: iid,
			section_id: secId,
			subj_id: subid,
			acad_year: ay,
			mode: mod},
			function(callback){     
				alert(callback);
			}
			);

		setTimeout(function(){loadSubjectById(iid, 1, ay);}, 1000);
	});
</script>