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

$sql = "SELECT * FROM Car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Car ID</th><th>Model</th><th>Manufacturer</th><th>Year Of Make</th><th>Category ID</th><th>Location ID</th><th>Availability Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["CarID"]."</td><td>".$row["Model"]."</td><td>".$row["Manufacturer"]."</td><td>".$row["YearOfMake"]."</td><td>".$row["CategoryID"]."</td><td>".$row
