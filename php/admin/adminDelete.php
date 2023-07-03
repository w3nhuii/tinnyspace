<?php
session_start();
if(!isset($_SESSION["user_name"])) {
	header("Location: adminLogin.php");
}
include_once('../config.php');

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

while($row = mysqli_fetch_array($result)){
	unlink("uploads/".$row['img']);
}
$result = mysqli_query($conn, "DELETE FROM products WHERE id=$id");

header("LOCATION:adminIndex.php");

?>