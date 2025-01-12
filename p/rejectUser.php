<?php
require_once('/model/userModel.php');

$id = $_GET['id'] ?? 0;
$reason = $_GET['reason'] ?? '';

try {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Send email notification (replace with real email logic)
    // mail($email, "Registration Rejected", "Reason: $reason");

    echo json_encode(['message' => 'User rejected and notified successfully.']);
} catch (Exception $e) {
    echo json_encode(['message' => 'Error rejecting user.']);
}
?>
