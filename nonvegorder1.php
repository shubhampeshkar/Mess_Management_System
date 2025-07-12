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
    $address = $_POST['address'];
    $ord = $_POST['ord'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $today_date = $_POST['today_date'];
    $final_price= $_POST['final_price'];

    // Prepare a statement to insert payment data
    $stmt = $conn->prepare("INSERT INTO guestandorders (name, email, address, ord, quantity, amount, today_date, final_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisi", $name, $email, $address, $ord, $quantity, $amount, $today_date, $final_price);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
    
    // Close connection
    $conn->close();

    // Redirect to a success page
    header("Location: payment2.php");
    exit();
}
?>
