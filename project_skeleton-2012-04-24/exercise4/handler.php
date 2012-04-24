<?php
/* -------------------------------------------------------
  1. create a table called contactus
  id (int 11, autoincrement)
  name (varchar 100)
  email (varchar 100)
  message (text)

  put a couple of records into it.

  ---------------------------------------------------------
  2. make a connection to database in db.php and include this from exercises.php

  make sure to save before switching files.

  ---------------------------------------------------------
  3. create a query to select all records from the contactus table
  use a foreach loop to print each record as a div

  ---------------------------------------------------------
  4. create a query to count how many records there are.
  print the result at the top of the output of records from step 3

  ---------------------------------------------------------
  5. create a query to insert a new record before running steps 3 & 4

  save and run to see the result

  ---------------------------------------------------------
  6. modify handler.php to insert a new record before sending an email.
  use the values from the contact form submission

  save and run to see the result

  --------------------------------------------------------- */
?>
<?php
$errors = "";
if ($_POST['name'] == '') {
   $errors .= "<li>Name cannot be blank</li>";
}

if ($_POST['message'] == '') {
   $errors .= "<li>Message cannot be blank</li>";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $errors .= "<li>The email you entered was not valid</li>";
}

if ($errors != '') {
   include 'header.php';
?>
   <div class='content'><h1>CONTACT US</h1>
      Some errors occurred:
      <ul>
         <?php echo $errors; ?>
      </ul>
      <a href='contactus.php'>Click here</a> to try again.
   </div>
<?php
   include 'footer.php';
   exit;
}

$message = "
Name: $_POST[name]
Email: $_POST[email]
Message:
$_POST[message]
";
mail('pmeth@rogers.com', 'NEW CONTACT EMAIL', $message);
header('Location: thankyou.php');
?>