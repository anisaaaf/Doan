<?php require("../functions/functions.php"); 
      	if(isset($_SESSION['users']['id'])){
            if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add About</title>
</head>
<body>
<?php 

if (isset($_POST['addabout'])) {
    $id=$_POST['id'];
    $content=$_POST['content'];

    addabout($id,$content);
}

?>

<form id="contactForm" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="id">


            <label for="message">Content*</label>
            <textarea id="message" name="content" rows="4" required></textarea>

            <button type="buttonn" name="addabout">Submit</button>
            <a href="./product.php">Go Back</a>

        </form>
</body>
</html>

<?php }} ?>