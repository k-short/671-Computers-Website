<?php

function addWishlist($itemNumber, $chWanted, $memory, $storage, $diskSize){

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
	$user=$_SESSION['use'];

			$sqlAdd="insert into WishListItem values(".$user.", '".$itemNumber."', NOW(), '".$chWanted."', ".$memory.", '".$storage."', ".$diskSize.")";
			//$sqlAdd="insert into WishListItem values(".$user.", '".$itemNumber."', DATE_FORMAT(NOW(),'%m-%d-%Y'), '".$chWanted."', ".$memory.", '".$storage."', ".$diskSize.")";
			$result=mysqli_query($conn, $sqlAdd);
				echo "Added to your wishlist!";

	$conn->close();
}



?>
