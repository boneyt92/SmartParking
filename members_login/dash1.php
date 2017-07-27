
<?php
echo "<h1> Smart Parking </h1>";
session_start();

		if(!(isset($_SESSION['vname']))){
         header("location: index.php"); }
		 
				$vname= $_SESSION['vname']; echo $vname;
				$fname=  $_SESSION['fname'];  echo $fname;
				$lname=$_SESSION['lname'];    echo $lname;
				$bal=$_SESSION['bal'];  echo $bal;
	
	
	require("connection.php");
mysql_select_db('smartparking');
$extract = mysql_query("SELECT * FROM vehicles WHERE vname='$vname' ORDER BY num ASC") or die(mysql_error());
$numrows = mysql_num_rows($extract);
$row = mysql_fetch_assoc($extract);
$bal= $row['bal'];
			
				echo "Welcome " ; echo $fname; echo " "; echo $lname;
				
				echo "\n";
				echo "You have Rs."; echo $bal; echo " in your account.";
                    
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dashboard</title>
</head>



<form id="recharge" name="recharge" method="post" action="recharge.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>Recharge Amount: 
    <input name="amnt" type="text" id="amnt" />
    <input name="Recharge" type="submit" id="Recharge" value="Submit" />
  </p>
</form>