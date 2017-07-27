<?php
session_start();
if(!(isset($_SESSION['username']))){
         header("location: index.php"); }
		 require_once('connection.php');
		  
		/* $page = $_SERVER['PHP_SELF'];
         $sec = "1";
          header("Refresh: $sec; url=$page");*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Parking - Admin Panel</title>
<meta http-equiv="refresh" content="1; parkingslot.php">
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
	<div class="parking_details">
	<table width="60%" border="0" cellspacing="2" cellpadding="10" align="center">
  <tr><td>Sl No:</td><td>Slot Number:</td><td>Vehicle Number:</td><td>In Time</td>
  </tr> <?php 
  //mysql_select_db('smartparking');
		$extract = mysql_query("SELECT * FROM parking_1 ORDER BY num ASC") or die(mysql_error());
		$numrows = mysql_num_rows($extract);
		if ($numrows!=0)
		{
             while($row = mysql_fetch_assoc($extract))
    	  {   echo "<tr><td>".$row['num']."</td><td>".$row['slotname']."</td><td>".$row['vehicle']."</td><td>".$row['timein']."</td> </tr>";
		  }
		}
		?>  
</table>	
	</div>
	
	</div>
  </div>
 
</body>
   <div class="footer" style="margin-top:10%"> Developed at IoT Lab, School of Electronics, VIT University, Chennai Campus. </div>
</html>