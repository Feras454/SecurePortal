<?php
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username to make 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        //not match regular expersion 
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Construct a select statement.        
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // parameter
            $param_username = trim($_POST["username"]);
            
            // prepared statement
            if(mysqli_stmt_execute($stmt)){
                // store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    //password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    //confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">


<script>
function validateForm() {
  let x = document.forms["reg"]["username"].value;
  let y = document.forms["reg"]["password"].value;
  let z = document.forms["reg"]["confirm_password"].value;
  var usernamevalid = /^[a-zA-Z0-9_]+$/;
  
  if (x == "") {
    alert("Username must be filled out");
    return false;
  }
  if (!x.match(usernamevalid)){
      alert("Username can only contain letters, numbers, and underscores.");
      return false;

  }
  if (y == "") {
    alert("Password must be filled out");
    return false;
  }
  if (z == "") {
    alert("Password must be filled out");
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
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form name="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="button5" value="Submit">
                <input type="reset" class="button5" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>

<!-- end of body page -->
<footer>
<div class="footer">
  <h3>Created by Ali Mohammed, Abdullah Saeed, Feras Jalalah 2021</h3>
</div>
</footer>

</html>