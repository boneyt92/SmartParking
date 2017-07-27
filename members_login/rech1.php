<?php

$amnt = $_POST['amnt'] ;
echo $amnt;
session_start();

		if(!(isset($_SESSION['SESS_FNAME']))){
         header("location: index.php"); }
		 
		$vname= $_SESSION['SESS_FNAME'];
		
		echo $vname; 
		require("connection.php");
  mysql_select_db('artistas_rpi');
$update = mysql_query("UPDATE UID SET bal=$amnt WHERE vname='$vname'");
if( ! $update ) {
             die('Error : ' . mysql_error()); 
            }
			else {
			header("location: dashboard.php");
			}
		?>