<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_db;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bookingID = $_POST['bookingID'];
$newStatus = $_POST['newStatus'];

$sql = "UPDATE Booking SET BookingStatus=? WHERE BookingID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $newStatus, $bookingID);

if ($stmt->execute()) {
    echo "Reservation status updated successfully.";
} else {
    echo "Error updating reservation status: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
