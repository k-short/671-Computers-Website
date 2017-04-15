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

$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

/*if ($result->num_rows > 0) {
     echo "<table><tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Phone</th> <th>Mailing Address</th> </tr>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["cID"]. "</td><td>" . $row["cName"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["mailingAddress"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}*/

if ($result->num_rows > 0) {
     echo "<thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Mailing Address</th>
                </tr>
              </thead>";
	echo "<tbody>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["cID"]. "</td><td>" . $row["cName"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["mailingAddress"]. "</td></tr>";
     }
	 echo "</tbody>";
     //echo "</table>";
} else {
     echo "0 results";
}


$conn->close();
?>  



</body>
</html>