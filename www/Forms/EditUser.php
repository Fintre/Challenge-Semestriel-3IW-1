<?php

namespace App\Forms;

class EditUser
{
    public function getConfig(): array
    {
        return [
            "config"=> [
                "method"=>"POST",
                "action"=>"editUser",
                "submit"=>"Sauvegarder",
                "class"=>"form",
                "id"=>"form-edit"
            ],
            "inputs"=>[
                "Nom"=>["label" => "Nom", "type"=>"text", "class"=>"input-form no-border", "placeholder"=>"nom", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "Prénom"=>["label" => "Prénom", "type"=>"text", "class"=>"input-form no-border", "placeholder"=>"prénom", "minlen"=>2, "required"=>true, "error"=>"Le prénom doit faire plus de 2 caractères"],
                "Nom d'utilisateur"=>["label" => "Pseudo", "type"=>"text", "class"=>"input-form no-border" , "placeholder"=>"pseudo", "minlen"=>2, "required"=>true, "error"=>"Le login doit faire plus de 2 caractères"],
                "E-mail"=>["label" => "email", "type"=>"email", "class"=>"input-form no-border", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "Mot de passe"=>["label" => "mot de passe", "type"=>"password", "class"=>"input-form no-border", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "Role"=>["type"=>"text", "class"=>"input-form","id"=>"role", "placeholder"=>"role", "required"=>true, "error"=>"Veuillez choisir un rôle"],
                ]

        ];
    }

}
