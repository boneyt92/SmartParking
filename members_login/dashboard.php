<?php
session_start();
if(!(isset($_SESSION['vname']))){
         header("location: index.php"); }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Parking - Dashboard</title>
<link  href="css/style_css.css" rel="stylesheet" type="text/css" />
<link  href="css/style_dash.css" rel="stylesheet" type="text/css" />


</head>

<body bgcolor="#2b2b2d" leftmargin="0px" marginwidth="0px" topmargin="0px"  >

  
  <div  id="Title" class="layer2">Smart Parking - Dashboard </div>
  
  <div class="dash_bg" >
  <div class="welcome_table" >
  <div class="table_border" >
    <table width="75%" border="0" cellspacing="10" cellpadding="3" align="center" bordercolor="#666666" >
      <tr> 
        <td width="5%">Welcome</td>
        <td width="55%" style="text-transform:uppercase"  > <?php $vname=$_SESSION['vname'];$fname=$_SESSION['fname'];$lname=$_SESSION['lname']; $name=$fname." ".$lname.", ".$vname; echo '<span style="font-size:20px" >'.$name.'</span>';?> </td>
		        <td width="40%" style="color:#CCCCCC"> <?php date_default_timezone_set('Asia/Calcutta'); $today = date("D F j, Y, H:i:s");echo $today; ?>   </td>
      </tr>
    </table>
	</div>
	<div class="balance_report" >
	You have Rs <?php $bal=$_SESSION['bal']; echo '<span style="font-size:20px">'.$bal.'</span>'; ?> in your Account.
	<?php if($_SESSION['bal']<40)  echo '<span id="blink" style="color:#FF0000">'."Low Balance, Recharge Immedieately".'</span>'; ?>
	</div>
	
	<table width="60%" border="0" cellspacing="5" cellpadding="10"  align="center" class="tabletopspace">
  <tr> 
    <td><a href="recharge.php"><img src="buttons/recharge.png" alt="recharge" border="0" align="bottom" /></a></td>
    <td><a href="#"><img align="bottom" src="buttons/profile.png" alt="profile" /></td>
  </tr>
  <tr  class="tabletopspace">
    <td><a href="#"><img align="bottom" src="buttons/password.png" alt="password_change" /></td>
    <td><a href="#"><img align="bottom" src="buttons/complaint.png" alt="Complaint" /></td>
  </tr>
  <tr style="width:100%">
    <td><a href="logout.php"><img src="buttons/logout.png" alt="Logout" /></td>
    
  </tr>
</table>

  </div>
  </div>
 
  </body>
   <div class="footer"> Developed at IoT Lab, School of Electronics, VIT University, Chennai Campus. </div>
</html>