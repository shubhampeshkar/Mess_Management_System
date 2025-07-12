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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"]; // Get the item name from the form
    $price = $_POST["price"]; // Get the updated price from the form
    $id = 1; // Assuming the item to update has ID 1, you can change this as needed

    // Prepare SQL statement to update the menu item's price and name
    $sql = "UPDATE menu2 SET price = ?, item_name = ? WHERE id = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsi", $price, $item_name, $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: updatemenu.php");
    } else {
        echo "Error updating menu item: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

