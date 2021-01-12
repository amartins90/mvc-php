<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core\db;

use app\core\Model;
use app\core\Application;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core\db
 */

abstract class DbModel extends Model
{
	abstract public function tableName();

	abstract public function attributes();

	abstract public function primaryKey();

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

	public function findOne($where)
	{
		$tableName = static::tableName();
		$attributes = array_keys($where);
		$sql = implode(" AND ", array_map(function($attr) { return "$attr = :$attr"; }, $attributes));
		$statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
		foreach ($where as $key => $item) {
			$statement->bindValue(":$key", $item);
		}

		$statement->execute();
		return $statement->fetchObject(static::class);
	}

	public function prepare($sql)
	{
		return Application::$app->db->pdo->prepare($sql);
	}

}