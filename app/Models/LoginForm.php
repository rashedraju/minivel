<?php

namespace App\Models;

use Minivel\Application;
use Minivel\Model;

class LoginForm extends Model
{
    public string $email = "";
    public string $password = "";

    public function getRules() : array
    {
        return [
            "email" => [self::RULE_REQUIRE, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRE]
        ];
    }

    public function getLabels() : array
    {
        return [
            "email" => "Email",
            "password" => "Password",
        ];
    }

    public function login() : bool
    {
        $user = User::findOne(["email" => $this->email]);

        if($user){
            if(password_verify($this->password, $user->password)){
                return Application::$app->login($user);
            }else{
                $this->setError("password", "Password didn't match.");
                return false;
            }
        }

        $this->setError("email", "User not found with this email");
        return false;
    }
}