<?php require("../functions/functions.php"); 
      	if(isset($_SESSION['users']['id'])){
            if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<?php 


if (isset($_GET['productid'])) {
    $product=getproductid($_GET['productid']);
    $productid=$product['id'];
    $title=$product['title'];
    $content=$product['content'];
    $price=$product['price'];
    $photo=$product['photo'];
}

if (isset($_POST['editproduct'])) {
    $productsid=$_POST['id'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $price=$_POST['price'];
    $photo = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "../image/" . $photo;
    updateproduct($productsid,$title,$content,$price,$photo);
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }


}

?>

<form id="contactForm" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="id"
            value="<?php if(!empty($productid)) echo $productid; ?>">
            <label for="title">Title*</label>
            <input type="text" id="title" name="title" required
            value="<?php if(!empty($title)) echo $title; ?>">


            <label for="message">Content*</label>
            <textarea id="message" name="content" rows="4" required>
                <?php if(!empty($content)) echo $content;?>
            </textarea>

            <label for="price">Price*</label>
            <input type="text" id="Price" name="price" required
            value="<?php if(!empty($price)) echo $price; ?>"
            >

            <label for="photo">Photo*</label>
            <input type="file" id="photo" name="photo" accept=".jpg, .jpeg, .png, .gif, .pdf, .txt, .doc, .xls">

            <button type="buttonn" name="editproduct">Edit</button>
            <a href="./product.php">Go Back</a>

        </form>
</body>
</html>

<?php }} ?>