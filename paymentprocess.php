<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patilmess";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $plan = $_POST['plan'];
    $date = $_POST['date'];

    // Prepare a statement to insert payment data
    $stmt = $conn->prepare("INSERT INTO planandpayments (name, email, amount, plan, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $email, $amount, $plan, $date);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
    
    // Close connection
    $conn->close();

    // Redirect to a success page
    header("Location: payment.php");
    exit();
}
?>
