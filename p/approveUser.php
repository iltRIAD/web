<?php
require_once('/model/userModel.php');

$id = $_GET['id'] ?? 0;

try {
    $stmt = $conn->prepare("UPDATE users SET status = 'approved' WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode(['message' => 'User approved successfully.']);
} catch (Exception $e) {
    echo json_encode(['message' => 'Error approving user.']);
}
?>
