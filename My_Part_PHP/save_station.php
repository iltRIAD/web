<?php
    include('db_connection.php');
    $data = json_decode(file_get_contents('php://input'), true);

    $stationId = $data['stationId'];
    $stationName = $data['stationName'];
    $capacity = $data['capacity'];
    $location = $data['location'];
    $status = $data['status'];

    if ($stationId) {
   
        $query = "UPDATE charging_stations SET station_name = '$stationName', capacity = $capacity, location = '$location', status = '$status' WHERE id = $stationId";
    } else {

        $query = "INSERT INTO charging_stations (station_name, capacity, location, status) VALUES ('$stationName', $capacity, '$location', '$status')";
    }

    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true, 'message' => 'Station saved successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save station.']);
    }

    mysqli_close($conn);
?>
