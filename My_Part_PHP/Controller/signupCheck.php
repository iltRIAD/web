
<?php
session_start();
require_once('../model/usermodel.php');

if(isset($_POST["submit"])){
    
    $errors = [];

    
    $password = trim($_POST["password"]);
    $name = trim($_POST["username"]);
    $email = trim($_POST['email']);
    
    
    function check_empty($name, $email, $password, &$errors){
        // global $errors;
        if(empty($name) || empty($email) || empty($password) || empty($confirm_password)){
            $errors[]="<h3>Input fields can not be emtpy</h3>";
        }
    }

    function check_username($name, &$errors){
       // global $errors;
        if(strlen($name) < 6 ){
            $errors[] = "<h3>Username length should be at least 6</h3>";
        }
        if(strpos($name, " ")){
            $errors[] = "<h3>Username Can not have a middle space</h3>";
        }
        if(!ctype_alpha($name)){
            
            $errors[] = "<h3>Username Can not contain numbers</h3>";
        }
    }


    function check_password($password,$confirm_password, &$errors){
        if(strlen($password) < 6){
            $errors[] = "<h3> Password length should be at least 6</h3>";
        }
        if($password !== $confirm_password){
            $errors[] = "<h3> Password and confirm password does not match</h3>";
        }
    }

    function check_email($email, &$errors){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
            $errors[] =  "<h3>Please enter a valid email</h3>"; 
        } 
    }

    check_empty($name, $email, $password, $errors);
    check_username($name, $errors);
    check_password($password,$errors);
    check_email($email, $errors);

    if(count($errors) > 0){
        foreach($errors as $error){
            echo $error;
        }
    }
    else{   
        

        $addUser = addUser($name, $password, $email, $type);
        if($addUser){
            header("location: login.html");
        }
        else{
            header("location: signup.html");
        }
   header("location:login.html");

    }   

}
else{
    header("location: signup.html");
}

?>