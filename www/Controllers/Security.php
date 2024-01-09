<?php

namespace App\Controllers;
use App\Core\View;
use App\Models\User;

class Security
{

    public function register(): void
    {
        //creer une instance userinsert -> envoyer a la vue pour affichage -> la vue peut l'afficher
        $form = new \App\Forms\UserInsert();
        $myView = new View("Security/register", "front");
        \App\Core\FormGenerator::generateForm($form);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $lastname = $_POST['firstname'];
            $firstname = $_POST['lastname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $pwd = $_POST['pwd'];
            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setRoles("role1");
            $user->setPwd($pwd);
            $user->save();

            $myView = new View("Main/home", "back");

        }
        
        // include(__DIR__ . '/../Views/register.view.php');
    }
    public function logout(): void
    {
        echo "Ma page de déconnexion";
    }
    public function login(): void
    {
        echo "Ma page d'inscription";
    }

}