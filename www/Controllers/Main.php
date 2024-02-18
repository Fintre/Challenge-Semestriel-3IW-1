<?php
namespace App\Controllers;
use App\Core\View;
use App\Models\User;
use App\Models\Post;
use App\Models\Media;
use App\Models\Comment;
use App\Models\Theme;
class Main
{
    public function home(): void
    {
        $user = new User();
        $post = new Post();
        $media = new Media();
        $comment = new Comment();
        $themes = new Theme();

        $elementsCount = [
            'users' => $user->getNbElements(),
            'pages' => $post->getElementsByType('type', 'page'),
            'photos' => $media->getElementsByType('type', 'photo'),
            'comments' => $comment->getNbElements(),
            'videos' => $media->getElementsByType('type', 'video'),
            'themes' => $themes->getNbElements(),
            ];

        $myView = new View("Main/home", "back");
        $myView->assign("elementsCount", $elementsCount);
    }
}
