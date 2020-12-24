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
class Application
{
	public static $root_dir;
	public $router;
	public $request;
	public $response;
	// public static $app;

	public function __construct($rootPath)
	{
		self::$root_dir = $rootPath;
		// self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
 		$this->router = new Router($this->request, $this->response);
	}

	public function run()
	{
		echo $this->router->resolve();
	}
}
