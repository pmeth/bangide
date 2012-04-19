<?php

/**
 * Description of registererrors
 *
 * @author Peter Meth
 */
class registererrors {
	static function render(array $errors) {
		if(!count($errors)) {
			return "";
		}

		$rendered = "<div class='registererrors'>";
		foreach($errors as $error) {
			$rendered .= "<div class='error'>$error</div>";
		}
		$rendered .= "</div>";
		return $rendered;
	}
}

