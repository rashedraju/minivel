<?php

namespace Tests\Controllers;

use App\Controllers\Controller;
use Minivel\Middlewares\BaseMiddleware;
use PHPUnit\Framework\TestCase;
use Minivel\Middlewares\AuthMiddleware;

class ControllerTest extends TestCase
{
    public function testAbstractControllerSetLayout(){
        $testController = new class extends Controller{};
        $testController->setLayout("test");
        $this->assertSame("test", $testController->layout);
    }

    public function testRegisterMiddlewareAndGetMiddleware(){
        $testController = new class() extends Controller{
            public function regMiddleware(BaseMiddleware $middleware){
                $this->registerMiddleware($middleware);
            }
        };
        $testController->regMiddleware(new AuthMiddleware(["test"]));
        $this->assertCount(1, $testController->getMiddlewares());
    }
}
