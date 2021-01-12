<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core\middlewares;

/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core\middlewares
 */

class AuthMiddleware extends BaseMiddleware
{
	public $actions = array();

	public function __construct($actions = array())
	{
		$this->actions = $actions;
	}

	public function execute()
	{
		if (Application::isGuest()) {
			if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
				throw new ForbiddenException();
			}
		}
	}
}