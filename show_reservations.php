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

$sql = "SELECT * FROM Booking";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>BookingID</th>
    <th>BookingDate</th>
    </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["BookingID"]. "</td>
        <td>" . $row["BookingDate"]. "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>