<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\DB;
use App\Core\Verificator;
use App\Forms\EditUser;

class User
{

    public function allUsers(): void
    {
        $newUser = new View("User/allusers", "back");
    }

    public function editUser(): void
    {
        $db = new DB();
        $errors = [];
        $success = [];

        // Étape 1: Charger les données de l'utilisateur
        $userId = $_GET['id'] ?? null;
        if ($userId) {
            $userData = $db->getOneBy(['id' => $userId], 'object');
            if (!$userData) {
                $errors[] = "Utilisateur non trouvé.";
            } else {
                $form = new EditUser((array)$userData);
            }
        } else {
            $errors[] = "Aucun ID d'utilisateur spécifié.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Étape 3: Traiter la soumission du formulaire
            $verificator = new Verificator();
            if ($verificator->checkForm($form->getConfig(), $_POST, $errors)) {
                // Mettre à jour les données de l'utilisateur
                $updateData = [
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    // Assurez-vous de traiter et de valider les autres champs correctement, y compris l'hashage du mot de passe si nécessaire
                ];
                $db->updateUser($userId, $updateData); // Vous devrez implémenter cette méthode
                $success[] = "Les informations de l'utilisateur ont été mises à jour avec succès.";
            }
        }

        $config = $form->getConfig();
        $myView = new View("User/edituser", "back");
        $myView->assign("configForm", $config);
        $myView->assign("errorsForm", $errors);
        $myView->assign("successForm", $success);
    }


    public function delete(): void
    {
        echo "Supprimmer un utilisateur";
    }

    //Récuperer les données de la table gfm_user
    public function getUsers()
    {
        $table = $this->getTableName();

        $user = new DB();
        return $allUsers = $user->getAllData($table); // methode getAllData est créee dans DB avec en parametre le nom de la table

    }

    //recuperer le nom de la table en fonction du nom de la classe (user)
    private function getTableName() {
        $table = get_called_class();
        $table = explode("\\", $table);
        $table = array_pop($table);
        return "gfm_" . strtolower($table);
    }

}
