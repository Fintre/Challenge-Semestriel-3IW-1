<?php

namespace App\Forms;

class UpdateArticle
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"updateArticle",
                "submit"=>"Enregistrer",
                "class"=>"form",
                "id"=>"form-update"
            ],
            "inputs"=> [
                "Titre"=>["type"=>"text", "class"=>"input-form", "id"=>"title-article", "placeholder"=>"Titre", "minlen"=>2, "required"=>true]
            ],
            "textareas"=>[
                "Description"=>["type"=>"textarea", "class"=>"input-form", "id"=>"description-article", "placeholder"=>"Description", "minlen"=>2, "required"=>true, "rows"=>5],
            ]
        ];
    }
}