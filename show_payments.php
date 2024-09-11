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

$sql = "SELECT * FROM Billing";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>BillID</th>
    <th>BillDate</th>
    <th>BillStatus</th>
    <th>TotalAmount</th>
    <th>TaxAmount</th>
    <th>BookingID</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["BillID"]."</td>
        <td>".$row["BillDate"]."</td>
        <td>".$row["BillStatus"]."</td>
        <td>".$row["TotalAmount"]."</td>
        <td>".$row["TaxAmount"]."</td>
        <td>".$row["BookingID"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
