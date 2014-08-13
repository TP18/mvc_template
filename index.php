<?php

use TPetersen\MVCTemplate\Config;

try {
	require_once('config/constants.php');
	require_once('sys/sys.php');
	$parameters = array_merge($_GET, $_POST);

	$controllerName = isset($parameters['controller']) ? $parameters['controller'] : Config::getConfigByKey('CONTROLLER', 'DEFAULT');
	$actionName = isset($parameters['action']) ? $parameters['action'] : Config::getConfigByKey('ACTION', 'DEFAULT');

	$controllerClass = Config::getConfigByKey('CONTROLLER', 'NAMESPACE') . ucfirst($controllerName) . 'Controller';
	$actionMethod = $actionName . 'Action';

	$controllerReflection = new ReflectionClass($controllerClass);
	if (!$controllerReflection->isSubclassOf(Config::getConfigByKey('CONTROLLER', 'NAMESPACE') . 'AbstractBaseController')) {
		throw new Exception($controllerClass . ' is not a valid Controller', 1395840233);
	}
	if (!$controllerReflection->hasMethod($actionMethod)) {
		throw new Exception('Action ' . $actionMethod . ' not found in Class ' . $controllerClass, 1395840234);
	}

	$controller = new $controllerClass();
	$controller->$actionMethod();

} catch (Exception $e) {
	ob_end_clean();
	echo 'Oops an Error occured! <br>';
	echo '<strong>Error Message: </strong>' . $e->getMessage() . '<br>
		 <strong>Error Code: </strong>' . $e->getCode() . '<br>';
}