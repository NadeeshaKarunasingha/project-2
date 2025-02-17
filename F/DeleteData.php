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

// Delete record
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM registrations WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: RetrieveData.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
