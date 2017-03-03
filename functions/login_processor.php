<?php
session_start();
//$_SESSION['username'] = "";W

function dbConnection(){

	try{
	$config_file = file_get_contents('../config.txt');
	$rows = explode("\n", $config_file);
	array_shift($rows);
	$info_config[0] = "There is an error parsing config.txt";

		$n=0;
		foreach ($rows as $row => $data) {
			//get row data
			$row_data = explode(': ', $data);
			$info_config[$n] = $row_data[1];
			$n++;
		}

			#--Configuration Variables--#
			$CompanyName = clean($info_config[0]);
			$dbName =  clean($info_config[1]);
			$dbAddress =  clean($info_config[2]);
			$dbUserName =  clean($info_config[3]);
			$dbPass =  $info_config[4];
			

			#--End of Configuration Variables--#
			if($dbPass==null){
				$dbPass="";
			}

			#echo "CompanyName:".$CompanyName;
			#echo "Database:".$dbPass;
	}catch(Exception $ex){
		print("Error parsing config.\n$ex");
	}

	#Database Connection
	#parseConfig();
	$sqlconnect = mysqli_connect($dbAddress,$dbUserName,$dbPass,$dbName);
	#$sqlselect = mysql_select_db($dbName);
	#mysqli_select_db($sqlconnect, $dbName);

	if($sqlconnect->connect_error){
		die("Connection failed".$connection->connect_error);

	}else{
		#echo "Database Connected";
	}

	return $sqlconnect;

}

require('acelib.php');
//require('settings.php');

$username = 'demouser';
$password = 'demopass';
if (isset($_POST)) { // if ajax request submitted
    $post_username = $_POST['username'];// the ajax post username
    $post_password = $_POST['password'];// the ajax post password
    try{
    	
    		$result = fetch("clienttbl","*","clientUsername.eq.$post_username");
    	
	
	$row = mysqli_fetch_array($result);
	if($row){
		
		$username = $row['clientUsername'];
		$password = $row['clientPass'];
		
	}else{

	}
	}catch(Exception $er){

	}
		
	if ($username == $post_username  && $password == md5($post_password)){ 

    	// if the username and password are right
    	$_SESSION['username'] = $username; // define a session variable
     	// return a value for the ajax query
    	echo "valid";
    	//return 1;
	}else{
		echo "invalid";
	}
    
}

?>