<?php

// if(isset($_POST['signup'])){
require_once("../model/user_model.php");

$name = $_REQUEST['name'];
$password= $_REQUEST['password'];
$confirm_password= $_REQUEST['confirm_password'];
$email = $_REQUEST['email'];
$age = $_REQUEST['age'];

if(empty(trim($name)) || empty(trim($password)) || empty(trim($confirm_password)) || empty(trim($email)) || empty(trim($age))){
    echo "please fill all the input fields<br>";
}
else if($password !== $confirm_password){
    echo "Pasword and confirm password does not match <br>";
}
else{
    // echo "hello";
    
    $result = add_user($name, $password, $email, $age);
    if($result){
        echo "User successfully inserted in the database";
    }
    else{
        echo "There is something error inserting the user";
    }
}


?>
