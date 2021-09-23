<?php

namespace App\controllers;

use App\core\Application;
use App\core\Request;

class SiteController extends Controller
{
    public function home(){
        $users = [
            "name" => "John Doe"
        ];

        return $this->render("home", $users);
    }
    public function contact(){
        return $this->render("contact");
    }

    public function contactHandler(Request $request): string{
        print_r($request->getBody());
        return "Handling contact...";
    }
}