<?php

namespace TPetersen\MVCTemplate\Controller;

class IndexController extends AbstractBaseController
{


	/**
	 *
	 */
	public function indexAction()
	{
		$this->render('pages/index', array(
					'responseValue' => 'This variable will show on the'
				));
	}
}
