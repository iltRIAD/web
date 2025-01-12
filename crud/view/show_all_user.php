<?php
    session_start();
    require_once("../model/user_model.php");
    $result = show_users();
?>
<html>
<head>
    <title>View Users</title>
</head>
<body>
        <h1 align="center">User list</h1>
        <table border=1 cellspacing="0" align="center" width="50%">
            <tr align="center">
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Age</th>
                <th colspan="2">Action</th>
                
            </tr>
            <?php 
                 while($row = mysqli_fetch_assoc($result)){
                //echo "<br>";
                //print_r($row);
                // }
            ?>
            <tr align="center">
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td>
                    <a href="edit_user.php?name=<?php echo $row['name']?>"> EDIT </a> 
                </td>
                <td>
                    delete
                </td>
                <?php } ?>
            </tr>
                <tr align="center">
                <td colspan="6">
                    <a href="admin_home.php?id=<?php echo $idd ?>"> Go Home </a> 
                </td>
                </tr>
        </table>
</body>
</html>