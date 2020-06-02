<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '142.93.46.62');
define('DB_USERNAME', 'yzusvrrxqh');
define('DB_PASSWORD', '98PNzFN4Ay');
define('DB_NAME', 'yzusvrrxqh');
date_default_timezone_set('Africa/Kigali');

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', 'kigali@kigali');
// define('DB_NAME', 'employees');
// date_default_timezone_set('Africa/Kigali');


 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>