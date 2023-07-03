
<style>
    .headerbar {
        
        margin: auto;
        background-color: #D7D7D7;
        width:100%;
        height:90px;
		z-index=-1;

    }
    .headerbar .logo {
        margin: auto;
		display: inline-block;
        width:50%;
        height: 100%;
    }

    .navbar .headerbar .logo img {
        padding: 15px 0 0 50px;
        margin: auto;
        display: inline-block;
        width:30%;
        height:80px;	
    }


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<link rel="stylesheet" href="../css/cart.css">
 <nav class="navbar">
	<div class="headerbar">
		<div class="logo" style="margin-left:0;"> 
		   <a href="index.php"><img src="../img/logo.png" alt="Logo"/></a>
		</div>
		<ul class="links-container">
			<li class="link-item"><a href="index.php" class="link">home</a></li>
			<li class="link-item"><a href="product.php" class="link">product</a></li>
		</ul>
		<div class="user-interactions">
			<div class="cart">
				<!--<i class="fas fa-shopping-cart" id="cart-icon"></i> -->
				<img src="../img/cart2.png" class="cart-icon" id ="cart-icon" alt="">
				<span class="cart-item-count">0</span> 
				
				<div class="cart-storage">
					<h2 class="cart-title">Your Cart</h2>
					<!-- Cart Content -->
					<div class="cart-content">
						
					</div>
					<!-- Total charge -->
					<div class="total">
						<div class="total-title">Total RM</div>
						<div class="total-cost">0</div>
					</div>
					<!-- Button for buy -->
					<?php
					if(isset($_SESSION["user_name"])) {
						echo "<button type='button' class='button-buy'>Buy Now</button> ";
					}else{
						echo "<a href='login/login.php' style='text-decoration:none;font-size:22px;color:red;font-weight:600;border-bottom: 1px solid blue;margin-left:80px;'>Login to use cart!</a>";
					}
					?>
					
					<!-- Close cart section -->
					<i class='fas fa-x' id="close-cart"></i>
				</div>
			</div>
			<div class="user">
				<?php
					if(!isset($_SESSION["user_name"])) {
						echo "<a href='login/login.php'><img src='../img/user.png' class='user-icon' alt=''></a>";
					}else{
						echo "<a href='accountPage.php?id=".$_SESSION['id']."'><img src='../img/user.png' class='user-icon' alt=''></a>";
					}
				?>
				
			</div>
			<div class="user-log-out">
				<?php
					if(isset($_SESSION["user_name"])) {
						echo "<p style='transform:translate(-30px,28px); font-weight:500;font-size:12px;'>".$_SESSION["user_name"]."</p>";	
						echo "<a href='login/logout.php' style='font-size:11px;' id='log-out'>LOGOUT< </a>";
					}else{
						echo "<p style='transform:translate(-33px,28px); font-weight:500;font-size:12px;'>Login</p>";
					}
				?>
			</div>
			
		</div>
	</div>
 </nav>
