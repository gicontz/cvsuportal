<?php 
	
include("XDLINE.php");
$data = $_POST['data'];

if ($data['request_type'] == "request-login") {
	login($data['username'], $data['password']);
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


?>