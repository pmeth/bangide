<?php

require_once 'includes/config.php';

$request->unsetSessionVar($session_variable);
header('Location: login.php');


