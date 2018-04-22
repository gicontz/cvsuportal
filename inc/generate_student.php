<?php 
	global $XDL;
	global $subjectClass;
	global $instructorClass;
	$courses  = $subjectClass->showCourses("config.ini");
	$instructors = $instructorClass->getInstructorNames("config.ini");
	$config = parse_ini_file("config.ini", true);
	$web_link = $config["qrscan"]["website_link"];
 ?>
<span style="display: none" id="web_link"><?php echo $web_link ?></span>
<div class="modal-dialog" style="margin-top: 60px;">
	<div class="modal-content">
		<div class="form-style">
			<h1 id="signheader">Add Student</h1>
			<form>
				<label>First Name : </label>
				<input type="text" name="fname"  id="name-first" class="info-inputs" required />
				<label>Middle Name : </label>
				<input type="text" name="mname"  id="name-middle" class="info-inputs" required />
				<label>Last Name : </label>
				<input type="text" name="lname"  id="name-last" class="info-inputs" required />
				<label>Student Number : </label>
				<input type="text" name="StudentNumber"  id="studentNumber" class="info-inputs" required />
				<label>Validation Number : </label>
				<input type="text" name="Validation"  id="validationNumber" class="info-inputs" required/>

				<label>Adviser Name :</label>
				<select id="select-adviser">
					<option disabled selected value="0">--- Choose Adviser ---</option>
					<?php 
						foreach ($instructors as $instructor) {
							?>
								<option value="<?php echo $instructor['user_id']; ?>" name="<?php echo $instructor['first_name'].' '.$instructor['last_name']; ?>"><?php echo $instructor['first_name']." ".$instructor['last_name']; ?></option> 
							<?php
						}
					 ?>
				</select>

				<label>Section :</label>
				<select style="width: 49%" id="select-course" >
					<option disabled selected value="0">Course</option>

					<?php foreach($courses as $course){ 
						?> 
							<option value="<?php echo $course['course_id']; ?>"><?php echo $course['course_main_title']; ?></option> 
						<?php } ?> 
				</select>

				<select style="width: 20%" id="select-section">
					<option disabled selected id="section" value="0">Section</option>
				</select>

				<label>Confirmation Password : </label>
				<input type="Password" name="ConfirmPassword"  id="confirmationPassword" class="info-inputs" required />

				<div class="alert alert-danger alert-dismissible" id="input-error" style="display: none">
				  <a id="error-close" class="close">&times;</a>
				  <strong id="error-title"></strong> <span id="error-msg"></span>
				</div>

				<input type="button" value="Generate Password" style="margin-top: 10px;" id="generatePassword" />
				<input type="text" value="*Generated Password*" id="generatedPass" style="width: 100%" disabled>

			</form>

			<center>
				<button class="btn btnCopyPrint" disabled title="You Must Fill Up Everything" id="createButton" data-toggle="modal" data-target="#createStudentAccModal"><i class="fa fa-check" aria-hidden="true"></i> Create  </button>
				
			</center>
		</div>
	</div>
</div>


<div id="createStudentAccModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Account Confirmation</h4>
      </div>
      <div class="modal-body">
      	<label>Name: </label><span id="account_fullname"></span>
        <br><label>Username: </label><span id="account_username"></span>
        <br><label>Password: </label><span id="account_password"></span>
        <br><label>Validation: </label><span id="account_validation"></span>
        <center><div id="qrcode" style="display: none"></div></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="confirmAccount">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelCreation">Cancel</button>
        <button class="btn btnCopyPrint" style="display: none" id="copyPassword"><i class="fa fa-clone" aria-hidden="true"></i> Copy Password</button>
		<button class="btn btnCopyPrint" style="display: none" id="printInformation"><i class="fa fa-print" aria-hidden="true"></i> Print Information</button></a>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">


	$('body').on('click', '#generatePassword', function() {
		
		var web_link = $('#web_link').text() + "?mode=qrscan";

		var data = new Object();
    	data["request_type"] = "request-generate-student";
    	data["studentNumber"] = $('#studentNumber').val().replace(/-|\+/g, "");
    	data["validationNumber"] = $('#validationNumber').val().replace(/-|\+/g, "");
    	data["confirmationPassword"] = $('#confirmationPassword').val();
    	data["name-first"] = $('#name-first').val();
    	data["name-middle"] = $('#name-middle').val();
    	data["name-last"] = $('#name-last').val();
    	data["std-course"] = $("#select-course").val();
    	if ($("#select-section").val() != null) {
    		data["std-year"] = $("#select-section").val().charAt(0);
    		data["std-section"] = $("#select-section").val().charAt(1);
    	}
    	
    	data["adviser"] = $("#select-adviser").val();


    	if (!validation_name(data['name-first'])) {
    		$('#input-error').show();
    		$('#error-title').text("INVALID FIRST NAME!!");
    		$('#error-msg').text("Please recheck your first name");
    	}else if (!validation_name(data['name-middle'])) {
    		$('#input-error').show();
    		$('#error-title').text("INVALID MIDDLE NAME!!");
    		$('#error-msg').text("Please recheck your middle name");
    	}else if (!validation_name(data['name-last'])) {
    		$('#input-error').show();
    		$('#error-title').text("INVALID LAST NAME!!");
    		$('#error-msg').text("Please recheck your last name");
    	}else if (!validation_studentNumber(data["studentNumber"])) {
    		$('#input-error').show();
    		$('#error-title').text("INVALID STUDENT NUMBER!!");
    		$('#error-msg').text("Please recheck your Student Number");
    	}else if (!validation_validationNumber(data["validationNumber"])) {
    		$('#input-error').show();
    		$('#error-title').text("INVALID VALIDATION NUMBER!!");
    		$('#error-msg').text("No validation number such that");
    	}else if (data["adviser"] == null) {
    		$('#input-error').show();
    		$('#error-title').text("REQUIRED!");
    		$('#error-msg').text("Please select your adviser.");
    	}else if (data["std-course"] == null) {
    		$('#input-error').show();
    		$('#error-title').text("REQUIRED!");
    		$('#error-msg').text("Please select your course, year and section.");
    	}else if (data["std-section"] == null) {
    		$('#input-error').show();
    		$('#error-title').text("REQUIRED!");
    		$('#error-msg').text("Please select your section");
    	}else if (data["confirmationPassword"] == "") {
    		console.log(data["std-course"]);
    		alert("Confirmation Password Field is Required");
    	}else {
    		$.post("lib/login.php", {data: data}, function(callback){
		    	if (callback == 'INCORRECT PASSWORD') {
					$('#createButton').prop('disabled', true);
					alert("Password is Incorrect");
		    	}else if (callback == 'STD NO. ALREADY EXIST') {
					$('#createButton').prop('disabled', true);
					alert("Student Number Already Exist");
		    	}else if(callback.length == 12) {
					$('#createButton').prop('disabled', false);
	        		$('#generatedPass').val(callback);
	        		$('#account_username').text(data['studentNumber']);
	        		$('#account_validation').text(data['validationNumber']);
	        		$('#account_password').text(callback);
	        		$('#account_fullname').text(data['name-first'] + " " + data['name-middle'] + " " + data['name-last']);
	        		$('#copyPassword').hide();
		    		$('#printInformation').hide();
		    		$('#confirmAccount').show();
		    		$('#cancelCreation').show();
		    		$('#qrcode').html("");
	    			$('#qrcode').qrcode(web_link + "&u=" + data["studentNumber"] + "&p=" + callback);

	        		alert('Successfully Generated a Password');
		    	}else {
		    		alert("Account Creation Error");
		    	}
		    });
    	}

	});

	$('body').on('click', '#confirmAccount', function() {
		var data = new Object();
    	data["request_type"] = "request-confirm-student";

		$.post("lib/login.php", {data: data}, function(callback){
	    	if (callback == 'SUCCESSFULLY GENERATED ACCOUNT') {
	    		$('#qrcode').show();
	    		$('#copyPassword').show();
	    		$('#printInformation').show();
	    		$('#confirmAccount').hide();
	    		$('#cancelCreation').hide();
	    		alert('Account has been created');

	    	}
	    });
	});

	$('body').on('click', '#error-close', function() {
		$('#input-error').hide();
	});
	
	
	function validation_studentNumber(studentNumber){
		var reg = new RegExp('^[0-9]{7,11}$');
		return reg.test(studentNumber);
	}

	function validation_name(name){
		var reg = new RegExp('^[a-zA-Z].*[\s\.]*$');
		return reg.test(name);
	}

	function validation_validationNumber(validationNumber){
		var reg = new RegExp('^[0-9]{1,4}$');
		return reg.test(validationNumber);
	}


	$("#select-course").on('change', function(){
		$("#select-section *").remove();
		$("#select-section").prepend('<option value="" default disabled>Section</option>');
		
		course_id = $(this).val();                                     
		$.post("inc/sections.php", {
			cid: course_id },
			function(callback){   
				var sections = JSON.parse(callback);   
				sections.sections.forEach(function(item){
					$("#select-section").append('<option value="'+ item.year + item.section + '" default>'+ item.year + item.section +'</option>');
						console.log(callback);
				});
			}
			);

	});

	
	
	
</script>

