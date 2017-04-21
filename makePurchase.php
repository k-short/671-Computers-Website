

<?php

include 'updatePrice.php';
//test code
/*
$testCustomer="12345";
$testCCNumber="0000111122223333";
$testCHNumber="L700";
$testMemory=16;
$testStorSize=1000;
$testStorType="SSD";
$testQuantity=2;

makePurchase($testCustomer, $testCCNumber, $testCHNumber, $testMemory, $testStorSize, $testStorType, $testQuantity);
*/
function makePurchase($thisCustomer, $ccNumber, $thisChNumber, $thisMemory, $thisStorSize, $thisStorType, $quantity){
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

	//Check CC info

	//Check inventory levels

	//CC is valid and inventory is available--purchase can go through

	//decrement inventories
	
	//update purchase relations
	$sqlCount="Select * From ItemPurchase";
	$resultCount=mysqli_query($conn, $sqlCount);
	$purchaseID=(mysqli_num_rows($resultCount))+1;

	$unitPrice=updatePrice($thisChNumber, $thisMemory, $thisStorSize, $thisStorType);
	$status="Processing";
	
	$sqlItemPurchase="insert into ItemPurchase values(
		'".$purchaseID."', 
		'".$thisChNumber."', 
		".$thisMemory.", 
		".$thisStorSize.", 
		'".$thisStorType."', 
		".$unitPrice.", 
		".$quantity.", 
		'".$status."')";


	$result=mysqli_query($conn, $sqlItemPurchase);

	$sqlPurchase="insert into purchase values(
		'".$thisCustomer."', 
		Now(), 
		'".$purchaseID."', 
		'".$ccNumber."')";

	$result=mysqli_query($conn, $sqlPurchase);

}	//end function


?>

