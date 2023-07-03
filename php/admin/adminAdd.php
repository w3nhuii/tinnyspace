<?php
session_start();
if(!isset($_SESSION["admin_user"])) {
	header("Location: adminLogin.php");
}
?>
<html>
<head>
	<title>Add product</title>
	
	<link rel="stylesheet" href="../../css/adminPage.css">
</head>
<body class="add-body">
<div class="panels-container" >
            <img src="../../img/Icon.png" class = "icon" alt="" style="position:relative;top:0px;transform:translateX(100px);" />
</div>
<nav>
	<a href="adminIndex.php" style="font-size:22px;color:black;">&#8592;Back</a>
	<a href = "logoutAdmin.php" class='log-out'>Log Out </a>
</nav>

<br><br>
	
	<form action="submit.php" method="post" name="table1" enctype="multipart/form-data" class="form-box">
		<h1 class="admin-title">Admin add</h1>
			
		<table border="0" class='table-content'>
			
			<tr>
				<td>Product title: </td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>Product price: </td>
				<td><input type="number" name="price" min="0"></td>
			</tr>
			<tr>
				<td>Product quantity: </td>
				<td><input type="number" name="quantity" min="0"></td>
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
				<td><input type="file" name="my_image"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
			
		</table>
	</form>
	
	<?php if(isset($_GET['error'])){ ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php } ?>
</body>
</html>