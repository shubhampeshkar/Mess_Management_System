<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: login.php"); // Redirect to login page if not logged in
  exit();
}

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

// Retrieve user details from database based on email
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $username = $row['name'];
} else {
  // User not found
  header("Location: login.php"); // Redirect to login page
  exit();
}

$stmt->close();
$conn->close();
?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <?php
  include 'header2.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


  <br><br><br><br><br><br><br><br>




  <div class="container text-center">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">

        <div class="card text-bg-dark mb-3" style="width: 50rem;  height: 25rem;">

          <div class="card-body">
            <br>
            <h2>Welcome, <?php echo $username; ?>! </h2>

            <hr>
            <br><br><br>
            <a class="btn btn-light btn-lg" href="accountinfo.php" role="button">Account Info</a> &nbsp;&nbsp;

            <a class="btn btn-warning btn-lg" href="myplan.php" role="button">MY Plan</a>&nbsp;&nbsp;

            <a class="btn btn-light btn-lg" href="userattendence.php" role="button">Attendance</a>&nbsp;&nbsp;

            <a class="btn btn-warning btn-lg" href="sendmessage.php" role="button">Send Message</a>&nbsp;&nbsp;

            <a class="btn btn-light btn-lg" href="rating.php" role="button">Rating</a>

          </div>
        </div>

      </div>
      <div class="col">

      </div>
    </div>
  </div>

</body>

</html>