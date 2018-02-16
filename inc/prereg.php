<?php
global $studentClass;
global $subjectClass;
$student_number = $studentClass->getStudentNumber($_SESSION['users_details']['user_id'], 'config.ini');
$name = getproperfullname($_SESSION['users_details']);
?>

<div class="container">
	<div class="row header">
		<div class="col-md-3">
			<img src="img/cvsu.jpg" class="cvsu logo">
		</div>
		<div class="col-md-6 header_title">
			<h1>CAVITE STATE UNIVERSITY<br/>SILANG CAMPUS</h1>
			<h4>Biga I, Silang, Cavite</h4>
		</div>
	</div><!-- page_header -->

	<div class="row text-center header_title file_title">
		<h2>OFFICE OF THE REGISTRAR</h2>
		<h6>CERTIFICATION OF GRADES</h6>
	</div><!-- file_title -->

	<div class="row date">
		<div class="col-md-3 col-md-offset-9 text-center">
			<p><input type="text" name="date" class="input_types" value="<?php echo date("F d, Y");?>"><br>
			Date</p>
		</div>
	</div><!-- date -->

	<div class="row first_par">
		<div class="col-md-12">
			<p>TO WHOM IT MAY CONCERN: </p>
		</div>
		<div class="col-md-12">
			<p class="tab">This is to certify that <strong><input type="text" name="name" class="input_types width-300" value="<?php echo $name; ?>"> (Student No. <input type="text" name="sn-num" class="input_types width-80" value="<?php echo $student_number; ?>">)</strong> obtained the following grades </p><p>during <strong><input type="text" name="semester" class="input_types width-50" value="<?php echo $_SESSION['users_details']['semester'];?>"> semester</strong> of <strong>A.Y. <input type="text" name="ay" class="input_types width-80" value="<?php echo $_SESSION['users_details']['acad_year'];?>"></strong></p>
		</div>
	</div><!-- first_par -->

	<div class="row grades_table">
		<div class="col-md-12">
			<table cellpadding="2px" width="100%" border="1px" >
				<tr>
					<th>COURSE CODE</th>
					<th>SUBJECT CODE</th>
					<th>GRADE</th>
					<th>UNIT</th>
				</tr>	
				<?php $studentClass->tabulateGrades($student_number, array(
					'acad_year' => $_SESSION['users_details']['acad_year'],
					'semester' => $_SESSION['users_details']['semester']), "config.ini"); ?>			
			</table>
			<p class="table-adder-for-gpa"><span>GPA</span></p>
		</div>
		<p>This certification is issued for whatever legal purpose it may serve.</p>
	</div><!-- grades_table -->

	<div class="row text-center signatures-1">
		<div class="col-md-6">
			<input type="text" name="adviser" class="input_types width-200">
			<p>Name and Signature of Adviser</p>
		</div>
		<div class="col-md-6"> 
			Approved: <input type="text" name="registrar" class="input_types width-200">
			<p class="registrar">Campus Registrar</p>
		</div>
	</div><!-- signatures-1 -->

	<!-- <hr> -->
	<div class="hr-line"></div>

	<div class="row text-center header_title file_title">		
		<h6>PRE-ENROLLMENT FORM</h6>
		<div class="col-md-12">
			<div class="inline name">
				<p><span>Name: </span><strong><input type="text" name="name" class="input_types width-100p"></strong></p>
				<p><span>Student Number: </span><strong><input type="text" name="sn-num" class="input_types"></strong></p>
			</div>

			<div class="inline fw_field">
				<p><span class="full_label">Address: </span><span class="full_input"><strong><input type="text" name="address" class="input_types width-100p"></strong></span></p>
			</div>


			<div class="inline">
				<p><span>Course: </span><strong><input type="text" name="course" class="input_types"></strong></p>
				<p><span>Year and Section: </span><strong><input type="text" name="year-num" class="input_types"></strong></p>
				<p><span>Major: </span><strong><input type="text" name="major" class="input_types width-200"></strong></p>
			</div>

			<div class="inline">
				<p><span>Classification:</p>
				<p><input type="checkbox" name="new_check" class="input_types check"><span>New</span></p>
				<p><input type="checkbox" name="old_check" class="input_types check"><span>Old</span></p>
				<p><input type="checkbox" name="tra_check" class="input_types check"><span>Transferee</span></p>
				<p><input type="checkbox" name="crs_check" class="input_types check"><span>Cross Reg Form</span></p>
			</div>

			<div class="inline">
				<p><span>Registration Status:</p>
				<p><input type="checkbox" name="reg_check" class="input_types check"><span>New</span></p>
				<p><input type="checkbox" name="irr_check" class="input_types check"><span>Old</span></p>
			</div>

			<div class="inline fw_field ff2">
				<p><span class="full_label">Scholarship Awarded: </span><span class="full_input"><strong><input type="text" name="address" class="input_types width-100p"></strong></span></p>
			</div>

			<div class="inline">
				<p><span>Mode of Payment:</p>
				<p><input type="checkbox" name="cash_check" class="input_types check"><span>Cash</span></p>
				<p><input type="checkbox" name="installment_check" class="input_types check"><span>Installment</span></p>
			</div>
		</div>
	</div><!-- file_title -->

	<div class="row subjLoad_table">
		<div class="col-md-12">
			<table cellpadding="2px" width="100%" border="1px" id="table-preenrollment">
				<thead>
					<tr>
						<th>COURSE CODE</th>
						<th>SUBJECT CODE</th>
						<th>UNIT</th>
						<th>TIME</th>
						<th>DAY</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
				
			</table>
			<button type="button" class="btn btn-success btn-xs" id="subject-add" title='Add Subjects'><i class="fa fa-plus" data-toggle="modal" data-target="#addSubject"></i></button>
			<button type="button" class="btn btn-success btn-xs" id="subject-minus" title='Toggle Remove Subjects'><i class="fa fa-minus"></i></button>
		</div>
	</div><!-- subjLoad_table -->

	<div class="row text-center signatures-2">
		<div class="col-md-6">
			<input type="text" name="adviser" class="input_types width-200">
			<p>Name and Signature of Adviser</p>
		</div>
		<div class="col-md-6"> 
			Approved: <input type="text" name="registrar" class="input_types width-200">
			<p class="registrar">Campus Registrar</p>
		</div>
	</div><!-- signatures-2 -->


<!-- Add Subject Modal-->
  <div class="modal fade" id="addSubject" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PRE-ENROLLMENT - ADD SUBJECT </h4>
        </div>
        <div class="modal-body">
	        <div class="row subjLoad_table">
				<div class="col-md-12">
					<table cellpadding="2px" width="100%" border="1px" id="table-addSubject">
						<thead>
							<tr>
								<th>COURSE CODE</th>
								<th>SUBJECT CODE</th>
								<th>UNIT</th>
								<th>TIME</th>
								<th>DAY</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$subjectLists = $subjectClass::getSubjects("3","config.ini");// 3 is Temporary
								$passedSubjects = $subjectClass::getPassedSubjects($student_number,"config.ini");
								$totalUnitsPassed = $subjectClass::getTotalUnitsPassed($passedSubjects);

								function availableSubjects($subjectLists, $passedSubjects, $totalUnitsPassed){
									if($passedSubjects[0] != "") :
									foreach ($subjectLists as $key => $value) {
										foreach ($passedSubjects as $keys => $values) {
											if ($passedSubjects[$keys]['subj_id'] == $subjectLists[$key]['subj_id']) {
												break;
											}else if ($keys == count($passedSubjects)-1) {

													if (($passedSubjects[$keys]['course_code'] == $subjectLists[$key]['prerequisite']) || ($subjectLists[$key]['prerequisite'] == '') || ($totalUnitsPassed >= 92 && $subjectLists[$key]['prerequisite'] == '3rd year standing') || ($totalUnitsPassed >= 335 && $subjectLists[$key]['prerequisite'] == "4th year standing")) {

													echo "<tr id='row-".$subjectLists[$key]["subj_id"]."'>
															<td>".$subjectLists[$key]["course_code"]."</td>
															<td>".$subjectLists[$key]["course_title"]."</td>
															<td>".$subjectLists[$key]["units"]."</td>
															<td></td>
															<td></td>
															
															<td class='btn-addSubject' id='td-".$subjectLists[$key]["subj_id"]."'>
																<button class='btn btn-success btn-xs addBtn' value='".$subjectLists[$key]["units"]."'><i class='fa fa-plus'></i>
																</button>
															</td>

															<td class='btn-subSubject' id='sub-td-".$subjectLists[$key]["subj_id"]."'>
																<button class='btn btn-danger btn-xs subBtn' value='".$subjectLists[$key]["units"]."'><i class='fa fa-minus'></i>
																</button>
															</td>
														</tr>";
														break;
												}
											}
										}
									}								
								else :
									echo "<h3>You are enrolled recently in this University, no records found</h3>";
									endif;
								}

								availableSubjects($subjectLists, $passedSubjects, $totalUnitsPassed);
								
							 ?>
						</tbody>
					</table>
				</div>
			</div><!-- subjLoad_table -->
        </div>
        <div class="modal-footer">
          <label style="float: left;">Total Units Accumulated: <span id="total_units">0</span></label>
          <button type="button" class="btn btn-success" data-dismiss="modal" id="add_done">Done</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="add_exceed" disabled>27 Units is the Maximum allowed units</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="add_close">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Subtract Subject Modal-->
 


</div><!-- container -->


<script type="text/javascript" src="js/table.js"></script>
<script type="text/javascript" src="js/prereg.js"></script>