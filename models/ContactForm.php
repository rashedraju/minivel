<?php

namespace App\models;

use App\core\Model;

class ContactForm extends Model
{
    public string $name = "";
    public string $email = "";
    public string $body = "";

    public function rules(): array
    {
        return [
            "name" => [self::RULE_REQUIRE],
            "email" => [self::RULE_REQUIRE, self::RULE_EMAIL],
            "body" => [self::RULE_REQUIRE]
        ];
    }

    public function getLabels() : array
    {
        return [
            "name" => "Enter your name",
            "email" => "Enter your email",
            "body" => "Body"
        ];
    }

    public function send(){
        return true;
    }
}