<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded admin credentials (you should replace this with a database check)
    $admin_username = "admin";
    $admin_password = "admin123";

    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the entered credentials match the admin credentials
    if ($username === $admin_username && $password === $admin_password) {
        // Authentication successful, set session variable
        $_SESSION["admin_authenticated"] = true;
        header("Location: admindashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Authentication failed, redirect back to the login page with an error message
        $_SESSION["login_error"] = "Invalid username or password";
        header("Location: error.php");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to the login page
    header("Location: error.php");
    exit();
}
?>
