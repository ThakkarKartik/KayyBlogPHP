<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '50.62.209.112:3306');
define('DB_USERNAME', 'thakkar.kartik');
define('DB_PASSWORD', 'kartik123');
define('DB_NAME', 'auctorDB');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
extract($_REQUEST);
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function SessionCheck()
{
    if($_SESSION["UserID"]=="" || $_SESSION["UserID"]==NULL)
    {
        header("location:index.php");
    }
}

?>