<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\models;

use app\core\Model;
use app\core\Application;
use app\models\User;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

class LoginForm extends Model
{
	public $email = null;
	public $password = null;

	public function rules()
	{
		return [
			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
			'password' => [self::RULE_REQUIRED],
		];
	}

	public function labels()
	{
		return [
			'email' => 'Your email',
			'password' => 'Password'
		];
	}

	public function login()
	{
		$user = User::findOne(['email' => $this->email]);
		if (!$user) {
			$this->addError('email', 'User does not exist with this email');
			return false;
		}
		if (!password_verify($this->password, $user->password)) {
			$this->addError('password', 'Password is incorrect');
			return false;
		}

		return Application::$app->login($user);
	}
}