<?php
ob_start();
session_start();
if(!(isset($_SESSION['username']))){
         header("location: index.php"); }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Parking - Admin Panel</title>
<link  href="css/style_css.css" rel="stylesheet" type="text/css" />
<link  href="css/style_dash.css" rel="stylesheet" type="text/css" />


</head>

<body bgcolor="#2b2b2d" leftmargin="0px" marginwidth="0px" topmargin="0px"  >

  
  <div  id="Title" class="layer2"><a href="dashboard.php" style="color:#FFFFFF">Smart Parking - Admin Panel </a></div>
  
  <div class="dash_bg" >
  <div class="welcome_table" >
  <div class="table_border" >
    <table width="75%" border="0" cellspacing="10" cellpadding="3" align="center" bordercolor="#666666" >
      <tr> 
        <td width="5%">Welcome</td>
        <td width="55%" style="text-transform:uppercase"  > <?php $fname=$_SESSION['fname'];$lname=$_SESSION['lname']; $name=$fname." ".$lname; echo '<span style="font-size:20px" >'.$name.'</span>';?> </td>
		        <td width="40%" style="color:#CCCCCC"> <?php date_default_timezone_set('Asia/Calcutta'); $today = date("D F j, Y, H:i:s");echo $today; ?>   </td>
      </tr>
    </table>
	</div>
	<div class="addvehicle">
	<h1>Add New Vehicle </h1>
	<form action="addvehicle.php" method="post" enctype="application/x-www-form-urlencoded" name="addvehicle">
	<div class="err" >
			 <?php
			if( isset($_SESSION['BAL_ERR']) && is_array($_SESSION['BAL_ERR']) && count($_SESSION['BAL_ERR']) >0 ) {
			//echo '<p class="err">';
			foreach($_SESSION['BAL_ERR'] as $msg) {
				echo '<p>',$msg,'</p>'; 
				}
			//echo '</p>';
			unset($_SESSION['BAL_ERR']);
			}
		?>
	</div>
	  <label> Enter the RFID Tag Details: </label>
	  <table width="80%" border="0" cellspacing="15" cellpadding="5">
        <tr>
          <td><input type="text" name="id1" /></td>
          <td><input type="text" name="id2" /></td>
          <td><input type="text" name="id3" /></td>
          <td><input type="text" name="id4" /></td>
          <td><input type="text" name="id5" /></td>
        </tr>
      </table>
	    <table width="100%" border="0" cellspacing="15" cellpadding="5">
        <tr>
          <td>First Name:</td>
          <td><input type="text" name="fname" /></td>
          <td>Last Name:</td>
          <td><input type="text" name="lname" /></td>
		  </tr>
		  <tr>
          <td>Vehicle Number:</td>
		   <td><input type="text" name="vname"  style="text-transform:capitalize"/></td>
		   <td>Password:</td>
		   <td><input type="password" name="password" /></td>
        </tr>
      </table>
	  <input name="submit" type="submit" value="Submit" />
	  <p>&nbsp;</p>
	</form>
	</div>
	</div>
  </div>
 
  </body>
   <div class="footer" style="margin-top:12%"> Developed at IoT Lab, School of Electronics, VIT University, Chennai Campus. </div>
</html>