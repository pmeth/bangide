<?php
$projectname = 'student/123';
$allowedfilenames = array(
	 $projectname . '/index.php',
	 $projectname . '/css/common.css',
	 $projectname . '/js/common.js',
);

$file1 = '/index.php';
if(!empty($_GET['file'])) {
	$file1 = $_GET['file'];
}

if(!in_array($projectname . $file1,$allowedfilenames)) {
	die('Sorry, you have tried to open an invalid filename: ' . $projectname . $file1);
}

$file2 = '/css/common.css';
if(!empty($_GET['file'])) {
	$file2 = $_GET['file'];
}
if(!in_array($projectname . $file2,$allowedfilenames)) {
	die('Sorry, you have tried to open an invalid filename: ' . $projectname . $file2);
}

$file3 = '/js/common.js';
if(!empty($_GET['file'])) {
	$file3 = $_GET['file'];
}
if(!in_array($projectname . $file3,$allowedfilenames)) {
	die('Sorry, you have tried to open an invalid filename: ' . $projectname . $file3);
}


$content1 = file_get_contents($projectname . $file1);
$content2 = file_get_contents($projectname . $file2);
$content3 = file_get_contents($projectname . $file3);

$filetreepath = realpath(__DIR__ . '/' . $projectname);

require_once 'templates/partials/filetree.php';
require 'templates/simple.html.twig';
