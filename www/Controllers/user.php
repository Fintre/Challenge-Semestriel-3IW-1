<<<<<<< HEAD
<?php

namespace App\Controllers;

use App\Core\View;
// use App\Models\User;
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

    

    public function delete(): void
    {
        echo "Supprimmer un utilisateur";
    }





}
=======
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
        $newUser = new View("User/newuser", "front");
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
>>>>>>> Soumaya
