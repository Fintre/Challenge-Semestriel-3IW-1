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
        $article = new Article();
        if (isset($_GET['article']) && $_GET['article']) {
            $articleId = $_GET['article'];
            $selectedArticle = $article->getArticlesAndBlogs("article", $articleId);

            // Vérifiez si l'article a été trouvé avant d'essayer d'accéder à ses propriétés
            if ($selectedArticle) {
                $formUpdate = new UpdateArticle();
                $configUpdate = $formUpdate->getConfig($selectedArticle[0]["title"], $selectedArticle[0]["body"], $selectedArticle[0]["id"]);
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
        $formUpdate = new UpdateArticle();
        $configUpdate = $formUpdate->getConfig("", "", "");
        $errorsUpdate = [];
        $successUpdate = [];

        $myView = new View("Articles/addArticles", "back");
        $myView->assign("configForm", $configUpdate);
        $myView->assign("errorsForm", $errorsUpdate);
        $myView->assign("successForm", $successUpdate);

    }

    public function updateArticle(): void
    {
        $formattedDate = date('Y-m-d H:i:s');

        $title = $_REQUEST['Titre'];
        $body = $_REQUEST['Contenu'];

        $article = new Post();
        $article->setTitle($title);
        $article->setBody($body);

        if($_GET['id']){
            $post = new Article();
            $selectedArticle = $post->getArticlesAndBlogs("article", $_GET['id']);

            $article->setId($_GET['id']);
            $article->setUpdatedAt($formattedDate);
            $article->setCreatedAt($selectedArticle[0]["createdat"]);
            $article->setDescription($selectedArticle[0]["description"]);
            $article->setIsDeleted($selectedArticle[0]["isdeleted"]);
            $article->setPublished($selectedArticle[0]["published"]);
            $article->setSiteSetting_Id($selectedArticle[0]["sitesetting_id"]);
            $article->setSlug($selectedArticle[0]["slug"]);
            $article->setType($selectedArticle[0]["type"]);
            $article->setUser_Id($selectedArticle[0]["user_id"]);
            $article->setThemeId($selectedArticle[0]["theme_id"]);
            $article->setTheme($selectedArticle[0]["theme"]);

        }else{
            $article->setUpdatedAt($formattedDate);
            $article->setCreatedAt($formattedDate);

            $article->setDescription("");
            $article->setIsDeleted(0);
            $article->setPublished(0);
            $article->setSiteSetting_Id(1);
            $article->setSlug("");
            $article->setType("article");
            $article->setUser_Id(1);
            $article->setThemeId(1);
            $article->setTheme("");
        }

        $article->save();
        header("Location: /articles");
        exit();
    }
}