<?php
namespace App\Controllers;
use App\Core\View;
use App\Models\User;
class Main
{
    public function home(): void
    {


        $myUser = new User();
        $myUser->setFirstname("YVEs");
        $myUser->setLastname("Skrzypczyk   ");
        $myUser->setEmail("Y.skrzypczyk@gmail.com");
<<<<<<< HEAD
=======
        $myUser->setUsername("Yves.Skrrr");
        $myUser->setRoles("admin");
>>>>>>> main
        $myUser->setPwd("Test1234");
        $myUser->save();


<<<<<<< HEAD
        /*$myUser = User::populate(1);
        $myUser->setLastname("titi");
        $myUser->save();*/
=======
        $myUser = User::populate(1);
        $myUser->setLastname("titi");
        $myUser->save();
>>>>>>> main




        $myView = new View("Main/home", "back");
    }

    public function aboutUs(): void
    {
        $myView = new View("Main/aboutus", "front");
    }
}
