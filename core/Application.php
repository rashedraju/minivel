<?php
namespace App\core;

use App\controllers\Controller;

/**
 * @package App\core
 */
class Application{
    public static string $ROOT_DIR;
    public static Application $app;
    public Controller $controller;
    public Request $request;
    public Router $router;
    public Response $response;
    public Database $database;
    public Session $session;

    function __construct(string $rootDir, array $config = [])
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request;
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database($config);
        $this->session = new Session();
    }

    public function run(){
        echo $this->router->resolve();
    }
}