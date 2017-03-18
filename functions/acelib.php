<?php
require_once("connection.php");
function nospechar($string){
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // remove special characters
}

function clean($string){
	$string = trim(str_replace(" ","",$string)); // remove spaces
	return $string;
}

function record($tblName,$columns,$values){

	$sqlconnect = dbConnection();
	#split values by comma
	$partsValue = explode(",", clean($values));

	if($columns=="all"){
		$columns == "";
	}else{
		$columns = "(".$columns.")";
	}


	#deconstruct and disect values
	for($i=0;$i<count($partsValue);$i++){
		if(!is_numeric($partsValue[$i])){
			$partsValue[$i] = "'".$partsValue[$i]."'";
		}
	}
	$values="";
	#rebuild and construct values
	for ($i=0; $i < count($partsValue) ; $i++) { 
		if($i==0){
			$values .= $partsValue[$i];
		}else{
			$values .= ",".$partsValue[$i];
		}
		
		
	}
	#echo "<br>".$values;#." + ".$partsValue[$i];
	$query = "INSERT INTO ".$tblName." ".$columns." VALUES (".$values.")";
	//echo "QUERY: ".$query;
	if($sqlconnect->query($query)){
		return true;
	}else{
		$message = $query."";
		return $message;
	}
	mysqli_close($sqlconnect);
}

function fetch($tblName,$columns, $condition){
	$sqlconnect = dbConnection();

	$tblName = clean($tblName);
	$columns = clean($columns);
	$condition = clean($condition);

	
	if($condition == "none" || $condition==""){
		$condition == "";
	}else{
			$parts = explode(".", $condition);

		switch (clean($parts[1])) {
			case 'eq':
				$parts[1] = "=";
				break;
			case 'ne':
				$parts[1] = "!=";
				break;
			case 'gt':
				$parts[1] = ">";
				break;
			case 'lt':
				$parts[1] = "<";
				break;
			case 'gte':
				$parts[1] = ">=";
				break;
			case 'lte':
				$parts[1] = "<=";
				break;
			default:
				break;
		}

		if(is_numeric(($parts[2])))
		{
			#its numerical we're good to go
		}else{
			$parts[2] = "'".$parts[2]."'";
			}
	
	
	$condition = $parts[0].$parts[1].$parts[2];	
	
	}
	if($condition != ""){
		$condition = "WHERE ".$condition;
	}else{
		$condition == "";
	}
	$query = "SELECT ".$columns." from ".$tblName." ".$condition;
	#echo "Query:".$query."<br><br>";
	$result = mysqli_query($sqlconnect, $query) or die($query);
	//echo "Result:".$result;
	mysqli_close($sqlconnect);
	return $result;

}

function fetchRaw($tblName,$columns, $condition){
	$sqlconnect = dbConnection();

	$tblName = clean($tblName);
	$columns = clean($columns);
	
	$query = "SELECT ".$columns." from ".$tblName." WHERE ".$condition;
	#echo "Query:".$query."<br><br>";
	$result = mysqli_query($sqlconnect, $query) or die($query);
	//echo "Result:".$result;
	mysqli_close($sqlconnect);
	return $result;

}
function removeRecord($tblName, $condition){
	$sqlconnect = dbConnection();

	$tblName = clean($tblName);
	$condition = clean($condition);

	
	if($condition == "none" || $condition==""){
		$condition == "";
	}else{
			$parts = explode(".", $condition);

		switch (clean($parts[1])) {
			case 'eq':
				$parts[1] = "=";
				break;
			case 'ne':
				$parts[1] = "!=";
				break;
			case 'gt':
				$parts[1] = ">";
				break;
			case 'lt':
				$parts[1] = "<";
				break;
			case 'gte':
				$parts[1] = ">=";
				break;
			case 'lte':
				$parts[1] = "<=";
				break;
			default:
				break;
		}

		if(is_numeric(($parts[2])))
		{
			#its numerical we're good to go
		}else{
			$parts[2] = "'".$parts[2]."'";
			}
	
	
	$condition = $parts[0].$parts[1].$parts[2];	
	
	}
	if($condition != ""){
		$condition = "WHERE ".$condition;
	}else{
		$condition == "";
	}
	$query = "DELETE FROM ".$tblName." ".$condition;
	#echo "Query:".$query."<br><br>";
	//echo $query;
	$result = mysqli_query($sqlconnect, $query) or die($query);
	mysqli_close($sqlconnect);
	return $result;
}
?>