<?php
session_start();
if(!isset($_SESSION["admin_user"])) {
	header("Location: adminLogin.php");
}
include_once('../config.php');



if(isset($_POST['Update']))
{	
	$id = $_POST['id'];
	
	$title = $_POST['title'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$quantity = $_POST['quantity'];
	
	// update announcement data
	$result = mysqli_query($conn, "UPDATE products SET title='$title', price='$price' , category='$category' ,quantity='$quantity', posted='".date("Y-m-d H:i:s")."' WHERE id=$id ");
	
	// Redirect to homepage to display updated announcement in list
	header("Location: adminIndex.php");
}

?>


<html>
<head>
	<title>Edit product</title>
	<style>
		img{
			height: 120px;
			width: 140px;
			object-fit: fill;
			margin: 20px;
		}
			
		table, td, th{
			align-items: center;
			text-align: center;
		}
	</style>
	
	<link rel="stylesheet" href="../../css/adminPage.css">
</head>
<body class="add-body">
<div class="panels-container">
            <img src="../../img/Icon.png" class = "icon" alt="" style="position:relative;transform:translateX(100px);"/>
</div>
<nav>
	<a href="adminIndex.php" style="font-size:22px;color:black;z-index:6;">&#8592;Back</a>
	<a href = "logoutAdmin.php" class='log-out'>Log Out </a>
</nav>
<br><br>
	<form action="adminEdit.php" method="post" name="table2" class="form-box" style="height: 600px;">
		<h1 class="admin-title">Admin edit</h1>
		<table border="0" class='table-content'>
			<?php

			$id = $_GET['id'];
			
			$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

			$row = mysqli_fetch_assoc($result);

			$title = $row['title'];
			$price = $row['price'];
			$quantity = $row['quantity'];
			$posted = date("Y-m-d H:i:s");
			

			?>
			
			<tr>
				<td>Product title: </td>
				<td><input type="text" name="title" value= "<?php echo $title ?>"></td>
			</tr>
			<tr>
				<td>Product price: </td>
				<td><input type="number" name="price" min="0" value="<?php echo $price; ?>"></td>
			</tr>
			<tr>
				<td>Product quantity: </td>
				<td><input type="number" name="quantity" min="0" value="<?php echo $quantity; ?>"></td>
			</tr>
			<tr>
				<td>Category:</td>
				<td>
				  <input type="radio" name="category" value="Livingroom">Living Room
				  <input type="radio" name="category" value="Diningroom">Dining Room
				  <input type="radio" name="category" value="Bathroom">Bathroom
				  <input type="radio" name="category" value="Bedroom">Bedroom
				 </td>
			</tr>
			<tr>
				<td>Image: </td>
				<td><img src="uploads/<?=$row['img']?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value= "<?php  echo $_GET['id']; ?>"></td>
				<td><input type="submit" name="Update" value="Update"></td>
			</tr>
		</table>
	</form>
	
</body>
</head>