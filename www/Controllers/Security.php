<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\AddUser;
use App\Models\User;
use App\Forms\Connexion;

class Security
{

    public function login(): void
    {
        $formLogin = new Connexion();
        $configLogin = $formLogin->getConfig();

        $myView = new View("Security/login", "back");
        $myView->assign("configFormLogin", $configLogin);
    }

    public function register(): void
    {
        $form = new AddUser();
        $config = $form->getConfig();

        $errors = [];

        // Est ce que le formulaire a été soumis
        if( $_SERVER["REQUEST_METHOD"] == $config["config"]["method"] )
        {
            // Ensuite est-ce que les données sont OK
            $verificator = new Verificator();
            if($verificator->checkForm($config, $_REQUEST, $errors)){
                $user = new User();
                $user->setFirstname($_REQUEST['firstname']);
                $user->setLastname($_REQUEST['lastname']);
                $user->setUsername($_REQUEST['username']);
                $user->setEmail($_REQUEST['email']);
                $user->setPwd($_REQUEST['pwd']);
                $user->setRoles($_REQUEST['role']);
                $user->save(); //ajouter toutes les données dans la base de données
            }
        }

        $myView = new View("Security/register", "neutral");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);

    }
    public function logout(): void
    {
        echo "Déconnexion";
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
