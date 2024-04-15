<?php
// Establish connection to MySQL database
$servername = "localhost:3307"; // Change if necessary
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "gofood"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,'3307');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

// Prepare SQL statement to insert data into the table
$sql = "INSERT INTO signup (username, email, phonenumber, password) VALUES ('$username', '$email', '$phonenumber', '$password')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
