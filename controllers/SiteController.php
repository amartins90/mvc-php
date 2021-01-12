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
use app\models\ContactForm;
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

	public function contact($request, $response)
	{
		$params = [
			'name' => 'TheCodeholic'
		];
		$contact = new ContactForm();
		if ($request->isPost()) {
			$contact->loadData($request->getBody());
			if ($contact->validate() && $contact->send()) {
				Application::$app->session->setFlash('success', 'Thanks for contacting us.');
				return $response->redirect('/contact');
			}

		}
		return $this->render('contact', ['model' => $contact]);
	}

}
