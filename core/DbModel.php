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

abstract class DbModel extends Model
{
	abstract public function tableName();

	abstract public function attributes();

	public function save()
	{
		$tableName = $this->tableName();
		$attributes = $this->attributes();
		$params = array_map(function($attr) { return ":$attr"; }, $attributes);
		$statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")");

		foreach ($attributes as $attribute) {
			$statement->bindValue(":$attribute", $this->{$attribute});
		}
		$statement->execute();
		return true;
		
	}

	public function prepare($sql)
	{
		return Application::$app->db->pdo->prepare($sql);
	}

}