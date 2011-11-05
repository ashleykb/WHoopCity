<?php
	include('../config.php');

$result = mysql_query("SELECT * FROM cal_event WHERE email ='example'")
or die(mysql_error());  

$result = mysql_query("SELECT * FROM cal_settings WHERE email ='example'")
or die(mysql_error());  

// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );

	
	$action = $_POST['action'];
	
	switch($action) {
	
		case 'updateColours':
			$dc = $_POST['dayColor'];
			$wc = $_POST['weekendColor'];
			$tc = $_POST['todayColor'];
			$ec = $_POST['eventColor'];
			$ic1 = $_POST['iteratorColor1'];
			$ic2 = $_POST['iteratorColor2'];
			
			$updateColours = mysql_query("UPDATE cal_settings SET dayColor='$dc', weekendColor='$wc', todayColor='$tc', eventColor='$ec', iteratorColor1='$ic1', iteratorColor2='$ic2' WHERE email='$email' LIMIT 1", $conn);
			
			if($updateColours) {
				$loginMsg = '<span style="color: green">Your colours have been updated :)</span>';
			} else {
				$loginMsg = 'There was a problem updating the colours';
			}
			
			break;
	}
	include('settings.php');
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>AAU Team Game Calendar</title>
<link rel="stylesheet" type="text/css" href="../css.css"/>
<script src="js/lib/prototype.js" type="text/javascript"></script>
<script src="js/src/scriptaculous.js" type="text/javascript"></script>


<style>


	body {
		font-family: Tahoma;
		font-size: 14px;
	}
	
	.calendarBox {
		position: relative;
		top: 5px;
		margin: 0 auto;
		padding: 5px;
		width: 500px;
		border: 2px solid #000;
	}

	.calendarFloat {
		float: left;
		width: 62px;
		height: 50px;
		margin: 1px 0px 0px 1px;
		padding: 2px;
		border: 1px solid #000;
	}
</style>

<script type="text/javascript">
	function highlightCalendarCell(element) {
		$(element).style.border = '1px solid #999999';
	}

	function resetCalendarCell(element) {
		$(element).style.border = '1px solid #000000';
	}
	
	function startCalendar(month, year) {
		new Ajax.Updater('calendarInternal', 'rpc.php', {method: 'post', postBody: 'action=startCalendar&month='+month+'&year='+year+''});
	}
	
	function showEventForm(day) {
		$('evtDay').value = day;
		$('evtMonth').value = $F('ccMonth');
		$('evtYear').value = $F('ccYear');
		
		displayEvents(day, $F('ccMonth'), $F('ccYear'));
		
		if(Element.visible('addEventForm')) {
			// do nothing.
		} else {
			Element.show('addEventForm');
		}
	}
	
	function displayEvents(day, month, year) {
		new Ajax.Updater('eventList', 'rpc.php', {method: 'post', postBody: 'action=listEvents&&d='+day+'&m='+month+'&y='+year+''});
		if(Element.visible('eventList')) {
			// do nothing, its already visble.
		} else {
			setTimeout("Element.show('eventList')", 300);
		}
	}
	
	function addEvent(day, month, year, body) {
		if(day && month && year && body) {
			// alert('Add Event\nDay: '+day+'\nMonth: '+month+'\nYear: '+year+'\nBody: '+body);
			new Ajax.Request('rpc.php', {method: 'post', postBody: 'action=addEvent&d='+day+'&m='+month+'&y='+year+'&body='+body+'', onSuccess: highlightEvent(day)});
			$('evtBody').value = '';
		} else {
			alert('There was an unexpected script error.\nPlease ensure that you have not altered parts of it.');
		}
		
		// highlightEvent(day);
	} // addEvent.
	
	function highlightEvent(day) {
		Element.hide('addEventForm');
		$('calendarDay_'+day+'').style.background = '#<?= $eventColor ?>';
	}
	
	function showLoginBox() {
		Element.show('loginBox');
	}
	
	function showCP() {
		Element.show('cpBox');
	}
	
	function deleteEvent(eid) {
		confirmation = confirm('Are you sure you wish to delete this event?\n\nOnce the event is deleted, it is gone forever!');
		if(confirmation == true) {
			new Ajax.Request('rpc.php', {method: 'post', postBody: 'action=deleteEvent&eid='+eid+'', onSuccess: Element.hide('event_'+eid+'')});
		} else {
			// Do not delete it!.
		}
	}
</script>


<?php include 'header_profile.php'; ?>


<div id="nav_bar_player" >
   
| <a href="exprofile" ><font color="#565656">the profile</font> </a>
| <a href="excalendar_index"><font color="#565656">Edit your team schedule</font></a>
| <a href="/AAU/collegesearch" ><font color="#565656">search </font></a>
| <a href="http://wwww.ncaa.org" ><font color="#565656">NCAA </font></a>
|
   </div>
   
<div id="sidebar1">
<?php include '../sidebarad.html'; ?>
</div>

<div id="container_player">

<div id="mainContent_player">

<center>CALENDAR</center>

	<div id="calendar" class="calendarBox">
		<div id="calendarInternal">
			&nbsp;
		</div>
		<br style="clear: both;">
		<span id="LoginMessageBox" style="color: red; margin-top: 10px;"><?= $loginMsg; ?></span>
		<div id="eventList" style="display: none;"></div>
		
		<div style="display: none; margin-top: 10px;" id="addEventForm">
			<b>Add Event</b>
			<br>
			Date: <input type="text" size="2" id="evtDay" disabled> <input type="text" size="2" id="evtMonth" disabled> <input type="text" size="4" id="evtYear" disabled>
			<br>
			<textarea id="evtBody" cols="32" rows="5"></textarea>
			<br>
			<input type="button" value="Add Event" onClick="addEvent($F('evtDay'), $F('evtMonth'), $F('evtYear'), $F('evtBody'));">
			<a href="#" onClick="Element.hide('addEventForm');">Close</a>
		</div>
		
		
		<div style="display: none; margin-top: 10px;" id="cpBox">
			<b>Control Panel</b> <a href="#" onClick="Element.hide('cpBox');">Close</a>
			<br><br>
			<b>Change the colours</b>
			<br>
			<form action="calendar_index.php" method="post">
				Day Colour: <input type="text" name="dayColor" size="6" maxlength="6" value="<?= $dayColor; ?>">
				<br>
				Weekend Colour: <input type="text" name="weekendColor" size="6" maxlength="6" value="<?= $weekendColor; ?>">
				<br>
				Today Colour: <input type="text" name="todayColor" size="6" maxlength="6" value="<?= $todayColor; ?>">
				<br>
				Event Colour: <input type="text" name="eventColor" size="6" maxlength="6" value="<?= $eventColor; ?>">
				<br>
				Iterator 1 Colour: <input type="text" name="iteratorColor1" size="6" maxlength="6" value="<?= $iteratorColor2; ?>">
				<br>
				Iterator 2 Colour: <input type="text" name="iteratorColor2" size="6" maxlength="6" value="<?= $iteratorColor1; ?>">
				<br>
				<input type="hidden" name="action" value="updateColours">
				<input type="submit" value="Update Colours">
			</form>
			

		</div>
		
	</div> <!-- FINAL DIV DO NOT REMOVE -->
	
	<script type="text/javascript">
		startCalendar(0,0);
	</script>

<!-- end #mainContent --></div><br class="clearfloat" />

<?php include 'footer.php'; ?>