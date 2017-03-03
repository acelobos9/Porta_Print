<?php

if(isset($_POST)){
	$digest = $_POST['panel'];
	$panel = explode("-", $digest);
	if($_SESSION['userType']=="student"){
	switch ($panel[1]) {
		case "1":
			#require("../pages/dashboard.php");
			$file = file_get_contents("../pages/dashboard.php");
			echo "<br><br><h2>Dashboard</h2> $file";
			break;
		case "2":
			$file = file_get_contents("../pages/exams.php");
			echo "<br><br><h2>Exams</h2> $file";
			break;
		case "3":
			$file = file_get_contents("../pages/grades.php");
			echo "<br><br><h2>Grades</h2> $file";
			break;
		case "4":
			$file = file_get_contents("../pages/account.php");
			echo "<br><br><h2>Account</h2> $file";
			break;
		default:
			$file = file_get_contents("../pages/dashboard.php");
			echo "<br><br><h2>Dashboard</h2> $file";
			break;
	}
	}else{
		
	}
}
?>