<?php

namespace App\Controllers;
use App\Core\View;

class Security
{

    public function login(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/login", "neutral");
        //\App\Core\FormGenerator::generateForm($form);
        //include(__DIR__ . '/../Views/votre_vue.php');
    }
    public function logout(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/logout", "back");
        \App\Core\FormGenerator::generateForm($form);
    }
    public function register(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/register", "back");
        \App\Core\FormGenerator::generateForm($form);
    }

    public function forgetPassword(): void
    {
        $form = new \App\Forms\RecoverPassword();
        $myView = new View("Security/forgetPassword", "neutral");
    }

    public function getCode(): void
    {
        $form = new \App\Forms\GetCode();
        $myView = new View("Security/getCode", "neutral");
    }

    public function initPassword(): void
    {
        $form = new \App\Forms\InitPassword();
        $myView = new View("Security/initPassword", "neutral");
    }

}
