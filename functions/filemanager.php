<?php

require("acelib.php");

function getFileCode($name){
$result = fetchraw("filedirectory","*","fileName = '".$name."' && fileUser='".$_SESSION['username']."'");
$row = mysqli_fetch_array($result);

if($row){
	
return $row['fileCode'];
}

}
?>