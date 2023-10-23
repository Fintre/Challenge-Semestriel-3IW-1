<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Post;

class Posts
{

    public function posts(): void
    {
        // recuperer la liste des posts de l'utilisateur et renvoyer la view qui affiche les posts
        echo "Mes posts";
    }

    public function newPost()
    {
        $myView = new View("Post/new-post", "front");
    }

    public function save(): void
    {
        echo "save the post";
    }

    public function update(): void
    {
        echo "update the post";
    }

    public function delete(): void
    {
        echo "delete the post";
    }

}