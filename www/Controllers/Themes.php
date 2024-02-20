<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Theme;
class Themes
{

    public function allThemes(): void
    {
        $myView = new View("Themes/allthemes", "back");
    }


    public function newTheme(): void
    {

        $newUser = new View("Themes/newtheme", "back");
    }

    public function boulangerieTheme(): void
    {
        $newUser = new View("Themes/boulangerieTheme", "front");
    }
    public function musicTheme(): void
    {
        $newUser = new View("Themes/musicTheme", "front");
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
