<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\models;

use app\core\Model;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\models
 */

class ContactForm extends Model
{
	public $subject = '';
	public $email = '';
	public $body = '';

	public function rules()
	{
		return [
			'subject' => [self::RULE_REQUIRED],
			'email' => [self::RULE_REQUIRED],
			'body' => [self::RULE_REQUIRED],
		];
	}

	public function labels()
	{
		return [
			'subject' => 'Enter you subject',
			'email' => 'Your email',
			'body' => 'Body',
		];
	}

	public function send()
	{
		return true;
	}
}