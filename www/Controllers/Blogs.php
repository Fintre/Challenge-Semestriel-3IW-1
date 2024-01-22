<?php

namespace App\Controllers;

use App\Core\View;

class Blogs
{
    public function allBlogs(): void
    {
        $newUser = new View("Blogs/allBlogs", "back");
    }

    public function EditBlogs(): void
    {
        $newUser = new View("Blogs/editBlogs", "back");
    }

    public function addBlogs(): void
    {
        $newUser = new View("Blogs/addBlogs", "back");
    }
}