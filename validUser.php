<?php 
function isValid($login) {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Project";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
     		die("Connection failed: " . $conn->connect_error);
	}

	//Customer parameters
	$relationName="Customer";
	$attribName="cID";
	
	$sql="SELECT * FROM " . $relationName . " WHERE " . $attribName . "=" .$login;
	$result = mysqli_query($conn, $sql);
	if(!$result){
		$relationName="Admin";
		$attribName="aID";
		
		$sql="SELECT * FROM " . $relationName . " WHERE " . $attribName . "=" .$login;
		$result = mysqli_query($conn, $sql);
		
		if(!$result){
			return -1;
		}
		else{
			return 1;
		}
		
	}else{
		return 0;
	}
}

?> 

