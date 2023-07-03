<?php

session_start();
include_once("config.php");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>


<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-commerce web - Product page </title>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Arvo&family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
	
	<link rel="stylesheet" href="../css/product.css">  
 
	 <?php include('includes/header.php'); ?>
</head>
<body>

<br><br><br><br><br>
<!----- Product ----->	
<section class="product" id="product">

<?php
	
	if(isset($_GET['category'])){
			$category = $_GET['category'];
			$result = mysqli_query($conn, "SELECT * FROM products WHERE category='$category' ORDER BY id ASC");
			echo '<h1 class="heading"> <span>Pro</span>ducts : '.$category.'</h1>';
	}else{
			$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id ASC");
			echo '<h1 class="heading"> <span>Pro</span>ducts  </h1>';
	}
	
?>
<div class="all-container">
	<div class="box-container">
		
		<?php
		
		//$category = $_GET['category'];
		
		//$result = mysqli_query($conn, "SELECT * FROM products WHERE category='$category' ORDER BY id ASC");
		//$result = $conn->query($sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_array($result))
			{
				
		?>
		<div class="box">
			<div class="image">
				<img src="admin/uploads/<?=$row['img']?>">
			</div>
			<div class="info">
				<h3 class="product-title"><?php echo $row["title"]; ?></h3>
				<div class="subInfo" style= "border-top:none;">
					<span class="price"> RM<?php echo $row["price"]; ?></span>
				</div>
			</div>
			<div class="overlay">
				<i style="--count:1;"class="fas fa-heart heart" ></i>
				<?php
						if(isset($_SESSION["user_name"])) {
							echo "<i style='--count:2;' class='fas fa-shopping-cart add-cart'></i>";
						}
				?>
					
			</div>
		</div>
		<?php
			}
		}
		?>

	</div>

	<footer id="footer">
		<?php include('includes/footer.php'); ?>
	</footer>
</div>
	<script src="../js/product.js"></script>
</body>
</html>