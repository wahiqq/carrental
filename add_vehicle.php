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

// Get form data
$reservationID = $_POST['reservationID'];
$status = $_POST['status'];

// Update reservation status
$sql = "UPDATE Reservation SET Status='$status' WHERE ReservationID=$reservationID";

if ($conn->query($sql) === TRUE) {
    echo "Reservation status updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
