<?php 
session_start();
session_destroy();
//setcookie("username", false);
//unset($_COOKIE['username']);
header("Location: login.php");
?>