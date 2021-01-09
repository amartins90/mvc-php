<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\core\Session;
use app\core\Application;
use app\models\LoginForm;
use app\core\middlewares\AuthMiddleware;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

class AuthController extends Controller
{
	public function __construct()
	{
		$this->registerMiddleware(new AuthMiddleware(['profile']));
	}

	public function login($request, $response)
	{
		$loginForm = new LoginForm();
		if ($request->isPost()) {
			$loginForm->loadData($request->getBody());
			if ($loginForm->validate() && $loginForm->login()) {
				$response->redirect('/');
				// Application::$app->login();
				return;
			}
		}
		$this->setLayout('auth');
		return $this->render('login', [
			'model' => $loginForm
		]);
	}

	public function register($request)
	{
		$errors = array();
		$user = new User();
		if ($request->isPost()) {
			$user->loadData($request->getBody());

			if ($user->validate() && $user->save()) {
				Application::$app->session->setFlash('success', 'Thanks for registering');
				Application::$app->response->redirect('/');
				exit;
			}
			return $this->render('register', [
				'model' => $user
			]);
		}

		$this->setLayout('auth');

		return $this->render('register', [
			'model' => $user
		]);
	}

	public function logout($request, $response)
	{
		Application::$app->logout();
		$response->redirect('/');
	}

	public function profile()
	{
		return $this->render('profile');
	}
}
