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
	public $response;
	protected $routes = array();

	public function __construct($request, $response)
	{
		$this->request = $request;
		$this->response = $response;
	}

	public function get($path, $callback)
	{
		$this->routes['get'][$path] = $callback;
	}

	public function post($path, $callback)
	{
		$this->routes['post'][$path] = $callback;
	}

	public function resolve()
	{
		$path = $this->request->getPath();
		$method = $this->request->getMethod();
		$callback = $this->routes[$method][$path] ?? false;
		
		if ($callback === false) {
			$this->response->setStatusCode(404);
			return $this->renderView("404");
		}

		if (is_string($callback)) {
			return $this->renderView($callback);
		}

		return call_user_func($callback);
	}

	public function renderView($view)
	{
		$layoutContent = $this->layoutContent();
		$viewContent = $this->renderOnlyView($view);
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	public function renderContent($viewContent)
	{
		$layoutContent = $this->layoutContent();
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	protected function layoutContent()
	{
		ob_start();
		include_once Application::$root_dir.'/views/layouts/main.php';
		return ob_get_clean();
	}

	protected function renderOnlyView($view)
	{
		ob_start();
		include_once Application::$root_dir.'/views/'.$view.'.php';
		return ob_get_clean();
	}
}
