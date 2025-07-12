<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br><br><br>
    <div class="container text-center">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card text-bg-success mb-3" style="width: 75rem; height: 45rem;">
                    <div class="card-body">
                        <div class="container">
                            <h2>Recent Orders</h2>
                            <hr>
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Payment Id</th>
                                        <th>Name</th>
                                        
                                        <th>Date</th>
                                        <th>Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
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

                                    // Retrieve registered members' data from the database
                                    $sql = "SELECT * FROM guestandorders";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["name"] . "</td>";

                                            echo "<td>" . $row["today_date"] . "</td>";
                                            echo "<td>" . $row["final_price"] . "</td>";
                                            
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No registered members found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            // Calculate total amount
                            $total_amount = 0;
                            $result->data_seek(0); // Reset result pointer to fetch the rows again
                            while($row = $result->fetch_assoc()) {
                                $total_amount += $row["final_price"];
                            }
                           
                            echo "  <br> <h3>Total Transaction Amount Of Month: $total_amount</h3>";
                            ?>
                            



                            <div class="alert alert-warning" role="alert">

<div class="center">
<a class="btn btn-warning" href="admindashboard.php" role="button">Back To Admin Page</a>
</div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
</html>
