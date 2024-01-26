<?php
namespace App\Forms;
class Login
{

    public function getConfig(): array
    {
        return [
            "config"=>[
                        "method"=>"POST",
                        "action"=>"dashboard",
                        "submit"=>"Se connecter",
                        "class"=>"form",
                        "id"=>"form-login"
                     ],
            "inputs"=>[
                "email"=>["type"=>"email","name"=>"email", "class"=>"input-form", "placeholder"=>"email", "required"=>true, "error"=>"Le format de l'email est incorrect"],
                "pwd"=>["type"=>"password","name"=>"pwd", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe doit faire plus de 8 caractères avec minuscule et chiffre"],
                ]
        ];
    }


}