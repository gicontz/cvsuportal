<?php 
/*================================================================================
Plugin Name: XDLINE CRUD
Authors: Gimel C. Contillo, Erwin O. Hayag
Organization: Cross Developers League
Author URI: 
Plugin URI:
Version: 0.9

Table of Contents
# CONNECTION
# READ FUNCTION
	## CHECK ACCOUNT
# DELETE FUNCTION
# UPDATE FUNCTION
# INSERT FUNCTION
	## REGISTER ACCOUNT
	## ACCOUNT INFO
==============================================================================*/

class XDLINE{

	private $accounts_table = "inserttest";

	public $skey = "17"; // you can change it

	public function getskey(){
		return $this->skey;
	}
	/*======================
	# CONNECTION
	=======================*/

	private function xdline_connect($ini_file_dir = "../config.ini"){
		$xdl_db_settings = parse_ini_file($ini_file_dir, true);

			//Initialize Database Configuration
		$dbname = $xdl_db_settings["database"]["db_name"];
		$username = $xdl_db_settings["database"]["username"];
		$password = $xdl_db_settings["database"]["password"];
		$host = $xdl_db_settings["database"]["host"];
		$conn = new mysqli($host, $username, $password, $dbname);
		return $conn;
	}


	/*======================
	# READ FUNCTION

	*************************** SAMPLE SELECT SYNTAX **********************************
	$toSelect = "*";
	$from = "`inserttest`";
	$where = "`id` = 16 OR `id` = 17";
	$result = select($conn, $toSelect, $from, $where);
	while($row = $result->fetch_assoc()) { 
		foreach ($row as $key => $value) {
			echo "<br> Key: ".$key." Value: ".$value;
		}
	}
	*************************** SAMPLE SELECT SYNTAX **********************************
	=======================*/


	public static function select($select, $from, $where, $ini_file_dir = "../config.ini"){	
		$index = 0;
		$where = $where != "" ? "WHERE $where" : $where;
		$sql = "SELECT $select FROM $from ". $where;	
		$result = self::xdline_connect($ini_file_dir)->query($sql);
		if ($result->num_rows > 0) {
			    // output data of each row
			while($row = $result->fetch_assoc()) {		    	
				$out[$index] = $row;
				$index++;
			}
		} else {		    
			$out[0] = "";
		}
		self::xdline_connect($ini_file_dir)->close();
		return $out;
	}


	/*======================
	## CHECK ACCOUNT
	=======================*/

	private function isUsernameExist($username){
		return self::select("username", $this->accounts_table, "username = '$username'") != null;
	}

	/*======================
	# DELETE FUNCTION

	*************************** SAMPLE DELETE SYNTAX **********************************
	$tableName = "inserttest";
	delete($conn, $tableName, 'id', 25);
	*************************** SAMPLE DELETE SYNTAX **********************************
	=======================*/



	public static function delete($tableName, $whereStatement, 
		$success_message = "Deleted Successfully", $error_message = "Cannot Delete Row", $ini_file_dir = "../config.ini"){
		$sql = "DELETE FROM `$tableName` WHERE $whereStatement";
		
		$connection = self::xdline_connect($ini_file_dir);
		$out = $connection->query($sql) === TRUE ? $success_message : $error_message . "<br/>" . $connection->error;
		self::xdline_connect($ini_file_dir)->close();
		return $out;
	}



	/*======================
	# UPDATE FUNCTION

	*************************** SAMPLE UPDATE SYNTAX **********************************
	$tableName = "inserttest";
	$arrayTest = array(
		'fname' => "'Erwin'",
		'lname' => "'Hayag'",
		'facebook' => "'facebook/hayagerwin'"
	);
	update($conn, $tableName, $arrayTest, 'id', 1);
	*************************** SAMPLE UPDATE SYNTAX **********************************
	=======================*/


	public static function update($tableName, $updateArray, $whereStatement, 
		$success_message = "Updated Successfully", $error_message = "Cannot Update Table", $ini_file_dir = "../config.ini"){
		$ind = 0;
		foreach($updateArray as $col => $value) {
			$value = self::isCanParseToInt($value);
			$set = $ind == 0 ? "`".$col."` = ".$value : $set . ", `".$col."` = ".$value;
			$ind++;
		}

		$sql = "UPDATE `$tableName` SET $set WHERE $whereStatement";
		$connection = self::xdline_connect($ini_file_dir);
		$out = $connection->query($sql) === TRUE ? $success_message : $error_message . "<br/>" . $connection->error;
		self::xdline_connect($ini_file_dir)->close();
		return $out;
	}

	/*======================
	# INSERT FUNCTION

	*************************** SAMPLE INSERT SYNTAX **********************************
	$tableName = "inserttest";
	$arrayTest = array(
		'fname' => "'Winner'",
		'lname' => "'Yayyyy'",
		'facebook' => "'zwww.facebook.com/hayagerwins'"
	);
	insert($conn, $tableName, $arrayTest);
	*************************** SAMPLE INSERT SYNTAX **********************************
	=======================*/

	public static function insert($tableName, $insertArray,
		$success_message = "Inserted Successfully", $error_message = "Cannot Insert Row", $ini_file_dir = "../config.ini"){
		$ind = 0;
		foreach($insertArray as $col => $value) {
			$value = self::isCanParseToInt($value);
			$colName = $ind == 0 ? "`".$col."`" : $colName . ", `".$col."`";
			$colValue = $ind == 0 ? $value : $colValue . ", ".$value;
			$ind++;
		}

		$sql = "INSERT INTO `$tableName` ($colName) VALUES ($colValue)";	
		$connection = self::xdline_connect($ini_file_dir);
		$out = $connection->query($sql) === TRUE ? $success_message : $error_message . "<br/>" . $connection->error;
		self::xdline_connect($ini_file_dir)->close();
		return $out;
	}

	/*======================
	## REGISTER ACCOUNT
	=======================*/

	public function register_account($username, $password, $accessibility){
		$key = $password . $this->skey;
		if(!self::isUsernameExist($username)){
			$password = $this->encode($password, $key);
			return self::insert($this->accounts_table, array(
				"username" => $username,
				"password" => $password,
				"access" => $accessibility), "Registered Successfully");
		}else{
			return "Username Already Exist";
		}
	}

	public function decrypt_password($value, $password){
		$key = $password . $this->skey;
		return $this->decode($value, $key);
	}

	public function encrypt_password($password){
		$key = $password . $this->skey;
		return $this->encode($password, $key);
	}

	public function isCanParseToInt($value){			
			$canParsetoInt = strpos($value, '-') != "" ? false : $value != "" && $value != 0 ? ((int) $value / 2) != 0 : false;
			return !$canParsetoInt ? "'". $value ."'" : $value;
	}

    public  function safe_b64encode($string) {
    	$data = base64_encode($string);
    	$data = str_replace(array('+','/','='),array('-','_',''),$data);
    	return $data;
    }

    public function safe_b64decode($string) {
    	$data = str_replace(array('-','_'),array('+','/'),$string);
    	$mod4 = strlen($data) % 4;
    	if ($mod4) {
    		$data .= substr('====', $mod4);
    	}
    	return base64_decode($data);
    }

    public  function encode($value, $key){ 
    	if(!$value){return false;}
    	$text = $value;
    	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    	$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
    	return trim($this->safe_b64encode($crypttext)); 
    }

    public function decode($value, $key){
    	if(!$value){return false;}
    	$crypttext = $this->safe_b64decode($value); 
    	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    	$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
    	return trim($decrypttext);
    }    


	/*======================
	## ACCOUNT INFO
	=======================*/

	public static function getfullname($userArray){
		echo $userArray['first_name'] .  " " . $userArray['last_name'];
	}
}
 ?>