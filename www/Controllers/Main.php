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
        session_start();
        // var_dump(session_id());
        // var_dump($_SESSION);
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
        if(isset($_SESSION['user'])) {
            $userSerialized = $_SESSION['user'];

            $user = unserialize($userSerialized);
            $lastname = $user->getLastname();
            $firstname = $user->getFirstname();
            $roles = $user->getRoles();

        }
        $myView = new View("Main/home", "back");
        $myView->assign("elementsCount", $elementsCount);
        $myView->assign("lastname", $lastname);
        $myView->assign("firstname", $firstname);
        $myView->assign("roles", $roles);


    }
}
