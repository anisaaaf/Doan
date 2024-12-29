<?php require("../functions/functions.php"); 
        if(isset($_SESSION['users']['id'])){
            if ($_SESSION['users']['role']==0){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
<?php 

if (isset($_GET['userid'])) {
    $user=getuserid($_GET['userid']);
    $userid=$user['id'];
    $username=$user['username'];
    $email=$user['email'];
    $password=$user['password'];
    $role=$user['role'];
}

if (isset($_POST['edituser'])) {
    $id=$_POST['id'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    updateusers($id,$username,$email,$password,$role);

}

?>

<form id="contactForm" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="id"
            value="<?php if(!empty($userid)) echo $userid; ?>">
            <label for="username">Username*</label>
            <input type="text" id="username" name="username" required
            value="<?php if(!empty($username)) echo $username; ?>">

            <label for="email">email*</label>
            <input type="email" id="email" name="email" required
            value="<?php if(!empty($email)) echo $email; ?>">

            <label for="password">password*</label>
            <input type="password" id="password" name="password" required
            value="<?php if(!empty($password)) echo $password; ?>">

            <label for="role">Role*</label>
            <input type="number" id="role" name="role" required
            value="<?php if(!empty($role)) echo $role; ?>">

            <button type="buttonn" name="edituser">Submit</button>
            <a href="./users.php">Go Back</a>

        </form>
</body>
</html>

<?php }} ?>