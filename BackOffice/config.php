<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kayyblog');
 
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