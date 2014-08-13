<?php

namespace TPetersen\MVCTemplate\Controller;

use Exception;
use TPetersen\MVCTemplate\Config;

abstract class AbstractBaseController
{


	/**
	 * @var array
	 */
	protected $parameters;


	/**
	 * @var string
	 */
	protected $viewData;


	/**
	 * @param array $parameters
	 */
	public function __construct(array $parameters = array())
	{
		$this->parameters = $parameters;
	}


	/**
	 * @param	string	$view
	 * @param	array	$params
	 */
	public function render($view, array $params = array())
	{
		ob_start();

		$this->renderTemplate('layout/header', $params);
		$this->renderTemplate($view, $params);
		$this->renderTemplate('layout/footer', $params);

		ob_end_flush();
	}


	/**
	 * @param	string		$view
	 * @param	array		$params
	 * @throws	\Exception
	 */
	public function renderTemplate($view, array $params = array())
	{
		$path = Config::getConfigByKey('PATH', 'VIEW') . $view . '.phtml';
		if (!file_exists($path)) {
			throw new Exception('View path ' . $path . ' doesn\'t exist.', 1395840232);
		}

		$this->viewData = $params;
		extract($params);
		include $path;
	}

}
