<?php
include("../functions/acelib.php");

if(isset($_POST["register"])){
	$fName = $_POST["firstName"];
	$lName = $_POST["lastName"];
	$uName = $_POST["userName"];
	$pWord = $_POST["passWord"];

	$result = fetch("clienttbl","*","clientUsername.eq.$uName");
	if($result){
		echo "taken";
	}else{
		$values = $uName.','.md5($pWord);
		$columns = "clientUsername,clientPass";
		if(record("clienttbl",$columns,$values)){
			if(record("clientinfo","firstName,lastName","'".$fName."','".$lName."'")){
			echo 'Data recorded!';	
			}else{
				echo "fail";
			}
			
		}
	}

}
?>