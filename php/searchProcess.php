<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "tinnyspace";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from products where name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["img"]."  ".$row["title"]."  ".$row["price"]."<br>";
}
} else {
	echo '<script>window.location.href="index.php";
			alert("No result found!");</script>';
}

$conn->close();

?>