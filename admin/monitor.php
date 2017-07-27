<?php
session_start();
	require_once('connection.php');
if(!(isset($_SESSION['username']))){
         header("location: index.php"); }
		 
	/*	 $page = $_SERVER['PHP_SELF'];
         $sec = "1";
          header("Refresh: $sec; url=$page");*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="refresh" content="1; monitor.php">
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
	<table width="60%" border="0" cellspacing="2" cellpadding="10" align="center" style="padding-top:5%">
  <tr>
    <td>Free Slots Available: <?php 
	    //mysql_select_db('smartparking');
		$extract = mysql_query("SELECT * FROM parking_1 WHERE slotvalue= 0 ORDER BY num ASC") or die(mysql_error());
		$freeslots = mysql_num_rows($extract);
		$extract1 = mysql_query("SELECT * FROM parking_1 WHERE reserved!= 0 ORDER BY num ASC") or die(mysql_error());
		$reservations = mysql_num_rows($extract1);
	    echo $freeslots;
		?>	
		
	</td>
    <td>Reservations: <?php echo $reservations; ?> </td>
  </tr>
  <tr>
    <td>Current Vehicle : <?php 
	    //mysql_select_db('smartparking');
		$extract = mysql_query("SELECT * FROM new_entry ") or die(mysql_error());
		$numrows = mysql_num_rows($extract);
		if ($numrows!=0)
		{
             while($row = mysql_fetch_assoc($extract))
    	  {   $vname= $row['vname']; 
		      $slot=$row['slot'];
		  }
		}	
		echo $vname;
		?>	
	</td>
    <td>Slot : <?php echo $slot; ?></td>
  </tr>
  <tr>
  <td> <p>&nbsp;</p><p>&nbsp;</p><a href="parkingslot.php"><img align="bottom" src="button/parking.png" alt="parking_slot" /></td>
  <td> <p>&nbsp;</p><p>&nbsp;</p><a href="dashboard.php"><img align="bottom" src="button/home.png" alt="Home" /></td>
  </tr>
</table>

	
	</div>
  </div>
 
  </body>
   <div class="footer" style="margin-top:15%"> Developed at IoT Lab, School of Electronics, VIT University, Chennai Campus. </div>
</html>