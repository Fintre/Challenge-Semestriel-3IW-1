<?php

namespace App\Controllers;

use App\Core\View;

class User
{

    public function allUsers(): void
    {
        echo "tous les utilisateurs";
    }

    public function newUser(): void
    {
        $newUser = new View("User/newuser", "front");
    }

    public function edit(): void
    {
        $editUser = new View("User/edituser", "front");
    }


    public function delete($userId): void
    {
        echo "Supprimmer un utilisateur";
    }





}
