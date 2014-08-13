<?php

namespace TPetersen\MVCTemplate;

class Config
{


	/**
	 * @var array
	 */
	private static $config;


	/**
	 * @param	string			$configKey1
	 * @param	string			$configKey2
	 * @return	string|array
	 */
	public static function getConfigByKey($configKey1, $configKey2 = null)
	{
		$config = self::getConfig();

		if ($configKey2) {
			return $config[$configKey1][$configKey2];
		}
		return $config[$configKey1];
	}


	/**
	 * @return	array
	 */
	public static function getConfig()
	{
		if (self::$config === null) {
			self::$config = parse_ini_file(APPLICATION_ROOT . 'config/conf.ini', true);
		}

		return self::$config;
	}

}