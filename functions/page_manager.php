<?php
$page = "";
$pageTitle = "";
$pageMeta = "";
 if(!isset($_GET['p'])){
 	#echo "return to index";
 	
 }else{
 	$page = $_GET['p'];

 	if($page == "" || is_null($page)){
 		header("Location: index.php?p=dashboard");
 	}
 	
 	
 	$result = fetch('pages','*',"pageTitle.eq.$page");
	if($row = mysqli_fetch_array($result))
	{
		$pageTitle = $row['pageTitle'];
		$pageMeta = $row['pageDescription'];
		#echo "Page $page exists. :)";
		if($row['public'] == 0){

			if(validSession($_SESSION['username'])){
				#route to page
				$page = $_GET['p'];
				#header("Location: index.php?p=$page");    
			}else{
				
				//$page = 'login';
				$n = rand(0,2);
				header("Location: login.php?access=$page&&login=".md5("true"+$n)."&&detected=true"."&&key=".md5(rand(213,2138)));
				#echo "<script>alert('Invalid Login. Account is void.');</script>";
			#	echo "Shit man";
			}
		}else{
			$page = $_GET['p'];
			header("Location: index.php?p=$page");
			#header("Location: index.php?p=$page");
			
		}
	}else{
		#echo "Error 404";
		$page = "404";
		#header("Location: index.php?p=$page");
	}
	
 }


?>