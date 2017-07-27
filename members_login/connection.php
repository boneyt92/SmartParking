 <?php
    $mysql_hostname = "localhost";
    $mysql_user = "artistas_aes";
    $mysql_password = "iot&505a";
    $mysql_database = "artistas_smartparking";
    //$prefix = "";
    $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
    mysql_select_db($mysql_database) or die("Could not select database");
?>