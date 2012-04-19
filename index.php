<?php
require_once 'includes/config.php';
$loggedinuser = $session['user']['username'];
require 'templates/index.html.twig';