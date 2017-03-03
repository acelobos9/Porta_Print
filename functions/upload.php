<?php
session_start();
header('Content-Type: application/json');




if(!empty($_FILES['file']['name'][0])){
	foreach ($_FILES['file']['name'] as $position => $name) {
		//echo $name;
		$folder = md5($_SESSION['username']);
		if(is_dir("../uploads/".$folder)){

		}else{
			mkdir("../uploads/".$folder,0777,true);
		}

		if(move_uploaded_file($_FILES['file']['tmp_name'][$position], '../uploads/'.$folder."/".$name)){
			echo "success,".uniqid().$_FILES['files'][''];	//$uploaded = $uploaded.append($name);;
		}
	}
}
//echo $uploaded;

//echo json_encode($uploaded);
?>