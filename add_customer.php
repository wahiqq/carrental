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
if (isset($_POST['customerID'], $_POST['fullName'], $_POST['phoneNo'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'])) {
    $customerID = $conn->real_escape_string($_POST['customerID']);
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $phoneNo = $conn->real_escape_string($_POST['phoneNo']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);

    $sql = "INSERT INTO Customer (CustomerID, FullName, PhoneNo, Email, Address, City, State)
    VALUES ('$customerID', '$fullName', '$phoneNo', '$email', '$address', '$city', '$state')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully";
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