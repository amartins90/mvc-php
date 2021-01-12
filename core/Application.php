<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core;

use app\core\db\Database;
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
	public static $app;
	public $controller;
	public $db;
	public $session;
	public $user;
	public $userClass;
	public $layout = 'main';
	public $view;

	public function __construct($rootPath, $config)
	{
		$this->userClass = $config['userClass'];
		self::$root_dir = $rootPath;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
 		$this->router = new Router($this->request, $this->response);
 		$this->db = new Database($config['db']);
 		$this->session = new Session();
 		$this->view = new View();

 		$primaryValue = $this->session->get('user');
 		if ($primaryValue) {
 			$primaryKey = $this->userClass::primaryKey();
 			$this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
 		} else {
 			$this->user = null;
 		}
	}

	public function run()
	{
		try {
			echo $this->router->resolve();
		} catch (\Exception $e) {
			$this->response->setStatusCode($e->getCode());
			echo $this->view->renderView('error', ['exception' => $e]);
		}
	}

	public function getController()
	{
		return $this->controller;
	}

	public function setController($controller)
	{
		$this->controller = $controller;
	}

	public function login($user)
	{
		$this->user = $user;
		$primaryKey = $user->primaryKey();
		$primaryValue = $user->{$primaryKey};
		$this->session->set('user', $primaryValue);
		return true;
	}

	public function logout()
	{
		$this->user = null;
		$this->session->remove('user');
	}

	public static function isGuest()
	{
		return !self::$app->user;
	}
}
