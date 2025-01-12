<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');
    }

  
    include('db_connection.php');


    $statusFilter = isset($_GET['status']) ? $_GET['status'] : '';
    $searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';


    $sql = "SELECT * FROM transactions WHERE user_name LIKE '%$searchQuery%' ";
    if ($statusFilter) {
        $sql .= "AND status = '$statusFilter' ";
    }
    $sql .= "ORDER BY date DESC";
    
    $result = $conn->query($sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Management</title>
</head>
<body>
    <h1>Transaction Management</h1>
    

    <div>
        <input type="text" id="searchTransaction" placeholder="Search Transactions" oninput="searchTransaction()">
        <button onclick="searchTransaction()">Search</button>
        <select id="filterStatus" onchange="filterTransactions()">
            <option value="">Filter by Status</option>
            <option value="Completed">Completed</option>
            <option value="Pending">Pending</option>
            <option value="Refunded">Refunded</option>
            <option value="Disputed">Disputed</option>
        </select>
    </div>


    <table border="1">
        <thead>
            <tr>
                <th>User</th>
                <th>Amount ($)</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="transactionTable">
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <?php if ($row['status'] == 'Pending' || $row['status'] == 'Disputed'): ?>
                            <button onclick="processRefund(<?php echo $row['id']; ?>)">Refund</button>
                            <button onclick="processDispute(<?php echo $row['id']; ?>)">Dispute</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <div id="actionForm" style="display:none;">
        <h3>Process Refund/Dispute</h3>
        <form id="refundDisputeForm">
            <label for="transactionId">Transaction ID:</label>
            <input type="text" id="transactionId" name="transactionId" readonly><br><br>

            <label for="actionReason">Reason:</label>
            <textarea id="actionReason" name="actionReason" required></textarea><br><br>

            <button type="button" onclick="submitAction()">Submit</button>
            <button type="button" onclick="cancelAction()">Cancel</button>
        </form>
    </div>

    <script>
        function searchTransaction() {
            const searchQuery = document.getElementById('searchTransaction').value;
            window.location.href = `transaction_management_admin.php?searchQuery=${searchQuery}`;
        }

        function filterTransactions() {
            const status = document.getElementById('filterStatus').value;
            window.location.href = `transaction_management_admin.php?status=${status}`;
        }

        function processRefund(transactionId) {
            showActionForm(transactionId, 'Refund');
        }

        function processDispute(transactionId) {
            showActionForm(transactionId, 'Dispute');
        }

        function showActionForm(transactionId, actionType) {
            document.getElementById('actionForm').style.display = 'block';
            document.getElementById('transactionId').value = transactionId;
            document.getElementById('actionReason').placeholder = `Enter reason for ${actionType.toLowerCase()}`;
        }

        function cancelAction() {
            document.getElementById('actionForm').style.display = 'none';
        }

        function submitAction() {
            const transactionId = document.getElementById('transactionId').value;
            const reason = document.getElementById('actionReason').value;

            if (reason) {

                fetch('process_action.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        transactionId: transactionId,
                        actionReason: reason
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    document.getElementById('actionForm').style.display = 'none';
                    location.reload(); 
