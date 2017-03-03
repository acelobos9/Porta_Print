<?php

session_start();
//$_SESSION['username'] = "";

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


if(isset($_POST)){
	$q = $_POST["question"];
	$a = $_POST["answer"];
	$t = $_GET["type"]);
	$qn= $_GET["number"];
	$c1 = "";
	$c2 = "";
	$c3 = "";
	$c4 = "";

	$result = fetchRaw("createeam","*","");

	if($t="multipleChoice"){
		$c1 = $_GET["choice1"];
		$c2 = $_GET["choice1"];
		$c3 = $_GET["choice1"];
		$c4 = $_GET["choice1"];
	}

	$sql = "";
	switch ($t) {
		case 'multipleChoice':
			$sql = "";
			break;
		case 'identification':
			# code...
			break;
		case 'truefalse':
			# code...
			break;
		default:
			# code...
			break;
	}

}

?>