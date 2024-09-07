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
$paymentDate = $_POST['paymentDate'];
$amount = $_POST['amount'];
$paymentMethod = $_POST['paymentMethod'];

// Insert new payment into the Payment table
$sql = "INSERT INTO Payment (ReservationID, PaymentDate, Amount, PaymentMethod)
        VALUES ($reservationID, '$paymentDate', $amount, '$paymentMethod')";

if ($conn->query($sql) === TRUE) {
    echo "New payment added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
