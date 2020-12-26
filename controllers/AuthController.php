<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

class AuthController extends Controller
{
	public function login()
	{
		$this->setLayout('auth');
		return $this->render('login');
	}

	public function register($request)
	{
		$errors = array();
		$registerModel = new RegisterModel();;
		if ($request->isPost()) {
			$registerModel->loadData($request->getBody());

			if ($registerModel->validate() && $registerModel->register()) {
				return 'Success';
			}
			return $this->render('register', [
				'model' => $registerModel
			]);
		}

		$this->setLayout('auth');

		return $this->render('register', [
			'model' => $registerModel
		]);
	}
}
