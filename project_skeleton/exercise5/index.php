<?php
/*-------------------------------------------
1. create 2 tables
rsvp_mealchoices
id (int 11, auto)
name (varchar 100)

Fill in the following records
ID 1, name No
ID 2, name Yes - Chicken
ID 3, name Yes - Beef
ID 4, name Yes - Fish

attendees
id (int 11, auto)
name (varchar 100)
rsvp_mealchoice_id (int 11)
allergies (varchar 100)
submittime (datetime)

manually insert a couple of records
-------------------------------------------
2. Go through each page and find the missing sections to make a complete application
that lets people rsvp for the event and lets the organizer, view, edit and delete
rsvps

-------------------------------------------
3. Add a line at the top of list.php that shows the total number of rsvp's,
along with a breakdown of mealchoices: total fish, total chicken, total beef

-------------------------------------------*/

?>


<!DOCTYPE html>
<html>
   <head>
      <title>RSVP</title>
      <link rel='stylesheet' type='text/css' href='rsvp.css' />
   </head>
   <body>
      <ul>
         <li><a href="new.php">Enter a new rsvp</a></li>
         <li><a href="list.php">View the submitted rsvp's</a></li>
      </ul>
   </body>
</html>