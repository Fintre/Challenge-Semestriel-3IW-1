<?php

namespace App\Forms;

class UpdateArticle
{
    public function getConfig($defaultTitle, $defaultDescription): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"update-article",
                "submit"=>"Enregistrer",
                "class"=>"form",
                "id"=>"form-update"
            ],
            "inputs"=> [
                "Titre"=>["type"=>"text", "name"=>"title", "class"=>"input-form", "id"=>"title-article", "placeholder"=>"Titre", "minlen"=>2, "required"=>true, "value" => htmlspecialchars($defaultTitle)],
            ],
            "textareas"=>[
                "Description"=>["type"=>"textarea", "name"=>"description", "class"=>"input-form textarea-form", "id"=>"description-article", "placeholder"=>"Description", "minlen"=>2, "required"=>true, "rows"=>10, "value" => htmlspecialchars($defaultDescription)],
            ]
        ];
    }
}