<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="fashionbrand.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet"
     href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
     <title>SHOP WOMEN</title>
	 <?php require("functions/functions.php"); ?>
	
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

		<section class="shop-women" id="women">
        	<div class="center-texxt">
        		<h2>Shop Women</h2>
        		
        	</div>

        	<div class="clothes">
        <?php		
			$product=products_shop();

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