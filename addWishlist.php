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
	echo $user;
	echo $itemNumber;
	echo $chWanted;
	echo $memory;
	echo $storage;
	echo $diskSize;
	//echo $user;
	/*$sql = "Select cID
					FROM Customer
					WHERE cID =".$_SESSION['use'];

	$result = mysql_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row = $result->fetch_assoc()) {
			$user = $row["cID"];
		//$row = mysql_fetch_array($result);
		//$user=$row['cID'];
		}
	}*/
//isset($_SESSION['use']

			$sqlAdd="insert into WishListItem values(".$user.", '".$itemNumber."', NOW(), '".$chWanted."', ".$memory.", '".$storage."', ".$diskSize.")";
			//$sqlAdd="insert into WishListItem values(".$user.", '".$itemNumber."', DATE_FORMAT(NOW(),'%m-%d-%Y'), '".$chWanted."', ".$memory.", '".$storage."', ".$diskSize.")";
			//$sqlAdd="insert into WishListItems values(".$user.", '".$itemNumber."', '".$date."', '".$chWanted."', ".$memory.", '".$storage."', ".$diskSize.",)";
			$result=mysqli_query($conn, $sqlAdd);
				echo "Added to your wishlist!";




	$conn->close();
}



?>
