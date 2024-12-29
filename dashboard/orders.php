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
                <th>Name</th>
                <th>Surname</th>
                <th>email</th>
                <th>username</th>
                <th>Phone</th>
                <th>Product_id</th>
                <th ><a href="./index.php">Go Back</a></th>
        </thead>
        <tbody>
                <?php 
            $order=orders();

            if ($order) {
                $i=0;
            while ($orders=mysqli_fetch_assoc($order)){
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr>";

                    }
                    echo"<td>".$orders['id']."</td>";
                    echo"<td>".$orders['name']."</td>";
                    echo"<td>".$orders['surname']."</td>";
                    echo"<td>".$orders['email']."</td>";
                    echo"<td>".$orders['username']."</td>";
                    echo"<td>".$orders['phone']."</td>";
                    echo"<td>".$orders['product_id']."</td>";
                    echo"<td></td>";
                }
            }

?>
</tbody>
    </table>

</body>
</html>

<?php }} ?>