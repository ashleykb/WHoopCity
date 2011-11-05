<?php 

//Connect To Database
$hostname='p50mysql289.secureserver.net';
$username='whoopcitysignin';
$password='StAndrews11';
$dbname='whoopcitysignin';
$account='herrow';


mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);

$email = $_COOKIE['ID_my_site'];
$result=mysql_query("SELECT pic FROM players_info WHERE email=email") or die("Can't perform Query"); 
$row=mysql_fetch_object($result); 
Header( "Content-type: image/gif"); 
echo $row->pic; 
?> 