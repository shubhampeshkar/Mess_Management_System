<?php
session_start(); // Start the session if it's not already started

// Check if email session is set
if (!isset($_SESSION['email'])) {
    // Redirect to login or set email session through other means
    header("Location: login.php"); // Redirect to login page or wherever you need
    exit(); // Stop further execution
}

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

// Retrieve email session
$email = $_SESSION['email'];

// Prepare and execute SQL query to fetch subscription data for the given email
$sql = "SELECT * FROM attendance2 WHERE email = '$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendence</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styles if needed */
    </style>
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
<br><br><br><br><br><br><br><br><br>
<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 75rem;  height: 20rem;">
  
  <div class="card-body">
<h2>My Attendance </h2>
  <hr>

  <div class="container">
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    
                    <th>Date Of Joining</th>
                    <th>Date</th>
                    <th>Lunch/Dinner</th>
                    <th>Attendance</th>
                    <th>Remark</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                
                                <td>" . $row["date_of_joining"] . "</td>
                                <td>" . $row["today_date"] . "</td>
                                <td>" . $row["ldplan"] . "</td>
                                <td>" . $row["attendance"] . "</td>
                                <td>" . $row["remark"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No subscriptions found for $email</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<br>
<a class="btn btn-warning" href="account.php" role="button">Back</a>

<!-- Bootstrap JS (optional if you need JS functionality) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>






  </div>
    <div class="col">
      
    </div>
  </div>
</div>


</body>
</html>
