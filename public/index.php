<?php
require __DIR__ . "/../vendor/autoload.php";

use App\controllers\AuthController;
use App\core\Application;
use App\controllers\SiteController;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$config = [
    "userClass" => \App\models\User::class,
    "db" => [
        "dsn" => $_ENV['DB_DSN'],
        "username" => $_ENV['DB_USER'],
        "password" => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get("/", [SiteController::class, "home"]);
$app->router->get("/contact", [SiteController::class, "contact"]);
$app->router->post("/contact", [SiteController::class, "contact"]);
$app->router->get("/login", [AuthController::class, "login"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/register", [AuthController::class, "register"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->get("/logout", [AuthController::class, "logout"]);
$app->router->get("/profile", [AuthController::class, "profile"]);

$app->run();