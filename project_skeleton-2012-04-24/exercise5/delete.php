<?php
include 'includes/db.php';

$query="
	DELETE FROM
		attendees
	WHERE
		## fill this in ##
";

mysql_query($query,$link)
	or die("Query Failed: " . $query . mysql_error());

header("Location:list.php");

?>