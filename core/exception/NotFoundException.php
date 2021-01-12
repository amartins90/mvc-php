<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core\exception;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core\exception
 */

class NotFoundException extends \Exception
{
	protected $code = 404;
	protected $message = 'Page not found';
}