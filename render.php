<?php
require_once 'includes/config.php';
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

$projectname = 'projects' . DIRECTORY_SEPARATOR . $session['user']['projectfolder'];
$filename = $projectname . $_POST['file'];

if(strstr($filename, '..') !== false) {
	die('Sorry, you have tried to write to an invalid filename: ' . $filename);
}

$fp = fopen($filename, 'w');
fwrite($fp, $_POST['code']);
fclose($fp);

$explodedfile = explode('/', $_POST['file']);
$exercisedirectory = "$projectname/$explodedfile[1]";
switch ($_POST['action']) {
    case 'Run This File':
        header('Location: ' . $projectname . $_POST['file']);
        break;
    case 'Run Index File':
        header('Location: ' . $exercisedirectory);
        break;

    default:
        // do nothing
        break;
}
