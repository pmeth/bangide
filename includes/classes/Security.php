<?php

/**
 * Description of Security
 *
 * @author Peter Meth
 */
class Security {
	protected $_db;
	protected $_usertable;

	function __construct($db, $usertable = 'user') {
		$this->_db = $db;
		$this->_usertable = $usertable;
	}

	public function checkUsernameAndPasswordHash($username, $passwordhash) {
		$stmt = $this->_db->prepare('SELECT * FROM ' . $this->_usertable . ' WHERE is_active="true" AND username=:username AND password=:passwordhash');
		$stmt->execute(array(':username' => $username, ':passwordhash' => $passwordhash));
		$user = $stmt->fetchAll();
		return count($user) == 1;
	}

	static function getHash($original, $salt) {
		$tempstring = str_rot13($original) . str_repeat($salt, 3) . 'ab2336';
		return hash('sha256', $tempstring);
	}
}

