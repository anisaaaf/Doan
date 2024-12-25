<?php

session_start();
    $dbcon=mysqli_connect("localhost","root","","fashion_brand");
    if (!$dbcon) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    function login($email,$password){
        global $dbcon;
        $sqli="SELECT id,username,email,password,role FROM users
        WHERE email='$email' AND password='$password'";
        $result=mysqli_query($dbcon,$sqli);
        if(mysqli_num_rows($result)==1){
            $user=mysqli_fetch_object($result);
            $users=array(); 
            $users['id'] =$user->id;
            $users['username'] =$user->username;
            $users['email'] =$user->email;
            $users['role'] =$user->role;
            $_SESSION['users']=$users;
            if($_SESSION['users']['role']==1){
            header("Location: index.php");
        }elseif ($_SESSION['users']['role']==0) {
            header("Location: dashboard/index.php");
        }
      }else{
        echo "Email ose Password eshte gabim";
      }
    }
    function logout() {
        //dhenat ne sesion bosh 
        $_SESSION = array();
    
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 1800,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        
        session_destroy();
    }
    function register($id,$username,$email,$password,$role){
        global $dbcon;
        $sqli="INSERT INTO `users`(`id`, `username`, `email`, `password`, `role`) 
         VALUES ('$id','$username','$email','$password','$role');";
        $result=mysqli_query($dbcon,$sqli);
        if ($result) {
           echo "U Regjistrua me Sukses";
        }
    }

    function about(){
        global $dbcon;
        $sqli="SELECT * FROM `about_us`";
        return $result=mysqli_query($dbcon,$sqli);
        
    }

    function getuserid($userid){
        global $dbcon;
        $sqli="SELECT * FROM `users`
               WHERE `id`='$userid'";
         $users=mysqli_query($dbcon,$sqli) or die(mysqli_error($dbcon));
         $user=mysqli_fetch_assoc($users);
         return $user;
    }

    
    function getaboutid($aboutid){
        global $dbcon;
        $sqli="SELECT `id`,`content` FROM `about_us`
               WHERE `id`='$aboutid'";
         $abouts=mysqli_query($dbcon,$sqli) or die(mysqli_error($dbcon));
         $about=mysqli_fetch_assoc($abouts);
         return $about;
    }

    function addabout($id,$content){
        global $dbcon;
        $sqli="INSERT INTO `about_us`(`id`, `content`) 
        VALUES ('$id','$content')";
        $result=mysqli_query($dbcon,$sqli);
        if ($result) {
            header("location:../dashboard/about.php");
        }
    }
    function updateabout($aboutid,$content){
        global $dbcon;
        $sqli=" UPDATE `about_us` SET `content`='$content' WHERE 
        `id`='$aboutid'";
       $result=mysqli_query($dbcon,$sqli);
       if ($result) {
           header("location:../dashboard/about.php");
       }
    }

    function orders(){
        global $dbcon;
        $sqli="SELECT * FROM `orders`";
        return $result=mysqli_query($dbcon,$sqli);
    }

    
    if (isset($_GET['deleteabtid'])) {
        deleteabout($_GET['deleteabtid']);
     }
     function deleteabout($deleteabtid){
        global $dbcon;
        $sqli="DELETE FROM about_us WHERE id=$deleteabtid";
        $deleteabout=mysqli_query($dbcon,$sqli);
        if ($deleteabout) {
            header("location:../dashboard/about.php");
        }
     }

    function contact($id,$first_name,$last_name,$email,$phone_number,$subject,$orderType,$order_number,$message,$attach){
        global $dbcon;
        $sqli="INSERT INTO `contact_us`(`id`, `first_name`, `last_name`, `email`, `phone_number`, `subject`, `orderType`, `order_number`, `message`, `attach`)
         VALUES ('$id','$first_name','$last_name','$email','$phone_number','$subject','$orderType','$order_number','$message','$attach')";
        $result=mysqli_query($dbcon,$sqli);
        if ($result) {
           echo "Mesazhi juaj eshte derguar me sukses.";
        }else{
            echo "Mesazhi juaj nuk eshte derguar me sukses.";
        }
    }

    function contacts_form(){
        global $dbcon;
        $sqli="SELECT * FROM `contact_us`";
        return $result=mysqli_query($dbcon,$sqli);
        
    }
    
    function addproduct($id,$title,$content,$price,$photo){
        global $dbcon;
        $sqli="INSERT INTO `products`(`id`, `title`, `content`, `price`, `photo`) 
        VALUES ('$id','$title','$content','$price','$photo')";
        $result=mysqli_query($dbcon,$sqli);
        if ($result) {
            header("location:../dashboard/product.php");
        }
    }

        
    function adduser($id,$username,$email,$password,$role){
        global $dbcon;
        $sqli="INSERT INTO `users`(`id`, `username`, `email`, `password`, `role`) 
        VALUES ('$id','$username','$email','$password','$role')";
        $result=mysqli_query($dbcon,$sqli);
        if ($result) {
            header("location:../dashboard/users.php");
        }
    }

    function  updateusers($id,$username,$email,$password,$role){
        global $dbcon;
        $sqli=" UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`role`='$role' WHERE 
        `id`='$id'";
       $result=mysqli_query($dbcon,$sqli);
       if ($result) {
           header("location:../dashboard/users.php");
       }
    }
    
    function users(){
        global $dbcon;
        $sqli="SELECT * FROM `users`";
        return $result=mysqli_query($dbcon,$sqli);
    }

    function products(){
        global $dbcon;
        $sqli="SELECT * FROM `products` LIMIT 4";
        return $result=mysqli_query($dbcon,$sqli);
        
    }

    function products_shop(){
        global $dbcon;
        $sqli="SELECT * FROM `products`";
        return $result=mysqli_query($dbcon,$sqli);
        
    }

    if (isset($_GET['deleteid'])) {
        deleteproduct($_GET['deleteid']);
     }
     function deleteproduct($productsid){
        global $dbcon;
        $sqli="DELETE FROM products WHERE id=$productsid";
        $deleteproducts=mysqli_query($dbcon,$sqli);
        if ($deleteproducts) {
            header("location:../dashboard/product.php");
        }
     }

     
    if (isset($_GET['deleteuserid'])) {
        deleteuser($_GET['deleteuserid']);
     }
     function deleteuser($userid){
        global $dbcon;
        $sqli="DELETE FROM users WHERE id=$userid";
        $deleteuser=mysqli_query($dbcon,$sqli);
        if ($deleteuser) {
            header("location:../dashboard/users.php");
        }
     }
     
 function updateproduct($productsid,$title,$content,$price,$photo){
    global $dbcon;
    $sqli=" UPDATE `products` SET `title`='$title',`content`='$content',`price`='$price',`photo`='$photo' WHERE 
    `id`='$productsid'";
   $result=mysqli_query($dbcon,$sqli);
   if ($result) {
       header("location:../dashboard/edit-product.php");
   }
}

    function getproductid($productid){
        global $dbcon;
        $sqli="SELECT `id`,`title`,`content`,`price`,`photo` FROM `products`
               WHERE `id`='$productid'";
         $products=mysqli_query($dbcon,$sqli) or die(mysqli_error($dbcon));
         $product=mysqli_fetch_assoc($products);
         return $product;
    }

    function   order($id,$firstname,$lastname,$email,$username,$phone,$product_id){
        global $dbcon;
        $sqli="INSERT INTO `orders`(`id`, `name`, `surname`, `email`, `username`, `phone`, `product_id`)
         VALUES ('$id','$firstname','$lastname','$email','$username','$phone','$product_id')";
        $result=mysqli_query($dbcon,$sqli);
        if ($result) {
           header('location:./complete_order.php');
        }else {
            echo "Your Order has been refused";
        }
    }



    ?>