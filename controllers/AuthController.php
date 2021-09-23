<?php

namespace App\controllers;

use App\core\Application;
use App\core\Request;
use App\models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $this->setLayout("auth");

        if($request->isPost()){
            return "handling login";
        }
        // render login view
        return $this->render("login");
    }

    public function register(Request $request){
        $this->setLayout("auth");
        $register = new User;

        if($request->isPost()){
            $register->loadData($request->getBody());

            if($register->validate() && $register->save()){
                Application::$app->session->setFlashMessage("success", "Thanks for registering");
                Application::$app->response->redirect("/");
            }
        }
        // render register view
        return $this->render("register", ["model" => $register]);
    }
}