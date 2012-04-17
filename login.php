<?php

require_once 'includes/config.php';
require_once 'templates/partials/loginerrors.php';

$username = '';
$loginerrors = array();

if ($request->getPostVar('username') && $request->getPostVar('password')) {
	$username = $request->getPostVar('username');
	$passwordhash = Security::getHash($request->getPostVar('password'), $security_salt);

	$security = new Security($db);
	if ($security->checkUsernameAndPasswordHash($username, $passwordhash)) {
		$session['user'] = array('username' => $username, 'passwordhash' => $passwordhash);
		$requested_page = 'index.php';
		if (isset($session['requested_page'])) {
			$requested_page = $session['requested_page'];
			unset($session['requested_page']);
		}

		$request->setSessionVar($session_variable, $session);
		header('Location: ' . $requested_page);
		exit;
	} else {
		$loginerrors[] = 'Wrong username or password';
	}
}


require 'templates/login.html.twig';