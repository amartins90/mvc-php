<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\controllers
 */
class SiteController extends Controller
{
	public function home()
	{
		$params = [
			'name' => 'TheCodeholic'
		];
		return $this->render('home', $params);
	}

	public function contact()
	{
		$params = [
			'name' => 'TheCodeholic'
		];
		return $this->render('contact', $params);
	}

	public function handleContact($request)
	{
		$body = $request->getBody();
		return 'Handling submitted data';
	}
}
