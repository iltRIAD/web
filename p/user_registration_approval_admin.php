<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
    <title>User Registration</title>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>User Registration</h1>
            <div class="flex items-center" style="margin-left: 1220px; ">
                <div style="margin-left: 1rem;">
                    <button id="button" style="color: rgb(1, 10, 10);" >Home</button>
                    <button id="button" style="color: rgb(1, 10, 10);" >Profile</button>
                    <button id="button" style="color: rgb(1, 10, 10);" >Logout</button>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <!-- Pending Approval Section -->
        <div id="pending-approval-section">
            <h2>Pending Approvals</h2>
            <div id="pending-list">
                <!-- Pending user registrations will be displayed here -->
            </div>
        </div>

        <!-- Active User Section -->
        <div id="active-user-section">
            <h2>Active Users</h2>
            <div id="active-list">
                <!-- Approved users will be displayed here -->
            </div>
        </div>
    </div>

    <script>
        // Fetch and display pending approvals
        function fetchPendingApprovals() {
            fetch('getPendingApprovals.php')
                .then(response => response.json())
                .then(data => {
                    const pendingList = document.getElementById('pending-list');
                    pendingList.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(user => {
                            pendingList.innerHTML += `
                                <div class="user-item">
                                    <p>Name: ${user.name} | Email: ${user.email}</p>
                                    <button class="approve-btn" onclick="approveUser(${user.id})">Approve</button>
                                    <button class="reject-btn" onclick="rejectUser(${user.id})">Reject</button>
                                </div>`;
                        });
                    } else {
                        pendingList.innerHTML = `<p>No pending approvals.</p>`;
                    }
                })
                .catch(error => console.error('Error fetching pending approvals:', error));
        }

        // Fetch and display active users
        function fetchActiveUsers() {
            fetch('getActiveUsers.php')
                .then(response => response.json())
                .then(data => {
                    const activeList = document.getElementById('active-list');
                    activeList.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(user => {
                            activeList.innerHTML += `
                                <div class="user-item">
                                    <p>Name: ${user.name} | Email: ${user.email}</p>
                                </div>`;
                        });
                    } else {
                        activeList.innerHTML = `<p>No active users.</p>`;
                    }
                })
                .catch(error => console.error('Error fetching active users:', error));
        }

        // Approve a user
        function approveUser(userId) {
            fetch(`approveUser.php?id=${userId}`)
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    fetchPendingApprovals();
                    fetchActiveUsers();
                })
                .catch(error => console.error('Error approving user:', error));
        }

        // Reject a user
        function rejectUser(userId) {
            const reason = prompt('Please enter the reason for rejection:');
            if (reason) {
                fetch(`rejectUser.php?id=${userId}&reason=${encodeURIComponent(reason)}`)
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        fetchPendingApprovals();
                    })
                    .catch(error => console.error('Error rejecting user:', error));
            }
        }

        // Fetch data on page load
        window.onload = function () {
            fetchPendingApprovals();
            fetchActiveUsers();
        };
    </script>
</body>
</html>
