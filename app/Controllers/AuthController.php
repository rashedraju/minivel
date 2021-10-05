<?php

namespace App\Controllers;

use Minivel\Application;
use Minivel\Request;
use Minivel\Response;
use App\Models\LoginForm;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response){
        $loginModel = new LoginForm();

        if($request->isPost()){
            $loginModel->loadData($request->getBody());
            if($loginModel->validate() && $loginModel->login()){
                $response->redirect("/");
            }
        }
        // render login view
        return $this->render("login", [
            "model" => $loginModel
        ]);
    }

    public function register(Request $request, Response $response){
        $register = new User;

        if($request->isPost()){
            $register->loadData($request->getBody());

            if($register->validate() && $register->save()){
                Application::$app->session->setFlashMessage("success", "Thanks for registering");
                $response->redirect("/");
            }
        }
        // render register view
        return $this->render("register", ["model" => $register]);
    }

    public function logout(Request $request, Response $response){
        Application::$app->logout();
        $response->redirect("/");
    }
}