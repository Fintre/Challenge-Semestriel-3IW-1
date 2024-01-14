<?php
namespace App\Forms;
class Connexion
{

    public function getConfig(): array
    {
        return [
            "config"=> [
                        "method"=>"POST",
                        "action"=>"",
                        "submit"=>"Connexion",
                        "class"=>"form"
                     ],
            "inputs"=>[
                "Firstname"=>["type"=>"text", "class"=>"input-form" , "placeholder"=>"prénom", "minlen"=>2, "required"=>true, "error"=>"Le nom d'utilisateur est incorrect"],
                "Password"=>["type"=>"password", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe est incorrect"]
            ]
        ];
    }

}