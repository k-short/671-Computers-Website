<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

$storage = htmlspecialchars($_GET["storage"]);
$type = htmlspecialchars($_GET["type"]);
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

$sql = "UPDATE storage SET storInventory = '".$inventory."' WHERE storSize = '".$storage."' AND storType = '".$type."'";

$result=mysqli_query($conn, $sql);

if($conn->affected_rows < 1){
  echo "Invalid storage size and/or type.";
  return;
}else{
  if($inventory < 50){
    echo "Inventory updated.<br>Storage inventory is getting low!";
    return;
  }else{
    echo "Inventory updated.";
    return;
  }
}

$conn->close();
?>
