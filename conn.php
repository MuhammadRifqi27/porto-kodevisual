<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$dbname = "booking_kodevisual";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    // Prepare the SQL query
    $sql = "INSERT INTO book (name, email, number, subject, time) VALUES ('$name', '$email', '$number', '$subject', '$time')";

    // Execute the query
     // Execute the query
     if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Message sent successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
