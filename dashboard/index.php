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
            <th><a href="product.php">Products</a></th>
            <th><a href="about.php">About</a></th>
            <th><a href="contact.php">Contact</a></th>
            <th><a href="orders.php">Orders</a></th>
            <th><a href="users.php">User</a></th>
        </thead>
        <th><a href="../logout.php">Log Out</a></th>
    </table>

</body>
</html>

<?php }} ?>