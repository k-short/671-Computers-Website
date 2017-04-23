<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

$inventoryType = htmlspecialchars($_GET["inventoryType"]);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "Select *
	      From ".$inventoryType;
//'".$inventoryType."''"

$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0){
  if($inventoryType == "Chassis"){
    echo "<caption>Chassis Inventory</caption>";
	   echo "<thead>
		   <tr>
			    <th>Chassis No.</th>
			    <th>Style</th>
			    <th>Processor (GHz)</th>
			    <th>Measurement (in)</th>
			    <th>Weight (lbs)</th>
			    <th>Inventory units</th>
		   </tr>
	   </thead>";
     echo "<tbody>";
		 // output data of each row
	    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["chNumber"] . "</td><td>" . $row["style"] . "</td><td>" . $row["processorSpeed"] .
		       "</td><td>" . $row["measures"] . "</td><td>" . $row["weight"] . "</td><td>".$row["chInventory"]."</td></tr>";
     }
     echo "</tbody>";
   }
   else if ($inventoryType == "Memory"){
     echo "<caption>Memory Inventory</caption>";
     echo "<thead>
       <tr>
          <th>Memory Size (GB)</th>
          <th>Inventory Units</th>
       </tr>
     </thead>";
     echo "<tbody>";
     // output data of each row
      while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["memSize"] . "</td><td>" .$row["memInventory"]."</td></tr>";
     }
     echo "</tbody>";
   }
   else if($inventoryType == "Storage"){
     echo "<caption>Storage Inventory</caption>";
     echo "<thead>
		   <tr>
			    <th>Storage Size (GB)</th>
			    <th>Type</th>
			    <th>Inventory Units</th>
		   </tr>
	   </thead>";
     echo "<tbody>";
		 // output data of each row
	    while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["storSize"] . "</td><td>" . $row["storType"] . "</td><td>" .$row["storInventory"]."</td></tr>";
     }
     echo "</tbody>";
   }
} else {
     echo "0 results";
	}

$conn->close();
?>
