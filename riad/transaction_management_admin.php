<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Management</title>
</head>
<body>
    <h1>Transaction Management</h1>
    
    <!-- Search/Filter Transactions -->
    <div>
        <input type="text" id="searchTransaction" placeholder="Search Transactions">
        <button onclick="searchTransaction()">Search</button>
        <select id="filterStatus" onchange="filterTransactions()">
            <option value="">Filter by Status</option>
            <option value="Completed">Completed</option>
            <option value="Pending">Pending</option>
            <option value="Refunded">Refunded</option>
            <option value="Disputed">Disputed</option>
        </select>
    </div>

    <!-- Transactions Table -->
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
            <!-- Sample Transactions -->
            <tr>
                <td>Riad</td>
                <td>50</td>
                <td>2024-12-28</td>
                <td>Completed</td>
                <td>
                    <button onclick="processRefund(1)">Refund</button>
                    <button onclick="processDispute(1)">Dispute</button>
                </td>
            </tr>
            <tr>
                <td>Hasan</td>
                <td>100</td>
                <td>2024-12-27</td>
                <td>Pending</td>
                <td>
                    <button onclick="processRefund(2)">Refund</button>
                    <button onclick="processDispute(2)">Dispute</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Refund/Dispute Form -->
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
            alert('Search functionality is not implemented yet.');
        }

        function filterTransactions() {
            const status = document.getElementById('filterStatus').value;
            alert(`Filtering transactions by status: ${status}`);
            // Logic for filtering transactions will be implemented here
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
                alert(`Action processed for transaction ID ${transactionId}. Reason: ${reason}`);
                document.getElementById('actionForm').style.display = 'none';
                // Logic to update transaction status and notify the user will be implemented here
            } else {
                alert('Please provide a reason.');
            }
        }
    </script>
</body>
</html>