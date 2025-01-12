<?php
    session_start();

    if (!isset($_SESSION['admin_id'])) {
        echo json_encode(['success' => false, 'message' => 'Admin not logged in.']);
        exit();
    }


    include('db_connection.php');


    $adminId = $_SESSION['admin_id'];
    $query = "SELECT * FROM admins WHERE id = $adminId";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
 
        echo json_encode([
            'success' => true,
            'profile' => [
                'name' => $admin['name'],
                'email' => $admin['email'],
                'role' => $admin['role'],
                'joined_date' => $admin['joined_date']
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Admin profile not found.']);
    }

    mysqli_close($conn);
?>
