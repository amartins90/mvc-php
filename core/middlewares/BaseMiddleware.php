<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core\middlewares;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core\middlewares
 */

abstract class BaseMiddleware
{
	abstract public function execute();
}