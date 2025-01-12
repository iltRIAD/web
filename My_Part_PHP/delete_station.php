<?php
    include('db_connection.php');
    $stationId = $_GET['id'];

    $query = "DELETE FROM charging_stations WHERE id = $stationId";
   
?>