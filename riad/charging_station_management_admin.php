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
    <title>Charging Station Management</title>
</head>
<body>
    <h1>Charging Station Management</h1>
    <h2>A Virtual Power Plan for Electric Vehicles</h2>
    
    <!-- Search Section -->
    <div>
        <input type="text" id="searchStation" placeholder="Search Station">
        <button onclick="searchStation()">Search</button>
    </div>
    
    <!-- Charging Station Table -->
    <table border="1">
        <thead>
            <tr>
                <th>Station Name</th>
                <th>Capacity</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="stationTable">
            <!-- Sample data -->
            <tr>
                <td>Station 1</td>
                <td>20</td>
                <td>Location A</td>
                <td>Available</td>
                <td>
                    <button onclick="editStation(1)">Edit</button>
                    <button onclick="deleteStation(1)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Station 2</td>
                <td>15</td>
                <td>Location B</td>
                <td>Unavailable</td>
                <td>
                    <button onclick="editStation(2)">Edit</button>
                    <button onclick="deleteStation(2)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Add / Update Form -->
    <div id="stationForm" style="display: none;">
        <h3>Add / Update Station</h3>
        <form id="addUpdateForm">
            <label for="stationName">Station Name:</label>
            <input type="text" id="stationName" name="stationName" required><br><br>

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required><br><br>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required><br><br>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select><br><br>

            <button type="button" onclick="saveStation()">Save / Update</button>
            <button type="button" onclick="cancelAction()">Cancel</button>
        </form>
    </div>

    <!-- Action Buttons -->
    <div>
        <button onclick="showAddStationForm()">Add New Station</button>
        <button onclick="removeStation()">Remove Station</button>
    </div>

    <script>
        function searchStation() {
            alert('Search functionality is not yet implemented.');
        }

        function showAddStationForm() {
            document.getElementById('stationForm').style.display = 'block';
        }

        function cancelAction() {
            document.getElementById('stationForm').style.display = 'none';
        }

        function saveStation() {
            const stationName = document.getElementById('stationName').value;
            const capacity = document.getElementById('capacity').value;
            const location = document.getElementById('location').value;
            const status = document.getElementById('status').value;

            if (stationName && capacity && location && status) {
                alert('Station details saved successfully!');
                // Logic to add/update station in the table
            } else {
                alert('Please fill in all fields.');
            }
        }

        function editStation(stationId) {
            alert(`Edit functionality for station ID ${stationId} is not yet implemented.`);
            // Populate form for editing
        }

        function deleteStation(stationId) {
            if (confirm('Are you sure you want to delete this station? This action cannot be undone.')) {
                alert(`Station ID ${stationId} deleted successfully.`);
                // Logic to remove station from the table
            }
        }

        function removeStation() {
            alert('Remove station functionality is not yet implemented.');
        }
    </script>
</body>
</html>