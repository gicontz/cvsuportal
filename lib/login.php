<?php 
	
include("XDLINE.php");
$data = $_POST['data'];

if ($data['request_type'] == "request-login") {
	login($data['username'], $data['password']);
}else if($data['request_type'] == "request-generate-student"){
	generateUser($data['studentNumber'], $data['validationNumber'], $data['confirmationPassword'], $data);
}else if($data['request_type'] == "request-confirm-student"){
	createStudentAccount();
}else if ($data['request_type'] == "update-profile-picture") {
	profilePicture($data['imageData']);
}

function login($username, $password){
	session_start();
	$XDLINE = "XDLINE";
	$XDL = new $XDLINE;	
	$password = $XDL->encrypt_password($password);
	$users_details = $XDLINE::select("*", "users_table, university_table", "users_table.username = '$username' AND users_table.password = '$password'")[0];

	if ($users_details == "") {
		echo "FAILED";
		session_destroy();
	}else {
		$_SESSION['users_details'] = $users_details;
		echo "GOTO PROFILE " . $_SESSION['users_details']['account_type'];
	}
};

function generateUser($studentNumber, $validationNumber, $confirmationPassword, $dataArray){
	session_start();
	$XDLINE = "XDLINE";
	$XDL = new $XDLINE;	
	$generatedPassword = $XDL::generate_password();
	$password = $XDL->encrypt_password($confirmationPassword);
	$password2 = $_SESSION['users_details']['password'];

	$course = $dataArray["std-course"];
	$year = $dataArray["std-year"];
	$section = $dataArray["std-section"];

	$section = $XDLINE::select("*", "sections_table", "`course_id` = '$course' AND `year` = '$year' AND `section` = '$section'")[0];
	$checkSN = $XDLINE::select("*", "students_table", "students_table.student_number = '$studentNumber'")[0];
	if ($password == $password2) {
		if ($checkSN == "") {
			echo $generatedPassword;
			$_SESSION['newStudentAcc'] = array("username"=>$studentNumber, 
											"password"=>$generatedPassword, 
											"validation"=> $validationNumber,
											"fname" => $dataArray["name-first"],
											"mname" => $dataArray["name-middle"],
											"lname" => $dataArray["name-last"],
											"adviser" => $dataArray["adviser"],
											"section" => $section['section_id']);
		}else {
			echo "STD NO. ALREADY EXIST";
		}
	}else {
		echo "INCORRECT PASSWORD";
	}
	
}

function createStudentAccount(){
	session_start();
	$XDLINE = "XDLINE";
	$XDL = new $XDLINE;	
	$studentNumber = $_SESSION['newStudentAcc']['username'];
	$password = $XDL->encrypt_password($_SESSION['newStudentAcc']['password']);
	$validationNumber = $_SESSION['newStudentAcc']['validation'];
	$fname = $_SESSION['newStudentAcc']['fname'];
	$mname = $_SESSION['newStudentAcc']['mname'];
	$lname = $_SESSION['newStudentAcc']['lname'];
	$section = $_SESSION['newStudentAcc']['section'];
	$adviser = $_SESSION['newStudentAcc']['adviser'];


	

	$addInUsers = $XDL->insert("users_table", array(
				"username" => $studentNumber,
				"password" => $password,
				"account_type" => 'student',
				"first_name" => $fname,
				"last_name" => $lname,
				"middle_name" => $mname), "STUDENT: CREATED SUCCESSFULLY");

	$user = $XDLINE::select("`user_id`", "users_table", "`username` = '$studentNumber'")[0];

	if ($addInUsers == "STUDENT: CREATED SUCCESSFULLY") {
		$addInStudent = $XDL->insert("students_table", array(
				"student_number" => $studentNumber,
				"user_id" => $user['user_id'],
				"section_id" => $section,
				"validation_number" => $validationNumber,
				"adviser_id" => $adviser));

		echo "SUCCESSFULLY GENERATED ACCOUNT";
	}

}

function profilePicture($imageLink){
	session_start();
	$data = file_get_contents($imageLink);
	$filename = hash('MD2', $_SESSION['users_details']['user_id']).'.png';
	$new = '../img/profile/'.$filename;
	file_put_contents($new, $data);

}

	
?>