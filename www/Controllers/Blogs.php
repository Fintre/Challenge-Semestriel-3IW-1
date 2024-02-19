<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\DB;
use App\Forms\UpdateBlog;
use App\Models\Article;
use App\Models\Blog;

class Blogs
{

    public function allBlogs(): void
    {
        $errors = [];
        $success = [];
        $blog = new Blog();
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $blogId = $_GET['id'];

            if ($blog->deleteArticlesAndBlogs($blogId)) {
                $success[] = "Le blog a été supprimé avec succès.";
            } else {
                $errors[] = "La suppression a échoué.";
            }
        }
        $allblogs = $blog->getAllArticles();

        $myView = new View("Blogs/allBlogs", "back");
        $myView->assign("allblogs", $allblogs);
        $myView->assign("errors", $errors);
        $myView->assign("success", $success);
    }

    public function EditBlogs(): void
    {
        $blog = new Blog();

        if (isset($_GET['blog']) && $_GET['blog']) {
            $blogId = $_GET['blog'];
            $selectedBlog = $blog->getArticlesAndBlogs("blog", $blogId);

            if ($selectedBlog) {
                $formUpdate = new UpdateBlog();
                $configUpdate = $formUpdate->getConfig($selectedBlog[0]["title"], $selectedBlog[0]["body"], $selectedBlog[0]["id"]);
                $errorsUpdate = [];
                $successUpdate = [];

                $myView = new View("Blogs/editBlogs", "back");
                $myView->assign("blog", $selectedBlog);
                $myView->assign("configForm", $configUpdate);
                $myView->assign("errorsForm", $errorsUpdate);
                $myView->assign("successForm", $successUpdate);
            } else {
                echo "Blog non trouvé.";
            }
        }
       
    }

    public function addBlogs(): void
    {
        $formUpdate = new UpdateBlog();
        $configUpdate = $formUpdate->getConfig("", "", "");
        $errorsUpdate = [];
        $successUpdate = [];

        $myView = new View("Blogs/addBlogs", "back");
        $myView->assign("configForm", $configUpdate);
        $myView->assign("errorsForm", $errorsUpdate);
        $myView->assign("successForm", $successUpdate);
    }

    public function updateBlog(): void
    {
        $formattedDate = date('Y-m-d H:i:s');

        $title = $_REQUEST['Titre'];
        $body = $_REQUEST['Contenu'];

        $article = new Blog();
        $article->setTitle($title);
        $article->setBody($body);

        if($_GET['id']){
            $post = new Blog();
            $selectedArticle = $post->getArticlesAndBlogs("blog", $_GET['id']);

            $article->setId($_GET['id']);
            $article->setUpdatedAt($formattedDate);
            $article->setCreatedAt($selectedArticle[0]["createdat"]);
            $article->setDescription($selectedArticle[0]["description"]);
            $article->setIsDeleted($selectedArticle[0]["isdeleted"]);
            $article->setPublished($selectedArticle[0]["published"]);
            $article->setSiteSettingId($selectedArticle[0]["siteSetting_id"]);
            $article->setSlug($selectedArticle[0]["slug"]);
            $article->setType($selectedArticle[0]["type"]);
            $article->setUserId($selectedArticle[0]["user_id"]);
            $article->setThemeId($selectedArticle[0]["theme_id"]);
            $article->setTheme($selectedArticle[0]["theme"]);

        }else{
            $article->setUpdatedAt($formattedDate);
            $article->setCreatedAt($formattedDate);

            $article->setDescription("");
            $article->setIsDeleted(0);
            $article->setPublished(0);
            $article->setSiteSettingId(1);
            $article->setSlug("");
            $article->setType("blog");
            $article->setUserId(1);
            $article->setThemeId(1);
            $article->setTheme("");
        }

        $article->saveInpost();
        header("Location: /bo/blogs");
        exit();
    }
}
