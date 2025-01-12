 <?php 
session_start();
if($_SESSION['status'] == true){
       ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
       <a href="edit_user.php">edit user</a>
       <a href="delete_user.php">delete user</a>
       <a href="show_all_user.php">show all user</a>
       <a href="signup.html">add user</a>
    </body>
    </html>

<?php }

else{
    header("signin.html");
}