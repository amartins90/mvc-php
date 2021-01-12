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

class ForbiddenException extends \Exception
{
	protected $code = 403;
	protected $message = 'You don\'t have permission to access this page';
}