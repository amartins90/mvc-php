<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\controllers;

use app\core\Controller;
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
		if ($request->isPost()) {
			return 'Handle submitted data';
		}
		$this->setLayout('auth');
		return $this->render('register');
	}
}
