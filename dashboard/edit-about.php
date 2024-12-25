<?php require("../functions/functions.php"); 
      	if(isset($_SESSION['users']['id'])){
            if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About</title>
</head>
<body>
<?php 


if (isset($_GET['aboutid'])) {
    $about=getaboutid($_GET['aboutid']);
    $aboutid=$about['id'];
    $content=$about['content'];
}

if (isset($_POST['editabout'])) {
    $aboutid=$_POST['id'];
    $content=$_POST['content'];

    updateabout($aboutid,$content);
    // header("../about.php");
}

?>

<form id="contactForm" method="POST" >
            <input type="hidden" name="id"
            value="<?php if(!empty($aboutid)) echo $aboutid; ?>">


            <label for="message">Content*</label>
            <textarea id="message" name="content" rows="50" required>
                <?php if(!empty($content)) echo $content;?>
            </textarea>
            <input type="submit" name="editabout" value="Edit">
            <a href="./about.php">Go Back</a>

        </form>
</body>
</html>

<?php }} ?>