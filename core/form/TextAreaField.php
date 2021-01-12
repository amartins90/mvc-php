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
class TextAreaField extends BaseField
{
	public function renderInput()
	{
		return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>', $this->attribute, $this->model->hasError($this->attribute) ? ' is-invalid' : '', $this->model->{$this->attribute});
	}
}