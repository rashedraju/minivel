<?php

namespace App\core;

abstract class DBModel extends Model
{
    abstract public function getTableName() : string;
    abstract public function getAttributes() : array;

    public function save(){
        $table = $this->getTableName();
        $attributes = $this->getAttributes();
        $columns = implode(",", $attributes);
        $params = implode(",", array_map(function($attr) {
            return ":$attr";
        }, $attributes));

        $statement = self::prepare("INSERT INTO $table($columns) VALUES($params)");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->$attribute);
        }
        return $statement->execute();
    }

    public static function prepare($sql){
        return Application::$app->database->pdo->prepare($sql);
    }
}