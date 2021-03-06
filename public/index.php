<?php
if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Ho_Chi_Minh');

// Define path to app directory
defined('APP_PATH')
	|| define('APP_PATH', realpath(dirname(__FILE__) . '/../app'));
	
defined('LIB_PATH')
	|| define('LIB_PATH', realpath(dirname(__FILE__) . '/../library'));
	
defined('PUBLIC_PATH')
	|| define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/../public'));

// Define app environment	
defined('APP_ENV')
	|| define('APP_ENV', getenv('APP_ENV') ? getenv('APP_ENV') : 'production');

if(APP_ENV == 'local') {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}

require_once APP_PATH . '/../library/OE/Application.php';
$application = new OE\Application(new \Phalcon\Di\FactoryDefault());
$application->run();