<?php

namespace App\Controllers;

use Minivel\Application;

class HomeController extends Controller
{
    public function home(){
        $displayName = Application::isGuest() ? "Guest" : Application::$app->user->getDisplayName();
        return $this->render("home", ["name" => $displayName]);
    }
}