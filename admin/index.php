<?php
session_start();	
if(isset($_SESSION['username'])){
header("location: dashboard.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Parking - Admin Login</title>
<link  href="css/style_css.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#2b2b2d" leftmargin="0px" marginwidth="0px" topmargin="0px"  >

  <div  align="center" class="title_head" id="vitlogo"> </div>
  <div  id="Title" class="layer2">Smart Parking - Admin Login </div>
  
 
    
	<div class="err" >
			 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			//echo '<p class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<p>',$msg,'</p>'; 
				}
			//echo '</p>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	</div>
		<div class="form_area">
		
      <form id="login_form" name="login_form" method="post"  action="login_exec.php" enctype="application/x-www-form-urlencoded">
     
  <div class="inset">
  <p>
    <label for="vname">Username</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </p>
  <p>
    <input type="checkbox" name="remember" id="remember">
    <label for="remember">Remember me </label>
  </p>
  </div>
  <p class="p-container">
    <span>Forgot password ?</span>
    <input type="submit" name="alogin" id="alogin" value="Log in">
  </p>
     
    </form>  
	  
	</div>
	  
	  
	  
	  
	  
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	

     
    
   <div class="foot">
   <p>Developed at IOT Lab, School of Electronics, VIT University, Chennai Campus.</p>

  </div>
  

</body>
</html>
