<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$database = "patilmess";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$plan = $_POST['plan'];

// Prepare and execute SQL query to insert data into the database
$sql = "INSERT INTO plans (email, plan) VALUES ('$email', '$plan')";

if ($conn->query($sql) === TRUE) {
    echo "Payment Section";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
