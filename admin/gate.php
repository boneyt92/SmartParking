<?php
session_start();
if(!(isset($_SESSION['username']))){
         header("location: index.php"); }
require_once('connection.php');
/*$page = $_SERVER['PHP_SELF'];
$sec = "1";
header("Refresh: $sec; url=$page");*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="1; gate.php">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Parking - Admin Panel</title>
<link  href="css/style_css.css" rel="stylesheet" type="text/css" />
<link  href="css/style_dash.css" rel="stylesheet" type="text/css" />


</head>

<body bgcolor="#2b2b2d" leftmargin="0px" marginwidth="0px" topmargin="0px"  >

  
 <div  id="Title" class="layer2"><a href="dashboard.php" style="color:#FFFFFF">Smart Parking</a></div>
  
  <div class="dash_bg" >
  <div class="welcome_table" >
  <div class="table_border" >
    <table width="75%" border="0" cellspacing="10" cellpadding="3" align="center" bordercolor="#666666" >
      <tr> 
        <td width="5%">Welcome</td>
        <td width="55%" style="text-transform:uppercase"  > <?php 
		
		//mysql_select_db('smartparking');
		$extract = mysql_query("SELECT * FROM new_entry ") or die(mysql_error());
		$numrows = mysql_num_rows($extract);
		if ($numrows!=0)
		{
             while($row = mysql_fetch_assoc($extract))
    	  {   $vname= $row['vname']; 
		      $pspace=$row['pspace'];
			  $slot=$row['slot'];
		  }
		}		
		echo '<span style="font-size:20px" >'.$vname.'</span>';?> </td>
		        <td width="40%" style="color:#CCCCCC"> <?php date_default_timezone_set('Asia/Calcutta'); $today = date("D F j, Y, H:i:s");echo $today; ?>   </td>
      </tr>
    </table>
	</div>
	<table width="60%" border="0" cellspacing="2" cellpadding="10" align="center" style="padding-top:2%" >
	<tr> <td>
	<table width="60%" border="0" cellspacing="2" cellpadding="10" >
  <tr>
    <td style="font-size:15px">Vehicle Number:</td>
	<td><?php echo '<span style="font-size:35px" >'.$vname.'</span>'; ?></td>
  </tr>
  <tr>
    <td style="font-size:15px ">Parking Area:</td>
	<td><?php echo '<span style="font-size:35px" >'.$pspace.'</span>'; ?></td>
  </tr>
</table>
</td>
<td><p>Park Your Vehicle at Slot:</p>
<?php echo '<span style="font-size:150px" >'.$slot.'</span>'; ?>

</td>
</tr>
</table>

	</div>
  </div>
 
</body>
   <div class="footer" style="margin-top:15%"> Developed at IoT Lab, School of Electronics, VIT University, Chennai Campus. </div>
</html>