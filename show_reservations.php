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

// Query to fetch all reservations
$sql = "SELECT * FROM Reservation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Reservation List</h2><table border='1'><tr><th>ID</th><th>Customer ID</th><th>Vehicle ID</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Total Cost</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['ReservationID']}</td><td>{$row['CustomerID']}</td><td>{$row['VehicleID']}</td><td>{$row['StartDate']}</td><td>{$row['EndDate']}</td><td>{$row['Status']}</td><td>{$row['TotalCost']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
