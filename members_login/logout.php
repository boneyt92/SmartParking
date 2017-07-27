<?php
ob_start();
session_start();
unset($_SESSION['vname']);
header("location: index.php");
?>
<title>Logout</title>