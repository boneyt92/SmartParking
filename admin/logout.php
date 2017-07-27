<?php
//error_reporting(0);
session_start();
session_destroy();
unset($_SESSION['username']);
header("location: index.php");
?>

<title>Logout</title>