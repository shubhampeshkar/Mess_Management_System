<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  


    <br><br><br>
    <div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-white bg-primary border border-dark mb-4" style="width: 50rem; height: 40rem;">
  
    
  <div class="card-body">
    <br><br>    <br>
<h2>Order Details</h2>
  <hr>
  <a class="btn btn-light" href="index.php" role="button">EXIT</a>
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
    $address = $_POST['address'];
    $ord = $_POST['ord'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $today_date = $_POST['today_date'];
    $final_price= $_POST['final_price'];

    // Prepare a statement to insert payment data
    $stmt = $conn->prepare("INSERT INTO guestandorders (name, address, ord, quantity, amount, today_date, final_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisi", $name, $address, $ord, $quantity, $amount, $today_date, $final_price);

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Last Inserted Data</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            
            <th>Address</th>
            <th>Order</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Amount Paid</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM guestandorders ORDER BY id DESC LIMIT 1";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row["name"]."</td>";
                  echo "<td>".$row["address"]."</td>";
                  echo "<td>".$row["ord"]."</td>";
                  echo "<td>".$row["quantity"]."</td>";
                  echo "<td>".$row["amount"]."</td>";
                  echo "<td>".$row["today_date"]."</td>";
                  echo "<td>".$row["final_price"]."</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='8'>No data found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>


  <h4> Your Order is Successfully Placed !! </h4> 
<h4> It Will Delivered To You Shortly </h4> 


  <img src="images/d.gif" alt="Description of the image" width="380" height="280">






</body>
</html>








    
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>



    </body>
</html>