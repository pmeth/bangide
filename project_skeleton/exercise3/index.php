<?php
/*-------------------------------------------------------
1. create a basic html form with the following fields
- name (text)
- email address (text)
- message (multiline textarea)
- submit button

make the action of the form to "handler.php" and set the method to "post"

save and view

---------------------------------------------------------
2. open handler.php and do a print_r on the $_POST variable

save and run the index file.
submit a form and see what happens

---------------------------------------------------------
3. modify your handler to check that name, message are not blank.
also check that email address is valid
if not, print a message with a link to go back to the index
hint: to check if a string is blank, write an if statement with == "" 
hint: use an if with filter_var($string, FILTER_VALIDATE_EMAIL) to check for valid emails
hint: use exit to stop the php script from going any further

---------------------------------------------------------
4. after the checks in step 3, your handler will send an email to you with all the fields of the form.
it will print a message thanking the user for their submission.
note: you can send an email to my address if you prefer not to put your own email

---------------------------------------------------------*/

// WRITE YOUR CODE HERE

?>
