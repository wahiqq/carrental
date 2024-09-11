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

$carID = $_POST['carID'];
$model = $_POST['model'];
$manufacturer = $_POST['manufacturer'];
$yearOfMake = $_POST['yearOfMake'];
$categoryID = $_POST['categoryID'];
$locationID = $_POST['locationID'];
$availabilityStatus = $_POST['availabilityStatus'];

$sql = "INSERT INTO Car (CarID, Model, Manufacturer, YearOfMake, CategoryID, LocationID, AvailabilityStatus)
VALUES ('$carID', '$model', '$manufacturer', $yearOfMake, '$categoryID', '$locationID', '$availabilityStatus')";

if ($conn->query($sql) === TRUE) {
    echo "New vehicle added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
