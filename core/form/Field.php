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

class Field
{
	public const TYPE_TEXT = 'text';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_NUMBER = 'number';

	public $model;
	public $attribute;
	public $type;

	public function __construct($model, $attribute)
	{
		$this->model = $model;
		$this->attribute = $attribute;
		$this->type = self::TYPE_TEXT;
	}

	public function __toString()
	{
		return sprintf('
			<div class="form-group">
				<label>%s</label>
				<input type="%s" name="%s" value="%s" class="form-control%s">
				<div class="invalid-feedback">
					%s
				</div>
			</div>
			', $this->model->getLabel($this->attribute), $this->type, $this->attribute, $this->model->{$this->attribute}, $this->model->hasError($this->attribute) ? ' is-invalid' : '', $this->model->getFirstError($this->attribute));
	}

	public function passwordField()
	{
		$this->type = self::TYPE_PASSWORD;
		return $this;
	}


}
