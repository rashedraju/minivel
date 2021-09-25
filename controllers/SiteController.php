<?php

namespace App\controllers;

use App\core\Application;
use App\core\Request;
use App\core\Response;
use App\models\ContactForm;

class SiteController extends Controller
{
    public function home(){
        $displayName = Application::isGuest() ? "Guest" : Application::$app->user->getDisplayName();
        return $this->render("home", ["name" => $displayName]);
    }
    public function contact(Request $request, Response $response){
        $contactForm = new ContactForm();

        if($request->isPost()){
            $contactForm->loadData($request->getBody());
            if($contactForm->validate() && $contactForm->send()){
                Application::$app->session->setFlashMessage("success", "Thanks for contacting with us.");
                $response->redirect("/contact");
            }
        }
        // render login view
        return $this->render("contact", [
            "model" => $contactForm
        ]);
    }
}