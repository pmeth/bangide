<?php
include('includes/config.php');
	
$query="
	UPDATE
		attendees
	SET
		name = '$_POST[name]',
		rsvp_mealchoice_id = '$_POST[rsvp_mealchoice_id]',
		allergies = '$_POST[allergies]'
	WHERE
		id='$_POST[id]'
";
$result=mysql_query($query,$link)
	or die("Update Failed: " . $query . mysql_error());

header("Location:rsvplist.php");
?>