<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itcompany";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO contact (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    // Set parameters and execute
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}
else{
    echo "<script>alert('error occured');</script>"
}
?>
