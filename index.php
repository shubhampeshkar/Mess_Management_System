<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <?php
  include 'header.php'; ?>

  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/img1.jpg" width="550" height="725" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
  <hr>


  <div class="container text-center">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">

        <div class="card text-dark bg-white border border-dark mb-4" style="width: 75rem; height: 16rem;">


          <div class="card-body">
            <h2>Notice</h2>
            <hr>

            <table class="table">

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
                $sql = "SELECT notice FROM notice";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["notice"] . "</td>";

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
      <div class="col">

      </div>
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

              <div class="card text-bg-success mb-3" style="width: 33.5rem;  height: 20rem;">

                <div class="card-body">
                  <h2>Today's Veg-Menu </h2>
                  <hr>

                  <br><br>

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
                          while ($row = $result->fetch_assoc()) {
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

                  <br>
                  <a class="btn btn-light" href="vegorder.php" role="button">Place Order</a> &nbsp;&nbsp; &nbsp;&nbsp;

                </div>
              </div>

            </div>
            <div class="col">

            </div>
          </div>
        </div>
      </div>

      <div class="col">

        <div class="container text-center">
          <div class="row">
            <div class="col">

            </div>
            <div class="col">

              <div class="card text-bg-danger mb-3" style="width: 33.5rem;  height: 20rem;">

                <div class="card-body">
                  <h2>Today's Non-Veg-Menu </h2>
                  <hr>
                  <br> <br>
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
                          while ($row = $result->fetch_assoc()) {
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

                  <br>
                  <a class="btn btn-light" href="nonvegorder.php" role="button">Place Order</a> &nbsp;&nbsp;
                  &nbsp;&nbsp;

                </div>
              </div>

            </div>
            <div class="col">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br><br>

  <div class="container text-center">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">

        <div class="card text-dark bg-white border border-dark mb-4" style="width: 75rem; height: 30rem;">



          <div class="card-body">
            <h2>Recent Reviews</h2>
            <hr>


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

            // Retrieve the last 3 reviews from the database
            $sql = "SELECT * FROM review_data ORDER BY created_at DESC LIMIT 3";
            $result = $conn->query($sql);

            // Close connection
            $conn->close();
            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Last 3 Reviews</title>
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>

            <body>
              <div class="container mt-5">
                <div class="row">
                  <div class="col-md-6 offset-md-3">

                    <?php if ($result->num_rows > 0): ?>
                      <div class="list-group">
                        <?php while ($row = $result->fetch_assoc()): ?>
                          <div class="list-group-item">
                            <h5 class="mb-1"><?php echo $row["name"]; ?> - <?php echo $row["rating"]; ?> Stars</h5>
                            <p class="mb-1"><?php echo $row["review"]; ?></p>
                            <small><?php echo $row["created_at"]; ?></small>
                          </div>
                        <?php endwhile; ?>
                      </div>
                    <?php else: ?>
                      <p>No reviews found.</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </body>

            </html>







          </div>
        </div>

      </div>
      <div class="col">

      </div>
    </div>
  </div>




  <br><br>





  <?php
  include 'footer.php'; ?>
</body>

</html>