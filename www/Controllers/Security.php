<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\Verificator;
use App\Forms\AddUser;
use App\Models\User;
use App\Forms\Connexion;
use App\Forms\Login;

class Security
{

    public function login(): void
    {
        $formLogin = new Login();
        $configLogin = $formLogin->getConfig();
        $errorsLogin = [];

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] === $configLogin["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($configLogin, $_REQUEST, $errorsLogin)) {
                // Récupérer les données du formulaire
                $email = $_REQUEST['email'];
                $password = $_REQUEST['pwd'];

                // Créer une instance du modèle User et vérifier les identifiants
                $userModel = new User();
                $user = $userModel->checkUserCredentials($email, $password);

                if ($user) {
                    // Authentification réussie
                    session_start();
                    $_SESSION['user'] = $user; // Stocker les informations de l'utilisateur dans la session
                } else {
                    // Échec de l'authentification
                    $errorsLogin[] = 'Email ou mot de passe incorrect';
                }
            }
        }

        // Préparer la vue avec les données du formulaire et les erreurs
        $myView = new View("Security/login", "neutral");
        $myView->assign("configForm", $configLogin);
        $myView->assign("errorsForm", $errorsLogin);
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
                $user->setFirstname($_REQUEST['Prénom']);
                $user->setLastname($_REQUEST['Nom']);
                $user->setUsername($_REQUEST['Nom_d\'utilisateur']);
                $user->setEmail($_REQUEST['E-mail']);
                $user->setPwd($_REQUEST['Mot_de_passe']);
                $user->setRoles($_REQUEST['Role']);
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
