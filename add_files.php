<?php

require_once 'includes/config.php';
$loggedinuser = $session['user']['username'];
$dbuser = $session['db_user'];

if (!empty($_POST['fileset']) && $_POST['fileset'] == 'index') {
	try {
		$project->generateIndexFile($session['user']['projectfolder']);
	} catch (Exception $e) {
		die('Unable to create files.  Perhaps you did not create the project directory with write permission');
	}
}

if (!empty($_POST['fileset']) && $_POST['fileset'] != 'index') {
	try {
		$project->generateFiles($session['user']['projectfolder'], $_POST['fileset']);
	} catch (Exception $e) {
		die('Unable to create files.  Perhaps you did not create the project directory with write permission');
	}
}
require 'simple.php';
