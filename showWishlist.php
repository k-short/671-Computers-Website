
<?php

//test code
//$testCID='12345';

//echo showWishlist("12345");
//end of test code
function showWishlist($thisCustomer){

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
//$user=$_SESSION['use'];
//echo $user;


//$thisCustomer=$user;

$sql="Select W.dateAdded, W.memSize, W.storType, W.storSize, W.itemNo, C.chNumber, C.measures, C.processorSpeed, C.style, C.weight, M.memPrice, S.storPrice, C.chPrice
	From wishlistItem W, Chassis C, Memory M, Storage S
	Where W.cID='".$thisCustomer."' AND
	C.chNumber=W.chNumber AND
	M.memSize=W.memSize AND
	S.storSize=W.storSize AND S.storType=W.storType";
$result=mysqli_query($conn, $sql);
//$result = $conn->query($sql);
if (mysqli_num_rows($result)>0){
//if($result->num_rows > 0){

	echo "<thead>
		<tr>
			<th>Date Added</th>
			<th>Item No.</th>
			<th>Chassis</th>
			<th>Style</th>
			<th>Processor</th>
			<th>Weight</th>
			<th>Measurement</th>
			<th>Memory</th>
			<th>Storage Size</th>
			<th>Storage Type</th>
			<th>Current Price</th>
		</tr>
	</thead>";

		 // output data of each row
	while($row = $result->fetch_assoc()) {
		$totalPrice = $row["chPrice"] + $row["storPrice"] + $row["memPrice"];
		$dateAdded=$row["dateAdded"];
			echo
			"<tbody><tr><td>" . $dateAdded . "</td>
			<td>" . $row["itemNo"] . "</td>
			<td>" . $row["chNumber"] . "</td>
			<td>" . $row["style"] . "</td>
			<td>" . $row["processorSpeed"] . "</td>
			<td>" . $row["weight"] . "</td>
			<td>" . $row["measures"] . "</td>
			<td>" . $row["memSize"] ."</td>
			<td>" . $row["storSize"] . "</td>
			<td>" . $row["storType"] . "</td>
			<td>" . $totalPrice . "</td></tr></tbody>";
  }	//end of while loop

} else {
     echo "0 results";
	}

$conn->close();
}
?>
