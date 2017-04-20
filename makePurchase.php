
<?php

include 'updatePrice.php';
//test code
$testCustomer="12345";
$testCCNumber="0000111122223333";
$testCHNumber="L700";
$testMemory=16;
$testStorSize=1000;
$testStorType="SSD";
$testQuantity=2;

makePurchase($testCustomer, $testCCNumber, $testCHNumber, $testMemory, $testStorSize, $testStorType, $testQuantity);

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

	//check if card exists and valid number
	
	//check that card is not expired
	/*
	$cardSQL="Select expDate 
		From CreditCard, CreditCardInfo
		Where '" .$thisCustomer."'=CreditCard.cID AND
			'".$cardNumber."'=CreditCard.cardNumber AND
			CreditCard.cardNumber=CreditCardInfo.cardNumber";

	$cardResult=mysqli_query($conn, $cardSQL);
	//should be single row with exp date
	while($row = $cardResult->fetch_assoc()) {
		$expDate = $row["expDate"];
	}
	
	//if expDate is before today
	if ($expDate<getDate()){
		return("Credit Card expired.");
	}

	*/
	//Check inventory levels
	//Check memory
	$sqlMEM="Select memInventory
		From Memory
		Where memSize=".$thisMemory;
	
	$result=mysqli_query($conn, $sqlMEM);

	while($row = $result->fetch_assoc()) {
		$memInventory = $row["memInventory"];
	}

	//check Chassis
	$sqlCH="Select chInventory
	From Chassis
	Where chNumber='".$thisChNumber."'";
	
	$result=mysqli_query($conn, $sqlCH);

	while($row = $result->fetch_assoc()) {
		$chInventory = $row["chInventory"];
	}
	
	//check storage
	$sqlSt="Select storInventory
	From Storage
	Where storSize=".$thisStorSize." AND storType='".$thisStorType."'";
	
	$result=mysqli_query($conn, $sqlSt);

	while($row = $result->fetch_assoc()) {
		$storInventory = $row["storInventory"];
	}

	if (($memInventory < $quantity) || ($chInventory < $quantity) || ($storInventory<$quantity)){
		return ("One of more of the components you require is not available.  Please try again later.");
	}

	//CC is valid and inventory is available--purchase can go through
	//decrement inventories
	
	//update purchase relations

	$sqlCount="Select * from itemPurchase";
	$resultCount=mysqli_query($conn, $sqlCount);
	$purchaseID=(mysqli_num_rows($resultCount))+1;
	$status="Processing.";

	$unitPrice=updatePrice($thisChNumber, $thisMemory, $thisStorSize, $thisStorType);
	$dateTime=time();
	echo $dateTime;
	//$sqlCC="insert into creditcard values(12345, 0000111122223333)";
	//$result=mysqli_query($conn, $sqlCC);
	$sqlItemPurchase="insert into ItemPurchase values('".$purchaseID."', '".$thisChNumber."', ".$thisMemory.", ".$thisStorSize.", '".$thisStorType."', ".$unitPrice.", ".$quantity.", '".$status."')";
	//$sqlItemPurchase="insert into itempurchase values('2', 'L700', 16, 1000, 'SSD', 500, 2, 'Processing')";
	$result=mysqli_query($conn, $sqlItemPurchase);
	
	//$sqlCheckItemPurchase="Select * From itemPurchase";
	//$result=mysqli_query($conn, $sqlCheckItemPurchase);
	//if (mysqli_num_rows($result)>0){echo "Items added";}


	$sqlAdd="insert into purchase values('".$thisCustomer."', ".$dateTime.", ".$purchaseID.", '".$ccNumber."')";
	$result=mysqli_query($conn, $sqlAdd);
	echo ("Purchase succesful!");
}	//end function


?>

