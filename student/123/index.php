<html>
	<head>
		<title>Test Page</title>
	</head>
	<body>
		<div style="border: 1px solid red;">

<?php

if(!empty($_POST['submit'])) {
	echo "You submitted " . $_POST['yourname'] . "<br>";
	echo "<a href='.'>Start Over</a>";
	exit;
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	Your Name: <input type="text" name="yourname" />
	<br>
	<input type="submit" name="submit" value="RSVP" />
</form>
</div>
</body>
</html>
