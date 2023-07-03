<?php
session_start();
if(!isset($_SESSION["admin_user"])) {
	header("Location: adminLogin.php");
}
if (isset($_POST['submit']) && isset($_FILES['my_image'])){
	include "../config.php";
	
	
	$title = $price = "";
	
	// info
	$title = $_POST['title'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$category = $_POST['category'];
	
	// image info
	$imgName = $_FILES['my_image']['name'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	
	if($error === 0){
		//Get extension of the image file
		$extension = pathinfo($imgName, PATHINFO_EXTENSION);
		$extension_lc = strtolower($extension);
		
		// Create a list of image extension
		$accpt_ext = array("jpeg","jpg", "png");
		
		// validate the extension
		if(in_array($extension_lc, $accpt_ext)){
			$newName = uniqid("image-",true).'.'.$extension_lc; //IMG-
			$path = 'uploads/'.$newName;
			move_uploaded_file($tmp_name, $path);
	
			
			$result = mysqli_query($conn, "INSERT INTO products(title,price,img,category,posted,extension,quantity) VALUES('$title','$price','$newName','$category','".date("Y-m-d H:i:s")."','$extension_lc','$quantity')");
			
			echo '<script>window.location.href="adminIndex.php";
			alert("Added successfully!");</script>';
		}else{
			echo '<script>window.location.href="adminAdd.php";
			alert("Only image allow!");</script>';
		}
	
	}else{
		header("Location:adminAdd.php");
	}
	
}else{
	header("Location:adminAdd.php");
}

?>