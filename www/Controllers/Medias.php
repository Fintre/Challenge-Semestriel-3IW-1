<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;

class Medias
{

    public function allMedias(): void
    {
        session_start();
        $myView = new View("Media/allMedias", "back");
    }

    public function media(): void
    {
        $myView = new View("Media/media", "back");
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
