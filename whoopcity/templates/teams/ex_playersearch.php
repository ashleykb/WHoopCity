<?php include ('../config.php');


// Retrieve data from table PLAYERS by AAU TEAM

$result = mysql_query("SELECT * FROM players WHERE 

(aau_team = '".$_POST['aau_team']."' )

AND 

(password = '".$_POST['example']."' )

(aau_number = '".$_POST['aau_number']."'	
OR

first_name = '".$_POST['first_name']."'	 
OR
last_name = '".$_POST['last_name']."'	

)
");
include 'header_profile.php'; ?>


<div id="nav_bar">

<!-- end #nav_bar --></div>

 
<div id="container">
   
<div id="mainContent">    


<table>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<tr><td>
AAU Team:Required Field:<input type="text" name="aau_team" maxlength="30"  value="<?php $aau_team ?>"  />
AAU Number:</td><td><input type="text" name="aau_number" maxlength="2"  value="<?php $aau_number ?>" size="1"  />
First Name:<input type="text" name="first_name" maxlength="60"  value="<?php $first_name ?>"  />
Last Name:<input type="text" name="last_name" maxlength="60"  value="<?php $last_name ?>"  />
<input type="submit" name="submit" value="Search"></td></tr>	

</table>	

<?php

while ($row = mysql_fetch_array ($result)) {
echo '
	<p><table>
<tr><td><h1>Player</h1></td></tr>
<tr><td>Name:</td><td>'.$row[2]; echo ' '.$row[3]; echo '</td></tr>
<tr><td>AAU Number:</td><td>' .$row[7]; echo '</td></tr>
<tr><td>Email:</td><td> <a href="mailto:'.$row[0]; echo'"><u><font color="#404040">'.$row[0]; echo '</font></u></a></td></tr>
<tr><td> AAU Schedule: </td><td> Coming Soon :) </td></tr>
</table></p>';


}

?>

</div>

<?php include 'footer.php'; ?>