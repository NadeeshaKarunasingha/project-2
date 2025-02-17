$host = 'localhost';
$username = 'root';
$password = '';
$database = 'registration_db';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #28a745;
        }
        .delete-btn {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h2>Registered Users</h2>
 <?php
            if ($result->num_rows > 0):?>

<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Graduation Year</th>
                <th>Degree</th>
                <th>Actions</th>
            </tr>
        </thead>

 <tbody>
 <?php  while ($row = $result->fetch_assoc()):?>
                          <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fullname']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['contact']}</td>
                            <td>{$row['graduation_year']}</td>
                            <td>{$row['degree']}</td>
                            <td>
                                <a href='UpdateData.php?id={$row['id']}' class='btn edit-btn'>Edit</a>
                                <a href='DeleteData.php?id={$row['id']}' class='btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                            </td>
                          </tr>
 <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

    <?php
    // Close connection
    $conn->close();
    ?>
</body>
</html>
