<?php


// Database connection
$servername = "localhost";
$username = "root";
$password = "924470"; 
$database = "car_rental_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get CustomerID from the request
if (isset($_POST['customerID'])) {
    $customerID = intval($_POST['customerID']);

    // Prepare and execute the DELETE statement
    $sql = "DELETE FROM Customer WHERE CustomerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerID);

    if ($stmt->execute()) {
        echo "Customer deleted successfully.";
    } else {
        echo "Error deleting customer: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No Customer ID provided.";
}

$conn->close();
?>
