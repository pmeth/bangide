<?php
include('includes/config.php');
$query = "
	SELECT
		a.id,
		a.name,
		r.name AS rsvp_mealchoice,
		a.allergies,
		a.submittime
	FROM
		attendees AS a JOIN
		rsvp_mealchoices AS r ON
			a.rsvp_mealchoice_id = r.id
";

$result = mysql_query($query) OR die("Query Failed: Query = <pre>$query\n\nError:\n" . mysql_error());

$datatable = "
	<table>
		<tr>
			<th>NAME</th>
			<th>ATTENDING / MEAL</th>
			<th>ALLERGIES</th>
			<th>SUBMIT TIME</th>
			<th>ACTION</th>
		</tr>
";
while ($row = mysql_fetch_assoc($result)) {
	$datatable .= "
		<tr>
			<td>$row[name]</td>
			<td>$row[rsvp_mealchoice]</td>
			<td>$row[allergies]</td>
			<td>$row[submittime]</td>
			<td><a href='rsvpedit.php?id=$row[id]'>Edit</a></td>
			<td><a href='rsvpdelete.php?id=$row[id]'>Delete</a></td>
		</tr>
	";
}

$datatable .= "</table>";
echo "
	<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
	<html>
	<head>
	<title> RSVP </title>
	<style type='text/css'>
		body, table {
			font-family: arial;
			font-size: 10pt;
		}

		th {
			background-color: c0c0c0;
		}

	</style>
	</head>

	<body>
	$datatable
	</body>
	</html>
";
?>