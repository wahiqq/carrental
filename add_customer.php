<?php
// Database Information
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
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$licenseNumber = $_POST['licenseNumber'];

// Insert new customer into the Customer table
$sql = "INSERT INTO Customer (FirstName, LastName, Address, PhoneNumber, Email, LicenseNumber)
        VALUES ('$firstName', '$lastName', '$address', '$phoneNumber', '$email', '$licenseNumber')";

if ($conn->query($sql) === TRUE) {
    echo "New customer added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
