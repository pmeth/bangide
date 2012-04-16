<?php
$content = file_get_contents('student/123/index.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple Layout Demo</title>
		<link rel="stylesheet" href="lib/css/layout-default-latest.css" />
		<link rel="stylesheet" href="js/CodeMirror-2.23/lib/codemirror.css">
		<link rel="stylesheet" type="text/css" href="css/simple.css" />

	</head>
	<body>
		<div class="ui-layout-west">
			<div id="phpcode_wrapper">
				<form action="render.php" target="rendered" method="post">
					<textarea name="phpcode" id="phpcode"><?php echo $content; ?></textarea><br />
					<input type="submit" name="submit" value="SAVE &amp; RUN" />
				</form>
			</div>
		</div>


		<div class="ui-layout-center">
			<div id="rendered_wrapper">
				<iframe id="rendered" name="rendered"></iframe>
			</div>
		</div>

		<!-- SCRIPTS -->
		<!--[if lt IE 9]>
				<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- LAYOUT v 1.3.0 -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<script src="lib/js/jquery-ui-1.8.16.js"></script>
		<script src="lib/js/jquery.layout-1.3.0-rc30.4.js"></script>

		<!-- CODEMIRROR v 2.23 -->
		<script src="js/CodeMirror-2.23/lib/codemirror.js"></script>
		<script src="js/CodeMirror-2.23/mode/php/php.js"></script>
		<script src="js/CodeMirror-2.23/mode/xml/xml.js"></script>
		<script src="js/CodeMirror-2.23/mode/javascript/javascript.js"></script>
		<script src="js/CodeMirror-2.23/mode/css/css.js"></script>
		<script src="js/CodeMirror-2.23/mode/clike/clike.js"></script>

		<!-- PAGE SPECIFIC SCRIPT -->
		<script src="js/simple.js"></script>
	</body>
</html>