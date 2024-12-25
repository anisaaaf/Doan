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
                <th>first_name</th>
                <th>last_name</th>
                <th>email</th>
                <th>phone_number</th>
                <th>subject</th>
                <th>orderType</th>
                <th>order_number</th>
                <th>message</th>
                <th>attach</th>
                <th ><a href="./index.php">Go Back</a></th>

        </thead>
        <tbody>
                <?php 
			$contact=contacts_form();

            if ($contact) {
                $i=0;
            while ($contacts=mysqli_fetch_assoc($contact)){
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr>";

                    }
                    $contactid=$contacts['id'];
                    echo"<td>".$contacts['id']."</td>";
                    echo"<td>".$contacts['first_name']."</td>";
                    echo"<td>".$contacts['last_name']."</td>";
                    echo"<td>".$contacts['email']."</td>";
                    echo"<td>".$contacts['phone_number']."</td>";
                    echo"<td>".$contacts['subject']."</td>";
                    echo"<td>".$contacts['orderType']."</td>";
                    echo"<td>".$contacts['order_number']."</td>";
                    echo"<td>".$contacts['message']."</td>";
                    echo"<td><img width='100px' height='100px' src='../image/".$contacts['attach']."'></td>";
                }
            }

?>
</tbody>
    </table>

</body>
</html>

<?php }} ?>
