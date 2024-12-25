<?php require("../functions/functions.php"); 
      	if(isset($_SESSION['users']['id'])){
            if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
<?php 

if (isset($_POST['adduser'])) {
    $id=$_POST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    adduser($id,$username,$email,$password,$role);

}

?>

<form id="contactForm" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="id">
            <label for="username">Username*</label>
            <input type="text" id="username" name="username" required>

            <label for="email">email*</label>
            <input type="email" id="email" name="email" required>

            <label for="password">password*</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role*</label>
            <input type="number" id="role" name="role" required>

            <button type="buttonn" name="adduser">Submit</button>
            <a href="./users.php">Go Back</a>

        </form>
</body>
</html>

<?php }} ?>