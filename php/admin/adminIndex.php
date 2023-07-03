<?php
session_start();
if(!isset($_SESSION["admin_user"])) {
	header("Location: adminLogin.php");
}
include_once("../config.php");

$result = mysqli_query($conn,"SELECT * FROM products ORDER BY id DESC");
?>

<html>
<head>

<title>Admin view page</title>
<style>
		img{
			height: 100%;
			width: 100%;
			width: 120px;
			height: 120px;
			object-fit: fill;
		}
				
		table, td, th{
			align-items: center;
			text-align: center;
		}
</style>

<link rel="stylesheet" href="../../css/adminPage.css">
</head>
<body>
<div class="panels-container">
            <img src="../../img/Icon.png" class = "icon" alt="" style="top:0px;" />
</div>
<header class='admin-header'>
	<h1>Admin page</h1>
</header>
<br><br>
<nav class="add-class-container">
	<a href="adminAdd.php" class="add-class">Add new product</a>
	<a href = "logoutAdmin.php" class='log-out'>Log Out </a>
</nav>
<br><br>

	<div class="table-box">
		<table width="100%"  border="1" class="index-table-content">
			<tr class="header-row">
				<th>Product title</th><th>Product price</th><th>Product image</th><th>Quantity</th><th>Category</th><th>Action</th>
			</tr>
			<?php
			
			while($row = mysqli_fetch_array($result)){
				echo "<tr class='data-row'>";
				echo "<td>". $row['title']."</td>";
				echo "<td>". $row['price']."</td>";?>
			
				<td><img src="uploads/<?=$row['img']?>"></td>
			<?php
				echo "<td>". $row['quantity']."</td>";
				echo "<td>". $row['category']."</td>";
				echo "<td><a href='adminEdit.php?id=$row[id]'>Edit</a>  <a href='adminDelete.php?id=$row[id]' onclick='return confirmationMsg()'>Delete</a></td></tr>";
			}?>
		</table>
	</div>
	
	<script>
		function confirmationMsg(){
			return confirm("Are you sure you want to Delete this product?");
		}
	</script>
</body>
</html>