<?php 
	global $XDL;
 ?>
<div class="modal-dialog" style="margin-top: 60px;">
	<div class="modal-content">
		<div class="form-style">
			<h1 id="signheader">Add Student</h1>
			<form>
				<label>Student Number : </label>
				<input type="text" name="StudentNumber"  id="studentNumber" class="info-inputs" required />
				<label>Validation Number : </label>
				<input type="text" name="Validation"  id="validationNumber" class="info-inputs" required/>
				<label>Confirmation Password : </label>
				<input type="Password" name="ConfirmPassword"  id="confirmationPassword" class="info-inputs" required/>
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
        <label>Username: </label><span id="account_username"></span>
        <br><label>Password: </label><span id="account_password"></span>
        <br><label>Validation: </label><span id="account_validation"></span>
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
		var data = new Object();
    	data["request_type"] = "request-generate-student";
    	data["studentNumber"] = $('#studentNumber').val().replace(/-|\+/g, "");
    	data["validationNumber"] = $('#validationNumber').val().replace(/-|\+/g, "");
    	data["confirmationPassword"] = $('#confirmationPassword').val();

    	if (data["studentNumber"] == "") {
    		alert("Student Number Field is Required");
    	}else if (isNaN(data["studentNumber"])) {
    		alert("Student Number Must Be Numbers");
    	}else if (data['studentNumber'].length < 7 || data['studentNumber'].length > 11) {
			alert("The Student Number is not possible");
    	}else if (data["validationNumber"] == "") {
    		alert("Validation Number Field is Required");
    	}else if (isNaN(data["validationNumber"])) {
    		alert("Validation Number Must Be Numbers");
    	}else if (data["validationNumber"].length > 5) {
			alert("The Validation Number is not possible");
    	}else if (data["confirmationPassword"] == "") {
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
	        		$('#copyPassword').hide();
		    		$('#printInformation').hide();
		    		$('#confirmAccount').show();
		    		$('#cancelCreation').show();
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
	    		$('#copyPassword').show();
	    		$('#printInformation').show();
	    		$('#confirmAccount').hide();
	    		$('#cancelCreation').hide();
	    		alert('Account has been created');
	    	}else {
	    		alert(callback);
	    	}
	    });
	});

</script>

