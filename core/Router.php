<?php
namespace App\core;

class Router{
    public array $routes = [];
    public Request $request;
    public Response $response;

    function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;
        if($callback){
            if(is_string($callback)){
                return $this->renderView($callback);
            }
            if(is_array($callback)){
                Application::$app->controller = new $callback[0];
                $callback[0] = Application::$app->controller;
            }
            return call_user_func($callback, $this->request);
        }

        $this->response->setStatusCode(404);
        return $this->renderView("_404");
    }

    public function renderView($view, $args = []){
        $layoutView = $this->renderLayoutView();
        $contentView = $this->renderContentView($view, $args);
        return str_replace("{{content}}", $contentView, $layoutView);
    }

    protected function renderLayoutView(){
        $app = Application::$app;
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderContentView($viewFile, $args){
        foreach ($args as $key => $value){
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/{$viewFile}.php";
        return ob_get_clean();
    }
}
