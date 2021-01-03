<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

class Response
{
	public function setStatusCode($code)
	{
		http_response_code($code);
	}

	public function redirect($url)
	{
		header('Location: '.$url);
	}
}
