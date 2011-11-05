<?php include ('../config.php');


// Retrieve data from table PLAYERS by AAU TEAM

$result = mysql_query("SELECT * FROM players WHERE 

(".$_POST['type1']." = '".$_POST['type1_name']."' )

".$_POST['dec3']."
(".$_POST['type3']." = '".$_POST['type3_name']."' )

".$_POST['dec4']."
(SAT_score ".$_POST['eq4']." '".$_POST['type4_name']."' )

".$_POST['dec2']."
(cum_gpa  ".$_POST['eq2']." '".$_POST['type2_name']."' )

".$_POST['dec5']."
(".$_POST['type5']." ".$_POST['eq5']." '".$_POST['type5_name']."' )

".$_POST['dec6']."
(".$_POST['type6']." ".$_POST['eq6']." '".$_POST['type6_name']."' )

".$_POST['dec7']."
(".$_POST['type7']." ".$_POST['eq7']." '".$_POST['type7_name']."' )

".$_POST['dec8']."
(".$_POST['type8']." ".$_POST['eq8']." '".$_POST['type8_name']."' )

");


$result2 = mysql_query("SELECT * FROM aau WHERE 

aau_team = '$aau_team'

");

include 'header_profile.php'; 

?>

<div id="nav_bar"><!-- end #nav_bar --></div>

<div id="container">
   
<div id="mainContent">    

<h3>Search Player Database</h3>

<h4>Team Information</h4>

<table><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<tr><td></td><td><select name="type1">
<option value="aau_team" selected="selected" >AAU Team</option>
<option value="aau_number" >AAU Number</option>
<option value="highschool_number" >High School Name</option>
<option value="highschool_number" >High School Number</option>
</select></td>
<td><input type="text" name="type1_name" maxlength="30" value="example"/></td>

<tr><td><select name="dec3">
<option value="and not" selected="selected" >And not</option>
<option value="and" >And</option>
<option value="or" >Or</option>
</select>
</td>

<td><select name="type3">
<option value="aau_number" selected="selected" >AAU Number</option>
<option value="aau_team" >AAU Team</option> 
<option value="highschool_number" >High School Name</option>
<option value="highschool_number" >High School Number</option>

</select></td>
<td><input type="text" name="type3_name" maxlength="30" value="empty"/></td></tr></table>

<h4>Academic Information</h4>

<table>

<tr><td><select name="dec4">
<option value="and" selected="selected" >And</option>
<option value="and not" >And not</option>
<option value="or" >Or</option>
</select></td>

<td>SAT Score</td>

<td><select name="eq4">
<option value="=" >Equals</option>
<option value=">" selected="selected" >Greater than</option>
</select></td>

<td><input type="text" name="type4_name" maxlength="4"  value="1000"  /></td></tr>

<tr><td><select name="dec2">
<option value="and" selected="selected" >And</option>
<option value="and not" >And not</option>
<option value="or" >Or</option>
</select></td>

<td>Cummulative GPA</td>

<td><select name="eq2">
<option value="=" >Equals</option>
<option value=">=" selected="selected" >At Least</option>
</select></td>

<td><input type="text" name="type2_name" maxlength="4"  value="3.0"  /></td></tr>

</table>

</table>

<h4>Statistics</h4>

<table>

<tr><td><select name="dec5">
<option value="and" selected="selected" >And</option>
<option value="and not" >And not</option>
<option value="or ">Or</option>
</select></td>

<td><select name="type5">
<option value="pts_per" selected="selected" >Points per Game</option>
</select></td>

<td><select name="eq5">
<option value="=" >Equals</option>
<option value=">" selected="selected" >Greater than</option>
<option value=">" > Less than </option>
</select></td>

<td><input type="text" name="type5_name" maxlength="4"  value="1"  /></td></tr>

<tr><td><select name="dec6">
<option value="and" selected="selected" >And</option>
<option value="and not" ">And not</option>
<option value="or" >Or</option>
</select></td>

<td><select name="type6">
<option value="pts_per" selected="selected" >Rebounds per Game</option>
</select></td>

<td><select name="eq6">
<option value="=" >Equals</option>
<option value=">" selected="selected" >Greater than</option>
<option value=">" > Less than </option>
</select></td>

<td><input type="text" name="type6_name" maxlength="4"  value="1"  /></td></tr>

<tr><td><select name="dec7">
<option value="and" selected="selected" >And</option>
<option value="and not" ">And not</option>
<option value="or" >Or</option>
</select></td>

<td><select name="type7">
<option value="assists_per" selected="selected" >Assists per Game</option>
</select></td>

<td><select name="eq7">
<option value="=" >Equals</option>
<option value=">" selected="selected" >Greater than</option>
<option value=">" > Less than </option>
</select></td>

<td><input type="text" name="type7_name" maxlength="4"  value="1"  /></td></tr>

<tr><td><select name="dec8">
<option value="and" selected="selected ">And</option>
<option value="and not" ">And not</option>
<option value="or ">Or</option>
</select></td>

<td><select name="type8">
<option value="turnovers_per" selected="selected">Turnovers per Game</option>
</select></td>

<td><select name="eq8">
<option value="=" >Equals</option>
<option value=">" >Greater than</option>
<option value="<" selected="selected">Less than </option>
</select></td>

<td><input type="text" name="type8_name" maxlength="4"  value="4"  /></td></tr>

<tr><td>.</td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Search"></td></tr>	

</table>	

<?php

while ($row = mysql_fetch_array ($result)) {
echo '
<p><table>
<tr><td><h3>Player Search Results</h3></td></tr>
<tr><td>Name:</td><td>'.$row[2]; echo ' '.$row[3]; echo '</td></tr>
<tr><td>AAU Team:</td><td>' .$row[6]; echo '</td></tr>
<tr><td>AAU Number:</td><td>' .$row[7]; echo '</td></tr>
<tr><td>Email:</td><td> <a href="mailto:'.$row[0]; echo'"><u><font color="#404040">'.$row[0]; echo '</font></u></a></td></tr>
<tr><td>AAU Schedule:</td><td><a href="../AAU/a_excalendar_index?id='.$row[6]; echo '">
<img src="../images/_buttons/calendar.jpg"></a></td></tr>
<tr><td>View Transcript:</td><td><a href="../players/p_exprofile?id='.$row[1]; echo '">Here</a></td></tr>
</table></p><br>';

}

?>
</div>

<?php include 'footer.php'; ?>