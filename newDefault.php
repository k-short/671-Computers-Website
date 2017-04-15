<!--<!DOCTYPE html>
<html>
<head>
<title>Add new Default System</title>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

<h1>Search Results</h1> -->

<?php

function addDefault($chWanted, $memoryWanted, $storTypeWanted, $storWanted){ 


	//hard coded values for testing
	/*
$chWanted="L700";
$storTypeWanted="SSD";
$storWanted=1600;
$memoryWanted=4;
	 */
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

//check if system already exists

$sql = "Select *
	From DefaultSystem
	Where chNumber='".$chWanted."'".
	" AND storType='".$storTypeWanted."'".
	" AND storSize>=".$storWanted.
	" AND memSize>=".$memoryWanted;   
//$result = $conn->query($sql);
$result=mysqli_query($conn, $sql);


if (mysqli_num_rows($result)>0){
	echo "A default system already exists with that configuration!";
} 
else {
	//create item number for new system; make sure it doesn't conflict
	//add new system
	$sqlCount="Select * from DefaultSystem";
	$resultCount=mysqli_query($conn, $sqlCount);
	$itemNumber=(mysqli_num_rows($resultCount))+1;

	$sqlAdd="insert into DefaultSystem values('".$itemNumber."', '".$chWanted."', '".$storTypeWanted."', ".$storWanted.", ".$memoryWanted.")";
	$result=mysqli_query($conn, $sqlAdd);
     echo "New system added with item number " . $itemNumber.".";
}
 
$conn->close();
}
?>  



</body>
</html>
