<?php

function showOrders($user){


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



$sql = "Select P.purchaseID, I.chNumber, I.memSize, I.storSize, I.storType, I.price, I.quantity, P.purchaseDT, I.purchaseStatus, C.style, C.processorSpeed, C.measures, C.weight
	From Purchase P, ItemPurchase I, Chassis C
	Where P.cID='".$user."' AND
  P.purchaseID=I.purchaseID AND
  I.chNumber=C.chNumber";

$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0){

  echo "<thead>
		<tr>
			<th>Purchase Date</th>
      <th>Purchase ID</th>
			<th>Chassis</th>
			<th>Style</th>
			<th>Processor</th>
			<th>Weight</th>
			<th>Measurement</th>
			<th>Memory</th>
			<th>Storage Size</th>
			<th>Storage Type</th>
			<th>Price Per Unit</th>
      <th>Quantity</th>
		</tr>
	</thead>";

  while($row = $result->fetch_assoc()) {

		$dateAdded=$row["purchaseDT"];
			echo
			"<tbody><tr><td>" . $dateAdded . "</td>
			<td>" . $row["purchaseID"] . "</td>
			<td>" . $row["chNumber"] . "</td>
			<td>" . $row["style"] . "</td>
			<td>" . $row["processorSpeed"] . "</td>
			<td>" . $row["weight"] . "</td>
			<td>" . $row["measures"] . "</td>
			<td>" . $row["memSize"] ."</td>
			<td>" . $row["storSize"] . "</td>
			<td>" . $row["storType"] . "</td>
      <td>" . $row["price"] . "</td>
      <td>" . $row["quantity"] . "</td></tr></tbody>";
  }	//end of while loop

} else {
     echo "0 results";
	}







$conn->close();
}

?>
