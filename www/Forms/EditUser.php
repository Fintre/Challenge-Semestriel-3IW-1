<?php

namespace App\Forms;

class EditUser
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"edit",
                "submit"=>"Sauvegarder",
                "class"=>"form",
                "id"=>"form-edit"
            ],
            "inputs"=>[
                "Pseudo"=>["label" => "Pseudo", "type"=>"text", "class"=>"input-form no-border" , "placeholder"=>"pseudo", "minlen"=>2, "required"=>true, "error"=>"Le login doit faire plus de 2 caractères"],
                "email"=>["label" => "email", "type"=>"email", "class"=>"input-form no-border", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "password"=>["label" => "mot de passe", "type"=>"password", "class"=>"input-form no-border", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
            ]

        ];
    }

}
