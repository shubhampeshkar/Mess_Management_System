<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patilmess";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, mobile, email, address, date, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $mobile, $email, $address, $date, $password);

    // Execute prepared statement
    if ($stmt->execute() === TRUE) {
        header("Location: registrationsuccess.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
