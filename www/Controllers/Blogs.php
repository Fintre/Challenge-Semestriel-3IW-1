<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\DB;

class Blogs
{
    public function allBlogs(): void
    {
        $errors = [];
        $success = [];
        $blog = new Blog();
        $allBlogs = $blog->getAllArticles();
        //$newUser = new View("Blogs/allBlogs", "back");

        $myView = new View("Blogs/allBlogs", "back");
        $myView->assign("blogs", $allBlogs);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

    public function EditBlogs(): void
    {
        $newUser = new View("Blogs/editBlogs", "back");
    }

    public function addBlogs(): void
    {
        $newUser = new View("Blogs/addBlogs", "back");
    }

    public function getAllBlogs()
    {
        $article = new DB();
        return $allArticles = $article->getArticlesAndBlogs("blog"); 
    }
}