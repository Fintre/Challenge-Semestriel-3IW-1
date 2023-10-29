<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;

class Medias
{

    public function allmedias(): void
    {
        echo "Mes medias";
    }

    public function newMedia()
    {
        $myView = new View("Media/newmedia", "front");
    }

    public function editMedia()
    {
        $myView = new View("Media/editmedia", "front");
    }
    public function save(): void
    {
        echo "save the media";
    }

    public function update(): void
    {
        echo "update the media";
    }

    public function delete(): void
    {
        echo "delete the media";
    }
}
