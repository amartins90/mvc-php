<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core\form;

use app\core\Model;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

class Form
{
	public static function begin ($action, $method)
	{
		echo sprintf('<form action="%s" method="%s">', $action, $method);
		return new Form();
	}

	public static function  end()
	{
		echo '</form>';
	}

	public function field($model, $attribute)
	{
		return new InputField($model, $attribute);
	}
}