<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\models;

use app\core\Model;
use app\core\DbModel;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

 class User extends DbModel
 {
 	const STATUS_INACTIVE = 0;
 	const STATUS_ACTIVE = 1;
 	const STATUS_DELETED = 2;

 	public $firstName;
 	public $lastName;
 	public $email;
 	public $status = self::STATUS_INACTIVE;
 	public $password;
 	public $confirmPassword;

 	public function tableName()
 	{
 		return 'users';
 	}


 	public function save()
 	{
 		$this->status = self::STATUS_INACTIVE;
 		$this->password = password_hash($this->password, PASSWORD_DEFAULT);
 		return parent::save();
 	}

 	public function rules()
 	{
 		return [
 			'firstName' => [self::RULE_REQUIRED],
 			'lastName' => [self::RULE_REQUIRED],
 			'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
 			'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
 			'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
 		];
 	}

 	public function attributes()
 	{
 		return ['firstName', 'lastName', 'email', 'password', 'status'];
 	}

 }