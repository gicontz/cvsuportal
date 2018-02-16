<?php 
/**
* Plugin Name: XDLINE CRUD
* Authors: Gimel C. Contillo, Erwin O. Hayag
* Organization: Cross Developers League
* Author URI: 
* Plugin URI:
* Version: 0.9
* @author XDLine CvSU Silang

Table of Contents
# CONNECTION
# READ FUNCTION
	## CHECK ACCOUNT
# DELETE FUNCTION
# UPDATE FUNCTION
# INSERT FUNCTION
	## REGISTER ACCOUNT
	## ACCOUNT INFO
*/

class XDLINE{

	private $accounts_table = "inserttest";

	public $skey = "XDevelopersLeagueDITPortalCvSUSc"; // you can change it

	public function getskey(){
		return $this->skey;
	}

	/**
	* # CONNECTION
	* @param string $ini_file_dir Directory of Configuration File
	* @return mysqli Connection to the MySQL
	*/

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


	/**
	* # READ FUNCTION
	* @param string $select Columns to be Selected ( * if all columns is selected) 
	* @param string $from Table Name
	* @param string $where SQL Condition ("" if no condition)
	* @param string $ini_file_dir Directory of Configuration File
	*/


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


	/**
	* ## CHECK ACCOUNT
	* @param string $username Username to be checked
	*/

	private function isUsernameExist($username){
		return self::select("username", $this->accounts_table, "username = '$username'") != null;
	}

	/**
	* # DELETE FUNCTION
	* @param string $tableName Table Name/s
	* @param string $whereStatement SQL Condition
	* @param string $success_message Prompt if success
	* @param string $error_message Prompt if error
	* @param string $ini_file_dir Directory of Configuration File
	* @return string Either $success_message or $error_message
	*/

	public static function delete($tableName, $whereStatement, 
		$success_message = "Deleted Successfully", $error_message = "Cannot Delete Row", $ini_file_dir = "../config.ini"){
		$sql = "DELETE FROM `$tableName` WHERE $whereStatement";
		
		$connection = self::xdline_connect($ini_file_dir);
		$out = $connection->query($sql) === TRUE ? $success_message : $error_message . "<br/>" . $connection->error;
		self::xdline_connect($ini_file_dir)->close();
		return $out;
	}



	/**
	* # UPDATE FUNCTION
	* @param string $tableName Table Name/s
	* @param associative array $updateArray Array of the column_name => value
	* @param string $whereStatement SQL Condition
	* @param string $success_message Prompt if success
	* @param string $error_message Prompt if error
	* @param string $ini_file_dir Directory of Configuration File
	* @return string Either $success_message or $error_message
	*/


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

	/**
	* # INSERT FUNCTION
	* @param string $tableName Table Name/s
	* @param associative array $insertArray Array of the column_name => value
	* @param string $whereStatement SQL Condition
	* @param string $success_message Prompt if success
	* @param string $error_message Prompt if error
	* @param string $ini_file_dir Directory of Configuration File
	* @return string Either $success_message or $error_message
	*/

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

	/**
	* ## REGISTER ACCOUNT
	* @param string $username Username
	* @param string $password Password
	* @param string $accessibility Accessibility
	* @return string Status of Registration
	*/

	public function register_account($username, $password, $accessibility){
		$temporary_salt = $password.$this->skey;
		$key = substr($temporary_salt, 0, 32);
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
		$temporary_salt = $password.$this->skey;
		$key = substr($temporary_salt, 0, 32);
		return $this->decode($value, $key);
	}

	public function encrypt_password($password){
		$temporary_salt = $password.$this->skey;
		$key = substr($temporary_salt, 0, 32);
		return $this->encode($password, $key);
	}

	private function isCanParseToInt($value){			
			$canParsetoInt = strpos($value, '-') != "" ? false : $value != "" && $value != 0 ? ((int) $value / 2) != 0 : false;
			return !$canParsetoInt ? "'". $value ."'" : $value;
	}

    private  function safe_b64encode($string) {
    	$data = base64_encode($string);
    	$data = str_replace(array('+','/','='),array('-','_',''),$data);
    	return $data;
    }

    private function safe_b64decode($string) {
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