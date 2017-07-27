<?php
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
     $code = $_POST['code'];
	 $vname= $_SESSION['vname'];
	# echo $code;
	 if($code == '') {
    		$errmsg_arr[] = 'Error : Please Enter a Valid Code';
    		$errflag = true;
    	}
		if($errflag) {
    		$_SESSION['BAL_ERR'] = $errmsg_arr;
    		session_write_close();
    		header("location: recharge.php");
    		exit();
    	}
		 
		$extract = mysql_query("SELECT * FROM recharge_coupon WHERE code= '$code' ORDER BY num ASC") or die(mysql_error());
		$numrows = mysql_num_rows($extract);
		if ($numrows!=0)
		{
             while($row = mysql_fetch_assoc($extract))
    	  {   $value= $row['value']; }
		    $bal=$_SESSION['bal']; 
	        $newbal= $bal+$value; 
		    $update = mysql_query("UPDATE vehicles SET bal=$newbal WHERE vname='$vname'");
		    if( ! $update ) {
                 die('Error : ' . mysql_error()); 
                        }
		     $_SESSION['bal']=$newbal;
					    $errmsg_arr[] = 'Recharge Sucessfull';
    					$errflag = true;
		     if($errflag) {
    	    			    $_SESSION['BAL_ERR'] = $errmsg_arr;
    				        session_write_close();
    				        header("location: recharge.php");
    				        exit();
    			          }
		}
		else 
		{       $errmsg_arr[] = 'Enter a Valid Code';
    			$errflag = true;
				if($errflag) {
    				$_SESSION['BAL_ERR'] = $errmsg_arr;
    				session_write_close();
    				header("location: recharge.php");
    				exit();
		        }
		}
		
		
  ?>