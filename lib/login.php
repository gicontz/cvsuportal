<?php 

include("XDLINE.php");
$data = $_POST['data'];

if ($data['request_type'] == "request-login") {
	login($data['username'], $data['password']);
}else if($data['request_type'] == "request-generate-student"){
	generateUser($data['studentNumber'], $data['validationNumber'], $data['confirmationPassword']);
}else if($data['request_type'] == "request-confirm-student"){
	echo createStudentAccount() == "1" ? "SUCCESSFULLY GENERATED ACCOUNT" : "0";
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

function generateUser($studentNumber, $validationNumber, $confirmationPassword){
	session_start();
	$XDLINE = "XDLINE";
	$XDL = new $XDLINE;	
	$generatedPassword = $XDL::generate_password();
	$password = $XDL->encrypt_password($confirmationPassword);
	$password2 = $_SESSION['users_details']['password'];

	$checkSN = $XDLINE::select("*", "students_table", "students_table.student_number = '$studentNumber'")[0];
	if ($password == $password2) {
		if ($checkSN == "") {
			echo $generatedPassword;
			$_SESSION['newStudentAcc'] = array("username"=>$studentNumber, "password"=>$generatedPassword, "validation"=> $validationNumber);
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

	$stud_info = $XDL::select("student_number", "students_table", "student_number = $studentNumber")[0];
	if($stud_info == ""):
		$res = $XDL::insert("users_table", array(
			'account_type' => 'student',
			'username' => $studentNumber,
			'password' => $password,
		), "1", "0");

		if($res == "1"):
			$uid = $XDL::select("MAX(user_id)", "users_table", "")[0]["MAX(user_id)"];
			return $XDL::insert("students_table", array(
				'student_number' => $studentNumber,
				'user_id' => $uid,
				'section_id' => 0,
				'validation_number' => $validationNumber
			), "1", "0");
		endif;
		return "0";
	endif;
}


function profilePicture($imageLink){
	session_start();
	$data = file_get_contents($imageLink);
	$filename = hash('MD2', $_SESSION['users_details']['user_id']).'.png';
	$new = '../img/profile/'.$filename;
	file_put_contents($new, $data);

}

?>