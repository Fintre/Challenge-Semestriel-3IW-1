<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;

class Medias
{

    public function medias(): void
    {
        // recuperer la liste des medias de l'utilisateur et renvoyer la view qui affiche les posts

        echo "Mes medias";
    }

    public function newMedia()
    {
        $myView = new View("Media/new-media", "front");
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
