<?php
$projectname = 'student/123';
$content1 = file_get_contents($projectname . '/index.php');
$content2 = file_get_contents($projectname . '/css/common.css');

$filetreepath = realpath(__DIR__ . '/' . $projectname);

require_once 'templates/partials/filetree.php';
require 'templates/simple.html.twig';
