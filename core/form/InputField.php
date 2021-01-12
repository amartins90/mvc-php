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
 *	@package app\core\form
 */

class InputField extends BaseField
{
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_NUMBER = 'number';

	public $model;
	public $attribute;
	public $type;

	public function __construct($model, $attribute)
	{
		$this->type = self::TYPE_TEXT;
		parent::__construct($model, $attribute);
	}

	public function passwordField()
	{
		$this->type = self::TYPE_PASSWORD;
		return $this;
	}

	public function renderInput()
	{
		return sprintf('<input type="%s" name="%s" value="%s" class="form-control%s">', $this->type, $this->attribute, $this->model->{$this->attribute}, $this->model->hasError($this->attribute) ? ' is-invalid' : '');
	}
}
