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
        $myUser->setUsername("yskr");
        $myUser->setEmail("Y.skrzypczyk@gmail.com");
        $myUser->setPwd("Test1234");
        $myUser->setRoles("role");
        $myUser->setStatus(1);
        /*$myUser->save();*/

        /*$myUser = User::populate(1);
        $myUser->setLastname("titi");
        $myUser->save();*/




        $myView = new View("Main/home", "back");
    }

    public function aboutUs(): void
    {
        $myView = new View("Main/aboutus", "front");
    }
}
