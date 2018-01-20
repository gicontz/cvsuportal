<?php
	include_once('functions.php');

	$courses  = $subjectClass->showCourses("config.ini");
	$sections  = $subjectClass->showSections("config.ini");
	$subjects  = $subjectClass->showSubjects("config.ini");
?>

<label>Course: </label>
<select id="courses">
	<?php 
	foreach($courses as $course){ ?>
		<option value="<?php echo $course['course_id']; ?>"><?php echo $course['course_main_title']; ?></option>            
	<?php
	}
	?>        
</select>
<br/>
<label>Section: </label>
<select id="courses">
	<?php 
	foreach($sections as $section){ ?>
		<option value="<?php echo $section['section_id']; ?>"><?php echo $section['year'] . $section['section']; ?></option>            
	<?php
	}
	?>        
</select>
<br/>
<label>Subject: </label>
<select id="courses">
	<?php 
	foreach($subjects as $subject){ ?>
		<option value="<?php echo $subject['subj_id']; ?>"><?php echo $subject['course_code'] . " " . $subject['course_title']; ?></option>            
	<?php
	}
	?>        
</select>