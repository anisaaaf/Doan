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
                <th>Title</th>
                <th>Content</th>
                <th>price</th>
                <th>photo</th>
                <th></th>
                <th></th>
                <th ><a href="./index.php">Go Back</a></th>
                <th><a href="add-product.php">Add</a></th>
        </thead>
        <tbody>
                <?php 
            $product=products_shop();

            if ($product) {
                $i=0;
            while ($products=mysqli_fetch_assoc($product)){
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr>";

                    }
                    $productsid=$products['id'];
                    echo"<td>".$products['id']."</td>";
                    echo"<td>".$products['title']."</td>";
                    echo"<td>".$products['content']."</td>";
                    echo"<td>".$products['price']."</td>";
                    echo"<td>".$products['photo']."</td>";
                    echo " <td><a   href='edit-product.php?productid={$productsid}'>
                    Edit</a></td>";
                    echo "<td><a  href='../functions/functions.php?deleteid={$productsid}'>
                    Delete</a></td> ";
                }
            }

?>
</tbody>
    </table>

</body>
</html>

<?php }} ?>