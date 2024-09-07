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

// Query to fetch all vehicles
$sql = "SELECT v.VehicleID, v.Make, v.Model, v.Year, v.LicensePlate, vt.TypeName, v.Status, v.Location
        FROM Vehicle v
        JOIN VehicleType vt ON v.TypeID = vt.TypeID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Vehicle List</h2><table border='1'><tr><th>ID</th><th>Make</th><th>Model</th><th>Year</th><th>License Plate</th><th>Type</th><th>Status</th><th>Location</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['VehicleID']}</td>
                <td>{$row['Make']}</td>
                <td>{$row['Model']}</td>
                <td>{$row['Year']}</td>
                <td>{$row['LicensePlate']}</td>
                <td>{$row['TypeName']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['Location']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
