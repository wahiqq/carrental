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
$fullName = $_POST['fullName'];
$phoneNo = $_POST['phoneNo'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];

$sql = "INSERT INTO Customer (CustomerID, FullName, PhoneNo, Email, Address, City, State)
VALUES ('$customerID', '$fullName', '$phoneNo', '$email', '$address', '$city', '$state')";

if ($conn->query($sql) === TRUE) {
    echo "New customer added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
