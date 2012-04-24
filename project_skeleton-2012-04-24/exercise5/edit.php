<?php
include 'includes/db.php';

$query = "
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

$result = mysql_query($query, $link)
        or die("Query Failed: " . $query . mysql_error());
$record = mysql_fetch_assoc($result);

$rsvppulldown = "<select name='rsvp_mealchoice_id'>\n<option>\n";

$query = "
		SELECT
			id,
			name
		FROM
			rsvp_mealchoices
";
$result = mysql_query($query, $link)
        or die("Query Failed: " . $query . mysql_error());

while ($row = mysql_fetch_assoc($result)) {
   $selected = "";
   if ($row['id'] == $record['rsvp_mealchoice_id']) {
      $selected = "selected";
   }
   $rsvppulldown.="<option value='$row[id]' $selected>$row[name]</option>\n";
}

$rsvppulldown.="</select>";
?>
<!DOCTYPE html>
<html>
   <head>
      <title>RSVP</title>
      <link rel='stylesheet' type='text/css' href='rsvp.css' />
   </head>
   <body>
      <h1>RSVP FORM</h1>
      <form action='edit_handler.php' method='post'>
         YOUR NAME<br />
         <input type='text' name='name' value='<?php echo $record[name]; ?>'/><br /><br />
         RSVP / MEAL CHOICE<br />
         <?php echo $rsvppulldown; ?><br /><br />
         Please Specify Any Allergies You Have<br />
         <input type='text' name='allergies' value='<?php echo $record['allergies']; ?>'/><br /><br />
         <input type='submit' class='submitbutton' value='SUBMIT YOUR RSVP'/>
         <input type='hidden' name='id' value='<?php echo $record[id]; ?>' />
      </form>
   </body>
</html>
