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

$billID = $_POST['billID'];
$billDate = $_POST['billDate'];
$billStatus = $_POST['billStatus'];
$totalAmount = $_POST['totalAmount'];
$taxAmount = $_POST['taxAmount'];
$bookingID = $_POST['bookingID'];

$sql = "INSERT INTO Billing (BillID, BillDate, BillStatus, TotalAmount, TaxAmount, BookingID)
VALUES ('$billID', '$billDate', '$billStatus', $totalAmount, $taxAmount, '$bookingID')";

if ($conn->query($sql) === TRUE) {
    echo "New payment added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
