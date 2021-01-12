<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core\form;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core\form
 */
abstract class BaseField
{
	public $model;
	public $attribute;

	public function __construct($model, $attribute)
	{
		$this->model = $model;
		$this->attribute = $attribute;
	}

	abstract public function renderInput();

	public function __toString()
	{
		return sprintf('
			<div class="form-group">
				<label>%s</label>
				%s
				<div class="invalid-feedback">
					%s
				</div>
			</div>
			', $this->model->getLabel($this->attribute), $this->renderInput(), $this->model->getFirstError($this->attribute));
	}
}