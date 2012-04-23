<?php
include('includes/config.php');
$query = "
	SELECT
		name,
		email
	FROM
		subscribers
";

$result = mysql_query($query);
if(!$result) {
	die("Query Failed: <pre>$query\n\nError:\n" . mysql_error());
}
while ($row = mysql_fetch_assoc($result)) {
	echo "Name: $row[name], Email: $row[email]<br>";
}
?>