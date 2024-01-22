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
         $myUser->setUsername("Yves.Skrrr");
         $myUser->setRoles("admin");
         $myUser->setPwd("Test1234");
         $myUser->save();

         $myUser = User::populate(1);
         $myUser->setLastname("titi");
         $myUser->save();

         $myView = new View("Main/home", "back");
     }

     /*public function aboutUs(): void
     {
         $myView = new View("Main/aboutus", "front");
     }*/
}

