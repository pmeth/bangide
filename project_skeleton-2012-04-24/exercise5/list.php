<?php
include 'includes/db.php';
$query = "
	SELECT
		## fill this in ##
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
			<th colspan='3'>ACTION</th>
		</tr>
";
while ($row = mysql_fetch_assoc($result)) {
   $datatable .= "
		<tr>
			<td>$row[?]</td>
			<td>$row[?]</td>
			<td>$row[?]</td>
			<td>$row[?]</td>
			<td><a href='view.php?id=$row[id]'>View</a></td>
			<td><a href='edit.php?id=$row[id]'>Edit</a></td>
			<td><a href='delete.php?id=$row[id]'>Delete</a></td>
		</tr>
	";
}

$datatable .= "</table>";
?>

<!DOCTYPE html>
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
      <?php echo $datatable; ?>
   </body>
</html>

