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
if (isset($_POST['carID'], $_POST['model'], $_POST['manufacturer'], $_POST['yearOfMake'], $_POST['categoryID'], $_POST['locationID'], $_POST['availabilityStatus'])) {
    $carID = $conn->real_escape_string($_POST['carID']);
    $model = $conn->real_escape_string($_POST['model']);
    $manufacturer = $conn->real_escape_string($_POST['manufacturer']);
    $yearOfMake = $conn->real_escape_string($_POST['yearOfMake']);
    $categoryID = $conn->real_escape_string($_POST['categoryID']);
    $locationID = $conn->real_escape_string($_POST['locationID']);
    $availabilityStatus = $conn->real_escape_string($_POST['availabilityStatus']);

    $sql = "INSERT INTO Car (CarID, Model, Manufacturer, YearOfMake, CategoryID, LocationID, AvailabilityStatus)
    VALUES ('$carID', '$model', '$manufacturer', '$yearOfMake', '$categoryID', '$locationID', '$availabilityStatus')";

    if ($conn->query($sql) === TRUE) {
        echo "New vehicle added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Missing required POST variables.<br>";
    echo "Received POST variables:<br>";
    print_r($_POST);
}

$conn->close();
?>