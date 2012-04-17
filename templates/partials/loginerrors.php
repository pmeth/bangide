<?php

/**
 * Description of loginerrors
 *
 * @author Peter Meth
 */
class loginerrors {
	static function render(array $errors) {
		if(!count($errors)) {
			return "";
		}

		$rendered = "<div class='loginerrors'>";
		foreach($errors as $error) {
			$rendered .= "<div class='error'>$error</div>";
		}
		$rendered .= "</div>";
		return $rendered;
	}
}

