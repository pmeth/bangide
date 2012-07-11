<?php

require_once 'includes/config.php';

$projectname = 'projects' . DIRECTORY_SEPARATOR . $session['user']['projectfolder'];

$openfiles = array();

if (empty($_GET['file'])) {
   if (file_exists($projectname . '/exercise1/index.php')) {
      $openfiles[] = '/exercise1/index.php';
   } elseif (file_exists($projectname . '/exercise1/index.html')) {
      $openfiles[] = '/exercise1/index.html';
   }
} else {
   $openfiles[] = $_GET['file'];
}

/* too add some more files, just add to the array like this
  $openfiles[] = '/css/common.css';

 */

if (strstr($openfiles[0], '..') !== false) {
   die('Sorry, you have tried to open an invalid filename: ' . $projectname . $openfiles[0]);
}

$filetreepath = realpath(__DIR__ . '/' . $projectname);

require_once 'templates/partials/filetree.php';
if (in_array(substr($openfiles[0], -4), array('.gif','.png','jpeg','.jpg','.bmp'))) {
   require_once 'templates/partials/image.php';
} else {
   require_once 'templates/partials/tabs.php';
}
require 'templates/simple.html.twig';
