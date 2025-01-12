<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');
    }
?>
<html>
<head>
    <title>HOME Page</title>
</head>
<body>
        <h1>Project Title: EV Energy Web Project</h1>
        <table style border="1">
            <tr>
                <td>
                    <a href='user_management_admin.php' > User Management </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href='user_registration_approval_admin.php' > User Registration Approval </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href='charging_station_management_admin.php' > Charging Station Management Admin </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href='energy_analytics_admin.php' > Energy Analytics Admin </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href='transaction_management_admin.php' > Transaction Management Admin </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href='logout.php' > Logout </a>
                </td>
            </tr>

        </table>

</body>
</html>