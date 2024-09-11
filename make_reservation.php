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

$bookingID = $_POST['bookingID'];
$bookingDate = $_POST['bookingDate'];
$amountPaid = $_POST['amountPaid'];
$bookingStatus = $_POST['bookingStatus'];
$carID = $_POST['carID'];
$customerID = $_POST['customerID'];

$sql = "INSERT INTO Booking (BookingID, BookingDate, AmountPaid, BookingStatus, CarID, CustomerID)
VALUES ('$bookingID', '$bookingDate', $amountPaid, '$bookingStatus', '$carID', '$customerID')";

if ($conn->query($sql) === TRUE) {
    echo "Reservation made successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
