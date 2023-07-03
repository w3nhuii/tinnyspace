<?php

session_start();
include_once("config.php");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
   <head> 
      <link rel="stylesheet" href="../css/mystyle.css">
      <style>
         .account p {
            padding-left:40px;
         }
      </style>
	  <?php include('includes/header.php'); ?>
   </head>


   <body>
      <div class="rectangle">
         <div class ="circle"></div>
         
      </div>
      <?php
		$id = $_GET['id'];
		$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
		if(mysqli_num_rows($result)>0){
			$row = mysqli_fetch_array($result);
			
			
		}
	  ?>
      
      <h1 style="padding-left:46%; padding-top:4%"><?php echo $row['username']; ?></h1>
     
   
      <form action="" method="POST" id="signin" id="reg">
         <div class="account" style="font-family: Dubai; padding:10px; ">
            <h1 style="background-color:rgb(240,240,240); padding-left:40px; height:40px;padding-bottom: 20px; padding-top:20px; font-size: 30px">Account</h1>
            <div class="menu" >
               <h4 style="padding-left: 40px; font-size:22px">Name</h4>
               <p><?php echo $row['username']; ?></p>
               <h4 style="padding-left: 40px; font-size:22px">Email</h4>
               <p><?php echo $row['email']; ?></p>
               <h4 style="padding-left: 40px; font-size:22px">Contact Number</h4>
               <p><?php echo $row['contactNo']; ?></p>
               <h4 style="padding-left: 40px; font-size:22px">Address</h4>
               <p><?php echo $row['address']; ?></p>
            </div>
         </div>
      </form>
      <div class="setting" style="font-family: Dubai; padding:10px; ">
         <h1 style="background-color:rgb(240,240,240); padding-left:40px; height:40px;padding-bottom: 20px; padding-top:20px; font-size: 30px">Account</h1>
         <div class="delete" style="width:100%">
            <div class="deleteText" style="width:50%; float:left;">
               <h4 style="padding-left: 40px; font-size:22px">Delete Account</h4>
               <p style="padding-left: 40px;font-size:20px">Action cannot be reverted</p>
            </div>
            <h5 style="float:right; width: 50%; padding-top: 83px;"><a href="deleteAcc.php" alt="delete">DELETE</a></h5>
         </div>
         <div class="logout" style="float:left; width:100%; display:inline-block">
            <div class="logoutText" style="width:50% ">
               <h4 style="padding-left: 40px; font-size:22px; float:left;">Logout</h4>
            </div>
            <h5 style="width:50%; float:right; padding-top:5px; font-size:20px"><a href="login/logout.php" alt="logout">LOGOUT</a></h5>
         </div>   
      </div>
   </body>
</html>
   
