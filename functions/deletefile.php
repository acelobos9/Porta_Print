<?php
session_start();
require_once("acelib.php");
if(isset($_POST['filename'])){
	$filename = $_POST['filename'];
	$code = $_POST['code'];
	$user = $_SESSION['username'];
	$url = "../uploads/".md5($user)."/".$_POST['filename']."";
	//echo "hello: $url";
	$result = removeRecord("filedirectory","fileCode.eq.$code");
	if($result){
		unlink($url);
		echo "removed";
	}else{
		echo "Error:".$result;
	}

}
?>