<?php 


//This is the directory where images will be saved 
$target = "pictures/"; 
$target = $target . basename( $_FILES['pic']['email']); 

//This gets all the other information from the form 
$pic=($_FILES['pic']); 

// Connects to your Database 
$hostname='p50mysql289.secureserver.net';
$username='whoopcitysignin';
$password='StAndrews11';
$dbname='whoopcitysignin';

mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
mysql_select_db($dbname);


//Writes the information to the database 
mysql_query("UPDATE players_info SET pic = '".$_FILES['pic']."' where email = email") ; 

//Writes the pic to the server 
if(move_uploaded_file($_FILES['pic'], $target)) 
{ 

//Tells you if its all ok 
echo "The file ". basename( $_FILES['uploadedfile']). " has been uploaded, and your information has been added to the directory"; 
} 
else { 

//Gives and error if its not 
echo "Sorry, there was a problem uploading your picture."; 
} 
?>