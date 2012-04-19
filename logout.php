<?php

require_once 'includes/config.php';

$request->unsetSessionVar($session_variable);

// variables used by MyWebSQL
$request->unsetSessionVar('auth');
$request->unsetSessionVar('db');
$request->unsetSessionVar('session');

header('Location: login.php');


