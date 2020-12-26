<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 *
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

require_once __DIR__.'/vendor/autoload.php';

use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController; 

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
	'db' => [
		'dsn' => $_ENV['DB_DSN'],
		'user' => $_ENV['DB_USER'],
		'password' => $_ENV['DB_PASSWORD'],
	]
];

$app = new Application(__DIR__, $config);


$app->db->applyMigrations();
