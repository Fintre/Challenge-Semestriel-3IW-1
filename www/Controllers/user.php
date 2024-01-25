<?php

namespace App\Controllers;

use App\Core\View;

class User
{

    public function allUsers(): void
    {
        $newUser = new View("User/allusers", "back");
    }

    public function newUser(): void
    {
        $newUser = new View("User/newuser", "back");
    }

    public function edit(): void
    {
        $editUser = new View("User/edituser", "back");
    }


    public function delete(): void
    {
        echo "Supprimmer un utilisateur";
    }

}
