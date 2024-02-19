<?php

namespace App\Controllers;

use App\Core\DB;
use App\Core\View;
use App\Models\Post;

class Posts
{

    public function allPosts(): void
    {

        $post = new Post();
        $posts = $post->getAllData("object");

        $allPostView = new View("Post/post", "back");
        $allPostView->assign("posts", $posts);
    }

    public function post(): void
    {

        $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowedTags.='<li><ol><ul><span><div><br><ins><del>';
        $info = "N'oubliez pas de sauvegarder";


        $post = new Post();

        if (isset($_GET['id'])) {
            $retrievedPost = $post->getOneBy(['id' => $_GET['id']], 'object');
            if (!empty($retrievedPost)) {
                $post = $retrievedPost;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['isDeleted'] == 1) {
                $post->delete(['id' => intval($_POST['id'])]);
                header('Location: /posts');
                exit();
            }

            if (!empty($_POST['id'])) {
            $post->setId(intval($_POST['id']));
            }
            $post->setSlug($_POST['pageSlug']);
            $post->setTitle($_POST['pageTitle']);
            $post->setBody(strip_tags(stripslashes($_POST['pageContent']), $allowedTags));
            $post->setIsDeleted($_POST['isDeleted']);
            $isPublished = 0;
            if (isset($_POST['isPublished'])) {
                $isPublished = $_POST['isPublished'] === "on" ? 1 : 0;

            }
            $post->setPublished($isPublished);

            $missingFields = $post->validate();


            if (count($missingFields) === 0) {
                $postId = $post->save();
                $savedPost = $post->getOneBy(['id' => $postId], 'object');
                $post = $savedPost;
                $info = "Page sauvegardée";
            }
        }

        $newPosts = new View("Post/newpost", "back");
        $newPosts->assign("info", $info);
        $newPosts->assign("post", $post);
        $newPosts->assign("mandatoryFields", $missingFields ?? []);
    }

    public function save(): void
    {
        echo "save the post";
    }

    private function validateField(Post $newPost): bool
    {

        return false;
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
