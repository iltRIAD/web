<?php


function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $conn;
}

function login($username, $password){
    $conn = getConnection();
    $sql = "select * from users where username='{$username}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
} 

function getUserID($username, $password){
    $conn = getConnection();
    $sql = "select * from users where username='{$username}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = $result->fetch_assoc()) {
        // Verify the password
        // if (password_verify($password, $row['password'])) {
            return $row['id']; // Return the user ID
        // }
    }

    return false; // Return false if login fails
} 

function userExists($username, $email) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$username}' OR email='{$email}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0; // Returns true if user exists
}

function addUser($username, $password, $email){
    $conn = getConnection();
    $sql = "insert into users VALUES('', '{$username}', '{$password}', '{$email}')";
    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}

function getAllUser(){
    $users = [];
    $conn = getConnection();
    $sql = "select * from users";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<br>";
            array_push($users, $row);
        }
        return $users;
    }
    else{
        return false;
    }
}

function getTransactionAll(){
    $transactions = [];
    $conn = getConnection();
    $sql = "select * from transactions";
    if(mysqli_query($conn, $sql)){
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<br>";
            array_push($transactions, $row);
        }
        return $transactions;
    }
    else{
        return false;
    }
}

?>

user_registration_approval_admin.php
user_management_admin.php
transaction_management_admin.php
profile.php
charging_station_management_admin.php
