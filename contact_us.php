<?php

session_start();
 

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<style>
    input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

</style>



<script>
function validateForm() {
  let x = document.forms["contactusform"]["name"].value;
  let y = document.forms["contactusform"]["phone"].value;
  let z = document.forms["contactusform"]["subject"].value;
  var namevalid = /^[a-zA-Z ]+$/;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  if (!x.match(namevalid)){
    alert("Name can only contain letters.");
    return false;
  }
  if (y == "") {
    alert("Phone must be filled out");
    return false;
  }
  if (z == "") {
    alert("Subject must be filled out");
    return false;
  }

}
</script>


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
<div class="textbox">
  <form action="/index.php" name="contactusform" onsubmit="return validateForm()">
    <label style="float:left" for="name"><h2>Name</h2></label>
    <input type="text" id="name" name="name"  placeholder="Your name.." >

    <label style="float:left" for="lname"><h2>Phone number </h2></label> 
    <input type="text" id="phone" name="phone"  placeholder="Your Phone number.. format *966000000000*" pattern="^\d{12}$" >
    <label style="float:left" for="country"><h2>Country</h2></label>
    <select id="country" name="country">
      <option value="Saudi">Saudi</option>
      <option value="Other">Other</option>
    </select>

    <label style="float:left" for="subject"><h2>Subject</h2></label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit" class="button5">
  </form>
  
</div>
<br><br><br><br><br><br><br><br><br>
</body>

<!-- end of body page -->
<footer>
<div class="footer">
  <h3>Created by Ali Mohammed, Abdullah Saeed, Feras Jalalah &copy; 2021</h3>
</div>
</footer>

 </html>   