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
            $content = file_get_contents($filetreepath . $filename);
            $content = htmlentities($content);
            $divs .= "
				<div id='tabs-$counter'>
					<form action='render.php' target='rendered' method='post'>
                        After Save:
                        <select name='action'>
                            <option>Run Index File</option>
                            <option>Run This File</option>
                            <option>Do Nothing</option>
                        </select>
                        Window:
                        <select name='window' id='windowselect'>
                            <option value='rendered'>Side Window</option>
                            <option value='_blank'>New Window</option>
                        </select>
                        <input type='hidden' name='file' value='$filename' />
						<input type='submit' name='submit' value='SAVE' /><br />
						<textarea name='code' id='tabs1-code' class='code-editor'>$content</textarea>
					</form>
				</div>
			";
        }
        $links .= "</ul>";

        return $links . $divs;
    }

}

