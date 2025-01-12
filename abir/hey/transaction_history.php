<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        /* Header Navigation */
        header {
            background-color: #227c78;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        /* Dashboard Statistics */
        .stats {
            display: flex;
            justify-content: space-evenly;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            border-radius: 8px;
            max-width: 1000px;
        }

        .stats .card {
            text-align: center;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            flex: 1;
            margin: 0 10px;
        }

        .stats .card h2 {
            margin: 0;
            font-size: 36px;
            color: #007bff;
        }

        .stats .card p {
            margin: 5px 0;
        }

        /* Search Bar and Filters */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px auto;
            max-width: 1000px;
            padding: 10px;
        }

        .controls input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .controls button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            max-width: 1000px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table td.status {
            color: green;
            font-weight: bold;
        }

        table td.cancel {
            color: red;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard</h1>
</header>

<!-- Statistics Section -->
<div class="stats">
    <div class="card">
        <h2>1,020</h2>
        <p>Completed</p>
        <p style="color: red;">▼ 6% from last week</p>
    </div>
    <div class="card">
        <h2>432</h2>
        <p>Cancelled</p>
        <p style="color: red;">▼ 2% from last week</p>
    </div>
</div>

<!-- Search Bar and Filters -->
<div class="controls">
    <input type="text" placeholder="Search..." id="searchInput">
    <button>Filters</button>
</div>

<!-- Data Table -->
<table>
    <thead>
        <tr>
            <th>Select</th>
            <th>Transac ID #</th>
            <th>City / State</th>
            <th>Station Company</th>
            <!-- <th>Last Updated At</th> -->
            <th>Amount</th>
            <th>Date</th>
            <!-- <th>End Date</th> -->
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="checkbox"></td>
            <td>87564654</td>
            <td>Chicago IL</td>
            <td>UPS</td>
            <!-- <td>Nov 11th 2019</td> -->
            <td>Carlton</td>
            <td>Dec 1st 2019</td>
            <!-- <td>Dec 2nd 2019</td> -->
            <td class="status">Done</td>
        </tr>
        <tr>
            <td><input type="checkbox"></td>
            <td>87564654</td>
            <td>Chicago IL</td>
            <td>UPS</td>
            <!-- <td>Nov 11th 2019</td> -->
            <td>Carlton</td>
            <td>Dec 1st 2019</td>
            <!-- <td>Dec 2nd 2019</td> -->
            <td class="status">Done</td>
        </tr>
        <tr>
            <td><input type="checkbox"></td>
            <td>87564654</td>
            <td>Chicago IL</td>
            <td>UPS</td>
            <!-- <td>Nov 11th 2019</td> -->
            <td>Carlton</td>
            <td>Dec 1st 2019</td>
            <!-- <td>Dec 2nd 2019</td> -->
            <td class="cancel">Cancelled</td>
        </tr>
    </tbody>
</table>

</body>
</html>
