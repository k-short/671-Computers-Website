
<?php

include 'updatePrice.php';
include 'validateCC.php';
//test code
/*
$testCustomer="12345";
$testCCNumber="0000111122223333";
$testCHNumber="L700";
$testMemory=16;
$testStorSize=1000;
$testStorType="SSD";
$testQuantity=250;

 echo makePurchase($testCustomer, $testCCNumber, $testCHNumber, $testMemory, $testStorSize, $testStorType, $testQuantity);
*/
function makePurchase($thisCustomer, $ccNumber, $cardType, $nameOnCard, $expYear, $expMonth, $billingAddress, $thisChNumber, $thisMemory, $thisStorSize, $thisStorType, $quantity){
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
	$ccStatus = validateCC($thisCustomer, $ccNumber, $cardType, $nameOnCard, $expYear, $expMonth, $billingAddress);

	if ($ccStatus!="Card valid.")
	{
		return $ccStatus;
	}

	//Check inventory levels
	//decrement inventories
	$memInventory;
	$chInventory;
	$storInventory;

	$sql=	"Select memInventory
		From memory
		Where memSize=".$thisMemory;
	$result=mysqli_query($conn, $sql);
	while($row = $result->fetch_assoc()) {
		$memInventory = $row["memInventory"];
	}

	$sql=	"Select chInventory
		From Chassis
		Where chNumber='".$thisChNumber."'";
	$result=mysqli_query($conn, $sql);
	while($row = $result->fetch_assoc()) {
		$chInventory = $row["chInventory"];
	}

	$sql=	"Select storInventory
		From Storage
		Where storSize=".$thisStorSize." AND storType='".$thisStorType."'";
	$result=mysqli_query($conn, $sql);
	while($row = $result->fetch_assoc()) {
		$storInventory = $row["storInventory"];
	}

	$memNeeded=$quantity-$memInventory;
	$storNeeded=$quantity-$storInventory;
	$chNeeded=$quantity-$chInventory;

	if(($memNeeded>0) || ($storNeeded>0) || ($chNeeded>0)){
		if ($memNeeded<0) $memNeeded=0;
		if ($storNeeded<0) $storNeeded=0;
		if ($chNeeded<0) $chNeeded=0;

		return("We have insufficient parts for your order.  To fill your order, we need ".$memNeeded." more memory units, ".$storNeeded." more storage units, and ".$chNeeded." more chassies.  Please try again with a different or smaller order.");
	}

	//if we have enough of all parts, update inventory
	$newMem=$memInventory-$quantity;
	$newStor=$storInventory-$quantity;
	$newCh=$chInventory-$quantity;

	$sqlUpdate=	"Update Memory
		Set memInventory=".$newMem."
		Where memSize=".$thisMemory;
	$result=mysqli_query($conn, $sqlUpdate);

	$sqlUpdate="Update Chassis
		Set chInventory=".$newCh."
		Where chNumber='".$thisChNumber."'";
	$result=mysqli_query($conn, $sqlUpdate);

	$sqlUpdate=	"Update Storage
		Set storInventory=".$newStor."
		Where storSize=".$thisStorSize." AND storType='".$thisStorType."'";
	$result=mysqli_query($conn, $sqlUpdate);

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
	return("Purchase Successful!");
}	//end function


?>
