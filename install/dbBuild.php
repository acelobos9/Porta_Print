<?php

if(isset($_POST)){

$sqlconnect = mysqli_connect($_POST['dbAddress'],$_POST['dbUsername'],$_POST['dbPass']);
echo"+---------------------------------------------------+<br>";
echo"|&nbsp;&nbsp;Welcome to Portaprint Setup &copy;2016<br>";
echo"|&nbsp;&nbsp;by Ace Q. Lobos & Cedrick Acuario<br>";
echo"+---------------------------------------------------+<br>";
echo"-> Configuration started :)<br>";
echo"=============  Connecting To Server  =============<br>";
if($sqlconnect->connect_error){
		#should not be reachable
		echo "WTF!";
	}else{
		#echo "Database Connected";
		echo "-> Database Server Connected.<br>";
		echo "-> Creating Database.<br>";
		$query = "CREATE DATABASE ".$_POST['dbName'];
		mysqli_query($sqlconnect,$query) or die(mysql_error());
		echo "-> Database created!.<br>";
		echo"===========  Creating Database Tables  ===========<br>";
		createTables();
		echo"=========  Saving Administrator Account  =========<br>";
		adminSet();
		
	}
}


 function adminSet(){
	$sqlconnect = dbConnection();
	$query = "INSERT INTO adminTbl (adminUsername, adminPass, adminHint) VALUES ('".$_POST['adminUsername']."','".$_POST['adminPass']."','".$_POST['adminHint']."')";
	$result = $sqlconnect->query($query);
	if($result){
		echo"-> Administrator Settings Saved.<br>";
		echo"-> Account info sent to admin's email.";
	}
mysqli_close($sqlconnect);
}

 function createTables(){
	$sqlconnect = dbConnection();
	
	try{
	$db_Config = file_get_contents('db_Config.txt');
	$rows = explode(";", $db_Config);
	array_shift($rows);
	$info_config[0] = "-> There is an error parsing database configuration<br>";
	echo "-> Reading database configuration file...<br>";
		$n=0;
	
		foreach ($rows as $row => $data) {
			//get row data
			$row_data = explode('->', $data);
			$query = $row_data[1];
			$result = mysqli_query($sqlconnect, $query);
			if($result){
				echo "-> Table ".$row_data[0]. " created successfuly...<br>";
			}else{
				echo "-> Error creating table ".$row_data[0]. ".<br>";
				echo "-> Try restarting installation from the start.<br>";
			}
			$n++;		

		}


	}catch(Exception $ex){
		print("-> Error parsing config...\n$ex");
	}
	mysqli_close($sqlconnect);
}

function dbConnection(){
$sqlconnect = mysqli_connect($_POST['dbAddress'],$_POST['dbUsername'],$_POST['dbPass'],$_POST['dbName']);
return $sqlconnect;
}

?>
