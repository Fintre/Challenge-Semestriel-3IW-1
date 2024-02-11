<?php

namespace App\Controllers;

use App\Core\View;

class Articles
{
    public function allArticles(): void
    {
        $newUser = new View("Articles/allArticles", "back");
    }

    public function editArticles(): void
    {
        $newUser = new View("Articles/editArticles", "back");
    }

    public function addArticles(): void
    {
        $newUser = new View("Articles/addArticles", "back");
    }

    public function getAllArticles()
    {
        $article = new DB();
        return $allArticles = $article->getAllData($table); // methode getAllData est créee dans DB avec en parametre le nom de la table

    }
}