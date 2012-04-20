<?php
require_once 'includes/config.php';

$projectname = 'projects' . DIRECTORY_SEPARATOR . $session['user']['projectfolder'];
$allowedfilenames = array(
	 $projectname . '/index.php',
	 $projectname . '/css/common.css',
	 $projectname . '/js/common.js',
	 $projectname . '/includes/db.php',
	 $projectname . '/images/logo.gif',
);

$openfiles = array();

if (empty($_GET['file'])) {
	$openfiles[] = '/index.php';
} else {
	$openfiles[] = $_GET['file'];
}

/* too add some more files, just add to the array like this
$openfiles[] = '/css/common.css';

 */

foreach ($openfiles as $openfile) {
	if (!in_array($projectname . $openfile, $allowedfilenames)) {
		die('Sorry, you have tried to open an invalid filename: ' . $projectname . $openfile);
	}
}

$filetreepath = realpath(__DIR__ . '/' . $projectname);

require_once 'templates/partials/filetree.php';
if($openfiles[0] == '/images/logo.gif') {
	require_once 'templates/partials/image.php';
} else {
	require_once 'templates/partials/tabs.php';
}
require 'templates/simple.html.twig';
