<?php require("../functions/functions.php"); 
        if(isset($_SESSION['users']['id'])){
            if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <table>
        <thead>
                <th>Id</th>
                <th>Username</th>
                <th>Email</th>
                <th>password</th>
                <th>role</th>
                <th></th>
                <th></th>
                <th ><a href="./index.php">Go Back</a></th>
                <th><a href="add-user.php">Add</a></th>
        </thead>
        <tbody>
                <?php 
            $user=users();

            if ($user) {
                $i=0;
            while ($users=mysqli_fetch_assoc($user)){
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr>";

                    }
                    $userid=$users['id'];
                    echo"<td>".$users['id']."</td>";
                    echo"<td>".$users['username']."</td>";
                    echo"<td>".$users['email']."</td>";
                    echo"<td>".$users['password']."</td>";
                    echo"<td>".$users['role']."</td>";
                    echo " <td><a   href='edit-user.php?userid={$userid}'>
                    Edit</a></td>";
                    echo "<td><a  href='../functions/functions.php?deleteuserid={$userid}'>
                    Delete</a></td> ";
                }
            }

?>
</tbody>
    </table>

</body>
</html>

<?php }} ?>