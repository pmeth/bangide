<?php include 'header.php'; ?>
<div class="content">
   <h1>CONTACT US</h1>
   <p>
      You may contact us by opening the window and shouting <b>Hey Vaughn</b><br>
      Alternatively, you can visit our website at <a href="http://www.tug.ca">www.tug.ca</a>
      or fill out the form below.
   </p>

   <form action="handler.php" method="post">
		Your Name:<br><input type="text" name="name"><br>
      Your Email:<br><input type="text" name="email"><br>
	 Your Message:<br><textarea name="message"></textarea><br>
	 <input type="submit" name="submit" value="SEND">
   </form>
</div>
<?php include 'footer.php'; ?>