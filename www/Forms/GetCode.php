<?php

namespace App\Forms;

class GetCode
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"",
                //"submit"=>"Connexion",
                "class"=>"form"
            ],
            "inputs"=>[
                "Code"=>["type"=>"text", "class"=>"input-form", "placeholder"=>"code de reinitialisation", "required"=>true, "error"=>"Votre code est incorrect"],
                "Enrégistrer"=>["type"=>"submit", "class"=>"form button button-primary", "value"=>"Enrégistrer", "placeholder"=>"Enrégistrer", "required"=>true]
            ]
        ];
    }
}
