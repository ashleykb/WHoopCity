<?php include 'login_confirm.php'; 

//This code runs if the form has been submitted
if (isset($_POST['submit'])) { 

// now we update the database COACHES
$update = mysql_query("
UPDATE coaches 
SET 
	college_name	 	=		'".$_POST['college_name']."'		,
	head_coach_first 	=		'".$_POST['head_coach_first']."'	,
	head_coach_last 	=		'".$_POST['head_coach_last']."'		,
	title2				=		'".$_POST['title2']."'				,
	title2_first		=		'".$_POST['title2_first']."'		,
	title2_last			=		'".$_POST['title2_last']."'			,
	title3				=		'".$_POST['title3']."'				,
	title3_first		=		'".$_POST['title3_first']."'		,
	title3_last			=		'".$_POST['title3_last']."'			,
	title4				=		'".$_POST['title4']."'				,
	title4_first		=		'".$_POST['title4_first']."'		,
	title4_last			=		'".$_POST['title4_last']."'			,
	school_site 		=		'".$_POST['school_site']."'			,
	city 				=		'".$_POST['city']."'				,
	state 				=		'".$_POST['state']."'				,
	wbb_site 			=		'".$_POST['wbb_site']."'			,
	mascot 				=		'".$_POST['mascot']."'				,
	inception			=		'".$_POST['inception']."'			,
	population 			=		'".$_POST['population']."'			,
	info				=		'".$_POST['info']."'	
	
WHERE email				=		'$email'
");

header("location: profile");

} 
else 
{ 


include 'header_profile.php'; ?>

<div id="nav_bar_index">
   
| <a href="profile"><font color="#565656">my profile</font> </a>
| <a href="playersearch" >search players</a>
| <a href="http://whoopcity.com/ncaa.html" >NCAA </a>
| <a href="http://whoopcity.com/logout.php" ><font color="#565656">logout </font></a>
|

<!-- end #nav_bar --></div>

<body class="whoop">

 
<div id="container_college">

   
<div id="mainContent_college">

<h3> Update Profile for <?php echo "".$row['college_name']; ?></h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<h4> Information for Student-Athletes </h4>

<table>


<tr><td><u>Head Coach				</u></td><td>
<tr><td>First Name:				</td><td><input type="text" name="head_coach_first" maxlength="40"></td></tr>
<tr><td>Last Name:				</td><td><input type="text" name="head_coach_last" maxlength="40"></td></tr>
<tr><td>Assitant Coach Title:	</td><td><input type="text" name="title2" maxlength="40"></td></tr>
<tr><td>First Name:				</td><td><input type="text" name="title2_first" maxlength="40"></td></tr>
<tr><td>Last Name:				</td><td><input type="text" name="title2_last" maxlength="40"></td></tr>
<tr><td>Assitant Coach Title:	</td><td><input type="text" name="title3" maxlength="40"></td></tr>
<tr><td>First Name:				</td><td><input type="text" name="title3_first" maxlength="40"></td></tr>
<tr><td>Last Name:				</td><td><input type="text" name="title3_last" maxlength="40"></td></tr>
<tr><td>Assitant Coach Title:	</td><td><input type="text" name="title4" maxlength="40"></td></tr>
<tr><td>First Name:				</td><td><input type="text" name="title4_first" maxlength="40"></td></tr>
<tr><td>Last Name:				</td><td><input type="text" name="title4_last" maxlength="40"></td></tr>
<tr><td>School Website:			</td><td><input type="text" name="school_site" maxlength="40"></td></tr>
<tr><td>WBB Webstite:			</td><td><input type="text" name="wbb_site" maxlength="40"></td></tr>
<tr><td>City:					</td><td><input type="text" name="city" maxlength="40"> 
State:</td><td><select name="state">

<?php function state_selection() {
	echo '<select name="state">';
		$states = array ('alabama'=>"AL",
'Alaska'=>"AK", 'Arizona'=>"AZ", 'Arkansas'=>"AR", 'California'=>"CA",'Colorado'=>"CO",'Connecticut'=>"CT",'Delaware'=>"DE",'District Of Columbia'=>"DC",'Florida'=>"FL",'Georgia'=>"GA",'Hawaii'=>"HI",'Idaho'=>"ID",'Illinois'=>"IL",'Indiana'=>"IN",'Iowa'=>"IA",'Kansas'=>"KS",'Kentucky'=>"KY",'Louisiana'=>"LA",'Maine'=>"ME",'Maryland'=>"MD",'Massachusetts'=>"MA",'Michigan'=>"MI",'Minnesota'=>"MN",'Mississippi'=>"MS",'Missouri'=>"MO",'Montana'=>"MT",'Nebraska'=>"NE",'Nevada'=>"NV",'New Hampshire'=>"NH",'New Jersey'=>"NJ",'New Mexico'=>"NM",'New York'=>"NY",'North Carolina'=>"NC",'North Dakota'=>"ND",'Ohio'=>"OH",'Oklahoma'=>"OK",'Oregon'=>"OR",'Pennsylvania'=>"PA",'Rhode Island'=>"RI",'South Carolina'=>"SC",'South Dakota'=>"SD",'Tennessee'=>"TN",'Texas'=>"TX",'Utah'=>"UT",'Vermont'=>"VT",'Virginia'=>"VA",'Washington'=>"WA",'West Virginia'=>"WV",'Wisconsin'=>"WI",'Wyoming'=>"WY");
		foreach ($states as $state_name) {
			echo '<option value="'.$state_name.'">'.$state_name.'</option>';
		}
	echo '</select>';
}

state_selection();

?>
</option>

</td></tr>
<tr><td>Mascot:					</td><td><input type="text" name="mascot" maxlength="40"></td></tr>
<tr><td>School's Year of Inception: 	</td><td><input type="text" name="inception" maxlength="40"></td></tr>
<tr><td>Student Population:		</td><td><input type="text" name="population" maxlength="40"></td></tr>
<tr><td>School Write-up:		</td><td><input type="text" name="info" maxlength="5000"></td></tr>
</table>
<tr><td>
<input type="submit" name="submit" value="Update Your Profile" color="black">

</td></tr>
</form>


<h4>School Logo</h4>

<table>
<tr><td>Go <a href='picture_upload.php'>here</a> to insert your school's logo</td></tr>
</table>

<br>


<input type="submit" name="submit" value="Update My Picture">

</form> 

<?php
}
?>

<!-- end #mainContent --></div><br class="clearfloat" /><!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->

<?php include '../footer.php'; ?>
