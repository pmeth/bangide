<?php

//namespace Pmeth\Common;
/**
 * Description of Request
 *
 * @author Peter Meth
 */
class Request {

	protected $getVars = array();
	protected $postVars = array();
	protected $sessionVars = array();
	protected $cookieVars = array();
	protected $serverVars = array();

	public function __construct() {
		session_start();
		$this->getVars = !empty($_GET) ? $_GET : array();
		$this->postVars = !empty($_POST) ? $_POST : array();
		$this->sessionVars = !empty($_SESSION) ? $_SESSION : array();
		$this->cookieVars = !empty($_COOKIE) ? $_COOKIE : array();
		$this->serverVars = !empty($_SERVER) ? $_SERVER : array();

		// undo the effects of magic_quotes
		if (get_magic_quotes_gpc()) {
			$this->postVars = $this->stripslashes_deep($this->postVars);
			$this->getVars = $this->stripslashes_deep($this->getVars);
			$this->cookieVars = $this->stripslashes_deep($this->cookieVars);
		}
	}

	public function getGetVars() {
		return $this->getVars;
	}

	public function getPostVars() {
		return $this->postVars;
	}

	public function getSessionVars() {
		return $this->sessionVars;
	}

	public function getCookieVars() {
		return $this->cookieVars;
	}

	public function getServerVars() {
		return $this->serverVars;
	}

	public function clearSessionVars() {
		session_unset();
		$this->sessionVars = array();
	}

	public function getPostVar($index) {
		if (isset($this->postVars[$index])) {
			return $this->postVars[$index];
		} else {
			return null;
		}
	}

	public function getGetVar($index) {
		if (isset($this->getVars[$index])) {
			return $this->getVars[$index];
		} else {
			return null;
		}
	}

	public function getSessionVar($index) {
		if (isset($this->sessionVars[$index])) {
			return $this->sessionVars[$index];
		} else {
			return null;
		}
	}

	public function getServerVar($index) {
		if (isset($this->serverVars[$index])) {
			return $this->serverVars[$index];
		} else {
			return null;
		}
	}



	public function setSessionVar($index, $value) {
		$_SESSION[$index] = $value;
		$this->sessionVars[$index] = $value;
	}

	public function unsetSessionVar($index) {
		if (isset($_SESSION[$index])) {
			unset($_SESSION[$index]);
			unset($this->sessionVars[$index]);
		}
	}

	static function stripslashes_deep($value) {
		$value = is_array($value) ?
				  array_map('Request::stripslashes_deep', $value) :
				  stripslashes($value);

		return $value;
	}

}

?>
