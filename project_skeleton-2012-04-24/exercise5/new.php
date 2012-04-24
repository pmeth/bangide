<?php
include 'includes/db.php';

$query = "
		SELECT
			## fill this in ##
		FROM
			rsvp_mealchoices
";

$result = mysql_query($query, $link)
        or die("Query Failed: " . $query . mysql_error());

$rsvppulldown = "<select name='rsvp_mealchoice_id'>\n<option>\n";

while ($row = mysql_fetch_assoc($result)) {
   $rsvppulldown.="<option value='$row[id]'>$row[name]</option>\n";
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
      <form action='handler.php' method='post'>
         YOUR NAME<br />
         <input type='text' name='name' /><br /><br />
         RSVP / MEAL CHOICE<br />
         <?php echo $rsvppulldown; ?><br /><br />
         Please Specify Any Allergies You Have<br />
         <input type='text' name='allergies' /><br /><br />
         <input type='submit' class='submitbutton' value='SUBMIT YOUR RSVP'/>
      </form>
   </body>
</html>