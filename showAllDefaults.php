<?php
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

$sql = "Select * From DefaultFullInfo";
//$result = $conn->query($sql);
$result=mysqli_query($conn, $sql);

//if ($result->num_rows > 0) {
//if ($result!=false){
if (mysqli_num_rows($result)>0){
	echo"<thead>
			<tr>
				<th>System No.</th> 
				<th>Style</th>
				<th>Weight</th>
				<th>Measurement</th>
				<th>Processor</th>
				<th>Memory</th>
				<th>Storage</th>
				<th>Storage Type</th>
				<th>Price</th>
			</tr>
		</thead>";
	echo "<tbody>";
     // output data of each row
	while($row = $result->fetch_assoc()) {
	$price = $row["chPrice"] + $row["storPrice"] + $row["memPrice"];
	//Not sure if embedding chPrice+storPrice+memPrice here is legal
         echo "<tr><td>" . $row["defaultNo"]. "</td><td>" . $row["style"]. "</td><td>" . $row["weight"].
		 "</td><td>" . $row["measures"]. "</td><td>" . $row["processorSpeed"]. "</td> <td>".$row["memSize"].
		 "</td> <td>".$row["storSize"]. "</td> <td>".$row["storType"]. "</td> <td>".$price."</td></tr>";
     }
     echo "</tbody>";
} else {
     echo "0 results";
}

$conn->close();

?>



</body>
</html>
