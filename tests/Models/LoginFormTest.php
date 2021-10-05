<?php

namespace Tests\Models;

use App\Models\LoginForm;
use PHPUnit\Framework\TestCase;

class LoginFormTest extends TestCase
{
    public LoginForm $loginForm;
    protected function setUp(): void
    {
        $this->loginForm = new LoginForm();
    }

    public function testLoginFormEmailAndPasswordProperty(){
        $this->loginForm->loadData(["email"=>"test@example.com", "password" => "test"]);
        $this->assertSame("test@example.com", $this->loginForm->email);
        $this->assertSame("test", $this->loginForm->password);
    }
}
