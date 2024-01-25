<?php

namespace App\Controllers;
use App\Core\View;
use App\Models\User;

class Security
{

    public function register(): void
    {
        $form = new UserInsert();
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
                $user->setEmail($_REQUEST['email']);
                $user->setPwd($_REQUEST['pwd']);
                $user->setRoles($_REQUEST['role']);
                $user->save(); //ajouter toutes les données dans la base de données
            }
        }

        $myView = new View("Security/register", "front");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);

    }
    public function logout(): void
    {
        $form = new \App\Forms\Connexion();
        $myView = new View("Security/logout", "back");
        \App\Core\FormGenerator::generateForm($form);
    }
    public function login(): void
    {
        $formLogin = new Connexion();
        $configLogin = $formLogin->getConfig();

        $myView = new View("Security/login", "front");
        $myView->assign("configFormLogin", $configLogin);
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
