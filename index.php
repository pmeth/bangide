<?php
require_once 'includes/config.php';
$loggedinuser = $session['user']['username'];
$dbuser = $session['db_user'];
require 'templates/index.html.twig';