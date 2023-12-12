<?php

namespace App\Controllers;
use App\Core\View;

class Security
{

    public function login(): void
    {
        //creer une instance userinsert -> envoyer a la vue pour affichage -> la vue peut l'afficher
        $form = new \App\Forms\UserInsert();
        $myView = new View("Security/login", "front");
        \App\Core\FormGenerator::generateForm($form);
        include(__DIR__ . '/../Views/votre_vue.php');
    }
    public function logout(): void
    {
        echo "Ma page de déconnexion";
    }
    public function register(): void
    {
        echo "Ma page d'inscription";
    }

}
