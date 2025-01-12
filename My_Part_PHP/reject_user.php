<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}

if (isset($_GET['id']) && isset($_GET['reason'])) {
    $userId = $_GET['id'];
    $reason = $_GET['reason'];
    $conn = new mysqli("localhost", "root", "", "your_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET status = 'rejected', rejection_reason = '$reason' WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }

    $conn->close();
}
?>
