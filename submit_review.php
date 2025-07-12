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
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Prepare a statement to insert review data
    $stmt = $conn->prepare("INSERT INTO review_data (name, rating, review) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $rating, $review);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Close connection
$conn->close();

// Redirect to a success page
header("Location: reviewsubmitted.php");
exit();
?>
