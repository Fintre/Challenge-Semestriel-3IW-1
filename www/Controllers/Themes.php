<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Theme;
class Themes
{

    public function allThemes(): void
    {
        $myView = new View("Themes/themes", "back");
    }


    public function newTheme(): void
    {
        $newUser = new View("Themes/newtheme", "back");
    }

    public function edit(): void
    {
        $editUser = new View("Themes/edittheme", "back");
    }



    public function delete(): void
    {
        echo "Supprimmer une theme";
    }





}
