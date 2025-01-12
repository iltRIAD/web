<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users"; 
$result = $conn->query($sql);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>


    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>
                        <button onclick='editUser(" . $row["id"] . ")'>Edit</button>
                        <button onclick='confirmDelete(" . $row["id"] . ")'>Delete</button>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <div id="editUserForm" style="display:none;">
        <h2>Edit User</h2>
        <form id="editForm">
            <input type="hidden" id="userId" name="userId">
            <label for="userName">Name:</label>
            <input type="text" id="userName" name="userName" required><br><br>

            <label for="userEmail">Email:</label>
            <input type="email" id="userEmail" name="userEmail" required><br><br>

            <label for="userStatus">Status:</label>
            <select id="userStatus" name="userStatus">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select><br><br>

            <button type="submit">Save Changes</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>
    </div>


    <div id="confirmationModal" style="display:none;">
        <p>Are you sure you want to delete this user? This action is irreversible.</p>
        <button onclick="deleteUser()">Confirm</button>
        <button onclick="closeModal()">Cancel</button>
    </div>


    <div id="confirmationMessage" style="display:none;"></div>

    <script>
        let userIdToDelete = null;

        function editUser(userId) {

            fetch('get_user.php?id=' + userId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('userId').value = data.id;
                    document.getElementById('userName').value = data.name;
                    document.getElementById('userEmail').value = data.email;
                    document.getElementById('userStatus').value = data.status;
                    document.getElementById('editUserForm').style.display = 'block';
                });
        }

        function cancelEdit() {
            document.getElementById('editUserForm').style.display = 'none';
        }

        function confirmDelete(userId) {
            userIdToDelete = userId;
            document.getElementById('confirmationModal').style.display = 'block';
        }

        function deleteUser() {
            if (userIdToDelete) {
    
                fetch('delete_user.php?id=' + userIdToDelete)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('confirmationMessage').style.display = 'block';
                        document.getElementById('confirmationMessage').innerText = 'User deleted successfully.';
                        setTimeout(() => location.reload(), 2000); // Reload the page to reflect changes
                    });
                document.getElementById('confirmationModal').style.display = 'none';
            }
        }

        function closeModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }
    </script>
</body>
</html>

<?php
$conn->close();
?>
