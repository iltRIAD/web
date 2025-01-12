<?php
require_once('/model/userModel.php');

try {
    $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE status = 'pending'");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch (Exception $e) {
    echo json_encode([]);
}
?>
