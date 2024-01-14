<?php

namespace App\Controllers;
use App\Core\View;

class Security
{

    public function login(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/login", "neutral");
        \App\Core\FormGenerator::generateForm($form);
        //include(__DIR__ . '/../Views/votre_vue.php');
    }
    public function logout(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/logout", "back");
        \App\Core\FormGenerator::generateForm($form);
        echo "Ma page de déconnexion";
    }
    public function register(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/register", "back");
        \App\Core\FormGenerator::generateForm($form);
        echo "Ma page d'inscription";
    }

}
