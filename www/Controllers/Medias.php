<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;

class Medias
{

    public function allmedias(): void
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
