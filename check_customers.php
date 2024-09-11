<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>CustomerID</th>
    <th>FullName</th>
    <th>PhoneNo</th>
    <th>Email</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["CustomerID"]."</td>
        <td>".$row["FullName"]."</td>
        <td>".$row["PhoneNo"]."</td>
        <td>".$row["Email"]."</td>
        <td>".$row["Address"]."</td>
        <td>".$row["City"]."</td>
        <td>".$row["State"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
