<?php
session_start();
if(isset($_SESSION['username'])){
#	print($_SESSION['username']);
	if(validSession($_SESSION['username'])){

	}else{
		if(isset($_GET['p'])){

		header("Location: login.php?access=$page")	;
		}else{

		#header("Location: login.php?access=dashboard")	;
		}
	}
}
function validSession($username){
	$result = fetch('user_student','*',"username.eq.$username");
	if($row  = mysqli_fetch_array($result)){
		$_SESSION['userType'] = "student";
	return true;	
	}else{
		$result = fetch('user_mentor','*',"username.eq.$username");
		if($row  = mysqli_fetch_array($result)){
			$_SESSION['userType'] = "faculty";
			return true;
		}else{
			return false;
		}
	}
	
}
function endSession(){
	session_destroy();
}
?>