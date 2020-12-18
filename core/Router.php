<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */
class Router
{
	public $request;
	protected $routes = array();

	public function __construct($request)
	{
		$this->request = $request;
	}

	public function get($path, $callback)
	{
		$this->routes['get'][$path] = $callback;

	}

	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$callback = $this->routes[$method][$path] ?? false;
		if ($callback === false) {
			echo "Not found";
			exit;
		}
		echo call_user_func($callback);
	}
}
