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

$customerID = $_POST['customerID'];

$sql = "DELETE FROM Customer WHERE CustomerID='$customerID'";

if ($conn->query($sql) === TRUE) {
    echo "Customer deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
