<?php
if(isset($_GET['name']) && !empty($_GET['name'])){
    $name = $_GET['name'];
    
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

    // Retrieve email and plan from the database based on name
    $stmt = $conn->prepare("SELECT email, plan FROM planandpayments WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $plan = $row['plan'];
    $stmt->close();

    $response = array('email' => $email, 'plan' => $plan);
    echo json_encode($response);

    // Close connection
    $conn->close();
}
?>
