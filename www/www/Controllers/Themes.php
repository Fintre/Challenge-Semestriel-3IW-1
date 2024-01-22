<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Theme;
class Themes
{

    public function allThemes(): void
    {
        $myView = new View("Theme/theme", "back");
    }


    public function newTheme(): void
    {
        $newUser = new View("Theme/newuser", "front");
    }

    public function edit(): void
    {
        $editUser = new View("Theme/edittheme", "front");
    }



    public function delete(): void
    {
        echo "Supprimmer une theme";
    }





}
