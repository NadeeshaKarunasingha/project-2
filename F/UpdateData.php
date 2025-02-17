<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'registration_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for the given ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM registrations WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit();
    }
}

// Update data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $graduation_year = $conn->real_escape_string($_POST['graduation_year']);
    $degree = $conn->real_escape_string($_POST['degree']);

    $sql = "UPDATE registrations SET fullname = '$fullname', email = '$email', address = '$address', 
            contact = '$contact', graduation_year = '$graduation_year', degree = '$degree' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: RetrieveData.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
