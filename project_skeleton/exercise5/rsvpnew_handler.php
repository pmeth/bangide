<?php
include('includes/config.php');
	
$query="
	INSERT INTO
		attendees
	SET
			name = '$_POST[name]',
			rsvp_mealchoice_id = '$_POST[rsvp_mealchoice_id]',
			allergies = '$_POST[allergies]',
			submittime = NOW()
";
$result=mysql_query($query,$link)
	or die("Insert Failed: " . $query . mysql_error());

$message="Thank you for submitting your RSVP.";
header("Location:thankyou.php?message=$message");
?>