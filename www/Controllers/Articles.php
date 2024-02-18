<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\DB;
use App\Forms\RemoveArticle;
use App\Forms\UpdateArticle;
use App\Models\Article;

class Articles
{
    public function allArticles(): void
    {
        $newUser = new View("Articles/allArticles", "back");
    }

    public function editArticles(): void
    {
        $formUpdate = new UpdateArticle();
        $configUpdate = $formUpdate->getConfig();
        $errorsUpdate = [];
        $successUpdate = [];

        $myView = new View("Articles/editArticles", "back");
        $myView->assign("configForm", $configUpdate);
        $myView->assign("errorsForm", $errorsUpdate);
        $myView->assign("successForm", $successUpdate);
    }

    public function addArticles(): void
    {
        $newUser = new View("Articles/addArticles", "back");
    }

    /*public function deleteArticle(): void
    {
        $articleIdToDelete = $_GET['id'] ?? null;
        if ($articleIdToDelete !== null && is_numeric($articleIdToDelete)) {
            $articleIdToDelete = (int)$articleIdToDelete;

            $deletedArticle = new Article();
            $deletedArticle->delete((array)$articleIdToDelete);

            header('Location: /articles');
            exit;
        } else {
            echo "L'ID de l'article n'est pas valide.";
        }
    }*/

    public function getAllArticles()
    {
        $article = new DB();
        return $allArticles = $article->getArticlesAndBlogs("article"); 
    }
}