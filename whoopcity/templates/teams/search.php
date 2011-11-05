<?php include 'header.php'; ?>

<div id="mainContent">

<h3> Search for <?php echo "".$row['head_coach_first'];echo "".$row['head_coach_last'];?> at <?php echo "".$row['college_name']; ?></h3>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h4> Looking for One Player</h4>

<table>
<tr><td>Search by AAU Team:</td></tr>
<tr><td>AAU Team:</td><td><input type="text" name="aau_team" maxlength="30"  value="<?php $aau_team ?>"  /></td></tr>
<tr><td>AAU Number:</td><td><input type="text" name="aau_number" maxlength="2"  value="<?php $aau_number ?>" size="1" /></td></tr>
<tr><td>First Name:</td><td><input type="text" name="first_name" maxlength="60"  value="<?php $first_name ?>" /></td></tr>
<tr><td>Last Name:</td><td><input type="text" name="last_name" maxlength="60"  value="<?php $last_name ?>" /></td></tr>
<tr><td>High School Team:</td><td><input type="text" name="highschool_team" maxlength="30"  value="<?php $highschool_team ?>" /></td></tr>
<tr><td>High School Number:</td><td><input type="text" name="highschool_number" maxlength="2"  value="<?php $highschool_number ?>" size="1"/></td></tr>
<tr><td><input type="submit" name="submit" value="Search"></td></tr>
</table>

<?php

// Retrieve data from table PLAYERS_INFO by AAU TEAM

$result = mysql_query("SELECT * FROM players_info WHERE 

(aau_team = '".$_POST['aau_team']."' )

AND 

(first_name = '".$_POST['first_name']."'	 
OR
last_name = '".$_POST['last_name']."'	
OR
aau_number = '".$_POST['aau_number']."'	
OR
highschool_number = '".$_POST['highschool_number']."' 
OR
highschool_team = '".$_POST['highschool_team']."'

)
");
?>

<?php while ($row = mysql_fetch_array ($result)) {
echo '<p><table>
<tr><td><h3>Player</h3></td></tr>
<tr><td>Name:</td><td>'.$row[1]; echo ' '.$row[2]; echo '</td></tr>
<tr><td>AAU Team:</td><td>'.$row[5];  echo '</td></tr>
<tr><td>AAU Number:</td><td>' .$row[6]; echo '</td></tr>
<tr><td>High School Team:</td><td>' .$row[3]; echo '</td></tr>
<tr><td>High School Number:</td><td>' .$row[4]; echo' </td></tr>
<tr><td>Email:</td><td>' .$row[0]; echo' </td></tr>
</table></p>';

}?>
<br>
</div>

<?php include '../footer.php'; ?>
