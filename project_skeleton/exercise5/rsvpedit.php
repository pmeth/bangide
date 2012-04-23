<?php
include('includes/config.php');

$query="
		SELECT
			id,
			name,
			rsvp_mealchoice_id,
			allergies
		FROM
			attendees
		WHERE
			id='$_GET[id]'
";

$result=mysql_query($query,$link)
	or die("Query Failed: " . $query . mysql_error());
$record = mysql_fetch_assoc($result);

$rsvppulldown="<select name='rsvp_mealchoice_id'>\n<option>\n";

$query="
		SELECT
			id,
			name
		FROM
			rsvp_mealchoices
";
$result=mysql_query($query,$link)
	or die("Query Failed: " . $query . mysql_error());

while($row=mysql_fetch_assoc($result)) {
	$selected = "";
	if($row['id'] == $record['rsvp_mealchoice_id']) {
		$selected = "selected";
	}
	$rsvppulldown.="<option value='$row[id]' $selected>$row[name]</option>\n";
}

$rsvppulldown.="</select>";

echo "
<html>
	<head>
		<title>RSVP</title>
		<link rel='stylesheet' type='text/css' href='rsvp.css' />
	</head>
<body>
	<table align='center'>
		<tr>
			<td>
				<fieldset>
					<h1>RSVP FORM</h1><br />
					<div align='center'><b><font color='green'>Event Date: Friday, June 20, 2010</font></b></div>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td>
				<form action='rsvpedit_handler.php' method='POST'>
					<fieldset>
						<table border='0' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<td>
									YOUR NAME<br />
									<input type='text' name='name' value='$record[name]'/><br /><br />
								</td>
							</tr>
							<tr>
								<td>RSVP / MEAL CHOICE<br />
									$rsvppulldown
								</td>
							</tr>
							<tr>
								<td>Please Specify Any Allergies You Have<br />
									<input type='text' name='allergies' value='$record[allergies]'/>
								</td>
							</tr>
							<tr>
								<td colspan='2' align='center'><br /><input type='submit' class='submitbutton' value='SUBMIT YOUR RSVP'/></td>
							</tr>
						</table>
				</fieldset>
				<input type='hidden' name='id' value='$record[id]' />
			</form>
		</body>
</html>
";
?>