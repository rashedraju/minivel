<?php

namespace App\core\form;

use App\core\Model;

class Form
{
    public static function begin(string $action, string $method): Form{
        echo sprintf('<form action=%s method=%s>', $action, $method);
        return new Form;
    }

    public static function field(Model $model, string $attribute): Field{
        return new Field($model, $attribute);
    }

    public static function end(){
        echo "</form>";
    }
}