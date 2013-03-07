<?php

require_once 'includes/config.php';
require_once 'templates/partials/loginerrors.php';

$username = '';
$loginerrors = array();

if ($request->getPostVar('username') !== null && $request->getPostVar('password') !== null) {
	$username = $request->getPostVar('username');
	$passwordhash = Security::getHash($request->getPostVar('password'), $security_salt);

	$security = new Security($db);
	try {
		$check = $security->checkUsernameAndPasswordHash($username, $passwordhash);
	} catch (PDOException $e) {
		die('There was a problem with retrieving the user. Perhaps you did not setup the user table');
	}
	if ($check) {
		$id = $security->getUserIdFromUsername($username);
		$dbinfo = $project->getProjectFromUserId($id);
		$session['db_user'] = $dbinfo->db_user;
		$session['db_pass'] = $dbinfo->db_pass;
		$session['user'] = array(
			 'id' => $id,
			 'username' => $username,
			 'passwordhash' => $passwordhash,
			 'projectfolder' => $dbinfo->db_name,
		);
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
