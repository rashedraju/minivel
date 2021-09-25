<?php

namespace App\models;

use App\core\UserModel;

class User extends UserModel
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const STATUS_DELETE = -1;

    public string $username = "";
    public string $email = "";
    public string $password = "";
    public string $confirmPassword = "";
    public int $status = self::STATUS_INACTIVE;

    public function save() : bool {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        return parent::save();
    }

    public function rules(): array{
        return [
            "username" => [self::RULE_REQUIRE],
            "email" => [self::RULE_REQUIRE, self::RULE_EMAIL, [self::RULE_UNIQUE, $this]],
            "password" => [self::RULE_REQUIRE, [self::RULE_MIN, 8], [self::RULE_MAX, 24]],
            "confirmPassword" => [self::RULE_REQUIRE, [self::RULE_MATCH, "password"]],
        ];
    }

    public static function getTableName(): string{
        return "users";
    }

    public static function getPrimaryKey() : string{
        return "id";
    }

    public function getAttributes(): array{
        return ["username", "email", "password", "status"];
    }

    public function getLabels() : array
    {
        return [
            "username" => "Username",
            "email" => "Email",
            "password" => "Password",
            "confirmPassword" => "Confirm password"
        ];
    }

    public function getDisplayName(): string
    {
        return $this->username;
    }
}