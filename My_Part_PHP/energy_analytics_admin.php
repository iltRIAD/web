<?php
    session_start();
    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
        exit();
    }


    include('db_connection.php');
    
    $realTimeQuery = "SELECT * FROM real_time_data ORDER BY timestamp DESC LIMIT 1";
    $realTimeResult = mysqli_query($conn, $realTimeQuery);
    $realTimeData = mysqli_fetch_assoc($realTimeResult);

    $historicalQuery = "SELECT * FROM historical_energy_data ORDER BY date DESC";
    $historicalResult = mysqli_query($conn, $historicalQuery);

    mysqli_close($conn);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Analytics</title>
</head>
<body>
    <h1>Energy Analytics</h1>
    
    <h2>Real-Time Energy Data</h2>
    <div id="realTimeData">
        <p>Energy Usage: <span id="realTimeUsage"><?= $realTimeData['energy_usage'] ?> kWh</span></p>
        <p>Revenue: <span id="realTimeRevenue">$<?= $realTimeData['revenue'] ?></span></p>
        <p>Station Performance: <span id="realTimePerformance"><?= $realTimeData['performance'] ?></span></p>
    </div>

    <h2>Historical Energy Data</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Energy Usage (kWh)</th>
                <th>Revenue ($)</th>
                <th>Station Performance</th>
            </tr>
        </thead>
        <tbody id="historicalDataTable">
            <?php
            while ($row = mysqli_fetch_assoc($historicalResult)) {
                echo "<tr>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['energy_usage'] . "</td>";
                echo "<td>" . $row['revenue'] . "</td>";
                echo "<td>" . $row['performance'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Data Visualization</h2>
    <div id="charts">
        <p>Graph/Chart section will display here.</p>
    </div>

    <div>
        <h3>Export Reports</h3>
        <button onclick="exportPDF()">Export as PDF</button>
        <button onclick="exportExcel()">Export as Excel</button>
    </div>

    <script>
        setInterval(() => {
            document.getElementById('realTimeUsage').textContent = (Math.random() * 100).toFixed(2) + ' kWh';
            document.getElementById('realTimeRevenue').textContent = '$' + (Math.random() * 500).toFixed(2);
            document.getElementById('realTimePerformance').textContent = Math.random() > 0.8 ? 'High' : 'Normal';
        }, 5000);

        function exportPDF() {
            alert('PDF export functionality will be implemented.');
        }

        function exportExcel() {
            alert('Excel export functionality will be implemented.');
        }
    </script>
</body>
</html>
