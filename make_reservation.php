<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'car_rental_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$customerID = $_POST['customerID'];
$vehicleID = $_POST['vehicleID'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

// Insert reservation into Reservation table
$sql = "INSERT INTO Reservation (CustomerID, VehicleID, StartDate, EndDate, Status, TotalCost)
        VALUES ($customerID, $vehicleID, '$startDate', '$endDate', 'Confirmed', 300.00)";  

if ($conn->query($sql) === TRUE) {
    echo "Reservation made successfully!";
    // Update vehicle status to 'Rented'
    $updateSql = "UPDATE Vehicle SET Status='Rented' WHERE VehicleID=$vehicleID";
    $conn->query($updateSql);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
