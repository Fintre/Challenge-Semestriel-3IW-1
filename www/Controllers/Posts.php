<?php

namespace App\Controllers;

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
        $newPosts = new View("Post/newpost", "back");
    }

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
