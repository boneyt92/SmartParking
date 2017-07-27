<?php
ob_start();
session_start();
       	require_once('connection.php');
		//Array to store validation errors
    	$errmsg_arr = array();
		
     
    	//Validation error flag
    	$errflag = false;
     
    	//Function to sanitize values received from the form. Prevents SQL injection
    	function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
		$id1 = $_POST['id1'];
		$id2 = $_POST['id2'];
		$id3 = $_POST['id3'];
		$id4 = $_POST['id4'];
		$id5 = $_POST['id5'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$vname = $_POST['vname'];
		$password = $_POST['password'];
		$password = md5($password);
		
		if($id1 == ''||$id2 == ''||$id3 == ''||$id4 == ''||$id5 == '') {
    		$errmsg_arr[] = 'Error : Please Enter a Valid Code';
    		$errflag = true;
    	}
		if($errflag) {
    		$_SESSION['BAL_ERR'] = $errmsg_arr;
    		session_write_close();
    		header("location: vehicle.php");
    		exit();
    	}
		
		$ins = "INSERT INTO vehicles (u1,u2,u3,u4,u5,bal,fname,lname,vname,slot,password)
VALUES ('$id1','$id2', '$id3','$id4','$id5', 0,'$fname','$lname','$vname',1,'$password')";
$retval = mysql_query( $ins);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

$errmsg_arr[] = 'Data Added Sucessfully';
    		$errflag = true;
			if($errflag) {
    		$_SESSION['BAL_ERR'] = $errmsg_arr;
    		session_write_close();
    		header("location: vehicle.php");
    		exit();
    	}
		
		  ?>
