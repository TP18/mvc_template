<?php
namespace TPetersen\MVCTemplate\PHPUnitTest;

require_once('../config/constants.php');
require_once('../sys/sys.php');

use PHPUnit_Framework_TestCase;
use TPetersen\MVCTemplate\Config;

class ExampleTest extends PHPUnit_Framework_TestCase
{


	/**
	 * Tests the Database Config
	 */
	public function testValidDBConfig()
	{
		$this->assertEquals(Config::getConfigByKey('Database', 'user'), 'abc', 'not the same!');
	}


	/**
	 * Tests the Environment Config
	 */
	public function testValidEnvironmentConfig()
	{
		$this->assertEquals(Config::getConfigByKey('ApplicationEnvironment', 'Development'), 1, 'should return true');
	}
}
