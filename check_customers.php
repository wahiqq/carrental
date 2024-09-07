<?php
// Database credentials
$servername = "localhost";
$username = "root";       
$password = "924470";      
$dbname = "car_rental_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all customers
$sql = "SELECT * FROM Customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Customer List</h2><table border='1'><tr><th>ID</th><th>FullName</th><th>Address</th><th>Phone Number</th><th>Email</th><th>License Number</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['CustomerID']}</td><td>{$row['FullName']}</td><td>{$row['Address']}</td><td>{$row['PhoneNumber']}</td><td>{$row['Email']}</td><td>{$row['LicenseNumber']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
