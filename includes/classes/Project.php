<?php

/**
 * Description of Project
 *
 * @author Peter Meth <pmeth@rogers.com>
 */
class Project {

    protected $_db;
    protected $_projecttable;
    protected $_projectdirectory;

    function __construct(PDO $db, $projecttable = 'project', $projectdirectory = 'projects') {
        $this->_db = $db;
        $this->_projecttable = $projecttable;
        $this->_projectdirectory = $projectdirectory;
    }

    public function generateNew($user_id, $database_enabled, $db_user = null, $db_pass = null) {
        $project = $this->getRandomDirectoryName();

        if ($database_enabled) {
            $this->_writeDatabaseConfigFile($project, $project, $db_user, $db_pass);
            $this->_generateDatabase($project, $db_user, $db_pass);
        }
        $stmt = $this->_db->prepare('INSERT INTO ' . $this->_projecttable . ' SET user_id = :user_id, db_name = :db_name, db_user = :db_user, db_pass = :db_pass');

        $stmt->execute(array(
            ':db_name' => $project,
            ':db_user' => $db_user,
            ':db_pass' => $db_pass,
            ':user_id' => $user_id,
        ));
        return $project;
    }

    public function generateRandomAlpha($length) {
        $string = "";

        for ($i = 0; $i < $length; $i++) {
            // random lowercase alphabet character
            $string .= chr(rand(97, 122));
        }
        return $string;
    }

    public function getRandomDirectoryName() {
        $badcharacters = str_split('/?*:;{}]+.[^/?*:;{}\\');
        $newname = uniqid("", true);
        $newname = str_replace($badcharacters, '', $newname);

        if (file_exists($this->_projectdirectory . DIRECTORY_SEPARATOR . $newname)) {
            return $this->getRandomDirectoryName();
        } else {
            return $newname;
        }
    }

    public function getProjectFromUserId($user_id) {
        $stmt = $this->_db->prepare('SELECT db_name, db_user, db_pass FROM ' . $this->_projecttable . ' WHERE user_id=:user_id');
        $stmt->execute(array(':user_id' => $user_id));
        return $stmt->fetchObject();
    }

    public function generateIndexFile($project) {
			$this->generateFile($project, 'index.php');
		}

    public function generateFile($project, $filename) {
        $pathName = $this->_projectdirectory . DIRECTORY_SEPARATOR . $project;

        if (!file_exists($pathName) && !@mkdir($pathName)) {
            throw new Exception("Unable to create directory $pathName");
        }

        $filename = $pathName . DIRECTORY_SEPARATOR . $filename;
        if (!fopen($filename, 'w')) {
            throw new Exception('Could not create file');
        }
    }

    public function generateFiles($project, $subfolder) {
        $this->_recursiveCopy('project_skeleton' . DIRECTORY_SEPARATOR . $subfolder, $this->_projectdirectory, $project . DIRECTORY_SEPARATOR . $subfolder);
    }

    protected function _writeDatabaseConfigFile($project, $db_name = 'DATABASE', $db_user = 'USERNAME', $db_pass = 'PASSWORD') {
        $contents = "<?php
\$db_host = 'localhost';
\$db_name = '$db_name';
\$db_user = '$db_user';
\$db_pass = '$db_pass';
?>";
        $projectbase = $this->_projectdirectory . DIRECTORY_SEPARATOR . $project . DIRECTORY_SEPARATOR;
        for ($i = 2; $i <= 15; $i++) {
            $filetowrite = $projectbase . "exercise$i" . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'db.php';
            if (file_exists($filetowrite)) {
                file_put_contents($filetowrite, $contents);
            }
        }
    }

    protected function _generateDatabase($project, $username, $password) {
        try {
            $this->_db->exec("CREATE DATABASE `$project`");
        } catch (PDOException $e) {
            return false;
        }
        $this->_db->exec("CREATE USER '$username'@'localhost' IDENTIFIED BY '$password'");
        $this->_db->exec("GRANT ALL PRIVILEGES ON `$project`.* TO '$username'@'localhost'");
        return true;
    }

    protected function _recursiveCopy($source, $dest, $diffDir = '') {
        $sourceHandle = opendir($source);
        if (!$diffDir)
            $diffDir = $source;

        $pathName = $dest . '/' . $diffDir;
        if (!file_exists($pathName) && !@mkdir($pathName)) {
            throw new Exception("Unable to create directory $pathName");
        }

        while ($res = readdir($sourceHandle)) {
            if ($res == '.' || $res == '..')
                continue;

            if (is_dir($source . '/' . $res)) {
                $this->_recursiveCopy($source . '/' . $res, $dest, $diffDir . '/' . $res);
            } else {
                copy($source . '/' . $res, $dest . '/' . $diffDir . '/' . $res);
            }
        }
    }

}
