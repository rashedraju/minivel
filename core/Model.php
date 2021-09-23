<?php

namespace App\core;

abstract class Model
{
    public const RULE_REQUIRE = 'require';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    public array $errors = [];

    abstract function rules();

    public function loadData($data){
        foreach ($data as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    public function validate(){
        foreach ($this->rules() as $attribute => $rules){
            $value = $this->$attribute;

            foreach ($rules as $rule){
                $ruleName = $rule;

                if(is_array($rule)){
                    $ruleName = $rule[0];
                }

                if($ruleName === self::RULE_REQUIRE && empty($value)){
                    $this->setError($attribute, "$attribute is required.");
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->setError($attribute, "Please enter valid email address");
                }

                if($ruleName === self::RULE_MIN && strlen($value) < $rule[1]){
                    $this->setError($attribute, "Min length of $attribute must be $rule[1]");
                }

                if($ruleName === self::RULE_MAX && strlen($value) > $rule[1]){
                    $this->setError($attribute, "max length of $attribute must be $rule[1]");
                }

                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule[1]}){
                    $this->setError($attribute, "The field must be the same as $rule[1]");
                }

                if($ruleName === self::RULE_UNIQUE){
                    $tableName = $this->getTableName();

                    $statement = Application::$app->database->prepare("SELECT * FROM $tableName WHERE $attribute=:$attribute");
                    $statement->bindValue(":$attribute", $this->$attribute);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if($record){
                        $this->setError($attribute, "Email address already exists");
                    }
                }
            }
        }

        return empty($this->errors);
    }

    public function setError($attribute, $msg){
        $this->errors[$attribute][] = $msg;
    }

    public function hasError($attribute){
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute){
        return $this->errors[$attribute][0] ?? false;
    }
}