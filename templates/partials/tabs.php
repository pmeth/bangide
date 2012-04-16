<?php

/**
 * Description of tabs
 *
 * @author Peter Meth
 */
class tabs {

	static function render(array $openfiles, $projectpath) {
		$links = "<ul>";
		$divs = "";
		foreach ($openfiles as $counter => $filename) {
			$links .= "<li><a href='#tabs-$counter'>$filename</a> <a href='#' id='close-tabs-$counter' class='close-tabs'>x</a></li>";
			$content = file_get_contents($projectpath . $filename);
			$divs .= "
				<div id='tabs-$counter'>
					<form action='render.php' target='rendered' method='post'>
						<textarea name='code' id='tabs1-code' class='code-editor'>$content</textarea><br />
						<input type='hidden' name='file' value='$filename' />
						<input type='submit' name='submit' value='SAVE &amp; RUN' />
					</form>
				</div>
			";
		}
		$links .= "</ul>";

		return $links . $divs;
	}

}

