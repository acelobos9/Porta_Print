<?php
session_start();
//header('Content-Type: application/json');
//require_once("connection.php");
include("acelib.php");
include("code.php");


if(!empty($_FILES['file']['name'][0])){
	$folder = md5($_SESSION['username']);
	if(!is_dir("../uploads/".$folder)){
		mkdir("../uploads/".$folder,0777,true);
	}
	copy(".htaccess", "../uploads/".$folder."/.htaccess");
	copy("404.html", "../uploads/".$folder."/404.html");
	foreach ($_FILES['file']['name'] as $position => $name) {
		$type = $_FILES["file"]["type"][$position]."";
		//echo "type: $type";
		if(($type == 'application/pdf')){
			$fileName = $_FILES['file']['name'][$position];
				$strID = getCode();
				//echo "$strID";
				$clientUsername = $_SESSION['username'];
				$query=recordCode($clientUsername,$fileName,$strID);
			if((move_uploaded_file($_FILES['file']['tmp_name'][$position], '../uploads/'.$folder."/".$name))&&($query)){
				
				
					echo "success,".$strID.",".$_FILES['file']['name'][$position];
				
					//$uploaded = $uploaded.append($name);

			}else{
				echo "error,".$message.",";
				try{
				unlink('../uploads/'.$folder."/".$name);
				}catch(Exception $error){
					print($error);
				}
			}
		}else{
			echo "format mismatch";
		}
	}

//echo $uploaded;

//echo json_encode($uploaded);

}else{
	echo "empty";
}

function recordCode($user,$file,$code){
$result = record("filedirectory","fileUser,fileName,fileCode",$user.",".$file.",".$code);
if ($result){
return true;
}
}

?>