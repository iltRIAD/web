<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $conn = new mysqli("127.0.0.1", "root", "", "webtech");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE users SET status = 'approved' WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }

    $conn->close();
}
?>
