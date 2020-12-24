<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 *
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', function() {
	return 'handling submitted data';
});

$app->run();
