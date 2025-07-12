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
$sql = "SELECT * FROM planandpayments WHERE email = '$email'";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
   <br><br><br><br><br><br><br><br>

    <div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 75rem;  height: 20rem;">
  
  <div class="card-body">

  
  <div class="container">
    <h2>MY Plan</h2>
    <hr>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                
                
                <th>Plan</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    
                    echo "<td>" . $row["plan"] . "</td>";
                    echo "<td>" . $row["amount"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No registered members found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<br><br>
<a class="btn btn-warning" href="account.php" role="button">Back</a>





    
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>






    </body>
</html>