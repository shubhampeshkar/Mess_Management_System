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
    $date = $_POST['date'];
    $today_date = date('Y-m-d');
    $attendance = $_POST['attendance'];
    $remark = $_POST['remark'];

    // Prepare a statement to insert attendance data
    $stmt = $conn->prepare("INSERT INTO attendance (name, email, date_of_joining, today_date, attendance, remark) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $date, $today_date, $attendance, $remark);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

// Retrieve names and emails from the database
$name_query = "SELECT DISTINCT name FROM users";
$name_result = $conn->query($name_query);

$email_query = "SELECT DISTINCT email FROM users";
$email_result = $conn->query($email_query);

// Retrieve attendance data from the database
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Attendance System</h2>
    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <select class="form-select" id="name" name="name" required>
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
                <?php
                if ($email_result->num_rows > 0) {
                    while($row = $email_result->fetch_assoc()) {
                        echo "<option value='" . $row["email"] . "'>" . $row["email"] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
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

    <h2 class="mb-4">Attendance Record</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
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
