<?php
    session_start();
    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
        exit();
    }


   // include('db_connection.php');

    $stationQuery = "SELECT * FROM charging_stations";
    $stationResult = mysqli_query($conn, $stationQuery);

    mysqli_close($conn);
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
    

    <div>
        <input type="text" id="searchStation" placeholder="Search Station" onkeyup="searchStation()">
        <button onclick="searchStation()">Search</button>
    </div>
    

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
            <?php
 
            while ($row = mysqli_fetch_assoc($stationResult)) {
                echo "<tr id='station_{$row['id']}'>";
                echo "<td>" . $row['station_name'] . "</td>";
                echo "<td>" . $row['capacity'] . "</td>";
                echo "<td>" . $row['location'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>
                        <button onclick='editStation({$row['id']})'>Edit</button>
                        <button onclick='deleteStation({$row['id']})'>Delete</button>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


    <div id="stationForm" style="display: none;">
        <h3>Add / Update Station</h3>
        <form id="addUpdateForm">
            <input type="hidden" id="stationId" name="stationId">
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


    <div>
        <button onclick="showAddStationForm()">Add New Station</button>
        <button onclick="removeStation()">Remove Station</button>
    </div>

    <script>
        function searchStation() {
            let searchValue = document.getElementById('searchStation').value.toLowerCase();
            let rows = document.getElementById('stationTable').getElementsByTagName('tr');
            for (let i = 1; i < rows.length; i++) {
                let stationName = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
                if (stationName.includes(searchValue)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        function showAddStationForm() {
            document.getElementById('stationForm').style.display = 'block';
            document.getElementById('addUpdateForm').reset();
        }

        function cancelAction() {
            document.getElementById('stationForm').style.display = 'none';
        }

        function saveStation() {
            const stationId = document.getElementById('stationId').value;
            const stationName = document.getElementById('stationName').value;
            const capacity = document.getElementById('capacity').value;
            const location = document.getElementById('location').value;
            const status = document.getElementById('status').value;

            if (stationName && capacity && location && status) {
                let data = {
                    stationId: stationId,
                    stationName: stationName,
                    capacity: capacity,
                    location: location,
                    status: status
                };

                fetch('save_station.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) {
                        location.reload(); // Reload the page to show updated data
                    }
                })
                .catch(error => {
                    console.error('Error saving station:', error);
                    alert('Failed to save the station.');
                });
            } else {
                alert('Please fill in all fields.');
            }
        }

        function editStation(stationId) {
            fetch(`get_station.php?id=${stationId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('stationId').value = data.station.id;
                    document.getElementById('stationName').value = data.station.station_name;
                    document.getElementById('capacity').value = data.station.capacity;
                    document.getElementById('location').value = data.station.location;
                    document.getElementById('status').value = data.station.status;
                    document.getElementById('stationForm').style.display = 'block';
                } else {
                    alert('Station not found.');
                }
            });
        }

        function deleteStation(stationId) {
            if (confirm('Are you sure you want to delete this station? This action cannot be undone.')) {
                fetch(`delete_station.php?id=${stationId}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`station_${stationId}`).remove();
                        alert('Station deleted successfully.');
                    } else {
                        alert('Failed to delete the station.');
                    }
                });
            }
        }

        function removeStation() {
            alert('Remove station functionality is not yet implemented.');
        }
    </script>
</body>
</html>
