<?php

namespace App\Forms;

class RemoveArticle
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"deleteArticle",
                "submit"=>"Supprimer",
                "class"=>"form link-danger",
            ],
            "inputs"=> [
                "Prénom"=>["type"=>"text", "class"=>"input-form", "id"=>"firstname", "placeholder"=>"Prénom", "minlen"=>2, "required"=>true, "error"=>"Le prénom doit faire plus de 2 caractères"],
                ]
        ];
    }
}