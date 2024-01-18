<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\Post;

class Posts
{

    public function allPosts(): void
    {
        $myView = new View("Post/post", "back");


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