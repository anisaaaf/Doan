<!DOCTYPE html>
<html>
    <head>
        <title>Fashion Brand DOAN</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fashionbrand.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
   <?php require("functions/functions.php"); 
 // lidhja e file te funksioneve me faqen kryesore  


 $session_timeout = 5; 
if(isset($_SESSION['users']['id'])) {
    if (isset($_SESSION['last_activity']) && ($_SESSION['last_activity'] + $session_timeout < time())) {
        logout();
        echo "Session timed out. Please log in again.";
    } else {
        $_SESSION['last_activity'] = time();
        echo "Welcome";
    }
} else {
    echo "Please log in.";
}

   ?> 
  <title> Fashion Brand DOAN</title>
    </head>
    <body>
        <header>
            <h1> <a href="index.php">DOAN</a> </h1>

            <ul class="navmenu">
            	<li><a href="shopwomen.php">SHOP WOMEN</li>
            	<li><a href="fallwinter.php">COLLECTIONS</li>
            	<li><a href="about.php">ABOUT</li>
                <li><a href="contactus.php">CONTACT</li>
            </ul>

            <div class="nav-icon">
            <a href=""><i class='bx bx-search'></i></box-icon></a>
             <a href=""><i class='bx bx-heart' ></i></box-icon></a>
              <a href=""><i class='bx bx-cart' ></i></box-icon></a>
             <a href=""><i class='bx bx-user'></i></box-icon></a>
             <a href=""><i class='bx bx-menu'></i></box-icon></a>
             

			</div>
           
		    <nav class="navigation">
				<?php
				if(isset($_SESSION['users']['id'])){
				if ($_SESSION['users']['role']==1 ||	$_SESSION['users']['role']==0 ) {
					echo '  <a class="" href="logout.php">
                    Logout</a>';
				}
			}else{
				echo '  <button class="btnLogin-popup">
				Login</button>';
			}
				?>
              
            </nav>
		</header>
		

        <section class="main-home">
			<div class="wrapper">
				<span class="icon-close">
					<ion-icon name="close"></ion-icon>
				</span>

				<div class="form-box register">
					<h2>Registration</h2>
					<?php 
					
							
				if (isset($_POST['register'])) {
					$id=$_POST['id'];
					$username=$_POST['username'];
					$email=$_POST['email'];
					$password=$_POST['password'];
					$role="1";
					register($id,$username,$email,$password,$role);
				}
					
					?>
				 <form action="#" method="POST">
				 <input type="hidden" name="id">
					<div class="input-box">
						<span class="icon">
							<ion-icon name="person"></ion-icon>
						</span>
						<input name="username" type="text" id="register-username">
						<label>Username</label>
						<p id="username-register-error" style="display: none;"></p>
					</div>
					<div class="input-box">
						<span class="icon"> <ion-icon 
							name="mail"></ion-icon></span>
						<input name="email" type="email" id="register-email">
						<label>Email</label>
						<p id="email-register-error" style="display: none;"></p>

					</div>
					<div class="input-box">
						<span class="icon"><ion-icon 
							name="lock-closed"></ion-icon></span>
						<input name="password" type="password" id="register-password">
						<label>Password</label>
						<p id="password-register-error" style="display: none;"></p>

					</div>
					<div class="remember-forgot">
						<label><input type="checkbox"
							>I agree to the terms & conditions</label>
					</div>
					<button type="submit" class="btn" name="register" onclick="validateRegisterForm()">Register</button>
					<div class="login-register">
						<p>Already have an account?<a href="#"
							 class="login-link">Login</a></p></div>
				 </form>
			
				</div>
	
				<div class="form-box login">

				<?php 
				
				if (isset($_POST['login'])) {
					$email=$_POST['email'];
					$password=$_POST['password'];
					login($email,$password);
				}
				
				?>
					<h2>Login</h2>
				 <form action="#" method="POST">
					<div class="input-box">
						<span class="icon"> <ion-icon 
							name="mail"></ion-icon></span>
						<input name="email" type="email" id="email">   
						<label>Email</label>
						<p id="email-error" style="display: none;"></p>
					</div>
					<div class="input-box">
						<span class="icon"><ion-icon 
							name="lock-closed"></ion-icon></span>
						<input name="password" type="password" id="password">
						<label>Password</label>
						<p id="password-error" style="display: none;"></p>
					</div>
					<div class="remember-forgot">
						<label><input type="checkbox"
							>Remember me</label>
							<a href="#">Forgot Password?</a>
					</div>
					<button type="submit" class="btn" name="login"  onclick="validateForm()">Login</button>
					<div class="login-register">
						<p>Don't have an account?<a href="#"
							 class="register-link">Register</a></p></div>
				 </form>
			
				</div>
	
				
	
			</div>
        	<div class="main-text">
        	<h1>Fall/Winter 23</h1>
        	<h4>Timeless Fashion</h4>

        	<a href="shopwomen.php" class="main-btn" >Shop Now <i class='bx bx-right-arrow-alt' ></i></a>
        	</div>

        	<div class="down-arrow">
        		<a href="" class="down"><i class='bx bx-down-arrow-alt' ></i></box-icon></a>
        	</div>
        </section>

        <section class="trending-products" id="trending">
        	<div class="center-text">
        		<h2>Our Trending<span> Products</h2>
        		
        	</div>
<?php

$product=products();

if ($product) {
	$i=0;
while ($products=mysqli_fetch_assoc($product)){
		if($i%2==0){
			echo "";
		}else{
			echo "";
		}

        	echo '<div class="products">
        		<div class="row">
        		<a href="product.php?productid='.$products['id'].'"><img src="image/'.$products['photo'].'" alt=""></a>
        			<div class="product-text">
        				<h3>'.$products['title'].'</h3>
        			</div>
        			
        			<div class="price">
        				<h4>$'.$products['price'].'</h4>
        			</div>
        		</div>';

			}
		}

				?>
<!-- 
        		<div class="row">
        			<img src="image00009.jpeg" alt="">
        			<div class="product-text">
        				<h3>Hooded Sweater</h3>
        			</div>
        			
        			<div class="price">
        				<h4>$400</h4>
        			</div>
        		</div>

        		<div class="row">
        			<img src="image00015.jpeg" alt="">
        			<div class="product-text">
        				<h3>Jumpsuit with Top</h3>
        			</div>
        			
        			<div class="price">
        				<h4>$995</h4>
        			</div>
        		</div>
        		
        	</div>
        </section>

        <section class="trending-collections" id="collections">
            <div class="center-textt">
                <h2>Collections</h2>
               
            </div>
            <div class="collections">
                <div class="roww">
                    <img src="image00003.jpeg" alt="" >
                       <div class="product-textt">
                        <br>
                        <h3><a href="springsummer.php">Spring/Summer</h3>
                       
                    </div>
                   
                </div>
              
               
                <div class="roww">

                    <img src="image00018.jpeg" alt="" >
                       <div class="product-textt">
                        <br>
                       <h3>Fall/Winter</h3>

                    </div>
                   
                </div> -->
               
            </div>
               </section>

        

        <section class="contact">
        	<div class="contact-info">
        		<div class="first-info">
        			<h1>DOAN</h1><br>
        			<p>DOAN studio</p>
        			<p>Prishtina,1000</p>
        			<p>Kosovo</p>

        			<div class="social-icons">
        				<a href=""><i class='bx bxl-instagram'>:doanstudio</i></a>
        				<a href=""><i class='bx bxl-facebook' >:Doan Studio</i></a>
        				<a href=""><i class='bx bx-envelope' >:doanstudio@gmail.com</i></a>
        				
        			</div>
        			
        		</div>
        		<br>
        		<br>
        		<div class="second-info">
        			<h3>SUPPORT</h3>
        			
        			<p>CUSTOMER CARE</p>
        			<p>MY ACCOUNT</p>
        			<p><a href="contactus.php">CONTACT</p>
        			
        		</div>
        		
        	</div>
        	
        </section>

        <script src="fashionbrand.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>