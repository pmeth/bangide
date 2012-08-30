<?php

require_once 'includes/config.php';
$loggedinuser = $session['user']['username'];
$dbuser = $session['db_user'];

if (!empty($_POST['fileset']) && $_POST['fileset'] == 'index') {
	$project->generateIndexFile($session['user']['projectfolder']);
}

if (!empty($_POST['fileset']) && $_POST['fileset'] != 'index') {
	$project->generateFiles($session['user']['projectfolder'], $_POST['fileset']);
}
require 'simple.php';
