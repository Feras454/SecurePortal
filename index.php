<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: login.php");
//    exit;
//}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

</head>
<body>

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



<!--main conten-->
<main>
<div class="row">
    <div class="main">
      
    
  </div>

      <div class="textbox">
        <p class="image">
          <h1 style="text-align:center;">
          
          <?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          echo  "<img  src='vistorbanner.png' width='700' height='300'>";
          }
          else{ echo 'Welcome <strong>'.$_SESSION["username"]. "</strong> to cyber site<br>";
            echo  "<img  src='loginbanner.png' width='700' height='300'>";
     
          }
	        ?><br>
          This site is made to show our muscel in html, css, javascript, php, and mysql,<br>
          and with all of these we make a site that has a login system and php sites that are all connected with each other,<br>
          as you can see if you login in this site it shows your name in this page if you're logged on,<br>
          and the page ctf will not access until you're logged into our website (it will redirect you to login.php).<br>
          For client-side validation, we utilized javascript and html, and for server-side validation, we used PHP without a doubt.<br>
          <br><br><br>

            




           
          </h1>
        </p>
    </div>
         
  </div>
</div>
</main>


<!-- end of body page -->
<footer>
<div class="footer">
  <h3>Created by Ali Mohammed, Abdullah Saeed, Feras Jalalah &copy; 2021</h3>
</div>
</footer>


</body>
</html>