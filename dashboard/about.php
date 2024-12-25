<?php require("../functions/functions.php"); 
     	if(isset($_SESSION['users']['id'])){
          if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>
    <table>
        <thead>
                <th>Id</th>
                <th>Content</th>
                <th></th>
                <th></th>
                <th ><a href="./index.php">Go Back</a></th>
                <th><a href="add-about.php">Add</a></th>
        </thead>
        <tbody>
                <?php 
			$about=about();

            if ($about) {
                $i=0;
            while ($abouts=mysqli_fetch_assoc($about)){
                    if($i%2==0){
                        echo "<tr>";
                    }else{
                        echo "<tr>";

                    }
                    $aboutid=$abouts['id'];
                    echo"<td>".$abouts['id']."</td>";
                    echo"<td>".$abouts['content']."</td>";
                    echo " <td><a   href='edit-about.php?aboutid={$aboutid}'>
                    Edit</a></td>";
                    echo "<td><a  href='../functions/functions.php?deleteabtid={$aboutid}'>
                    Delete</a></td> ";
                }
            }

?>
</tbody>
    </table>

</body>
</html>

<?php  }} ?>
