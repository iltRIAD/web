<?php

// if(isset($_POST['signup'])){
require_once("../model/user_model.php");

$name = $_REQUEST['name'];
$password= $_REQUEST['password'];

if(empty(trim($name)) || empty(trim($password))){
    echo "please fill all the input fields<br>";
}
else{
    // echo "hello";
    
    $result = login($name, $password);
    if($result ==  true){
       // header("location:../view/home.php");
       echo "success";
    }
    else{
        echo "Invalid Name and Password";
    }
}


?>
