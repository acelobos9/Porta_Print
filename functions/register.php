<?php
/*
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
*/

include("acelib.php");



	$fName = $_POST["firstName"];
	$lName = $_POST["lastName"];
	$uName = $_POST["userName"];
	$pWord = $_POST["passWord"];
	$cPin = $_POST["clientPin"];
	$result = fetch("clienttbl","*","clientUsername.eq.".$uName."");
	if($row  = mysqli_fetch_array($result)){
		echo "taken";
	}else{
		$values = $uName.','.md5($pWord);
		$columns = "clientUsername,clientPass";
		if(record("clienttbl",$columns,$values)){
			if(record("clientinfo","clientUsername,firstName,lastName",$uName.",".$fName.",".$lName)){
				if(record("clientcredit","clientUsername,clientPin,credits",$uName.",".$cPin.",0")){
				echo 'recorded';		
				}
			
			}else{
				//echo "fail";
			}
			
		}
	}


?>