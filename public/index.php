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

$app = new Application;

$app->router->get('/', function() {
	return 'Hello World!';
});

$app->router->get('/contact', function() {
	return 'Contact';
});

$app->run();
