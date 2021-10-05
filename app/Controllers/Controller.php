<?php

namespace App\Controllers;

use Minivel\Application;
use Minivel\Middlewares\BaseMiddleware;
use Minivel\BaseController;

abstract class Controller extends BaseController
{
    public string $layout = "main";
    protected array $middlewares = [];

    public function setLayout(string $layout){
        $this->layout = $layout;
    }

    public function render($view, $params = []){
        return Application::$app->view->renderView($view, $params);
    }

    protected function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[]  = $middleware;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}