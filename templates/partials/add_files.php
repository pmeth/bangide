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
				<p>
				Add some files
				<form action='add_files.php' method='post'>
					<select name='fileset'>
						<option value='index'>Just an index file</option>
						<option value='exercise1'>Exercise 1</option>
						<option value='exercise2'>Exercise 2</option>
						<option value='exercise3'>Exercise 3</option>
					</select>
					<input type='submit' value='Add Files' />
				</form>
				</p>
				</div>
			";
		}
		$links .= "</ul>";

		return $links . $divs;
	}

}

