<?php

namespace App\Controllers;

use App\Core\DB;
use App\Core\View;
use App\Models\Post;

class Posts
{

    public function allPosts(): void
    {
        // faire la bonne structure de données et remplir de fausse données
       // $fakePost1 = new Post();
        //$fakePost1->setTitle("lapin");
        //$fakePost1->setUserId("yves");
        //$fakePost1->setCreateAt("12/12/2023");
        //$fakePost1->setDescription("SEO");
        //cad faire une class PageArrayRow {
        // string titre;

        // string auteur;
        // }


        $myView = new View("Post/post", "back");
    }

    public function newPosts(): void
    {
        $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowedTags.='<li><ol><ul><span><div><br><ins><del>';
        $info = "N'oubliez pas de sauvegarder";
        $post = new Post();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['id'])) {
            $post->setId(intval($_POST['id']));
            }
            $post->setSlug($_POST['pageSlug']);
            $post->setTitle($_POST['pageTitle']);
            $post->setBody(strip_tags(stripslashes($_POST['pageContent']), $allowedTags));
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
        $newPosts->assign("id", $post->getId() ?? '');
        $newPosts->assign("pageSlug", $post->getSlug() ?? '');
        $newPosts->assign("pageTitle", $post->getTitle() ?? '');
        $newPosts->assign("sContent", $post->getBody() ?? '');
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
