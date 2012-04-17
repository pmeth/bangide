<?php
require_once 'db_connect.php';
require_once 'classes/Request.php';
require_once 'classes/Security.php';

$session_variable = 'learninglamp';
$db = new PDO("$pdo_driver:dbname=$pdo_dbname;host=$pdo_host:$pdo_port", $pdo_user, $pdo_password);
$request = new Request();
if($request->getSessionVar($session_variable) === null) {
	$request->setSessionVar($session_variable, array());
}

$session = $request->getSessionVar($session_variable);

// START - FIGURE OUT THE FILENAME AND WHETHER IT REQUIRES LOGIN
$configfile = '/includes/config.php';
$approot = realpath(substr(__FILE__, 0, strlen(__FILE__) - strlen($configfile)));
$filepath_full = realpath($request->getServerVar('SCRIPT_FILENAME'));
$filepath_relative = substr($filepath_full, strlen($approot));

// I'm sure there's a better way to take care of Windows path, but I can't find it and I need to move on
$filepath_full = str_replace('\\','/',$filepath_full);
$filepath_relative = str_replace('\\','/', $filepath_relative);


$anonymous_pages = array(
	 '/login.php',
	 '/utilities/sessionviewer.php',
);

if(empty($session['user']) && !in_array($filepath_relative, $anonymous_pages)) {
	$session['requested_page'] = $request->getServerVar('PHP_SELF');
	$request->setSessionVar($session_variable, $session);
	header('Location: login.php');
}

// END - FIGURE OUT THE FILENAME AND WHETHER IT REQUIRES LOGIN

