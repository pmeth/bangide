<?php

require_once 'includes/config.php';
require_once 'templates/partials/registererrors.php';

$username = '';
$registererrors = array();

if ($request->getPostVar('username') !== null && $request->getPostVar('password') !== null) {
	$username = $request->getPostVar('username');
	$password = $request->getPostVar('password');
	$passwordhash = Security::getHash($request->getPostVar('password'), $security_salt);

	$security = new Security($db);
    try {
        if ($security->isValidUsername($username) && $security->isValidPassword($password) && $security->registerUser($username, $passwordhash)) {
            $id = $security->getUserIdFromUsername($username);

            $session['db_user'] = $project->generateRandomAlpha(10);
            $session['db_pass'] = $project->generateRandomAlpha(10);

            $session['user'] = array(
                 'id' => $id,
                 'username' => $username,
                 'passwordhash' => $passwordhash,
                 'projectfolder' => $project->generateNew($id, $session['db_user'], $session['db_pass']),
            );


            $requested_page = 'index.php';
            if (isset($session['requested_page'])) {
                $requested_page = $session['requested_page'];
                unset($session['requested_page']);
            }

            $request->setSessionVar($session_variable, $session);
            header('Location: ' . $requested_page);
            exit;
        }
        throw new Exception('The user was not able to be registered.  Please note the following rules: usernames must be unique, usernames must contain at least 3 characters, passwords must contain at least 6 characters');
    }
    catch (Exception $e) {
        $registererrors[] = $e->getMessage();
    }
}


require 'templates/register.html.twig';