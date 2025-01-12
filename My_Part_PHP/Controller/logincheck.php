<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if($username == null || empty($password)){
            echo "Null username/password";
        }else {
            $status = login($username, $password);
            $userId = getUserID($username, $password);
            if($status){
                if ($userId) {
                    $_SESSION['user_id'] = $userId;
                    
                    setcookie('status', 'true', time() + 3000, '/');
                    header('location: ../view/home.php');
                }
            }else{
                echo "Invalid User!";
            }
        }

    }else{
        header('location: ../view/login.html');
    }
?>