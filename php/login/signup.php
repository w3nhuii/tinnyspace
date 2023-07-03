<?php

include_once("../config.php");

error_reporting(0);

if(isset($_POST["signup"])) {
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, sha1($_POST["password"]));
	$cpassword = mysqli_real_escape_string($conn, sha1($_POST["cpassword"]));
	
	$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email ='$email'"));
	
	if($password !== $cpassword) {
		echo "<script>alert('Password is not matched!');</script>";
	} elseif($check_email > 0) {
		echo "<script>alert('Your email has been registered before!');</script>";
	} else {
		$mysql = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
		$result = mysqli_query($conn, $mysql);
		if($result) {
			$_POST["username"] = "";
			$_POST["email"] = "";
			$_POST["password"] = "";
			$_POST["cpassword"] = "";
			echo "<script>alert('You have registered successfully!');</script>";
			header("Location: login.php");
		} else{
			echo "<script>alert('Registration failed!');</script>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../css/login.css" />
    <title>Sign Up</title>
  </head>
  <body>
  <div class="container">
      <div class="forms-container">
        <div class="login-register">
          <form action="" class="register" method ="POST">
		    <p class="title"><br></p>
			<p class="title"><br></p>
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = "username" value="<?php echo $_POST["username"]; ?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name = "email" value="<?php echo $_POST["email"]; ?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "password" value="<?php echo $_POST["password"]; ?>" required />
            </div>
			<div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name = "cpassword" value="<?php echo $_POST["cpassword"]; ?>" required />
            </div>
            <input type="submit" class="btn" name = "signup" value="Sign up" />
			<a id = "login" href="login.php">ALREADY HAVE ACCOUNT? LOGIN HERE!</a>
          </form>
        </div>
      </div>
	  <div class="panels-container">
            <img src="../../img/Icon.png" class = "icon" alt="" />
			<img src="../../img/cart.png" class = "cart" alt="" />
			<a href = "login.php"><img src="../../img/profile.png" class = "profile" alt="" /></a>
      </div>
	  
	  <div class ="footer">
		<button id = "about">About Us</button>
		<button id = "contact">Contact Us</button>
		<button id = "copyright">© 2022 Key. All Rights Reserved | Tinny Space Furniture </button>
	  </div>
	</div>
  </body>
</html>