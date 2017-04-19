
<?php

//test code
//$testCID='12345';

echo showWishlist($testCID);
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

$sql = "Select W.dateAdded, W.memSize, W.storType, W.storSize, W.itemNo
		C.chNumber, C.Measures, C.processorSpeed, C.style, C.weight, 
      		M.memPrice, S.storPrice, C.chPrice	
	From wishlistItem W, chassis C, memory M, storage S
	Where W.cID='".$thisCustomer." AND 
	C.chNumber=W.chNumber AND 
	M.memSize=W.memSize AND 
	S.storSize=W.storSize AND S.storType=W.storType";

//$result=mysqli_query($conn, $sql);
$result = $conn->query($sql);
//if (mysqli_num_rows($result)>0){
if($result->num_rows > 0){

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
			<th>Storage Type</th>
			<th>Storage Size</th>
			<th>Current Price</th>
		</tr>
	</thead>";

		 // output data of each row
	while($row = $result->fetch_assoc()) {
		$totalPrice = $row["chPrice"] + $row["storPrice"] + $row["memPrice"];
		$dateAdded=date("Y/m/d", $row["dateAdded"]);
			echo 
			"<tr><td>" . $dateAdded . "</td>
			<td>" . $row["itemNo"] . "</td>
			<td>" . $row["chNumber"] . "</td>
			<td>" . $row["style"] . "</td>
			<td>" . $row["processorSpeed"] . "</td>
			<td>" . $row["weight"] . "</td>
			<td>" . $row["measures"] . "</td>
			<td>" . $row["memSize"] ."</td>
			<td>" . $row["storSize"] . "</td>
			<td>" . $row["storType"] . "</td>
			<td>" . $totalPrice . "</td></tr>";
  }	//end of while loop
     echo "</table>";
} else {
     echo "0 results";
	}

$conn->close();
}
?>
