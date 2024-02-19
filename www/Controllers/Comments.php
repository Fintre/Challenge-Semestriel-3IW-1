<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Media;

class Comments
{

    public function allComments(): void
    {
        session_start();
        $myView = new View("Comment/comment", "back");
    }

    public function save(): void
    {
        session_start();
        echo "save the media";
    }

    public function update(): void
    {
        session_start();
        echo "update the media";
    }

    public function delete(): void
    {
        session_start();
        echo "delete the media";
    }
}
