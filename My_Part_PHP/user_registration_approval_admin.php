<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}


$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "your_database";  

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email FROM users WHERE status = 'pending'";
$result = $conn->query($sql);

$pendingUsers = [];
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $pendingUsers[] = $row;
    }
} else {
    $pendingUsers = [];
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
            <?php foreach ($pendingUsers as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <button onclick="approveUser(<?php echo $user['id']; ?>)">Approve</button>
                    <button onclick="rejectUser(<?php echo $user['id']; ?>)">Reject</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <h2>System Logs</h2>
    <div id="logSection">
        <p>No actions performed yet.</p>
    </div>

    <script>
        function approveUser(userId) {
            fetch(`approve_user.php?id=${userId}`)
                .then(response => response.text())
                .then(data => {
                    if (data === "success") {
                        alert(`User with ID ${userId} has been approved.`);
                        logAction(`Approved user with ID ${userId}`);
                        location.reload();  // Reload the page to update the list
                    } else {
                        alert("Failed to approve user.");
                    }
                });
        }

        function rejectUser(userId) {
            const reason = prompt('Enter the reason for rejection:');
            if (reason) {
                fetch(`reject_user.php?id=${userId}&reason=${encodeURIComponent(reason)}`)
                    .then(response => response.text())
                    .then(data => {
                        if (data === "success") {
                            alert(`User with ID ${userId} has been rejected. Reason: ${reason}`);
                            logAction(`Rejected user with ID ${userId}. Reason: ${reason}`);
                            location.reload();  // Reload the page to update the list
                        } else {
                            alert("Failed to reject user.");
                        }
                    });
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

<?php
$conn->close();
?>
