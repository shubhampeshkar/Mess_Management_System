
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <style>
    .center {
      text-align: center;
      margin-top: 1vh; /* Moves the link 50% down the viewport */
      transform: translateY(-10%);
    }
  </style>


</head>
  <body>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    
    <div class="alert alert-warning" role="alert">

    <div class="center">
  <a class="btn btn-warning" href="admindashboard.php" role="button">Back To Admin Page</a>
</div>


  </div>




<div class="container text-center">
  <div class="row row-cols-2">
    <div class="col">

<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 33.5rem;  height: 20rem;">
  
  <div class="card-body">
  <h2>Veg-Menu </h2>
  <hr>

  <form action="update_menu_process.php" method="post">
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>


   
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div></div>
    
    <div class="col">

<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-danger mb-3"  style="width: 33.5rem;  height: 20rem;">
  
  <div class="card-body">
  <h2>Non-Veg-Menu </h2>
  <hr>

  <form action="update_menu_process2.php" method="post">
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form> 
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div></div>
  </div>
</div>



<br>



<div class="container text-center">
  <div class="row row-cols-2">
    <div class="col">

<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-success mb-3"  style="width: 33.5rem;  height: 20rem;">
  
  <div class="card-body">
<h2>Old Veg-Menu </h2>
  <hr>

  <br>

  <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

                // Retrieve menu items from database
                $sql = "SELECT item_name, price FROM menu";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["item_name"] . "</td>";
                        echo "<td>Rs " . $row["price"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No items in the menu</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

   
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div></div>
    
    <div class="col">

<div class="container text-center">
  <div class="row">
    <div class="col">
    
    </div>
    <div class="col">
      
    <div class="card text-bg-danger mb-3"  style="width: 33.5rem;  height: 20rem;">
  
  <div class="card-body">
<h2>Old Non-Veg-Menu </h2>
  <hr>
  <br>  
  <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

                // Retrieve menu items from database
                $sql = "SELECT item_name, price FROM menu2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["item_name"] . "</td>";
                        echo "<td>Rs " . $row["price"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No items in the menu</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    
  </div>
</div>

    </div>
    <div class="col">
      
    </div>
  </div>
</div></div>
  </div>
</div>



















    </body>
</html>