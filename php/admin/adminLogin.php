<?php

include_once("../config.php");

session_start();

error_reporting(0);

if(isset($_SESSION["admin_user"])) {
	header("Location: adminIndex.php");
}

if(isset($_POST["signin"])) {
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, sha1($_POST["password"]));
	
	$check = mysqli_query($conn, "SELECT username FROM loginadmin WHERE username ='$username' AND password = '$password'");

	if(mysqli_num_rows($check) > 0 ) {
		$row = mysqli_fetch_assoc($check);
		$_SESSION["admin_user"] = $row['username'];
		header("Location: adminIndex.php");
	} else {
		echo "<script>alert('Usernames or passwords are incorrect!');</script>";
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
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="login-register">
          <form action="" method = "POST" class="login" >
            <img src="../img/T.png" class="image" alt="" />
			<h2 class = "title">Admin Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name = "username" value="<?php echo $_POST['username']; ?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name = "password" value="<?php echo $_POST['password']; ?>"  required />
            </div>
            <input type="submit" value="Login" name = "signin" class="btn solid" />

          </form>
        </div>
      </div>
	  
	  <div class="panels-container">
            <img src="../../img/Icon.png" class = "icon" alt="" />
      </div>
	  
	  <div class ="footer">
		<button id = "about">About Us</button>
		<button id = "contact">Contact Us</button>
		<button id = "copyright">© 2022 Key. All Rights Reserved | Tinny Space Furniture </button>
	  </div>
    </div>

  </body>
</html>