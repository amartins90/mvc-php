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
 *	@package app\core
 */

 class RegisterModel extends Model
 {
 	public $firstName;
 	public $lastName;
 	public $email;
 	public $password;
 	public $confirmPassword;

 	public function register()
 	{
 		echo "Creating new user";
 	}

 	public function rules()
 	{
 		return [
 			'firstName' => [self::RULE_REQUIRED],
 			'lastName' => [self::RULE_REQUIRED],
 			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
 			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
 			'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
 		];
 	}

 }