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
     <title>About</title>
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

        <br>

		 <section class="contactus">
        	
        	 <div class="containerr">
        	 	<br>
        	 	<br>
        <h2>Contact Us</h2>
        <p>Any questions? We are here to help. We work Monday to Friday, 9am to 5pm CET, excluding holidays.</p>
        <br>
        <br>
<?php 

if (isset($_POST['contact'])) {
    $id=$_POST['id'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $subject=$_POST['subject'];
    $orderType=$_POST['orderType'];
    $order_number=$_POST['order_number'];
    $message=$_POST['message'];
    $attach = $_FILES["attach"]["name"];
    $tempname = $_FILES["attach"]["tmp_name"];
    $folder = "./image/" . $attach;

    contact($id,$first_name,$last_name,$email,$phone_number,$subject,$orderType,$order_number,$message,$attach);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}

?>
        <form id="contactForm" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="id">
            <label for="firstName">First Name*</label>
            <input type="text" id="firstName" name="first_name" required>

            <label for="lastName">Last Name*</label>
            <input type="text" id="lastName" name="last_name" required>

            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone_number">

            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject">

            <label for="orderType">Online Order</label>
            <select id="orderType" name="orderType">
                <option value="none">Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>

            <label for="orderNumber">Order Number</label>
            <input type="text" id="orderNumber" name="order_number">

            <label for="message">Your Message*</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <label for="attachment">Attach</label>
            <input type="file" id="attachment" name="attach" accept=".jpg, .jpeg, .png, .gif, .pdf, .txt, .doc, .xls">

            <button type="buttonn" name="contact" onclick="submitForm()">Submit</button>
        </form>
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
        			<p>CONTACT</p>
        			
        		</div>
        		
        	</div>
        	
        </section>


       


        <script src="fashionbrand.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>