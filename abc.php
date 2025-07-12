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
    $email = $_POST['email'];
    $plan = $_POST['plan'];
    $ldplan = $_POST['ldplan'];
    $date = $_POST['date'];
    $today_date = date('Y-m-d');
    $attendance = $_POST['attendance'];
    $remark = $_POST['remark'];

    // Prepare a statement to insert attendance data
    $stmt = $conn->prepare("INSERT INTO attendance2 (name, email, plan, ldplan, date_of_joining, today_date, attendance, remark) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $email, $plan, $ldplan, $date, $today_date, $attendance, $remark);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Retrieve names from the database
$name_query = "SELECT DISTINCT name FROM users";
$name_result = $conn->query($name_query);

// Retrieve attendance data from the database
$sql = "SELECT * FROM attendance2";
$result = $conn->query($sql);
?>















<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
    function getEmail(name) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                document.getElementById("email").innerHTML = "<option value='" + data.email + "'>" + data.email + "</option>";
                document.getElementById("plan").innerHTML = "<option value='" + data.plan + "'>" + data.plan + "</option>";
            }
        };
        xmlhttp.open("GET", "getemail.php?name=" + name, true);
        xmlhttp.send();
    }
</script>




</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<br><br><br> 


    <div class="container text-center">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">

        <div class="card text-white bg-success border border-dark mb-4" style="width: 75rem; height: 58rem;">


          <div class="card-body">
            <h2>Attendance</h2>
            <hr>
            <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <select class="form-select" id="name" name="name" required onchange="getEmail(this.value)">
                <option value="">Select Name</option>
                <?php
                if ($name_result->num_rows > 0) {
                    while($row = $name_result->fetch_assoc()) {
                        echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <select class="form-select" id="email" name="email" required>
                <option value="">Select Email</option>
            </select>


            
            <div class="mb-3">
            <label for="plan" class="form-label">Plan</label>
            <select class="form-select" id="plan" name="plan" required>
                <option value="">Select Plan</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="ldplan" class="form-label">Lunch/Dinner:</label>
                <select class="form-select" id="ldplan" name="ldplan" required>
                    <option value="">Select</option>
                    <option value="LUNCH">LUNCH</option>
                    <option value="DINNER">DINNER</option>
                    <option value="None">None</option>
                    
                </select></div>



        
        <div class="mb-3">
            <label for="date" class="form-label">Date of Joining</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="mb-3">
            <label for="today_date" class="form-label">Today's Date</label>
            <input type="date" class="form-control" id="today_date" name="today_date" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <div class="mb-3">
            <label for="attendance" class="form-label">Attendance</label>
            <select class="form-select" id="attendance" name="attendance" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="remark" class="form-label">Remark</label>
            <input type="text" class="form-control" id="remark" name="remark">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<br><br>
<div class="alert alert-warning" role="alert">

<div class="center">
<a class="btn btn-warning" href="admindashboard.php" role="button">Back To Admin Page</a>
</div>






    




            


          </div>
        </div>

      </div>
      <div class="col">

      </div>
    </div>
  </div>




  <h2 class="mb-4">Attendance Record</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Plan</th>
            <th>Lunch/Dinner</th>
            <th>Date of Joining</th>
            <th>Today's Date</th>
            <th>Attendance</th>
            <th>Remark</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["plan"] . "</td>";
                echo "<td>" . $row["ldplan"] . "</td>";
                echo "<td>" . $row["date_of_joining"] . "</td>";
                echo "<td>" . $row["today_date"] . "</td>";
                echo "<td>" . $row["attendance"] . "</td>";
                echo "<td>" . $row["remark"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No attendance records found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>














    </body>

</html>

<?php
// Close connection
$conn->close();
?>