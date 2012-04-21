<?php

/**
 * Description of filetree
 *
 * @author Peter Meth
 */
class filetree {

	/**
	 * This comes straight from jpic's response on this page http://php.net/manual/en/function.realpath.php
	 * @param type $path
	 * @param type $basepath
	 * @return string
	 */
	static function render($path, $basepath) {

		// Open the folder
		if (!( $dir = opendir($path) ))
			die("Can't open $path");
		$filenames = array();

		// Read the contents of the folder, ignoring '.' and '..', and
		// appending '/' to any subfolder names. Add all the files and
		// subfolders to the $filenames array.

		while ($filename = readdir($dir)) {
			if ($filename != '.' && $filename != '..') {
				if (is_dir("$path/$filename"))
					$filename .= '/';
				$filenames[] = $filename;
			}
		}

		closedir($dir);

		// Sort the filenames in alphabetical order
		//sort($filenames);

		// Display the filenames, and process any subfolders

		$rendered = "<ul>";

		foreach ($filenames as $filename) {
			if (substr($filename, -1) == '/') {
				$rendered .= "<li><span class='folder'>" . substr($filename, 0, strlen($filename) - 1) . "</span>";
				$rendered .= self::render("$path/" . substr($filename, 0, -1), $basepath);
				$rendered .= "</li>";
			} else {
				$relativefilename = self::getRelativePath("$path/$filename", $basepath);
				$rendered .= "<li><span class='file'><a href='simple.php?file=/$relativefilename'>$filename</a></span></li>";
			}
		}

		$rendered .= "</ul>";
		return $rendered;
	}

	static function getRelativePath( $path, $compareTo ) {
        // clean arguments by removing trailing and prefixing slashes
        if ( substr( $path, -1 ) == '/' ) {
            $path = substr( $path, 0, -1 );
        }
        if ( substr( $path, 0, 1 ) == '/' ) {
            $path = substr( $path, 1 );
        }

        if ( substr( $compareTo, -1 ) == '/' ) {
            $compareTo = substr( $compareTo, 0, -1 );
        }
        if ( substr( $compareTo, 0, 1 ) == '/' ) {
            $compareTo = substr( $compareTo, 1 );
        }

        // simple case: $compareTo is in $path
        if ( strpos( $path, $compareTo ) === 0 ) {
            $offset = strlen( $compareTo ) + 1;
            return substr( $path, $offset );
        }

        $relative  = array(  );
        $pathParts = explode( '/', $path );
        $compareToParts = explode( '/', $compareTo );

        foreach( $compareToParts as $index => $part ) {
            if ( isset( $pathParts[$index] ) && $pathParts[$index] == $part ) {
                continue;
            }

            $relative[] = '..';
        }

        foreach( $pathParts as $index => $part ) {
            if ( isset( $compareToParts[$index] ) && $compareToParts[$index] == $part ) {
                continue;
            }

            $relative[] = $part;
        }

        return implode( '/', $relative );
    }

}

