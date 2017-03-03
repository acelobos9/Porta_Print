<?php

if(isset($_POST)){
$dbAddress =  $_POST['dbAddress'];
$dbUsername =  $_POST['dbUsername'];
$dbPass =  $_POST['dbPass'];
$sqlconnect = mysqli_connect($dbAddress,$dbUsername,$dbPass);

if($sqlconnect->connect_error){
		die("Connection failed".$connection->connect_error);
		echo"dbNotConnectedxyz";
	}else{
		#echo "Database Connected";
		echo"dbConnectedxyz";
	}
}
?>