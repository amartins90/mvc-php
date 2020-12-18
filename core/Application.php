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
	public $router;
	public $request;

	public function __construct()
	{
		$this->request = new Request();
 		$this->router = new Router($this->request);
	}

	public function run()
	{
		$this->router->resolve();
	}
}
