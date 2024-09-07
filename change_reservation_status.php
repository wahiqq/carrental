<?php
// change_reservation_status.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "924470"; 
$database = "car_rental_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$reservationID = $_POST['reservationID'];
$status = $_POST['status'];

// SQL query to update reservation status
$sql = "UPDATE Reservation SET Status = ? WHERE ReservationID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $status, $reservationID);

if ($stmt->execute()) {
    echo "Reservation status updated successfully.";
} else {
    echo "Error updating status: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
