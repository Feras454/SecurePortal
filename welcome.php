<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">

</head>

<!--Head of the page conten-->
<header>
<div class="header">
  <h1>Cyber blog</h1>
  <img src="iconweb.png" width= 100px height= 100px>
  
</div>

<div class="navbar">
<a href="/">Home</a>
  <a href="CTF.php">What's CTF?</a>

  <a href="contact_us.php">Contact us</a>
<?php 

// Check if the user is logged in, if not show login and register
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	echo '<a href="login.php" class="right">Login</a>';
	echo '<a href="register.php" class="right">Register</a>';
}
// Check if the user is logged in, if yes

else{
	echo '<a href="logout.php" class="right">Logout</a>';
	echo '<a href="welcome.php" class="right">', htmlspecialchars($_SESSION["username"]) ,'</a>';
}
?>
  <!-- <a href="login.php" class="right">Login</a>
  <a href="register.php" class="right">Register</a>
-->
</div>
</header>

<body>
    <br>
    <div class="textbox">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Cyber Blog site.</h1>
   
    <p>
        <a href="reset-password.php" class="button5">Reset Your Password</a>
        <a href="logout.php" class="button5">Sign Out of Your Account</a>
    </p>
</div>
</body>

<!-- end of body page -->
<footer>
<div class="footer">
  <h3>Created by Ali Mohammed, Abdullah Saeed, Feras Jalalah &copy; 2021</h3>
</div>
</footer>

</html>