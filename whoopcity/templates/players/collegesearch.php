<?php include 'login_confirm.php';



// Retrieve data from table COACHES by college_name

$result = mysql_query("SELECT * FROM coaches WHERE 
college_name = '".$_POST['search']."' 
OR head_coach_first = '".$_POST['search']."' 
OR head_coach_last = '".$_POST['search']."' 
OR city = '".$_POST['search']."' 
");

 include 'header_profile.php'; ?>


<div id="nav_bar_player" >
<font text-color=#565656>
| <a href="profile" ><font color="#565656">my profile</font> </a>
| <a href="profile_edit" ><font color="#565656">Edit profile</font> </a>
| <a href="http://wwww.ncaa.org" ><font color="#565656">NCAA </font></a>
|
 </font>  </div>
   
<div id="sidebar1">
<?php include '../sidebarad.html'; ?>
</div>
<div id="container_player">


<div id="mainContent_player">


<table>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<tr><td>Search:<input type="text" name="search" maxlength="30"  /></td></tr>
<tr><td><input type="submit" name="submit" value="Search"></td></tr>
</form>	
</table>	


<?php



while ($row = mysql_fetch_array ($result)) {
echo '<p><table>
<tr><td><h3>Player</h3></td></tr>
<tr><td>Head Coach Name:</td><td>'.$row['head_coach_first']; echo ' '.$row['head_coach_last']; echo '</td></tr>
<tr><td>Website:</td><td><a href="' .$row['wbb_site']; echo '">Click Here<font color="#000000">' .$row[22]; echo '</font></a></td></tr>
</table></p>';

}?>

<? include '../footer.php'; ?>