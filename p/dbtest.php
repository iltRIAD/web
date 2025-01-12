<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "webtech";
$port = 8889;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database connected successfully!";
?>
