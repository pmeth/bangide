<?php
/* -------------------------------------------------------
  1. create a basic html form with the following fields
  - name (text)
  - email address (text)
  - message (multiline textarea)
  - submit button

  make the action of the form to "handler.php" and set the method to "post"

  save and view

  ---------------------------------------------------------
  2. open handler.php and do a print_r on the $_POST variable
  syntax:
  print_r($_POST);

  save and run the index file.
  Click Contact Us, submit a form and see what happens

  ---------------------------------------------------------
  3. modify your handler to check that name, message are not blank.
  also check that email address is valid
  if not, print a message with a link back to the Contact Us page
  hint: to check if a string is blank, write an if statement with == ""
  hint: use an if with filter_var($string, FILTER_VALIDATE_EMAIL) to check for valid emails
  hint: use exit to stop the php script from going any further

  save and run the index file.
  Click Contact Us, submit a form with blank fields and see what happens.
  Submit the form with an improper email address.

  ---------------------------------------------------------
  4. after the checks in step 3, modify your handler so it sends an email to you with
  all the fields of the form.
  after the code that sends an email have it redirect the user to the thank you page.
  email syntax:
  mail($to, $subject, $body);

  redirect syntax:
  header("Location: <webpage>");

  --------------------------------------------------------- */
?>

<?php include 'header.php'; ?>
<div class="content">
   <h1>CONTACT US</h1>
   <p>
      You may contact us by opening the window and shouting <b>Hey Vaughn</b><br>
      Alternatively, you can visit our website at <a href="http://www.tug.ca">www.tug.ca</a>
      or fill out the form below.
   </p>

   <form action="" method="">
      Your Name: <input type="text" name="name"><br>
      <!-- your form stuff goes here -->
   </form>
</div>
<?php include 'footer.php'; ?>