<?php

require_once 'includes/config.php';
$loggedinuser = $session['user']['username'];
$dbuser = $session['db_user'];
$project->generateFiles($session['user']['projectfolder']);
require 'simple.php';
