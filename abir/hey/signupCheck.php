<?php
    session_start();

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if($username == null || empty($password) || empty($email)){
            echo "Null username/password/email";
        }else {
            $user = ['username'=> $username, 'email'=> $email, 'password'=> $password];
            $_SESSION['user'] = $user;
            header('location: login.html');
        }
    
    }else{
        header('location: signup.html');
    }
?>