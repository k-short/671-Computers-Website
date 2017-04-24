<?php

//test cases

//Case 1--should return "Card Expired."
/*
$testCID="12345";
$testCCNumber="0000111122223333";
$testCardType="Visa";
$testNameOnCard="John Smith";
$testExpYear="2017";
$testExpMonth="03";
$testBillAddr="Whatever";
*/

//Case 2--add card and return card valid
/*
$testCID="12345";
$testCCNumber="0000111122223333";
$testCardType="Visa";
$testNameOnCard="John Smith";
$testExpYear="2017";
$testExpMonth="04";
$testBillAddr="Whatever";
 */

//Case 3--card name mismatch existing--should be invalid
/*
$testCID="12345";
$testCCNumber="0000111122223333";
$testCardType="Visa";
$testNameOnCard="John H. Smith";
$testExpYear="2017";
$testExpMonth="04";
$testBillAddr="Whatever";
 */ 


//echo validateCC($testCID, $testCCNumber, $testCardType, $testNameOnCard, $testExpYear, $testExpMonth, $testBillAddr);

function validateCC($cID, $ccNumber, $cardType, $nameOnCard, $expYear, $expMonth, $billingAddress){

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

	//check expDate
	$firstDayMonth=strtotime($expYear."-".$expMonth."-1");
	$phpExpDate=date("Y-m-t", strtotime($expYear."-".$expMonth."-1"));
	$phpExpDate=strtotime($phpExpDate);
	$lastDayMonth=date("d", $phpExpDate);

	//echo "Exp date: ".$phpExpDate;
	//echo "Month: ".$expMonth;
	//echo "Day: ".$lastDayMonth;

	if ($phpExpDate<time()){
		return "Card expired.";
	}

	
	$sqlCCInfo="Select *
		From CreditCardInfo
		Where cardNumber='".$ccNumber."'";
	
	$resultCCInfo=mysqli_query($conn, $sqlCCInfo);
	//unique ccNumber
	if (mysqli_num_rows($resultCCInfo)==0){
		//add card to database
		$sql="insert into CreditCard values(".$cID.", ".$ccNumber.")";
		$result=mysqli_query($conn, $sql);
		
		/*
		$sql="insert into CreditCardInfo values(
			'".$ccNumber."', 
			'".$cardType."', 
			'".$nameOnCard.",
			 (".$expYear."-".$expMonth."-".$lastDayMonth."),
			'".$billingAddress."')";
		*/
		$sql="insert into CreditCardInfo values(
			'".$ccNumber."', 
			'".$cardType."', 
			'".$nameOnCard."',
			 '".$expYear."-".$expMonth."-".$lastDayMonth."',
			'".$billingAddress."')";
		
		$result=mysqli_query($conn, $sql);		
		return("Card valid.");
	}

	//card number is already in db--ok if other card info matches
	while($row = $resultCCInfo->fetch_assoc()) {
		$sqlCardType = $row["cardType"];
		$sqlNameOnCard=$row["nameOnCard"];
		$sqlExpDate=$row["expDate"];
		$sqlBillingAddr=$row["billingAddress"];
	}

	if (($sqlCardType==$cardType) && ($sqlNameOnCard==$nameOnCard) && (strtotime($sqlExpDate)==$phpExpDate) && ($sqlBillingAddr==$billingAddress)){
		//card valid
		$sql="insert into CreditCard values(".$cID.", ".$ccNumber.")";
		$result=mysqli_query($conn, $sql);
		return("Card valid.");
	}

	return("Card invalid.");	//mismatched card info

}	//end of validateCC function

?>
