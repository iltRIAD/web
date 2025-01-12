<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $userId";

if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully";
} else
    echo "Error deleting user: " . $conn->error;
}

$conn->close();
?>
