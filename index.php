<?php include 'config.php';

$usertype = $_POST['user_type'];
$page = $usertype;

if($usertype == 'coaches'){
	$page = 'college';	}

if($usertype == 'aau'){
	$page = 'AAU'; }
		
//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site']))

//if there is, it logs you in and directes you to the members page
{ 
$email = $_COOKIE['ID_my_site']; 
$pass = $_COOKIE['Key_my_site']; 
$usertype = $_COOKIE['Usertype_my_site']; 
$page = $_COOKIE['Page_my_site']; 
$check = mysql_query("SELECT * FROM $usertype WHERE email = '$email'") or die(mysql_error());
while($info = mysql_fetch_array( $check )) 
{
if ($pass != $info['password']) 
{
}
else
{
header("Location: ../$page/profile");
}
}
}
//if the login form is submitted
if (isset($_POST['submit'])) { 

// makes sure they filled it in
if(!$_POST['email'] | !$_POST['pass']) {
 header('Location:index');
		    die();
		    fwrite($f,'Test');
	 		fclose($f);
}


// checks it against the database
if (!get_magic_quotes_gpc()) {
$_POST['email'] = addslashes($_POST['email']);
}
$check = mysql_query("SELECT * FROM $usertype WHERE email = '".$_POST['email']."'")or die(mysql_error());

//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
if ($check2 == 0) {		  
            header('Location: index');

}
//not working on the coach site
while($info = mysql_fetch_array( $check )) {
$_POST['pass'] = stripslashes($_POST['pass']);
$info['password'] = stripslashes($info['password']);
$_POST['pass'] = md5($_POST['pass']);
//gives error if the password is wrong
if ($_POST['pass'] != $info['password']) {
 header('Location: index');	
}
else 
{ 
// if login is ok then we add a cookie 
$_POST['email'] = stripslashes($_POST['email']); 
$hour = time() + 3600; 
setcookie(ID_my_site, $_POST['email'], $hour); 
setcookie(Key_my_site, $_POST['pass'], $hour); 
setcookie(Usertype_my_site, $usertype, $hour); 
setcookie(Page_my_site, $page, $hour); 


//then redirect them to the members area 
  header("Location:../$page/profile"); 
}
} 
} 
else 
{ 
// if they are not logged in 

include 'header_nonlog.php'; ?>


<div id="nav_bar">
| <a href="initial" ><font color="#565656">Register Here </font></a>
|
<!-- end #nav_bar --></div>

<div id="container">

<div id="mainContent" >

<div id="signin" >

<h4><a href=initial>Register Here</a></h4>
<h4>Sign In Here</h4>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table>
<tr><td>I am a:</input></td></tr>
<tr><td>	<input type="radio" name="user_type" value="players"> Player</input></td></tr>
<tr><td>	<input type="radio" name="user_type" value="coaches"> Coach</input></td></tr>
<tr><td>    <input type="radio" name="user_type" value="aau"> AAU Manager</input></td></tr>
	<p>
<input type="hidden" name="md5pass"><tr><td>
Email:</td></tr><tr><td>
<input type="text" name="email" maxlength="40" size="25"></td></tr><tr><td>
Password:</td></tr><tr><td>
<input type="password" name="pass" maxlength="40" size="25"></td></tr><tr><td>
<input type="submit" name="submit" value="Login"></form></tr></td></table>
</div>

<div id="index_body" >
<table>
<tr><td align="center"><a href="college/c_about"> College Coaches </a></td>
<td align="center"><a href="players/p_about"> Players</a></td>
<td align="center"><a href="AAU/a_about"> AAU Teams</a></td>
</tr>

<tr><td align="center"><a href="college/c_about"> <img src="../images/coach.jpg" width="175" height="125" /> </a></td>
<td align="center"><a href="players/p_about"> <img src="../images/player.jpg" width="215" height="125" /> </a></td>
<td align="center"><a href="AAU/a_about"> <img src="../images/aau.jpg" width="175" height="125" /> </a></td>
</tr>
<tr><td align="center"><a href="college/c_about"> Learn More </a></td>
<td align="center"><a href="players/p_exprofile"> Example Profiles</a></td>
<td align="center"><a href="AAU/a_about"> What it Takes </a></td>
</tr>

<tr><td align="center" bgcolor="white"><a href="college/c_about"> <img src="../images/BR_logo.jpg" width="175"  /> </a></td>
<td align="center"><a href="players/p_exprofile"> <img src="../images/player.jpg" width="215" height="125" /> </a></td>
<td align="center"><a href="AAU/a_about"> <img src="../images/world.png" width="175" height="125" /> </a></td>
</tr>
</table>
</div>

<?php 
} 
?>
</div>
<br class="clearfloat" /><!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

<?php include 'footer.php'; ?>