<?php
// Assuming you are using a POST request to send action data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $transactionId = $data['transactionId'];
    $actionReason = $data['actionReason'];

 
    include('db_connection.php');


    $sql = "SELECT * FROM transactions WHERE id = $transactionId";
    $result = $conn->query($sql);
    $transaction = $result->fetch_assoc();


    if ($transaction['status'] == 'Pending' || $transaction['status'] == 'Disputed') {
        $newStatus = $transaction['status'] == 'Pending' ? 'Refunded' : 'Disputed';
        

        $updateSql = "UPDATE transactions SET status = '$newStatus', reason = '$actionReason' WHERE id = $transactionId";
        
        if ($conn->query($updateSql)) {
            echo json_encode(['message' => "$newStatus action processed successfully for transaction ID $transactionId"]);
        } else {
            echo json_encode(['message' => 'Failed to process action. Please try again.']);
        }
    } else {
        echo json_encode(['message' => 'This transaction cannot be refunded or disputed.']);
    }
}
?>
