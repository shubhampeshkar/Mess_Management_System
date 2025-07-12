<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
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
<h2>User Information </h2>
  <hr>

  <div class="container">
       
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Date of Joining</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();

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

                    // Check if user is logged in


                    if(isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];

                        // Prepare and execute query to fetch user information
                        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if user exists
                        if ($result->num_rows > 0) {
                            // Fetch and display user data in table rows
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['mobile'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>User not found!</td></tr>";
                        }

                        $stmt->close();
                    } else {
                        // Redirect to login page if user is not logged in
                        header("Location: login.php");
                        exit();
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
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

