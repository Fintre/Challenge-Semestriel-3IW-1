<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\DB;
use App\Forms\UpdateArticle;
use App\Models\Article;
use App\Models\Post;

class Articles
{
    public function allArticles(): void
    {
        session_start();
        $errors = [];
        $success = [];
        $article = new Article();
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $articleId = $_GET['id'];

            if ($article->deleteArticlesAndBlogs($articleId)) {
                $success[] = "L'article a été supprimé avec succès.";
            } else {
                $errors[] = "La suppression a échoué.";
            }
        }
        $allArticles = $article->getAllArticles();

        $myView = new View("Articles/allArticles", "back");
        $myView->assign("articles", $allArticles);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

    public function editArticles(): void
    {
        session_start();
        $article = new Article();
        if (isset($_GET['article']) && $_GET['article']) {
            $articleId = $_GET['article'];
            $selectedArticle = $article->getArticlesAndBlogs("article", $articleId);

            // Vérifiez si l'article a été trouvé avant d'essayer d'accéder à ses propriétés
            if ($selectedArticle) {
                $formUpdate = new UpdateArticle();
                $configUpdate = $formUpdate->getConfig($selectedArticle[0]["title"], $selectedArticle[0]["description"]);
                $errorsUpdate = [];
                $successUpdate = [];

                $myView = new View("Articles/editArticles", "back");
                $myView->assign("article", $selectedArticle);
                $myView->assign("configForm", $configUpdate);
                $myView->assign("errorsForm", $errorsUpdate);
                $myView->assign("successForm", $successUpdate);
            } else {
                // Gérer le cas où l'article n'est pas trouvé
                echo "Article non trouvé.";
            }
        }
    }

    public function addArticles(): void
    {
        session_start();
        $newUser = new View("Articles/addArticles", "back");
    }

    public function updateArticle(): void
    {
        session_start();
        // Formatez le timestamp en une date lisible
        $formattedDate = date('Y-m-d H:i:s');

        $title = $_REQUEST['Titre'];
        $description = $_REQUEST['Description'];

        $article = new Post();
        $article->setTitle($title);
        $article->setDescription($description);
        $article->setUpdatedAt($formattedDate);
        $article->save();
    }

}
