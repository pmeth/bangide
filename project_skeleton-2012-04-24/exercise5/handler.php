<?php

include 'includes/db.php';

$query = "
	##WRITE THIS QUERY##
";
$result = mysql_query($query, $link)
        or die("Insert Failed: " . $query . mysql_error());

header("Location:thankyou.php");
?>