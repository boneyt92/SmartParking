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
     
    	//Sanitize the POST values
    	$vname = $_POST['vname'];
		$password = $_POST['password'];
        $password= md5($password);
    	//Input Validations
    	if($vname == '') {
    		$errmsg_arr[] = 'Error : Vehicle Name missing';
    		$errflag = true;
    	}
    	if($password == '') {
    		$errmsg_arr[] = 'Error : Password missing';
    		$errflag = true;
    	}
     
    	//If there are input validations, redirect back to the login form
    	if($errflag) {
    		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    		session_write_close();
    		header("location: index.php");
    		exit();
    	}
     
    	//Create query
    	$qry="SELECT * FROM vehicles WHERE vname='$vname' and password= '$password'";
    	$result=mysql_query($qry);
     
    	//Check whether the query was successful or not
    	if($result) {
    		if(mysql_num_rows($result) > 0) {
    			//Login Successful
    			session_regenerate_id();
    			$member = mysql_fetch_assoc($result);
    			$_SESSION['bal'] = $member['bal'];
    			$_SESSION['vname'] = $member['vname'];
    			$_SESSION['fname'] = $member['fname'];
				$_SESSION['lname'] = $member['lname'];
    			session_write_close();
    			header("location: dashboard.php");
    			exit();
    		}else {
    			//Login failed
    			$errmsg_arr[] = 'User name or Password not found on the server';
    			$errflag = true;
    			if($errflag) {
    				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    				session_write_close();
    				header("location: index.php");
    				exit();
    			}
    		}
    	}else {
    		die("Query failed");
    	}
  ?>