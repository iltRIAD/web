<?php
    include('db_connection.php');
    $stationId = $_GET['id'];

    $query = "SELECT * FROM charging_stations WHERE id = $stationId";
    $result = mysqli_query($conn, $query);
    $station = mysqli_fetch_assoc($result);

    if ($station) {
        echo json_encode(['success' => true, 'station' => $station]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Station not found.']);
    }

    mysqli_close($conn);
?>
