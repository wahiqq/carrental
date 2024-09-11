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

$carID = $_POST['carID'];

$sql = "DELETE FROM Car WHERE CarID='$carID'";

if ($conn->query($sql) === TRUE) {
    echo "Vehicle deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
