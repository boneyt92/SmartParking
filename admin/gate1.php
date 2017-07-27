<?php
session_start();
$page = $_SERVER['PHP_SELF'];
$sec = "1";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart Parking</title>
<link  href="css/style_css.css" rel="stylesheet" type="text/css" />
<link  href="css/style_dash.css" rel="stylesheet" type="text/css" />

</head>

<body bgcolor="#2b2b2d" leftmargin="0px" marginwidth="0px" topmargin="0px"  >
<div class="heade" id="heade">  
<div  id="Title" class="layer2">Smart Parking</div>
  
  <div class="dash_bg" >
  <div class="welcome_table" >
    
    <p>&nbsp;</p>
    <table width="80%" border="0" cellspacing="5" cellpadding="3" align="center" style="margin-top:2%;">
      <tr><td>
	    <table width="50%" border="0" cellspacing="5" cellpadding="3" style="margin-top:1%;"  >
          <tr>
            <td width="75%">Vehicle Number:</td> 
            <td width="25%"> 
					<?php  require("connection.php");
mysql_select_db('smartparking');
$extract = mysql_query("SELECT * FROM new_entry  ORDER BY num ASC") or die(mysql_error());
$row = mysql_fetch_assoc($extract); 
$vname= $row['vname'];  echo $vname; ?>			  </td>
          </tr>
          <tr>
            <td>Parking Area: </td><td> 
			<?php  require("connection.php");
mysql_select_db('smartparking');
$extract = mysql_query("SELECT * FROM new_entry  ORDER BY num ASC") or die(mysql_error());
$row = mysql_fetch_assoc($extract); 
$pspace= $row['pspace'];  echo $pspace; ?>	 </td>
          </tr>
        </table>
	  </td>
	  <td>   
	  <?php  require("connection.php");
mysql_select_db('smartparking');
$extract = mysql_query("SELECT * FROM new_entry  ORDER BY num ASC") or die(mysql_error());
$row = mysql_fetch_assoc($extract); 
$slot= $row['slot'];  echo '<h1>'. $slot .'</h1>' ?>	
	   </td>
	  
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  </div>
  
  </body>
</html>