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
    <title>Admin User Approval</title>
</head>
<body>
    <h1>Admin User Approval</h1>
    
    <h2>Pending Approval List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="pendingList">
            <!-- Sample pending user -->
            <tr>
                <td>1</td>
                <td>Riad</td>
                <td>riad@hotmail.com</td>
                <td>
                    <button onclick="approveUser(1)">Approve</button>
                    <button onclick="rejectUser(1)">Reject</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Hasan</td>
                <td>hasan@gmail.com</td>
                <td>
                    <button onclick="approveUser(2)">Approve</button>
                    <button onclick="rejectUser(2)">Reject</button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <h2>System Logs</h2>
    <div id="logSection">
        <p>No actions performed yet.</p>
    </div>

    <script>
        function approveUser(userId) {
            alert(`User with ID ${userId} has been approved.`);
            logAction(`Approved user with ID ${userId}`);
            // Logic to move the user to the active user list (to be implemented)
        }

        function rejectUser(userId) {
            const reason = prompt('Enter the reason for rejection:');
            if (reason) {
                alert(`User with ID ${userId} has been rejected. Reason: ${reason}`);
                logAction(`Rejected user with ID ${userId}. Reason: ${reason}`);
                // Logic to notify the user via email (to be implemented)
            }
        }

        function logAction(action) {
            const logSection = document.getElementById('logSection');
            const newLog = document.createElement('p');
            newLog.textContent = action;
            logSection.appendChild(newLog);
        }
    </script>
</body>
</html>
