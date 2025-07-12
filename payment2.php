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
  


    <br><br><br><br>
  <br><br>
    <div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-dark bg-white border border-dark mb-4" style="width: 50rem; height: 33rem;">
  
    
  <div class="card-body">
<h2>Payment Gateway</h2>
  <hr>

  <img src="images/img3.png" alt="Description of the image" width="750" height="50">
<br>

<form action="paymentsuccess2.php" method="post">
            <div class="mb-3">
                <br>
                <select class="form-select" id="card" name="card" required>
                    <option value="">Select</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="last" class="form-label">Last Five Digit:</label>
                <input type="text" class="form-control" id="last" name="last" required>
            </div>

            <div class="mb-3">
                <label for="cvv" class="form-label">CVV:</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>



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

    // Fetch the last entered amount
    $sql = "SELECT final_price FROM guestandorders ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h6>Amount</h6>" . $row["final_price"];
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>

<br><br>




            
            <button type="submit" class="btn btn-primary">PAY</button>
        </form>



    
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div>



    </body>
</html>