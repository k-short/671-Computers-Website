<?php

  $userID = htmlspecialchars($_GET["userID"]);
  $userName = htmlspecialchars($_GET["userName"]);
  $userEmail = htmlspecialchars($_GET["userEmail"]);
  $userPhone = htmlspecialchars($_GET["userPhone"]);
  $userMailAdd = htmlspecialchars($_GET["userMailAdd"]);

  if($userID == "" | $userName == "" | $userEmail == "" | $userPhone == "" | $userMailAdd == ""){
    echo "Information field(s) left empty.  Please fill in all fields.";
    return;
  }

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

  $sqlAdd="INSERT INTO customer VALUES ('".$userID."', '".$userName."', '".$userEmail."', '".$userPhone."', '".$userMailAdd."')";
	$result=mysqli_query($conn, $sqlAdd);

  if($conn->affected_rows < 1){
    echo "Invalid information.";
  }else{
    echo "User account created.";
  }

	$conn->close();
?>
