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
<title>What's CTF?</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">

<script>
    function submit() {
        var userflag = document.getElementById("flag").value;
        var flag = "flag{fullmark1337}";
        if (flag == userflag) {
            alert("Will done, you got it!");}
        else{
            alert("WRONG!!! check the hint");
}}
</script>
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
      <h1 class="title"><strong> What is CTF and how to get started! </strong></h1>
     <!-- <img src="https://i.pinimg.com/originals/19/6f/32/196f325972bc38eae76e84a4df4ed1d2.png" height="300" wight="800" alt="CTF Img">-->
     
     <iframe width="1120" height="630" src="https://www.youtube.com/embed/Lus7aNf2xDg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      <h2> CTFs are one of my favorite hobbies. I love the feeling of solving a particularly difficult task and seeing all the puzzle pieces click together. I'd like this post to serve as an introduction to CTF for those in the dev.to community that may not know what it is.</h2>
      <h1 class="title"> So what is CTF? </h1>
      <h3> CTF (Capture The Flag) is a kind of information security competition that challenges contestants to solve a variety of tasks ranging from a scavenger hunt on wikipedia to basic programming exercises, to hacking your way into a server to steal data. In these challenges, the contestant is usually asked to find a specific piece of text that may be hidden on the server or behind a webpage. This goal is called the flag, hence the name!</h3>
      <h3>Like many competitions, the skill level for CTFs varies between the events. Some are targeted towards professionals with experience operating on cyber security teams. These typically offer a large cash reward and can be held at a specific physical location. Other events target the high school and college student range, sometimes offering monetary support for education to those that place highly in the competition!</h3>
      <h3>CTFtime details the different types of CTF. To summarize, Jeopardy style CTFs provide a list of challenges and award points to individuals or teams that complete the challenges, groups with the most points wins. Attack/Defense style CTFs focus on either attacking an opponent's servers or defending one's own. These CTFs are typically aimed at those with more experience and are conducted at a specific physical location.</h3>
      <h3>CTFs can be played as an individual or in teams so feel free to get your friends onboard!</h3>
      <h3>I'd like to stress that CTFs are available to everyone. Many challenges do not require programming knowledge and are simply a matter of problem solving and creative thinking.</h3>
      
      <h1 class="title">Challenge types</h1>
          <p><strong>Cryptography</strong> - Typically involves decrypting or encrypting a piece of data</p>
          <p><strong>Steganography</strong> - Tasked with finding information hidden in files or images</p>
          <p><strong>Binary</strong> - Reverse engineering or exploiting a binary file</p>
          <p><strong>Web</strong> - Exploiting web pages to find the flag</p>
          <p><strong>Pwn</strong> - Exploiting a server to find the flag</p>
          <h1 class="title">Simple Challenge for you!</h1>
          <h3>challenge description: <br> This is simple one you just need to inspect it</h3>
          <input type="text" placeholder="flag{put the flag here}" name="flag" id="flag" maxlength="20" size="20">
          <br><br>
          <input type="submit" class="button5" value="submit" id="flag_submit" onclick="submit()">
          <input type="submit" value="hint" class="button5" id="hint" onclick="alert('ctrl + U')">
                        
          <br><br><br><br><br><br><br>
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