<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core;

// use app\core\middlewares\AuthMiddleware;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */
class Controller
{
	public $layout = 'main';
	public $action = '';
	protected $middleware = array();

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function render($view, $params = [])
	{
		return Application::$app->router->renderView($view, $params);
	}

	public function registerMiddleware($middleware)
	{
		$this->middlewares[] = $middleware;
	}

	public function getMiddlewares()
	{
		return $middleware;
	}
}