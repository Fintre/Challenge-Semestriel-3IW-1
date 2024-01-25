<?php
namespace App\Forms;
class UserInsert
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                        "method"=>"POST",
                        "action"=>"register",
                        "submit"=>"S'inscrire",
                        "class"=>"form",
                        "id"=>"form-register"
                     ],
            "inputs"=>[
                "firstname"=>["type"=>"string","name" => "prenom", "class"=>"input-form" , "placeholder"=>"prénom", "minlen"=>2, "required"=>true, "error"=>"Le prénom doit faire plus de 2 caractères"],
                "lastname"=>["type"=>"string","name" => "nom", "class"=>"input-form", "placeholder"=>"nom", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "username"=>["type"=>"string","name" => "username", "class"=>"input-form", "placeholder"=>"Nom d'utilisateur", "minlen"=>2, "required"=>true, "error"=>"Le nom doit faire plus de 2 caractères"],
                "email"=>["type"=>"email","name" => "email", "class"=>"input-form", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "pwd"=>["type"=>"password","name" => "pwd", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                "pwdConfirm"=>["type"=>"password", "class"=>"input-form", "confirm"=>"pwd" ,"placeholder"=>"confirmation", "required"=>true, "error"=>"Votre mot de passe de confirmation ne correspond pas"],
                "role"=>["type"=>"string", "name" => "role", "class"=>"input-form", "placeholder"=>"role", "minlen"=>2, "required"=>true, "error"=>"Le role doit faire plus de 2 caractères"],
            ]
        ];
    }

}
