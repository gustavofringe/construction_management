<?php
//public folder
define('WEBROOT',dirname(__FILE__));
//base site
define('ROOT',dirname(WEBROOT));
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('DS', DIRECTORY_SEPARATOR);
include ROOT.'/libraries/includes.php';
new Route();
//Autoloader::register();

?>
