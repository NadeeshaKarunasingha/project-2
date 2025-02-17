<?php
// Database connection
$host = 'localhost'; // Server name
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'registration_db'; // Database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Save data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $graduation_year = $conn->real_escape_string($_POST['graduation-year']);
    $degree = $conn->real_escape_string($_POST['degree']);

    $sql = "INSERT INTO registrations (fullname, email, address, contact, graduation_year, degree) 
            VALUES ('$fullname', '$email', '$address', '$contact', '$graduation_year', '$degree')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
