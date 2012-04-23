<?php
include('includes/config.php');

$query="
	DELETE FROM
		attendees
	WHERE
		id='$_GET[id]'
";

mysql_query($query,$link)
	or die("Department Query Failed: " . $query . mysql_error());

header("Location:rsvplist.php");

?>