<?php
require __DIR__ . "/../vendor/autoload.php";

use App\Controllers\AuthController;
use App\Models\User;
use Dotenv\Dotenv;
use Minivel\Application;
use App\Controllers\HomeController;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$config = [
    "userClass" => User::class,
    "DB" => [
        "dsn" => $_ENV['DB_DSN'],
        "username" => $_ENV['DB_USER'],
        "password" => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get("/", [HomeController::class, "home"]);
$app->router->get("/login", [AuthController::class, "login"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "register"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->get("/logout", [AuthController::class, "logout"]);

$app->run();