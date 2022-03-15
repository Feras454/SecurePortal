<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'sql205.epizy.com');
define('DB_USERNAME', 'epiz_30442708');
define('DB_PASSWORD', 'gkeqfgmX8RpE8vG');
define('DB_NAME', 'epiz_30442708_users');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>