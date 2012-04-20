<?php

/**
 * Description of tabs
 *
 * @author Peter Meth
 */
class tabs {

	static function render(array $openfiles, $filetreepath, $projectpath) {
		$links = "<ul>";
		$divs = "";
		foreach ($openfiles as $counter => $filename) {
			$links .= "<li><a href='#tabs-$counter'>$filename</a> <a href='#' id='close-tabs-$counter' class='close-tabs'>x</a></li>";
			$divs .= "
				<div id='tabs-$counter'>
					<img src='$projectpath$filename' />
				</div>
			";
		}
		$links .= "</ul>";

		return $links . $divs;
	}

}

