<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '50.62.209.112:3306');
define('DB_USERNAME', 'thakkar.kartik');
define('DB_PASSWORD', 'kartik123');
define('DB_NAME', 'auctorDB');

session_start(); 
extract($_REQUEST); // Creating PHP Variables corresponding to Control
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function SessionCheck()
{
    if($_SESSION["loginID"]==NULL || $_SESSION["loginID"]=="")
    {
        header("location:login.php");
    }
}
?>
