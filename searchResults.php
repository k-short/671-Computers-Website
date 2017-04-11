<!DOCTYPE html>
<html>
<head>
<title>Show Search Results</title>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

<h1>Search Results</h1>

<?php
function showDefaults($priceWanted, $styleWanted, $weightWanted, $memoryWanted, $speedWanted, $sizeWanted, $storTypeWanted, $storWanted){
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

$sql = "Select *
	From DefaultFullInfo
	Where 	style=".$styleWanted.
	"AND processorSpeed>=".$speedWanted.
	"AND measures<=".$sizeWanted.
	"AND weight<=".$weightWanted.
	"AND storType=".$storTypeWanted.
	"And storSize>=".$storWanted.
	"AND memSize>=".$memWanted.
	"AND (chPrice + storPrice + memPrice) <=".$priceWanted.";";
//$result = $conn->query($sql);
$result=mysqli_query($conn, $sql);

//if ($result->num_rows > 0) {
if ($result!=false){
	//echo "<table><tr><th>ID</th><th>Customers</th></tr>";
	echo"<table><tr> <th>Item Number</th> <th>Style</th> <th>Weight<th/> <th>Measurement</th> <th>Processor</th> <th>Memory</th> <th>Storage</th> <th>Storage Type</th> <th>Price</th> </tr>";  
     // output data of each row
	while($row = $result->fetch_assoc()) {
	//Not sure if embedding chPrice+storPrice+memPrice here is legal	
         echo "<tr><td>" . $row["defaultNo"]. "</td><td>" . $row["style"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["measures"]. "</td><td>" . $row["processorSpeed"]. "</td> <td>".$row["memSize"]."</td> <td>".$["storSize"]. "</td> <td>".["storType"]. "</td> <td>".["chPrice + storPrice + memPrice"] ."</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
 
$conn->close();
}
?>  



</body>
</html>