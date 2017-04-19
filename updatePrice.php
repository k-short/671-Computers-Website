<?php

//test code
/*
$testChNumber="L700";
$testMemory=16;
$testStorSize=2000;
$testStorType="SSD";

echo updatePrice($testChNumber, $testMemory, $testStorSize, $testStorType);

 */

function updatePrice($thisChNumber, $thisMemory, $thisStorSize, $thisStorType){
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
/*
	$sqlCH="SELECT chPrice 
		FROM Chassis 
		WHERE chNumber='".$thisChNumber."'";
	$sqlMem="SELECT memPrice
		FROM memory
		Where memSize=".thisMemory;
	$sqlStor="SELECT storPrice 
		FROM Storage 
		WHERE storSize=".thisStorSize." AND 
			storType='".thisStorType."'";

	$resultCH=$mysqli_query($conn, $sqlCH);
	$resultMem=$mysqli_query($conn, $sqlMem);
	$resultStor=$mysqli_query($conn, $sqlStor);
*/

	$sql="SELECT chPrice, memPrice, storPrice 
		FROM Chassis, Memory, Storage
		WHERE chNumber='".$thisChNumber."' AND
		memSize=".$thisMemory." AND
		storType='".$thisStorType."'";

	//result should be one row with three items

	$result=mysqli_query($conn, $sql);
	//while loop used b/c I'm copying other files and not familiar with php functions
	while($row = $result->fetch_assoc()) {
		$totalPrice = $row["chPrice"] + $row["storPrice"] + $row["memPrice"];
	}

	return $totalPrice;
}	//end function


?>
