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
                "class"=>"remove-form",
            ],
            "inputs"=> []
        ];
    }
}