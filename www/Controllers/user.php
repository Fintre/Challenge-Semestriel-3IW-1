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

    public function editUser(): void {
        $userId = $_GET['id'] ?? null;
        $db = DB::getInstance();
        $errors = [];
        $success = [];

        if ($userId) {
            // Charger les données existantes de l'utilisateur
            $userData = $db->getOneBy(['id' => $userId]);
            if (!$userData) {
                $errors[] = "Utilisateur non trouvé.";
            } else {
                $form = new EditUser((array)$userData);
            }
        } else {
            $errors[] = "Aucun ID d'utilisateur spécifié.";
        }

        $config = $form->getConfig();

        if ($_SERVER["REQUEST_METHOD"] === $config["config"]["method"]) {
            $verificator = new Verificator();
            if ($verificator->checkForm($config, $_REQUEST, $errors)) {
                // Mettre à jour les propriétés de l'objet utilisateur
                $userData->setDataFromArray($_REQUEST);
                // Enregistrer les modifications
                $userData->save(); // Cette méthode doit gérer la logique de mise à jour
                $success[] = "Les informations de l'utilisateur ont été mises à jour avec succès.";
            }
        }

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
