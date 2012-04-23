<html>
<head>
<title>Thank you for submitting your RSVP</title>
</head>
<body>
<center>
<b>
<?php
if(isset($_REQUEST['message'])) {
	echo "<font color=green face=verdana>" . $_REQUEST['message'];
} else {
	die("<font color=red face=verdana>Script terminated.");
}
?>
</b>
</font>
</center>
</body>
</html>