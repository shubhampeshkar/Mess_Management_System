<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br><br><br><br><br>
    <div class="container text-center">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card text-white bg-success border border-dark mb-4" style="width: 75rem; height: 53rem;">
                    <div class="card-body">
                        <h2>Add Details</h2>
                        <hr>
                        <form action="vegorder1.php" method="post" onsubmit="return validateForm()">
                            <?php
                            // Connect to the database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "patilmess";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Fetch the amount for Veg-Plate from the menu table
                            $sql = "SELECT price FROM menu2 WHERE id='1'";
                            $result = $conn->query($sql);
                            $amount = 0;

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $amount = $row["price"];
                                }
                            } else {
                                echo "0 results";
                            }

                            $conn->close();
                            ?>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div id="emailError" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="ord" class="form-label">Order Description:</label>
                                <input type="text" class="form-control" id="ord" name="ord" value="Veg-Plate" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Per Plate Rate:</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $amount; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="today_date" class="form-label">Today's Date:</label>
                                <input type="date" class="form-control" id="today_date" name="today_date" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="final_price" class="form-label">Final Price:</label>
                                <input type="text" class="form-control" id="final_price" name="final_price" value="<?php echo $amount; ?>" readonly>
                            </div>
                            <button type="submit" class="btn btn-warning">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script>
        // Calculate final price when quantity changes
        document.getElementById('quantity').addEventListener('input', function() {
            var quantity = parseInt(this.value);
            var amount = parseInt(document.getElementById('amount').value);
            var finalPrice = quantity * amount;
            document.getElementById('final_price').value = finalPrice;
        });

        // Validate email format with JavaScript
        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validateForm() {
            var email = document.getElementById('email').value;
            var emailError = document.getElementById('emailError');
            if (!validateEmail(email)) {
                emailError.textContent = "Please enter a valid email address.";
                return false;
            } else {
                emailError.textContent = "";
            }
            return true;
        }
    </script>
</body>
</html>
