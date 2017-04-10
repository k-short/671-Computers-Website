<?php
//function isValid($loginType, $username) {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Project";
	


	//variables for testing
	$loginType="Admin";
	$login="12345";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
     		die("Connection failed: " . $conn->connect_error);
	}

	if ($loginType=="Admin"){
		//$sql="EXISTS (Select * From admin Where aID==".$username.")"
		$relationName="admin";
		$attribName="aID";
	}

	else	//login type==user
	{
		$relationName="Customer";
		$attribName="cID";
	}	


	$sql="SELECT * FROM " . $relationName . " WHERE " . $attribName . "=" .$login;

	echo $sql;

	$result = mysqli_query($conn, $sql);
	//$result=mysql_query($sql);

	if (mysqli_num_rows($result)  > 0) {
		$validUser=true;
	}
	else{
		$validUser=false;
	}

	//echo $validUser;
	if ($validUser==true){
		echo "User Validated!";
	}

	else{
		echo "Invalid username.";
	}
	//return validUser;
//}


?>
