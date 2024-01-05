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
                "firstname"=>["type"=>"text", "class"=>"input-form" , "placeholder"=>"prénom", "minlen"=>2, "required"=>true, "error"=>"Le nom d'utilisateur est incorrect"],
                "pwd"=>["type"=>"password", "class"=>"input-form", "placeholder"=>"mot de passe", "required"=>true, "error"=>"Votre mot de passe est incorrect"]
            ]
        ];
    }

}