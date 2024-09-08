<?php
// add_vehicle.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "924470"; // Update if you have a different password
$database = "car_rental_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the POST data for vehicle fields is set
if (isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['license']) && isset($_POST['type']) && isset($_POST['location'])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = intval($_POST['year']);
    $license = $_POST['license'];
    $type = intval($_POST['type']);
    $location = $_POST['location'];

    // Prepare and execute the SQL query to insert the vehicle
    $sql = "INSERT INTO Vehicle (Make, Model, Year, LicensePlate, TypeID, Status, Location) VALUES (?, ?, ?, ?, ?, 'Available', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisis", $make, $model, $year, $license, $type, $location);

    if ($stmt->execute()) {
        echo "Vehicle added successfully.";
    } else {
        echo "Error adding vehicle: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please provide the required fields.";
}

$conn->close();
?>
