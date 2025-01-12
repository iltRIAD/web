<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');
    }

    var $user = user_data();    
    foreach ($usr as $arr){
        foreach ($arr as $key => $value){
            echo $key ." ".$value;
        }
    }
    
?>

<html>
<head>
    <title>View Users</title>
</head>
<body>
        <h2>User List</h2>
        <a href='home.php' > Back </a> | 
        <a href='../controller/logout.php' > logout </a>
        <br>
        <br>
        <table border=1>
            <tr>
                <td>Username</td>
                <td>Email</td>
                <td>Password</td>
                <td>Action</td>
            </tr>
           
            <?php
                for($i=0; $i<count($users); $i++){
            ?>
            <tr>
                <td><?php echo $users[$i]['username']; ?></td>
                <td><?php echo $users[$i]['email']; ?></td>
                <td><?=$users[$i]['username']?></td>
                <td>
                    <a href="edit.php?username=<?=$users[$i]['username']?>"> Edit </a> |
                    <a href="delete.php"> Delete </a>
                </td>
            </tr>
            <?php  } ?>
        </table>
 </body>
</html>


