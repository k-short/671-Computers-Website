<?php
function isValid($loginType, $username) {

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

	if ($loginType=="Admin"){
		$relationName="admin";
		$attribName="aID";
	}

	else	//login type==user
	{
		$relationName="Customer";
		$attribName="cID";
	}	
	
	$sql="SELECT * FROM " . $relationName . " WHERE " . $attribName . "=" .$login;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)  > 0) {
		$validUser=true;
	}
	else{
		$validUser=false;
	};

	return validUser;
}


?> 

