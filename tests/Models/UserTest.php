<?php

namespace Tests\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public User $user;
    protected function setUp(): void
    {
        $this->user = new User;
    }
    public function testGetRulesReturnArray(){
        $this->assertCount(4, $this->user->getRules());
    }
    public function testGetTableNameReturnString(){
        $this->assertSame("users", $this->user::getTableName());
    }
    public function testGetPrimaryKeyReturnString(){
        $this->assertSame("id", $this->user::getPrimaryKey());
    }
    public function testGetAttributesReturnArray(){
        $this->assertContains("username", $this->user->getAttributes());
    }
    public function testGetLabelsReturnArray(){
        $this->assertCount(4, $this->user->getLabels());
    }
    public function testGetDisplayNameReturnString(){
        $this->user->loadData(["username"=> "john doe"]);
        $this->assertSame("john doe", $this->user->getDisplayName());
    }
}
