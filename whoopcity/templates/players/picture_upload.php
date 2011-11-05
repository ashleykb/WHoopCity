<?php

include 'login_confirm.php';


if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}



$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysql_query($query) or die('Error, query failed'); 

echo "<br>File $fileName uploaded<br>";
} 
?>

<?php include 'header.php'; ?>

<div id="nav_bar">
[ <a href="http://whoopcity.com/players/profile.php" ><font color="#565656">my profile</font> </a>
[ <a href="http://whoopcity.com/search.html" ><font color="#565656">search schools </font></a>
[ <a href="http://whoopcity.com/about.html" ><font color="#565656">teammates </font></a>
[ <a href="http://whoopcity.com/logout.php" ><font color="#565656">logout </font></a>
]
<!-- end #nav_bar --></div>

<body class="whoop">

<div id="container">

<div id="mainContent" >

<h1> Upload your Profile Picture Here</h1>
<h4>This is the picture everyone who views your profile will see. </h4>

 <form method="post" enctype="multipart/form-data">
<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
<tr> 
<td width="246">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input name="userfile" type="file" id="userfile"> 
</td>
<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
</tr>
</table>
</form>

<p>
<a href="profile.php"><font color=#4040404>To My Profile</font></a>
</p>
<!-- end #mainContent --></div><br class="clearfloat" />

<?php include 'footer.php' ?>
