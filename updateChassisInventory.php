<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

$chassis = htmlspecialchars($_GET["chassisNo"]);
$inventory = htmlspecialchars($_GET["newInv"]);

//Check to make sure a number was passed in for inventory update value.
if(!is_numeric($inventory)){
  echo "Inventory field is invalid";
  return;
} else if($inventory < 0){
  echo "Inventory field is invalid.";
  return;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE chassis SET chInventory = '".$inventory."' WHERE chNumber = '".$chassis."'";

$result=mysqli_query($conn, $sql);
if($conn->affected_rows < 1){
  echo "Invalid chassis number.";
}else{
  echo "Inventory updated.";
}

$conn->close();
?>
