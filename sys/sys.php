<?php

use TPetersen\MVCTemplate\Config;

function __autoload($classname)
{
	require_once CLASS_DIR . str_replace('\\', '/', $classname) . '.php';
}

//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); // or error_reporting(E_ALL ^ E_NOTICE);
if (Config::getConfigByKey('ApplicationEnvironment', 'Development') === '1') {
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', 1);
	ini_set('log_errors', 1);
	ini_set('error_log', 'log/php_errors.log');
	ini_set('html_errors', 1);
} else {
	error_reporting('off');
}