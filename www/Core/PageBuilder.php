<?php
namespace App\Core;
use App\Core\View;
use App\Core\DB;
use App\Models\Post;

class PageBuilder
{
    public function build($slug)
    {
        $db = new Post();
        $slugTrim = str_replace('/', '', $slug);
        $arraySlug = ["slug"=> $slugTrim];
        $post = $db->getOneBy($arraySlug);
        $template = $post["theme_id"];
        $body = $post["body"];
        $title = $post["title"];
        $htmlFile = "TemplateFront/{$template}";

        $requestUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routeFound = false;
        if ($slug === $requestUrl) {
            $routeFound = true;
        }
        if ($routeFound) {
            $View = new View($htmlFile);
            $View->assign("body", $body);
            $View->assign("title", $title);
        }
    }

}