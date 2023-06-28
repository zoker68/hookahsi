<?php

use Core\Database;

require BASE_PATH . "vendor/autoload.php";

require BASE_PATH . "Core/functions.php";

require BASE_PATH . "routes.php";

$config = require(BASE_PATH . "config.php");
//$db = new Database($config['db']['dsn'], $config['db']['auth']['username'], $config['db']['auth']['password']);


