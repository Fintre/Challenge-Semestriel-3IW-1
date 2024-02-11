<?php

namespace App\Controllers;
use App\Core\View;
use App\Core\DB;

class User
{

    public function allUsers(): void
    {
        $newUser = new View("User/allusers", "back");
    }

    public function edit(): void
    {
        $editUser = new View("User/edituser", "back");
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
