<?php
// show_payments.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "924470";
$database = "car_rental_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch all payments
$sql = "SELECT * FROM Payment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Payment ID</th>
                <th>Reservation ID</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Payment Method</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["PaymentID"] . "</td>
                <td>" . $row["ReservationID"] . "</td>
                <td>" . $row["PaymentDate"] . "</td>
                <td>" . $row["Amount"] . "</td>
                <td>" . $row["PaymentMethod"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No payments found.";
}

$conn->close();
?>
