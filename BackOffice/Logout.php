<?php 
session_start();
unset($_SESSION["UserID"]);
unset($_SESSION["PersonName"]);
unset($_SESSION["IsAdmin"]);
session_destroy();
header("location:index.php");
?>