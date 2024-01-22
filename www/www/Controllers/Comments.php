<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;

class Comments
{

    public function allComments(): void
    {
        $myView = new View("Comment/comment", "back");
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
