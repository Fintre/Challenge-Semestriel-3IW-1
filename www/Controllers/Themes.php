<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Theme;
class Themes
{

    public function allThemes(): void
    {
        session_start();
        $myView = new View("Themes/themes", "back");
    }


    public function newTheme(): void
    {
        session_start();
        $newUser = new View("Themes/newtheme", "back");
    }

    public function edit(): void
    {
        session_start();
        $editUser = new View("Themes/edittheme", "back");
    }



    public function delete(): void
    {
        echo "Supprimmer une theme";
    }





}
