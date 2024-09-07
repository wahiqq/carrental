<?php
// delete_vehicle.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_rental_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {s
    die("Connection failed: " . $conn->connect_error);
}

// Get VehicleID from the request
if (isset($_POST['vehicleID'])) {
    $vehicleID = intval($_POST['vehicleID']);

    // Prepare and execute the DELETE statement
    $sql = "DELETE FROM Vehicle WHERE VehicleID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $vehicleID);

    if ($stmt->execute()) {
        echo "Vehicle deleted successfully.";
    } else {
        echo "Error deleting vehicle: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No Vehicle ID provided.";
}

$conn->close();
?>
