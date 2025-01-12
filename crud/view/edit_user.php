<?php
session_start();
require_once('../model/user_model.php');
if($_SESSION['status'] == true){   
    $name = $_REQUEST['name'];
    $user_info = user_info($name);
    $name = $user_info['name'];
    $pass = $user_info['password'];
    $email = $user_info['email'];
    $age = $user_info['age'];
}

?>

<html>
    <head>
        <title>pass change</title>
    </head>

    <body>

    <table align="center" >
    <form action="../model/edit_user_check.php?id=<?php echo $idd  ?>&idt=<?php echo $idt ?>" method="POST">
        <tr height="250px" align="center">
            <td align="center" colspan="2"> Welcome to edit user page</td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" disabled value="<?php echo $name ?>"></td>
        </tr>
        <tr>
            <td>New Username</td>
            <td><input type="text"  name="new_username"></td>
        </tr>
        <tr>
        <tr>
            <td>Password</td>
            <td><input type="text" disabled value="<?php echo $pass ?>"></td>
        </tr>
        <tr>
            <td>New Password</td>
            <td><input type="text"  name="new_password"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" disabled value="<?php echo $email ?>"></td>
        </tr>
        <tr>
            <td>New email</td>
            <td><input type="email"  name="new_email"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="number" disabled value="<?php echo $age ?>"></td>
        </tr>
        <tr>
            <td>New Age</td>
            <td><input type="number"  name="new_age"></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" value="Submit" name="submit"> &nbsp; &nbsp; &nbsp;<input type="reset" value="Reset" name="reset"></td>
        </tr>
            
        </form>

    </table>

    
        
       
    </body>
</html>