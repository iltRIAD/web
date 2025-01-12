<?php
    session_start();

    if(isset($_POST['submit'])){
        //echo "Test";
        //print_r($_GET)
        //$username = $_GET['username'];
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        //$username = $_REQUEST['username'];

        //echo "Your username is: ". $username;
        //echo "Your username is: {$username}";

        if($username == null || empty($password)){
            echo "Null username/password";
        }else if($_SESSION['user']['username'] == $username && $_SESSION['user']['password'] == $password){
            
            setcookie('status', 'true', time()+3000, '/');
            header('location: home.php');
        }else{
            //var_dump($_SESSION);
            echo "Invalid user!";
        }
    }else{
        header('location: login.html');
    }
?>