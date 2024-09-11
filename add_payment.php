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

// Check if POST variables are set
if (isset($_POST['billID'], $_POST['billDate'], $_POST['billStatus'], $_POST['totalAmount'], $_POST['taxAmount'], $_POST['bookingID'])) {
    $billID = $conn->real_escape_string($_POST['billID']);
    $billDate = $conn->real_escape_string($_POST['billDate']);
    $billStatus = $conn->real_escape_string($_POST['billStatus']);
    $totalAmount = $conn->real_escape_string($_POST['totalAmount']);
    $taxAmount = $conn->real_escape_string($_POST['taxAmount']);
    $bookingID = $conn->real_escape_string($_POST['bookingID']);

    $sql = "INSERT INTO Billing (BillID, BillDate, BillStatus, TotalAmount, TaxAmount, BookingID)
    VALUES ('$billID', '$billDate', '$billStatus', '$totalAmount', '$taxAmount', '$bookingID')";

    if ($conn->query($sql) === TRUE) {
        echo "New payment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Missing required POST variables.";
}

$conn->close();
?>