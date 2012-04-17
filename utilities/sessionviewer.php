<?php
require_once '../includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Session Viewer</title>
		<meta http-equiv="refresh" content="5">

	</head>
	<body>
		<pre><?php print_r($request->getSessionVars()); ?></pre>
	</body>
</html>

